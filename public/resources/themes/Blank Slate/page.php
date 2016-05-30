<?php

/*
* Default Page Template
* Any page without a selected custom template will use this template.
*/

?>

<?php get_header(); ?>
		    
		    <?php if (have_posts()) : ?>
		    
		        <?php while (have_posts()) : the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(array('single', 'clearfix')); ?> role="article">
    				<div class="inner">
                        <header>
                            <div class="date">
                                <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
                                    <?php the_time('F jS, Y'); ?>
                                </time>
                            </div>
                            <h1 itemprop="headline"><?php the_title(); ?></h1>
                            <?php the_post_thumbnail( 'thinksm-featured', array( 'class' => 'featured-img' )); ?>
                        </header>
                        <section class="entry-content clearfix" itemprop="articleBody">
                            <?php the_content(); ?>
                        </section>
                        <footer class="clearfix">
                            
                        </footer>
    				</div>
                </article>
		
                <?php endwhile; ?>
		
			<?php else : ?>
		
		        <?php get_template_part( 'partial', 'not-found'); ?>
		
			<?php endif; ?>

<?php get_footer(); ?>