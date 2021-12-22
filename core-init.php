<?php 
/*
*
*	***** Woocommerce Book preview *****
*
*	This file initializes all WBPS Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants
define('WBPS_CORE_INC',dirname( __FILE__ ).'/assets/inc/');
define('WBPS_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('WBPS_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));
/*
*
*  Register CSS
*
*/
function wbps_register_core_css(){
wp_enqueue_style('wbps-core', WBPS_CORE_CSS . 'wbps-core.css',null,time(),'all');
};
add_action( 'wp_enqueue_scripts', 'wbps_register_core_css' );    
/*
*
*  Register JS/Jquery Ready
*
*/
function wbps_register_core_js(){
// Register Core Plugin JS	
wp_enqueue_script('wbps-core', WBPS_CORE_JS . 'wbps-core.js','jquery',time(),true);
};
add_action( 'wp_enqueue_scripts', 'wbps_register_core_js' );    
/*
*
*  Includes
*
*/ 
// Load the Functions
if ( file_exists( WBPS_CORE_INC . 'wbps-core-functions.php' ) ) {
	require_once WBPS_CORE_INC . 'wbps-core-functions.php';
}     

// Load the Shortcodes
if ( file_exists( WBPS_CORE_INC . 'wbps-shortcodes.php' ) ) {
	require_once WBPS_CORE_INC . 'wbps-shortcodes.php';
}