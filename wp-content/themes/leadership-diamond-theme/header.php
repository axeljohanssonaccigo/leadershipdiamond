<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Studio
 */

	/** 
	 * studio_doctype hook
	 *
	 * @hooked studio_doctype -  10
	 * 
	 */
	do_action( 'studio_doctype' );
	?>

    <head>
        <?php	
	/** 
	 * studio_before_wp_head hook
	 *
	 * @hooked studio_head -  10
	 * 
	 */
	do_action( 'studio_before_wp_head' );

	wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <?php 
	/** 
	 * studio_before_header hook
	 *
	 * @hooked studio_page_start -  10
	 * 
	 */
	do_action( 'studio_before_header' );
	

	/** 
	 * studio_header hook
	 *
	 * @hooked studio_header_start -  10
	 * @hooked studio_site_branding_start -  30
	 * @hooked studio_logo -  50
	 * @hooked studio_site_title_description -  60
	 * @hooked studio_site_branding_end -  70
	 * @hooked studio_header_menu -  80
	 * @hooked studio_primary_menu - 110
	 * @hooked studio_header_end -  200
	 * 
	 */
	 // do_action( 'studio_header' );


	/** 
	 * studio_after_header hook
	 * 
	 */
	do_action( 'studio_after_header' );


	/** 
	 * studio_content hook
	 *
	 * @hooked studio_content_start - 10
	 * 
	 */
	do_action( 'studio_content' );