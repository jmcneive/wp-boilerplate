<?php

/**
* Search results page template.
*/

?>

<?php get_header(); ?>
		
			
			<?php if (have_posts()) : ?>
            
                <?php get_template_part( 'loop' ); ?>
            
                <?php if (function_exists('wpbp_page_navi')) : ?>
		        
		            <?php wpbp_page_navi(); ?>
		        
		        <?php else : ?>
		        
		            <nav class="wp-prev-next">
		                <ul class="clearfix">
		        	        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', THEME_TD)) ?></li>
		        	        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', THEME_TD)) ?></li>
		                </ul>
		            </nav>
		        
		        <?php endif; ?>
		              
            <?php else : ?>
		        
                <?php get_template_part( 'partial', 'not-found'); ?>
            
		    <?php endif; ?>
		    

<?php get_footer(); ?>