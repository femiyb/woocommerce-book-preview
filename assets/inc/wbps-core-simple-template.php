<?php
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants ?>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@300;400&family=Roboto&display=swap" rel="stylesheet">
</head>
<!-- wbps_preview_overlay -->
<div id="wbps_show_current_preview" style="display: none;">
<div class="wbps_preview_overlay" id="wbps_preview_overlay" onclick="popupClose();"></div>

<!-- wbps_preview_popup -->
<div class="wbps_title_flex_container" id="wbps_overlay_close" style="background-color:<?php echo get_option('wbps_preview_close_settings_background_color')?>";>
        <button id="wbps_close_button_position" style="background-color:<?php echo get_option('wbps_preview_close_settings_background_color')?>; 
        color:<?php echo get_option("wbps_preview_close_settings_text_color")?>;"  onclick="popupClose(); ">Close <i class="fa fa-close" aria-hidden="true"></i></button>
</div>
<div class="wbps_wide_preview_inner" id="wbps_wide_preview_inner" >

 <div class="wbps_preview_popup" id="wbps_preview_popup">

<div id="wbps_preview_popup_inner" class="wbps_preview_popup-inner">
    <div id="wbps-no-click"> <?php echo ($wbps_preview_woocommerce_content) ?></div>
    <div>
        <div id="wbps_preview_popup_footer_text">
            <h4 id="wbps_sample_buy">Enjoying this sample?</h4>
            <p>Buy the book to continue reading</p>
        </div>
        <div class="wbps_bottom_preview_inner" id="wbps_bottom_preview_inner">

<div class="wbps_mask">

    <div class="wbps_colleft">
        <div class="wbps_col1">
        <p class="wbps_preview_author_settings"> <b><?php echo ($wbps_preview_woo_author) ?></b> </p>
        <p class="wbps_preview_title_settings"> <?php
        $wbps_string = $product->get_title();      
        // Trimming length of string
        $new_wbps_string =  mb_strimwidth($wbps_string, 0, 110, "...");

        echo $new_wbps_string; ?> </p>
        <span class="wbps_preview_ratings_settings">
        <?php $average = $product->get_average_rating();
        echo '<div class="star-rating"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"></span></div>';?> 
        </span>
        <?php
        if ($product->is_type( 'simple' )) {
        $wbps_price_p = $product->get_price(); echo get_woocommerce_currency_symbol(); echo $wbps_price_p;
    }
    elseif($product->is_type('variable')){
        $wb_regular_price     =  $product->get_variation_regular_price( 'min', true );
        $wb_regular_max_price     =  $product->get_variation_regular_price( 'max', true );
        $wb_sale_min_price     =  $product->get_variation_sale_price( 'min', true );
        $wb_sale_max_price  =  $product->get_variation_sale_price( 'max', true ); 
        if ($product -> is_on_sale('variable')){
            echo get_woocommerce_currency_symbol(); echo $wb_sale_min_price;?> - <?php echo $wb_sale_max_price;
        } else{
            echo get_woocommerce_currency_symbol(); echo $wb_regular_price;?> - <?php echo $wb_regular_max_price;
        }
    }else{
        //nothing
    }
        ?>

        </div>
        <div class="wbps_col2">
        <?php echo $product->get_image(); ?>
        </div> 
    </div>
    </div> 
    
    <div id="wbps_pre_add_to_cart">
        <?php
        global $product;
        $product = wc_get_product(get_the_ID());
        if ( $product->is_type( 'simple' ) ) {
            ?><a href= "<?php echo $product->add_to_cart_url() ?>"><button id='wbps_simple_add_to_cart'>add to cart</button></a><?php
            
        }else{?>
            <button id="wbps_close_sticky_position" onclick="popupClose(); ">View Options</button>
            <?php
        };
?>
    </div>
    <div class="wbps_preview_copyright">Copyright ©<?php echo($wbps_preview_woo_year)?> All rights reserved. No portion of this book may be reproduced in any form without permission from the publisher</div>
</div>
</div>
    </div>
</div>
</div>
<div class="wbps_small_preview_inner" id="wbps_small_preview_inner">

<div class="wbps_mask">

    <div class="wbps_colleft">
        <div class="wbps_col1">
        <p class="wbps_preview_author_settings"> <b><?php echo ($wbps_preview_woo_author) ?></b> </p>
        <p class="wbps_preview_title_settings"> <?php
        $wbps_string = $product->get_title();      
        // Trimming length of string
        $new_wbps_string =  mb_strimwidth($wbps_string, 0, 110, "...");

        echo $new_wbps_string; ?> </p>
        <span class="wbps_preview_ratings_settings">
        <?php $average = $product->get_average_rating();
        echo '<div class="star-rating"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"></span></div>';?> 
        </span>
        <?php
        if ($product->is_type( 'simple' )) {
        $wbps_price_p = $product->get_price(); echo get_woocommerce_currency_symbol(); echo $wbps_price_p;
    }
    elseif($product->is_type('variable')){
        $wb_regular_price     =  $product->get_variation_regular_price( 'min', true );
        $wb_regular_max_price     =  $product->get_variation_regular_price( 'max', true );
        $wb_sale_min_price     =  $product->get_variation_sale_price( 'min', true );
        $wb_sale_max_price  =  $product->get_variation_sale_price( 'max', true ); 
        if ($product -> is_on_sale('variable')){
            echo get_woocommerce_currency_symbol(); echo $wb_sale_min_price;?> - <?php echo $wb_sale_max_price;
        } else{
            echo get_woocommerce_currency_symbol(); echo $wb_regular_price;?> - <?php echo $wb_regular_max_price;
        }
    }else{
        //nothing
    }
        ?>

        </div>
        <div class="wbps_col2">
        <?php echo $product->get_image(); ?>
        </div> 
    </div>
    </div> 
    
    <div id="wbps_pre_add_to_cart">
        <?php
        global $product;
        $product = wc_get_product(get_the_ID());
        if ( $product->is_type( 'simple' ) ) {
            ?><a href= "<?php echo $product->add_to_cart_url() ?>"><button id='wbps_simple_add_to_cart'>add to cart</button></a><?php
            
        }else{?>
            <button id="wbps_close_sticky_position" onclick="popupClose(); ">View Options</button>
            <?php
        };
?>
    </div>
    <div class="wbps_preview_copyright">Copyright ©<?php echo($wbps_preview_woo_year)?> All rights reserved. No portion of this book may be reproduced in any form without permission from the publisher</div>
</div>
</div>
    </div>