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
define( 'DB_NAME', 'nacopha' );

/** Database username */
define( 'DB_USER', 'nacopha' );

/** Database password */
define( 'DB_PASSWORD', '100%nacopha' );

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
define( 'AUTH_KEY',         'ft)+OIv5|pdlo=^v>?!bhGibOLf;koEX[D`Ia.9D*-v ;.P`Wq6rN0oq5W#Q$wf_' );
define( 'SECURE_AUTH_KEY',  'm6pCy/n8Ou_Ij4F:JupGpu|zVy%Yw6k#(mzYDISh`&@^xSj7sIXi(THYZz8WRn4D' );
define( 'LOGGED_IN_KEY',    '0D/&p3utb|ZqkBND^Pl^qQ[ $,R%3b@PSaZQ;ViPvW&VNlu+{moMm>25p3~Spp%B' );
define( 'NONCE_KEY',        ':bLneh6K9NM)S,<Ap#K6o4S8TQh(`DCmP4z?EH.4;th$2*JO&B,mC>k*$)38+IvO' );
define( 'AUTH_SALT',        '`k-mA)`?uDt)x%At!D7|B1:0?7 >^uC?$Ikxn*1|0kVTA <%jWIKNF`[Bks Y+Md' );
define( 'SECURE_AUTH_SALT', 'izqeHyIMeF^bS_38{V;F[~Pt~[4[Ql3rP/$!k1p<|49NH]C oGr)cF`(.$;qdbn6' );
define( 'LOGGED_IN_SALT',   'XJ@&z:n:<{e[^m#fcUrvBP@Zy}7/}1v*dd9+!T(KMU@riwBf(m{<L=!*BN-7))F)' );
define( 'NONCE_SALT',       '<N2p-jm~-l`>RRO%go+*O!lQ=UrT,SjubLRo*B4IeN0l<Dfa;9_4`ny$7A3RY:zN' );

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
