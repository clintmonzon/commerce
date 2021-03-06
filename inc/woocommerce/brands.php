<?php  
if ( ! defined('ABSPATH')) exit('No direct script access allowed');

// ! Product brand 

add_action( 'admin_enqueue_scripts', 'xtocky_brand_admin_scripts');
if(!function_exists('xtocky_brand_admin_scripts')) {
    function xtocky_brand_admin_scripts() {
        $screen = get_current_screen();
        if ( in_array( $screen->id, array('edit-brand') ) )
		  wp_enqueue_media();
    }
}

if(!function_exists('xtocky_product_brand_image')) {
    function xtocky_product_brand_image() {
        global $post;
        $terms = wp_get_post_terms( $post->ID, 'brand' );
        if(! is_wp_error( $terms ) && count($terms)>0 && xtocky_get_option_data('show_brand_image') ) {
            ?>
            <div class="brand-img">
                <?php
                foreach($terms as $brand) {
                    $thumbnail_id 	= absint( get_woocommerce_term_meta( $brand->term_id, 'thumbnail_id', true ) );
                    ?>
                    <a href="<?php echo get_term_link($brand); ?>" title="<?php echo  $brand->name. esc_html__(' All Product', 'xtocky'); ?>">                        
                        <?php 
                        if ($thumbnail_id && xtocky_get_option_data('show_brand_image') ) :
                            echo wp_get_attachment_image( $thumbnail_id, 'thumbnail' );
                        endif; ?>
                    </a>                    
                    <?php
                }
                ?>
            </div>
            <?php
        }
    }
}

if(!function_exists('xtocky_product_brand_image_single')) {
    function xtocky_product_brand_image_single() {
        global $post;
        $terms = wp_get_post_terms( $post->ID, 'brand' );
        if(! is_wp_error( $terms ) && count($terms)>0 && xtocky_get_option_data('show_brand_image_single') ) {
            ?>
            <section class="pb-widgets text-center">                
                <?php
                foreach($terms as $brand) {
                    $thumbnail_id 	= absint( get_woocommerce_term_meta( $brand->term_id, 'thumbnail_id', true ) );
                    ?>
                    <?php  if ($thumbnail_id && xtocky_get_option_data('show_brand_title') ) : ?>
                    <div class="brand-name"><?php echo $brand->name;?></div>
                    <?php endif; ?>                    
                    <a class="db mt20 mb20" href="<?php echo get_term_link($brand); ?>" title="<?php echo  $brand->name. esc_html__(' All Product', 'xtocky'); ?>">                                               
                        <?php 
                        if ($thumbnail_id ) :
                            echo wp_get_attachment_image( $thumbnail_id, 'full' );
                        else:
                            echo $brand->name;
                        endif; ?>
                    </a>
                    <?php if ( xtocky_get_option_data('show_brand_desc') && $brand->description != '' ) : ?>
                    <p class="brand-desc"><?php echo $brand->description;?></p>
                    <?php endif; ?>
                    <a href="<?php echo get_term_link($brand); ?>"  class="brand-prduct db"><?php esc_html_e('View all products', 'xtocky'); ?></a>
                    <?php
                }
                ?>
            </section>
            <?php
        }
    }
}


add_action( 'brand_add_form_fields', 'xtocky_brand_fileds');

if(!function_exists('xtocky_brand_fileds')) {
	function xtocky_brand_fileds() {
		global $woocommerce;
		?>
		<div class="form-field">
			<label><?php esc_html_e( 'Thumbnail', 'xtocky' ); ?></label>
			<div id="brand_thumbnail" style="float:left;margin-right:10px;"><img src="<?php echo wc_placeholder_img_src(); ?>" width="60px" height="60px" /></div>
			<div style="line-height:60px;">
				<input type="hidden" id="brand_thumbnail_id" name="brand_thumbnail_id" />
				<button type="submit" class="upload_image_button button"><?php _e( 'Upload/Add image', 'xtocky' ); ?></button>
				<button type="submit" class="remove_image_button button"><?php _e( 'Remove image', 'xtocky' ); ?></button>
			</div>
			<script type="text/javascript">

				 // Only show the "remove image" button when needed
				 if ( ! jQuery('#brand_thumbnail_id').val() )
					 jQuery('.remove_image_button').hide();

				// Uploading files
				var file_frame;

				jQuery(document).on( 'click', '.upload_image_button', function( event ){

					event.preventDefault();

					// If the media frame already exists, reopen it.
					if ( file_frame ) {
						file_frame.open();
						return;
					}

					// Create the media frame.
					file_frame = wp.media.frames.downloadable_file = wp.media({
						title: '<?php esc_html_e( 'Choose an image', 'xtocky' ); ?>',
						button: {
							text: '<?php esc_html_e( 'Use image', 'xtocky' ); ?>',
						},
						multiple: false
					});

					// When an image is selected, run a callback.
					file_frame.on( 'select', function() {
						attachment = file_frame.state().get('selection').first().toJSON();

						jQuery('#brand_thumbnail_id').val( attachment.id );
						jQuery('#brand_thumbnail img').attr('src', attachment.url );
						jQuery('.remove_image_button').show();
					});

					// Finally, open the modal.
					file_frame.open();
				});

				jQuery(document).on( 'click', '.remove_image_button', function( event ){
					jQuery('#brand_thumbnail img').attr('src', '<?php echo wc_placeholder_img_src(); ?>');
					jQuery('#brand_thumbnail_id').val('');
					jQuery('.remove_image_button').hide();
					return false;
				});

			</script>
			<div class="clear"></div>
		</div>
		<?php
	}
}


