<?php

/*********************
SCRIPTS & ENQUEUEING
*********************/

if ( is_admin() ) {

    // register admin styles & scripts


} else {

    // register theme styles & scripts

    // enqueue styles
    add_action('wp_enqueue_scripts', 'wpbp_styles');

    function wpbp_styles() {

        wp_register_style( 'wpbp-styles', ASSETS_URI . '/css/main.css', array(), '1.0', 'all' );

        wp_enqueue_style( 'wpbp-styles');
    }


    // enqueue scripts
    add_action('wp_enqueue_scripts', 'wpbp_scripts');

    function wpbp_scripts() {

        wp_register_script( 'modernizr', ASSETS_URI . '/js/vendor/modernizr.min.js', array(), '2.8.3', false );
        wp_register_script( 'main-js', ASSETS_URI . '/js/main.js', array( 'jquery' ), '', true);

        wp_enqueue_script( 'modernizr' );
        wp_enqueue_script( 'main-js' );
    }
}

?>