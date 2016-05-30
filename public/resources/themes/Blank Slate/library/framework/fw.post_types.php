<?php

global $fw_post_types_array, $fw_translations;

/*

Custom Post Types

*/

class fw_post_type
{

	// Variable to store the custom post types array.
	var $post_types;	
	
	
	// Main Class Function
	function fw_post_type ($data)
	{
	
		$this->post_types = $data;
		
		// We need to register our custom post types in the init hook
		add_action("init", array(&$this, "array_loop"));
			
	}
	
	function array_loop ()
	{
	
		// We use a foreach loop to register each of our custom post types.		
		foreach ($this->post_types as $post_type)
		{
		
			// We use another class function
			$this->register($post_type);
		
		}	
	
	}
	
	// Class function to register the custom post type	
	function register ($post_type)
	{
	  
		global $fw_translations;
	
		// Labels for the Custom Post Type
	    $labels = array(
	      'name' => $post_type['plural_name'],
	      'singular_name' => $post_type['singular_name'],
	      'add_new' => $fw_translations['add_new'] . " " . $post_type['singular_name'] ,
	      'all_items' => $fw_translations['all'] . " " . $post_type['plural_name'] ,
	      'add_new_item' => $fw_translations['add_new'] . " " . $post_type['singular_name'],
	      'edit_item' => $fw_translations['edit'] . " " . $post_type['singular_name'],
	      'new_item' => $fw_translations['new'] . " " . $post_type['singular_name'],
	      'view_item' => $fw_translations['view'] . " " . $post_type['singular_name'],
	      'search_items' => $fw_translations['search'] . " " . $post_type['lowercase_plural_name'],
	      'not_found' =>  $fw_translations['no_items_found'],
	      'not_found_in_trash' => $fw_translations['no_items_found_in_trash'], 
	      'parent_item_colon' => '',
	      'menu_name' => $post_type['plural_name']
	    );
	    
	    // The settings for the Custom Post Type
	    $args = array(
	      'labels' => $labels,
	      'public' => $post_type['public'],
	      'publicly_queryable' => $post_type['publicly_queryable'],
	      'show_ui' => $post_type['show_ui'], 
	      'show_in_menu' => $post_type['show_in_menu'], 
	      'query_var' => $post_type['query_var'],
	      'rewrite' => $post_type['rewrite'],
	      'capability_type' => $post_type['capability_type'],
	      'has_archive' => $post_type['has_archive'], 
	      'hierarchical' => $post_type['hierarchical'],
	      'menu_position' => $post_type['menu_position'],
	      'supports' => $post_type['supports'],
	      'menu_icon' => $post_type['icon']
	    ); 
	  
	  
	    // Register the Custom Post Type
	    register_post_type($post_type['post_type_name'],$args);
	
	}	
	
}


// Instantiate post_type class
$fw_post_types = new fw_post_type($fw_post_types_array);


// Replaces placeholder title input field with custom text
function change_default_title( $title ) {
	
	global $fw_post_types_array;
	$screen = get_current_screen();
	
	foreach ($fw_post_types_array as $post_types) {
		if ( $post_types["post_type_name"] == $screen->post_type ) {
			$title = $post_types["title_input_text"];
		}
	}

	return $title;
 
}

add_filter( 'enter_title_here', 'change_default_title' );

?>