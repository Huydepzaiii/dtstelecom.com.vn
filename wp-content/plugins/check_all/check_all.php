<?php

/*
Plugin Name: Check all
Plugin URI: http://itgreen.vn
Description: Check all taxonomy
Version: 1.1
Author: ITGREEN.VN
License: GPLv2 or later

    Copyright 2012 Izhaki  (email : PLUGIN AUTHOR EMAIL)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/function init_be_javascripts() {    if (is_admin()) {	$plugins_url = plugins_url();	 $plugins_url.="/check_all/check_all.js";         wp_enqueue_script( 'check_all', $plugins_url, 'jquery', 0.1, true );		          wp_enqueue_script('extra_be-script');    }}    add_action('init', 'init_be_javascripts');    ?>