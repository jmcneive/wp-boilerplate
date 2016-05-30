<?php

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
define('DB_NAME', 'replace_with_database_name');

/** MySQL database username */
define('DB_USER', 'replace_with_database_user');

/** MySQL database password */
define('DB_PASSWORD', 'replace_with_database_password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

//** Automatically set the Site URL */
//** 'SERVER_NAME' is a safer but can also use 'HTTP_HOST' if 'SERVER_NAME' causes problems */
if ( !defined('WP_SITEURL') )
    define( 'WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress' );

/** Automatically set the Home URL */
if ( !defined('WP_HOME') )
    define( 'WP_HOME', 'http://' . $_SERVER['SERVER_NAME'] );

/** We moved and renamed the wp-content directory so we're letting WordPress know here */
define( 'WP_CONTENT_DIR', realpath(__DIR__) . '/resources' );

/** We also need to update the full URI of the moved/renamed wp-content directory */
define( 'WP_CONTENT_URL', WP_HOME . '/resources' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_~G@!%f:U1-nCs2*-km7Tj9`8QWF,-ass|)oFj/Gk<:l2+uQR$P39Ebr]K(1Yfh$');
define('SECURE_AUTH_KEY',  '&kqob+w&^7Uk:kduK+$9=mq$IiG(_I;Z%TluH[z9.8WajhAeUeBqwys7[MaDz5`X');
define('LOGGED_IN_KEY',    '3x3BQ,@kFZJQPh2*l>~z+07Wqq:SR:gR)q]MO%u(=v TC?|U!]jP?Px+f ~o_.jJ');
define('NONCE_KEY',        't_sZV.-_y3,oRN@LqSGEv1u-I:UAE*%P7`vlcoyfe]uo~N^>.YWYzeMs.(%n<2e>');
define('AUTH_SALT',        'q;[qrEJX(Z/9&[)G;nWNIdO$,P-=+|1o<Y,a,zS|Z#em%{ Bq2>PfeZg&oPrV@;1');
define('SECURE_AUTH_SALT', 'ZD4e~?vx08B/6zd!iuFoFkRY!(|9-/k5&|Ji{YT*?sIY;iBn6i|#tg4$y|z.Y1g2');
define('LOGGED_IN_SALT',   'JSjJsm$^,h<Ctx rke|^d~<-4,IJ5i%o9)g*r0.^l<*XaHFh:[I-Z1(-Iec7zXA4');
define('NONCE_SALT',       '_R4A&o~+F=>L#JOFVC8m6shj 4E9xzWfYJZ aCO+>+0+-/5B$_|55.6==?~k:~xs');

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
 * Custom Settings
 */
define('AUTOMATIC_UPDATER_DISABLED', true);
define('DISALLOW_FILE_EDIT', true);

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/wp/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