add_action( 'brand_edit_form_fields', 'xtocky_edit_brand_fields', 10,2 );
if(!function_exists('xtocky_edit_brand_fields')) {
    function xtocky_edit_brand_fields($term, $taxonomy ) {
    	$thumbnail_id 	= absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );
    	if ($thumbnail_id) :
    		$image = wp_get_attachment_thumb_url( $thumbnail_id );
    	else :
    		$image = wc_placeholder_img_src();
    	endif;
    	?>
    	<tr class="form-field">
    		<th scope="row" valign="top"><label><?php esc_html_e( 'Thumbnail', 'xtocky' ); ?></label></th>
    		<td>
    			<div id="brand_thumbnail" style="float:left;margin-right:10px;"><img src="<?php echo $image; ?>" width="60px" height="60px" /></div>
    			<div style="line-height:60px;">
    				<input type="hidden" id="brand_thumbnail_id" name="brand_thumbnail_id" value="<?php echo $thumbnail_id; ?>" />
    				<button type="submit" class="upload_image_button button"><?php _e( 'Upload/Add image', 'xtocky' ); ?></button>
    				<button type="submit" class="remove_image_button button"><?php _e( 'Remove image', 'xtocky' ); ?></button>
    			</div>
    			<script type="text/javascript">

    				// Uploading files
    				var file_frame;

    				jQuery(document).on( 'click', '.upload_image_button', function( event ){

    					event.preventDefault();

    					// If the media frame already exists, reopen it.
    					if ( file_frame ) {
    						file_frame.open();
    						return;
    					}

    					// Create the media frame.
    					file_frame = wp.media.frames.downloadable_file = wp.media({
    						title: '<?php esc_html_e( 'Choose an image', 'xtocky' ); ?>',
    						button: {
    							text: '<?php esc_html_e( 'Use image', 'xtocky' ); ?>',
    						},
    						multiple: false
    					});

    					// When an image is selected, run a callback.
    					file_frame.on( 'select', function() {
    						attachment = file_frame.state().get('selection').first().toJSON();

    						jQuery('#brand_thumbnail_id').val( attachment.id );
    						jQuery('#brand_thumbnail img').attr('src', attachment.url );
    						jQuery('.remove_image_button').show();
    					});

    					// Finally, open the modal.
    					file_frame.open();
    				});

    				jQuery(document).on( 'click', '.remove_image_button', function( event ){
    					jQuery('#brand_thumbnail img').attr('src', '<?php echo wc_placeholder_img_src(); ?>');
    					jQuery('#brand_thumbnail_id').val('');
    					jQuery('.remove_image_button').hide();
    					return false;
    				});

    			</script>
    			<div class="clear"></div>
    		</td>
    	</tr>
    	<?php
    }
}

if(!function_exists('xtocky_brands_fields_save')) {
    function xtocky_brands_fields_save($term_id, $tt_id, $taxonomy ) {

    	if ( isset( $_POST['brand_thumbnail_id'] ) )
    		update_woocommerce_term_meta( $term_id, 'thumbnail_id', absint( $_POST['brand_thumbnail_id'] ) );

    	delete_transient( 'wc_term_counts' );
    }
}

add_action( 'created_term', 'xtocky_brands_fields_save', 10,3 );
add_action( 'edit_term', 'xtocky_brands_fields_save', 10,3 );


//add brand widgets

