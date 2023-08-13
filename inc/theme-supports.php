<?php
/**
 * The main core theme support functional template
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 */
function lucky_setup_fn(){
	/* Loading lucky (Text Domain: lucky) */
	load_theme_textdomain('lucky', get_template_directory().'/languages');
	/*  Add default posts and comments RSS feed links to head. */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
    // Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
    );
	/* Switch default core markup for search form, comment form, and comments to output valid HTML5. */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'search-form',
		'gallery',
        'caption',
        'script',
		'style',
	) );
	/* Enable support for Post Formats. */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
	/* Add theme support for Custom Logo. */
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 50,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' )
    ) );
    // Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    /* Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 *
	if ( is_customize_preview() ) {
		require get_template_directory() . '/inc/starter-content.php';
		add_theme_support( 'starter-content', twentytwenty_get_starter_content() );
    } */

	/* Add theme support for selective refresh for widgets. */
    add_theme_support( 'customize-selective-refresh-widgets' );
	
	/* Remove theme support for selective refresh for widgets. */
	// remove_theme_support( 'widgets-block-editor' );

    /* Menu Register */
	if(function_exists('register_nav_menus')){
		register_nav_menus(array(
			'primarymenu' => __('Primary Menu', 'lucky'),
			'headertopmenu' => __('Header Style1 Top Menu', 'lucky'),
			'mobilemenu' => __('Mobile Menu', 'lucky'),
			'footermenu' => __('Footer Menu', 'lucky'),
		));
	}
} add_action('after_setup_theme', 'lucky_setup_fn');


/* lucky all widgets sidebar registration */
function lucky_widgets() {
	/* Register Right Sidebar */
	register_sidebar( array(
			'name' => esc_html__('Right Sidebar', 'lucky'),
			'id' => 'lucky-rightsidebar',
			'description' => __('Add or Remove right sidebar widgets.', 'lucky'),
			'before_widget' => '<section id="%1$s" class="lucky-widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h5 class="lucky-widget-title">',
			'after_title' => '</h5>'
		)
	);
	/* Register Left Sidebar */
	register_sidebar( array(
			'name' => esc_html__('Left Sidebar', 'lucky'),
			'id' => 'lucky-leftsidebar',
			'description' => __('Add or Remove Left sidebar widgets.', 'lucky'),
			'before_widget' => '<section id="%1$s" class="lucky-widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h5 class="lucky-widget-title">',
			'after_title' => '</h5>'
		)
	);
	/* Register Footer Sidebar */
	register_sidebar( array(
			'name' => esc_html__('lucky Footer Top Sidebar', 'lucky'),
			'id' => 'lucky-footersidebar',
			'description' => __('Add or Remove footer top sidebar from here.', 'lucky'),
			'before_widget' => '<div class="col-3 col-sm-6 col-xs-12"><section id="%1$s" class="lucky-widget %2$s">',
			'after_widget' => '</section></div>',
			'before_title' => '<h5 class="lucky-widget-title">',
			'after_title' => '</h5>'
		)
	);
	/* Register Footer Widget */
	register_sidebar( array(
			'name' => esc_html__('lucky Footer widget', 'lucky'),
			'id' => 'lucky-footerwidget',
			'description' => __('Add or Remove footer widget from here.', 'lucky'),
			'before_widget' => '<div class="col-4 col-sm-12"><section id="%1$s" class="lucky-widget %2$s">',
			'after_widget' => '</section></div>',
			'before_title' => '<h4 class="lucky-widget-title">',
			'after_title' => '</h4>'
		)
	);
} add_action('widgets_init','lucky_widgets');
/*
 * The End ! Theme created by https://urldev.com
 */