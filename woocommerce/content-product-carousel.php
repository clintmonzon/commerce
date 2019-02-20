<?php
/**
 * @package xtocky
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<article <?php post_class(  ); ?>>
    
	<?php	
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10//remove
         * @hooked woocommerce_template_loop_product_title - 10 //add
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
	

	/**
	 * xtocky_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5//remove
	 * @hooked woocommerce_template_loop_price - 10//remove
	 */
	do_action( 'xtocky_after_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
        
	?>

</article>
