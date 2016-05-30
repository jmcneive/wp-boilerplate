<?php 

/*
This is the core Bones file where most of the
main functions & features reside.

Original Bones Developement by: Eddie Machado
URL: http://themble.com/bones/
*/


/****************
CUSTOM LOGIN PAGE
*****************/

// calling your own login css so you can style it
function wpbp_login_css() {

	wp_enqueue_style( 'wpbp_login_css', ASSETS_URI . '/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function wpbp_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function wpbp_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action('login_enqueue_scripts', 'wpbp_login_css', 10);
add_filter('login_headerurl', 'wpbp_login_url');
add_filter('login_headertitle', 'wpbp_login_title');


/*********************
LAUNCH WordPress Boilerplate
Let's fire off all the functions
and tools. I put it up here so it's
right up top and clean.
*********************/

// we're firing all out initial functions at the start
add_action('after_setup_theme','wpbp_setup_theme', 15);

function wpbp_setup_theme() {
	
	// enable wp menus
	add_theme_support( 'menus' );
	
	// wp thumbnails (sizes handled in functions.php)
	add_theme_support('post-thumbnails');

	// default thumb size
	//set_post_thumbnail_size(125, 125, true);
	
	// Thumbnail sizes
	//add_image_size( 'wpbp-featured', 1884, 700, true );

	// rss thingy
	add_theme_support('automatic-feed-links');
	
    // launching operation cleanup
    add_action('init', 'wpbp_head_cleanup');

} /* end wpb setup theme */


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'wpbp_flush_rewrite_rules' );

// Flush your rewrite rules
function wpbp_flush_rewrite_rules() {
    
	flush_rewrite_rules();
}


/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function wpbp_head_cleanup() {

	// remove header links
	remove_action( 'wp_head', 'feed_links_extra', 3 );                    // Category Feeds
	remove_action( 'wp_head', 'feed_links', 2 );                          // Post and Comment Feeds
	remove_action( 'wp_head', 'rsd_link' );                               // EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' );                       // Windows Live Writer
	remove_action( 'wp_head', 'index_rel_link' );                         // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            // previous link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for Adjacent Posts
	remove_action( 'wp_head', 'wp_generator' );                           // WP version
	
	add_filter( 'style_loader_src', 'wpbp_remove_wp_ver_css_js', 9999 );   // remove WP version from css
	add_filter( 'script_loader_src', 'wpbp_remove_wp_ver_css_js', 9999 );  // remove Wp version from scripts

} /* end wpb head cleanup */


/*************************
Remove WP version
**************************/

add_filter('the_generator', 'wpbp_rss_version');

function wpbp_rss_version() {
    
	return '';
}

function wpbp_remove_wp_ver_css_js( $src ) {
    
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}



/*****************************
Loading jquery reply elements
on single pages automatically
******************************/

add_action('wp_print_scripts', 'wpbp_queue_js');

function wpbp_queue_js() {
    
    if (!is_admin()) {
        if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) wp_enqueue_script( 'comment-reply' );
    }
}



/*******************
SEARCH FORM LAYOUT
*******************/

add_filter('get_search_form', 'wpbp_wpsearch' );

function wpbp_wpsearch($form) {
    
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', THEME_TD) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...', THEME_TD).'" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', THEME_TD ) .'" />
    </form>';
    
    return $form;
}



/***************************
PASSWORD PROTECTED POST FORM
***************************/

add_filter( 'the_password_form', 'custom_password_form' );

function custom_password_form() {
    
	global $post;
	
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	
	$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
	' . '<p>' . __( "This post is password protected. To view it please enter your password below:", THEME_TD) . '</p>' . '
	<label for="' . $label . '">' . __( "Password:" ,'bonestheme') . ' </label><div class="input-append"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn btn-primary" value="' . esc_attr__( "Submit", THEME_TD ) . '" /></div>
	</form></div>
	';
	
	return $o;
}

