<?php

/*

We store our taxonomies in a multi-dimensional array.

*/

$fw_taxonomies_array = array (

	/*
	array (
		'taxonomy_name'  => 'industry',
		'plural_name'    => 'Industries',
		'singular_name'  => 'Industry',
		'post_type'      => 'customers',
		'hierarchical'   => true,
		'show_ui'        => true,
		'query_var'      => true,
		'rewrite'        => array   // array is optional, this can instead be set to true or false if you don't need these settings.
            (
                'slug' => 'customers/',
                'with_front' => true,
                'hierarchical' => true,
            )
	),
	*/
		
);

require FW_PATH . "/fw.taxonomies.php";

?>