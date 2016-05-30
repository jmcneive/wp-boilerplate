<?php
  
/**
* Partial used for "not found" requests.
*/
  
$not_found_classes = (is_single()) ? 'single' : '';
    
?>

<article class="post <?php echo $not_found_classes; ?> post-not-found clearfix">
    <div class="inner">
        <header>
    	    <h1><?php _e("Oops, Post Not Found!", THEME_TD); ?></h1>
    	</header>
        <section>
    	    <p><?php _e("Sorry, but the requested resource was not found on this site.", THEME_TD); ?></p>
    	</section>
    	<footer>
        	
    	</footer>
    </div>
</article>