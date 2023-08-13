<?php
/**
 * The main core template for displaying post content
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 **/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'lucky-singular' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
		<div class="entry-meta">
			<span><i class="lucky-icon-eye" aria-hidden="true"></i> <?php do_action('lucky_post_views', get_the_ID()); ?></span> | 
			<span><i class="lucky-icon-calendar" aria-hidden="true"></i> <?php the_modified_time('d F Y'); //the_time('d M Y');?></span> |
			<span><i class="lucky-icon-bubble" aria-hidden="true"></i> <?php comments_popup_link('No Comment','1 Comment','% Comments','','Comments Off');?></span> | 
			<span> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 14 ); ?> <?php the_author(); ?></a></span><?php if( is_single() ) : ; ?> | <span>Category: <?php the_category(', '); ?></span><?php endif; ?>
		</div>
		<div class="featured-img">
			<?php if ( has_post_thumbnail() ) : the_post_thumbnail(); endif; ?>
		</div>
	</header>
	<div class="entry-content">
		<div class="content">
			<?php the_content(); ?>
		</div>
	</div>
	<footer class="entry-footer">
		<div class="entry-share">
			<?php lucky_share_this(); ?>
        </div>
        <div class="tags">
            <?php the_tags(); ?>
        </div>
		<?php if(is_single()) : ?>
			<div class="author-box clearfix">
				<div class="author col-12">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
					</div>
					<div class="author-title">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><h4><?php the_author(); ?></h4></a>
					</div>
				</div>
				<div class="col-12">
					<div class="author-content">
						<?php the_author_meta('description'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</footer>
</article>