<?php
/**
 * roehampton_Venues functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package roehampton_Venues
 */

if ( ! function_exists( 'roehampton_venues_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function roehampton_venues_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on roehampton_Venues, use a find and replace
	 * to change 'roehampton_venues' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'roehampton_venues', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('gallery_image', 308, 200, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'roehampton_venues' ),
		'footer' => esc_html__( 'Footer', 'roehampton_venues' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'roehampton_venues_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'roehampton_venues_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function roehampton_venues_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'roehampton_venues_content_width', 640 );
}
add_action( 'after_setup_theme', 'roehampton_venues_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function roehampton_venues_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'roehampton_venues' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'roehampton_venues' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'roehampton_venues_widgets_init' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}


function allow_svgimg_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'allow_svgimg_types');






/**
 * Enqueue scripts and styles.
 */
	function roehampton_venues_scripts() {
		wp_enqueue_style( 'uikit', get_template_directory_uri() . '/css/uikit.css' );
		wp_enqueue_style( 'slideshow', get_template_directory_uri() . '/css/components/slideshow.css' );
		wp_enqueue_style( 'app', get_template_directory_uri() . '/css/app.css' );
	
	
	wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'uikit', get_template_directory_uri() . '/js/uikit.min.js', array(), '', true );
		wp_enqueue_script( 'grid', get_template_directory_uri() . '/js/components/grid.min.js', array(), '', true );
		wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array(), '', true );
		wp_enqueue_script( 'offcanvas', get_template_directory_uri() . '/js/core/offcanvas.min.js', array(), '', true );
		wp_enqueue_script( 'slideshow', get_template_directory_uri() . '/js/components/slideshow.js', array(), '', true );
		wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/components/lightbox.js', array(), '', true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'roehampton_venues_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
