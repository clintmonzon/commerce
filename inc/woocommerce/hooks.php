<?php

/* 
 * woocommerce hooks
 */
// add actions of WooCommcerce

add_action( 'xtocky_after_shop_loop_item_price_deals', 'xtocky_wc_template_loop_price_deals', 11 ); // vc_shortcode


// Remove default actions of WooCommcerce
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10); //archive & single page
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10); //archive & single page
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 ); // content-product.php
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); // content-product.php

//archive product hook
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 ); // archive-product.php
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); // archive-product.php
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 ); // archive-product.php
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );// loop unwanted link remove
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 ); //loop unwanted link remove

//content product
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); // content-product.php
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); // content-product.php

add_action( 'woocommerce_before_shop_loop_item_title', create_function("","echo '<div class=\"product-top\">';"),6);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 7 );
add_action( 'woocommerce_before_shop_loop_item_title', 'xtocky_woocommerce_add_badge_new_in_list', 8 );
add_action( 'woocommerce_before_shop_loop_item_title', 'xtocky_woocommerce_add_badge_out_of_stock', 9 );
add_action( 'woocommerce_before_shop_loop_item_title', 'xtocky_wc_template_loop_product_thumbnail', 10 ); // content-product.php
add_action( 'woocommerce_before_shop_loop_item_title', 'xtocky_wc_template_loop_product_coundown', 12 ); // content-product.php
add_action( 'woocommerce_before_shop_loop_item_title', create_function("","echo '</div>';"),15);


add_action( 'xtocky_after_shop_loop_item_title', 'xtocky_wc_template_loop_product_cat_rating', 10 ); // content-product.php
add_action( 'xtocky_after_shop_loop_item_title', create_function("","echo '<div class=\"product-meta-container\">';"),11); // add action 16 hooks change wooswatchs plugin loop
//add_action( 'xtocky_after_shop_loop_item_title', 'xtocky_wc_template_loop_product_title', 13 ); // content-product.php
add_action( 'xtocky_after_shop_loop_item_title', 'xtocky_wc_template_loop_product_price', 14 ); // content-product.php
add_action( 'xtocky_after_shop_loop_item_title', 'xtocky_wc_template_loop_product_button_action', 15 ); 
add_action( 'xtocky_after_shop_loop_item_title', create_function("","echo '</div>';"),16);

//vc deals product hook
add_action( 'xtocky_deal_before_shop_loop_item_title', create_function("","echo '<div class=\"product-top\">';"),6);
add_action( 'xtocky_deal_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 7 );
add_action( 'xtocky_deal_before_shop_loop_item_title', 'xtocky_woocommerce_add_badge_new_in_list', 8 );
add_action( 'xtocky_deal_before_shop_loop_item_title', 'xtocky_woocommerce_add_badge_out_of_stock', 9 );
add_action( 'xtocky_deal_before_shop_loop_item_title', 'xtocky_wc_template_loop_product_thumbnail', 10 );
add_action( 'xtocky_deal_before_shop_loop_item_title', 'xtocky_wc_template_loop_product_coundown', 12 );
add_action( 'xtocky_deal_before_shop_loop_item_title', create_function("","echo '</div>';"),15);

add_action( 'xtocky_deal_after_shop_loop_item_title', 'xtocky_wc_template_loop_product_cat_rating', 10 ); 
add_action( 'xtocky_deal_after_shop_loop_item_title', create_function("","echo '<div class=\"product-meta-container\">';"),11); 
add_action( 'xtocky_deal_after_shop_loop_item_title', 'xtocky_wc_template_loop_product_title', 13 ); 
add_action( 'xtocky_deal_after_shop_loop_item_title', 'xtocky_wc_template_loop_product_price', 14 ); 
add_action( 'xtocky_deal_after_shop_loop_item_title', 'xtocky_wc_template_loop_product_button_action', 15 ); 
add_action( 'xtocky_deal_after_shop_loop_item_title', create_function("","echo '</div>';"),16);





add_action( 'xtocky_woocommerce_toolbar', create_function("","echo '<div class=\"col-xs-8 col-sm-7 col-md-5\">';"),10);
add_action( 'xtocky_woocommerce_toolbar', create_function("","echo '<a href=\"javascript:void(0);\" class=\"filter-trigger\" title=\" ". esc_html__('Filter', 'xtocky')."\"><i class=\"fa fa-sliders\"></i></a>';"),11);
add_action( 'xtocky_woocommerce_toolbar', 'xtocky_woocommerce_add_gridlist_toggle_button', 19 );
add_action( 'xtocky_woocommerce_toolbar', 'xtocky_woocommerce_add_toolbar_per_page', 20 );
add_action( 'xtocky_woocommerce_toolbar', 'xtocky_woocommerce_add_toolbar_position', 40 );

add_action( 'xtocky_woocommerce_toolbar', create_function("","echo '</div>';"),60);
add_action( 'xtocky_woocommerce_toolbar', create_function("","echo '<div class=\"col-xs-4 col-sm-5 col-md-7\">';"),70);
add_action( 'xtocky_woocommerce_toolbar', 'xtocky_woocommerce_add_filter_attribute_on_toolbar', 80 );
add_action( 'xtocky_woocommerce_toolbar', 'woocommerce_result_count', 99 );
add_action( 'xtocky_woocommerce_toolbar', 'woocommerce_catalog_ordering', 90 );
add_action( 'xtocky_woocommerce_toolbar', create_function("","echo '</div>';"),100);



add_action( 'woocommerce_before_shop_loop', 'xtocky_woocommerce_add_toolbar' );

//single product content-single-product.php

add_action( 'woocommerce_before_single_product_summary', 'xtocky_wc_product_video', 21 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_action( 'woocommerce_single_product_summary', create_function("","echo '<div class=\"shear-brand\"><div class=\"item\">';"),5);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5,1 );
add_action( 'woocommerce_single_product_summary', create_function("","echo '</div>';"),15);
add_action( 'woocommerce_single_product_summary', 'xtocky_product_brand_image', 15,1 );
add_action( 'woocommerce_single_product_summary', create_function("","echo '</div>';"),15,2);

add_action( 'woocommerce_single_product_summary', create_function("","echo '<div class=\"btn-details-action\">';"),30);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 33 );
add_action( 'woocommerce_single_product_summary', 'xtocky_wc_template_loop_product_coundown', 34 );
add_action( 'woocommerce_single_product_summary', create_function("","echo '</div>';"),35);
add_action( 'woocommerce_single_product_summary', 'xtocky_wc_template_single_product_miscellaneous', 38 );

add_action( 'woocommerce_single_product_summary', 'xtocky_product_single_share', 42 );




add_action( 'woocommerce_after_single_product_summary', 'xtocky_woocommerce_add_single_product_images_gallery', 5 );

//product tab
add_action( 'woocommerce_product_tabs', 'xtocky_woocommerce_rename_tabs', 98 );
add_filter( 'woocommerce_product_tabs', 'xtocky_woocommerce_add_filter_product_tabs' );
add_filter( 'woocommerce_product_tabs', 'xtocky_woocommerce_add_filter_product_tab_accessories' );
add_filter( 'woocommerce_product_tabs', 'xtocky_woocommerce_add_filter_product_tab_video' );


// Remove hooks of YITH plugins
if ( class_exists( 'YITH_WCQV_Frontend' ) ) {
    remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend::get_instance(), 'yith_add_quick_view_button' ), 15 );   
}



/*-----------------QUICK VIEW Action------------------- */
add_action('xtocky_before_quick_view_product_summary','xtocky_wc_template_quick_view_product_thumbnail_carousel',20);