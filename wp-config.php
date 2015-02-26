<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'wordpress_start');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'polcode');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'uqf(</AMvtCgsh[R$E42|+hsOk+[586@gk$4`|_!MgsJGA|MJ&a#a#*o8-OH.{r`');
define('SECURE_AUTH_KEY',  'qCe]F:+A;hHODNI8P,#8F],*Rh9pz,a<OUet302G^AO3D4z@S/]7|Hb$C|ONuFWg');
define('LOGGED_IN_KEY',    'p@pMPES^92fF5VdOM(IGc@5Rzb>@:|U4+0wg^R)KnquE|q@9GIiV(ov^VZ,wk|rK');
define('NONCE_KEY',        'F<u=NQ`2+q]ld2RC|Fx+g!C*sIqEH@%j|=MQYvO}x>8TsP1<hG$;R<]<-HJ5e3o+');
define('AUTH_SALT',        '-M7$kSqZFBNFR`]g:@9]P-rGT~z:6`ukb&.YJfy?fDxrr<VP+h2n(;4j|:W0E|IE');
define('SECURE_AUTH_SALT', '+g-.83i+5H6-J~6Nk(s.%A~C06W8#R<0L5wu<+1MJcfIO*,^+z.K5>D$N`cDr}]_');
define('LOGGED_IN_SALT',   'nL}%K4`%]7)&fW#@iyO<HuT.|;I<?]lzT B7bX+[`,I!X`l`b5EN-Q>4&4>%HA9#');
define('NONCE_SALT',       'jF+i{73%?hs#|J>!Rwz=PEhE^(?R++U.3/[nr1y5b|-WVuu>oy9gte/EMAS/s8e;');

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
