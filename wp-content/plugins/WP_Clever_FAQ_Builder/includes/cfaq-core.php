<?php

if (!defined('ABSPATH'))
    exit;

class CFAQ_Core
{

    /**
     * The single instance
     * @var    object
     * @access  private
     * @since    1.0.0
     */
    private static $_instance = null;

    /**
     * Settings class object
     * @var     object
     * @access  public
     * @since   1.0.0
     */
    public $settings = null;

    /**
     * The version number.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $_version;

    /**
     * The token.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $_token;

    /**
     * The main plugin file.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $file;

    /**
     * The main plugin directory.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $dir;

    /**
     * The plugin assets directory.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $assets_dir;

    /**
     * The plugin assets URL.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $assets_url;

    /**
     * Suffix for Javascripts.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $templates_url;

    /**
     * Suffix for Javascripts.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $script_suffix;

    /**
     * For menu instance
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $menu;

    /**
     * For template
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $plugin_slug;
    
    /**
     * Faq detected in the current post
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $faqDetected = false;
    /**
     * Shorcode detected ?
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $checkedSc = false;

    /**
     * Constructor function.
     * @access  public
     * @since   1.0.0
     * @return  void
     */
    public function __construct($file = '', $version = '1.0.0')
    {
        $this->_version = $version;
        $this->_token = 'cfaq';
        $this->plugin_slug = 'cfaq';

        $this->file = $file;
        $this->dir = dirname($this->file);
        $this->assets_dir = trailingslashit($this->dir) . 'assets';
        $this->assets_url = esc_url(trailingslashit(plugins_url('/assets/', $this->file)));

        add_action('wp_enqueue_scripts', array($this, 'frontend_enqueue_scripts'), 10, 1);
        add_action('wp_enqueue_scripts', array($this, 'frontend_enqueue_styles'), 10, 1);   
        add_action('plugins_loaded', array($this, 'init_localization'));
        add_filter('the_content', array($this,'preview_content'));
        add_shortcode('clever_faq', array($this, 'cfaq_shortcode'));      
        add_filter('the_posts', array($this, 'conditionally_add_scripts_and_styles'));
        add_action('wp_ajax_nopriv_cfaq_sendQuestion', array($this, 'sendQuestion'));
        add_action('wp_ajax_cfaq_sendQuestion', array($this, 'sendQuestion'));        

    }
    
    /*
     * Plugin init localization
     */
    public function init_localization()
    {
        $moFiles = scandir(trailingslashit($this->dir) . 'languages/');
        foreach ($moFiles as $moFile) {
            if (strlen($moFile) > 3 && substr($moFile, -3) == '.mo' && strpos($moFile, get_locale()) > -1) {
                load_textdomain('cfaq', trailingslashit($this->dir) . 'languages/' . $moFile);
            }
        }
    }

    public function frontend_enqueue_scripts($hook = '')
    {
        global $post;   
    }

   public function frontend_enqueue_styles($hook = '') {
        if ($this->faqDetected) {
            global $wp_styles;
            wp_register_style($this->_token . '-frontend', esc_url($this->assets_url) . 'css/cfaq_frontend.min.css', array(), $this->_version);
            wp_enqueue_style($this->_token . '-frontend');
        }
    }
    
    function preview_content($content)
    {
        if(isset($_GET['cfaq_action']) && $_GET['cfaq_action'] == 'preview'){
            $content = do_shortcode('[clever_faq faq="'.$_GET['faq'].'"]');            
        }
        return $content;
    }
    public function sendQuestion(){      
        global $wpdb;
       
        $faqID = sanitize_text_field($_POST['faqID']);
        $table_faqs = $wpdb->prefix . "cfaq_faqs";
        
        
        $faqs = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_faqs WHERE id=%s LIMIT 1", $faqID));
        if(count($faqs)>0){
            $faq = $faqs[0];

            $question = sanitize_text_field(stripslashes($_POST['question']));
            $email = sanitize_text_field($_POST['email']);
            
            $question = str_replace('"','’',$question);
            $question = str_replace("'","’",$question);
                        
            $table_name = $wpdb->prefix . "cfaq_questions";
            $wpdb->insert($table_name, array('dateStored'=>date('Ymd'),'question'=>$question,'email'=>$email,'faqID'=>$faqID));
            if($faq->sendEmail){
                add_filter('wp_mail_content_type', create_function('', 'return "text/html"; '));
                $headers = "";            
                $headers = "Reply-to: " . $email."\n";    
                $content = '<p>'.__('Email','cfaq').' : <strong>'.$email.'</strong>';
                $content .= '<p>'.__('Question','cfaq').' : <strong>'.$question.'</strong>';
                wp_mail($faq->email, $faq->emailSubject, $content, $headers);      
            }
            
        }
        die();
    }
    
