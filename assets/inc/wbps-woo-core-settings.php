<?php

add_filter( 'woocommerce_get_sections_products' , 'wbps_preview_add_settings_tab' );

function wbps_preview_add_settings_tab( $settings ){
     $settings['wbps_settings_woo_book_preview'] = __( 'Book Preview','textdomain' );
     return $settings;
}

add_filter( 'woocommerce_get_settings_products' , 'wbps_woo_get_settings' , 10, 2 );

function wbps_woo_get_settings( $settings, $current_section ) {
         $custom_settings = array();
         if( 'wbps_settings_woo_book_preview' == $current_section ) {

              $custom_settings =  array(

					array(
					        'name' => __( 'Book Preview' ),
					        'type' => 'title',
					        'desc' => __( 'Adjust your Book Preview settings' ),
					        'id'   => 'woo_book_settings_preview' 
				       )

		);

	       return $custom_settings;
       } else {
        	return $settings;
       }

}

add_filter( 'woocommerce_get_settings_products', 'wbps_preview_front_settings_all_settings', 10, 2 );
function wbps_preview_front_settings_all_settings( $settings, $current_section ) {
	/**
	 * Check the current section is what we want
	 **/
	if ( $current_section == 'wbps_settings_woo_book_preview' ) {
		$settings_slider = array();
		// Add Title to the Settings
		$settings_slider[] = array( 
            'name' => __( 'Book Preview Settings', 'text-domain' ), 
            'type' => 'title', 'desc' => __( 'The following options are used to configure The Woocommerce Book Preview', 'text-domain' ), 
            'id' => 'wbps_preview_front_settings' );

		// Add Preview Text option
		$settings_slider[] = array(
			'name'     => __( 'Button text', 'text-domain' ),
			'desc_tip' => __( 'This will add a title to your slider', 'text-domain' ),
			'id'       => 'wbps_preview_front_settings_title',
			'type'     => 'text',
            'placeholder' => 'Preview',
			'desc'     => __( 'Change the button text according to your preference!', 'text-domain' ),
		);
		
        //A

        $settings_slider[] = array(
			'name'     => __( 'Button Background Color', 'text-domain' ),
			'desc_tip' => __( 'This will add a title to your slider', 'text-domain' ),
			'id'       => 'wbps_preview_front_settings_background_color',
			'type'     => 'color',
            'placeholder' => '#fffff',
			'desc'     => __( 'Any title you want can be added to your slider with this option!', 'text-domain' ),
		);

        $settings_slider[] = array(
			'name'     => __( 'Button Text Color', 'text-domain' ),
			'desc_tip' => __( 'This will add a title to your slider', 'text-domain' ),
			'id'       => 'wbps_preview_front_settings_text_color',
			'type'     => 'color',
            'placeholder' => '#fffff',
			'desc'     => __( 'Any title you want can be added to your slider with this option!', 'text-domain' ),
		);

        $settings_slider[] = array(
			'name'     => __( 'Close button Background Color', 'text-domain' ),
			'desc_tip' => __( 'This will add a title to your slider', 'text-domain' ),
			'id'       => 'wbps_preview_close_settings_background_color',
			'type'     => 'color',
            'placeholder' => '#fffff',
			'desc'     => __( 'Any title you want can be added to your slider with this option!', 'text-domain' ),
		);

        $settings_slider[] = array(
			'name'     => __( 'Close button Text Color', 'text-domain' ),
			'desc_tip' => __( 'This will add a title to your slider', 'text-domain' ),
			'id'       => 'wbps_preview_close_settings_text_color',
			'type'     => 'color',
            'placeholder' => '#fffff',
			'desc'     => __( 'Any title you want can be added to your slider with this option!', 'text-domain' ),
		);

		$settings_slider[] = array( 'type' => 'sectionend', 'id' => 'wbps_preview_front_settings' );
		return $settings_slider;
	
	/**
	 * If not, return the standard settings
	 **/
	} else {
		return $settings;
	}
}

?>