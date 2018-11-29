<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'leadershipdiamond');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define ('WPCF7_LOAD_JS', 'header' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-++{:nI_l5|cf;<.@247B8~o}Zf!uU-v*lM$R,3BV_&{GVEh-1^@[3Us-[uOS6v7');
define('SECURE_AUTH_KEY',  'S`zvV)S9g,{q>dT~|vIGvOSRTZvi<6wQy5Of;YP@+@/+Or=2Ky3&qF<a(rSy|)l`');
define('LOGGED_IN_KEY',    'M%-&/8ZQ8V9{ )MS#>s!R[X,%cfNBcZ:ct@ldxe7--ZR+gjBV<M#7Q/l3&vw42n}');
define('NONCE_KEY',        'g)neNKsFBv)~(U5pN>I.o,@w#^}f$nggv)!4G:w1Hz=b9b-aKMt;[gz#-1]:/6~e');
define('AUTH_SALT',        'U5c )qFaxnfRSdCSX!k7J+Rv,,jH->k:`m.&M<7&k9Fx`;)Wr-Rp+-Q2m&+:^I9_');
define('SECURE_AUTH_SALT', 'i}+q<efWP@Tu&U%01A{_bE}x-Q.4MtBwfhA5f}+BlSX(&_|*[QdhZv-JUg=SWE@o');
define('LOGGED_IN_SALT',   'bX|Q8]ys3nzeu-#M5{[=Fuk>0dW#h=E-B<|?mA=5PvOlEe[[$(||w_{hQBDY=RpI');
define('NONCE_SALT',       'au9lTTrcC_xQ7>`P||GJG-9]y}TB{5jujBao$Mryl-;-)NJ1OZ6WK|qaEgPM/@d~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
