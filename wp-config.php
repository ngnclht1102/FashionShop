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
define('DB_NAME', 'shoeshop');

/** MySQL database username */
define('DB_USER', 'shoeshop');

/** MySQL database password */
define('DB_PASSWORD', '112233@2018');

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
define('AUTH_KEY',         'tOb87^5R:uj+M(CFu-6!.lO,/eAs4|oZ@j6^<8~Z!!wyz6-B)<w%@%/^1o$TmJH^');
define('SECURE_AUTH_KEY',  '!?,=e`>Qa_JpOifF)+H=Fc=sg8$Cw{15m[FI*rv#/;ceh/{k5H%pkye!]FWJCN>X');
define('LOGGED_IN_KEY',    'Q,L#D/$:i>b}Sgw:#!HxRJ0M^Jq5b:)k1Szf2**v)PcP6,#H)MA9-8%@Cy|E5Gwh');
define('NONCE_KEY',        '2TT[>WR]Di84kl%a44pK`xtiQt~$po-- Ka06?7@JR:]G.Q}m(HD33p[gRfhX1CO');
define('AUTH_SALT',        'merz`3c@T`gL0-:7!t3Y;s(|(OoVB$TSf6`9Mgr$KzDYoovQQRpQ$_KeJOXC`AS=');
define('SECURE_AUTH_SALT', 'i<jlbsi+zHDRkMIwlf,3zxvWv_=UrPC3K>F5<pRP<b9ek ir#R|E]s1K6JjShI4|');
define('LOGGED_IN_SALT',   '?*jUgx3C!BCE~(h(l+ClxJ0BN)esP4>Pm0wGS&@@Jt%e7feW8hV:H n22-=sud$W');
define('NONCE_SALT',       '/(LF%YQnDl+e(JFSzw=CT<) zp9G:d 0hu/V]OUMG4zL8I1NZ5tXPV[inY|~%:+h');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

