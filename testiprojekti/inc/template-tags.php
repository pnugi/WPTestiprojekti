<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Froggy
 */

if ( ! function_exists( 'froggy_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/category.
 */
function froggy_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<span class="posted-on"><strong>' . $time_string . '</strong></span>'; // WPCS: XSS OK.

}
endif;


if ( ! function_exists( 'froggy_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function froggy_entry_footer() {

	if(is_user_logged_in()) {
		echo '<footer class="entry-footer">';
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'froggy' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
		echo '</footer>';
	}

}
endif;


/**
 * Flush out the transients used in froggy_categorized_blog.
 */
function froggy_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'froggy_categories' );
}
add_action( 'edit_category', 'froggy_category_transient_flusher' );
add_action( 'save_post',     'froggy_category_transient_flusher' );


/*
* Echo or return string. If Polylang is active, echo or get translated string.
*/
function froggy_the_string($string) {
	if(function_exists('pll_register_string')) {
		$string = pll__($string);
	}
	echo $string;
}
function froggy_get_string($string) {
	if(function_exists('pll_register_string')) {
		$string = pll__($string);
	}
	return $string;
}

/*
* Polylang string translations
*/
function froggy_translated_strings(){
  return [
		// 404 & Coming soon
		'404: Mitään ei löytynyt' => 'Mitään ei löytynyt',
		'404: Oho! Etsimääsi sivua ei löytynyt.' => 'Oho! Etsimääsi sivua ei löytynyt.',
		'404: Hakusanalla ei löytynyt sisältöä. Koitahan toisella hakusanalla.' => 'Hakusanalla ei löytynyt sisältöä. Koitahan toisella hakusanalla.',
		'404: Emme valitettavasti löytäneet etsimääsi.' => 'Emme valitettavasti löytäneet etsimääsi.',
		'Huoltotila: Sivun otsikko' => 'Huoltotila',
    // Haku
    'Haku: Hae' => 'Hae',
    'Haku: Placeholder' => 'Kirjoita hakusana',
		'Haku: Hakutulokset:' => 'Hakutulokset:',
  ];
}
if(function_exists('pll_register_string')){
  $strings = froggy_translated_strings();

	foreach ($strings as $key => $value) {
	  pll_register_string($key, $value, 'Froggy');
  }
}


/*
* Custom excerpt
*/
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

/*
* Froggy pagination
*/
function froggy_pagination() {
	global $wp_query;
	$count = $wp_query->found_posts;
	$posts_per_page_option = get_option( 'posts_per_page' );
  echo '<div class="pagination-wrap">';
  if ($count > $posts_per_page_option):
    the_posts_pagination([
      'mid_size'  => 2,
      'prev_text' => '&laquo;',
      'next_text' => '&raquo;',
    ]);
  endif;
  echo '</div>';
}
