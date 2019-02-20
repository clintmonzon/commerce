<?php
/*
 * @author sw-theme/themepiko
 */
$prefix = 'xtocky_';
$footer_width =  get_post_meta(get_the_ID(), $prefix . 'footer_width',true);
if (!isset($footer_width) || $footer_width == '-1' || $footer_width == '') {
    $footer_width = isset( $GLOBALS['xtocky']['footer-width-content'] ) ? $GLOBALS['xtocky']['footer-width-content'] : 'container-fluid';
}

$footer_bottom_layout =  get_post_meta(get_the_ID(), $prefix . 'footer_bottom_layout',true);
if (!isset($footer_bottom_layout) || $footer_bottom_layout == '-1' || $footer_bottom_layout == '') {
    $footer_bottom_layout = isset( $GLOBALS['xtocky']['optn_footer_bottom_layout'] ) ? $GLOBALS['xtocky']['optn_footer_bottom_layout'] : '3';
}
$footer_copyright_text =  get_post_meta(get_the_ID(), $prefix . 'sub_footer_text',true);
if (!isset($footer_copyright_text) || $footer_copyright_text == '') {
    $footer_copyright_text = isset( $GLOBALS['xtocky']['sub_footer_text'] ) ? $GLOBALS['xtocky']['sub_footer_text'] : sprintf( esc_html__( 'Proudly powered by %s', 'xtocky' ), 'WordPress' );
}
$footer_payment_logo = isset( $GLOBALS['xtocky']['optn_payment_logo_upload'] ) ? $GLOBALS['xtocky']['optn_payment_logo_upload'] : '';
$footer_social_class = isset( $GLOBALS['xtocky']['footer_social'] ) ? $GLOBALS['xtocky']['footer_social'] : '';

$payment_icon_class = '';
if($footer_payment_logo != '' || $footer_social_class != ''){
   $payment_icon_class = 'payment-icon-wrap';
}
?>
<footer id="colophon" class="footer">   
    <?php xtocky_footer_sidebar_three(); ?> 
    <?php xtocky_footer_sidebar_two(); ?> 
    <?php xtocky_footer_sidebar_one(); ?> 
    <div class="footer-bottom footer-layout-<?php echo esc_attr($footer_bottom_layout); ?>">
        <div class="<?php echo esc_attr($footer_width); ?>">
            <?php if($footer_bottom_layout == '1'): ?>
            <div class="footer-left">
                <?php 
                xtocky_footer_social_icon();
                xtocky_footer_nav_menu(); ?>
            </div><!-- End .footer-right -->
            <div class="footer-right <?php echo esc_attr($payment_icon_class); ?>">                
                <?php echo do_shortcode($footer_copyright_text);
                    xtocky_payment_logo();
                ?>                
            </div><!-- End .footer-right -->
            <?php elseif($footer_bottom_layout == '2'): ?>
            <div class="footer-right">                           
                <?php
                    xtocky_footer_social_icon();                    
                    xtocky_payment_logo();                    
                    xtocky_footer_nav_menu();
                ?>
            </div><!-- End .footer-right -->  
            <div class="footer-left <?php echo esc_attr($payment_icon_class); ?>">               
                <?php echo do_shortcode($footer_copyright_text);?>
            </div><!-- End .footer-right -->
            <?php else: ?>
            
            <div class="text-center">                                
                <?php
                    xtocky_payment_logo();
                    echo do_shortcode($footer_copyright_text);
                    xtocky_footer_social_icon();                    
                ?>                
            </div>         
            <?php endif; //end style1 ?>
            <a class="scroll-top" href="#top" title="Scroll top"><span class="icon-arrow-long-left up"></span></a>
        </div><!-- End .container-fluid -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->
