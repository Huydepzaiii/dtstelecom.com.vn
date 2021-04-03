<?php
ob_start();
/*
    Plugin name: quanlynewlewter
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
    }       wp_enqueue_style( 'myStyleSheets');	/****************/add_action('admin_menu', 'news_create_menu');	function news_create_menu() {	//create new top-level menu    add_menu_page(__('Quản lý thông tin nhận mail','menu-quanlys'), __('Quản lý thông tin nhận mail','menu-quanlys'), 'edit_others_posts', 'quanlys-top-level-handle', 'news_menu_submenu_settings_page1',plugins_url('/images/st_logo.png', __FILE__) ); }function news_menu_submenu_settings_page1() {    global $wp_db;    global $table_name;    include('quanlynews-list.php');}function news_quanly_settings_page() {    global $wp_db;    global $table_name;    include('quanlynews-option.php');}
?>