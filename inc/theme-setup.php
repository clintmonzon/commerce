<?php

/* 
 * theme setup
 */

if ( ! function_exists( 'xtocky_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 * Create your own function to override in a child theme.
 *
 */
function xtocky_theme_setup() {
	load_theme_textdomain( 'xtocky', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
        
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'xtocky' ),
		'primary_login' => esc_html__( 'Primary Login Menu', 'xtocky' ),
		'top_menu' => esc_html__( 'Top Menu', 'xtocky' ),
		'footer'  => esc_html__( 'Footer Links Menu', 'xtocky' ),
                'category' => esc_html__('Vertical menu', 'xtocky'),
                'secondary' => esc_html__('Scondary menu style6', 'xtocky')
	) );
	add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );
	add_theme_support( 'post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat',) );
        /*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css') );        
         // Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'xtocky_custom_background_args', array(
		'default-color' => '',
		'default-image' => '',
	) ) );        
        // Screen reader text
        add_theme_support( 'screen-reader-text' );
        
        // woocommerce support
        add_theme_support( 'woocommerce');
        if(defined('WOOCOMMERCE_VERSION')){
                if(version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0){
                        add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
                } else {
                        define( 'WOOCOMMERCE_USE_CSS', false );
                }
        }
        
        /*Thumbnail size*/
        global $xtocky_image_size;
        $xtocky_image_size = array(
            'xtocky-image-full-width' => array('width' => 1170, 'height' => 780 ),
            'xtocky-image-sidebar' => array('width' => 870, 'height' => 580 ),
            'xtocky-medium-image' => array('width' => 400, 'height' => 267 ),
            'xtocky-2cols-image' => array('width' => 570, 'height' => 315),            
            'xtocky-3cols-image' => array('width' => 370, 'height' => 247),
            'xtocky-4cols-image' => array('width' => 255, 'height' => 147),
            
            'xtocky-masonry1' => array('width' => 586, 'height' => 225),
            'xtocky-masonry2' => array('width' => 586, 'height' => 306),
            'xtocky-masonry3' => array('width' => 586, 'height' => 608),
            'xtocky-masonry4' => array('width' => 586, 'height' => 391),
            'xtocky-masonry5' => array('width' => 586, 'height' => 288),
            
            'xtocky-s340' => array('width' => 340, 'height' => 300),
        );
	
}
endif; // pikowork_theme_setup
add_action( 'after_setup_theme', 'xtocky_theme_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet. *
 * Priority 0 to make it available to lower priority callbacks. *
 * @global int $content_width
 */
if (!function_exists('xtocky_content_width')) {
    function xtocky_content_width() {
            $GLOBALS['content_width'] = apply_filters( 'xtocky_content_width', 840 );
    }
    add_action( 'after_setup_theme', 'xtocky_content_width', 0 );
}

if (!function_exists('xtocky_theme_activation')) {
    function xtocky_theme_activation () {        
        /**
        * redirect when theme setup if not installed required plugin
        * set frontpage to display_posts
        */
//        update_option('show_on_front', 'posts');

        // flush rewrite rules
        flush_rewrite_rules();

        do_action('xtocky_theme_activation');

        if(class_exists('TGM_Plugin_Activation')){
            $tgmpa = TGM_Plugin_Activation::$instance;
            $is_redirect_require_install = false;
            foreach($tgmpa->plugins as $p){
                $path =  ABSPATH . 'wp-content/plugins/'.$p['slug'];
                if(!is_dir($path)){
                    $is_redirect_require_install = true;
                    break;
                }
            }
            if($is_redirect_require_install)
                header( 'Location: '.admin_url().'themes.php?page=tgmpa-install-plugins' ) ;
        }
    }
   
    add_action('after_switch_theme', 'xtocky_theme_activation');
}
