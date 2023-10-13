<?php
/**
 * norhageindustri functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package norhageindustri
 */

if ( ! defined( '_G_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_G_VERSION', '0.0.1' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function norhageindustri_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on norhageindustri, use a find and replace
		* to change 'norhageindustri' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'norhageindustri', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'norhageindustri' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support( 'align-wide' );

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'norhageindustri_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'norhageindustri_setup' );

/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function norhageindustri_register_acf_blocks() {
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
    register_block_type( __DIR__ . '/blocks/headerblock' );
    register_block_type( __DIR__ . '/blocks/product-header-block' );
    register_block_type( __DIR__ . '/blocks/text-image-block' );
    register_block_type( __DIR__ . '/blocks/projects-block' );
    register_block_type( __DIR__ . '/blocks/cta-block' );
    register_block_type( __DIR__ . '/blocks/cta-within-text-block' );
    register_block_type( __DIR__ . '/blocks/reviews-block' );
}
// Here we call our tt3child_register_acf_block() function on init.
add_action( 'init', 'norhageindustri_register_acf_blocks' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
/*
function norhageindustri_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'norhageindustri_content_width', 800 );
}
add_action( 'after_setup_theme', 'norhageindustri_content_width', 0 );
*/

/**
 * Enqueue scripts and styles.
 */
function norhageindustri_scripts() {
	wp_enqueue_style( 'norhageindustri-style', get_stylesheet_uri(), array(), _G_VERSION );
	/*
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}*/
}
add_action( 'wp_enqueue_scripts', 'norhageindustri_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

