<?php

/** WP 2FA plugin data encryption key. For more information please visit melapress.com */
define( 'WP2FA_ENCRYPT_KEY', 'I/nc1RnmpjrBuYg1Y/WOhQ==' );

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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'tmdt' );

/** Database password */
define( 'DB_PASSWORD', 'Tmdt@' );

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
define( 'AUTH_KEY',         'i~zll}G3SFPu`MFB:yPi(M|4&ml<#ACt*#TLRs,cxXkHS>{1iirGVjJve%UfB]u}' );
define( 'SECURE_AUTH_KEY',  '_5u1LbNjV!i`yIL*1a`k(/>liXITi`=5a8fO,aB=7$IqGKRs#qVq][OpxmR5z!1e' );
define( 'LOGGED_IN_KEY',    '9_5HM^*hv6hJ5ZDl,aVU/?x{oetY}hr~>dd9Q^WAxS5!KFd$@lE`IDi{a6uNpQ]<' );
define( 'NONCE_KEY',        '5ciM$de*OL<~`q6?iezR0@N,~N}Vp688dSLOC~Z.`Kc[u5DWYifob+;]P~oA<qSt' );
define( 'AUTH_SALT',        'PL(w_p-%/u3`)B+a9Cve2HN5x9Id-h;lc!8r}>X@JF)JVv=UhyYsX9gE*T4mJE9.' );
define( 'SECURE_AUTH_SALT', '25unGo(rZ#zjMgF/neqfG<pegtKtFgve=L9q`F^leSm98%.ntUfpox^Drc6bxe]>' );
define( 'LOGGED_IN_SALT',   'oQAoW~]|j,+Obnbz1?(ic*voa)D:=2ow2{rY}ZtDO4J#PZFU)1U0?9MK<)81^K >' );
define( 'NONCE_SALT',       'l#Bo$(hdN%l *780=l]KNPS$wZ>Gz.:P)>7SDQi8yR?ln%Q*QE6,W;hCSYj?lH:e' );

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


define('WP_HOME', 'https://dongkma.live');
define('WP_SITEURL', 'https://dongkma.live');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
