<?php

/*
Author: Kevin Terry
URL: http://kevinterry.us
*/



/************* SETUP CONSTANTS ***************/

// The theme's short name to avoid conflicts with your other themes using this exact framework. Change this for every theme.
define("THEME_SN", "wpbp");

// The name of the text domain for this theme.  Change this for every theme.
define("THEME_TD", "wordpress-boilerplate");

// Theme's Directory URI
define("THEME_URI", get_template_directory_uri());

// Theme's Ligrary Directory URI
define("ASSETS_URI", WP_HOME);

// Theme's Library Folder Path
define("THEME_LIB", TEMPLATEPATH . '/library');

// Framework Folder's Path (Remember paths and url's are different, trying echoing out TEMPLATE_PATH)
define("FW_PATH", TEMPLATEPATH . '/library/framework');

// Config Folder's Path (Remember paths and url's are different, trying echoing out TEMPLATE_PATH)
define("CONFIG_PATH", TEMPLATEPATH . '/library/configuration');





/************* INCLUDE/REQUIRE FILES ***************/

if (is_admin())
{
    // Include admin custom settings/functions
    require_once CONFIG_PATH . "/theme.admin.php";
}

// Include project specific helpers
require_once CONFIG_PATH . "/theme.helpers.php";

// Include custom theme settings/functions
require_once CONFIG_PATH . "/theme.custom.php";

// Load our custom post types config file.
require_once CONFIG_PATH . "/theme.post_types.php";

// Load our taxonomies config file.
require_once CONFIG_PATH . "/theme.taxonomies.php";

// Now we need to load in our menus config file.
require_once CONFIG_PATH . "/theme.menus.php";

// Load in the custom menu walker class.
require_once CONFIG_PATH . "/theme.walker.php";

// Load widget areas
require_once CONFIG_PATH . "/theme.widget_areas.php";

// Load basic translations file
require_once CONFIG_PATH . '/theme.translate.php';

// Register and Enqueue theme scripts & styles
require_once CONFIG_PATH . "/theme.scripts.php";

?>