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
define('DB_NAME', 'proyectos-plusvida');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '(Eu6q;2)lp)Ia9d!<.K<h-6s2`-KzbS<+i>JAhQ;`Kf9:_7)ggdvo!>8=WrOh0:-');
define('SECURE_AUTH_KEY',  'U,1+h|T,^6,m7Hy_[C2gYPL*/jK1kDyOZKA|.tbga]`z5cN!|xuJ}V?P(5;lm{_>');
define('LOGGED_IN_KEY',    'oyd_8Yxmpr[{HX<KuYJotEzxsojsOas>Q5%);@a/6+VC~765HCvHA7YrX2]BDD]J');
define('NONCE_KEY',        'SFgA/(zl9NlK,EwA`eL)), A6G<dT:HNB<QZ#>#%Qjx}:bdvV,FOd}JW9kMlTuF3');
define('AUTH_SALT',        '92I;;C: y;Xd[wk%UUovI})$k[N~=k}0{B5I6-M/?q6))hv7?xv2Ql]Jm>a&Q-R0');
define('SECURE_AUTH_SALT', ']f>q~`L#V{skH3}t/HJ~hb%`})18^_pOa=]tsB57JIaZ4_Qgi>+?/|?b7|_8cb)Y');
define('LOGGED_IN_SALT',   'yu9<_$IsX89~y]io].HNpQDl1DJ!<ghFjn$M(*e:?caO|39%qY_|tkMO)wNh4d0[');
define('NONCE_SALT',       'KUQ?LSI@|Qp]6x@PR3pUN8A0g54>S[H<a$8OQ~?s;0]|=2vbR9GF&O53x1(coMA6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define('WP_MEMORY_LIMIT', '96M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
