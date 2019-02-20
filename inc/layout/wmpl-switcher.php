<?php 
/* 
 * language wpml
 */
if( ! function_exists( 'xtocky_lang_switcher' ) ){
    function xtocky_lang_switcher() {
        $wpml = isset( $GLOBALS['xtocky']['menu_bar_right_wpml'] ) ? trim( $GLOBALS['xtocky']['menu_bar_right_wpml'] ) : 0;
        
        if( function_exists( 'icl_get_languages' ) && $wpml == 1 ){
                $languages = icl_get_languages( 'skip_missing=0&orderby=code' );
                $output = '';
                if ( ! empty( $languages ) ) {
                        $output .= '<ul class="header-dropdown lang"><li> <a href="#"><i class="icon-globe" aria-hidden="true"></i> '. ICL_LANGUAGE_NAME_EN .'</a>';
                        $output .= '<ul>';
                        foreach ( $languages as $l ) {
                                if ( ! $l['active'] ) {
                                        $output .= '<li>';
                                        $output .= '<a href="' . $l['url'] . '"> <img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                                        $output .= icl_disp_language( $l['native_name'] );
                                        $output .= '</a>';
                                        $output .= '</li>';
                                }
                        }
                        $output .= '</ul>';
                        $output .= '</li></ul>';
                        echo balanceTags( $output, true );
                }
        }
    }
}

if( ! function_exists( 'xtocky_lang_switcher_top' ) ){
    function xtocky_lang_switcher_top() {
        $wpml = isset( $GLOBALS['xtocky']['menu_top_bar_wpml'] ) ? trim( $GLOBALS['xtocky']['menu_top_bar_wpml'] ) : 0;
        $currency = isset( $GLOBALS['xtocky']['menu_top_bar_currency'] ) ? trim( $GLOBALS['xtocky']['menu_top_bar_currency'] ) : 0;
        if( class_exists('SitePress') && $currency == 1 ){
           echo'<div class="currency">' . (do_shortcode('[currency_switcher]')). '</div>'; 
        }        
        
        if( function_exists( 'icl_get_languages' ) && $wpml == 1 ){
                $languages = icl_get_languages( 'skip_missing=0&orderby=code' );
                $output = '';
                if ( ! empty( $languages ) ) {
                        $output .= '<ul class="header-dropdown lang"><li> <a href="#">'. ICL_LANGUAGE_NAME_EN .'</a>';
                        $output .= '<ul>';
                        foreach ( $languages as $l ) {
                                if ( ! $l['active'] ) {
                                        $output .= '<li>';
                                        $output .= '<a href="' . $l['url'] . '"> <img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                                        $output .= icl_disp_language( $l['native_name'] );
                                        $output .= '</a>';
                                        $output .= '</li>';
                                }
                        }
                        $output .= '</ul>';
                        $output .= '</li></ul>';
                        echo balanceTags( $output, true );
                }
        }
    }
}