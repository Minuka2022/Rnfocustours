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
define( 'DB_NAME', 'sampkxxt_wp402' );

/** Database username */
define( 'DB_USER', 'sampkxxt_wp402' );

/** Database password */
define( 'DB_PASSWORD', ']1!m[B5[03@SWdZp' );

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
define( 'AUTH_KEY',         'q5imojdylh3y6wzkyu88nbykt6ola1omu7nltmy6dzb4zggj0o7kbnarfhfanw05' );
define( 'SECURE_AUTH_KEY',  'mvxvyvkleh9tt9evl4ps0ooywsyrmk1zkijhssbcmx8f5ycqvxqiybdbbqgmfhrp' );
define( 'LOGGED_IN_KEY',    'hcb6io0mgmewqcefb6n0ynga4sgt9bj5n2frdlbx1vzqej6a2bcbte83ssm7kf8s' );
define( 'NONCE_KEY',        'qfxbrxukvwc7lksuohcsskv9n72qagz1z49ezst67mut29t5pxmmm4pkahxajlnw' );
define( 'AUTH_SALT',        '6idbxf8hxrux3bs01y6ngzm57mes6rk2bjuddcunvrk9wmbfoeha2wlkn1dg4r7r' );
define( 'SECURE_AUTH_SALT', '6g1cmciiqljfsfafwlcq3nbqfl1ne6kanzspri9xnmjsuxvhuleqxr4kb9c6ux3r' );
define( 'LOGGED_IN_SALT',   'rthz2zfafnfshrkmjrdmfuxgkxskxrhqvrr8jv10zd7ngujlkwgzfk1szkeu0ez4' );
define( 'NONCE_SALT',       'es6ewpxg5qtitq5xv5fcmc0ksgrqvcu8lvjuzdxnagpxmr0ooyzwwuj0c3ndkxir' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpph_';

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
