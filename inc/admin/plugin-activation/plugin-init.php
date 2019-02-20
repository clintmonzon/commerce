<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

add_action( 'tgmpa_register', 'xtocky_register_required_plugins' );
function xtocky_register_required_plugins() {
    
    
    
    $wishlist_plugin = $compare_plugin = $quickview_plugin = $regenerate_thumbnails = $instagram_by_snapppt = $Ajax_Product_Filter = $product_bundle = $openswatch = $cookienotice =  '';
    
    
    if(function_exists( 'WC' )){
        $wishlist_plugin = array(
                            'name'      => 'YITH WooCommerce Wishlist',
                            'slug'      => 'yith-woocommerce-wishlist',
                            'required'  => false,
                            'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/yith_wishlist.png'
                    );

        $compare_plugin = array(
                            'name'      => 'YITH WooCommerce Compare',
                            'slug'      => 'yith-woocommerce-compare',
                            'required'  => false,
                            'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/yith_woocommerce_compare.png'
                    );
        $quickview_plugin = array(
                            'name'      => 'YITH WooCommerce Quick View',
                            'slug'      => 'yith-woocommerce-quick-view',
                            'required'  => false,
                            'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/yith_woocommerce_quick_view.png'
                    );
        $regenerate_thumbnails = array(
                    'name'      => 'Regenerate Thumbnails',
                    'slug'      => 'regenerate-thumbnails',
                    'required'  => false,
                    'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/regenerate_thumbnails.png'
		);
        $instagram_by_snapppt = array(
                    'name'      => 'Instagram Shop',
                    'slug'      => 'shop-feed-for-instagram-by-snapppt',
                    'required'  => false,
                     'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/instagram-shop.png'
                );
        $Ajax_Product_Filter = array(
                    'name'      => 'YITH WooCommerce Ajax Product Filter',
                    'slug'     => 'yith-woocommerce-ajax-product-filter-premium',
                    'source'   => 'http://themepiko.com/resources/plugins/yith-woocommerce-ajax-product-filter-premium.zip',
                    'version'  => '3.2',
                    'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/yith_ajax_filter.png'
                );
        $product_bundle = array(
                    'name'     => 'WooCommerce Product Bundle',
                    'slug'     => 'wpa-woocommerce-product-bundle',
                    'source'   => 'http://themepiko.com/resources/plugins/wpa-woocommerce-product-bundle.zip',
                    'version'  => '1.0.1',
                    'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/product-bundle.png'
                );
        $openswatch = array(
                    'name'     => 'OpenWatch Color Swatch',
                    'slug'     => 'openswatch',
                    'source'   => 'http://themepiko.com/resources/plugins/openswatch.zip',
                    'version'  => '2.1.0',
                    'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/openwatch.png'
                );
        $cookienotice = array(
                        'name'      => 'Cookie Notice',
                        'slug'      => 'cookie-notice',
                        'required'  => false,
                        'details_url' => 'https://wordpress.org/plugins/cookie-notice/',
                        'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/cookie-notice.png'
                );
    }
       
    
	$plugins = array(
                // This is an example of how to include a plugin bundled with a theme.
                array(
                    'name'               => 'Pikoworks Core',
                    'slug'               => 'pikoworks_core',
                    'source'             => 'http://themepiko.com/resources/plugins/stock/pikoworks_core.zip',
                    'required'           => true,
                    'version'            => '1.0',
                    'force_deactivation' => false,
                    'external_url'       => '', 
                    'is_callable'        => '',
                    'image_url'          => XTOCKY_IMAGE . '/theme-options/plugin/theme-core.png'
		),                
		array(
                    'name'         => ' WPBakery Visual Composer',
                    'slug'         => 'js_composer',
                    'source'       => 'http://themepiko.com/resources/plugins/js_composer.zip',
                    'required'     => true,
                    'version'      => '5.4', 
                    'external_url' => '',
                    'image_url'    => XTOCKY_IMAGE . '/theme-options/plugin/visual_composer.png'
		),               
		array(
                    'name'         => 'Slider Revolution',
                    'slug'         => 'revslider',
                    'source'       => 'http://themepiko.com/resources/plugins/revslider.zip',
                    'required'     => false,
                    'version'      => '5.4',
                    'external_url' => '',
                    'image_url'    => XTOCKY_IMAGE . '/theme-options/plugin/revolution_slider.png'
		),
                array(
                    'name'         => 'Pikoworks Custom Post',
                    'slug'         => 'pikoworks_custom_post',
                    'source'       => 'http://themepiko.com/resources/plugins/stock/pikoworks_custom_post.zip',
                    'required'     => false,
                    'version'      => '1.0',
                    'external_url' => '',
                    'image_url'    => XTOCKY_IMAGE . '/theme-options/plugin/custom_post.png'
		),
		array(
                    'name'      => 'Contact Form 7',
                    'slug'      => 'contact-form-7',
                    'required'  => false,
                    'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/contact_form_7.png'
		),                               
                // This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
                    'name'      => 'WooCommerce',
                    'slug'      => 'woocommerce',
                    'required'  => false,
                    'version'   => '3.0',
                    'image_url'   => XTOCKY_IMAGE . '/theme-options/plugin/woocommerce.png'
		),
		               
                array(
                    'name'      => 'MailChimp',
                    'slug'      => 'mailchimp-for-wp',
                    'required'  => false,
                    'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/mailchimp-for-wp.png'
                ),
                array(
                    'name'      => 'Social Login',
                    'slug'      => 'accesspress-social-login-lite',
                    'required'  => false,
                    'image_url' => XTOCKY_IMAGE . '/theme-options/plugin/social_login.png'
                ),
                array(
                    'name'                     => 'Envato Toolkit',
                    'slug'                     => 'envato-wordpress-toolkit',
                    'source'                   => 'http://themepiko.com/resources/plugins/envato-wordpress-toolkit.zip',
                    'required'                 => false,
                    'version'                  => '1.7.3',
                    'image_url'                => XTOCKY_IMAGE . '/theme-options/plugin/envato_wordpress_toolkit.png'
                ),               
                $openswatch,
                $product_bundle,
                $Ajax_Product_Filter,
                $instagram_by_snapppt,
                $regenerate_thumbnails,
                $wishlist_plugin,
                $compare_plugin,
                $quickview_plugin,
                $cookienotice,
            
	);	
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		
	);

	tgmpa( $plugins, $config );
}
