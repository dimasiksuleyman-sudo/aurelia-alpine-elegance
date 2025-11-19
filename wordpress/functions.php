<?php
/**
 * Aurelia Hotel Theme Functions
 *
 * @package Aurelia_Hotel
 * @since 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define Constants
 */
define( 'AURELIA_VERSION', '1.0.0' );
define( 'AURELIA_THEME_DIR', get_template_directory() );
define( 'AURELIA_THEME_URI', get_template_directory_uri() );

/**
 * Theme Setup
 *
 * @since 1.0.0
 */
function aurelia_theme_setup() {
	// Add theme support for Full Site Editing.
	add_theme_support( 'block-templates' );
	add_theme_support( 'block-template-parts' );

	// Add theme support for various WordPress features.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Add custom image sizes for hotel rooms.
	add_image_size( 'aurelia-room-card', 600, 400, true );
	add_image_size( 'aurelia-room-card-2x', 1200, 800, true );
	add_image_size( 'aurelia-room-hero', 1920, 1080, true );
	add_image_size( 'aurelia-testimonial-avatar', 112, 112, true );

	// Register navigation menus.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'aurelia-hotel' ),
		'footer'  => __( 'Footer Menu', 'aurelia-hotel' ),
	) );

	// Set content width.
	$GLOBALS['content_width'] = 800;
}
add_action( 'after_setup_theme', 'aurelia_theme_setup' );

/**
 * Enqueue Styles and Scripts
 *
 * @since 1.0.0
 */
function aurelia_enqueue_assets() {
	// Enqueue Google Fonts.
	wp_enqueue_style(
		'aurelia-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);

	// Enqueue theme stylesheet.
	wp_enqueue_style(
		'aurelia-style',
		get_stylesheet_uri(),
		array(),
		AURELIA_VERSION
	);

	// Enqueue custom CSS.
	wp_enqueue_style(
		'aurelia-custom',
		AURELIA_THEME_URI . '/assets/css/custom.css',
		array( 'aurelia-style' ),
		AURELIA_VERSION
	);

	// Enqueue main JavaScript.
	wp_enqueue_script(
		'aurelia-main',
		AURELIA_THEME_URI . '/assets/js/main.js',
		array(),
		AURELIA_VERSION,
		true
	);

	// Localize script for AJAX.
	wp_localize_script(
		'aurelia-main',
		'aureliaAjax',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'aurelia-nonce' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'aurelia_enqueue_assets' );

/**
 * Include Required Files
 */
require_once AURELIA_THEME_DIR . '/inc/post-types.php';
require_once AURELIA_THEME_DIR . '/inc/template-functions.php';

/**
 * Block Pattern Categories
 *
 * @since 1.0.0
 */
function aurelia_register_block_pattern_categories() {
	register_block_pattern_category(
		'aurelia-hotel',
		array(
			'label'       => __( 'Aurelia Hotel', 'aurelia-hotel' ),
			'description' => __( 'Block patterns for Aurelia Hotel theme', 'aurelia-hotel' ),
		)
	);

	register_block_pattern_category(
		'aurelia-sections',
		array(
			'label'       => __( 'Hotel Sections', 'aurelia-hotel' ),
			'description' => __( 'Full-width section patterns', 'aurelia-hotel' ),
		)
	);
}
add_action( 'init', 'aurelia_register_block_pattern_categories' );

/**
 * Customize Excerpt Length
 *
 * @param int $length The excerpt length.
 * @return int Modified excerpt length.
 * @since 1.0.0
 */
function aurelia_custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'aurelia_custom_excerpt_length' );

/**
 * Customize Excerpt More Text
 *
 * @param string $more The excerpt more text.
 * @return string Modified excerpt more text.
 * @since 1.0.0
 */
function aurelia_custom_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'aurelia_custom_excerpt_more' );

/**
 * Add custom body classes
 *
 * @param array $classes Body classes.
 * @return array Modified body classes.
 * @since 1.0.0
 */
function aurelia_body_classes( $classes ) {
	// Add class for Full Site Editing.
	$classes[] = 'block-theme';

	// Add class for singular hotel rooms.
	if ( is_singular( 'hotel_room' ) ) {
		$classes[] = 'single-hotel-room';
	}

	return $classes;
}
add_filter( 'body_class', 'aurelia_body_classes' );

/**
 * Security: Remove WordPress version from head
 *
 * @since 1.0.0
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Performance: Disable emojis
 *
 * @since 1.0.0
 */
function aurelia_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'aurelia_disable_emojis' );

/**
 * Add preload for fonts
 *
 * @since 1.0.0
 */
function aurelia_preload_fonts() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action( 'wp_head', 'aurelia_preload_fonts', 1 );
