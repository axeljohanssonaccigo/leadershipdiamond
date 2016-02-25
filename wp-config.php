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
define('DB_PASSWORD', 'Jupiter123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'gfo:>Np^d^f`>z|pe>08D$ln *64gl_Q}t$%@pA3h-v:y7-5L4Zd]Ep51D5.SA54');
define('SECURE_AUTH_KEY',  ' `^d:kYEZy7d.F<9u5}%ALm{sEi37dEM-.+$c3v6KQ>MEhQ-@9o?@3v#)Jh>}=+?');
define('LOGGED_IN_KEY',    'vB*m[_u4K+M5aHy[!b7GWhd{ kR}vhb_.?^[SDaL*G./:{e8h21(_imbn{c^fmFb');
define('NONCE_KEY',        'Ii@Ii@MJ^/X$M>f|4g<DE q*Ofb$ad$b,%19x[{ .;Xubn=wbY=<.zDVV`mp6Z*Z');
define('AUTH_SALT',        's?LHoL4E ?m=^/aYB+u49|6IEj+r(H~B,A7}Cj+|#_uRl 4BJ<+_$:^(z&os#P~S');
define('SECURE_AUTH_SALT', '@HB*3eiV+#7:]evuX-`M&0$A|U_>MOj}:hgTB7p9`C9t{@0Hw*mi#X<A fy|[Y>i');
define('LOGGED_IN_SALT',   'q5+%h`)[z+:,%]K5Cv 1[8x_k;^Pr$(r|#aHZGM)N7GDmg?JSM$9+fB%s`M6? nS');
define('NONCE_SALT',       '<4(|j=5ul M~(5* dct}^ufPC0TDb8L;@@tR0#XWAj7S@1c;}{qLVi6mo]mZ@I|p');

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
