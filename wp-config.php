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
define('DB_NAME', 'revfoods');

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
define('AUTH_KEY',         '.t75H&.-U.R$W)X_|a-a[0 G8nA?=!;>$W`a2z1$x^j_u0L>u/x?EF8`^jo0f=;#');
define('SECURE_AUTH_KEY',  'k*hRx`]QgnopB4jl7Z5ztO>ad<<Q5Ca6N=-/Bj;aeM:k_}k#1(K_JSP`3;TN]l5)');
define('LOGGED_IN_KEY',    'Q`K%v6!bC|&p_Pzq-?o8.q=0=8;.ppno6S,&5Bf}Yoi#Nzqc4PQ32WNAk3}7!1{.');
define('NONCE_KEY',        'E{gIz.24w@C%M^QOTm[jiN#<S}?ox;1&nn,Dtw=<^Jh8SH_ehys$Gw#,8[cd6`hO');
define('AUTH_SALT',        'bJPEcr*E1c-=Vf-{kL!cD::8^(zl*08YHK4|nuH&:n(2FBx/^sK0hLvUwjLUE@&I');
define('SECURE_AUTH_SALT', 'Y<a]@mzFrSM]/?,mI6yYcg_cQ+@i!/(m-.b#<n=~$ZS>5;gh~n@J69Tw1.iMm~@l');
define('LOGGED_IN_SALT',   '}!EK4rzmx{EDc1tA!f/d*XYR_n)Sai($NFMHMUGJz;~9RdO7P>`=?A^5ntUTn0.3');
define('NONCE_SALT',       '1O<,S2pw@8;lr,#`h6!:c2R{dbD?plSTxA`Q{Xng:;9~# m(g3F Z]vndB17I.8y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'revf_';

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
