<?php 
/*
Plugin Name: Woocommerce Book preview
Plugin URI: https://wbps.devlloplugins.com
Description: Use this plugin to show a preview of your book content. This plugin integrates seamlessly into the standard Woocommerce experience, enabling customers to preview what they are buying before purchasing to avoid unnecessary disappointment.
Version: 0.1
Author: Devllo
Author URI: https://devlloplugins.com/
Text Domain: wbps
*/

// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

// Let's Initialize Everything
if ( file_exists( plugin_dir_path( __FILE__ ) . 'core-init.php' ) ) {
require_once( plugin_dir_path( __FILE__ ) . 'core-init.php' );
}



register_activation_hook(   __FILE__, array( 'WBPS_CLEANUP_NEW_CONTENT', 'on_activation' ) );
register_deactivation_hook( __FILE__, array( 'WBPS_CLEANUP_NEW_CONTENT', 'on_deactivation' ) );

add_action( 'plugins_loaded', array( 'WBPS_CLEANUP_NEW_CONTENT', 'init' ) );
class WBPS_CLEANUP_NEW_CONTENT
{
    protected static $instance;

    public static function init()
    {
        is_null( self::$instance ) AND self::$instance = new self;
        return self::$instance;
    }

    public static function on_activation()
    {
    if ( ! current_user_can( 'activate_plugins' ) )
            return;
        $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
        check_admin_referer( "activate-plugin_{$plugin}" );
        
    }

    public static function on_deactivation()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;
        $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
        check_admin_referer( "deactivate-plugin_{$plugin}" );

    }


    public function __construct()
    {
        # INIT the plugin: Hook your callbacks
    }
    
}