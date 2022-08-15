<?php

// Remove useless user roles
function froggy_remove_roles() {
  if (get_role('contributor')) {
    remove_role('contributor');
  }
  if (get_role('subscriber')) {
    remove_role('subscriber');
  }
  if(get_role('wpseo_manager')) {
    remove_role('wpseo_manager');
  }
  if(get_role('wpseo_editor')) {
    remove_role('wpseo_editor');
  }
}
add_action( 'init', 'froggy_remove_roles' );

// Hide user custom field if non-admin
function froggy_hide_user_meta($field) {
  if( get_user_meta(get_current_user_id(), 'froggy_superadmin', true) == 1 || get_current_user_id() == 1 ) {
    return $field;
  } else {
    return false;
  }
}
add_filter('acf/load_field/name=froggy_superadmin', 'froggy_hide_user_meta');

// Remove core update nags from non-admins
function froggy_remove_update_nags_for_non_admins() {
  if( get_user_meta(get_current_user_id(), 'froggy_superadmin', true != 1) ) {
    remove_action( 'admin_notices', 'update_nag', 3 );
  }
}
add_action( 'admin_head', 'froggy_remove_update_nags_for_non_admins', 1 );

// Remove plugin update nags from non-admins
function froggy_disable_plugin_update_notifications( $value ) {
  if ( (defined( 'WP_CLI' ) && WP_CLI) || get_user_meta(get_current_user_id(), 'froggy_superadmin', true == 1) ) {
    return $value;
  } else {
    return null;
  }
}
add_filter( 'site_transient_update_plugins', 'froggy_disable_plugin_update_notifications' );

// Remove theme update nags from non-admins
function froggy_disable_theme_update_notifications( $value ) {
  if ( (defined( 'WP_CLI' ) && WP_CLI) || get_user_meta(get_current_user_id(), 'froggy_superadmin', true == 1) ) {
    return $value;
  } else {
    return null;
  }
}
add_filter( 'site_transient_update_themes', 'froggy_disable_theme_update_notifications' );

// Remove customizer from admin bar
function froggy_remove_customizer_admin_bar( $wp_admin_bar ) {
  $wp_admin_bar->remove_menu( 'customize' );
}
add_action( 'admin_bar_menu', 'froggy_remove_customizer_admin_bar', 999 );


// Clean up admin menus for non-admins
function froggy_cleanup_admin_menu() {
  if ( ! current_user_can ( 'administrator' ) ) {
    //remove_menu_page('tools.php');
    remove_submenu_page( 'themes.php', 'themes.php' );
    remove_submenu_page( 'themes.php', 'customize.php' );
  }
}
add_action( 'admin_menu', 'froggy_cleanup_admin_menu', 9999 );


// Remove Yoast notifications
function froggy_remove_wpseo_notifications() {
  if ( !class_exists( 'Yoast_Notification_Center' ) )
    return;
  remove_action( 'admin_notices', array( Yoast_Notification_Center::get(), 'display_notifications' ) );
  remove_action( 'all_admin_notices', array( Yoast_Notification_Center::get(), 'display_notifications' ) );
}
add_action( 'admin_init', 'froggy_remove_wpseo_notifications' );


// Remove "SEO" from admin bar
function froggy_yoast_admin_bar_render() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wpseo-menu');
}
add_action( 'wp_before_admin_bar_render', 'froggy_yoast_admin_bar_render' );

/** Yoast SEO meta low **/
add_filter( 'wpseo_metabox_prio', function(){ return 'low'; } );


// Hide ACF from non-administrator admin menu
function froggy_hide_acf_from_nonadmins( $show ) {
  return current_user_can('administrator');
}
add_filter('acf/settings/show_admin', 'froggy_hide_acf_from_nonadmins');


// Hide "Site health"-widget from dashboard
add_action('wp_dashboard_setup', 'froggy_hide_site_health');
function froggy_hide_site_health() {
  remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
}


// Custom dashboard
// remove all default widgets
add_action('wp_dashboard_setup', 'froggy_remove_all_dashboard_widgets', 999);
function froggy_remove_all_dashboard_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']);
  remove_action( 'welcome_panel', 'wp_welcome_panel' );
}
// add froggy custom widget
add_action('wp_dashboard_setup', 'froggy_custom_dashboard_widget', 9999);
function froggy_custom_dashboard_widget() {
  global $wp_meta_boxes;
  if(function_exists('get_field')) {
    $widget_title = get_field('dashboard_widget_title', 'option');
    wp_add_dashboard_widget('froggy_support_widget', $widget_title, 'froggy_custom_dashboard_content');
  }
}
// add custom widget content
function froggy_custom_dashboard_content() {
  if(function_exists('get_field')) {
    echo get_field('dashboard_widget_content', 'option');
  }
}


// Login screen styles
function froggy_login_styles() {
  if(function_exists('get_field')) { ?>
    <style type="text/css">
        .login {
            background: <?php the_field('login_background_color', 'option'); ?>;
            background-image: url('<?php the_field('login_background', 'option'); ?>');
            background-repeat: no-repeat;
            background-size: cover;
        }
        <?php if(get_field('login_logo', 'option')) { ?>

        #login h1 a, .login h1 a {
            background-image: url('<?php the_field('login_logo', 'option'); ?>');
            max-height:100px; height: auto; min-height: 70px;
            max-width:320px; width: auto; margin: 0;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }
        <?php } ?>
        .login form {
            border-radius: <?php the_field('login_rounded', 'option'); ?>px !important;
        }
        .login #backtoblog a, .login #nav a { color: <?php the_field('login_background_text', 'option'); ?> !important; }
        #language-switcher { color: <?php the_field('login_background_text', 'option'); ?> !important; }
        .wp-core-ui .button-primary {
            background: <?php the_field('login_primary_color', 'option'); ?> !important;
            border-color: <?php the_field('login_primary_color', 'option'); ?> !important;
            border-radius: calc(<?php the_field('login_rounded', 'option'); ?>px / 2) !important;
        }
        <?php if(get_field('login_background', 'option')) { ?>
        .login #backtoblog, .login #nav { padding: 0 !important; text-align: center; }
        .login #backtoblog a, .login #nav a {
            display: block;
            color: #fff;
            background: <?php the_field('login_primary_color', 'option'); ?> !important;
            border-color: #fff !important; border-style: solid; border-width: 1px;
            border-radius: <?php the_field('login_rounded', 'option'); ?>px !important;
            padding: 0 12px;
            min-height: 32px;
            line-height: 2.30769231;
        }

        <?php } ?>

    </style>
  <?php }
}
add_action( 'login_enqueue_scripts', 'froggy_login_styles' );


/*
* Maintenance mode
*/
function froggy_maintenance_mode() {

  if(!get_field('maintenance_mode_status', 'option')) {
    return;
  }

  if(is_user_logged_in()) {
    return;
  }

  if(is_admin()) {
    return;
  }

  if(get_field('maintance_mode_redirect', 'option')) {
    wp_redirect(get_field('maintance_mode_redirect', 'option')); exit;
  }

  require_once 'addons/maintenance.php';
  die();

}
add_action( 'get_header', 'froggy_maintenance_mode', 9999);
