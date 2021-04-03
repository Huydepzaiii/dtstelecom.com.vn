<?php

/*
 * Plugin Name: WP Clever F.A.Q Builder
 * Version: 1.36
 * Plugin URI: http://codecanyon.net/user/loopus/portfolio
 * Description: This plugin allows you to easily create complex F.A.Qs to strongly help your customers
 * Author: Biscay Charly (loopus)
 * Author URI: http://www.loopus-plugins.com/
 * Requires at least: 3.8
 * Tested up to: 5.0.3
 *
 * @package WordPress
 * @author Biscay Charly (loopus)
 * @since 1.0.0
 */

if (!defined('ABSPATH'))
    exit;

register_activation_hook(__FILE__, 'cfaq_install');
//register_deactivation_hook(__FILE__, 'cfaq_uninstall');
register_uninstall_hook(__FILE__, 'cfaq_uninstall');

global $jal_db_version;
$jal_db_version = "1.1";

require_once('includes/cfaq-core.php');
require_once('includes/cfaq-admin.php');

function WP_CleverFAQBuilder() {
    $version = 1.36;
    cfaq_checkDBUpdates($version);
    $instance = CFAQ_Core::instance(__FILE__, $version);
    if (is_null($instance->menu)) {
        $instance->menu = CFAQ_admin::instance($instance);
    }
    return $instance;
}

/**
 * Installation. Runs on activation.
 * @access  public
 * @since   1.0.0
 * @return  void
 */
function cfaq_install() {
    global $wpdb;
    global $jal_db_version;
    require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
    add_option("jal_db_version", $jal_db_version);

    $db_table_name = $wpdb->prefix . "cfaq_settings";
    if ($wpdb->get_var("SHOW TABLES LIKE '$db_table_name'") != $db_table_name) {
        if (!empty($wpdb->charset))
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

        if (!empty($wpdb->collate))
            $charset_collate .= " COLLATE $wpdb->collate";

        $sql = "CREATE TABLE $db_table_name (
    		id mediumint(9) NOT NULL AUTO_INCREMENT,
    		purchaseCode VARCHAR(250) NOT NULL,      
		UNIQUE KEY id (id)
		) $charset_collate;";

        dbDelta($sql);
        $rows_affected = $wpdb->insert($db_table_name, array('purchaseCode' => ''));        
    }
    $db_table_name = $wpdb->prefix . "cfaq_faqs";
    if ($wpdb->get_var("SHOW TABLES LIKE '$db_table_name'") != $db_table_name) {
        if (!empty($wpdb->charset))
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

        if (!empty($wpdb->collate))
            $charset_collate .= " COLLATE $wpdb->collate";

        $sql = "CREATE TABLE $db_table_name (
    		id mediumint(9) NOT NULL AUTO_INCREMENT,
    		title VARCHAR(250) NOT NULL, 
                colorA VARCHAR(16) NOT NULL,
                colorB VARCHAR(16) NOT NULL,
                colorC VARCHAR(16) NOT NULL,
                colorD VARCHAR(16) NOT NULL,
                colorE VARCHAR(16) NOT NULL,
                colorF VARCHAR(16) NOT NULL,
                colorG VARCHAR(16) NOT NULL,
                colorH VARCHAR(16) NOT NULL,
                colorBg VARCHAR(16) NOT NULL,
                colorFields VARCHAR(16) NOT NULL,
                colorFieldsBg VARCHAR(16) NOT NULL,
                colorFieldsFocus VARCHAR(16) NOT NULL,
                colorFieldsBorder VARCHAR(16) NOT NULL,
                colorBtn VARCHAR(16) NOT NULL,
                colorBtnBg VARCHAR(16) NOT NULL,
                colorLabels VARCHAR(16) NOT NULL,
                colorRestartBg VARCHAR(16) NOT NULL,
                colorRestart VARCHAR(16) NOT NULL,
                customCss TEXT NOT NULL,
                useGoogleFont BOOL NOT NULL DEFAULT 1,
                googleFontName VARCHAR(250) NOT NULL DEFAULT 'Lato', 
                loadAllPages BOOL NOT NULL,
                txtNoQuestion VARCHAR(250) NOT NULL,
                txtNewQuestion LONGTEXT NOT NULL,
                txtReturnStart VARCHAR(250) NOT NULL,
                txtPreviousStep VARCHAR(250) NOT NULL,
                labelQuestion VARCHAR(250) NOT NULL,
                labelEmail VARCHAR(250) NOT NULL,
                labelSend VARCHAR(250) NOT NULL,
                email VARCHAR(250) NOT NULL,
                emailSubject VARCHAR(250) NOT NULL,
                sendEmail BOOL NOT NULL,
                resetDelay FLOAT NOT NULL,
                titlesTag VARCHAR(16) NOT NULL DEFAULT 'h2',
		UNIQUE KEY id (id)
		) $charset_collate;";

        dbDelta($sql); 
    }
    $db_table_name = $wpdb->prefix . "cfaq_steps";
    if ($wpdb->get_var("SHOW TABLES LIKE '$db_table_name'") != $db_table_name) {
        if (!empty($wpdb->charset))
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

        if (!empty($wpdb->collate))
            $charset_collate .= " COLLATE $wpdb->collate";

        $sql = "CREATE TABLE $db_table_name (
    		id mediumint(9) NOT NULL AUTO_INCREMENT,
                faqID mediumint(9) NOT NULL,
    		title VARCHAR(250) NOT NULL,  
                content LONGTEXT NOT NULL,
                description LONGTEXT NOT NULL,
                question TEXT NOT NULL,
                start BOOL NOT NULL,
		UNIQUE KEY id (id)
		) $charset_collate;";

        dbDelta($sql);    
    }
    $db_table_name = $wpdb->prefix . "cfaq_items";
    if ($wpdb->get_var("SHOW TABLES LIKE '$db_table_name'") != $db_table_name) {
        if (!empty($wpdb->charset))
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

        if (!empty($wpdb->collate))
            $charset_collate .= " COLLATE $wpdb->collate";

        $sql = "CREATE TABLE $db_table_name (
    		id mediumint(9) NOT NULL AUTO_INCREMENT,
                faqID mediumint(9) NOT NULL,
                stepID mediumint(9) NOT NULL,
    		title VARCHAR(250) NOT NULL,                  
                ordersort mediumint(9) NOT NULL,
                showConditions TEXT NOT NULL,
                showConditionsOperator VARCHAR(8) NOT NULL,
		UNIQUE KEY id (id)
		) $charset_collate;";

        dbDelta($sql);    
    }
        
    $db_table_name = $wpdb->prefix . "cfaq_links";
    if ($wpdb->get_var("SHOW TABLES LIKE '$db_table_name'") != $db_table_name) {
        if (!empty($wpdb->charset))
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
        if (!empty($wpdb->collate))
            $charset_collate .= " COLLATE $wpdb->collate";

        $sql = "CREATE TABLE $db_table_name (
    		id mediumint(9) NOT NULL AUTO_INCREMENT,
    		faqID mediumint (9) NOT NULL,
    		originID INT(9) NOT NULL,
    		destinationID INT(9) NOT NULL,
    		conditions TEXT NOT NULL,
                operator VARCHAR(8) NOT NULL,
    		UNIQUE KEY id (id)
    		) $charset_collate;";
        dbDelta($sql);
    }
    
    $db_table_name = $wpdb->prefix . "cfaq_questions";
    if ($wpdb->get_var("SHOW TABLES LIKE '$db_table_name'") != $db_table_name) {
        if (!empty($wpdb->charset))
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
        if (!empty($wpdb->collate))
            $charset_collate .= " COLLATE $wpdb->collate";

        $sql = "CREATE TABLE $db_table_name (
    		id mediumint(9) NOT NULL AUTO_INCREMENT,
    		faqID mediumint (9) NOT NULL,
    		question TEXT NOT NULL,
    		email VARCHAR(250) NOT NULL,
    		dateStored VARCHAR(10) NOT NULL,
                checked BOOL NOT NULL,
    		UNIQUE KEY id (id)
    		) $charset_collate;";
        dbDelta($sql);
    }
    
    global $isInstalled;
    $isInstalled = true;
}
// End install()

