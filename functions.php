<?php
/**
 * The main core functional template for lucky theme.
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 */
/* lucky global variables */
define('THEME_DIR', trailingslashit(get_template_directory()));
define('THEME_URI', trailingslashit(get_template_directory_uri()));
define('THEME_VERSION', '1.0.0');
define('HOME_URL', trailingslashit(get_bloginfo('url')));
define('SITE_NAME', get_bloginfo('name'));
define('IS_MOBILE', wp_is_mobile());
define('SITE_HEADER', get_theme_mod('lucky_header_layout', 'default'));

/* lucky theme supports */
require THEME_DIR . 'inc/theme-supports.php';
/* lucky Theme functions */
require_once THEME_DIR . 'inc/theme-functions.php';
/* Enqueue all css & js files */
require_once THEME_DIR . 'inc/enqueue.php';
/* Customizer API */
if ( is_customize_preview() ) {
    require_once THEME_DIR . 'inc/customizer.php';
}
/* Customizer CSS */
require_once THEME_DIR . 'assets/css/customizer-css.php';

/* Handles JavaScript detection. Adds a `js` class to the root `<html>` element when JavaScript is detected. */
function lucky_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
} add_action( 'wp_head', 'lucky_javascript_detection', 0 );

/* Add a pingback url auto-discovery header for singularly identifiable articles. */
function lucky_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
} add_action( 'wp_head', 'lucky_pingback_header' );

/* Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function lucky_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';
	return $args;
} add_filter( 'widget_tag_cloud_args', 'lucky_widget_tag_cloud_args' );

/* Deregister css and js files

function lucky_deregister_styles(){
   wp_deregister_style('wp-block-library');
   wp_deregister_style('dashicons'); 
   wp_dequeue_style( 'wp-block-library' );
}
add_action('wp_print_styles', 'lucky_deregister_styles');

function wpassist_remove_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
} 
add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css', 100 );

/*
 * The End ! Theme created by https://urldev.com
 */