class Stock_Piko_Brands_Widget extends WC_Widget {
    /**
     * Current Brand.
     *
     * @var bool
     */
     public $current_cat;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->widget_cssclass    = 'sidebar-widget xtocky pikoworks_widget_brands';
        $this->widget_description = esc_html__( 'A list or dropdown of product brands.', 'xtocky' );
        $this->widget_id          = 'pikoworks_widget_brands';
        $this->widget_name        = esc_html__( '[Pikoworks] Product Brand', 'xtocky' );
        $this->settings           = array(
            'title'  => array(
                'type'  => 'text',
                'std'   => esc_html__( 'Filter by brand', 'xtocky' ),
                'label' => esc_html__( 'Title', 'xtocky' )
            ),
            'displayType' => array(
                'type'  => 'select',
                'std'   => 'name',
                'label' => esc_html__( 'Display type:', 'xtocky' ),
                'options' => array(
                    'name' => esc_html__( 'Name', 'xtocky' ),
                    'image'  => esc_html__( 'Image', 'xtocky' )
                )
            ),
            'dropdown' => array(
                'type'  => 'checkbox',
                'std'   => 0,
                'label' => esc_html__( 'Show as dropdown (Only for Display type: Name)', 'xtocky' )
            ),
            'count' => array(
                'type'  => 'checkbox',
                'std'   => 0,
                'label' => esc_html__( 'Show product counts', 'xtocky' )
            ),
            'hide_empty' => array(
                'type'  => 'checkbox',
                'std'   => 0,
                'label' => esc_html__( 'Hide empty brands', 'xtocky' )
            )
        );

        parent::__construct();
    }

    /**
     * Output widget.
     *
     * @see WP_Widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {

        $count              = isset( $instance['count'] ) ? $instance['count'] : $this->settings['count']['std'];
        $title              = isset( $instance['title'] ) ? $instance['title'] : $this->settings['title']['std'];
        $dropdown           = isset( $instance['dropdown'] ) ? $instance['dropdown'] : $this->settings['dropdown']['std'];
        $displayType        = isset( $instance['displayType'] ) ? $instance['displayType'] : $this->settings['displayType']['std'];
        $hide_empty         = isset( $instance['hide_empty'] ) ? $instance['hide_empty'] : $this->settings['hide_empty']['std'];

        // Setup Current Category
        $this->current_cat   = false;
        $hide_empty = ($hide_empty == 1) ? true : false;
        $args = array(
            'taxonomy' => 'brand',
            'hide_empty' => $hide_empty,
        );
        $terms =  new WP_Term_Query($args);

        // Dropdown
        echo '<section class="widget pikoworks_widget_brands">
                <h2 class="widget-title"><span>'. esc_html($title).'</span></h2>
                ';

        if ( $dropdown ) { ?>
                <select name="product_brand" class="dropdown_product_brand">
                    <option value="" selected="selected"><?php esc_attr_e('Select a brand','xtocky'); ?></option>
                    <?php foreach ($terms->terms as $brand) {
                        $countProd = ($count == 1) ? "({$brand->count})" : '';
                        ?>
                        <option class="level-0" value="<?php echo esc_html($brand->name); ?>"><?php echo esc_html($brand->name .' '. $countProd); ?></option>
                    <?php } ?>
                </select>
            <?php
            wc_enqueue_js( "
				jQuery( '.dropdown_product_brand' ).change( function() {
					if ( jQuery(this).val() != '' ) {
						var this_page = '';
						var home_url  = '" . esc_js( home_url( '/' ) ) . "';
						if ( home_url.indexOf( '?' ) > 0 ) {
							this_page = home_url + '&brand=' + jQuery(this).val();
						} else {
							this_page = home_url + '?brand=' + jQuery(this).val();
						}
						location.href = this_page;
					}
				});
			" );
        // List
        } else {
            echo '<ul>';            
                foreach ($terms->terms as $brand) {
                    $thumbnail_id = absint(get_woocommerce_term_meta($brand->term_id, 'thumbnail_id', true)); ?>
                     <?php
                        $countProd = ($count == 1) ? "<span class='count'>(" . esc_html($brand->count) .")</span>" : '';
                        $countProd2 = ($count == 1) ? "<span class='count'>" . esc_html($brand->count) ."</span>" : '';
                        if ( $displayType == 'name' ) { ?>
                        <li class="cat-item">
                            <a href="<?php echo esc_url(get_term_link($brand)); ?>">
                                <?php echo esc_html($brand->name); ?>
                                <?php echo balanceTags($countProd); ?>
                            </a>
                        </li>    
                        <?php } elseif( $displayType == 'image' ) {
                            $brandImg = wp_get_attachment_image($thumbnail_id, array(100,100) );
                            if (!empty( $brandImg )) { ?>
                            <li class="cat-img">
                                <a class="brand-logo" href="<?php echo esc_url(get_term_link($brand)); ?>" title="<?php echo esc_html($brand->name) . ' (' . esc_html($brand->count) . ')'; ?>">
                                    <?php echo $brandImg; ?>
                                     <?php echo balanceTags($countProd2); ?>
                                </a>
                            </li>    
                            <?php }
                        } ?>
                    
                <?php }            
            echo '</ul>';
        }
        echo '</section>';
    }
}

 function xtocky_brand_widgets(){  
    register_widget('Stock_Piko_Brands_Widget');
 }
 add_action('widgets_init', 'xtocky_brand_widgets');