     public function cfaq_shortcode($attributes, $content = null) {
        global $wpdb;
        $response = "";
        $faq = 0;
        extract(shortcode_atts(array(
            'clever_faq' => 0,
            'faq'=>0), $attributes));
        
        if ($faq == 0) {
            $table_name = $wpdb->prefix . "cfaq_faqs";
            $faqReq = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id ASC LIMIT 1");
            $faqReq = $faqReq[0];
            $faq = $faqReq->id;
        }
        if(is_numeric($faq) && $faq >0){          
            $this->faqDetected = true;
            $table_faqs = $wpdb->prefix . "cfaq_faqs";
            $table_steps = $wpdb->prefix . "cfaq_steps";
            $table_items = $wpdb->prefix . "cfaq_items";
            $faqs = $wpdb->get_results("SELECT * FROM $table_faqs WHERE id=$faq LIMIT 1");
            $steps = $wpdb->get_results("SELECT * FROM $table_steps WHERE faqID=$faq ORDER BY id ASC");
            if(count($faqs)>0){
                $faq = $faqs[0];
                $response = '<div id="cfaq_bootstraped" class="cfaq_bootstraped">';
                $response .= '<div id="clever_faq" data-faqid="'.$faq->id.'">';
                foreach ($steps as $step) {
                    $response .= '<div class="cfaq_step" data-stepid="'.$step->id.'" data-start="'.$step->start.'">';
                    $response .= '<'.$faq->titlesTag.' class="clever_title-faq">'.$step->title.'</'.$faq->titlesTag.'>';
                    $response .= do_shortcode($step->description);
                    $marginAnswers = 28;
                    if($step->question != ""){
                        $marginAnswers = 8;                        
                        $response .= '<div class="cfaq_question">'.nl2br($step->question).'</div>'; 
                    }
                    $items = $wpdb->get_results("SELECT * FROM $table_items WHERE faqID=".$faq->id." AND stepID=".$step->id." ORDER BY ordersort ASC");    
                    $response .='<ul class="cfaq_answers" style="margin-top:'.$marginAnswers.'px;">';                    
                    foreach ($items as $item) {
                        $response .= '<li><a href="javascript:" onclick="cfaq_answerClicked(this);" data-itemid="'.$item->id.'">'.$item->title.'</a></li>';
                    }
                    
                    $response .= '<li class="cfaq_previousStep"><a href="javascript:" onclick="cfaq_previousStepClicked('.$faq->id.');" >'.$faq->txtPreviousStep.'</a></li>';  
                    if(!$step->start){
                        $response .= '<li class="cfaq_restartFaq"><a href="javascript:" onclick="cfaq_restartFaqClicked('.$faq->id.');" >'.$faq->txtReturnStart.'</a></li>';                        
                    }
                    
                    $response .= '<li class="cfaq_noQuestion"><a href="javascript:" onclick="cfaq_noQuestionClicked('.$faq->id.');" >'.$faq->txtNoQuestion.'</a></li>';

                    $response .='</ul>';
                    $response .= '</div>';                    
                }
                
                
                $response .= '<div class="cfaq_contactStep">';
                $response .= '<a href="javascript:" class="cfaq_closeContactStepBtn" onclick="cfaq_closeContactStep('.$faq->id.');">X</a>';                
                $response .= '<div class="cfaq_form-group">';
                $response .= '<label>'.$faq->labelQuestion.'</label><br/>'; 
                $response .= '<textarea name="question" type="text" class="cfaq_field"></textarea>';                   
                $response .= '</div>'; 
                $response .= '<div class="cfaq_form-group">';
                $response .= '<label>'.$faq->labelEmail.'</label><br/>'; 
                $response .= '<input name="email" type="email" class="cfaq_field" />';                   
                $response .= '</div>';
                $response .= '<p><a href="javascript:" onclick="cfaq_sendQuestion('.$faq->id.')" id="cfaq_btnSend" class="cfaq_btn">'.$faq->labelSend.'</a></p>';
                $response .= '</div>'; 
                
                
                $response .= '<div class="cfaq_finalText">'.$faq->txtNewQuestion.'</div>';
                
                
                $response .= '</div>';
                $response .= '</div>';
            }
        }
        return $response;
     }
     
