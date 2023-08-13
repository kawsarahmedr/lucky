<?php
/**
 * The template for displaying Footer Content
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 **/
?>
<footer id="footer" class="footer clearfix">
    <div class="content-wrap">
        <?php if(is_active_sidebar('lucky-footersidebar') && get_theme_mod('lucky_footer_top_widget', 0) == 1 ) : ?>
            <div class="footer-top-widget clearfix">
                <?php dynamic_sidebar('lucky-footersidebar'); ?>
            </div>
        <?php endif; ?>
        <?php if( is_active_sidebar('lucky-footerwidget') && get_theme_mod('lucky_footer_widget', 1) == 1 ) : ?>
            <div class="footer-widget clearfix">
                <?php dynamic_sidebar('lucky-footerwidget'); ?>
            </div>
        <?php endif; ?>
        <div class="footer-bottom clearfix">
            <div class="footer-bottom-copyright col-6 col-sm-12">
                <span class="copyright-text"><?php echo get_theme_mod('lucky_copyright_text') ? : do_action('lucky_copyright_text') ; ?></span>
            </div>
            <div class="footer-bottom-menu col-6 col-sm-12">
                <?php
                    if(function_exists('wp_nav_menu')){
                        wp_nav_menu(array(
                            'theme_location' => 'footermenu',
                            'container_class' => 'footer-menu menu'
                        ));
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Go to top Button -->
    <button  id="gototop" title="Go to top"><i class="lucky-icon-arrow-up-bold"></i></button>
</footer><!-- .footer -->
<?php wp_footer(); ?>
</body>
</html>