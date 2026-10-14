<?php
/**
 * Page Template Part: Widget Home
 *
 * Frontpage widget sections — Slideset, Pengumuman, Latest News, Layout Builder.
 * Uses UIKit 3 Slider & Grid components.
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
?>

<?php // -------------------------------------------------------
// SLIDESET CAROUSEL
if ( get_theme_mod( 'ukmtheme_frontpage_slideset' ) == 1 ) : ?>

    <div class="uk-position-relative uk-visible-toggle" uk-slider="autoplay: true; autoplay-interval: 4000; finite: false" id="widget-slideset">
        <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-4@m uk-grid uk-grid-small">
            <?php
            $args = array(
                'post_type'      => 'slideset',
                'posts_per_page' => 10,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            );
            $slideset = new WP_Query( $args );

            if ( $slideset->have_posts() ) :
                while ( $slideset->have_posts() ) : $slideset->the_post();
                    $set_link  = esc_url( get_post_meta( get_the_ID(), 'ut_slideset_link', true ) );
                    $set_image = esc_url( get_post_meta( get_the_ID(), 'ut_slideset_image', true ) );
                ?>
                <li>
                    <a href="<?php echo $set_link; ?>" title="<?php the_title_attribute(); ?>">
                        <img src="<?php echo $set_image; ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                    </a>
                </li>
            <?php endwhile; wp_reset_postdata();
            else : ?>
                <li><img src="<?php echo esc_url( get_template_directory_uri() . '/images/placeholder_slider_a.svg' ); ?>" alt=""></li>
                <li><img src="<?php echo esc_url( get_template_directory_uri() . '/images/placeholder_slider_b.svg' ); ?>" alt=""></li>
                <li><img src="<?php echo esc_url( get_template_directory_uri() . '/images/placeholder_slider_c.svg' ); ?>" alt=""></li>
                <li><img src="<?php echo esc_url( get_template_directory_uri() . '/images/placeholder_slider_d.svg' ); ?>" alt=""></li>
            <?php endif; ?>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
    </div>

<?php endif; // END SLIDESET ?>

<?php // -------------------------------------------------------
// PENGUMUMAN (ANNOUNCEMENTS)
if ( get_theme_mod( 'ukmtheme_frontpage_pengumuman' ) == 1 ) : ?>

    <div id="pengumuman-section" class="wrap uk-margin-top">
        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-small-bottom">
            <h3 class="uk-heading-bullet uk-margin-remove">PENGUMUMAN</h3>
            <a class="uk-button uk-button-text" href="<?php echo esc_url( home_url( '/news-category/pengumuman/' ) ); ?>">
                <?php esc_html_e( 'Lagi', 'ukmtheme' ); ?> <span uk-icon="icon: chevron-right; ratio: 0.8"></span>
            </a>
        </div>

        <div class="uk-position-relative uk-visible-toggle" uk-slider="autoplay: true; autoplay-interval: 5000; finite: false" id="widget-pengumuman">
            <ul class="uk-slider-items uk-child-width-1-1@s uk-child-width-1-3@m uk-grid uk-grid-small">
                <?php
                $umum = new WP_Query( array(
                    'post_type' => 'news',
                    'newscat'   => 'pengumuman',
                ) );

                if ( $umum->have_posts() ) :
                    while ( $umum->have_posts() ) : $umum->the_post(); ?>
                    <li>
                        <div class="uk-card uk-card-small uk-card-default uk-card-body uk-flex uk-flex-middle">
                            <div class="uk-margin-small-right">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/icon-announcement.svg' ); ?>" alt="" width="40">
                            </div>
                            <div>
                                <a class="uk-link-reset" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
                                <p class="uk-text-small uk-text-muted uk-margin-remove"><?php echo esc_html( get_the_date( 'j M Y' ) ); ?></p>
                            </div>
                        </div>
                    </li>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <li><div class="uk-card uk-card-default uk-card-body uk-text-muted"><?php esc_html_e( 'Tiada pengumuman.', 'ukmtheme' ); ?></div></li>
                <?php endif; ?>
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
        </div>
    </div>

<?php endif; // END PENGUMUMAN ?>

<?php // -------------------------------------------------------
// LATEST NEWS SLIDER
if ( get_theme_mod( 'ukmtheme_frontpage_basic' ) == 1 ) :
    $news_count = get_theme_mod( 'ukmtheme_frontpage_news', 6 ); ?>

    <div class="wrap uk-margin-top">
        <?php if ( get_theme_mod( 'ukmtheme_frontpage_news_title_edit' ) == 0 ) : ?>
            <h2 class="uk-heading-line uk-text-center"><span><?php esc_html_e( 'BERITA TERKINI', 'ukmtheme' ); ?></span></h2>
        <?php else : ?>
            <?php echo wp_kses_post( get_theme_mod( 'ukmtheme_frontpage_news_title' ) ); ?>
        <?php endif; ?>
    </div>

    <div class="wrap uk-margin-bottom">
        <div class="uk-position-relative uk-visible-toggle" uk-slider="finite: false" id="widget-news-slider">
            <ul class="uk-slider-items uk-child-width-1-1@s uk-child-width-1-3@m uk-grid uk-grid-small">
                <?php
                $loop = new WP_Query( array(
                    'post_type'      => 'news',
                    'posts_per_page' => $news_count,
                ) );

                if ( $loop->have_posts() ) :
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail( 'news_thumbnail', array( 'class' => 'uk-width-1-1' ) ); ?></a>
                                <?php else : ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/placeholder_news.svg' ); ?>" alt="" class="uk-width-1-1">
                                <?php endif; ?>
                            </div>
                            <div class="uk-card-body uk-padding-small">
                                <p class="uk-margin-remove">
                                    <a class="uk-link-reset" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
        </div>
    </div>

<?php endif; // END LATEST NEWS ?>

<?php // -------------------------------------------------------
// LAYOUT BUILDER (SiteOrigin / Elementor)
if ( get_theme_mod( 'ukmtheme_frontpage_one_box' ) == 1 ) :
    if ( dynamic_sidebar( 'sidebar-2' ) ) : else : endif;
endif; // END LAYOUT BUILDER ?>