<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
?>
<?php
    // SLIDESET
    if ( get_theme_mod( 'ukmtheme_frontpage_slideset' ) == 1 ) { ?>
    <div class="uk-slidenav-position" data-uk-slider>
        <div class="uk-slider-container">
            <div class="uk-slider uk-grid-width-1-4">
            <?php
                $args = array(
                    'post_type'       => 'slideset',
                    'posts_per_page'  => 10,
                    'orderby'         => 'menu_order',
                    'order'           => 'ASC'
                );

                $slideset = new WP_Query( $args );

                if ( $slideset->have_posts() ) : while ( $slideset->have_posts() ) : $slideset->the_post(); ?>
                <a href="<?php echo get_post_meta(get_the_ID(),'ut_slideset_link',true); ?>" title="<?php the_title(); ?>">
                    <img src="<?php echo get_post_meta(get_the_ID(),'ut_slideset_image',true); ?>" alt="<?php the_title(); ?>">
                </a>
            <?php endwhile; else: ?>
                <a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_a.svg'; ?>" alt=""></a>
                <a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_b.svg'; ?>" alt=""></a>
                <a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_c.svg'; ?>" alt=""></a>
                <a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_d.svg'; ?>" alt=""></a>
            <?php endif; ?>
            </div>
        </div>
    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
    </div>
<?php } // END SLIDESET ?>
<?php
    // START PENGUMUMAN
    if ( get_theme_mod( 'ukmtheme_frontpage_pengumuman' ) == 1 ) { ?>
    <div id="pengumuman" class="wrap">
        <div id="pengumuman-title">
            <h3 id="pengumuman-heading">PENGUMUMAN</h3>
            <a class="pengumuman-lagi" href="<?php echo bloginfo('url'); ?>/news-category/pengumuman/">Lagi <i class="uk-icon-angle-double-right"></i></a>
        </div>
        <div class="uk-slidenav-position" data-uk-slider="{ autoplay: true }">

        <div class="uk-slider-container">
            <ul id="pengumuman" class="uk-slider uk-grid uk-grid-width-medium-1-3 uk-grid-collapse" data-uk-grid-match="{target:'.pengumuman-list'}">
                <?php

                $umum = new WP_Query( 
                    array (
                        'post_type' => 'news',
                        'newscat' => 'pengumuman'
                    )
                );

                while ( $umum->have_posts() ) : $umum->the_post(); ?>

                <li class="pengumuman-list">
                    <div class="pengumuman-item">
                        <div class="large-3-12 pengumuman-item-image">
                            <img src="<?php echo get_template_directory_uri() . '/img/icon-announcement.svg'; ?>">
                        </div>
                        <div class="large-9-12 pengumuman-item-content">
                            <a class="uk-clearfix" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                            <p class="pengumuman-date"><?php echo mysql2date('j M Y', $umum->posts[0]->post_modified); ?></small></p>
                        </div>
                    </div>
                </li>
            <?php endwhile; ?>
            </ul>
        </div>
        <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
        <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>

        </div>
    </div>
    <?php } // END PENGUMUMAN ?>
<?php
// LATEST NEWS START
if ( get_theme_mod( 'ukmtheme_frontpage_basic' ) == 1 ) { ?>
<div class="wrap frontpage-news-title">
    <?php if ( get_theme_mod( 'ukmtheme_frontpage_news_title_edit' ) == 0 ) { ?>
        <h2>BERITA TERKINI</h2>
    <?php } else { ?>
        <?php echo get_theme_mod( 'ukmtheme_frontpage_news_title' ); ?>
    <?php } ?>
</div>
<div class="wrap padding-top padding-bottom device-padding column">
    <div class="uk-slidenav-position" data-uk-slider="{infinite: false}">

        <div class="uk-slider-container">
            <ul class="uk-slider uk-grid uk-grid-width-medium-1-3" data-uk-grid-match="{target:'.uk-panel'}">
                <?php
                
                $news = get_theme_mod( 'ukmtheme_frontpage_news' );
                $loop = new WP_Query( 
                    array(
                    'post_type' => 'news',
                    'posts_per_page' => $news
                    )
                );

                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                
                <li>
                    <div class="uk-panel uk-panel-box">
                        <div class="uk-panel-teaser">
                            <?php
                                if ( has_post_thumbnail() ) { the_post_thumbnail( 'latest_news_thumbnail' ); }
                                else { echo '<img src="' . get_template_directory_uri() . '/img/placeholder_news.svg" height="auto" width="auto"/>'; }
                            ?>
                        </div>
                        <p><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></p>
                    </div>
                </li>
                
                <?php endwhile; ?>
            </ul>
        </div>
        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous" draggable="false"></a>
        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next" draggable="false"></a>
    </div>
</div>
<?php } // END LATEST NEWS ?>
<?php
// START LAYOUT BUILDER BY SITEORIGIN
if ( get_theme_mod( 'ukmtheme_frontpage_one_box' ) == 1 ) {
    if ( dynamic_sidebar( 'sidebar-2' ) ) : else : endif;
} // END LAYOUT BUILDER BY SITEORIGIN ?>