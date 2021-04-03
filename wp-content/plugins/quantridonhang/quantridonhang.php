<?php
ob_start();
/*
    Plugin name: quantridonhang
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
    }       wp_enqueue_style( 'myStyleSheets');	/****************/add_action('admin_menu', 'menu_don_hang');	function menu_don_hang() {	//create new top-level menu    add_menu_page(__('Quản lý khách hàng đặt hàng','menu-quanlys'), __('Quản lý khách hàng đặt hàng','menu-quanlys'), 'edit_others_posts', 'khach_hang_dat_hang', 'load_don_hang_1',plugins_url('/images/st_logo.png', __FILE__) );     add_submenu_page('khach_hang_dat_hang', __('Xem chi tiết','menu-quanlys'), __('Xem chi tiết','menu-quanlys'), 'edit_others_posts', 'xem_chi_tiet', 'load_don_hang_2');       add_submenu_page('lich_su_mua_hang', __('Xem chi tiết','menu-quanlys'), __('Xem chi tiết','menu-quanlys'), 'edit_others_posts', 'lich_su_mua_hang', 'load_don_hang_3'); 	  }function load_don_hang_1() {    global $wp_db;    global $table_name;    include('danh_sach_don_hang.php');}function load_don_hang_2() {    global $wp_db;    global $table_name;    include('xem_chi_tiet.php');}function load_don_hang_3() {    global $wp_db;    global $table_name;    include('lich_su_mua_hang.php');}
?>