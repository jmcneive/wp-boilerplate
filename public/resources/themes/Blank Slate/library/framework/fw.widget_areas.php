<?php

/*

We register our sidebars within the init hook

*/

add_action("init", "fw_register_widget_areas");

function fw_register_widget_areas()
{

	global $fw_widget_areas_array;

	// Load predefined widget areas
	if (is_array($fw_widget_areas_array)) 
	{
	
		foreach ($fw_widget_areas_array as $widget_area)
		{
			
			if ( !function_exists('register_sidebar') || !register_sidebar($widget_area) ) : endif;
		
		}
	
	}

}

?>