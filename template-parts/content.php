<?php
/**
 * The template part for displaying content
 */

$size = 'full';
if (isset($GLOBALS['xtocky_archive_loop']['image-size'])) {
    $size = $GLOBALS['xtocky_archive_loop']['image-size'];
}

$except_word = isset( $GLOBALS['xtocky']['optn_archive_except_word'] ) ? trim( $GLOBALS['xtocky']['optn_archive_except_word'] ) : '55';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
        
            <?php
            $thumbnail = xtocky_post_format($size);
            if (!empty($thumbnail)) : ?>
                <figure class="entry-media">
                    <?php echo wp_kses_post($thumbnail); ?>
                </figure>
            <?php endif; ?> 
            <?php xtocky_entry_header();?>
            <div class="entry-excerpt">                
                <?php
                    /* translators: %s: Name of current post */   
                    the_content( sprintf(
                            esc_html__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'xtocky' ),
                            get_the_title()
                    ) );

                    wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'xtocky' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'xtocky' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                    ) );
                ?>                
            </div>           
    
        <footer class="entry-footer clearfix">
		 <?php xtocky_entry_masonry_footer(); ?>
        </footer><!-- .entry-footer -->
    
</article>