<?php
/*
add_action( 'init', 'add_posttype_POSTTYPE' );
function add_posttype_POSTTYPE() {
  register_post_type(
    'POSTTYPE',
    [
      'labels' => [
        'name' => 'POSTTYPE' ,
        'singular_name' => 'POSTTYPE_SINGLE'
      ],
      'public' => true,
      'exclude_from_search' => true, // Oletuksena ei näytetä tuloksia haussa
      'publicly_queryable' => false, // Oletuksena ei näytetä single-sivuja
      'has_archive' => false, // Oletuksena ei arkistosivua
      'show_in_rest' => true, // Oletuksena Gutenberg-editori päällä
      'rewrite' => [
          'slug' => 'POSTTYPE_SLUG'
      ],
      'menu_icon' => 'dashicons-analytics',
    ]
  );
}
*/

/*
add_action( 'init', 'create_tax_POSTTYPE_taxonomies' );
function create_tax_POSTTYPE_taxonomies() {
	register_taxonomy(
		'POSTTYPE_TAXONOMY',
		'POSTTYPE',
		[
			'label' => "TAXONOMY_NAME",
			'rewrite' => ['slug' => 'TAXONOMY_SLUG'],
			'hierarchical' => true,
      'show_in_rest' => true, // Oletuksena Gutenberg-editori päällä
      'publicly_queryable' => false, // Oletuksena ei arkistosivua
		]
	);
}
*/
