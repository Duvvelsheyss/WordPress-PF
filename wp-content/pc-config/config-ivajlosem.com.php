<?php
defined( 'ABSPATH' ) || exit;
return array (
  'enable_page_caching' => true,
  'configure_htaccess' => true,
  'object_cache' => 'memcached',
  'cache_mobile' => true,
  'cache_mobile_separate_file' => false,
  'loggedin_user_cache' => false,
  'ssl_cache' => true,
  'gzip_compression' => true,
  'cache_timeout' => 360,
  'cache_location' => '/home/ivajlose/public_html/wp-content/cache/',
  'remove_query_string' => false,
  'rejected_user_agents' => '',
  'rejected_cookies' => '',
  'rejected_uri' => '',
  'accepted_query_strings' => '',
  'purge_additional_pages' => '',
  'cdn_status' => false,
  'cdn_hostname' => 
  array (
  ),
  'cdn_zone' => 
  array (
  ),
  'cdn_rejected_files' => '',
  'show_cache_message' => true,
);
