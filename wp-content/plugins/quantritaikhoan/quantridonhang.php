<?php
ob_start();
/*
    Plugin name: quantritaikhoan
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
    }       wp_enqueue_style( 'myStyleSheets');	/****************/add_action('admin_menu', 'menu_tai_khoan');	function menu_tai_khoan() {	//create new top-level menu    add_menu_page(__('Quản lý tài khoản','menu-quanlys'), __('Quản lý tài khoản','menu-quanlys'), 'edit_others_posts', 'quan_ly_tai_khoan', 'quan_tri_tai_khoan_1',plugins_url('/images/st_logo.png', __FILE__) );	  }function quan_tri_tai_khoan_1() {    global $wp_db;    global $table_name;    include('quan_tri_tai_khoan.php');}
?>