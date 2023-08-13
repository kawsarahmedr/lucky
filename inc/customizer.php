<?php
/**
 * This functional template is for Customizer API
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 **/
function lucky_customization($customize){

	/*** General Settings Panel ***/
	$customize->add_panel('lucky_general',array(
		'title'=> __('General Settings', 'lucky'),
		'description'=> __('Customize general settings', 'lucky'),
		'priority'=> 1
	));
		/* General Panel Section for lycky layout width */
		$customize->add_section('lucky_genaral_section_layout', array(
			'title' => __('Layout', 'lucky'),
			'priority' => 1,
			'panel'=>'lucky_general'
		));
			/* lucky layout width with range value *
			$customize->add_setting('lucky_layout_width', array(
				'default' => __(1280, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_layout_width', array(
				'type' => 'range',
				'section' => 'lucky_genaral_section_layout',
				'label' => __( 'Layout' ),
				'description' => __( 'Min: 768px Max: 1920px', 'lucky'),
				'input_attrs' => array(
				'min' => 768,
				'max' => 1920,
				'step' => 1,
        		'style' => 'color: #0073aa'
				),
			) );  */

			/* lucky layout width with input value */
			$customize->add_setting('lucky_layout_width', array(
				'default' => __(1280, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_layout_width', array(
				'section' => 'lucky_genaral_section_layout',
				'label' => __('Enter Layout Width:', 'lucky'),
				'description' => __( 'Min: 768px Max: 1920px', 'lucky'),
				'type' => 'number',
				'input_attrs' => array(
					'min'   => 768,
					'max'   => 1920,)
			));
		/* Header Panel Section for lycky theme color */
		$customize->add_section('colors', array(
			'title' => __('Primary Colors', 'lucky'),
			'priority' => 2,
			'panel'=>'lucky_general'
		));
			/* lucky primary theme color */
			$customize->add_setting('lucky_color', array(
				'default' => __('#0073aa', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_color', array(
				'label'      => __( 'Primary Theme Color:', 'lucky' ),
				'section'    => 'colors',
				'settings'   => 'lucky_color',
				'priority' => 1
			)));
			/* lucky primary text color */
			$customize->add_setting('lucky_text_color', array(
				'default' => __('#333333', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_text_color', array(
				'label'      => __( 'Primary Text Color:', 'lucky' ),
				'section'    => 'colors',
				'settings'   => 'lucky_text_color',
				'priority' => 2
			)));
			/* lucky primary link color */
			$customize->add_setting('lucky_link_color', array(
				'default' => __('#0073aa', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_link_color', array(
				'label'      => __( 'Primary Link Color:', 'lucky' ),
				'section'    => 'colors',
				'settings'   => 'lucky_link_color',
				'priority' => 3
			)));
			/* lucky primary link hover color */
			$customize->add_setting('lucky_link_hover_color', array(
				'default' => __('#FDB913', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_link_hover_color', array(
				'label'      => __( 'Primary Link Hover Color:', 'lucky' ),
				'section'    => 'colors',
				'settings'   => 'lucky_link_hover_color',
				'priority' => 4
			)));
			/* lucky primary link hover color */
			$customize->add_setting('background_color', array(
				'default' => __('#F5F5F5', 'lucky'),
				'transport' => 'postMessage'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'background_color', array(
				'label'      => __( 'Primary Background Color:', 'lucky' ),
				'section'    => 'colors',
				'settings'   => 'background_color',
				'priority' => 5
			)));

	/*** Header Options Panel ***/
	$customize->add_panel('lucky_header',array(
		'title'=> __('Header', 'lucky'),
		'description'=> __('Customize Header Settings', 'lucky'),
		'priority'=> 2
	));
		/* Header Panel Section for Site Identity */
		$customize->add_section('title_tagline', array(
			'title' => __('Sit Identity', 'lucky'),
			'priority' => 1,
			'panel'=>'lucky_header'
		));
			/* lucky site title color */
			$customize->add_setting('lucky_site_title_color', array(
				'default' => __('#ffffff', 'lucky'),
				'transport' => 'postMessage'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_site_title_color', array(
				'label'      => __( 'Site Title Color:', 'lucky'),
				'section'    => 'title_tagline',
				'settings'   => 'lucky_site_title_color',
				'priority' => 10
			)));

		/* Header Panel Section for lycky header layout design */
		$customize->add_section('lucky_header_layout_section', array(
			'title' => __('Header Layout', 'lucky'),
			'priority' => 2,
			'panel'=>'lucky_header'
		));
			/* lucky header layout design */
			$customize->add_setting('lucky_header_layout', array(
				'default' => __('default', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_header_layout', array(
				'section' => 'lucky_header_layout_section',
				'label' => __('Header Layout Design:', 'lucky'),
				'description' => __( 'Select header layout design', 'lucky'),
				'type' => 'select',
				'choices' => array(
					'default' => 'Default',
					'modern' => 'Modern'
				)
			));
		/* Header Panel Section for lycky header color */
		$customize->add_section('lucky_header_color', array(
			'title' => __('Header Color', 'lucky'),
			'priority' => 3,
			'panel'=>'lucky_header'
		));
			// lucky header background Color
			$customize->add_setting('lucky_header_bg_color', array(
				'default' => __('#0073aa', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_header_bg_color', array(
				'label'      => __('Header Background Color:', 'lucky'),
				'section'    => 'lucky_header_color',
				'settings'   => 'lucky_header_bg_color',
				'priority' => 1
			)));
			// lucky nav text color
			if(SITE_HEADER == 'default') {$navBgc = '#ffffff';}else{$navBgc = '#333333';};
			$customize->add_setting('lucky_nav_text_color', array(
				'default' => __($navBgc, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_nav_text_color', array(
				'label'      => __('Nav Item Color:', 'lucky'),
				'section'    => 'lucky_header_color',
				'settings'   => 'lucky_nav_text_color',
				'priority' => 2
			)));
			// lucky nav text hover color
			$customize->add_setting('lucky_nav_text_hover_color', array(
				'default' => __('#FDB913', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_nav_text_hover_color', array(
				'label'      => __('Nav Item Hover Color:', 'lucky'),
				'section'    => 'lucky_header_color',
				'settings'   => 'lucky_nav_text_hover_color',
				'priority' => 3
			)));
			// lucky nav bg color
			if(SITE_HEADER == 'default') {$navBgc = '#0073aa';}else{$navBgc = '#ffffff';};
			$customize->add_setting('lucky_nav_bg_color', array(
				'default' => __( $navBgc, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_nav_bg_color', array(
				'label'      => __('Nav Background Color:', 'lucky'),
				'section'    => 'lucky_header_color',
				'settings'   => 'lucky_nav_bg_color',
				'priority' => 4
			)));

	/* lucky Breadcrumbs Section */
	$customize->add_section('lucky_breadcrumbs', array(
		'title' => __('Breadcrumbs', 'lucky'),
		'priority' => 3,
	));
		/* Display Breadcrumbs */
		$customize->add_setting('lucky_display_breadcrumbs', array(
			'default' => __(0, 'lucky'),
			'transport' => 'refresh'
		));
		$customize->add_control('lucky_display_breadcrumbs', array(
			'section' => 'lucky_breadcrumbs',
			'label' => __('Display Breadcrumbs', 'lucky'),
			'description' => __('Checked it, If you want to enable Breadcrumbs', 'lucky'),
			'type' => 'checkbox',
			'priority' => 1
		));
		/* lucky Breadcrumbs design */
		$customize->add_setting('lucky_slect_breadcrumbs', array(
			'default' => __('default', 'lucky'),
			'transport' => 'refresh'
		));
		$customize->add_control('lucky_slect_breadcrumbs', array(
			'section' => 'lucky_breadcrumbs',
			'label' => __('Select Breadcrumbs:', 'lucky'),
			'description' => __('*Note: If you want to use "Yoast SEO" breadcrumbs, Then you must have to Enable Yoast SEO plugin\'s breadcrumbs features. <a href="https://wpfairs.com/how-to-enable-yoast-seo-plugin-breadcrumbs/">How To Enable Yoast SEO Breadcrumbs</a>', 'lucky'),
			'type' => 'select',
			'choices' => array('default' => 'Default Breadcrumbs', 'yoast' => 'Yoast SEO Breadcrumbs'),
			'priority' => 2
		));
		/* lucky Breadcrumbs divider */
		$customize->add_setting('lucky_breadcrumbs_divider', array(
			'default' => __(' &raquo; ', 'lucky'),
			'transport' => 'refresh'
		));
		$customize->add_control('lucky_breadcrumbs_divider', array(
			'section' => 'lucky_breadcrumbs',
			'label' => __('Breadcrumbs Divider:', 'lucky'),
			'description' => __('Enter breadcrumbs devider. Supported HTML Entities.', 'lucky'),
			'type' => 'text',
			'priority' => 3
		));

	/*** Blog Options Panel ***/
	$customize->add_panel('lucky_blog',array(
		'title'=> __('Blog', 'lucky'),
		'description'=> __('Customize Blog Settings', 'lucky'),
		'priority'=> 4
	));
		/* Blog Section */
		$customize->add_section('lucky_blog_page', array(
			'title' => __('Blog/Archive/Search Page', 'lucky'),
			'priority' => 1,
			'panel'=>'lucky_blog'
		));
			/* lucky blog layout */
			$customize->add_setting('lucky_blog_page_layout', array(
				'default' => __('default', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_blog_page_layout', array(
				'section' => 'lucky_blog_page',
				'label' => __('Blog/Archive/Search Page Layout:', 'lucky'),
				'description' => __('Select a layout design.', 'lucky'),
				'type' => 'select',
				'choices' => array('default' => 'Default/Right Sidebar', 'fullwidth' => 'Full Width', 'leftsidebar' => 'Left Sidebar', 'bothsidebar' => 'Left/Right Both Sidebar'),
				'priority' => 1
			));
			/* lucky blog posts padding */
			$customize->add_setting('lucky_blog_post_padding', array(
				'default' => __(15, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_blog_post_padding', array(
				'section' => 'lucky_blog_page',
				'label' => __('Blog/Archive/Search Article Padding:', 'lucky'),
				'description' => __('Set article padding in (<b>PX</b>)', 'lucky'),
				'type' => 'number',
				'priority' => 2
			));
			/* lucky Blog Page Article Background Color */
			$customize->add_setting('lucky_blog_post_bgc', array(
				'default' => __('#ffffff', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_blog_post_bgc', array(
				'label'      => __('Blog/Archive/Search Article Background Color:', 'lucky'),
				'section'    => 'lucky_blog_page',
				'settings'   => 'lucky_blog_post_bgc',
				'priority' => 3
			)));
		
		/* Singular Page/Article Section */
		$customize->add_section('lucky_singular_page', array(
			'title' => __('Singular Page/Article', 'lucky'),
			'priority' => 2,
			'panel'=>'lucky_blog'
		));
			/* lucky Singular Page Layout */
			$customize->add_setting('lucky_singular_page_layout', array(
				'default' => __('default', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_singular_page_layout', array(
				'section' => 'lucky_singular_page',
				'label' => __('Singular Page/Article Layout:', 'lucky'),
				'description' => __('Select a layout design for singular page/article.', 'lucky'),
				'type' => 'select',
				'choices' => array('default' => 'Default/Right Sidebar', 'fullwidth' => 'Full Width', 'leftsidebar' => 'Left Sidebar', 'bothsidebar' => 'Left/Right Both Sidebar'),
				'priority' => 1
			));
			/* lucky Singular Page/Article Padding */
			$customize->add_setting('lucky_singular_article_padding', array(
				'default' => __(25, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_singular_article_padding', array(
				'section' => 'lucky_singular_page',
				'label' => __('Singular Page/Article Padding:', 'lucky'),
				'description' => __('Set singular page article padding in (<b>PX</b>)', 'lucky'),
				'type' => 'number',
				'priority' => 2
			));
			/* lucky Singular Page/Article Background Color */
			$customize->add_setting('lucky_singular_article_bgc', array(
				'default' => __('#ffffff', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_singular_article_bgc', array(
				'label'      => __('Singular Page/Article Background Color:', 'lucky'),
				'section'    => 'lucky_singular_page',
				'settings'   => 'lucky_singular_article_bgc',
				'priority' => 3
			)));

	/* Sidebar Options */
	$customize->add_section('lucky_sidebar', array(
		'title' => __('Sidebar', 'lucky'),
		'priority' => 5
	));
		/* lucky Sidebar Padding */
		$customize->add_setting('lucky_sidebar_padding', array(
			'default' => __(15, 'lucky'),
			'transport' => 'refresh'
		));
		$customize->add_control('lucky_sidebar_padding', array(
			'section' => 'lucky_sidebar',
			'label' => __('Sidebar Padding:', 'lucky'),
			'description' => __('Set sidebar padding in (<b>PX</b>)', 'lucky'),
			'type' => 'number',
			'priority' => 1
		));
		/* lucky sidebar Background Color */
		$customize->add_setting('lucky_sidebar_bgc', array(
			'default' => __('#ffffff', 'lucky'),
			'transport' => 'refresh'
		));
		$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_sidebar_bgc', array(
			'label'      => __('Sidebar Background Color:', 'lucky'),
			'section'    => 'lucky_sidebar',
			'settings'   => 'lucky_sidebar_bgc',
			'priority' => 2
		)));

	/*** Footer Options Panel ***/
	$customize->add_panel('lucky_footer',array(
		'title'=> __('Footer', 'lucky'),
		'description'=> __('Customize Footer Settings', 'lucky'),
		'priority'=> 6
	));
		$customize->add_section('lucky_copyright_text_section', array(
			'title' => __('Footer Copyright Text', 'lucky'),
			'priority' => 1,
			'panel'=>'lucky_footer'
		));
			$customize->add_setting('lucky_copyright_text', array(
				'default' => __('© 2021 All Rights Reserved By lucky WordPress Theme.', 'lucky'),
				'transport' => 'postMessage'
			));
			$customize->add_control('lucky_copyright_text', array(
				'section' => 'lucky_copyright_text_section',
				'label' => __('Enter Footer Copyright Text:', 'lucky'),
				'type' => 'text'
			));
		$customize->add_section('lucky_footer_widgets', array(
			'title' => __('Footer Widgets', 'lucky'),
			'priority' => 2,
			'panel'=>'lucky_footer'
		));
			/* Display Footer Top Widgets */
			$customize->add_setting('lucky_footer_top_widget', array(
				'default' => __(0, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_footer_top_widget', array(
				'section' => 'lucky_footer_widgets',
				'label' => __('Display Footer Top Widget', 'lucky'),
				'description' => __('Checked it, If you want to enable footer top widget', 'lucky'),
				'type' => 'checkbox',
				'priority' => 1
			));
			/* Display Footer Widgets */
			$customize->add_setting('lucky_footer_widget', array(
				'default' => __(1, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_footer_widget', array(
				'section' => 'lucky_footer_widgets',
				'label' => __('Display Footer Widget', 'lucky'),
				'description' => __('Checked it, If you want to enable footer widget', 'lucky'),
				'type' => 'checkbox',
				'priority' => 2
			));
			/* lucky Footer Widget Background Color */
			$customize->add_setting('lucky_widget_bg_color', array(
				'default' => __('#0073aa', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control( new WP_Customize_Color_Control( $customize, 'lucky_widget_bg_color', array(
				'label'      => __( 'Widget Background Color:', 'lucky' ),
				'section'    => 'lucky_footer_widgets',
				'settings'   => 'lucky_widget_bg_color',
				'priority' => 3
			)));

	/*** Ads (Google AdSense or Other Ads Code) Options Panel ***/
	$customize->add_panel('lucky_ads',array(
		'title'=> __('Ads', 'lucky'),
		'description'=> __('Customize Ads Settings', 'lucky'),
		'priority'=> 7
	));
		$customize->add_section('lucky_ads_section', array(
			'title' => __('After n^th Pragrap Ads For Single Article', 'lucky'),
			'priority' => 1,
			'panel'=>'lucky_ads'
		));
			/* Show ads inside article or not */
			$customize->add_setting('lucky_ads_yes_no', array(
				'default' => __(0, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_ads_yes_no', array(
				'section' => 'lucky_ads_section',
				'label' => __('Display ads inside articles?', 'lucky'),
				'description'=> __('Checked this option if you want to display ads inside articles.', 'lucky'),
				'type' => 'checkbox',
				'priority' => 1
			));
			/* Number of Pragram to show ads inside article */
			$customize->add_setting('lucky_ads_p_counts', array(
				'default' => __(5, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_ads_p_counts', array(
				'section' => 'lucky_ads_section',
				'label' => __('After how many paragraphs Ad will show:', 'lucky'),
				'description'=> __('Input After how many paragraphs Ad will show.<br>(Recommended: "At least 5 Paragraph")', 'lucky'),
				'type' => 'number',
				'priority' => 2
			));
			/* Ads Code */
			$customize->add_setting('lucky_ads_code', array(
				'default' => __('Input Your Google Adsense Ads Code or Others Ads Code with Script Tag', 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_ads_code', array(
				'section' => 'lucky_ads_section',
				'label' => __('Enter your Ads Code:', 'lucky'),
				'description'=> __('Input Your Google Adsense Ads Code or Others Ads Code with Script Tag. <br> (Recommended: "In Article Ad")', 'lucky'),
				'type' => 'textarea',
				'priority' => 3
			));

	/*** Insert Codes Options Panel ***/
	$customize->add_panel('lucky_insert_codes',array(
		'title'=> __('Insert Codes', 'lucky'),
		'description'=> __('Insert HTML Meta Tags or Codes', 'lucky'),
		'priority'=> 8
	));
		/* Insert codes before closing the head tag customizer options */
		$customize->add_section('lucky_insert_head_section', array(
			'title' => __('Insert Codes Before Closing The "head" Tag', 'lucky'),
			'priority' => 1,
			'panel'=>'lucky_insert_codes'
		));
			/* Insert HTML Meta Tag & Custom Script Inside The Head */
			$customize->add_setting('lucky_insert_head_codes', array(
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_insert_head_codes', array(
				'section' => 'lucky_insert_head_section',
				'label' => __('Insert Codes Before The Closing "head" Tag', 'lucky'),
				'description'=> __('Input HTML meta tag, Google Analytics, Search Console, Bing Verification And so one are supported. Use script tag to insert scripts code. Don\'t use wrong tag or scripts, It should break your website.', 'lucky'),
				'type' => 'textarea',
				'priority' => 1
			));
		/* Insert codes just after opening the body tag customizer options */
		$customize->add_section('lucky_insert_body_section', array(
			'title' => __('Insert Codes Just After The Opening "body" Tag', 'lucky'),
			'priority' => 2,
			'panel'=>'lucky_insert_codes'
		));
			/* Insert HTML Meta Tag & Custom Script Just Afer Opening The Body Tag */
			$customize->add_setting('lucky_insert_body_codes', array(
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_insert_body_codes', array(
				'section' => 'lucky_insert_body_section',
				'label' => __('Insert Codes Just After The Opening "body" Tag', 'lucky'),
				'description'=> __('Input HTML meta tag, Google Analytics, Search Console, Bing Verification And so one are supported. Use script tag to insert scripts code. Don\'t use wrong tag or scripts, It should break your website.', 'lucky'),
				'type' => 'textarea',
				'priority' => 1
			));
		/* Insert codes inside the footer customizer options */
		$customize->add_section('lucky_insert_footer_section', array(
			'title' => __('Insert Codes Inside The Footer.', 'lucky'),
			'priority' => 3,
			'panel'=>'lucky_insert_codes'
		));
			/* Insert HTML Meta Tag & Custom Script Just Afer Opening The Body Tag */
			$customize->add_setting('lucky_insert_footer_codes', array(
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_insert_footer_codes', array(
				'section' => 'lucky_insert_footer_section',
				'label' => __('Insert Codes Inside The Footer.', 'lucky'),
				'description'=> __('Input HTML meta tag, Google Analytics, Search Console, Bing Verification And so one are supported. Use script tag to insert scripts code. Don\'t use wrong tag or scripts, It should break your website.', 'lucky'),
				'type' => 'textarea',
				'priority' => 1
			));
	
	/*** Special Page/404 Error Page Settings ***/
	$customize->add_panel('lucky_special_page',array(
		'title'=> __('Special/404 Error Page ', 'lucky'),
		'description'=> __('Customize Special/404 Error Page', 'lucky'),
		'priority'=> 8
	));
		$customize->add_section('lucky_special_page_section', array(
			'title' => __('Customize Special/404 Error Page', 'lucky'),
			'priority' => 1,
			'panel'=>'lucky_special_page'
		));
			/* Active/Deactive Redirect Option */
			$customize->add_setting('lucky_special_page_redirect', array(
				'default' => __(0, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_special_page_redirect', array(
				'section' => 'lucky_special_page_section',
				'label' => __('Special/404 Page Redirect to Frontpage', 'lucky'),
				'description' => __('Checked it, If you want to enable special/404 page Rredirect to Frontpage', 'lucky'),
				'type' => 'checkbox',
				'priority' => 1
			));
			/* Set Redirect time in Milliseconds */
			$customize->add_setting('lucky_special_page_redirect_time', array(
				'default' => __(8000, 'lucky'),
				'transport' => 'refresh'
			));
			$customize->add_control('lucky_special_page_redirect_time', array(
				'section' => 'lucky_special_page_section',
				'label' => __('Input Special Page Redirect Time:', 'lucky'),
				'description'=> __('Input Special Page Redirect Time in Milliseconds. Example: 1000 = 1 Second', 'lucky'),
				'type' => 'number',
				'input_attrs' => array(
					'min'   => 0
				),
				'priority' => 2
			));
}
add_action('customize_register', 'lucky_customization');

/* Customizer API Scripts */
function lucky_customize_js(){
	wp_enqueue_script('lucky-customizer', THEME_URI  .'/assets/js/lucky-customizer.js', array('jquery', 'customize-preview'), '1.0.0', true );
} add_action('customize_preview_init', 'lucky_customize_js');

/*
 * The End ! Theme created by https://urldev.com
 */