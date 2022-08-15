<?php


/* Clean up header */

function froggy_disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    add_filter( 'emoji_svg_url', '__return_false' );

    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'froggy_disable_emojicons_tinymce' );

}
add_action( 'init', 'froggy_disable_wp_emojicons' );


function froggy_disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/* Load GF JS footer - Conditional Logic Fix */
add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter('gform_tabindex', '__return_true');
