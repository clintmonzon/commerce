<?php
/**
 * Template part for displaying header layout.
 * 
 */
$prefix = 'xtocky_';
$menu_width =  get_post_meta(get_the_ID(), $prefix . 'manu_width',true);
if (!isset($menu_width) || $menu_width == '-1' || $menu_width == '') {
    $menu_width = xtocky_get_option_data('full_width_menu', 'container-fluid');
}
?>
<div class="header-wrapper">
	<header id="header" class="site-header">
             <?php xtocky_header_topbar_wrap(); ?>
		<div class="header-main">
                    <div class="<?php echo esc_attr($menu_width); ?>">
                         <?php xtocky_get_header_toggle(); ?>     
			<div class="logo">
                            <?php xtocky_get_brand_logo(); ?>
                        </div>
                        <div class="header">                                                                                         
                                <?php xtocky_get_header_right();?>                                                                                                         
                        </div>
                    </div>
                    <div class="sticky-menu-header menu4 hidden-sm hidden-xs">
                        <div class="<?php echo esc_attr($menu_width); ?>">
                            <nav class="main-menu-wrap">
                                <div class="row">
                                        <div class="columns">
                                                <div id="main-menu">                                                
                                                    <?php xtocky_get_menu_category_wrap();?>
                                                    <?php xtocky_get_main_menu();?>
                                                </div>
                                        </div>
                                </div>
                            </nav>			
                        </div>
                    </div>
		</div>
	</header>
</div>