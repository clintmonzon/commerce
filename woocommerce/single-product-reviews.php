<?php
/**
 * Display single product reviews (comments) || edit
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 *
 * 
 * @coustomize
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;

if ( ! comments_open() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

$prefix = 'xtocky_';
$thumbnail =  get_post_meta(get_the_ID(), $prefix . 'single_products_thumbnail',true);
if (!isset($thumbnail) || $thumbnail == '-1' || $thumbnail == '') {
    $thumbnail = isset( $GLOBALS['xtocky']['optn_woo_single_products_thumbnail'] ) ? trim( $GLOBALS['xtocky']['optn_woo_single_products_thumbnail'] ) : '1';
}


?>
<div id="reviews" class="product-comments-section">
    <div class="row">
        <?php if($thumbnail != '3'): ?>
        
        <div id="comments" class="comments col-md-6">
		<?php if ( have_comments() ) : ?>
                        <h3 class="comments-section-title">
                            
                            <?php				
				if ( 1 === $review_count ) {
					/* translators: %s: post title */
					printf( esc_html( _x( 'One REVIEW FOR &ldquo;%s&rdquo;', 'comments title', 'xtocky' )), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						esc_html( _nx(
							'%1$s REVIEW FOR &ldquo;%2$s&rdquo;',
							'%1$s REVIEW FOR &ldquo;%2$s&rdquo;',
							$review_count,
							'comments title',
							'xtocky'
						)),
						number_format_i18n( $review_count ),
						get_the_title()
					);
				}
			?>                                                 
                                <?php if (get_option( 'woocommerce_enable_review_rating' ) === 'yes' && $rating_count > 0 ) : ?> 
                                <div class="ratings-container">   
                                    <div class="star-rating" title="<?php printf( esc_html__( 'Rated %s out of 5', 'xtocky' ), $average ); ?>">
                                            <span style="width:<?php echo ( ( esc_html($average) / 5 ) * 100 ); ?>%">
                                                    <strong class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( esc_html__( 'out of %s5%s', 'xtocky' ), '<span>', '</span>' ); ?>
                                                    <?php printf( esc_html(_n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'xtocky' )), '<span class="rating">' . esc_html($rating_count) . '</span>' ); ?>
                                            </span>
                                    </div>
                                </div>
                                <?php endif; ?>
                            
                        </h3>
			<ol class="commentlist media-list">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

		<?php endif; ?>
	</div>
        <?php endif; ?>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper" class="col-md-6">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();
                                        $req = get_option( 'require_name_email' );
                                        $aria_req = ( $req ? " aria-required='true'" : '' );

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'woocommerce' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
						'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<div class="form-group label-overlay">
                    <input type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' required>
                    <label class="input-desc"><span class="icon-user"></span>Enter your username ' .
                ( $req ? '<span class="input-required">*</span>' : '' ) .'</label>
                </div>',
                                                    
							'email'  => '<div class="form-group label-overlay">
                    <input id="email" name="email" type="text" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" ' . $aria_req . ' required>
                    <label class="input-desc"><span class="icon-envalop2"></span>Enter your e-mail ' .
                    ( $req ? '<span class="input-required">*</span>' : '' ) .' </label>
                </div>',
						),
						'label_submit'  => __( 'Submit Review', 'woocommerce' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'woocommerce' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'woocommerce' ) .'</label><select name="rating" id="rating">
							<option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
							<option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
							<option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
							<option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<div class="form-group textarea-group mb30 label-overlay">
                                    <textarea id="comment" name="comment" cols="20" rows="5" class="form-control min-height" aria-required="true" required></textarea>
                                    <label class="input-desc"><span class="icon-pencil"></span>' . esc_html__('Your Review', 'xtocky') . '<span class="input-required">*</span></label>
                                </div>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>
                
        <?php if($thumbnail === '3'): ?>        
        <div id="comments" class="comments col-xs-12 pb130 pb100-sm pb80-xs">
		<?php if ( have_comments() ) : ?>
                        <h2 class="comments-section-title text-uppercase text-center">
                            
                            <?php				
				if ( 1 === $review_count ) {
					/* translators: %s: post title */
					printf( esc_html( _x( 'One REVIEW FOR &ldquo;%s&rdquo;', 'comments title', 'xtocky' )), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						esc_html( _nx(
							'%1$s REVIEW FOR &ldquo;%2$s&rdquo;',
							'%1$s REVIEW FOR &ldquo;%2$s&rdquo;',
							$review_count,
							'comments title',
							'xtocky'
						)),
						number_format_i18n( $review_count ),
						get_the_title()
					);
				}
			?>  
                        </h2>
                        <?php if (get_option( 'woocommerce_enable_review_rating' ) === 'yes' && $rating_count > 0 ) : ?> 
                        <div class="text-center mb55 mb40-sm mb30-xs ">   
                            <div class="star-rating" title="<?php printf( esc_html__( 'Rated %s out of 5', 'xtocky' ), $average ); ?>">
                                    <span style="width:<?php echo ( ( esc_html($average) / 5 ) * 100 ); ?>%">
                                            <strong class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( esc_html__( 'out of %s5%s', 'xtocky' ), '<span>', '</span>' ); ?>
                                            <?php printf( esc_html(_n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'xtocky' )), '<span class="rating">' . esc_html($rating_count) . '</span>' ); ?>
                                    </span>
                            </div>
                        </div>
                        <?php endif; ?>
			<ol class="commentlist media-list">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

		<?php endif; ?>
	</div>
        <?php endif; ?>        

	<div class="clear"></div>
    </div> <!--end of row-->
</div>
