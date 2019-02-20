<?php
/**
 * Support openswatch.
 * @author themepiko
 */
if ( class_exists( 'ColorSwatch' ) && class_exists( 'WooCommerce' ) ) {
	/**
	 * Change default template folder of openswatch.
	 */
	remove_filter( 'wc_get_template', 'openswatch_get_template' );
	function xtocky_openswatch_template( $located, $template_name, $args, $template_path, $default_path ) {
		if ( $template_name == 'single-product/add-to-cart/variable.php' ) {
			global $post;

			$tmp = get_post_meta( $post->ID, '_allow_openswatch', true );
			if ( $tmp != 0 ) {				
                                return XTOCKY_INC_DIR . '/woocommerce/openswatch/templates/variable.php';
			}
		}
		return $located;
	}
	add_filter( 'wc_get_template','xtocky_openswatch_template', 10, 5 );

	/**
	 * Change image variable for openswatch.
	 */
	function xtocky_openswatch_images( $images, $productId, $attachment_ids ) {
		//  attachment
		$attachment_ids   = array_filter( $attachment_ids );
		$attachment_count = count( $attachment_ids );
                $prefix = 'xtocky_';
                $thumbnail =  get_post_meta(get_the_ID(), $prefix . 'single_products_thumbnail',true);
                if (!isset($thumbnail) || $thumbnail == '-1' || $thumbnail == '') {
                    $thumbnail = xtocky_get_option_data( 'optn_woo_single_products_thumbnail', 'bottom');
                }
                
		if ( $attachment_count > 0 ) {
                    
			// Get page variable option
                        $options = get_post_meta( get_the_ID(), '_custom_wc_options', true );
                        // Get product single thumbnail
                        $slick_attr = '';
                        $slick_class = array();
                        if ( $thumbnail != 'sticky') {
                                $slick_attr = 'data-slick=\'{"slidesToShow": 1, "slidesToScroll": 1,"arrows": false, "asNavFor": ".piko-nav", "fade":true}\'';
                                $slick_class[] = 'piko-thumb';
                                $slick_class[] = 'piko-carousel';	
                        }

		?>
			<figure class="woocommerce-product-gallery__wrapper <?php echo esc_attr( implode( ' ', $slick_class ) ); ?>"  <?php echo wp_kses_post( $slick_attr ); ?>>
				<?php
					if ( $attachment_ids ) {
						foreach ( $attachment_ids as $attachment_id ) {
							$image_link = wp_get_attachment_url( $attachment_id );
							if ( ! $image_link )
								continue;

							$image_title   = esc_attr( get_the_title( $attachment_id ) );
							$image_caption = esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );
							$attr          = array( 'alt' => $image_title );

							$image = wp_get_attachment_image(
								$attachment_id,
								apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ), 0,
								$attr
							);

							echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="woocommerce-product-gallery__image piko-image-zoom oh"><a href="%s" title="%s"  data-thumb="' . $image_link . '">%s</a></div>', $image_link, $image_caption, $image ), $attachment_id, $productId );
						}
					}
				?>
			</figure>

			<?php
                        
                        
                        if ( $attachment_ids && $thumbnail !='sticky') {
                                ?>
                                <div class="piko-nav piko-carousel oh" data-slick='{"slidesToShow": 4,"slidesToScroll": 1,"arrows": false, "focusOnSelect": true,"asNavFor": ".piko-thumb", <?php if ( $thumbnail == 'left' || $thumbnail == 'right' ) echo '"vertical": true,"verticalSwiping": true,'; ?> "responsive":[{"breakpoint": 991,"settings":{"slidesToShow": 3}},{"breakpoint": 576,"settings":{"slidesToShow": 4, "vertical":false,"verticalSwiping": false}}]}'>
                                        <?php
                                                foreach ( $attachment_ids as $attachment_id ) {
                                                        $image_link = wp_get_attachment_url( $attachment_id );

                                                        if ( ! $image_link )
                                                                continue;

                                                        $image_title 	= esc_attr( get_the_title( $attachment_id ) );
                                                        $image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

                                                        $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $attr = array(
                                                                'title'	=> $image_title,
                                                                'alt'	=> $image_title
                                                                ) );

                                                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div>%s</div>', $image ), $attachment_id, $productId );
                                                }
                                        ?>
                                </div>
                                <?php
                        }			
		}
	}
	add_filter( 'openswatch_image_swatch_html', 'xtocky_openswatch_images', 20, 5 );
}
//remove register widgets
remove_action( 'widgets_init', 'openswatch_register_widgets' );