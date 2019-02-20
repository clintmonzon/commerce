<?php
/**
 * Single Product Up-Sells || edit carousel
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
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
$has_sidebar =  get_post_meta(get_the_ID(),'xtocky_page_sidebar',true);
if (!isset($has_sidebar) || $has_sidebar == '') {
    $has_sidebar = xtocky_get_option_data( 'optn_product_single_sidebar_pos', 'fullwidth' );
}
$slide =  '4';
if($full_width == 'container' && $has_sidebar != 'fullwidth'){
    $slide = '3';
}

if ( $upsells ) : ?>

	<section class="up-sells upsells products w1380">

            <h2 class="divider"><?php esc_html_e( 'You may also like&hellip;', 'woocommerce' ) ?></h2>		
                        <div class="piko-carousel" data-slick='{"slidesToShow": <?php echo esc_attr($slide); ?>,"slidesToScroll": 1,"responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}},{"breakpoint": 768,"settings":{"slidesToShow": 2}},{"breakpoint": 480,"settings":{"slidesToShow": 1}}]}'>

			<?php foreach ( $upsells as $upsell ) : ?>

				<?php
				 	$post_object = get_post( $upsell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>
                        </div>
	</section>

<?php endif;

wp_reset_postdata();
