<?php

/*
	
	Sidebars & Widgetizes Areas
	We store our our predefined sidebars in a multi-dimensional array.
	
	To add more sidebars or widgetized areas, simply copy and edit the array below.

*/


$fw_widget_areas_array = array (
    
    array (
    	'id' => 'widget-default',
    	'name' => 'Default Widget Area',
    	'description' => 'The default widget area.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>'
    ),

);

require_once(FW_PATH . "/fw.widget_areas.php");

?>