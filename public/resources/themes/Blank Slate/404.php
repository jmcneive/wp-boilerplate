<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div class="inner-content clearfix">

					<article id="post-not-found" class="clearfix">
					
						<header>
                            <h1><?php _e("404 - Article Not Found", THEME_TD); ?></h1>	
						</header> <!-- end article header -->
				
						<section class="entry-content">
						
							<p><?php _e("Whatever you were looking for was not found. Maybe try looking again or search using the form below.", THEME_TD); ?></p>
                            
							<?php get_search_form(); ?>
						
						</section> <!-- end article section -->
					
						<footer>
						
						</footer> <!-- end article footer -->
				
					</article> <!-- end article -->
		
                </div> <!-- end .inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
