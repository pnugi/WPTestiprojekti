<?php
/**
 * WYSIWYG Customizer
 *
 *
 * @package Froggy
 */


/** Editor styles **/
add_filter('mce_buttons_2', function ($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
});


add_filter('tiny_mce_before_init', function ($init_array) {

	$style_formats = [
		[
			'title' => 'Iso teksti',
			'block' => 'span',
			'classes' => 'lead',
			'wrapper' => true,
		],
		[
			'title' => 'Painike - Pääväri',
			'selector' => 'a',
			'classes' => 'btn btn-primary',
		],
	];

	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

});

function froggy_change_image_defaults() {
	update_option('image_default_align', 'none');
	update_option('image_default_link_type', 'none');
}

add_action('admin_init', 'froggy_change_image_defaults');

// Show 2nd editor row by default
function froggy_show_second_editor_row( $tinymce ) {
	$tinymce[ 'wordpress_adv_hidden' ] = FALSE;
	return $tinymce;
}

add_filter( 'tiny_mce_before_init', 'froggy_show_second_editor_row' );
// Default gallery links to file, size to medium and columns to 2
function froggy_gallery_defaults( $settings ) {
	$settings['galleryDefaults']['link'] = 'file';
	$settings['galleryDefaults']['size'] = 'medium';
	$settings['galleryDefaults']['columns'] = '2';
	return $settings;
}
add_filter( 'media_view_settings', 'froggy_gallery_defaults');

/**
* Custom Wysiwyg editors
* https://github.com/wp-premium/advanced-custom-fields-pro/blob/master/includes/fields/class-acf-field-wysiwyg.php#L117
**/

add_filter('acf/fields/wysiwyg/toolbars', function ($toolbars)
{
  $toolbars['Limited'] = [
    1 => [
			'bold',
      'italic',
			'bullist',
			'numlist',
			'alignleft',
			'aligncenter',
			'alignright',
			'link',
			'formatselect',
			'styleselect',
    ],
  ];
  return $toolbars;
});
