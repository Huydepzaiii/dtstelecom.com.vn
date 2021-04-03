<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'WPCACHEHOME', '/home/dtstelecom/domains/dtstelecom.com.vn/public_html/wp-content/plugins/wp-super-cache/' );
define('WP_CACHE', true);
define('DB_NAME', 'dtstelecom_db');

/** MySQL database username */
define('DB_USER', 'dtstelecom_admin');

/** MySQL database password */
define('DB_PASSWORD', 'l19LPrycdo');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8_unicode_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-KkDmq>;bUhv+5g%@n_;;T[J>P0gm!e14+m`!g:w`<[u^S44u*$,$eamK/{6w}d=');
define('SECURE_AUTH_KEY',  '(To&aE=@kBzHo;%~cL9 Ow@5]6bAS:!Bsn<!w|,uVvq5=lvn@ED=qm<%tr$x,?)-');
define('LOGGED_IN_KEY',    'Gz|&lIi`QcmiImJ#uiP[ |eXClNGZ:{EyGcxqQ[gP4F&3]%a^Y/DF[Ds,~pme%pw');
define('NONCE_KEY',        'a<dy11AA^)bK-7nMBp)5qc(finHH6bWx13W15r03cZk-rj|4O^~c4 zx#LN87sm4');
define('AUTH_SALT',        'E(@`BOOzP/(2K6Rt2XIyuzAZR{K3,~:O0%9q#x`5J99T,S?4u:v`RzG^Yx70L~+q');
define('SECURE_AUTH_SALT', 'Z>h(K8xmyGioG? 7OI%T2h( @#Zns+pY}4SZE.(J<7UqpOcs5l%YMn+uz9)20RyE');
define('LOGGED_IN_SALT',   '3[b-pEq/.^|f0Ce3Ow(j0u|m6{0N`Jl3/n2&7Lo*khRtQ`H)^5+^G#$>!Lc-O3h8');
define('NONCE_SALT',       '.s|Qd`DalFWyX|&iz?y`Fhosz9{5@vllb]1EW]ojMC*`rTzsWGRvdd;3+=#XwWf]');
 define('CONCATENATE_SCRIPTS', true);
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

