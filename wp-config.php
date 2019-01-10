<?php
define( 'WP_CACHE', true ); // Powered Cache
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
define('DB_NAME', 'ivajlose_wp842');
/** MySQL database username */
define('DB_USER', 'ivajlose_wp842');
/** MySQL database password */
define('DB_PASSWORD', '7npS4J(-4V');
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
define('AUTH_KEY',         'figcv6bubgox8szmq4be5j3qfjqzc7mk0tewirsy2me6aj7ihqttbibjafsrishf');
define('SECURE_AUTH_KEY',  '2vyvjq1yvwfa1vscnryovbzdbuk9qjbhwkhhgm3aop8g72kmwjcjmxduhugwqtwd');
define('LOGGED_IN_KEY',    'qmxnchuxjnae1qezl39g8bjgf2js1snl7byb2wtcruvaeew6d9rx1xxh0tvlfba7');
define('NONCE_KEY',        '6dxvjq8s3dtmzjvuchwe6nkgtenz5ivqtpt4ogtj9fz0jfazatbnhmjohebsblvy');
define('AUTH_SALT',        '11vbzf9r65fz7eyztyfdvmlurkd9qoeqbu82uw14qbgroikxrwc7ibii7xxq6z64');
define('SECURE_AUTH_SALT', 'r6lp7ibv3xlmokwxyx8ceqrbk3mmjg5bvnhehrlovqtta8b81o1jdbyqgulr4cg6');
define('LOGGED_IN_SALT',   'z5vxuqjm8btbfg61ym3npnjjenyvg8m4pq7zeeuifhfq5dg1mtzx2ujnpn5zrnii');
define('NONCE_SALT',       'vavcdyuaes6ciba4zbvhmu1bgxkbw5ghtas7r3oyj4oihc11i50cgdqnb4jflxkx');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp1p_';
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
define('WP_DEBUG', false);
/* That's all, stop editing! Happy blogging. */
$memcached_servers = array( 'default' => array( '127.0.0.1:23310', '127.0.0.1:29407' ) );
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');