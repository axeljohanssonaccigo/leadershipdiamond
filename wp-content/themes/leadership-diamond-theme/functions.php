<?php


function my_theme_enqueue_styles() {
  /* BOOTSTRAP */
  wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css', array(), '1.0.0' );

    
  /* HOVER */
  wp_enqueue_style( 'hover', get_stylesheet_directory_uri() . '/css/hover-min.css', array(), '1.0.0' );

  /* SCRIPT AND STYLES VERSION */
  $parent_style = 'parent-style';
  $version = '0.8';
  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), $version, true);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_scripts() {
    /* Angular */
    wp_enqueue_script('angular', get_stylesheet_directory_uri() . '/js/assets/angular.js', array(), null, true);
    wp_enqueue_script('angular_animate', get_stylesheet_directory_uri() . '/js/assets/angular-animate.js', array(), null, true);
    wp_enqueue_script('angular_touch', get_stylesheet_directory_uri() . '/js/assets/angular-touch.js', array(), null, true);

    /* BOOTSTRAP */
    wp_enqueue_script('ui_bootstrap_tpls_min', get_stylesheet_directory_uri() . '/js/assets/ui-bootstrap-tpls-1.3.3.min.js', array(), null, true);
    
    /* MATERIALIZE JS */
     wp_enqueue_script('materialize_js', get_stylesheet_directory_uri() . '/js/assets/materialize.min.js', array(), null, true);

    /* CUSTOM SCRIPTS */
    /* SCRIPT AND STYLES VERSION */
    $version = '0.8';
    /* Diamond App */
    wp_enqueue_script('diamond_app', get_stylesheet_directory_uri() . '/js/app/diamondApp.js', array(), $version, true);
    wp_enqueue_script('start_ctrl', get_stylesheet_directory_uri() . '/js/app/controllers/startCtrl.js', array(), $version, true);
    wp_enqueue_script('header_ctrl', get_stylesheet_directory_uri() . '/js/app/controllers/headerCtrl.js', array(), $version, true);
    wp_enqueue_script('footer_ctrl', get_stylesheet_directory_uri() . '/js/app/controllers/footerCtrl.js', array(), $version, true);

wp_enqueue_script('start_svc', get_stylesheet_directory_uri() . '/js/app/services/startSvc.js', array(), $version, true);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );

/* CUSTOM FUNCTIONS */
/********************/
/**
* Add custom fields to api
*/
function json_api_prepare_post( $post_response, $post, $context ) {
	$field = get_post_custom($post['ID']);
	$post_response['custom-fields'] = $field;
	return $post_response;
}
add_filter( 'json_prepare_post', 'json_api_prepare_post', 10, 3 );

?>