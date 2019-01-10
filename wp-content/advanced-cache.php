<?php 
defined( 'ABSPATH' ) || exit;
define( 'POWERED_CACHE_PAGE_CACHING', true );
$config_file = WP_CONTENT_DIR . '/pc-config/config-' . $_SERVER['HTTP_HOST'];

if ( is_multisite() && ( defined( 'SUBDOMAIN_INSTALL' ) && false === SUBDOMAIN_INSTALL ) ) {
	$request_uri   = explode( '/', ltrim( $_SERVER['REQUEST_URI'], '/' ) );
	$sub_site_name = $request_uri[0];
	$config_file .= '-'.$sub_site_name;
}
$config_file .= '.php';
if ( ! @file_exists( $config_file ) ) { return; }
$GLOBALS['powered_cache_options'] = include( $config_file );

$powered_cache_mobile_browsers = '2.0 MMP, 240x320, 400X240, AvantGo, BlackBerry, Blazer, Cellphone, Danger, DoCoMo, Elaine/3.0, EudoraWeb, Googlebot-Mobile, hiptop, IEMobile, KYOCERA/WX310K, LG/U990, MIDP-2., MMEF20, MOT-V, NetFront, Newt, Nintendo Wii, Nitro, Nokia, Opera Mini, Palm, PlayStation Portable, portalmmm, Proxinet, ProxiNet, SHARP-TQ-GX10, SHG-i900, Small, SonyEricsson, Symbian OS, SymbianOS, TS21i-10, UP.Browser, UP.Link, webOS, Windows CE, WinWAP, YahooSeeker/M1A1-R2D2, iPhone, iPod, Android, BlackBerry9530, LG-TU915 Obigo, LGE VX, webOS, Nokia5800';
$powered_cache_mobile_prefixes = 'w3c , w3c-, acs-, alav, alca, amoi, audi, avan, benq, bird, blac, blaz, brew, cell, cldc, cmd-, dang, doco, eric, hipt, htc_, inno, ipaq, ipod, jigs, kddi, keji, leno, lg-c, lg-d, lg-g, lge-, lg/u, maui, maxo, midp, mits, mmef, mobi, mot-, moto, mwbp, nec-, newt, noki, palm, pana, pant, phil, play, port, prox, qwap, sage, sams, sany, sch-, sec-, send, seri, sgh-, shar, sie-, siem, smal, smar, sony, sph-, symb, t-mo, teli, tim-, tosh, tsm-, upg1, upsi, vk-v, voda, wap-, wapa, wapi, wapp, wapr, webc, winw, winw, xda , xda-';
$powered_cache_slash_check = true;
if ( defined( 'POWERED_CACHE_ADVANCED_CACHE_DROPIN') && @file_exists( POWERED_CACHE_ADVANCED_CACHE_DROPIN ) ) {
	include( POWERED_CACHE_ADVANCED_CACHE_DROPIN );
} elseif ( @file_exists( '/home/ivajlose/public_html/wp-content/plugins/powered-cache/includes/dropins/page-cache.php' ) ) {
	include( '/home/ivajlose/public_html/wp-content/plugins/powered-cache/includes/dropins/page-cache.php' );
} else {
	define( 'POWERED_CACHE_PAGE_CACHING_HAS_PROBLEM', true );
}