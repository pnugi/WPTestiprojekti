<?php

/**
 * Froggy functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Froggy
 */

/** Froggy define **/
define("FROGGYROOT", get_template_directory_uri());
require_once get_template_directory() . '/mix.php';

/** Enhanced setup **/
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/gutenberg-setup.php';
require get_template_directory() . '/inc/security.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/navwalker.php';
require get_template_directory() . '/inc/wysiwyg.php';
require get_template_directory() . '/inc/filters.php';
require get_template_directory() . '/inc/comments.php';
require get_template_directory() . '/inc/admin-setup.php';
require get_template_directory() . '/inc/cpt.php';
require get_template_directory() . '/inc/acf.php';

/* Lisäosat */
// require get_template_directory() . '/inc/addons/image.php'; // Image srcset builder
// require get_template_directory() . '/inc/addons/autoset-featured-image.php'; // Automatically set featured images for posts
