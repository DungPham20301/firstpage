<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'first' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '5=diY{yiTd$jsQBIZd8|ih~R:7b @>:hp_`{Fy=m~*;H:e[3K>q(zuTTb-}tHk-Q' );
define( 'SECURE_AUTH_KEY',  'TN u#OJ*t&vbB%4_)bEf2({kS=aB;.HgZO9o_$SwKn3+6dR/hND[o5t5ef#vQ*Y?' );
define( 'LOGGED_IN_KEY',    '[%+b(8?+DqM!,5xSr; u~UYYpH,Y|F#6>7aR!j-Wo6xct9LI.-S92?$]$pmNp&sj' );
define( 'NONCE_KEY',        '-)Mqh@AwQhTt_ybP~[tp!NM&H(33oAD~#DV)=S*g_N2!au*4]FwrN5^EllD}o-bg' );
define( 'AUTH_SALT',        'A+,fvgHM#W~k,ytxlI}3xQTz?YzE(yA6h}S#[k][A`4EW*lNhof68a& t_~RooM-' );
define( 'SECURE_AUTH_SALT', 'j,I)6SU7~=M{^:[+jASf$Q^L/@O%MF$|6VUdtlMW27[XRP zE| )YVZiMJRK.E_B' );
define( 'LOGGED_IN_SALT',   'Z-R|m[4K9*zG3$5p$czd#m}Md><&4FPZxhiP_<592XU*[%vRam]ccPUVz[fLrb!0' );
define( 'NONCE_SALT',       'J|)AqJJvhFR]hbjU_V)rUJq6V25je%-h%r;[|Q-_c?kjfp(/X2QM_+6oq8&avdh[' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
