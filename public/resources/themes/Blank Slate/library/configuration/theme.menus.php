<?php

/*

We register our menus locations.

*/

add_action('after_setup_theme','wpbp_register_menus');

function wpbp_register_menus()
{
	register_nav_menus( array(
    		
        'primary' => __('Primary', THEME_TD)
    ));
}



/*

Setup our menus.

*/

function wpbp_main_nav()
{
    wp_nav_menu( array(
    	'container' => false,                           // remove nav container
    	'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
    	'menu' => __('Main Menu', THEME_TD),            // nav name
    	'menu_class' => 'nav top-nav clearfix',         // adding custom nav class
    	'theme_location' => 'primary',                  // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'wpbp_main_nav_fallback',      // fallback function
    	'items_wrap' => '%3$s',
    	'walker' => new Clean_Walker_Nav()
	));
}



/*

And last setup a fallback for main menu

*/

function wpbp_main_nav_fallback()
{	
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => 'nav top-nav clearfix',         // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // before each link
        'link_after' => ''                              // after each link
	));
}

?>