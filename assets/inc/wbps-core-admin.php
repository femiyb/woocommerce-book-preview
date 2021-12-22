<?php

function wbps_register_book_preview_page() {
        $page_title = 'Preview License Key';   
        $menu_title = 'Book Preview';   
        $capability = 'manage_options';   
        $menu_slug  = 'preview_book_license';   
        $function   = '';   
        $icon_url   = 'dashicons-book';   
        $position   = 25;
        add_menu_page($page_title, $menu_title, $capability,
        $menu_slug, $function ,$icon_url, $position
        );
        add_submenu_page( $menu_slug, 'License Key', 'License Key', $capability, $menu_slug, 'wbps_license_page' );
        add_submenu_page( $menu_slug, 
        'Preview Settings', 'Preview Settings', 'manage_options', 'admin.php?page=wc-settings&tab=products&section=wbps_settings_woo_book_preview', '');
}
add_action( 'admin_menu', 'wbps_register_book_preview_page' );

function wbps_license_page(){
        echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
        <h2>License Key</h2></div>';
}
