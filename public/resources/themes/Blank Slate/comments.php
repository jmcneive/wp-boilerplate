<?php
/*
The comments page for Bones
*/

// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
    <div class="alert alert-info"><?php _e("This post is password protected. Enter the password to view comments.", THEME_TD); ?></div>
  <?php
    return;
  }
?>

<?php if ( comments_open() || have_comments() ) : ?>
<div id="comments" class="comments">
    
    <?php if ( have_comments() ) : ?>
    
    	<?php if ( ! empty($comments_by_type['comment']) ) : ?>
    	<h5 class="comments-count"><?php comments_number('<span>' . __("No", THEME_TD) . '</span> ' . __("Comments", THEME_TD) . '', '<span>' . __("One", THEME_TD) . '</span> ' . __("Comment", THEME_TD) . '', '<span>%</span> ' . __("Comments", THEME_TD) );?></h5>
    	
    	<ol class="commentlist">
    		<?php wp_list_comments('type=comment&callback=wpbp_comments'); ?>
    	</ol>
    	
    	<?php endif; ?>
    	
    	<?php /*if ( ! empty($comments_by_type['pings']) ) : ?>
    		<h3 id="pings">Trackbacks/Pingbacks</h3>
    		
    		<ol class="pinglist">
    			<?php wp_list_comments('type=pings&callback=list_pings'); ?>
    		</ol>
    	<?php endif; */?>
    	
    	<nav class="comment-nav">
    		<ul class="clearfix">
    	  		<li><?php previous_comments_link( __("Older comments", THEME_TD) ) ?></li>
    	  		<li><?php next_comments_link( __("Newer comments", THEME_TD) ) ?></li>
    		</ul>
    	</nav>
      
    	<?php else : // this is displayed if there are no comments so far ?>
    
    	<?php if ( comments_open() ) : // If comments are open, but there are no comments. ?>
        	
        	<!-- comments open -->
    
    	<?php else : ?>
            
            <!-- comments closed -->
            
    	<?php endif; ?>
    
    <?php endif; ?>
    
    
    <?php if ( comments_open() ) : ?>
    
    <div id="respond" class="respond-form">
    
    	<h3 id="comment-form-title" class="comment-reply-title"><?php comment_form_title( __("Leave a Reply", THEME_TD), __("Leave a Reply to", THEME_TD) . ' %s' ); ?></h3>
    
    	<div id="cancel-comment-reply">
    		<p class="small"><?php cancel_comment_reply_link( __("Cancel", THEME_TD) ); ?></p>
    	</div>
    
    	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
    	
      	<div class="help">
      		<p><?php _e("You must be", THEME_TD); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e("logged in", THEME_TD); ?></a> <?php _e("to post a comment", THEME_TD); ?>.</p>
      	</div>
    	
    	<?php else : ?>
    
    	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="form-vertical" id="commentform">
    
        	<?php if ( is_user_logged_in() ) : ?>
        
        	<p class="comments-logged-in-as"><?php _e("Logged in as", THEME_TD); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e("Log out of this account", THEME_TD); ?>"><?php _e("Log out", THEME_TD); ?> &raquo;</a></p>
        
        	<?php else : ?>
        	
        	<ul id="comment-form-elements" class="comment-form-elements clearfix">
        		
        		<li>
                    <label for="author"><?php _e("Name", THEME_TD); ?> <span><?php if ($req) echo "(required)"; ?></span></label>
                    <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php _e("Your name", THEME_TD); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
        		</li>
        		
        		<li>
                    <label for="email"><?php _e("Email", THEME_TD); ?> <span><?php if ($req) echo "(required)"; ?> <?php _e("will not be published", THEME_TD); ?></span></label>
                    <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="<?php _e("Your email", THEME_TD); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
        		</li>
        		
        		<li>
                    <label for="url"><?php _e("Website", THEME_TD); ?></label>
                    <input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="<?php _e("Your website", THEME_TD); ?>" tabindex="3" />
        		</li>
        		
        	</ul>
        
        	<?php endif; ?>
    	
    	<div class="clearfix">
    		<div class="input">
    			<textarea name="comment" id="comment" placeholder="<?php _e("Your Comment Here…", THEME_TD); ?>" tabindex="4"></textarea>
    		</div>
    	</div>
    	
    	<div class="form-actions">
    	  <input class="button" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e("Submit Comment", THEME_TD); ?>" />
    	  <?php comment_id_fields(); ?>
    	</div>
    	
    	<?php do_action('comment_form()', $post->ID); ?>
    	
    	</form>
    	
    	<?php endif; // If registration required and not logged in ?>
    </div>
    
    <?php endif; // if you delete this the sky will fall on your head ?>

</div>
<?php endif; ?>