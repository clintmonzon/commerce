<?php

/* 
 *support for wc dokan plugins
 * 
 */

function xtocky_dokan_vendor_styles() {
    $custom_skin_bg = xtocky_get_option_data('main_color_scheme', '#56cfe1'); 
    $custom_third_bg = xtocky_get_option_data('tertiary_color_scheme', '#FE9931'); 
    
    $css_wcv = '@media (max-width:991px){.dokan-store .just-wraper{margin-bottom: 30px;}}@media (max-width:767px){.dokan-single-store .profile-frame .profile-info-box.profile-layout-layout1 .profile-info-summery-wrapper .profile-info-summery .profile-info-head .profile-img img{width: 80px;height: 80px;}.dokan-seller-listing .dokan-seller-search-form input#search{width: 100%;}}.dokan-single-store .commentlist{ margin:0;padding: 0;list-style: none;}.dokan-label-success,.dokan-message:before{background-color: ' . esc_attr($custom_third_bg) . ';}.dokan-message{border-color:' . esc_attr($custom_third_bg) . '}#tab-seller .list-unstyled .clearfix{position:relative}.tab-content .seller-rating{margin-top:22px;position: absolute;}.tab-content .seller-rating + .text{padding-left:110px; display:inline-block}.tab-content .seller-rating .star-rating span{position: static;}.tab-content .seller-rating .star-rating span + span{font-size: 0;}.dokan-message .dokan-close{font-size:20px;}.dokan-message .dokan-close:hover{background-color:transparent;}.dokan-reviews-content .dokan-reviews-area .dokan-comments-wrap select{width: calc( 100% - 118px);}.dokan-report-wrap .report-filter .dokan-form-group,.dokan-single-store .commentlist .review_comment_container .dokan-review-author-img img{width: 100px;border-radius:4px;margin-right:30px}.dokan-single-store .commentlist .review_comment_container .comment-text p{margin:0;font-size:12px}.dokan-single-store .commentlist .review_comment_container .comment-text h5{margin:0}.dokan-single-store .commentlist .review_comment_container,.dokan-order-filter-serach .dokan-left .dokan-form-group{display: -ms-flexbox;display: flex;align-items: center;}.dokan-info{background-color: #f4f4f4;}.dokan-widget-area .widget{margin-bottom: 40px;}.dokan-category-menu .widget-title:after{content: inherit;}input.dokan-btn[type="submit"], a.dokan-btn, .dokan-btn{padding: 0 34px;border-radius: 0;}#dokan-seller-listing-wrap ul.dokan-seller-wrap li .store-wrapper {box-shadow: 0px 0px 5px 0px #ddd;} a.dokan-btn, .dokan-btn{  height: 40px;line-height: 36px;}.dokan-seller-search {border-radius: 0 !important;border: 1px solid !important;background-position: 8px 12px !important;}.dokan-seller-listing .dokan-seller-search-form{margin-top: 0;}#dokan-seller-listing-wrap ul.dokan-seller-wrap li .store-footer .seller-avatar{padding: 3px;box-shadow: 0px 0px 15px -6px #afafaf;}#tab-seller ul{list-style: none;padding-left: 0;}input.dokan-btn-theme[type="submit"]:hover, a.dokan-btn-theme:hover, .dokan-btn-theme:hover, input.dokan-btn-theme[type="submit"]:focus, a.dokan-btn-theme:focus, .dokan-btn-theme:focus, input.dokan-btn-theme[type="submit"]:active, a.dokan-btn-theme:active, .dokan-btn-theme:active, input.dokan-btn-theme.active[type="submit"], a.dokan-btn-theme.active, .dokan-btn-theme.active, .open .dropdown-toggleinput.dokan-btn-theme[type="submit"], .open .dropdown-togglea.dokan-btn-theme, .open .dropdown-toggle.dokan-btn-theme,input.dokan-btn-theme[type="submit"],a.dokan-btn-theme,.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.active,.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.dokan-common-links a:hover,.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li:hover, .dokan-btn-theme{background-color:' . esc_attr($custom_skin_bg) . ';border-color: ' . esc_attr($custom_skin_bg) . '; }.dokan-info:before,.dokan-error:before{background-color: ' . esc_attr($custom_skin_bg) . ';}.dokan-info,.dokan-error{border-color: ' . esc_attr($custom_skin_bg) . ';}';
        
    return $css_wcv;
}
