<?php

if (!defined('ABSPATH'))
    exit;

class CFAQ_admin {

    /**
     * The single instance
     * @var    object
     * @access  private
     * @since    1.0.0
     */
    private static $_instance = null;

    /**
     * The main plugin object.
     * @var    object
     * @access  public
     * @since    1.0.0
     */
    public $parent = null;

    /**
     * Prefix for plugin settings.
     * @var     string
     * @access  publicexport
     * Delete
     * @since   1.0.0
     */
    public $base = '';

    /**
     * Available settings for plugin.
     * @var     array
     * @access  public
     * @since   1.0.0
     */
    public $settings = array();

    public function __construct($parent) {
        $this->parent = $parent;
        $this->base = 'cfaq_';
        $this->dir = dirname($this->parent->file);
        add_action('admin_menu', array($this, 'add_menu_item'));
        add_action('admin_print_scripts', array($this, 'admin_scripts'));
        add_action('admin_print_styles', array($this, 'admin_styles'));
        add_action('vc_before_init', array($this, 'init_vc'));
        add_action('wp_ajax_nopriv_cfaq_saveSettings', array($this, 'saveSettings'));
        add_action('wp_ajax_cfaq_saveSettings', array($this, 'saveSettings'));
        add_action('wp_ajax_nopriv_cfaq_loadSettings', array($this, 'loadSettings'));
        add_action('wp_ajax_cfaq_loadSettings', array($this, 'loadSettings'));
        add_action('wp_ajax_nopriv_cfaq_saveStep', array($this, 'saveStep'));
        add_action('wp_ajax_cfaq_saveStep', array($this, 'saveStep'));
        add_action('wp_ajax_nopriv_cfaq_addStep', array($this, 'addStep'));
        add_action('wp_ajax_cfaq_addStep', array($this, 'addStep'));
        add_action('wp_ajax_nopriv_cfaq_loadStep', array($this, 'loadStep'));
        add_action('wp_ajax_cfaq_loadStep', array($this, 'loadStep'));
        add_action('wp_ajax_nopriv_cfaq_removeStep', array($this, 'removeStep'));
        add_action('wp_ajax_cfaq_removeStep', array($this, 'removeStep'));
        add_action('wp_ajax_nopriv_cfaq_saveStepPosition', array($this, 'saveStepPosition'));
        add_action('wp_ajax_cfaq_saveStepPosition', array($this, 'saveStepPosition'));
        add_action('wp_ajax_nopriv_cfaq_newLink', array($this, 'newLink'));
        add_action('wp_ajax_cfaq_newLink', array($this, 'newLink'));
        add_action('wp_ajax_nopriv_cfaq_changePreviewHeight', array($this, 'changePreviewHeight'));
        add_action('wp_ajax_cfaq_changePreviewHeight', array($this, 'changePreviewHeight'));
        add_action('wp_ajax_nopriv_cfaq_saveLinks', array($this, 'saveLinks'));
        add_action('wp_ajax_cfaq_saveLinks', array($this, 'saveLinks'));
        add_action('wp_ajax_nopriv_cfaq_removeAllSteps', array($this, 'removeAllSteps'));
        add_action('wp_ajax_cfaq_removeAllSteps', array($this, 'removeAllSteps'));
        add_action('wp_ajax_nopriv_cfaq_addFaq', array($this, 'addFaq'));
        add_action('wp_ajax_cfaq_addFaq', array($this, 'addFaq'));
        add_action('wp_ajax_nopriv_cfaq_loadFaq', array($this, 'loadFaq'));
        add_action('wp_ajax_cfaq_loadFaq', array($this, 'loadFaq'));
        add_action('wp_ajax_nopriv_cfaq_saveFaq', array($this, 'saveFaq'));
        add_action('wp_ajax_cfaq_saveFaq', array($this, 'saveFaq'));
        add_action('wp_ajax_nopriv_cfaq_removeFaq', array($this, 'removeFaq'));
        add_action('wp_ajax_cfaq_removeFaq', array($this, 'removeFaq'));
        add_action('wp_ajax_nopriv_cfaq_saveItem', array($this, 'saveItem'));
        add_action('wp_ajax_cfaq_saveItem', array($this, 'saveItem'));
        add_action('wp_ajax_nopriv_cfaq_removeItem', array($this, 'removeItem'));
        add_action('wp_ajax_cfaq_removeItem', array($this, 'removeItem'));
        add_action('wp_ajax_nopriv_cfaq_exportFaqs', array($this, 'exportFaqs'));
        add_action('wp_ajax_cfaq_exportFaqs', array($this, 'exportFaqs'));
        add_action('wp_ajax_nopriv_cfaq_importFaqs', array($this, 'importFaqs'));
        add_action('wp_ajax_cfaq_importFaqs', array($this, 'importFaqs'));
        add_action('wp_ajax_nopriv_cfaq_duplicateFaq', array($this, 'duplicateFaq'));
        add_action('wp_ajax_cfaq_duplicateFaq', array($this, 'duplicateFaq'));
        add_action('wp_ajax_nopriv_cfaq_duplicateItem', array($this, 'duplicateItem'));
        add_action('wp_ajax_cfaq_duplicateItem', array($this, 'duplicateItem'));
        add_action('wp_ajax_nopriv_cfaq_duplicateStep', array($this, 'duplicateStep'));
        add_action('wp_ajax_cfaq_duplicateStep', array($this, 'duplicateStep'));
        add_action('wp_ajax_nopriv_cfaq_changeItemsOrders', array($this, 'changeItemsOrders'));
        add_action('wp_ajax_cfaq_changeItemsOrders', array($this, 'changeItemsOrders'));
        add_action('wp_ajax_nopriv_cfaq_addItem', array($this, 'addItem'));
        add_action('wp_ajax_cfaq_addItem', array($this, 'addItem'));
        add_action('wp_ajax_nopriv_cfaq_removeQuestion', array($this, 'removeQuestion'));
        add_action('wp_ajax_cfaq_removeQuestion', array($this, 'removeQuestion'));
    }

    /**
     * Add menu to admin
     * @return void
     */
    public function add_menu_item() {
        add_menu_page('WP Clever FAQ', __("Clever F.A.Qs", 'cfaq'), 'manage_options', 'cfaq_menu', array($this, 'view_cfaq'), 'dashicons-welcome-learn-more');
        $menuSlag = 'cfaq_menu';
    }

    public function getSettings() {
        if (current_user_can('manage_options')) {
        global $wpdb;
        $table_name = $wpdb->prefix . "cfaq_settings";
        $settings = $wpdb->get_results("SELECT * FROM $table_name WHERE id=1 LIMIT 1");
        $settings = $settings[0];
        return $settings;
        }
    }

    public function loadSettings() {
        if (current_user_can('manage_options')) {
            $settings = $this->getSettings();
            $settings->purchaseCode = "";
            echo(json_encode($settings));
        }
        die();
    }

    /*
     * Load admin styles
     */

    function admin_styles() {
        $url = '';
        if (isset($_SERVER['HTTP_REFERER'])) {
            $url = $_SERVER['HTTP_REFERER'];
        }
        $settings = $this->getSettings();
        if (isset($_GET['page']) && strpos($_GET['page'], 'cfaq') !== false) {
            wp_register_style($this->parent->_token . '-reset', esc_url($this->parent->assets_url) . 'css/reset.min.css', array(), $this->parent->_version);
            wp_enqueue_style($this->parent->_token . '-reset');
            wp_register_style($this->parent->_token . '-bootstrap', esc_url($this->parent->assets_url) . 'css/bootstrap.min.css', array(), $this->parent->_version);
            wp_enqueue_style($this->parent->_token . '-bootstrap');
            wp_register_style($this->parent->_token . '-fontawesome', esc_url($this->parent->assets_url) . 'css/font-awesome.min.css', array(), $this->parent->_version);
            wp_enqueue_style($this->parent->_token . '-fontawesome');
            wp_register_style($this->parent->_token . '-flat-ui', esc_url($this->parent->assets_url) . 'css/flat-ui-pro.min.css', array(), $this->parent->_version);
            wp_enqueue_style($this->parent->_token . '-flat-ui');
            wp_register_style($this->parent->_token . '-colpick', esc_url($this->parent->assets_url) . 'css/colpick.min.css', array(), $this->parent->_version);
            wp_enqueue_style($this->parent->_token . '-colpick');
            wp_register_style($this->parent->_token . '-editor', esc_url($this->parent->assets_url) . 'css/summernote.min.css', array(), $this->parent->_version);
            wp_enqueue_style($this->parent->_token . '-editor');
            wp_register_style($this->parent->_token . '-editorB3', esc_url($this->parent->assets_url) . 'css/summernote-bs3.css', array(), $this->parent->_version);
            wp_enqueue_style($this->parent->_token . '-editorB3');
            wp_register_style($this->parent->_token . '-admin', esc_url($this->parent->assets_url) . 'css/admin.min.css', array(), $this->parent->_version);
            wp_enqueue_style($this->parent->_token . '-admin');
        }
    }

