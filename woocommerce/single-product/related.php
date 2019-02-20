<?php
/**
 * Related Products || edit carousel
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$full_width = xtocky_get_option_data( 'main-width-content', 'container' );
$has_sidebar =  get_post_meta(get_the_ID(), 'xtocky_page_sidebar',true);
if (!isset($has_sidebar) || $has_sidebar == '') {
    $has_sidebar = xtocky_get_option_data( 'optn_product_single_sidebar_pos', 'fullwidth' );
} 
$slide =  '4';
if($full_width == 'container' && $has_sidebar != 'fullwidth'){
    $slide = '3';
}

if ( $related_products ) : ?>

	<section class="related products mt60 mt50-sm mt40-sm mb10 clearfix sip w-1380">

            <h2 class="pa_ba h-line"><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h2>
                        <div class="piko-carousel" data-slick='{"slidesToShow": <?php echo esc_attr($slide); ?>,"slidesToScroll": 1,"responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}},{"breakpoint": 768,"settings":{"slidesToShow": 2}},{"breakpoint": 480,"settings":{"slidesToShow": 1}}]}'>
			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>
                        </div>

	</section>

<?php endif;

wp_reset_postdata();
