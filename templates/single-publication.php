<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<!-- Stylesheet & Script bxSlider (Sekiranya belum dimuatkan di functions.php) -->
<style>
    /* Styling bxSlider & Pager */
    .book-slider-container {
        margin-bottom: 20px;
    }
    
    .bxslider-book {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .bxslider-book img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 4px;
    }

    /* Thumbnail Pager (Method 1) */
    #bx-pager {
        display: flex;
        gap: 8px;
        margin-top: 10px;
        flex-wrap: wrap;
    }

    #bx-pager a {
        display: inline-block;
        border: 2px solid transparent;
        opacity: 0.6;
        border-radius: 4px;
        overflow: hidden;
        transition: all 0.2s ease-in-out;
    }

    #bx-pager a.active,
    #bx-pager a:hover {
        border-color: #0073aa;
        opacity: 1;
    }

    #bx-pager img {
        width: 30px;
        height: 30px;
        object-fit: cover;
        display: block;
    }
</style>

<div class="wrap">
    <article class="article uk-width-1-1">
        <h2 class="uk-margin-top uk-margin-bottom"><?php the_title(); ?></h2>
        <?php while ( have_posts() ) : the_post(); 
            $pub_cover   = get_post_meta( get_the_ID(), 'ut_publication_cover', true );
            $pub_gallery = get_post_meta( get_the_ID(), 'ut_publication_gallery', true );
        ?>
            <!-- Container Grid Utama UIkit -->
            <div uk-grid class="uk-grid-medium">
                
                <!-- BAHAGIAN COVER & GALERI (1/4 pada skrin medium ke atas, 100% pada skrin kecil) -->
                <div class="uk-width-1-4@m uk-width-1-1">
                    
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            if (typeof jQuery !== 'undefined' && jQuery.fn.bxSlider) {
                                jQuery('.bxslider-book').bxSlider({
                                    pagerCustom: '#bx-pager',
                                    adaptiveHeight: true,
                                    controls: true,
                                    auto: false,
                                    nextText: '›',
                                    prevText: '‹'
                                });
                            }
                        });
                    </script>

                    <div class="book-slider-container">
                        <?php if ( ! empty( $pub_gallery ) && is_array( $pub_gallery ) ) : ?>
                            
                            <!-- Main Slider -->
                            <ul class="bxslider-book">
                                <?php foreach ( $pub_gallery as $attachment_id => $img_url ) : ?>
                                    <li>
                                        <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>">
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <!-- Thumbnail Pager (Method 1) -->
                            <div id="bx-pager">
                                <?php 
                                $i = 0;
                                foreach ( $pub_gallery as $attachment_id => $img_url ) : 
                                    $thumb_src = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
                                    $thumb_url = $thumb_src ? $thumb_src[0] : $img_url;
                                ?>
                                    <a data-slide-index="<?php echo $i; ?>" href="">
                                        <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>">
                                    </a>
                                <?php 
                                    $i++;
                                endforeach; 
                                ?>
                            </div>

                        <?php elseif ( $pub_cover ) : ?>
                            <!-- Fallback jika hanya ada 1 gambar cover asal -->
                            <img src="<?php echo esc_url( $pub_cover ); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php else : ?>
                            <!-- Fallback jika tiada gambar langsung -->
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/placeholder_publication.svg" alt="Placeholder">
                        <?php endif; ?>
                    </div>
                </div>

                <!-- BAHAGIAN DETAIL BUKU (3/4 pada skrin medium ke atas, 100% pada skrin kecil) -->
                <div class="uk-width-3-4@m uk-width-1-1">
                    <h4><?php _e('Detail','ukmtheme') ?></h4>
                    <table class="uk-table uk-table-divider uk-table-small">
                        <tr><td><?php _e('Author','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_author', true); ?></td></tr>
                        <tr><td><?php _e('Publisher','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_publisher', true); ?></td></tr>
                        <tr><td><?php _e('Year','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_year', true); ?></td></tr>
                        <tr><td><?php _e('Number of Pages','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_pages', true); ?></td></tr>
                        <tr><td><?php _e('Reference/Download','ukmtheme'); ?></td><td>:&nbsp;<a href="<?php echo get_post_meta($post->ID, 'ut_publication_reference', true); ?>"><?php _e('Click here','ukmtheme') ?></a></td></tr>
                    </table>                    
                </div>

                <!-- BAHAGIAN TAB & SWITCHER (100% Lebar) -->
                <div class="uk-width-1-1 uk-margin-medium-top">
                    <ul class="uk-flex-center" uk-tab>
                        <li class="uk-active"><a href="#"><?php _e('Keterangan', 'ukmtheme'); ?></a></li>
                        <li><a href="#"><?php _e('Biografi', 'ukmtheme'); ?></a></li>
                        <li><a href="#"><?php _e('Review', 'ukmtheme'); ?></a></li>
                    </ul>

                    <div class="uk-switcher uk-margin">
                        <div><?php echo get_post_meta( $post->ID, 'ut_publication_description', true ); ?></div>
                        <div><?php echo get_post_meta( $post->ID, 'ut_publication_biography', true ); ?></div>
                        <div><?php echo get_post_meta( $post->ID, 'ut_publication_review', true ); ?></div>
                    </div>
                </div>

            </div><!-- /uk-grid -->
        <?php endwhile; ?>
    </article>
</div>

<?php get_footer(); ?>