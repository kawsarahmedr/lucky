<?php
/**
 * The template for displaying none post content
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 **/
 if ( is_admin() ) :
	echo '<div style="background-color:var(--lucky-article-bg-color);padding:20px;width:100%;"><h2 class="entry-title text-center">No post found! Check back in latter. <br />Thanks</h2></div>';
else :
	$admin = get_admin_url();
	echo '<div style="background-color:var(--lucky-article-bg-color);padding:20px;width:100%;"><h2 class="entry-title text-center">No post found!</h2><br /><div class="text-center"><a href=" '. $admin .' ">Add New Post Now!</a></div></div>';
endif;
?>
