<?php
/**
 * The template part for displaying content
 */
$size = 'full';
if (isset($GLOBALS['xtocky_archive_loop']['image-size'])) {
    $size = $GLOBALS['xtocky_archive_loop']['image-size'];
}


$archive_title_position = isset( $GLOBALS['xtocky']['optn_archive_title_position'] ) ? trim( $GLOBALS['xtocky']['optn_archive_title_position'] ) : 'image-bottom';
$except_word = isset( $GLOBALS['xtocky']['optn_archive_except_word'] ) ? trim( $GLOBALS['xtocky']['optn_archive_except_word'] ) : '55';

$prefix = 'xtocky_';
$url = get_post_meta(get_the_ID(), $prefix.'post_format_link_url', true);
$text = get_post_meta(get_the_ID(), $prefix.'post_format_link_text', true);

$class = array();
$class[]= "clearfix";
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
     <?php xtocky_entry_header();?>     
    <div class="entry-content-link">
        <?php if (empty($url) || empty($text)) : ?>            
            <div class="entry-excerpt">                
                <?php
                    /* translators: %s: Name of current post */                  
                    
                if ( ! has_excerpt() ) {
                    echo '<p>'. wp_trim_words( get_the_content(), esc_attr($except_word), '...  ' ) . '</p>';
                } else { 
                    echo '<p>'. wp_trim_words( the_excerpt(), esc_attr($except_word), '... ' )  . '</p>';
                }

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
            <?php echo xtocky_read_more_link(); ?>           
           
        <?php else : ?>
            <a href="<?php echo esc_url($url); ?>" rel="bookmark">
                <?php echo esc_html($text); ?>
            </a>
        <?php endif; ?>
    </div>
</article>