/**
 * Update database
 * @access  public
 * @since   2.0
 * @return  void
 */
function cfaq_checkDBUpdates($version) {
    global $wpdb;
    $installed_ver = get_option("cfaq_version");
    require_once(ABSPATH . '/wp-admin/includes/upgrade.php');     
    
    if (!$installed_ver || $installed_ver < 1.2) {
        $table_name = $wpdb->prefix . "cfaq_faqs";
        $sql = "ALTER TABLE " . $table_name . " ADD txtPreviousStep VARCHAR(250)  NOT NULL;";
        $wpdb->query($sql);
    }
    if (!$installed_ver || $installed_ver < 1.34) {
        $table_name = $wpdb->prefix . "cfaq_faqs";
        $sql = "ALTER TABLE " . $table_name . " ADD titlesTag VARCHAR(16)  NOT NULL DEFAULT 'h2';";
        $wpdb->query($sql);
    }
    
    
    update_option("cfaq_version", $version);
}

/**
 * Uninstallation.
 * @access  public
 * @since   1.0.0
 * @return  void
 */
function cfaq_uninstall() {

    global $wpdb;
    global $jal_db_version;
    $table_name = $wpdb->prefix . "cfaq_settings";
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
    $table_name = $wpdb->prefix . "cfaq_faqs";
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
    $table_name = $wpdb->prefix . "cfaq_steps";
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
    $table_name = $wpdb->prefix . "cfaq_links";
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
    $table_name = $wpdb->prefix . "cfaq_items";
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
    $table_name = $wpdb->prefix . "cfaq_questions";
    $wpdb->query("DROP TABLE IF EXISTS $table_name");    
}
// End uninstall()

WP_CleverFAQBuilder();