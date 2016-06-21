<?php
/**
 * Studio functions and definitions
 *
 * @package Studio
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 924; /* pixels */
}

if ( ! function_exists( 'studio_content_width' ) ) :
	/**
	 * Change the content width based on the Theme Settings and Page/Post Settings
	 */
	function studio_content_width() {
		global $post, $wp_query, $content_width;

		//Getting Ready to load options data
		$themeoption_layout 	= get_theme_mod( 'theme_layout', studio_get_default_theme_options( 'theme_layout' ) );

		// Front page displays in Reading Settings
		$page_on_front = get_option('page_on_front') ;
		$page_for_posts = get_option('page_for_posts');

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();

		// Blog Page or Front Page setting in Reading Settings
		if ( $page_id == $page_for_posts || $page_id == $page_on_front ) {
	        $layout  = get_post_meta( $page_id,'studio-layout-option', true );
	    }
    	elseif ( is_singular() ) {
	 		if ( is_attachment() ) {
				$parent = $post->post_parent;

				$layout = get_post_meta( $parent,'studio-layout-option', true );
			}
			else {
				$layout = get_post_meta( $post->ID,'studio-layout-option', true );
			}
		}
		else {
			$layout = 'default';
		}

		//check empty and load default
		if( empty( $layout ) ) {
			$layout = 'default';
		}

		//Two Column: Left and Right Sidebar
		if ( $layout == 'right-sidebar' || $layout == 'left-sidebar' || ( $layout=='default' && ( $themeoption_layout == 'right-sidebar' || $themeoption_layout == 'left-sidebar' ) ) ) {
			$content_width = 860;
		}

	}
endif;
add_action( 'template_redirect', 'studio_content_width' );

if ( ! function_exists( 'studio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function studio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Studio, use a find and replace
	 * to change 'studio' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'studio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add tyles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', studio_fonts_url() ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 924, 520, true );
	add_image_size( 'studio-single', '924', '520', true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'studio' ),
		'social'  => esc_html__( 'Social Menu', 'studio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'studio_custom_background_args', array(
	    'default-attachment'	=> 'fixed',
		'default-color'			=> '',
		'default-image'			=> get_template_directory_uri() . '/images/default-image.jpg',
		'default-position-x'	=> 'center',
	) ) );
}
endif; // studio_setup
add_action( 'after_setup_theme', 'studio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function studio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'studio_content_width', 800 );
}
add_action( 'after_setup_theme', 'studio_content_width', 0 );

/**
 * Google fonts.
 */
function studio_fonts_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'studio' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Montserrat|Bowlby One|Quattrocento Sans:400,400italic,700italic,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 */
function studio_admin_fonts() {
	wp_enqueue_style( 'studio-font', studio_fonts_url(), array(), '1.0.0' );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'studio_admin_fonts' );

/**
 * Enqueue scripts and styles.
 */
function studio_scripts() {
	wp_enqueue_style( 'studio-style', get_stylesheet_uri(), array(), '1.0.0' );

	wp_enqueue_style( 'studio-fonts', studio_fonts_url(), array(), '1.0.0' );

	wp_enqueue_style( 'studio-icons', get_template_directory_uri() . '/css/typicons.css', array(), '1.0.0' );

	/* BOOTSTRAP */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0.0' );

	/*CUSTOM CSS*/
	wp_enqueue_style('diamond-style-common',  get_template_directory_uri() . '/css/leadership.diamond.common.css', false);

	wp_enqueue_script( 'studio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );

	wp_enqueue_script( 'studio-helpers', get_template_directory_uri() . '/js/helpers.js', array( 'jquery' ), '1.0.0', true );

	wp_enqueue_script( 'studio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0.0', true );

	/* Angular */
	wp_enqueue_script('angular', get_template_directory_uri() . '/js/assets/angular.js', array(), null, true);
	wp_enqueue_script('angular_animate', get_template_directory_uri() . '/js/assets/angular-animate.js', array(), null, true);
	wp_enqueue_script('angular_touch', get_template_directory_uri() . '/js/assets/angular-touch.js', array(), null, true);

	/* BOOTSTRAP */
	wp_enqueue_script('ui_bootstrap_tpls_min', get_template_directory_uri() . '/js/assets/ui-bootstrap-tpls-1.3.3.min.js', array(), null, true);

	/* CUSTOM SCRIPTS */
	$version = '0.8';
	/* Diamond App */
	wp_enqueue_script('diamond_app', get_template_directory_uri() . '/js/app/diamondApp.js', array(), $version, true);
	wp_enqueue_script('start_ctrl', get_template_directory_uri() . '/js/app/controllers/startCtrl.js', array(), $version, true);
	wp_enqueue_script('header_ctrl', get_template_directory_uri() . '/js/app/controllers/headerCtrl.js', array(), $version, true);

	wp_enqueue_script('start-svc', get_template_directory_uri() . '/js/app/services/startSvc.js', array(), $version, true);

	// Localize script (only few lines in helpers.js)
    wp_localize_script( 'studio-helpers', 'placeholder', array(
 	    'author'   => __( 'Name', 'studio' ),
 	    'email'    => __( 'Email', 'studio' ),
		'url'      => __( 'URL', 'studio' ),
		'comment'  => __( 'Comment', 'studio' )
 	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'studio_scripts' );

/**
 * Include Default Options for Studio
 */
require get_template_directory() . '/inc/default-options.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load sidebars and widgets
 */
require get_template_directory() . '/inc/widgets.php';

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
