<?php

/*

We store our custom post types in a multi-dimensional array.

*/

$fw_post_types_array = array (
	
	/*
		Helpful Information:
		
		Please review the WordPress Codex for all the details on every parameter.
		http://codex.wordpress.org/Function_Reference/register_post_type
		
		"post_type_name" => slug for this post type, should be all lowercase with no spaces.
		"singular_name"  => name of the post type.  This can contain spaces and uppercase letters.
		"rewrite"        => array is optional, this can simply be set to true or false if you don't need the extra option.
		"supports"       => what standard wordpress features will this post type use.
								'title'
								'editor' (content)
								'author'
								'thumbnail' (featured image) (current theme must also support Post Thumbnails)
								'excerpt'
								'trackbacks'
								'custom-fields'
								'comments' (also will see comment count balloon on edit screen)
								'revisions' (will store revisions)
								'page-attributes' (template and menu order) (hierarchical must be true)
		"icon"          => optional, simply add your icons to the library/framework/icons/ directory.
	
	array (
		"post_type_name" => "",
		"singular_name" => __("", THEME_TD),
		"plural_name" => __("", THEME_TD),
		"lowercase_singular_name" => __("", THEME_TD),
		"lowercase_plural_name" =>  __("", THEME_TD),
		"title_input_text" => __("", THEME_TD),
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"query_var" => true,
		"rewrite" => array
            (
                "slug" => "",
                "with_front" => true,
            ),
   		"capability_type" => "post",
	    "has_archive" => true, 
	    "hierarchical" => true,
	    "menu_position" => null,
	    "supports" => array("title", "editor", "thumbnail"),	
	    //"icon" => THEME_URI . "/library/framework/icons/icon.png"
	),
	
	*/

);

require FW_PATH . "/fw.post_types.php";

?>
