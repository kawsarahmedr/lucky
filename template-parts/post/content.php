<?php
/**
 * The main core template for displaying post content
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 **/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'lucky-post' ); ?>>
	<header class="entry-header">
		<div class="featured-img">
			<?php if ( has_post_thumbnail() ) : ?>
				<a class="featured-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?> </a>

			<?php elseif ( lucky_get_attachment() && ! is_single() ) : ?>
				<a class="featured-link" href="<?php the_permalink(); ?>"><?php echo lucky_get_attachment($post->ID); ?></a>
			<?php endif; ?>
		</div>
	</header>
	<div class="entry-content">
		<?php the_title( '<h2 class="entry-title"><a href="'. esc_url( get_permalink() ) .'">', '</a></h2>'); ?>
		<div class="entry-meta">
			<span class="entry-meta-span"><i class="lucky-icon-calendar" aria-hidden="true"></i> <?php the_modified_time('d F Y'); //the_time('d F Y');?></span>
			<span class="entry-meta-span"><i class="lucky-icon-bubble" aria-hidden="true"></i> <?php comments_popup_link('No Comment','1 Comment','% Comments','','Comments Off');?></span>
			<!-- <span> <a href="<?php //echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php //echo esc_attr( get_the_author() ); ?>"><?php //echo get_avatar( get_the_author_meta( 'ID' ), 14 ); ?> <?php //the_author(); ?></a></span> -->
		</div>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>