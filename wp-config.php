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
define( 'DB_NAME', 'wp adidas' );

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
define( 'AUTH_KEY',         'i!d<G`Id[q~eLWNR$0BJ;?wKMfVJfo4O@Ui;(PHwwy/_9BtruOJY`97>Agqp=|I.' );
define( 'SECURE_AUTH_KEY',  '%p=1[03T+Bxpna/8^7!n;,~+^o )*r!OK l>A3s3nvn#WO^&2GTmv^J.:JRvI5u&' );
define( 'LOGGED_IN_KEY',    '~ /H-ERUL2fWC3OgG!ZdT`ycF||(2BisA0rm#sk:r[%>H.PfmJ>#8;VzLk)yuCr;' );
define( 'NONCE_KEY',        '1N/ze7Mhi$or.HL0%5.?M;lGz>GH8:XR{Ib|2tUa[Z,W^#pF<cK8lKRNul[v@zY7' );
define( 'AUTH_SALT',        'W>PT5x$.I.,{}v{9pRiw41Zy&aTnDu:h lmwA;A>AI}FWo!/z-0GYl4}{KbNnkEh' );
define( 'SECURE_AUTH_SALT', '51xE2dDy%D]7b7:bqZO`3#~JmVYQuA7q/{a3//f>yXi{e>]o2SFNViXabQqc=C!:' );
define( 'LOGGED_IN_SALT',   ' #=$}4d%:IBFwU}{g) D9QH2TEpq/PQL7(GO)>Zrue^Id4RFk6(CAwwGK|P`09p%' );
define( 'NONCE_SALT',       'Y@J@]f~_|.F7dah$=m_jC;yg$H7=yve~YV+6298}]tmA;#NE;v9/?IM.4G,pHSfE' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
