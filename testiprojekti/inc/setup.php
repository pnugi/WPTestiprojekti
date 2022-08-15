<?php
/**
 * Theme setup
 *
 * @package Froggy
 */

if ( ! function_exists( 'froggy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function froggy_setup() {

	load_theme_textdomain( 'froggy', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', ['search-form','comment-list','gallery','caption'] );

	/* Disabloidaan wordpressin automaattinen kuvan pienennys (5.3.0) */
	add_filter( 'big_image_size_threshold', '__return_false' );

  /* Oletus kuvakoot */
	add_image_size( 'thumbnail', 480, 320, true ); // 3:2
	add_image_size( 'medium', 1280, 720, true ); // 16:9
	add_image_size( 'large', 2560, 1080, true ); // 21:9

	/* Rekisteröidään valikot */
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'froggy' ),
	) );

}
endif;
add_action( 'after_setup_theme', 'froggy_setup' );

/*
* Remove some of the default image sizes
*/
function froggy_remove_image_sizes( $sizes ) {
  /* Default WordPress */
  unset( $sizes[ 'medium_large' ]);
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );
  return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'froggy_remove_image_sizes' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function froggy_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar page', 'froggy' ),
		'id'            => 'sidebar-page',
		'description'   => esc_html__( 'Add widgets here.', 'froggy' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'froggy_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function froggy_scripts() {

	wp_enqueue_style( 'layout', Mix::version('bundle.css'), [], null );
	wp_enqueue_script( 'scripts', Mix::version('bundle.js'), [], null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'froggy_scripts' );
