<?php
/**
 * The main core theme functional template
 * 
 * @Package lucky
 * @since version 1.0.0
 * @Theme By https://urldev.com
 */

/**
 * lucky Site Logo
 * @since version 1.0.0
 */
function lucky_site_logo() {
	if ( has_custom_logo() ) :
		echo the_custom_logo();
	else :
		echo '<span class="lucky-site-title"><a href="' . HOME_URL . '"><h2 class="text-logo">'. SITE_NAME .'</h2></a></span>';
    endif;
    if( get_theme_mod('header_text') == 1){
        echo '<span class="lucky-site-description">'.get_bloginfo('description').'</span>';
    }
} add_action('lucky_website_logo', 'lucky_site_logo');

/**
 * lucky Primary Menu
 * @since version 1.0.0
 */
function lucky_primary_menu_fn() {
    if(function_exists('wp_nav_menu')){
        wp_nav_menu(array(
            'theme_location' => 'primarymenu',
            'container_class' => 'primary-menu nav',
            'menu_class' => 'nav-ul'
        ));
    }
} add_action('lucky_primary_menu', 'lucky_primary_menu_fn');

/**
 * lucky Mobile Menu
 * @since version 1.0.0
 */
function lucky_mobile_menu_fn() {
?>
    <nav id="menu" class="mobile-menu">
        <?php if(function_exists('wp_nav_menu')){
                wp_nav_menu(array(
                    'theme_location' => 'mobilemenu',
                    'container_class' => 'mobile-menu',
                    'echo' => true
                ));
            }
        ?>
    </nav>
<?php
} add_action('lucky_mobile_menu', 'lucky_mobile_menu_fn');

/**
 * lucky Header Style1 Top Menu
 * @since version 1.0.0
 */
function lucky_header_top_menu_fn() {
    if(function_exists('wp_nav_menu')){
        wp_nav_menu(array(
            'theme_location' => 'headertopmenu',
            'container_class' => 'header-styele1-top-menu',
            'fallback_cb' => false
        ));
    }
} add_action('lucky_header_top_menu', 'lucky_header_top_menu_fn');

/**
 * lucky Header Search
 * @since version 1.0.0
 */
function lucky_header_search_fn(){
?>
    <div class="search">
        <i class="lucky-icon-search header-search-icon"></i>
        <div class="search-form">
            <form role="search" method="GET" id="searchform" class="form searchform" action="<?php echo HOME_URL ?>">
                <input type="search" name="s" id="s" placeholder="Search here..." value="<?php the_search_query(); ?>"/>
                <button type="submit" value="send"><i class="lucky-icon-search"></i></button>
            </form>
        </div>
    </div>
<?php
}
add_action('lucky_header_search', 'lucky_header_search_fn');

/**
 * lucky single post & Page views counter
 * @since version 1.0.0
 */
function lucky_post_views_fn( $post_ID ) {
	$metaKey = 'lucky_post_views';
    $views = get_post_meta( $post_ID, $metaKey, true );
	$viewCount = ( empty( $views ) ? 0 : $views );
	$viewCount++;
	update_post_meta( $post_ID, $metaKey, $viewCount );
    echo $viewCount;
}
add_action('lucky_post_views', 'lucky_post_views_fn');

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function lucky_custom_excerpt_length( $length ) {
    return 20;
}
add_filter('excerpt_length', 'lucky_custom_excerpt_length', 999);

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function lucky_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( ' [<a class="read-more" href="%1$s">%2$s</a>]',
            get_permalink( get_the_ID() ),
            __( 'Read More', 'lucky' )
        );
    }
    return $more;
}
add_filter( 'excerpt_more', 'lucky_excerpt_more' );

/**
 * lucky single next & previous post navigation
 * @since version 1.0.0
 */
function lucky_next_prev_Post_nav() {
?>
    <div class="lucky-prev-next-post clearfix">
        <div class="prev-post col-6">
            <?php echo previous_post_link('<i class="lucky-icon-arrow-left"></i> Prev Post: %link');?>
        </div>
        <div class="next-post col-6">
            <?php echo next_post_link('<i class="lucky-icon-arrow-right"></i> Next Post: %link');?>
        </div>
    </div>
<?php
} add_action('lucky_next_prev_Post','lucky_next_prev_Post_nav');

/**
 * lucky related posts
 * @since version 1.0.0
 */