    /*
     * Load admin scripts
     */

    function admin_scripts() {
        global $wpdb;
        $url = '';
        if (isset($_SERVER['HTTP_REFERER'])) {
            $url = $_SERVER['HTTP_REFERER'];
        }
        $settings = $this->getSettings();
        if (isset($_GET['page']) && strpos($_GET['page'], 'cfaq') !== false) {
            wp_register_script($this->parent->_token . '-flatui', esc_url($this->parent->assets_url) . 'js/flat-ui-pro.min.js', array('jquery',
                'jquery-ui-core',
                'jquery-ui-mouse',
                'jquery-ui-position',
                'jquery-ui-droppable',
                'jquery-ui-draggable',
                'jquery-ui-resizable',
                'jquery-ui-sortable',
                'jquery-effects-core',
                'jquery-effects-drop',
                'jquery-effects-fade',
                'jquery-effects-bounce'), $this->parent->_version);
            wp_enqueue_script($this->parent->_token . '-flatui');
            wp_register_script($this->parent->_token . '-colpick', esc_url($this->parent->assets_url) . 'js/colpick.min.js', array($this->parent->_token . '-flatui'), $this->parent->_version);
            wp_enqueue_script($this->parent->_token . '-colpick');
            wp_register_script($this->parent->_token . '-editor', esc_url($this->parent->assets_url) . 'js/summernote.min.js', array($this->parent->_token . '-flatui'), $this->parent->_version);
            wp_enqueue_script($this->parent->_token . '-editor');
            wp_register_script($this->parent->_token . '-admin', esc_url($this->parent->assets_url) . 'js/admin.min.js', $this->parent->_token . '-flatui', $this->parent->_version);
            wp_enqueue_script($this->parent->_token . '-admin');

            $js_data[] = array(
                'assetsUrl' => esc_url($this->parent->assets_url),
                'websiteUrl' => esc_url(get_home_url()),
                'texts' => array(
                    'tip_flagStep' => __('Click the flag icon to set this step at first step', 'cfaq'),
                    'tip_linkStep' => __('Start a link to another step', 'cfaq'),
                    'tip_delStep' => __('Remove this step', 'cfaq'),
                    'tip_duplicateStep' => __('Duplicate this step', 'cfaq'),
                    'tip_editStep' => __('Edit this step', 'cfaq'),
                    'tip_editLink' => __('Edit a link', 'cfaq'),
                    'isSelected' => __('Is selected', 'cfaq'),
                    'isUnselected' => __('Is unselected', 'cfaq'),
                    'errorExport' => __('An error occurred during the transfer. Using an FTP software, please verify that the tmp/ folder has rights set to 0747', 'cfaq'),
                    'errorImport' => __('An error occurred during the transfer. Using an FTP software, please verify that the tmp/ folder has rights set to 0747', 'cfaq'),
                    'Yes' => __('Yes', 'cfaq'),
                    'No' => __('No', 'cfaq'),
                    'newAnswer' => __('New answer', 'cfaq'),
                    'newStepTitle'=>__('My Step', 'cfaq')
                )
            );
            wp_localize_script($this->parent->_token . '-admin', 'cfaq_data', $js_data);
        }        
        wp_register_style($this->parent->_token . '-adminGlobal', esc_url($this->parent->assets_url) . 'css/admin_global.css', array(), $this->parent->_version);
        wp_enqueue_style($this->parent->_token . '-adminGlobal');
    }

