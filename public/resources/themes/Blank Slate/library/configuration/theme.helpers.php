<?php

/***********************************
PROJECT SPECIFIC HELPERS & UTILITIES
These are front-end helpers. Add admin only helper functions to "theme.admin.php".
************************************/

// Easy way to add a placeholder blank image.
function get_placeholder_image($width = 0, $height = 0, $src = '', $alt = '') {

    $src = (!empty($src)) ? $src : ASSETS_URI . '/img/nothing.gif';

    return '<img src="' . $src . '" width="' . $width . '" height="' . $height . '" alt="' . $alt . '">';

}

// Adding a hash to tags and returning as a list
function the_tags_hashed() {

    global $post;
    $tags_hashed = '';
    
    if( $tags = get_the_tags() ) {
    
        $tags_hashed .= '<ul class="tags">';
        
        foreach( $tags as $tag ) {   
            $tags_hashed .= '<li><a href="'. get_term_link( $tag, $tag->taxonomy ) . '">#' . $tag->name . '</a></li>';                 
        }
        
        $tags_hashed .= '</ul>';
    }
    
    echo $tags_hashed;
}

?>