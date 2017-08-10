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
define( 'DB_NAME', 'wp-comp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Custom Settings
 *
 * Set folder for root e.g. app
 */
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/app' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-comp/app' );
define('WP_DEFAULT_THEME', 'minim');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', ')szBOqVLlbgwBl7y|e3wuU`-*q)cm]}z1< ]*T-hc[([viQLdu|L.oo/-S!Z57Jh' );
define( 'SECURE_AUTH_KEY', 'L:/q9^;weK{qq+Iw%2,b5>[%i|VSm})hj!Pqhv()`=_YA*;?)1JF s+<|Y`Xaa]+' );
define( 'LOGGED_IN_KEY', 'n^E)w^8wzJ.K)-xn4oI<KdF<ry,z{<n+Q+1c?(6_ZD=,:b8F0MM_;ZO^_=?|/_Lf' );
define( 'NONCE_KEY', 'zz|Wkg.iIk_P(}kbMpC^ES.6aEd7EODQX7i-.vE@q==C8*JcPlNC!3X@ u_)0Au-' );
define( 'AUTH_SALT', 'Z%LuP_tRG1u.S`|@Q3+4wWXc`01iBeN2`WsJ,H[g(?hzl-H3t<vA6Yt2m7{f9k2w' );
define( 'SECURE_AUTH_SALT', 'BgC;T+<4qZS1VNM:(.s/dX5}xCHSc0:e0VCM0;DJm#/.._fu/?^-L3(<C1Ag%|&0' );
define( 'LOGGED_IN_SALT', '6-HDCi^- i)X}FY-fRI$S-^(pyJ]DOWFM+^%5?*.6Dhx|wo~w|T~_KSFN4<${lpD' );
define( 'NONCE_SALT', 'L6`F2BOD)53j`)}n;L%K{ll*Iw@Vx:mgcMS0&`E#W15L/b($~[qV}WkdJ^sr{z+|' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'comp_';

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );