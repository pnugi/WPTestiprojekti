<?php

// Include acf php-files
foreach (['acf'] as $directory) {
    foreach (glob(__DIR__ . "/{$directory}/*") as $file) {
        require_once $file;
    }
}


/* ACF pro not active error */
function froggy_acf_not_active(){
  if (!function_exists('acf_add_options_page')) { ?>
    <div class="notice notice-error is-dismissible">
      <p>Teema tarvitsee Advanced Custom Fields Pro -lisäosan toimiakseen oikein!</p>
    </div>
  <?php }
}
add_action('admin_notices', 'froggy_acf_not_active');


/* ACF Options valikko */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page([
  	'page_title' 	=> 'Teeman asetukset',
  	'menu_title'	=> 'Teema',
    'menu_slug' 	=> 'theme-general-settings',
  	'icon_url' 	  => 'dashicons-admin-customizer',
  	'capability'	=> 'administrator',
  	'redirect'		=> false
  ]);

  acf_add_options_sub_page([
    'page_title' 	=> 'Kirjautumisnäkymä',
    'menu_title'	=> 'Kirjautuminen',
    'parent_slug'	=> 'theme-general-settings',
    'menu_slug' 	=> 'theme-login',
    'capability'	=> 'administrator',
  ]);

  acf_add_options_sub_page([
    'page_title' 	=> 'Ohjausnäkymä',
    'menu_title'	=> 'Ohjausnäkymä',
    'parent_slug'	=> 'theme-general-settings',
    'menu_slug' 	=> 'theme-dashboard',
    'capability'	=> 'administrator',
  ]);

  acf_add_options_sub_page([
    'page_title' 	=> 'Huoltotila',
    'menu_title'	=> 'Huoltotila',
    'parent_slug'	=> 'theme-general-settings',
    'menu_slug' 	=> 'theme-maintenance',
    'capability'	=> 'administrator',
  ]);

}
