<?php
ob_start();/*
    Plugin name: quantrimagiamgia
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
    }       wp_enqueue_style( 'myStyleSheets');	/****************/add_action('admin_menu', 'news_create_menu_ma_giam_gia');	function news_create_menu_ma_giam_gia() {	//create new top-level menu    add_menu_page(__('Quản lý thông mã giả giá','menu-quanlysmagiamgia'), __('Quản lý thông mã giả giá','menu-quanlysmagiamgia'), 'edit_others_posts', 'quan-ly-ma-giam-gia', 'news_quan_ly_ma_giam_gia',plugins_url('/images/st_logo.png', __FILE__) );	 add_submenu_page('danh_sach_khach_hang_dung_ma', __('Xem chi tiết','menu-quanlysmagiamgia'), __('Xem chi tiết','menu-quanlysmagiamgia'), 'edit_others_posts', 'xem_chi_tiet_khach_hang', 'load_khach_hang');        }function news_quan_ly_ma_giam_gia() {    global $wp_db;    global $table_name;    include('quantrimagiamgia-list.php');}function load_khach_hang() {    global $wp_db;    global $table_name;    include('xem_chi_tiet.php');} 
?>