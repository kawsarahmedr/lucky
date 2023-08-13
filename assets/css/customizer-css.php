<?php
/**
 * This is the core User Customize css style sheet for lucky theme
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 */
add_action( 'wp_head', 'lucky_customizer_css' );

function lucky_customizer_css(){ ?>
<style type="text/css">
@font-face {
  font-family: 'lucky-icon';
  src: url('<?php echo THEME_URI ?>assets/fonts/lucky-icon.ttf') format('truetype'),
    url('<?php echo THEME_URI ?>assets/fonts/lucky-icon.svg') format('svg');
  font-weight: normal;
  font-style: normal;
  font-display: block;
}
/* Global CSS Variable & Custom Icons
-------------------------------------*/
:root {
  --lucky-color:<?php echo get_theme_mod('lucky_color', '#0073aa'); ?>; /* use: var(--lucky-color); */
  --lucky-text-color:<?php echo get_theme_mod('lucky_text_color', '#333333'); ?>;
  --lucky-link-color:<?php echo get_theme_mod('lucky_link_color', '#0073aa'); ?>;
  --lucky-link-hover-color:<?php echo get_theme_mod('lucky_link_hover_color', '#FDB913'); ?>;
  --lucky-site-title-color:<?php echo get_theme_mod('lucky_site_title_color', '#ffffff'); ?>;
  <?php if(SITE_HEADER == 'default'){ ?>
  --lucky-nav-text-color:<?php echo get_theme_mod('lucky_nav_text_color', '#ffffff'); ?>;
  --lucky-nav-bg-color:<?php echo get_theme_mod('lucky_nav_bg_color', '#0073aa'); ?>;
  <?php }else{ ?>
  --lucky-nav-text-color:<?php echo get_theme_mod('lucky_nav_text_color', '#333333'); ?>;
  --lucky-nav-bg-color:<?php echo get_theme_mod('lucky_nav_bg_color', '#ffffff'); ?>;
  <?php }; ?>
  --lucky-nav-text-hover-color:<?php echo get_theme_mod('lucky_nav_text_hover_color', '#FDB913'); ?>;
  <?php if(is_singular()){ ?>
  --lucky-article-bg-color:<?php echo get_theme_mod('lucky_singular_article_bgc', '#ffffff'); ?>;
  <?php }else{ ?>
  --lucky-article-bg-color:<?php echo get_theme_mod('lucky_blog_post_bgc', '#ffffff'); ?>;
  <?php }; ?>
}
.content-wrap, .header-style1 .header-style1-menu.col-12{
  max-width:<?php echo get_theme_mod('lucky_layout_width', '1280');?>px;
}
<?php $headerbgc = get_theme_mod('lucky_header_bg_color');
  if($headerbgc != ''){
    echo '.header{background:'.$headerbgc.'!important;}';
  };
?>
.lucky-main-content .lucky-post,
.lucky-singular, .comments-area, .lucky-prev-next-post, .lucky-related-posts{
  padding:<?php if(!is_front_page() && is_singular()){echo get_theme_mod('lucky_singular_article_padding', '25');}else{echo get_theme_mod('lucky_blog_post_padding', '15');};?>px;
}
.lucky-main-widget .lucky-widget{
  background-color:<?php echo get_theme_mod('lucky_sidebar_bgc', '#ffffff');?>;
  padding:<?php echo get_theme_mod('lucky_sidebar_padding', '15');?>px;
}
</style>
<?php
echo get_theme_mod('lucky_insert_head_codes', '');
}