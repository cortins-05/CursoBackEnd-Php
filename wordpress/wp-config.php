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
define( 'DB_NAME', 'aprendiendo-wp' );

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
define( 'AUTH_KEY',         '=I%k0{}ET)JAv?Y[zp4etVuogg)`vIQWv3XjXlRP{T8)l{x?R9{Ez2:k[u1im7D-' );
define( 'SECURE_AUTH_KEY',  'lpq3!0Mg#Dl5P}r&0.DnRBYiOos`{VNTM9}JF|ia8RXc,%q9q8~Vgh~W4dKTfc/9' );
define( 'LOGGED_IN_KEY',    'k&^J_f9?>AA!-j/}9|>%Foq8>y6-@hPZfTv^3}Ipq+_NNN>s-TXbT0j{NO~ pPSt' );
define( 'NONCE_KEY',        '(G]1C;su0wO8Z953spF1R}J|%&9H`aP t-Kv=g<D677DcsIj4Ab$E*[zf@M9.|>i' );
define( 'AUTH_SALT',        'So);1!k+&G/9m8R,!@!h<K5sz}cAD)ey#_iCl>[q88:&r{WCt10gvo;RE0Y:dm<v' );
define( 'SECURE_AUTH_SALT', 'jP.k;jNc6f*dVDE+Jf|W(A.k<,`n&}W{w7om]uM [m_iS_YBA0c-S>8R7)VIo1SQ' );
define( 'LOGGED_IN_SALT',   'HjXF*6[b0D$Tz+{{>YN9l5/ oo@X,3wP7Qj]W-ke!0tq:IbU-B%DMl*x:!!{Pnk ' );
define( 'NONCE_SALT',       'z<h#K7nz5D~62*%/(7&z_RyjHkcwdRNXz)m*yl(]mnyeFmJG`6iK.>&XARMkD0Pb' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
