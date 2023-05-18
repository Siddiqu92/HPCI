<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Newstyle' );

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
define( 'AUTH_KEY',         '[LSr.e;yi80e1U2tSK9$6a2w f/ lO9&zX}ST>8ekSpX-iR 1z2$@PL2GRe9U<S^' );
define( 'SECURE_AUTH_KEY',  '$90>(quTP+KOPz1p61ZNV%:<`gVh|Au]i^(3~,6/aVV>%H0nAlQ uJK5As3)5/UF' );
define( 'LOGGED_IN_KEY',    '%aQ,tT7w6y7.qLwx9Rz4Nmjn@K>VGpvWOl)9/I;j-DKc^/^|![i__O4(O+e7_pV;' );
define( 'NONCE_KEY',        '#ys1s1iZ]v@~z@{u[1Uy8ZOOemhC8dV1`1-f4H_%PHYPVAxftE|..af.wKXOiDII' );
define( 'AUTH_SALT',        'xGMEl9>o=p_^K`/~q /ggPd2YusHz&`Zt8S#L|Jt}c+@/cu&51*7W(_/69V=H9/k' );
define( 'SECURE_AUTH_SALT', 'wk?r1A]1p]u1 E-t(GZim9-}t}I;u?{kpn,m>M2;2Ez_`p]*4x7ip^D8X!ULHL/t' );
define( 'LOGGED_IN_SALT',   '@-wZnl]];Vo ^X ~K4gM=i6^hw6{d$/nhRhVOCEmrzEW3azLxaBBg;g+3DbX;Q`7' );
define( 'NONCE_SALT',       ':6s9ddA}YpsS$Xb*$<_7S,H??u6p*y9.z4yMe>Dno##.:BV/o<>Bro/hMTjlzH&R' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
