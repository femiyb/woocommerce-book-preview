<?php 

// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

include plugin_dir_path( __FILE__ ) . 'wbps-woo-core-settings.php';
include plugin_dir_path( __FILE__ ) . 'wbps-core-admin.php';

// SET PRODUCT TYPES
add_action( 'woocommerce_product_data_tabs', 'add_wbps_preview_link_tab' );
add_action( 'woocommerce_product_data_panels' ,'show_wbps_access_link_tab_content' );

function add_wbps_preview_link_tab($tabs) {
	$tabs['wbps_woo'] = array(
		'label' => __('Book Preview','wbps'),
		'class'  => array('show_if_simple', 'show_if_variable','show_if_grouped','show_if_external' ),
		'target' => 'wbps_woo_options',
		'priority' => 65,
	);
	return $tabs;
}

function show_wbps_access_link_tab_content() {
	global $woocommerce, $post;

include plugin_dir_path( __FILE__ ) . 'wbps-woo-core-options.php';
    
}
//Save after Updating Product 
add_action('woocommerce_process_product_meta_simple', 'save_options');
add_action('woocommerce_process_product_meta_variable', 'save_options');
add_action('woocommerce_process_product_meta_grouped', 'save_options');
add_action('woocommerce_process_product_meta_external', 'save_options');
function save_options($product_id)
{
    $keys = array(
		'wbps-preview-text-content',
        'wbps_preview_content_author',
        'wbps_preview_year_publication'
    );

    foreach ($keys as $key) {
        if (isset($_POST[$key])) { // phpcs:ignore
            update_post_meta($product_id, $key, $_POST[$key]); // phpcs:ignore
        }
    }
}

function woocommerce_wbps_button_display()
{
global $post;
$product = wc_get_product($post->ID);
    $wbps_preview_woocommerce_button = $product->get_meta('wbps-preview-text-content','wbps_preview_content_author','wbps_preview_year_publication');

if ($wbps_preview_woocommerce_button) { ?>
            <input type="button" style="background-color:<?php echo get_option("wbps_preview_front_settings_background_color")?>; 
            color:<?php echo get_option("wbps_preview_front_settings_text_color")?>;" id="wbps_popup_btn" class="wbps_popup_btn" name="wbps_open" onclick="popupOpen();"  
            value="<?php echo get_option("wbps_preview_front_settings_title")?>"><span><i id="wbps_fa" class="fa fa-eye wbpsicon" style="
            color:<?php echo get_option("wbps_preview_front_settings_text_color")?>"></i></span><br>
    
<?php
$wbps_preview_woocommerce_content = $product->get_meta('wbps-preview-text-content');
$wbps_preview_woo_author = $product->get_meta('wbps_preview_content_author');
$wbps_preview_woo_year = $product->get_meta('wbps_preview_year_publication');
//call preview code and add preferred template.
include plugin_dir_path( __FILE__ ) . 'wbps-core-simple-template.php';

}
}

add_action('woocommerce_before_add_to_cart_form', 'woocommerce_wbps_button_display');


?>