// Filter to hide protected posts
function exclude_protected($where) {
    
	global $wpdb;
	
	return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function exclude_protected_action($query) {
    
	if( !is_single() && !is_page() && !is_admin() ) {
		add_filter( 'posts_where', 'exclude_protected' );
	}
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');



/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function ( HOW TO USE: call using wpbp_related_posts(); )
function wpbp_related_posts() {
	
	echo '<ul id="wpb-related-posts">';
	
	global $post;
	
	$tags = wp_get_post_tags($post->ID);
	
	if($tags) {
		foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
        $args = array(
        	'tag' => $tag_arr,
        	'numberposts' => 5, /* you can change this to show more */
        	'post__not_in' => array($post->ID)
     	);
        $related_posts = get_posts($args);
        if($related_posts) {
        	foreach ($related_posts as $post) : setup_postdata($post); ?>
	           	<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
	        <?php endforeach; }
	    else { ?>
            <?php echo '<li class="no_related_post">No Related Posts Yet!</li>'; ?>
		<?php }
	}
	
	wp_reset_query();
	
	echo '</ul>';
}



/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function wpbp_page_navi($before = '', $after = '') {
    
	global $wpdb, $wp_query;
	
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	
	if ( $numposts <= $posts_per_page ) {
    	return;
    }
	
	if (empty($paged) || $paged == 0) {
		$paged = 1;
	}
	
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	
	if ($start_page <= 0) {
		$start_page = 1;
	}
	
	$end_page = $paged + $half_page_end;
	
	if (($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	
	if ($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	
	if ($start_page <= 0) {
		$start_page = 1;
	}
		
	echo $before.'<div class="pagination"><ul class="clearfix">'."";
	if ($paged > 1) {
		$first_page_text = "&laquo";
		echo '<li class="prev"><a href="'.get_pagenum_link().'" title="First">'.$first_page_text.'</a></li>';
	}
		
	$prevposts = get_previous_posts_link('&larr; Previous');
	if($prevposts) { echo '<li>' . $prevposts  . '</li>'; }
	else { echo '<li class="disabled"><a href="#">&larr; Previous</a></li>'; }
	
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="active"><a href="#">'.$i.'</a></li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="">';
	next_posts_link('Next &rarr;');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = "&raquo;";
		echo '<li class="next"><a href="'.get_pagenum_link($max_page).'" title="Last">'.$last_page_text.'</a></li>';
	}
	echo '</ul></div>'.$after."";
} /* end page navi */



/***************
COMMENT LAYOUT
***************/
		
function wpbp_comments($comment, $args, $depth) {
    
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-author vcard row-fluid clearfix">
				<div class="avatar span3">
					<?php echo get_avatar( $comment, $size='75' ); ?>
				</div>
				<div class="span9 comment-text">
					<?php printf('<h4>%s</h4>', get_comment_author_link()) ?>
					<?php edit_comment_link(__('Edit', THEME_TD),'<span class="edit-comment btn btn-small btn-info"><i class="icon-white icon-pencil"></i>','</span>') ?>
                    
                    <?php if ($comment->comment_approved == '0') : ?>
       					<div class="alert-message success">
          				<p><?php _e('Your comment is awaiting moderation.', THEME_TD) ?></p>
          				</div>
					<?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
                    
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
			</div>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
}



/***************************
RANDOM CLEANUP & IMPROVMENTS
***************************/

// Disable jump in 'read more' link
add_filter( 'the_content_more_link', 'remove_more_jump_link' );

function remove_more_jump_link( $link ) {
	
	$offset = strpos($link, '#more-');
	
	if ( $offset ) {
		$end = strpos( $link, '"',$offset );
	}
	
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	
	return $link;
}


// Display trackbacks/pings callback function
function list_pings($comment, $args, $depth) {
	
	$GLOBALS['comment'] = $comment;
	echo '<li id="comment-'.comment_ID() . '"><i class="icon icon-share-alt"></i>&nbsp;' . comment_author_link();
}


// Only display comments in comment count (which isn't currently displayed in wp-bootstrap, but i'm putting this in now so i don't forget to later)
add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {
	
	if ( ! is_admin() ) {
		
		global $id;
		
		$get_comments_args = 'status=approve&post_id=' . $id;
		$get_comments = get_comments($get_comments_args);
	    $comments_by_type = separate_comments($get_comments);
	    
	    return count($comments_by_type['comment']);
	
	} else {
	    return $count;
	}
}


// Remove the p from around imgs
// (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
add_filter('the_content', 'wpbp_filter_ptags_on_images');

function wpbp_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}


// Add lead class to first paragraph
add_filter( 'the_content', 'first_paragraph' );

function first_paragraph( $content ) {
    
    global $post;

    // If we're on the homepage, don't add the lead class to the first paragraph of text
    if ( is_page_template( 'page-homepage.php' ) ) {
        return $content;
    } else {
        return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
    }
}


// This removes the annoying […] to a Read More link
add_filter('excerpt_more', 'wpbp_excerpt_more');

function wpbp_excerpt_more($more) {
	
	global $post;
	
	// edit here if you like
	return '... <br><a class="btn btn-primary btn-mini read-more-btn" href="'. get_permalink($post->ID) . '" title="Read '.get_the_title($post->ID).'"><i class="icon-circle-arrow-right"></i> Read more</a>';
}


// Add thumbnail class to thumbnail links
add_filter( 'wp_get_attachment_link', 'add_class_attachment_link', 10, 1 );

function add_class_attachment_link( $html ) {
    
    $postid = get_the_ID();
    $html = str_replace( '<a','<a class="thumbnail"',$html );
    
    return $html;
}


// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {
	
	if ( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) 
		$classes[] = "active";  
	
	return $classes;
}

// Add active class to current page item
/*
add_filter('page_css_class', 'addPostTypeCurrentPageClass', 10, 2);

function addPostTypeCurrentPageClass($classes, $page) {
    
    global $post;
    if('post_type' == get_post_type($post) && $post->ID == $page->ID)
        $classes[] = 'current_page_item';
    return $classes;
}
*/

// Limit excerpt
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_length( $length ) {
	return 40;
}

// Show all custom post types with normal posts on home page
/*
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
    
    // do not modify queries in the admin
    if (is_admin()) { return $query; }
    
    if ( is_home() ) {
    
        $all_post_types = array( 'post','video','photo','tweet' );
    
    	$existing_post_type = isset($query->query_vars['post_type']); // Only do this if the post type is not already set
    	
    	if ( empty( $existing_post_type ) ) {
    
    		$query->set( 'post_type' , $all_post_types );
    
    	}
	}

    return $query;
}
*/



?>