      public function conditionally_add_scripts_and_styles($posts) {
        if (empty($posts))
            return $posts;
            global $wpdb;
            $settings = $this->getSettings();
        if(!$this->checkedSc){
            $shortcode_found = false;
            $faq_id = 0;
            $this->currentFaqs[] = array();
            
            if(!isset($_GET['cornerstone_preview'])){
                foreach ($posts as $post) {
                    $lastPos = 0;
                    while (($lastPos = strpos($post->post_content, '[clever_faq', $lastPos)) !== false) {
                        $shortcode_found = true;
                        $this->checkedSc = true;
                        $pos_start = strpos($post->post_content, 'faq="', $lastPos + 11) + 5;
                        // $pos_end=strpos($post->post_content, '"', strpos($post->post_content, 'form_id="', strpos($post->post_content, '[estimation_form') + 16) + 10)-1;
                        $pos_end = strpos($post->post_content, '"', $pos_start);
                        $faq_id = substr($post->post_content, $pos_start, $pos_end - $pos_start);
                        if ($faq_id && $faq_id > 0 && !is_array($faq_id)) {
                            $this->currentFaqs[] = $faq_id;
                        } else {
                            $table_name = $wpdb->prefix . "cfaq_faqs";
                            $faqReq = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id ASC LIMIT 1");
                            if (count($faqReq) > 0) {
                                $faq = $faqReq[0];
                                $this->currentFaqs[] = $faq->id;
                            }
                        }
                        $lastPos = $lastPos + 16;
                    }
                }
            }
            if(isset($_GET['cornerstone_preview'])){
		wp_register_style($this->_token . '-frontend', esc_url($this->assets_url) . 'css/frontend.min.css', array(), $this->_version);
                wp_enqueue_style($this->_token . '-frontend');
                
            } else if(!$shortcode_found && defined('CNR_DEV')){
                $table_name = $wpdb->prefix . "cfaq_faqs";
                $faqReq = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id ASC");     
                if(count($faqReq)>0) {
                    $shortcode_found = true;
                    $this->checkedSc = true;
                    foreach ($faqReq as $faq) {
                        $this->currentFaqs[] = $faq->id;                
                    }                
                }           
            }
            
            //loadAllPages
            $table_name = $wpdb->prefix . "cfaq_faqs";
            $faqReq = $wpdb->get_results("SELECT * FROM $table_name WHERE loadAllPages=1 ORDER BY id ASC");     
            if(count($faqReq)>0) {
                $shortcode_found = true;
                $this->checkedSc = true;
                foreach ($faqReq as $faq) {
                    if(!in_array($faq->id,$this->currentFaqs)){
                        $this->currentFaqs[] = $faq->id;                          
                    }              
                }                
            }       
            if(isset($_GET['cfaq_action'])&& $_GET['cfaq_action'] == 'preview'){
                $faqID = sanitize_text_field($_GET['faq']);
                if(!in_array($faqID,$this->currentFaqs)){
                      $shortcode_found = true;
                     $this->checkedSc = true;
                     $this->currentFaqs[] = $faqID;                          
                }                              
            }

            if ($shortcode_found && count($this->currentFaqs) > 0) {

                // styles
		wp_register_style($this->_token . '-reset', esc_url($this->assets_url) . 'css/reset.min.css', array(), $this->_version);
                wp_enqueue_style($this->_token . '-reset');               

		wp_register_style($this->_token . '-frontend', esc_url($this->assets_url) . 'css/frontend.min.css', array(), $this->_version);
                wp_enqueue_style($this->_token . '-frontend');               

                // scripts               
                wp_register_script($this->_token . '-frontend', esc_url($this->assets_url) . 'js/frontend.min.js', array('jquery','jquery-ui-core', 'jquery-ui-position'), $this->_version);
                wp_enqueue_script($this->_token . '-frontend');
                
                foreach ($this->currentFaqs as $faqID) {
                    if ($faqID > 0 && !is_array($faqID)) {
                        $table_name = $wpdb->prefix . "cfaq_faqs";                        
                        $faqReq = $wpdb->get_results("SELECT * FROM $table_name WHERE id=$faqID LIMIT 1");
                        if(count($faqReq)>0){
                            $faq = $faqReq[0];
                            $faq->steps = array();     
                            $faq->links = array();                 
                            $table_name = $wpdb->prefix . "cfaq_steps";                        
                            $stepReq = $wpdb->get_results("SELECT * FROM $table_name WHERE faqID=$faqID");
                            foreach ($stepReq as $step) {
                                 $faq->steps[] = $step;
                            }
                            $table_name = $wpdb->prefix . "cfaq_links";                        
                            $linksReq = $wpdb->get_results("SELECT * FROM $table_name WHERE faqID=$faqID");
                            foreach ($linksReq as $link) {
                                 $faq->links[] = $link;
                            }
                           $calledStep = 0;
                           if(isset($_GET['cfaq'])){
                               $calledStep = sanitize_text_field($_GET['cfaq']);
                           }
                             $js_data = array('ajaxurl' => admin_url('admin-ajax.php'),'faqs'=> array(),'resetDelay'=>$faq->resetDelay,'calledStep'=>$calledStep);
                            $js_data['faqs'][] = $faq;
                        }
                    }
                }
                                
                wp_localize_script($this->_token . '-frontend', 'cfaq_faqs', $js_data);
               
                add_action('wp_head', array($this, 'options_custom_styles'));
            }
        
        }

        return $posts;
    }
    private function is_enqueued_script($script)
    {
        return isset( $GLOBALS['wp_scripts']->registered[ $script ] );
    }
    
