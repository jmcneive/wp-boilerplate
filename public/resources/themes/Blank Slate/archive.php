<?php

/*
This is the blog or default archive/index template.
*/

?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div class="inner-content clearfix">
                    
                    <div class="masthead">
				    <?php if (is_category()) { ?>
					    <h1>
						    <span><?php _e("Posts Categorized:", THEME_TD); ?></span> <?php single_cat_title(); ?>
				    	</h1>
				    <?php } elseif (is_tag()) { ?> 
					    <h1>
						    <span><?php _e("Posts Tagged:", THEME_TD); ?></span> <?php single_tag_title(); ?>
					    </h1>
				    <?php } elseif (is_author()) { global $post; $author_id = $post->post_author; ?>
					    <h1>
                            <span><?php _e("Posts By:", THEME_TD); ?></span> <?php echo get_the_author_meta('display_name', $author_id); ?>
					    </h1>
				    <?php } elseif (is_day()) { ?>
					    <h1>
    						<span><?php _e("Daily Archives:", THEME_TD); ?></span> <?php the_time('l, F j, Y'); ?>
					    </h1>
	
	    			<?php } elseif (is_month()) { ?>
		    		    <h1>
			    	    	<span><?php _e("Monthly Archives:", THEME_TD); ?></span> <?php the_time('F Y'); ?>
				        </h1>
				
				    <?php } elseif (is_year()) { ?>
				        <h1>
				    	    <span><?php _e("Yearly Archives:", THEME_TD); ?></span> <?php the_time('Y'); ?>
				        </h1>
				    <?php } ?>
				    </div>

				    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					
					    <header>
						
						    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						
						    <p class="meta"><?php _e("Posted", THEME_TD); ?> <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", THEME_TD); ?> <span class="author"><?php the_author_posts_link(); ?></span> <span class="amp">&</span> <?php _e("filed under", THEME_TD); ?> <?php the_category(', '); ?>.</p>
					
					    </header> <!-- end article header -->
				
					    <section class="clearfix">
					
						    <?php the_post_thumbnail( 'wpbp-featured' ); ?>
					
						    <?php the_excerpt(); ?>
				
					    </section> <!-- end article section -->
					
					    <footer>
						
					    </footer> <!-- end article footer -->
				
				    </article> <!-- end article -->
				
				    <?php endwhile; ?>	
				
				        <?php if (function_exists('wpbp_page_navi')) { ?>
					        <?php wpbp_page_navi(); ?>
				        <?php } else { ?>
					        <nav class="wp-prev-next">
						        <ul class="clearfix">
							        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', THEME_TD)) ?></li>
							        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', THEME_TD)) ?></li>
						        </ul>
				    	    </nav>
				        <?php } ?>
				
				    <?php else : ?>
				
					    <article id="post-not-found">
				    		<header>
				    			<h1><?php _e("Post Not Found!", THEME_TD); ?></h1>
				    		</header>
				    		<section>
				    			<p><?php _e("Sorry, but the requested resource was not found on this site.", THEME_TD); ?></p>
				    		</section>
				    		<footer>
				    		    
				    		</footer>
						</article>
				
				    <?php endif; ?>
		
                </div> <!-- end .inner-content -->

				<?php get_sidebar(); ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>