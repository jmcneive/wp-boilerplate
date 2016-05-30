<?php

/**
* The Loop. Automatically pulls any template file with the name partial-[post-type].php
* See library/configuration/theme.custom.php near line 455.  There you can edit what 
* post types to include in the query.  Default is only 'post'.
*/

    while (have_posts()) : the_post();
    
        $loop_post_type = get_post_type(get_the_ID());
        
        get_template_part( 'partial', $loop_post_type);
    
    endwhile;
?>