function lucky_related_posts_fn() {
    $categories = get_the_category();
    if (!empty($categories)) {

        $catName = '';
        foreach($categories as $category){ $catName .= $category->name . ','; }

        $relatedQuery = new WP_Query( array(
            'category_name' => $catName,
            'nopaging'      => false,
            'posts_per_page' => '3',
            'ignore_sticky_posts' => false,
            'post__not_in' => array(get_the_ID())
        ));
        if ( $relatedQuery->have_posts() ) {
            echo '<div class="lucky-related-posts clearfix"><h5>Related Articles:</h5>';
            while ( $relatedQuery->have_posts() ) : $relatedQuery->the_post();

                echo '<div class="related-posts col-4">';
                if ( has_post_thumbnail() ) : ?>
                    <a class="featured-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?> </a>
                <?php elseif ( lucky_get_attachment() ) : ?>
                    <a class="featured-link" href="<?php the_permalink(); ?>"><?php echo lucky_get_attachment(get_the_ID()); ?></a>
                <?php endif;
                the_title( '<h6 class="entry-title"><a href="'. esc_url( get_permalink() ) .'">', '</a></h6>');
                echo '</div>';

            endwhile;
            echo '</div>';
        }
        wp_reset_postdata();
    }
} add_action('lucky_related_posts', 'lucky_related_posts_fn');

/**
 * lucky copyright text
 * @since version 1.0.0
 */
function lucky_copyright() {
    echo $default_copyright = '© ' . date("Y") . ' All Rights Reserved By <a href="https://urldev.com/themes/lucky/" target="_blank">lucky</a> WordPress Theme.';
} add_action('lucky_copyright_text', 'lucky_copyright');

/**
 * lucky site current url
 * @since version 1.0.0
 */
/* function lucky_get_current_url() {
	$schema = is_ssl() ? 'https://' : 'http://';
	return $schema . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
} */

/**
 * lucky post attachment detector
 * @since version 1.0.0
 */
function lucky_get_attachment( $postid = '') {
    $attachmentimg = ''; // this line added on 27-05-2021
    $attachments = get_posts( array(
        'post_type' => 'attachment',
        'posts_per_page' => 1,
        'post_parent' => $postid,
        'exclude'     => get_post_thumbnail_id()
    ) );
    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            $attachmentimg = wp_get_attachment_image( $attachment->ID, 'thumbnail-size', true );
        }
    }
    return $attachmentimg;
}

/**
 * lucky Share Icons
 * @package lucky
 * @since version 1.0.0
 */
function lucky_share_this() {

    $title = get_the_title();
    $permalink = get_permalink();

    $facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$permalink;
    $twitter = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$permalink;
    $linkedin = 'http://www.linkedin.com/shareArticle?url='.$permalink.'&amp;title='.$title;
    $pinterest = 'http://pinterest.com/pin/create/bookmarklet/?url='.$permalink;
    $reddit = 'http://www.reddit.com/submit?url='.$permalink.'&amp;title='.$title;
    $tumblr = 'https://www.tumblr.com/widgets/share/tool?posttype=link&amp;canonicalUrl='.$permalink.'&amp;title='.$title.'&amp;caption='.$title;
    $telegram = 'https://telegram.me/share/url?url='.$permalink.'&amp;text='.$title;
    $email = 'mailto:?subject='.$title.'&amp;body='.$permalink;
    
    $content = '<span class="share">SHARE <i class="lucky-icon-share"></i></span>';
    $content .= '<a href="'.$facebook.'" onclick="window.open(this.href, \'facebookwindow\',\'left=20,top=20,width=600,height=700,toolbar=0,resizable=1\'); return false;" class="facebook" rel="nofollow"><i class="lucky-icon-facebook"></i><span class="share-text">Facebook</span></a>';
    $content .= '<a href="'.$twitter.'" onclick="window.open(this.href, \'twitterwindow\',\'left=20,top=20,width=600,height=300,toolbar=0,resizable=1\'); return false;" class="twitter" rel="nofollow"><i class="lucky-icon-twitter"></i><span class="share-text">Twitter</span></a>';
    $content .= '<a href="'.$linkedin.'" onclick="window.open(this.href, \'linkedinwindow\',\'left=20,top=20,width=600,height=700,toolbar=0,resizable=1\'); return false;" class="linkedin" rel="nofollow"><i class="lucky-icon-linkedin"></i><span class="share-text">Linkedin</span></a>';
    $content .= '<a href="'.$pinterest.'" onclick="window.open(this.href, \'pinterestwindow\',\'left=20,top=20,width=600,height=700,toolbar=0,resizable=1\'); return false;" class="pinterest" rel="nofollow"><i class="lucky-icon-pinterest"></i><span class="share-text">Pinterest</span></a>';
    $content .= '<a href="'.$reddit.'" onclick="window.open(this.href, \'redditwindow\',\'left=20,top=20,width=600,height=700,toolbar=0,resizable=1\'); return false;" class="reddit" rel="nofollow"><i class="lucky-icon-reddit"></i><span class="share-text">Reddit</span></a>';
    $content .= '<a href="'.$tumblr.'" onclick="window.open(this.href, \'redditwindow\',\'left=20,top=20,width=600,height=700,toolbar=0,resizable=1\'); return false;" class="tumblr" rel="nofollow"><i class="lucky-icon-tumblr-fill"></i><span class="share-text">Tumblr</span></a>';
    $content .= '<a href="'.$telegram.'" onclick="window.open(this.href, \'redditwindow\',\'left=20,top=20,width=600,height=700,toolbar=0,resizable=1\'); return false;" class="telegram" rel="nofollow"><i class="lucky-icon-telegram"></i><span class="share-text">Telegram</span></a>';
    $content .= '<a href="'.$email.'" class="email" rel="nofollow"><i class="lucky-icon-envelop"></i></a>';
    $content .= '<a href="#" onclick="window.print(); return false;" class="print"><i class="lucky-icon-printer"></i></a>';

    echo $content;
}

