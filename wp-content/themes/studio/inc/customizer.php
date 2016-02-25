<?php
/**
 * Studio Theme Customizer
 *
 * @package Studio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function studio_customize_register( $wp_customize ) {
	//Include custom controls
	require get_template_directory() . '/inc/customizer-includes/customizer-custom-controls.php';

	$defaults = studio_get_default_theme_options();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	// Theme doesn't add a tagline.
	$wp_customize->remove_control('blogdescription');

	//Theme Options
	require get_template_directory() . '/inc/customizer-includes/customizer-theme-options.php';
	
	// Reset all settings to default
	$wp_customize->add_section( 'studio_reset_all_settings', array(
		'description'	=> __( 'Caution: Reset all settings to default. Refresh the page after save to view full effects.', 'studio' ),
		'priority' 		=> 700,
		'title'    		=> __( 'Reset all settings', 'studio' ),
	) );

	$wp_customize->add_setting( 'reset_all_settings', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['reset_all_settings'],
		'sanitize_callback' => 'studio_reset_all_settings',
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'reset_all_settings', array(
		'label'    => __( 'Check to reset all settings to default', 'studio' ),
		'section'  => 'studio_reset_all_settings',
		'settings' => 'reset_all_settings',
		'type'     => 'checkbox',
	) );
	// Reset all settings to default end

	$wp_customize->add_section( 'important_links', array(
		'priority' 		=> 999,
		'title'   	 	=> __( 'Important Links', 'studio' ),
	) );

	/**
	 * Has dummy Sanitizaition function as it contains no value to be sanitized
	 */
	$wp_customize->add_setting( 'important_links', array(
		'sanitize_callback'	=> 'studio_sanitize_important_link',
	) );

	$wp_customize->add_control( new StudioImportantLinks( $wp_customize, 'important_links', array(
        'label'   	=> __( 'Important Links', 'studio' ),
        'section'  	=> 'important_links',
        'settings' 	=> 'important_links',
        'type'     	=> 'important_links',
    ) ) );  
    //Important Links End
}
add_action( 'customize_register', 'studio_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function studio_customize_preview_js() {
	wp_enqueue_script( 'studio_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'studio_customize_preview_js' );

/**
 * Custom scripts and styles on customize.php for studio.
 *
 * @since Studio 0.4
 */
function studio_customize_scripts() {
	wp_enqueue_script( 'studio_customizer_custom', get_template_directory_uri() . '/js/customizer-custom-scripts.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20150630', true );

	$studio_misc_links = array(
							'upgrade_link' 				=> esc_url( 'http://catchthemes.com/themes/studio-pro/' ),
							'upgrade_text'	 			=> __( 'Upgrade To Pro &raquo;', 'studio' ),
		);

	//Add Upgrade Button, old WordPress message and color list via localized script
	wp_localize_script( 'studio_customizer_custom', 'studio_misc_links', $studio_misc_links );

	wp_enqueue_style( 'studio_customizer_custom', get_template_directory_uri() . '/css/customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'studio_customize_scripts');

/**
 * Customizer sanitize functions
 */
require get_template_directory() . '/inc/customizer-includes/customizer-sanitize-functions.php';