<?php

/*

We include custom widgets for the theme

*/

add_action("init", "fw_register_widgets");

function fw_register_widgets()
{

	global $fw_widgets_array;
	
	if (!empty($fw_widgets_array)) {
	
		foreach ($fw_widgets_array as $custom_widget)
		{
			require_once TEMPLATEPATH . '/widgets/' . $custom_widget['path'] . '.php';
		}
		
	}
}

?>