<?php

/*
Plugin Name:     RRZE DEBUG FILTERS
Plugin URI:      
Description:     shows filters for given hook in console  
Version:         0.0.1
Author:          RRZE Webteam
Author URI:      https://blogs.fau.de/webworking/
License:         GNU General Public License v2
License URI:     http://www.gnu.org/licenses/gpl-2.0.html
Domain Path:     /languages
Text Domain:     rrze-debug-filters
*/

namespace RRZE\DEBUGFILTERS;


add_action( 'plugins_loaded', __NAMESPACE__ . '\loaded', 9999 );


function debug_to_console( $hook, $data ) {
    $output = json_encode( $data );

    echo "<script>console.log('RRZE DEBUG FILTERS for " . $hook . ": " . $output . " ');</script>";
}

function print_filters_for( $hook = '' ) {
    global $wp_filter;

    if ( empty( $hook ) || !isset( $wp_filter[$hook] ) ){
        debug_to_console( $hook, '$hook is empty or not set' );
        return;
    }

    $data = $wp_filter[$hook];
    debug_to_console( $hook, $data );
}

function loaded() {

    print_filters_for( 'restrict_manage_posts' );

    // print_filters_for( 'manage_faq_posts_custom_column' );
    
    // print_filters_for( 'the_content' );
}
