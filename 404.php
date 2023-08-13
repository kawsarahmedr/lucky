<?php
/**
 * The template for displaying 404 Not Found message.
 *
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 */
get_header(); ?>
<main class="lucky-main content-wrap clearfix">
    <div class="lucky-main-content col-12">

        <div class="post-title">
			<h2 class="page-title font-weight-bold text-center"><br /><?php echo __( 'Oops! </br> That page can&rsquo;t be found.', 'lucky' ); ?></h2><br />
		</div>
		<div class="content">
			<p class="text-center font-italic"><?php echo __( 'It looks like nothing was found at this location. Maybe try a search!', 'lucky' ); ?></p>
			<div class="search">
				<div class="search-form-404">
					<form role="search" method="GET" id="searchform" class="form searchform" action="<?php esc_url(bloginfo('home')); ?>">
					    <input type="search" name="s" id="s" placeholder="Search here..." value="<?php the_search_query(); ?>"/>
						<button type="submit" value="send"><i class="lucky-icon-search"></i></button>
					</form><br /><br /><br />
				</div>
			</div>
		</div>
		<div class="post-title">
			<h2 class="page-title font-weight-bold text-center">
				<?php
                    echo __( 'Go back to <a href="'.esc_url( HOME_URL ).'" style="color:var(--lucky-color);">Home!</a> or wait "'.get_theme_mod("lucky_special_page_redirect_time", "8000") .'" Milliseconds', 'lucky' );
                ?>
			</h2>
		</div>
    </div><!-- .lucky-main-content -->
</main>
<?php get_footer(); ?>

<?php
	/* Special/404 Error Page Redirect condition */
	if (get_theme_mod('lucky_special_page_redirect', 0) == 1) : ?>
	<script>
		setTimeout(function () {    
			window.location.href = document.location.origin; 
		}, <?php echo get_theme_mod('lucky_special_page_redirect_time', '8000'); ?> );
	</script>
<?php endif; ?>