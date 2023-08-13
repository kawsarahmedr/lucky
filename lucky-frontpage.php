<?php
/**
 * Template Name: Lucky Front Page
 * This is the main core html template for lucky theme.
 *
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 */
get_header(); ?>
<main class="lucky-main content-wrap clearfix">
    <div class="lucky-frontpage-hero-area col-12 clearfix">
        <?php
            $rPostQuery = new WP_Query( 
                array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'orderby' => 'rand',
                    'posts_per_page' => 4
                ) 
            );
            $pCount = 1;
        ?>
        <?php if ( $rPostQuery->have_posts() ) : ?>
            <?php while ( $rPostQuery->have_posts() ) : $rPostQuery->the_post(); ?>
                <?php if($pCount <= 3 ) : ?>
                    <?php if($pCount == 1) : ?><div class="lucky-editors-pick col-5 col-sm-12"><h3>EDITORS PICK</h3><?php endif; ?>
                        <div class="editors-pick-single clearfix">
                            <div class="col-2">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </div>
                            <div class="col-10">
                                <?php the_title( '<h4 class="entry-title"><a href="'. esc_url( get_permalink() ) .'">', '</a></h4>'); ?>
                                <div class="entry-meta">
                                    <span class="entry-meta-span"><i class="lucky-icon-calendar" aria-hidden="true"></i> <?php the_modified_time('d F Y'); //the_time('d F Y');?></span> | <span><?php the_category(', '); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php if($pCount == 3) : ?></div><?php endif; ?>
                <?php else : ?>
                    <div class="lucky-random-post col-7 col-sm-12" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                        <div class="entry-content">
                            <?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'">', '</a></h1>'); ?>
                            <div class="entry-meta">
                                <span class="entry-meta-span"><i class="lucky-icon-calendar" aria-hidden="true"></i> <?php the_modified_time('d F Y'); //the_time('d F Y');?></span> | <span><?php the_category(', '); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $pCount += 1; ?>
            <?php endwhile; ?>
            <!-- end of the loop -->
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </div>
    <?php $pagelayout = get_theme_mod('lucky_blog_page_layout', 'default'); ?>
    <?php if( $pagelayout == 'leftsidebar' || $pagelayout == 'bothsidebar') : ?>
        <div class="lucky-main-widget col-sm-12  <?php if($pagelayout == 'bothsidebar'){echo 'col-3';}else{echo 'col-4';}; ?>"><?php dynamic_sidebar('lucky-leftsidebar'); ?></div>
    <?php endif; ?>
    <div class="lucky-main-content col-sm-12 <?php if($pagelayout == 'bothsidebar'){echo 'col-6';} elseif($pagelayout == 'fullwidth'){echo 'col-12';} else{echo 'col-8';}; ?>">
        <?php $pQuery = new WP_Query( array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'orderby' => 'modified',
                'order' => 'DESC',
                'posts_per_page' => get_option( 'posts_per_page' )
            ));
        if ( $pQuery->have_posts() ) :
            while ( $pQuery->have_posts() ) : $pQuery->the_post();
                /* Include the Post-Format-specific template for the content. */
                get_template_part( 'template-parts/post/content', get_post_format() );
            endwhile;
            /* lucky pagination box */
            wp_reset_postdata();
        else :
            get_template_part( 'template-parts/post/content', 'none' );
        endif; ?>
        <div class="view-all-articles col-12">
            <a href="https://wpfresher.com/blog/">View All Articles</a>
        </div>
    </div><!-- .lucky-main-content -->
    <?php if ($pagelayout == 'default' || $pagelayout == 'bothsidebar') : ?>
        <div class="lucky-main-widget col-sm-12 <?php if($pagelayout == 'bothsidebar'){echo 'col-3';}else{echo 'col-4';}; ?>"><?php get_sidebar(); ?></div>
    <?php endif; ?>

    <div class="lucky-frontpage-category col-12 clearfix">
        <h3 class="lucky-frontpage-category-title"><span>FEATURED CATEGORIES</span></h3>
        <a href="https://wpfresher.com/category/tutorials/">
            <div class="featured-category col-3 col-sm-6">
                <img src="https://wpfresher.com/wp-content/uploads/2022/03/WP-Tutorials-WpFresher-icon.png" alt="WordPress Tutorials">
                <h4>WP Tutorials</h4>
            </div>
        </a>
        <a href="https://wpfresher.com/category/freshers-guide/">
            <div class="featured-category col-3 col-sm-6">
                <img src="https://wpfresher.com/wp-content/uploads/2022/03/Freshers-Guide-WpFresher-icon.png" alt="Freshers Guide">
                <h4>Freshers Guide</h4>
            </div>
        </a>
        <a href="https://wpfresher.com/category/knowledgebase/">
            <div class="featured-category col-3 col-sm-6">
                <img src="https://wpfresher.com/wp-content/uploads/2022/03/Knowledgebase-WpFresher-icon.png" alt="Knowledgebase">
                <h4>Knowledgebase</h4>
            </div>
        </a>
        <a href="https://wpfresher.com/category/how-to/">
            <div class="featured-category col-3 col-sm-6">
                <img src="https://wpfresher.com/wp-content/uploads/2022/03/How-To-WpFresher-icon.png" alt="How To">
                <h4>How To</h4>
            </div>
        </a>
    </div>
</main>
<?php get_footer(); ?>