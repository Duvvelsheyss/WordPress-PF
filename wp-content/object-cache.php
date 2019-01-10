<?php 
defined( 'ABSPATH' ) || exit;
define( 'POWERED_OBJECT_CACHE', true );
if ( ! @file_exists( WP_CONTENT_DIR . '/pc-config/config-' . $_SERVER['HTTP_HOST'] . '.php' ) ) { return; }
$GLOBALS['powered_cache_options'] = include( WP_CONTENT_DIR . '/pc-config/config-' . $_SERVER['HTTP_HOST'] . '.php' );

if ( defined( 'POWERED_CACHE_OBJECT_CACHE_DROPIN') && @file_exists( POWERED_CACHE_OBJECT_CACHE_DROPIN ) ) {
	include( POWERED_CACHE_OBJECT_CACHE_DROPIN );
} elseif ( @file_exists( '/home/ivajlose/public_html/wp-content/plugins/powered-cache/includes/dropins/memcached-object-cache.php' ) ) {
	include( '/home/ivajlose/public_html/wp-content/plugins/powered-cache/includes/dropins/memcached-object-cache.php' );
} else {
	define( 'POWERED_OBJECT_CACHE_HAS_PROBLEM', true );
}