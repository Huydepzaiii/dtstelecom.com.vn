<?php
ob_start();/*
    Plugin name: quantrigiasanpham
    Version: 1.0
    Description: Automatic setup News Post Type - News Funcion to template.
    Author: Mr Trung
    Author URI: http://itgreen.vn
    Plugin URI: http://itgreen.vn
*/
/* Version wordpress check*/
    global $wp_version;
    global $post;
    $exit_msg='This Plugin require Wordpress 3.0 or newer.<a href="http://codex.wordpress.org/Upgrading_Wordpress"></a>';
    if(version_compare($wp_version,"3.0","<"))
    {
        exit($exit_msg);
    }       wp_enqueue_style( 'myStyleSheets');	/****************/add_action('admin_menu', 'news_create_quantrigia');	function news_create_quantrigia() {	//create new top-level menu    add_menu_page(__('Quản lý giá sản phẩm','menu-quantrigia'), __('Quản lý Export giá sản phẩm','menu-quantrigia'), 'edit_others_posts', 'gia-san-pham', 'news_quantrigia',plugins_url('/images/st_logo.png', __FILE__) );	   }function news_quantrigia() {    global $wp_db;    global $table_name;    include('quantrigiasanpham.php');} 
?>