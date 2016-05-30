<?php

/*
This file handles the admin area and functions.
You can use this file to make changes to the
dashboard. Updates to this page are coming soon.
It's turned off by default, but you can call it
via the functions file.
*/


/**************
CUSTOMIZE ADMIN
***************/

// Custom Backend Footer
add_filter('admin_footer_text', 'wpbp_custom_admin_footer');

function wpbp_custom_admin_footer() {
	echo '<span id="footer-thankyou">Developed by <a href="http://kevinterry.us" target="_blank">Kevin Terry</a></span>.';
}

// Adding editor styles
add_action('admin_init', 'wpbp_custom_admin_init');

function wpbp_custom_admin_init() {

    add_editor_style( 'editor-style.css' );
}

function add_upload_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'add_upload_mime_types' );

// Remove all the WP SEO nonsense
add_filter( 'wpseo_use_page_analysis',  '__return_false' );

// Add support to tabify for WordPress SEO
// if add_filter( 'tabify_plugin_support', '__return_true' );




/****************
DASHBOARD WIDGETS
*****************/

// disable default dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');

function disable_default_dashboard_widgets() {
	// remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	// remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //

	// removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

	/*
	have more plugin widgets you'd like to remove?
	share them with us so we can get a list of
	the most commonly used. :D
	https://github.com/eddiemachado/bones/issues
	*/
}



/*****************************
PROJECT SPECIFIC ADMIN HELPERS
*****************************/

// Remove metaboxes from edit screens
add_action( 'admin_menu' , 'remove_meta_boxes' );

function remove_meta_boxes() {
    
    // See http://codex.wordpress.org/Function_Reference/remove_meta_box
    //remove_meta_box( 'id', 'page', 'side' );

}


?>