    public function saveSettings() {
        global $wpdb;
        $settings = $this->getSettings();
        $currentCode = $settings->purchaseCode;
        if (current_user_can('manage_options')) {
            $table_name = $wpdb->prefix . "cfaq_settings";
            $sqlDatas = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'action' && $key != 'id' && $key != 'pll_ajax_backend' && $key != "undefined" && $key != "files") {
                    $sqlDatas[$key] = (stripslashes($value));
                }
            }
            $wpdb->update($table_name, $sqlDatas, array('id' => 1));
        }

        die();
    }

    public function addFaq() {
        if (current_user_can('manage_options')) {
            global $wpdb;
            $table_name = $wpdb->prefix . "cfaq_faqs";
            $wpdb->insert($table_name, array('title' => 'My new FAQ',
                'colorA' => '#ecf0f1',
                'colorB' => '#1abc9c',
                'colorC' => '#FFFFFF',
                'colorD' => '#bdc3c7',
                'colorE' => '#000000',
                'colorF' => '#FFFFFF',
                'colorG' => '#FFFFFF',
                'colorH' => '#e67e22',                
                'colorFields' => '#34495e',
                'colorFieldsBg' => '#FFFFFF',
                'colorFieldsFocus' => '#1bc2a1',
                'colorFieldsBorder'=> '#bdc3c7',
                'colorBtn' => '#FFFFFF',
                'colorBtnBg' => '#1bc2a1',
                'colorLabels'=>'#34495e',
                'colorRestartBg'=>'#bdc3c7',
                'colorRestart'=>'#ecf0f1',
                'useGoogleFont' => true,
                'googleFontName' => 'Lato',
                'txtReturnStart'=> 'Restart the F.A.Q',
                'txtPreviousStep'=> 'Return to the previous step',
                'txtNoQuestion' => 'I don\'t see my question in the list',
                'txtNewQuestion' => 'Your request was correctly sent, we will reply as soon as possible. Thank you !',
                'labelQuestion' => 'Your question',
                'labelEmail' => 'Your email',
                'labelSend' => 'Send',
                'sendEmail'=>1,
                'emailSubject'=> 'New question from your website',
                'email'=>'your@email.here',
                'resetDelay'=>5));

            $faqID = $wpdb->insert_id;
            echo $faqID;
            die();
        }
    }

    public function addItem() {
        if (current_user_can('manage_options')) {
        global $wpdb;
        $table_name = $wpdb->prefix . "cfaq_items";
        $wpdb->insert($table_name, array('title' => __('New answer', 'cfaq')));
        $itemID = $wpdb->insert_id;
        echo $itemID;
        }
        die();
    }
    
    public function removeQuestion(){
        if (current_user_can('manage_options')) {
            global $wpdb;
            $questionID = sanitize_text_field($_POST['questionID']);
            $table_name = $wpdb->prefix . "cfaq_questions";
            $wpdb->delete($table_name, array('id' => $questionID)); 
            die();   
        }
        
    }
    
     /*
    *  Add shortcode to VisualComposer
    */
    public function init_vc(){
       if (defined( 'WPB_VC_VERSION' ) ) {
           global $wpdb;
           $faqsValues = array();
           $table_name = $wpdb->prefix . "cfaq_faqs";
           $faqs = $wpdb->get_results("SELECT id,title FROM $table_name ORDER BY id ASC");
           foreach ($faqs as $faq) {
              $faqsValues[] = $faq->id;
           }

         vc_map( array(
           "name" => __('Clever F.A.Q', 'lfb'),
           "base" => "clever_faq",
           "category" => 'Content',
           "icon" => 'icon_cfaq_faq',
           "params" => array(
              array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => __("F.A.Q ID", 'cfaq'),
                 "param_name" => "faq",
                 "value"       => $faqsValues,
                 "std"         => "1",
                 "description" => __("Select a F.A.Q","cfaq")
              )
           )
        ));
       }
    }
    
    public function view_cfaq() {
        global $wpdb;
        $settings = $this->getSettings();

        echo '<div id="cfaq_loader"></div>';
        echo '<div id="cfaq_bootstraped" class="cfaq_bootstraped cfaq_panel">';
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');

        echo '<div id="cfaq_faqWrapper" >';
        echo '<div class="cfaq_winHeader col-md-12 palette palette-turquoise">
               <div class="dashicons-before dashicons-welcome-learn-more" style="float: left;margin-right: 8px;"><br></div>WP Clever F.A.Q Builder';
        echo '<div class="btn-toolbar">';
        echo '<div class="btn-group">';
        echo '<a class="btn btn-primary" onclick="cfaq_returnToList();" href="javascript:" data-toggle="tooltip2" title="' . __('Return to the FAQ list', 'cfaq') . '" data-placement="left"><span class="glyphicon glyphicon-list"></span></a>';
        echo '</div>';
        echo '</div>'; // eof toolbar
        echo '</div>'; // eof cfaq_winHeader
        echo '<div class="clearfix"></div>';


        echo '<div id="cfaq_panelFaqsList">';
        echo '<div class="container-fluid cfaq_container" style="max-width: 90%;margin: 0 auto;margin-top: 18px;">';
        echo '<div class="col-md-12">';
        echo '<div role="tabpanel">';
        echo '<ul class="nav nav-tabs" role="tablist" >
                <li role="presentation" class="active" ><a href="#cfaq_faqsTabGeneral" aria-controls="general" role="tab" data-toggle="tab" ><span class="glyphicon glyphicon-th-list" ></span > ' . __('FAQs List', 'cfaq') . ' </a ></li >
                </ul >';
        echo '<div class="tab-content" >';
        echo '<div role="tabpanel" class="tab-pane active" id="cfaq_faqsTabGeneral" >';

        echo '<p style="text-align: right; margin-top: 18px;">
            <a href="javascript:" style="margin-right: 12px;" onclick="cfaq_addFaq();" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>' . __('Add a new FAQ', 'cfaq') . ' </a>
            <a href="javascript:" style="margin-right: 12px;" onclick=" jQuery(\'#cfaq_winImport\').modal(\'show\');" class="btn btn-warning"><span class="glyphicon glyphicon-import"></span>' . __('Import FAQs', 'cfaq') . ' </a>
            <a href="javascript:" onclick="cfaq_exportFaqs();" class="btn btn-default"><span class="glyphicon glyphicon-export"></span>' . __('Export all FAQs', 'cfaq') . ' </a>
         </p>';
        echo '<table class="table">';
        echo '<thead>';
        echo '<th>' . __('Faq title', 'cfaq') . '</th>';
        echo '<th>' . __('Shortcode', 'cfaq') . '</th>';
        echo '<th>' . __('Actions', 'cfaq') . '</th>';
        echo '</thead>';
        echo '<tbody>';
        $table_name = $wpdb->prefix . "cfaq_faqs";
        $faqs = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id ASC");
        foreach ($faqs as $faq) {
            echo '<tr>';
            echo '<td><a href="javascript:" onclick="cfaq_loadFaq(' . $faq->id . ');">' . $faq->title . '</a></td>';
            echo '<td><code class="cfaq_shortcodeCode">[clever_faq faq="' . $faq->id . '"]</code></td>';
            echo '<td>';
            echo '<a href="javascript:" onclick="cfaq_loadFaq(' . $faq->id . ');" class="btn btn-primary btn-circle " data-toggle="tooltip" title="' . __('Edit this FAQ', 'cfaq') . '" data-placement="bottom"><span class="glyphicon glyphicon-pencil"></span></a>';
            echo '<a href="' . get_home_url() . '?cfaq_action=preview&faq=' . $faq->id . '" target="_blank"  class="btn btn-default btn-circle " data-toggle="tooltip" title="' . __('Preview this FAQ', 'cfaq') . '" data-placement="bottom"><span class="glyphicon glyphicon-eye-open"></span></a>';
            echo '<a href="javascript:" onclick="cfaq_duplicateFaq(' . $faq->id . ');" class="btn btn-default btn-circle " data-toggle="tooltip" title="' . __('Duplicate this FAQ', 'cfaq') . '" data-placement="bottom"><span class="glyphicon glyphicon-duplicate"></span></a>';
            echo '<a href="javascript:" onclick="cfaq_removeFaq(' . $faq->id . ');" class="btn btn-danger btn-circle " data-toggle="tooltip" title="' . __('Delete this FAQ', 'cfaq') . '" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

        echo '</div>'; // eof tab-content
        echo '</div>'; // eof cfaq_faqsTabGeneral
        echo '</div>'; // eof tabpanel


        echo '</div>'; // eof col-md-12
        echo '</div>'; // eof container
        echo '</div>'; // eof cfaq_panelFaqsList
        echo '<div class="clearfix"></div>';


        echo '<div id="cfaq_winStep" class="cfaq_window container-fluid">';
        echo '<div class="cfaq_winHeader col-md-12 palette palette-turquoise"><span class="glyphicon glyphicon-pencil"></span>' . __('Edit a step', 'cfaq');

        echo '<div class="btn-toolbar">';
        echo '<div class="btn-group">';
        echo '<a class="btn btn-primary" href="javascript:"><span class="glyphicon glyphicon-remove cfaq_btnWinClose"></span></a>';
        echo '</div>';
        echo '</div>'; // eof toolbar
        echo '</div>'; // eof header
        echo '<div class="clearfix"></div>';
        echo '<div class="container-fluid  cfaq_container"  style="max-width: 90%;margin: 0 auto;margin-top: 18px;">';
        echo '<div role="tabpanel">';
        echo '<ul class="nav nav-tabs" role="tablist" >
                <li role="presentation" class="active" ><a href="#cfaq_stepTabGeneral" aria-controls="general" role="tab" data-toggle="tab" ><span class="glyphicon glyphicon-cog" ></span > ' . __('Step', 'cfaq') . ' </a ></li >
                </ul >';
        echo '<div class="tab-content" >';
        echo '<div role="tabpanel" class="tab-pane active" id="cfaq_stepTabGeneral" >';
        echo '<div class="col-md-6">';
        echo '<h4>' . __('Step content', 'cfaq') . ' </h4>';
        echo '<div class="form-group" >
                    <label> ' . __('Title', 'cfaq') . ' </label >
                    <input type="text" name="title" class="form-control" />
                    <small> ' . __('The title will be displayed at top of the step', 'cfaq') . ' </small>
                </div>';
        echo '<div class="form-group" >
                    <label> ' . __('Text', 'cfaq') . ' </label >
                    <div id="cfaq_stepDescription"></div>
                    <small> ' . __('This is the content of the current step', 'cfaq') . ' </small>
                </div>';
        echo '<h4>' . __('Question', 'cfaq') . ' </h4>';
        echo '<div class="form-group" >
                    <label> ' . __('Title', 'cfaq') . ' </label >
                    <textarea name="question" class="form-control" ></textarea>
                    <small> ' . __('If the step contains a question, please write it here', 'cfaq') . ' </small>
                </div>';
        echo '<div class="alert alert-info">'
        . '<p>'.__('To directly open the FAQ on this step, simply use the url of the page where is pasted the shortcode, followed by','cfaq').' <strong>?cfaq=<span class="cfaq_stepIDUrl"></span></strong></p>'
                .'<p>'.__('Example','cfaq').' : <pre>'.home_url().'/MyPage?cfaq=<span class="cfaq_stepIDUrl"></span></pre></p>'
                
                . '</p>'
        . '</div>';

        echo '</div>'; // eof col-md-6
        echo '<div class="col-md-6">';
        
        echo '<h4>' . __('Answers', 'cfaq') . ' </h4>';

        echo '<div role="tabpanel" id="cfaq_itemsList" style="margin-top: 24px;padding-left: 14px; padding-right: 14px;">';
        echo '<div id="cfaq_itemTab" >';
        echo '<div class="col-md-12">';
        echo '<p><a href="javascript:" onclick="cfaq_addItem();" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>' . __('Add a new Answer', 'cfaq') . '</a></p>';
        echo '<table id="cfaq_itemsTable" class="table">';
        echo '<thead>
                <th>' . __('Answer', 'cfaq') . '</th>
                <th style="width: 128px;"></th>
            </thead>';
        echo '<tbody>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>'; // eof col-md-12
        echo '<div class="clearfix"></div>';

        echo '</div>'; // eof cfaq_itemTab

        echo '</div>'; // eof col-md-12

        echo '</div>'; // eof tabpanel
        echo '<div class="clearfix"></div>';
        echo '<p style="text-align:center;"><a href="javascript:" class="btn btn-primary" onclick="cfaq_saveStep();"><span class="glyphicon glyphicon-floppy-disk"></span>' . __('Save', 'cfaq') . '</a></p>';


        echo '</div>'; // eof cfaq_stepTabGeneral
        echo '</div>'; // eof tab-content
        echo '</div>'; // eof tabpanel

        echo '</div>'; // eof cfaq_container
        echo '</div>'; // eof win step


        echo '<div id="cfaq_winLink" class="cfaq_window container-fluid"> ';
        echo '<div class="cfaq_winHeader col-md-12 palette palette-turquoise" ><span class="glyphicon glyphicon-pencil" ></span > ' . __('Edit a link', 'cfaq');

        echo ' <div class="btn-toolbar"> ';
        echo '<div class="btn-group" > ';
        echo '<a class="btn btn-primary" href="javascript:" ><span class="glyphicon glyphicon-remove cfaq_btnWinClose" ></span ></a > ';
        echo '</div> ';
        echo '</div> '; // eof toolbar
        echo '</div> '; // eof header

        echo '<div class="clearfix"></div><div class="container-fluid cfaq_container"   style="max-width: 90%;margin: 0 auto;margin-top: 18px;"> ';
        echo '<div role="tabpanel">';
        echo '<ul class="nav nav-tabs" role="tablist" >
                <li role="presentation" class="active" ><a href="#cfaq_linkTabGeneral" aria-controls="general" role="tab" data-toggle="tab" ><span class="glyphicon glyphicon-cog" ></span > ' . __('Link conditions', 'cfaq') . ' </a ></li >
                </ul >';
        echo '<div class="tab-content" >';
        echo '<div role="tabpanel" class="tab-pane active" id="cfaq_linkTabGeneral" >';

        echo '<div id="cfaq_linkInteractions" > ';
        echo '<div id="cfaq_linkStepsPreview">
                <div id="cfaq_linkOriginStep" class="cfaq_stepBloc "><div class="cfaq_stepBlocWrapper"><h4 id="cfaq_linkOriginTitle"></h4></div> </div>
                <div id="cfaq_linkStepArrow"></div>
                <div id="cfaq_linkDestinationStep" class="cfaq_stepBloc  "><div class="cfaq_stepBlocWrapper"><h4 id="cfaq_linkDestinationTitle"></h4></div></div>
              </div>';
        echo '<p>'
        . '<select id="cfaq_linkOperator" class="form-control">'
        . '<option value="">' . __('All conditions must be filled', 'cfaq') . '</option>'
        . '<option value="OR">' . __('One of the conditions must be filled', 'cfaq') . '</option>'
        . '</select>'
        . '<a href="javascript:" class="btn btn-primary" onclick="cfaq_addLinkInteraction();" ><span class="glyphicon glyphicon-plus" ></span > ' . __('Add a condition', 'cfaq') . ' </a></p> ';
        echo '<table id="cfaq_conditionsTable" class="table">
                <thead>
                    <tr>
                        <th>' . __('Element', 'cfaq') . '</th>
                        <th>' . __('Condition', 'cfaq') . '</th>
                        <th>' . __('Value', 'cfaq') . '</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
              </table>';

        echo '<div class="row" ><div class="col-md-12" ><p style="padding-left: 16px;padding-right: 16px; text-align: center;">'
        . '   <a href="javascript:" onclick="cfaq_linkSave();" class="btn btn-primary" style="margin-top: 24px; margin-right: 8px;" ><span class="glyphicon glyphicon-ok" ></span > ' . __('Save', 'cfaq') . ' </a >
              <a href="javascript:" onclick="cfaq_linkDel();" class="btn btn-danger" style="margin-top: 24px;" ><span class="glyphicon glyphicon-trash" ></span > ' . __('Delete', 'cfaq') . ' </a ></p ></div></div> ';

        echo '<div class="clearfix"></div>';
        echo '</div> '; // eof row
        echo '</div> '; // eof cfaq_linkInteractions
        echo '</div> '; // eof tabpanel
        echo '</div> '; // eof tab-content
        echo '</div> '; // eof cfaq_container

        echo '</div> '; //eof cfaq_winLink

        echo '<div id="cfaq_winShortcode" class="modal fade ">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">' . __('Shortcode', 'cfaq') . '</h4>
                    </div>
                    <div class="modal-body">
                       <p style="margin-bottom: 0px;"><strong>' . __('Integrate the FAQ in a page', 'cfaq') . ':</strong></p>
                       <input id="cfaq_shortcode_1" readonly class="cfaq_shortcodeInput" onclick="cfaq_selectPre(this);" value="[clever_faq faq=' . "&quot;" . '1' . "&quot;" . ']"/>
                       </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->';

        echo '<div id="cfaq_panelPreview">';
        echo '<div class="clearfix"></div>';
        echo '<div style="max-width: 90%;margin: 0 auto;margin-top: 18px;" id="cfaq_formTopbtns">
                <p class="text-right" style="float:right;">
                 <a href="javascript:" style="margin-right: 12px;" onclick="cfaq_addStep( \'' . __('My Step', 'cfaq') . '\');" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>' . __("Add a step", 'cfaq') . '</a>
                <a href="javascript:" id="cfaq_btnPreview" target="_blank" style="margin-right: 12px;"  class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span>' . __("View the FAQ", 'cfaq') . '</a>
                <a href="javascript:" onclick="cfaq_showShortcodeWin();" style="margin-right: 12px;"  class="btn btn-default"><span class="glyphicon glyphicon-info-sign"></span>' . __('Shortcode', 'cfaq') . '</a>
                <a href="javascript:" data-toggle="modal" data-target="#modal_removeAllSteps" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>' . __("Remove all steps", 'cfaq') . '</a>
                </p>
                <h3 id="cfaq_stepsManagerTitle">' . __('Steps manager', 'cfaq') . '</h3>

                <div class="clearfix"></div>
            </div>
        ';

        echo '
        <!-- Modal -->
        <div class="modal fade" id="modal_removeAllSteps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                ' . __('Are you sure you want to delete all steps ?', 'cfaq') . '
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"  onclick="cfaq_removeAllSteps();" >' . __('Yes', 'cfaq') . '</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" >' . __('No', 'cfaq') . '</button>
              </div>
            </div>
          </div>
        </div>';

        echo '<div id="cfaq_stepsOverflow">';
        echo '<div id="cfaq_stepsContainer">';
        echo '<canvas id="cfaq_stepsCanvas"></canvas>';
        echo '</div>';
        echo '</div>';

        echo '<div id="cfaq_faqFields" style="max-width: 90%;margin: 0 auto;margin-top: 18px;" >
                <h3>' . __('FAQ settings', 'cfaq') . '</h3>
            <div role="tabpanel" >

              <!--Nav tabs-->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#cfaq_tabGeneral" aria-controls="general" role="tab" data-toggle="tab" ><span class="glyphicon glyphicon-cog" ></span > ' . __('Settings', 'cfaq') . ' </a ></li >
                <li role="presentation" class=""><a href="#cfaq_tabTexts" aria-controls="texts" role="tab" data-toggle="tab" ><span class="glyphicon glyphicon-font" ></span > ' . __('Texts', 'cfaq') . ' </a ></li >
                <li role="presentation" class=""><a href="#cfaq_tabDesign" aria-controls="design" role="tab" data-toggle="tab" ><span class="glyphicon glyphicon-tint" ></span > ' . __('Design', 'cfaq') . ' </a ></li >
            
                </ul >

              <!--Tab panes-->
              <div class="tab-content" >
                <div role="tabpanel" class="tab-pane active" id="cfaq_tabGeneral" >
                    <div class="row-fluid">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>' . __('Title of the FAQ', 'cfaq') . '</label>
                                <input type="text" name="title" class="form-control"/>
                                   <small> ' . __('This title will be displayed on top of the F.A.Q', 'cfaq') . '</small>
                            </div>    
                            <div class="form-group">
                                <label>' . __('Send new questions by email ?', 'cfaq') . '</label>
                                <input type="checkbox"  name="sendEmail" data-toggle="switch" data-on-label="' . __('Yes', 'cfaq') . '" data-off-label="' . __('No', 'cfaq') . '" />   
                                <small>' . __('If enabled, the new suestions will be sent to the defined email', 'cfaq') . '</small>
                            </div>
                            <div class="form-group">
                                <label>' . __('Admin email', 'cfaq') . '</label>
                                <input type="text" name="email" class="form-control"/>
                                <small> ' . __('The new questions will be sent to this address', 'cfaq') . '</small>
                            </div> 
                            <div class="form-group">
                                <label>' . __('Email subject', 'cfaq') . '</label>
                                <input type="text" name="emailSubject" class="form-control"/>
                                <small> ' . __('Something like "New question from your website"', 'cfaq') . '</small>
                            </div> 
                            <div class="form-group">
                                <label>' . __('Delay before restart the faq when the user has submitted a question', 'cfaq') . '</label>
                                <input type="number" step="0.1" name="resetDelay" class="form-control"/>
                                <small> ' . __('Enter a delay in seconds', 'cfaq') . '</small>
                            </div>      
                             <div class="form-group" >
                                <label > ' . __('Ajax navigation support', 'cfaq') . ' </label >
                                <input type="checkbox"  name="loadAllPages" data-toggle="switch" data-on-label="' . __('Yes', 'cfaq') . '" data-off-label="' . __('No', 'cfaq') . '" class=""   />
                                <small> ' . __('Activate this option if your theme uses ajax navigation to display pages', 'cfaq') . ' </small>
                            </div>   
                             <div class="form-group" >
                                <label > ' . __('Tag used for titles', 'cfaq') . ' </label >
                                <select  name="titlesTag"class="form-control">
                                <option value="h1">H1</option>
                                <option value="h2">H2</option>
                                <option value="h3">H3</option>
                                <option value="h4">H4</option>
                                <option value="h5">H5</option>
                                </select>
                                <small> ' . __('The selected tag will be used for the titles of the steps', 'cfaq') . ' </small>
                            </div> 
                            
                        </div>
                        <div class="col-md-6">
                            <p>'.__('New questions asked by users','cfaq').' :</p>
                            <table id="cfaq_newQuestions" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>'.__('Date','cfaq').'</th>
                                        <th>'.__('Question','cfaq').'</th>
                                        <th>'.__("User's email",'cfaq').'</th>
                                        <th style="min-width: 150px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>   
                             <p style="text-align:center;"><a href="javascript:" class="btn btn-primary" onclick="cfaq_saveFaq();"><span class="glyphicon glyphicon-floppy-disk"></span>' . __('Save', 'cfaq') . '</a>
                        <div class="clearfix"></div>                          
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="cfaq_tabTexts" >
                    <div class="row-fluid">
                        <div class="col-md-6">                                                   
                            <div class="form-group">
                                <label>' . __('Text "I don\'t see my question"', 'cfaq') . '</label>
                                <input type="text" name="txtNoQuestion" class="form-control"/>
                                <small> ' . __('Something like "I don\'t see my question in the list"', 'cfaq') . '</small>
                            </div>                                           
                            <div class="form-group">
                                <label>' . __('Text "Restart the F.A.Q"', 'cfaq') . '</label>
                                <input type="text" name="txtReturnStart" class="form-control"/>
                                <small> ' . __('Something like "Restart the F.A.Q"', 'cfaq') . '</small>
                            </div>                                      
                            <div class="form-group">
                                <label>' . __('Text "Previous step"', 'cfaq') . '</label>
                                <input type="text" name="txtPreviousStep" class="form-control"/>
                                <small> ' . __('Something like "Return to the previous step"', 'cfaq') . '</small>
                            </div> 
                            
                            
                            <div class="form-group">
                                <label>' . __('Label "Your question"', 'cfaq') . '</label>
                                <input type="text" name="labelQuestion" class="form-control"/>
                                   <small> ' . __('Something like "Your question"', 'cfaq') . '</small>
                            </div>    
                            <div class="form-group">
                                <label>' . __('Label "Your email"', 'cfaq') . '</label>
                                <input type="text" name="labelEmail" class="form-control"/>
                                   <small> ' . __('Something like "Your email"', 'cfaq') . '</small>
                            </div>     
                            <div class="form-group">
                                <label>' . __('Label "Send"', 'cfaq') . '</label>
                                <input type="text" name="labelSend" class="form-control"/>
                                   <small> ' . __('Something like "Send"', 'cfaq') . '</small>
                            </div>        
                            
                        </div>
                        
                        <div class="col-md-6">
                         <div class="form-group">
                                <label style="width: 100%;">' . __('Text after submitting a new question', 'cfaq') . '</label>
                                <div id="cfaq_txtNewQuestion"></div>
                                <!--<textarea type="text" name="txtNewQuestion" class="form-control"></textarea>-->
                                <small> ' . __('Something like "Your request was correctly sent, we will reply as soon as possible. Thank you !"', 'cfaq') . '</small>
                            </div>                    
                        </div>
                       
                        <div class="clearfix"></div>   
                        
                             <p style="text-align:center;"><a href="javascript:" class="btn btn-primary" onclick="cfaq_saveFaq();"><span class="glyphicon glyphicon-floppy-disk"></span>' . __('Save', 'cfaq') . '</a>
                        <div class="clearfix"></div>  
                    </div>
                </div>
                
                 <div role="tabpanel" class="tab-pane" id="cfaq_tabDesign" >
                 <div class="col-md-6">
                  <div class="form-group" >
                                <label > ' . __('Title color', 'cfaq') . ' </label >
                                <input type="text" name="colorE" class="form-control colorpick" />
                                <small> ' . __('ex : #000000', 'cfaq') . '</small>
                            </div>      
                            <div class="form-group" >
                                <label > ' . __('Question background color', 'cfaq') . ' </label >
                                <input type="text" name="colorB" class="form-control colorpick" />
                                <small> ' . __('ex : #ecf0f1', 'cfaq') . '</small>
                            </div>                                  
                            <div class="form-group" >
                                  <label > ' . __('Question text color', 'cfaq') . ' </label >
                                  <input type="text" name="colorC" class="form-control colorpick" />
                                  <small> ' . __('ex : #bdc3c7', 'cfaq') . '</small>
                            </div>  
                            <div class="form-group" >
                                <label > ' . __('Answers background color', 'cfaq') . ' </label >
                                <input type="text" name="colorA" class="form-control colorpick" />
                                <small> ' . __('ex : #1abc9c', 'cfaq') . '</small>
                            </div>       
                            <div class="form-group" >
                                <label > ' . __('Answers text color', 'cfaq') . ' </label >
                                <input type="text" name="colorD" class="form-control colorpick" />
                                <small> ' . __('ex : #FFFFFF', 'cfaq') . '</small>
                            </div>    
                            

                            <div class="form-group" >
                                <label > ' . __('Fields background color', 'cfaq') . ' </label >
                                <input type="text" name="colorFieldsBg" class="form-control colorpick" />
                                <small> ' . __('ex : #FFFFFF', 'cfaq') . '</small>
                            </div>    
                            <div class="form-group" >
                                <label > ' . __('Fields text color', 'cfaq') . ' </label >
                                <input type="text" name="colorFields" class="form-control colorpick" />
                                <small> ' . __('ex : #34495e', 'cfaq') . '</small>
                            </div>    
                            <div class="form-group" >
                                <label > ' . __('Fields border color', 'cfaq') . ' </label >
                                <input type="text" name="colorFieldsBorder" class="form-control colorpick" />
                                <small> ' . __('ex : #bdc3c7', 'cfaq') . '</small>
                            </div>   
                            <div class="form-group" >
                                <label > ' . __('Fields focus color', 'cfaq') . ' </label >
                                <input type="text" name="colorFieldsFocus" class="form-control colorpick" />
                                <small> ' . __('ex : #1bc2a1', 'cfaq') . '</small>
                            </div>   
                            <div class="form-group" >
                                <label > ' . __('Restart background color', 'cfaq') . ' </label >
                                <input type="text" name="colorRestartBg" class="form-control colorpick" />
                                <small> ' . __('ex : #bdc3c7', 'cfaq') . '</small>
                            </div>   
                            <div class="form-group" >
                                <label > ' . __('Restart color', 'cfaq') . ' </label >
                                <input type="text" name="colorRestart" class="form-control colorpick" />
                                <small> ' . __('ex : #ecf0f1', 'cfaq') . '</small>
                            </div>   
                           
                 </div>
                 <div class="col-md-6">          
                            <div class="form-group" >
                                <label > ' . __('Background color', 'cfaq') . ' </label >
                                <input type="text" name="colorF" class="form-control colorpick" />
                                <small> ' . __('ex : #FFFFFF', 'cfaq') . '</small>
                            </div>             
                            <div class="form-group" >
                                <label > ' . __('Labels color', 'cfaq') . ' </label >
                                <input type="text" name="colorLabels" class="form-control colorpick" />
                                <small> ' . __('ex : #384f66', 'cfaq') . '</small>
                            </div>  
                            <div class="form-group" >
                                <label > ' . __('Buttons background color', 'cfaq') . ' </label >
                                <input type="text" name="colorBtnBg" class="form-control colorpick" />
                                <small> ' . __('ex : #1bc2a1', 'cfaq') . '</small>
                            </div>    
                            <div class="form-group" >
                                <label > ' . __('Buttons text color', 'cfaq') . ' </label >
                                <input type="text" name="colorBtn" class="form-control colorpick" />
                                <small> ' . __('ex : #FFFFFF', 'cfaq') . '</small>
                            </div>    
                            <div class="form-group" >
                                <label > ' . __('Question not found text color', 'cfaq') . ' </label >
                                <input type="text" name="colorG" class="form-control colorpick" />
                                <small> ' . __('ex : #FFFFFF', 'cfaq') . '</small>
                            </div>    
                            <div class="form-group" >
                                <label > ' . __('Question not found background color', 'cfaq') . ' </label >
                                <input type="text" name="colorH" class="form-control colorpick" />
                                <small> ' . __('ex : #e67e22', 'cfaq') . '</small>
                            </div> 
                            <div class="form-group">
                                <label>' . __('Use Google font ?', 'cfaq') . '</label>
                                <input type="checkbox"  name="useGoogleFont" data-toggle="switch" data-on-label="' . __('Yes', 'cfaq') . '" data-off-label="' . __('No', 'cfaq') . '" />   
                                <small>' . __('If disabled, the default theme font will be used', 'cfaq') . '</small>
                            </div>
                        <div class="form-group" >
                           <label > ' . __('Google font name', 'cfaq') . ' </label >
                           <input type="text" name="googleFontName" class="form-control" />
                           <a href="https://www.google.com/fonts" style="margin-left: 14px; display: inline-block;" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-list"></span>' . __('See available Google fonts', 'cfaq') . '</a>        

                           <small> ' . __('ex : Lato', 'cfaq') . '</small>
                    </div>    
                     <div class="form-group">
                            <label style="width:100%;">' . __('Custom CSS', 'cfaq') . '</label>
                            <textarea  class="form-control" name="customCss" style="height: 152px;max-width: 100%;"></textarea>   
                            <small>' . __('You can paste your custom CSS rules here', 'cfaq') . '</small>
                        </div>    
                </div>
                 <div class="clearfix"></div>  
                             <p style="text-align:center;"><a href="javascript:" class="btn btn-primary" onclick="cfaq_saveFaq();"><span class="glyphicon glyphicon-floppy-disk"></span>' . __('Save', 'cfaq') . '</a>
                        <div class="clearfix"></div>  
                </div>

              </div>
            </div>
        </div>';

        echo '</div>'; // eof cfaq_panelPreview

        echo '<div id="cfaq_winImport" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">' . __('Import data', 'cfaq') . '</h4>
                    </div>
                    <div class="modal-body">
                     <div class="alert alert-danger"><p style="text-align: center;">' . __('Be carreful : all existing F.A.Q and steps will be erased importing new data.', 'cfaq') . '</p></div>
                         <form id="cfaq_winImportFaq" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                              <input type="hidden" name="action" value="cfaq_importFaqs"/>
                              <label>' . __('Select the .zip data file', 'cfaq') . '</label><input name="importFile" type="file" class="" />
                             </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                      <a href="javascript:" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>' . __('Cancel', 'cfaq') . '</a>
                      <a href="javascript:" class="btn btn-primary" onclick="cfaq_importFaqs();"><span class="glyphicon glyphicon-floppy-disk"></span>' . __('Import', 'cfaq') . '</a>
                  </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->';


        echo '<div id="cfaq_winExport" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">' . __('Export data', 'cfaq') . '</h4>
                      </div>
                      <div class="modal-body">
                        <p style="text-align: center;"><a href="' . $this->parent->assets_url . '../tmp/export_clever_faq.json" download  onclick="jQuery(\'#cfaq_winExport\').modal(\'hide\');" class="btn btn-primary btn-lg" id="cfaq_exportLink"><span class="glyphicon glyphicon-floppy-disk"></span>' . __('Download the exported data', 'cfaq') . '</a></p>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->';

        echo '</div>'; // eof #cfaq_bootstraped
    }

    public function duplicateFaq() {
        if (current_user_can('manage_options')) {
        global $wpdb;
        $table_name = $wpdb->prefix . "cfaq_faqs";
        $faqID = sanitize_text_field($_POST['faqID']);

        $table_faqs = $wpdb->prefix . "cfaq_faqs";
        $table_steps = $wpdb->prefix . "cfaq_steps";
        $table_items = $wpdb->prefix . "cfaq_items";
        $table_links = $wpdb->prefix . "cfaq_links";
        
        $faqs = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_faqs WHERE id=%s LIMIT 1", $faqID));
        $faq = $faqs[0];
        unset($faq->id);
        $faq->title = $faq->title . ' (1)';
        $wpdb->insert($table_faqs, (array) $faq);
        $newFaqID = $wpdb->insert_id;

        $stepsReplacement = array();
        $itemsReplacement = array();

        $steps = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_steps WHERE faqID=%s LIMIT 1", $faqID));
        foreach ($steps as $step) {
            $step->faqID = $newFaqID;
            $stepID = $step->id;
            unset($step->id);
            $wpdb->insert($table_steps, (array) $step);
            $newStepID = $wpdb->insert_id;
            $stepsReplacement[$stepID] = $newStepID;

            $items = $wpdb->get_results("SELECT * FROM $table_items WHERE stepID=$stepID");
            foreach ($items as $item) {
                $itemID = $item->id;
                unset($item->id);
                $item->stepID = $newStepID;
                $item->faqID = $newFaqID;
                $wpdb->insert($table_items, (array) $item);
                $newItemID = $wpdb->insert_id;

                $itemsReplacement[$itemID] = $newItemID;
            }
        }
        $links = $wpdb->get_results("SELECT * FROM $table_links WHERE faqID=$faqID");
        foreach ($links as $link) {
            unset($link->id);
            $link->originID = $stepsReplacement[$link->originID];
            $link->destinationID = $stepsReplacement[$link->destinationID];
            $link->faqID = $newFaqID;

            $conditions = json_decode($link->conditions);
            foreach ($conditions as $condition) {
                $oldStep = substr($condition->interaction, 0, strpos($condition->interaction, '_'));
                $oldItem = substr($condition->interaction, strpos($condition->interaction, '_') + 1);
                $condition->interaction = $stepsReplacement[$oldStep] . '_' . $itemsReplacement[$oldItem];
            }
            $wpdb->insert($table_links, array('conditions' => $this->jsonRemoveUnicodeSequences($conditions), 'originID' => $link->originID, 'destinationID' => $link->destinationID, 'faqID' => $newFaqID));
        }
        }

        die();
    }

    private function jsonRemoveUnicodeSequences($struct) {
        return json_encode($struct);
    }

    public function saveFaq() {
        if (current_user_can('manage_options')) {
            global $wpdb;
            $table_name = $wpdb->prefix . "cfaq_faqs";
            $faqID = sanitize_text_field($_POST['faqID']);
            $sqlDatas = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'action' && $key != 'id' && $key != 'pll_ajax_backend' && $key != "undefined" && $key != "faqID" && $key != "files") {
                    $sqlDatas[$key] = (stripslashes($value));
                }
            }
            if ($faqID > 0) {
                $wpdb->update($table_name, $sqlDatas, array('id' => $faqID));
                $response = $faqID;
            } else {
                if (isset($_POST['title'])) {
                    $wpdb->insert($table_name, $sqlDatas);
                    $lastid = $wpdb->insert_id;
                    $response = $lastid;
                }
            }
            echo $response;
        }
        die();
    }

    public function removeFaq() {
        global $wpdb;
        $faqID = sanitize_text_field($_POST['faqID']);
        $table_name = $wpdb->prefix . "cfaq_faqs";
        $wpdb->delete($table_name, array('id' => $faqID));
        $table_name = $wpdb->prefix . "cfaq_steps";
        $wpdb->delete($table_name, array('faqID' => $faqID));
        $table_name = $wpdb->prefix . "cfaq_items";
        $wpdb->delete($table_name, array('faqID' => $faqID));
        die();
    }

    public function saveStepPosition() {
        global $wpdb;
        $stepID = sanitize_text_field($_POST['stepID']);
        $posX = sanitize_text_field($_POST['posX']);
        $posY = sanitize_text_field($_POST['posY']);
        $table_name = $wpdb->prefix . "cfaq_steps";
        $step = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id=%s LIMIT 1", $stepID));
        $step = $step[0];
        $content = json_decode($step->content);
        $content->previewPosX = $posX;
        $content->previewPosY = $posY;

        $wpdb->update($table_name, array('content' => stripslashes($this->jsonRemoveUnicodeSequences($content))), array('id' => $stepID));
        die();
    }

    public function newLink() {
        global $wpdb;
        $faqID = sanitize_text_field($_POST['faqID']);
        $originID = sanitize_text_field($_POST['originStepID']);
        $destinationID = sanitize_text_field($_POST['destinationStepID']);
        $table_name = $wpdb->prefix . "cfaq_links";
        $wpdb->insert($table_name, array('originID' => $originID, 'destinationID' => $destinationID, 'conditions' => '[]', 'faqID' => $faqID));
        echo $wpdb->insert_id;
        die();
    }

    public function loadFaq() {
        global $wpdb;
        $faqID = sanitize_text_field($_POST['faqID']);
        $rep = new stdClass();
        $rep->steps = array();

        $table_name = $wpdb->prefix . "cfaq_faqs";
        $faqs = $wpdb->get_results("SELECT * FROM $table_name WHERE id=" . $faqID);
        $rep->faq = $faqs[0];
        if (!$rep->faq->colorBg || $rep->faq->colorBg == "") {
            $rep->faq->colorBg = "#ecf0f1";
        }

        $table_name = $wpdb->prefix . "cfaq_settings";
        $params = $wpdb->get_results("SELECT * FROM $table_name");
        $rep->params = $params[0];

        $table_name = $wpdb->prefix . "cfaq_steps";
        $steps = $wpdb->get_results("SELECT * FROM $table_name WHERE faqID=" . $faqID);
        foreach ($steps as $step) {
            $table_name = $wpdb->prefix . "cfaq_items";
            $items = $wpdb->get_results("SELECT * FROM $table_name WHERE stepID=" . $step->id . " ORDER BY ordersort ASC");
            $step->items = $items;
            $rep->steps[] = $step;
        }

        $table_name = $wpdb->prefix . "cfaq_links";
        $links = $wpdb->get_results("SELECT * FROM $table_name WHERE faqID=" . $faqID);
        $rep->links = $links;
        
        
        $table_name = $wpdb->prefix . "cfaq_questions";
        $questions = $wpdb->get_results("SELECT * FROM $table_name WHERE faqID=" . $faqID." ORDER BY id DESC");
        foreach ($questions as $question) {
            $question->date = date(get_option('date_format'), strtotime($question->dateStored));
        }
        $rep->questions = $questions;
        
        $table_name = $wpdb->prefix . "cfaq_settings";
        $params = $wpdb->get_results("SELECT * FROM $table_name");
        $rep->params = $params[0];

        echo($this->jsonRemoveUnicodeSequences($rep));
        die();
    }

    public function removeAllSteps() {
        if (current_user_can('manage_options')) {
        global $wpdb;
        $faqID = sanitize_text_field($_POST['faqID']);

        $table_name = $wpdb->prefix . "cfaq_steps";
        $steps = $wpdb->get_results("SELECT * FROM $table_name WHERE faqID=" . $faqID);
        foreach ($steps as $step) {
            $table_nameL = $wpdb->prefix . "cfaq_links";
            $wpdb->delete($table_nameL, array('originID' => $step->id));
            $wpdb->delete($table_nameL, array('destinationID' => $step->id));
        }

        $wpdb->delete($table_name, array('faqID' => $faqID));
        }
        die();
    }

    public function removeItem() {
        if (current_user_can('manage_options')) {
        global $wpdb;
        $faqID = sanitize_text_field($_POST['faqID']);
        $stepID = sanitize_text_field($_POST['stepID']);
        $itemID = sanitize_text_field($_POST['itemID']);

        $table_name = $wpdb->prefix . "cfaq_items";
        $wpdb->delete($table_name, array('id' => $itemID));


        $table_links = $wpdb->prefix . "cfaq_links";
        $links = $wpdb->get_results("SELECT * FROM $table_links WHERE faqID=$faqID");
        foreach ($links as $link) {
            // unset($link->id);

            $conditions = json_decode($link->conditions);
            $newConditions = array();

            foreach ($conditions as $condition) {
                $oldStep = substr($condition->interaction, 0, strpos($condition->interaction, '_'));
                $oldItem = substr($condition->interaction, strpos($condition->interaction, '_') + 1);
                if ($oldStep == $stepID && $oldItem == $itemID) {
                    
                } else {
                    $newConditions[] = $condition;
                }
            }
            $wpdb->update($table_links, array('conditions' => $this->jsonRemoveUnicodeSequences($newConditions)), array('id' => $link->id));
        }
        }
        die();
    }

    public function removeStep() {
        global $wpdb;
        if (current_user_can('manage_options')) {
        $table_name = $wpdb->prefix . "cfaq_steps";

        $wpdb->delete($table_name, array('id' => sanitize_text_field($_POST['stepID'])));
        $table_name = $wpdb->prefix . "cfaq_links";
        $wpdb->delete($table_name, array('originID' => sanitize_text_field($_POST['stepID'])));
        $wpdb->delete($table_name, array('destinationID' => sanitize_text_field($_POST['stepID'])));
        }
        die();
    }

    public function addStep() {
        global $wpdb;
        if (current_user_can('manage_options')) {
        $table_name = $wpdb->prefix . "cfaq_steps";
        $faqID = sanitize_text_field($_POST['faqID']);

        $data = new stdClass();
        $data->start = sanitize_text_field($_POST['start']);

        $stepsStart = $wpdb->get_results("SELECT * FROM $table_name WHERE faqID=" . $faqID . " AND start=1");
        if (count($stepsStart) == 0) {
            $data->start = 1;
        }

        if ($data->start == 1) {
            $steps = $wpdb->get_results("SELECT * FROM $table_name WHERE faqID=" . $faqID . " AND start=1");
            foreach ($steps as $step) {
                $dataContent = json_decode($step->content);
                $dataContent->start = 0;
                $wpdb->update($table_name, array('content' => $this->jsonRemoveUnicodeSequences($dataContent), 'start' => 0), array('id' => $data->id));
            }
        }
        $data->previewPosX = sanitize_text_field($_POST['previewPosX']);
        $data->previewPosY = sanitize_text_field($_POST['previewPosY']);
        $data->actions = array();
        
        $title = __('My Step', 'cfaq');
        
        if(isset($_POST['title']) && $_POST['title'] != ""){
            $title= sanitize_text_field($_POST['title']);
        }



        $wpdb->insert($table_name, array('content' => $this->jsonRemoveUnicodeSequences($data), 'title' => $title, 'faqID' => $faqID, 'start' => $data->start));
        $data->id = $wpdb->insert_id;
        $wpdb->update($table_name, array('content' => $this->jsonRemoveUnicodeSequences($data), 'faqID' => $faqID), array('id' => $data->id));
        echo json_encode((array) $data);
        }
        die();
    }

    public function loadStep() {
        global $wpdb;
        if (current_user_can('manage_options')) {
        $rep = new stdClass();
        $table_name = $wpdb->prefix . "cfaq_steps";
        $step = $wpdb->get_results("SELECT * FROM $table_name WHERE id='" . sanitize_text_field($_POST['stepID']) . "' LIMIT 1");
        $rep->step = $step[0];
        $table_name = $wpdb->prefix . "cfaq_items";
        $items = $wpdb->get_results("SELECT * FROM $table_name WHERE stepID='" . sanitize_text_field($_POST['stepID']) . "' ORDER BY ordersort ASC");
        $rep->items = $items;
        echo $this->jsonRemoveUnicodeSequences((array) $rep);
        }
        die();
    }

    public function saveItem() {
        global $wpdb;
        if (current_user_can('manage_options')) {
            $faqID = sanitize_text_field($_POST['faqID']);
            $stepID = sanitize_text_field($_POST['stepID']);
            $itemID = sanitize_text_field($_POST['id']);

            $table_name = $wpdb->prefix . "cfaq_items";

            $sqlDatas = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'action' && $key != 'id' && $key != 'pll_ajax_backend' && $key != "undefined" && $key != 'files') {
                    $sqlDatas[$key] = stripslashes($value);
                }
            }
            if ($itemID > 0) {
                $wpdb->update($table_name, $sqlDatas, array('id' => $itemID));
                $response = $_POST['id'];
            } else {
                $sqlDatas['faqID'] = $faqID;
                $sqlDatas['stepID'] = $stepID;
                $wpdb->insert($table_name, $sqlDatas);
                $itemID = $wpdb->insert_id;
            }
            echo $itemID;
        }
        die();
    }

    public function saveStep() {
        global $wpdb;
        if (current_user_can('manage_options')) {
            $faqID = sanitize_text_field($_POST['faqID']);
            $stepID = sanitize_text_field($_POST['id']);
            $itemsList = sanitize_text_field($_POST['itemsList']);

            $itemsListArray = explode('|', $itemsList);
            foreach ($itemsListArray as $value) {
                $itemArray = explode('°', $value);

                $table_name = $wpdb->prefix . "cfaq_items";
                $wpdb->update($table_name, array('title' => stripslashes($itemArray[0]), 'stepID' => $stepID, 'faqID' => $faqID), array('id' => $itemArray[1]));
            }

            $table_name = $wpdb->prefix . "cfaq_steps";
            $sqlDatas = array();
            foreach ($_POST as $key => $value) {
                if ($key != 'action' && $key != 'id' && $key != 'pll_ajax_backend' && $key != 'itemsList' && $key != "files" && $key != "undefined") {
                    $sqlDatas[$key] = (stripslashes($value));
                }
            }

            if ($stepID > 0) {
                $wpdb->update($table_name, $sqlDatas, array('id' => $stepID));
                $response = sanitize_text_field($_POST['id']);
            } else {
                $sqlDatas['faqID'] = $faqID;
                $wpdb->insert($table_name, $sqlDatas);
                $stepID = $wpdb->insert_id;
            }
            echo $stepID;
        }
        die();
    }

    public function saveLinks() {
        if (current_user_can('manage_options')) {
            global $wpdb;
            $faqID = sanitize_text_field($_POST['faqID']);
            $table_name = $wpdb->prefix . "cfaq_links";
            if (substr(sanitize_text_field($_POST['links']), 0, 1) == '[' && $faqID != "") {
                $links = json_decode(stripslashes($_POST['links']));

                $existingLinks = $wpdb->get_results("SELECT * FROM $table_name WHERE faqID=" . $faqID);
                if (count($existingLinks) > 1 && count($links) == 0) {
                    
                } else {
                    $wpdb->query("DELETE FROM $table_name WHERE faqID=" . $faqID . " AND id>0");
                    foreach ($links as $link) {
                        if (isset($link->destinationID) && $link->destinationID > 0) {
                            $wpdb->insert($table_name, array('faqID' => $faqID, 'operator' => $link->operator, 'originID' => $link->originID, 'destinationID' => $link->destinationID, 'conditions' => $this->jsonRemoveUnicodeSequences($link->conditions)));
                        }
                    }
                }
            }
            echo '1';
            die();
        }
    }

    public function duplicateStep() {
        if (current_user_can('manage_options')) {
            global $wpdb;
            $table_name = $wpdb->prefix . "cfaq_steps";
            $stepID = sanitize_text_field($_POST['stepID']);
            $steps = $wpdb->get_results("SELECT * FROM $table_name WHERE id=" . $stepID);
            $step = $steps[0];
            $step->title = $step->title . ' (1)';
            $step->start = 0;
            unset($step->id);

            $content = json_decode($step->content);
            $content->previewPosX += 40;
            $content->previewPosY += 40;
            $content->start = 0;
            $step->content = stripslashes($this->jsonRemoveUnicodeSequences($content));

            //$wpdb->insert($table_name, array('content' => $this->jsonRemoveUnicodeSequences($content), 'start' => 0,'title'=>$step->title,'itemRequired'=>$step->itemRequired ));
            $wpdb->insert($table_name, (array) $step);
            $newID = $wpdb->insert_id;

            $table_name = $wpdb->prefix . "cfaq_items";
            $items = $wpdb->get_results("SELECT * FROM $table_name WHERE stepID=$stepID");
            foreach ($items as $item) {
                $item->stepID = $newID;
                unset($item->id);
                $wpdb->insert($table_name, (array) $item);
            }
            die();
        }
    }

    public function duplicateItem() {
        if (current_user_can('manage_options')) {
            global $wpdb;
            $table_name = $wpdb->prefix . "cfaq_items";
            $itemID = sanitize_text_field($_POST['itemID']);
            $items = $wpdb->get_results("SELECT * FROM $table_name WHERE id=" . $itemID);
            $item = $items[0];
            $item->title = $item->title . ' (1)';
            unset($item->id);
            $wpdb->insert($table_name, (array) $item);
        }
        die();
    }

    public function changeItemsOrders() {
        if (current_user_can('manage_options')) {
            global $wpdb;
            $items = sanitize_text_field($_POST['items']);
            $items = explode(',', $items);
            $table_name = $wpdb->prefix . "cfaq_items";
            foreach ($items as $key => $value) {
                $wpdb->update($table_name, array('ordersort' => $key), array('id' => $value));
            }
        }
        die();
    }

    public function importFaqs() {
        if (current_user_can('manage_options')) {
            global $wpdb;
            $displayFaq = true;
            $settings = $this->getSettings();
            $code = $settings->purchaseCode;
            if (isset($_FILES['importFile'])) {
                $error = false;
                if (!is_dir(plugin_dir_path(__FILE__) . '../tmp')) {
                    mkdir(plugin_dir_path(__FILE__) . '../tmp');
                }
                    chmod(plugin_dir_path(__FILE__) . '../tmp', 0747);

                $target_path = plugin_dir_path(__FILE__) . '../tmp/export_clever_faq.json';
                if (@move_uploaded_file($_FILES['importFile']['tmp_name'], $target_path)) {

                    $faqsData = array();

                    $jsonfilename = 'export_clever_faq.json';
                    if (!file_exists(plugin_dir_path(__FILE__) . '../tmp/export_clever_faq.json')) {
                        $jsonfilename = 'export_clever_faq';
                    }

                    $file = file_get_contents(plugin_dir_path(__FILE__) . '../tmp/' . $jsonfilename);
                    $dataJson = json_decode($file, true);

                    $table_name = $wpdb->prefix . "cfaq_faqs";
                    $wpdb->query("TRUNCATE TABLE $table_name");
                    if (array_key_exists('faqs', $dataJson)) {
                        foreach ($dataJson['faqs'] as $key => $value) {
                            $wpdb->insert($table_name, $value);
                        }
                    }


                    $table_name = $wpdb->prefix . "cfaq_steps";
                    $wpdb->query("TRUNCATE TABLE $table_name");
                    $prevPosX = 40;
                    $firstStep = false;
                    foreach ($dataJson['steps'] as $key => $value) {
                        if (!array_key_exists('faqID', $value)) {
                            $value['faqID'] = 1;
                        }
                        if (!array_key_exists('content', $value)) {
                            $start = 0;
                            if (!$firstStep && $value['ordersort'] == 0) {
                                $start = 1;
                                $value['start'] = 1;
                                $firstStep = true;
                            }
                            $value['content'] = '{"start":"' . $start . '","previewPosX":"' . $prevPosX . '","previewPosY":"140","actions":[],"id":' . $value['id'] . '}';
                            $prevPosX += 200;
                        }
                        $wpdb->insert($table_name, $value);
                    }

                    $table_name = $wpdb->prefix . "cfaq_links";
                    $wpdb->query("TRUNCATE TABLE $table_name");
                    if (array_key_exists('links', $dataJson)) {
                        foreach ($dataJson['links'] as $key => $value) {
                            $wpdb->insert($table_name, $value);
                        }
                    }
                    
                    $table_name = $wpdb->prefix . "cfaq_questions";
                    $wpdb->query("TRUNCATE TABLE $table_name");
                    foreach ($dataJson['questions'] as $key => $value) {
                        $wpdb->insert($table_name, $value);
                    }
                    
                    // Check links
                    $table_name = $wpdb->prefix . "cfaq_faqs";
                    $faqs = $wpdb->get_results("SELECT * FROM $table_name");
                    foreach ($faqs as $faq) {
                        $table_name = $wpdb->prefix . "cfaq_links";
                        $links = $wpdb->get_results("SELECT * FROM $table_name WHERE faqID=" . $faq->id);
                        if (count($links) == 0) {

                            $stepStartID = 0;
                            $stepStart = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "cfaq_steps WHERE start=1 AND faqID=" . $faq->id);
                            if (count($stepStart) > 0) {
                                $stepStart = $stepStart[0];
                                $stepStartID = $stepStart->id;
                            }
                            $steps = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "cfaq_steps WHERE faqID=" . $faq->id . " AND start=0 ORDER BY ordersort ASC, id ASC");
                            $i = 0;
                            $prevStepID = 0;
                            foreach ($steps as $step) {
                                if ($i == 0 && $stepStartID > 0) {
                                    $wpdb->insert($wpdb->prefix . "cfaq_links", array('originID' => $stepStartID, 'destinationID' => $step->id, 'faqID' => $faq->id, 'conditions' => '[]'));
                                } else if ($i > 0 && $prevStepID > 0) {
                                    $wpdb->insert($wpdb->prefix . "cfaq_links", array('originID' => $prevStepID, 'destinationID' => $step->id, 'faqID' => $faq->id, 'conditions' => '[]'));
                                }
                                $prevStepID = $step->id;
                                $i++;
                            }
                        }
                    }

                    $table_name = $wpdb->prefix . "cfaq_items";
                    $wpdb->query("TRUNCATE TABLE $table_name");
                    foreach ($dataJson['items'] as $key => $value) {
                        $wpdb->insert($table_name, $value);
                    }
                    $files = glob(plugin_dir_path(__FILE__) . '../tmp/*');
                    foreach ($files as $file) {
                        if (is_file($file))
                            unlink($file);
                    }
                } else {
                    $error = true;
                }
                if ($error) {
                    echo __('An error occurred during the transfer', 'cfaq');
                    die();
                } else {
                    $displayFaq = false;
                    echo 1;
                    die();
                }
            }
        }
    }

    public function exportFaqs() {
        if (current_user_can('manage_options')) {
            global $wpdb;
            if (!is_dir(plugin_dir_path(__FILE__) . '../tmp')) {
                mkdir(plugin_dir_path(__FILE__) . '../tmp');
                chmod(plugin_dir_path(__FILE__) . '../tmp', 0747);
            }

            $destination = plugin_dir_path(__FILE__) . '../tmp/export_clever_faq.json';
            if (file_exists($destination)) {
                unlink($destination);
            }

            $jsonExport = array();
            $table_name = $wpdb->prefix . "cfaq_settings";
            $settings = $this->getSettings();
            $settings->purchaseCode = "";
            $jsonExport['settings'] = array();
            $jsonExport['settings'][] = $settings;


            $table_name = $wpdb->prefix . "cfaq_faqs";
            $faqs = array();
            foreach ($wpdb->get_results("SELECT * FROM $table_name") as $key => $row) {
                $faqs[] = $row;
            }
            $jsonExport['faqs'] = $faqs;


            $table_name = $wpdb->prefix . "cfaq_steps";
            $steps = array();
            foreach ($wpdb->get_results("SELECT * FROM $table_name") as $key => $row) {
                $steps[] = $row;
            }
            $jsonExport['steps'] = $steps;

            $table_name = $wpdb->prefix . "cfaq_links";
            $steps = array();
            foreach ($wpdb->get_results("SELECT * FROM $table_name") as $key => $row) {
                $steps[] = $row;
            }
            $jsonExport['links'] = $steps;


            $table_name = $wpdb->prefix . "cfaq_items";
            $items = array();
            foreach ($wpdb->get_results("SELECT * FROM $table_name") as $key => $row) {
                $items[] = $row;
            }
            $jsonExport['items'] = $items;
            
            $table_name = $wpdb->prefix . "cfaq_questions";
            $questions = array();
            foreach ($wpdb->get_results("SELECT * FROM $table_name") as $key => $row) {
                $questions[] = $row;
            }
            $jsonExport['questions'] = $questions;
            
            $fp = fopen(plugin_dir_path(__FILE__) . '../tmp/export_clever_faq.json', 'w');
            fwrite($fp, json_encode($jsonExport));
            fclose($fp);

            echo '1';
            die();
        }
    }

    /**
     * Main Instance
     *
     *
     * @since 1.0.0
     * @static
     * @return Main instance
     */
    public static function instance($parent) {
        if (is_null(self::$_instance)) {
            self::$_instance = new self($parent);
        }
        return self::$_instance;
    }

    // End instance()

    /**
     * Cloning is forbidden.
     *
     * @since 1.0.0
     */
    public function __clone() {
        _doing_it_wrong(__FUNCTION__, __(''), $this->parent->_version);
    }

// End __clone()

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 1.0.0
     */
    public function __wakeup() {
        _doing_it_wrong(__FUNCTION__, __(''), $this->parent->_version);
    }

// End __wakeup()
}
