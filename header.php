<?php
/**
 * The template for displaying header section
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 */
?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if(!class_exists('WPSEO_Options')) : ?>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <?php endif; ?>    
    <meta name="keywords" content="WpFresher, wpfresher.com, WP Fresher, Fresher, Biginners Guide, Freshers Guide, Website Development, WordPress, Development, WordPress Theme Development, WordPress Plugin Development, Website Design and Development, WordPress Website, Themes, Plugins">
<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<?php wp_body_open();?>
<?php $headerLayout = is_customize_preview() ? get_theme_mod('lucky_header_layout') : SITE_HEADER; ?>
<header id="header" class="header clearfix <?php if($headerLayout != 'default') : echo "header-style1"; endif; ?>">
    <div class="content-wrap flex-center">
        <div class="logo flex-center col-sm-8 <?php echo $headerLayout == 'default' ? 'col-3' : 'col-6'; ?>">
            <?php do_action('lucky_website_logo');?>
        </div>
        <?php if($headerLayout != 'default') : ?>
            <div class="header-top-right flex-center col-6 col-sm-4">
                <?php if ( IS_MOBILE ) : ?>
                    <div class="nav-toggle">
                        <i class="lucky-icon-bars mobile-menu-icon"></i></a>
                    </div>
                <?php
                        do_action('lucky_header_search');
                    else:
                        do_action('lucky_header_top_menu');
                    endif;
                ?>
            </div>
        <?php endif; ?>
        <?php if ( IS_MOBILE ) :
                do_action('lucky_mobile_menu');
            else : ?>
                <div class="header-menu flex-center <?php echo $headerLayout == 'default' ? 'col-9 col-sm-4' : 'header-style1-menu col-12'; ?>">
                    <?php do_action('lucky_primary_menu'); do_action('lucky_header_search'); ?>
                </div>
        <?php endif; ?>
    </div>
</header><!--/ End header -->
<?php if(!is_front_page() && get_theme_mod('lucky_display_breadcrumbs', 0) == 1){do_action('lucky_breadcrumbs');}; ?>