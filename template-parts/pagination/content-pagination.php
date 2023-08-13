<?php
/**
 * The template for displaying pagination
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 */
?>
<div class="lucky-pagination-box">
	<?php the_posts_pagination(array(
			'mid_size' => 2,
			'prev_text' => __('Prev', 'lucky'),
			'next_text' => __('Next', 'lucky'),
			'screen_reader_text' => 'Pagination:',
		));
	?>
</div>