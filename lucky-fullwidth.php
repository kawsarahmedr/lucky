<?php
/**
 * Template Name: Lucky Full Width Template
 * This is the main core html full width template for lucky theme.
 *
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 */
get_header(); ?>
<main class="lucky-main content-wrap clearfix">

    <div class="lucky-main-content col-12">
        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                /* Include the Post-Format-specific template for the content. */
                get_template_part( 'template-parts/singular/content', get_post_type() );
                if(is_single()){
                    do_action('lucky_next_prev_Post');
                    do_action('lucky_related_posts');
                };
                /* If comments are open or have at least one comment, then load up the comment template. */
				if (comments_open() || get_comments_number() && ! post_password_required()) :
					comments_template();
				endif;
            endwhile;
        else :
            get_template_part('template-parts/post/content', 'none');
        endif; ?>
    </div><!-- .lucky-main-content -->
</main>
<?php get_footer(); ?>