/**
 * lucky comments navigation
 * @since version 1.0.0
 */
function lucky_post_comments_navigation() {
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        require THEME_DIR .'template-parts/comments/comments-nav.php';
    endif;
}

/**
 * lucky Breadcrumbs
 * @since version 1.0.0
 */
function lucky_default_breadcrumbs($separator, $home = 'Home') {
    /* This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values */
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    /* counting total elements of an array $path */
    $lastPath = count($path);
    $homeUrl = HOME_URL; /* OR, ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/'; */
    // Initial breadcrumbs
    $breadcrumbs = Array("<p id='breadcrumbs'><span><a href=\" $homeUrl \">$home</a></span>");

    foreach ($path as $crumb => $breadcrumb) {
        $homeUrl .= $breadcrumb . '/';
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(Array('.php', '-', '_'), Array('', ' '), $breadcrumb));
        // If we are not on the last index, then display an <a> tag
        if ($crumb != $lastPath)
            $breadcrumbs[] = "<span><a href=\"" . $homeUrl . "\">" . $title . "</a></span>";
        else
            $breadcrumbs[] = "<span>".$title."</span></p>";
    }
    // Build our temporary array (pieces of bread) into one big string with theme classes & div:)
    return '<div class="urldev-breadcrumbs clearfix"><div class="content-wrap"><div class="col-12">'. implode($separator, $breadcrumbs) .'</div></div></div>';
}

/**
 * lucky Breadcrumbs action
 * @since version 1.0.0
 */
function lucky_breadcrumbs_fn(){
    $selectBredcrumbs = get_theme_mod('lucky_slect_breadcrumbs', 'default');

    if ($selectBredcrumbs == "yoast" && function_exists('yoast_breadcrumb')) :
        yoast_breadcrumb('<div class="urldev-breadcrumbs clearfix"><div class="content-wrap"><div class="col-12"><p id="breadcrumbs">','</p></div></div></div>' );
    else :
        $BredcrumbsDevider = get_theme_mod('lucky_breadcrumbs_divider', ' &raquo; ');
        echo lucky_default_breadcrumbs($BredcrumbsDevider);
    endif;

} add_action('lucky_breadcrumbs', 'lucky_breadcrumbs_fn');

/**
 * Insert Ads inside posts content after n'th <p> tag
 * @since version 1.0.0
 */
if(get_theme_mod('lucky_ads_yes_no', 0) == 1){
    function lucky_insert_ad( $content ) {
        // If is single blog page then
        if ( is_single()){
    
            $ads_code = get_theme_mod('lucky_ads_code', 'Input Your Google Adsense Ads Code or Others Ads Code with Script Tag.');
            $ads_text = '<div class="ad-box">' . $ads_code . '</div>';
            $split_by = "</p>";
            $insert_after = get_theme_mod('lucky_ads_p_counts', 5) ? : 5;
    
            // make array of paragraphs
            $paragraphs = explode( $split_by, $content);
    
            if ( count( $paragraphs ) > $insert_after ) {
                $new_content = '' . $ads_text;
                $i = 1;
                // loop through array and build string for output
                foreach( $paragraphs as $paragraph ) {
                    // add paragraph, preceeded by an ad after every $insert_after
                    $new_content .= ( $i % $insert_after == 0 ? $ads_text : '' ) . $paragraph;
                    $i++;
                }
                return $new_content;
            }
            return $content . $ads_text;
        };
        return $content;
    } add_filter('the_content', 'lucky_insert_ad');
}

/**
 * Insert Codes Just After Opening The body Tag
 * @since version 1.0.0
 */
function lucky_insert_body_codes_fn(){
    echo get_theme_mod('lucky_insert_body_codes', '');
} add_action('wp_body_open', 'lucky_insert_body_codes_fn');

/**
 * Insert Codes inside the footer
 * @since version 1.0.0
 */
function lucky_insert_footer_codes_fn(){
    echo get_theme_mod('lucky_insert_footer_codes', '');
} add_action('wp_footer', 'lucky_insert_footer_codes_fn');

/*
 * The End ! Theme created by https://urldev.com
 */