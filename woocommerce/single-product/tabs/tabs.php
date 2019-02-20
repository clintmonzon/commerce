<?php
/**
 * Single Product tabs || edited
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 * 
 * @customize
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$prefix = 'xtocky_';
$tab_layout =  get_post_meta(get_the_ID(), $prefix . 'single_tab_layout',true);
if (!isset($tab_layout) || $tab_layout == '') {
   $tab_layout = isset( $GLOBALS['xtocky']['optn_woo_single_tab_layout'] ) ? trim( $GLOBALS['xtocky']['optn_woo_single_tab_layout'] ) : '1';   
}
$woo_active_tab = isset( $GLOBALS['xtocky']['woo_active_tab'] ) ? trim( $GLOBALS['xtocky']['woo_active_tab'] ) : '1';

$tabs = apply_filters( 'woocommerce_product_tabs', array() );
$index = 0;
$index2 = 0;
$active = '';
$active_class = '';

$tab_class = 'nav-tabs border'; 
if($tab_layout === '2'){
  $tab_class = 'nav-tabs';  
}
if ( ! empty( $tabs ) ) : ?>
        <div class="mb60 mb50-sm mb40-xs"></div>
	<div class="tab-carousel-container w-1380 clearfix" role="tabpanel">
		<ul class="nav text-uppercase text-center <?php echo esc_attr($tab_class); ?>" role="tablist">
                    
			<?php foreach ( $tabs as $key => $tab ) :
                                $index++;
                                if($woo_active_tab != 0){
                                     $active = $index === 1 ? 'active' : '';
                                 }elseif(count($tabs) === 3 && $index === 3 || count($tabs) > 3){
                                     $active = $index === 3 ? 'active' : ''; 
                                }elseif(count($tabs) === 1 || count($tabs) === 2  ){
                                    $active = $index === 1 ? 'active' : '';
                                }                                
                                
                                ?>
                                <li class="<?php echo esc_attr( $active ); ?>" role="presentation">
                                    <a href="#tab-<?php echo esc_attr( $key ); ?>" aria-controls="tab-description" role="tab" data-toggle="tab"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?> </a>
                                </li>
			<?php endforeach; ?>
		</ul>
            <div class="tab-content">
		<?php foreach ( $tabs as $key => $tab ) : 
                    $index2++;                
                    if($woo_active_tab != 0){
                        $active_class = $index2 === 1 ? 'active' : '';
                    }elseif(count($tabs) === 3 && $index2 === 3  || count($tabs) > 3){
                         $active_class = $index2 === 3 ? 'active' : ''; 
                    }elseif(count($tabs) === 1 || count($tabs) === 2  ){
                        $active_class = $index2 === 1 ? 'active' : '';
                    }  
                    
                    ?>
                        <div role="tabpanel" class="tab-pane <?php echo esc_attr( $active_class ); ?>" id="tab-<?php echo esc_attr( $key ); ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ); ?>
			</div>
		<?php endforeach; ?>
            </div>
	</div>

<?php endif; ?>
