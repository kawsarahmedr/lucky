<?php
/**
 * The template for displaying archive
 *
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 */
get_header(); ?>
<main class="lucky-main content-wrap clearfix">
    <?php $pagelayout = get_theme_mod('lucky_blog_page_layout', 'default'); ?>
    <?php if( $pagelayout == 'leftsidebar' || $pagelayout == 'bothsidebar') : ?>
        <div class="lucky-main-widget col-sm-12 <?php if($pagelayout == 'bothsidebar'){echo 'col-3';}else{echo 'col-4';}; ?>"><?php dynamic_sidebar('lucky-leftsidebar'); ?></div>
    <?php endif; ?>
    <div class="lucky-main-content col-sm-12 <?php if($pagelayout == 'bothsidebar'){echo 'col-6';} elseif($pagelayout == 'fullwidth'){echo 'col-12';} else{echo 'col-8';}; ?>">
        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                /* Include the Post-Format-specific template for the content. */
                get_template_part( 'template-parts/post/content', get_post_format() );
            endwhile;
            /* lucky pagination box */
            get_template_part('template-parts/pagination/content','pagination');
            /* lucky reseting all wp query */
            wp_reset_postdata();       
        else :
            get_template_part( 'template-parts/post/content', 'none' );
        endif; ?>
    </div><!-- .lucky-main-content -->
    <?php if ($pagelayout == 'default' || $pagelayout == 'bothsidebar') : ?>
        <div class="lucky-main-widget col-sm-12 <?php if($pagelayout == 'bothsidebar'){echo 'col-3';}else{echo 'col-4';}; ?>"><?php get_sidebar(); ?></div>
    <?php endif; ?>
</main>
<?php get_footer(); ?>