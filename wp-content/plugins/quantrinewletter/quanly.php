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
    }   
?>