    public function options_custom_styles() {
            global $wpdb;

        $settings = $this->getSettings();
        $output = '';

        foreach ($this->currentFaqs as $currentFaq) {
            if ($currentFaq > 0 && !is_array($currentFaq)) {
                $table_name = $wpdb->prefix . "cfaq_faqs";
                $faqReq = $wpdb->get_results("SELECT * FROM $table_name WHERE id=".$currentFaq." ORDER BY id ASC");     
                if(count($faqReq)>0){
                    $faq = $faqReq[0];
                if ($faq) {                    
                    if($faq->useGoogleFont && $faq->googleFontName != ""){
                        $fontname = str_replace(' ', '+',$faq->googleFontName);
                        $output .= '@import url(https://fonts.googleapis.com/css?family='.$fontname.':400,700);';
                        
                        $output .= 'body #cfaq_bootstraped #clever_faq[data-faqid="' . $faq->id . '"] {';
                        $output .= ' font-family:"' . $faq->googleFontName . '"; ';
                        $output .= '}';
                    }
                    $output .= 'body #cfaq_bootstraped #clever_faq[data-faqid="' . $faq->id . '"] {';
                    $output .= ' background-color:' . $faq->colorF . '; ';
                    $output .= ' color: #000000; ';                    
                    $output .= '}';
                    $output .= 'body #cfaq_bootstraped #clever_faq[data-faqid="' . $faq->id . '"] .clever_title-faq{';
                    $output .= ' color:' . $faq->colorE . '; ';                  
                    $output .= '}';
                    $output .= '#cfaq_bootstraped #clever_faq[data-faqid="' . $faq->id . '"] .cfaq_question {';
                    $output .= ' background-color:' . $faq->colorB . '; ';
                    $output .= ' color:' . $faq->colorC . '; ';
                    $output .= '}';
                    $output .= "\n";
                    $output .= '#cfaq_bootstraped #clever_faq[data-faqid="' . $faq->id . '"] .cfaq_answers > li > a {';
                    $output .= ' background-color:' . $faq->colorA . '; ';
                    $output .= ' color:' . $faq->colorD . '; ';
                    $output .= '}';
                    $output .= "\n";
                    $output .= '#cfaq_bootstraped #clever_faq[data-faqid="' . $faq->id . '"] .cfaq_answers > li.cfaq_noQuestion > a {';
                    $output .= ' background-color:' . $faq->colorH . '; ';
                    $output .= ' color:' . $faq->colorG . '; ';
                    $output .= '}';
                    $output .= "\n";
                    $output .= '#cfaq_bootstraped #clever_faq[data-faqid="' . $faq->id . '"]  .cfaq_answers li a:before {';
                    $output .= ' border-color: transparent transparent transparent ' . $faq->colorD . '; ';
                    $output .= '}';
                    $output .= "\n";
                    $output .= '#cfaq_bootstraped #clever_faq[data-faqid="' . $faq->id . '"]  .cfaq_answers > li.cfaq_noQuestion > a:before {';
                    $output .= ' border-color: transparent transparent transparent ' . $faq->colorG . '; ';
                    $output .= '}';
                    $output .= "\n";
                                        
                    $output .= 'body #clever_faq[data-faqid="' . $faq->id . '"] .cfaq_closeContactStepBtn {';
                    $output .= ' color: ' . $faq->colorFieldsBorder . '; ';
                    $output .= '}';
                    $output .= "\n";
                    
                    $output .= 'body #clever_faq[data-faqid="' . $faq->id . '"] .cfaq_contactStep .cfaq_form-group label {';
                    $output .= ' color: ' . $faq->colorLabels . '; ';
                    $output .= '}';
                    $output .= "\n";
                    
                    $output .= 'body #clever_faq[data-faqid="' . $faq->id . '"] .cfaq_field {';
                    $output .= ' background-color: ' . $faq->colorFieldsBg . '; ';
                    $output .= ' color: ' . $faq->colorFields . '; ';
                    $output .= '}';
                    $output .= "\n";
                    $output .= 'body #clever_faq[data-faqid="' . $faq->id . '"] .cfaq_field:focus {';
                    $output .= ' border-color: ' . $faq->colorFieldsFocus . '; ';
                    $output .= '}';
                    $output .= "\n";
                    $output .= 'body #clever_faq[data-faqid="' . $faq->id . '"] .cfaq_btn {';
                    $output .= ' background-color: ' . $faq->colorBtnBg . '; ';
                    $output .= ' color: ' . $faq->colorBtn . '; ';
                    $output .= '}';
                    $output .= "\n";
                    
                    
                    $output .= '#cfaq_bootstraped #clever_faq[data-faqid="' . $faq->id . '"] .cfaq_answers > li.cfaq_restartFaq > a,'
                            . '#cfaq_bootstraped #clever_faq[data-faqid="' . $faq->id . '"] .cfaq_answers > li.cfaq_previousStep > a {';
                    $output .= ' background-color:' . $faq->colorRestartBg . '; ';
                    $output .= ' color:' . $faq->colorRestart . '; ';
                    $output .= '}';
                    $output .= "\n";
                                         
                    if ($faq->customCss != "") {
                        $output .= $faq->customCss;
                        $output .= "\n";
                    }
                }
            }
                }
        }
        if ($output != '') {
            $output = "\n<style >\n" . $output . "</style>\n";
            echo $output;
        }
    }
    

    /**
     * Main CFAQ_Core Instance
     *
     *
     * @since 1.0.0
     * @static
     * @see CFAQ_Core()
     * @return Main CFAQ_Core instance
     */
    public static function instance($file = '', $version = '1.0.0')
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self($file, $version);
        }
        return self::$_instance;
    }

// End instance()

    /**
     * Cloning is forbidden.
     *
     * @since 1.0.0
     */
    public function __clone()
    {
    }

// End __clone()

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 1.0.0
     */
    public function __wakeup()
    {
        //  _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), $this->_version);
    }

// End __wakeup()

    /**
     * Return settings.
     * @access  public
     * @since   1.0.0
     * @return  void
     */
    public function getSettings()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . "cfaq_settings";
        $settings = $wpdb->get_results("SELECT * FROM $table_name WHERE id=1 LIMIT 1");
        return $settings[0];
    }
    // End getSettings()


    /**
     * Log the plugin version number.
     * @access  public
     * @since   1.0.0
     * @return  void
     */
    private function _log_version_number()
    {
        update_option($this->_token . '_version', $this->_version);
    }

}
