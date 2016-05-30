<?php

global $fw_taxonomies_array;

/*

Taxonomies Class

*/

class fw_taxonomy
{

	/*

	Variable to store the taxonomies array.
	
	*/
	
	var $taxonomies;	
	
	/*
	
	Main Class Function
	
	*/

	function fw_taxonomy ($data)
	{
	
		$this->taxonomies = $data;
		
		/*
		
		We need to register our taxonomies in the init hook
		
		*/
		
		add_action("init", array(&$this, "array_loop"));
			
	}
	
	function array_loop ()
	{
	
		/*
		
		We use a foreach loop to register each of our taxonomies.
		
		*/		
		
		foreach ($this->taxonomies as $taxonomy)
		{
		
			/*
			
			We use another class function
			
			*/
		
			$this->register($taxonomy);
		
		}	
	
	}
	
	/*
	
	Class function to register the taxonomy
	
	*/
	
	function register ($taxonomy)
	{
	
		global $fw_translations;
	
		$labels = array(
		'name' => $taxonomy['plural_name'],
		'singular_name' => $taxonomy['singular_name'],
		'search_items' => $fw_translations["search"] . " " . $taxonomy['plural_name'],
		'all_items' => $fw_translations["all"] . " " . $taxonomy['plural_name'],
		'parent_item' => $fw_translations["parent"] . " " . $taxonomy['singular_name'],
		'parent_item_colon' => $fw_translations["all"] . " " . $taxonomy['singular_name'],
		'edit_item' => $fw_translations["edit"] . " " . $taxonomy['singular_name'], 
		'update_item' => $fw_translations["update"] . " " . $taxonomy['singular_name'],
		'add_new_item' => $fw_translations["add_new"] . " " . $taxonomy['singular_name'],
		'new_item_name' => $fw_translations["new"] . " " . $taxonomy['singular_name'] . $fw_translations["name"],
		'menu_name' => $taxonomy['plural_name'],
		); 	
		
		register_taxonomy($taxonomy['taxonomy_name'],array($taxonomy['post_type']), array(
		'hierarchical' => $taxonomy['hierarchical'],
		'labels' => $labels,
		'show_ui' => $taxonomy['show_ui'],
		'query_var' => $taxonomy['query_var'],
		'rewrite' => $taxonomy['rewrite']
		));

	    /*
	  
	    Prevent 404 Error On Archive Pages
	  
	    */
	  
	    flush_rewrite_rules();
	    
	}	
	
}

/*

Instantiate the tuts_taxonomy class

*/

$fw_taxonomies = new fw_taxonomy($fw_taxonomies_array);

?>