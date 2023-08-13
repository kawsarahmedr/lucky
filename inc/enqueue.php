<?php
/**
 * The core functional template for enqueue all the lucky theme CSS and JS files.
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 */
function lucky_enqueue_css_and_js_files(){
	/* Enqueueing main style.css file */
	wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.0');
    /* enqueueing js files */
	wp_enqueue_script('jquery'); /* default wordpress jQuery */

	if ( wp_is_mobile() ) :
		wp_enqueue_script('mmenujs', THEME_URI .'assets/js/mmenu-light.js', array('jquery'), '1.0.0', true);
		wp_enqueue_script('lucky-mobilejs', THEME_URI .'assets/js/lucky-mobile.js', array('jquery', 'mmenujs'), '1.0.0', true);
		wp_localize_script( 'lucky-mobilejs', 'script_vars', array('site_name' => SITE_NAME ));
	endif;

	wp_enqueue_script('lucky', THEME_URI .'assets/js/lucky.js', array('jquery'), '1.0.0', true);
	wp_localize_script( 'lucky', 'lucky_script_vars', array('IS_MOBILE' => IS_MOBILE, 'SITE_HEADER' => SITE_HEADER ));
}
add_action('wp_enqueue_scripts', 'lucky_enqueue_css_and_js_files');
/*
 * The End ! Theme created by https://urldev.com
 */