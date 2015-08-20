<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'peter');

/** MySQL database password */
define('DB_PASSWORD', 'L0v3G0ld');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'ez#QGF}!pE`I6yHXPVkMFwnoIZ_1=*bTXH(4jI:8g=|,! IV-mRhDja29jJy50;r');
define('SECURE_AUTH_KEY',  'x9I8vp<}}dI{|3 Qs6xd!S&RN[493u+t ;hLdp.w=f@_DI-rS:tXd>LY_$Z ViRz');
define('LOGGED_IN_KEY',    'DY<kE{?pkPMx&A,,W_T/r~DSSKie8(a+:.=b+-)5|ft!TR(+a$-Rb:^0n|~0N0r+');
define('NONCE_KEY',        '~Wx&4Z02E5w:{I#T>[&hh!bpA]WCj=YhE [V+,~Nr -}qZ`ZV(Bg%7iN3#Wjw-`+');
define('AUTH_SALT',        'LlYE)4S?`MR@0tv`=n{%y8~B4{H~P8PYk?w0G pziD>_+8F)ySLkM ~j5|M7:rfm');
define('SECURE_AUTH_SALT', ',.O8Fs|XnN{p9OlX&9n3|by0.J~=o{9w)+k,|`7/>PVzh Uu~JkIJdJTSfs|*C&-');
define('LOGGED_IN_SALT',   ';$cp2PCHs[]L5C4!ePbxQaSVvw,UgCb?znjW)`%n?.(bj{aDIA$!8F_x]Xs2hq7-');
define('NONCE_SALT',       'U+Ugv8)?E*-mmMNxe>GCHt,QA[+i ,#KLjB7:p9?PN}Uwei|]yxdU+^OInn~0FQh');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
