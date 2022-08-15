<?php

// BEGIN ENHANCED SECURITY

// Remove unnecessary rest api end points
add_filter( 'rest_endpoints', function( $endpoints ){

  if(!is_user_logged_in()) {
    $unwanted_routes = [
      '/wp/v2/users',
      '/wp/v2/users/(?P<id>[\d]+)',
      '/wp/v2/settings',
      '/wp/v2/users/me',
      '/wp/v2/comments',
      '/wp/v2/comments/(?P<id>[\\d]+)',
      '/wp/v2/statuses',
      '/wp/v2/statuses/(?P<status>[\\w-]+)',
      '/wp/v2/media',
      '/wp/v2/media/(?P<id>[\\d]+)',
      '/wp/v2/posts/(?P<parent>[\\d]+)/revisions',
      '/wp/v2/posts/(?P<parent>[\\d]+)/revisions/(?P<id>[\\d]+)',
      '/wp/v2/pages/(?P<parent>[\\d]+)/revisions',
      '/wp/v2/pages/(?P<parent>[\\d]+)/revisions/(?P<id>[\\d]+)',
    ];
  } else {
    $unwanted_routes = [];
  }

  foreach ($unwanted_routes as $route) {
      if ( isset( $endpoints[$route] ) ) unset( $endpoints[$route] );
  }

  return $endpoints;
});

// Remove unnecessary header information
function froggy_remove_header_info() {
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2 );
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head',10,0); // for WordPress >= 3.0
}
add_action('init', 'froggy_remove_header_info');

// Remove wp version meta tag and from rss feed
add_filter('the_generator', '__return_false');

// Disable ping back scanner and complete xmlrpc class.
add_filter( 'wp_xmlrpc_server_class', '__return_false' );
add_filter('xmlrpc_enabled', '__return_false');

// Disable redirect to login page :
function froggy_prevent_multisite_signup()
{
    wp_redirect( site_url() );
    die();
}
add_action( 'signup_header', 'froggy_prevent_multisite_signup' );

// Remove xpingback header
function froggy_remove_x_pingback($headers) {
    unset($headers['X-Pingback']);
    return $headers;
}
add_filter('wp_headers', 'froggy_remove_x_pingback');



?>
