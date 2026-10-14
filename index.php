<?php
/**
 * The main template file
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<?php if ( is_front_page() || is_home() ) : ?>

    <!-- 1. HERO SLIDER -->
    <?php
    $slideshow_resize = ( 1 == get_theme_mod( 'ukmtheme_resize_slideshow', 0 ) );
    ?>
    <section class="ukmtheme-hero-slider-section <?php echo $slideshow_resize ? 'wrap uk-margin-medium-top uk-margin-medium-bottom' : ''; ?>">
        <div class="uk-position-relative uk-visible-toggle uk-light <?php echo $slideshow_resize ? 'uk-box-shadow-large uk-border-rounded uk-overflow-hidden' : ''; ?>" 
             uk-slideshow="animation: fade; autoplay: true; autoplay-interval: 6000; min-height: 480; max-height: 680; ratio: 1920:700" 
             tabindex="-1" 
             id="hero-slideshow">
            
            <ul class="uk-slideshow-items">
            <?php
            $slideshow_args = array(
                'post_type'      => 'slideshow',
                'posts_per_page' => 15,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            );

            $slideshow = new WP_Query( $slideshow_args );

            if ( $slideshow->have_posts() ) :
                while ( $slideshow->have_posts() ) : $slideshow->the_post();
                    $slide_link    = get_post_meta( get_the_ID(), 'ut_slideshow_link', true );
                    $slide_image   = get_post_meta( get_the_ID(), 'ut_slideshow_image', true );
                    $show_caption  = get_post_meta( get_the_ID(), 'ut_slideshow_caption_hide', true );
                    $slide_caption = get_post_meta( get_the_ID(), 'ut_slideshow_caption', true );
                    $slide_title   = get_the_title();

                    if ( empty( $slide_image ) && has_post_thumbnail() ) {
                        $slide_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    }
                    if ( empty( $slide_image ) ) {
                        $slide_image = get_template_directory_uri() . '/images/ukm-dectar-1.avif';
                    }
                    ?>
                    <li>
                        <img src="<?php echo esc_url( $slide_image ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                        
                        <?php // Subtle vignette gradient overlay for contrast ?>
                        <div class="uk-position-cover" style="background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.45) 60%, rgba(0,0,0,0.75) 100%);"></div>

                        <?php // Title & Caption Overlay
                        if ( 'on' === $show_caption || 1 == $show_caption || ! empty( $slide_caption ) || ! empty( $slide_title ) ) : ?>
                            <div class="uk-position-cover uk-flex uk-flex-left uk-flex-middle">
                                <div class="wrap uk-container uk-width-1-1">
                                    <div class="uk-overlay uk-overlay-primary uk-border-rounded uk-transition-slide-bottom-small" 
                                         style="background: rgba(15, 23, 42, 0.78); backdrop-filter: blur(10px); max-width: 620px; padding: 28px 32px; border-left: 5px solid #cc0000; box-shadow: 0 12px 32px rgba(0,0,0,0.35);">
                                        
                                        <?php if ( ! empty( $slide_title ) ) : ?>
                                            <h2 class="uk-h2 uk-margin-small-bottom uk-text-bold" style="color: #ffffff; letter-spacing: -0.5px;">
                                                <?php echo esc_html( $slide_title ); ?>
                                            </h2>
                                        <?php endif; ?>

                                        <?php if ( ! empty( $slide_caption ) ) : ?>
                                            <p class="uk-margin-small-bottom uk-text-default" style="color: #e2e8f0; line-height: 1.6;">
                                                <?php echo esc_html( $slide_caption ); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if ( ! empty( $slide_link ) ) : ?>
                                            <div class="uk-margin-small-top">
                                                <a href="<?php echo esc_url( $slide_link ); ?>" class="uk-button uk-button-primary uk-border-rounded uk-text-bold">
                                                    <?php esc_html_e( 'Ketahui Lebih Lanjut', 'ukmtheme' ); ?> <span uk-icon="icon: arrow-right"></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php elseif ( ! empty( $slide_link ) ) : ?>
                            <a href="<?php echo esc_url( $slide_link ); ?>" class="uk-position-cover" aria-label="<?php the_title_attribute(); ?>"></a>
                        <?php endif; ?>
                    </li>
                <?php endwhile;
                wp_reset_postdata();
            else : // Default Fallback Slides ?>
                <li>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/ukm-dectar-1.avif' ); ?>" alt="Universiti Kebangsaan Malaysia" uk-cover>
                    <div class="uk-position-cover" style="background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.45) 60%, rgba(0,0,0,0.75) 100%);"></div>
                    <div class="uk-position-cover uk-flex uk-flex-left uk-flex-middle">
                        <div class="wrap uk-container uk-width-1-1">
                            <div class="uk-overlay uk-overlay-primary uk-border-rounded uk-transition-slide-bottom-small" 
                                 style="background: rgba(15, 23, 42, 0.78); backdrop-filter: blur(10px); max-width: 620px; padding: 28px 32px; border-left: 5px solid #cc0000; box-shadow: 0 12px 32px rgba(0,0,0,0.35);">
                                <span class="uk-label uk-label-warning uk-margin-small-bottom"><?php esc_html_e( 'Universiti Watan Kita', 'ukmtheme' ); ?></span>
                                <h2 class="uk-h2 uk-margin-small-bottom uk-text-bold" style="color: #ffffff;">
                                    Universiti Kebangsaan Malaysia
                                </h2>
                                <p class="uk-margin-small-bottom uk-text-default" style="color: #e2e8f0; line-height: 1.6;">
                                    Mendaulatkan Bahasa Melayu, Memugar Ilmu Menembus Sempadan. Menerajui kecemerlangan pendidikan dan penyelidikan bertaraf global.
                                </p>
                                <div class="uk-margin-small-top">
                                    <a href="#frontpage-three-col" class="uk-button uk-button-primary uk-border-rounded uk-text-bold">
                                        <?php esc_html_e( 'Terokai UKM', 'ukmtheme' ); ?> <span uk-icon="icon: arrow-down"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/Slide-A.jpg' ); ?>" alt="Pendidikan & Akademik" uk-cover>
                    <div class="uk-position-cover" style="background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.45) 60%, rgba(0,0,0,0.75) 100%);"></div>
                    <div class="uk-position-cover uk-flex uk-flex-left uk-flex-middle">
                        <div class="wrap uk-container uk-width-1-1">
                            <div class="uk-overlay uk-overlay-primary uk-border-rounded uk-transition-slide-bottom-small" 
                                 style="background: rgba(15, 23, 42, 0.78); backdrop-filter: blur(10px); max-width: 620px; padding: 28px 32px; border-left: 5px solid #cc0000; box-shadow: 0 12px 32px rgba(0,0,0,0.35);">
                                <span class="uk-label uk-label-danger uk-margin-small-bottom"><?php esc_html_e( 'Kecemerlangan Akademik', 'ukmtheme' ); ?></span>
                                <h2 class="uk-h2 uk-margin-small-bottom uk-text-bold" style="color: #ffffff;">
                                    Pembelajaran Inovatif Masa Hadapan
                                </h2>
                                <p class="uk-margin-small-bottom uk-text-default" style="color: #e2e8f0; line-height: 1.6;">
                                    Menawarkan program prasiswazah dan pascasiswazah berdaya saing tinggi yang bersedia menghadapi cabaran Industri 4.0.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/Slide-B.jpg' ); ?>" alt="Penyelidikan & Inovasi" uk-cover>
                    <div class="uk-position-cover" style="background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.45) 60%, rgba(0,0,0,0.75) 100%);"></div>
                    <div class="uk-position-cover uk-flex uk-flex-left uk-flex-middle">
                        <div class="wrap uk-container uk-width-1-1">
                            <div class="uk-overlay uk-overlay-primary uk-border-rounded uk-transition-slide-bottom-small" 
                                 style="background: rgba(15, 23, 42, 0.78); backdrop-filter: blur(10px); max-width: 620px; padding: 28px 32px; border-left: 5px solid #cc0000; box-shadow: 0 12px 32px rgba(0,0,0,0.35);">
                                <span class="uk-label uk-label-success uk-margin-small-bottom"><?php esc_html_e( 'Penyelidikan & Impak', 'ukmtheme' ); ?></span>
                                <h2 class="uk-h2 uk-margin-small-bottom uk-text-bold" style="color: #ffffff;">
                                    Inovasi Menyentuh Masyarakat
                                </h2>
                                <p class="uk-margin-small-bottom uk-text-default" style="color: #e2e8f0; line-height: 1.6;">
                                    Hasil kajian saintifik dan penerokaan ilmu baharu yang membawa impak positif kepada kemajuan komuniti dan negara.
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            </ul>

            <!-- Controls -->
            <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-slidenav-large uk-light" href="#" uk-slidenav-previous uk-slideshow-item="previous" aria-label="<?php esc_attr_e( 'Previous Slide', 'ukmtheme' ); ?>"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-slidenav-large uk-light" href="#" uk-slidenav-next uk-slideshow-item="next" aria-label="<?php esc_attr_e( 'Next Slide', 'ukmtheme' ); ?>"></a>
            <div class="uk-position-bottom-center uk-position-medium">
                <ul class="uk-slideshow-nav uk-dotnav uk-flex-center"></ul>
            </div>
        </div>
    </section>

    <!-- 2. 3 COLUMN SECTION: PRESET WIDGET / PRESET UIKIT CARD MEDIA TOP -->
    <section id="frontpage-three-col" class="uk-section uk-section-muted ukmtheme-frontpage-three-col">
        <div class="wrap uk-container">
            <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                <div class="uk-child-width-1-1 uk-child-width-1-3@m uk-grid-match uk-grid-medium" uk-grid>
                    <?php dynamic_sidebar( 'sidebar-4' ); ?>
                </div>
            <?php else : ?>
                <!-- PRESET UIKIT CARD MEDIA TOP (3 COLUMNS) -->
                <?php
                $preset_cards_query = new WP_Query( array(
                    'post_type'           => array( 'news', 'post' ),
                    'posts_per_page'      => 3,
                    'ignore_sticky_posts' => 1,
                ) );

                if ( $preset_cards_query->have_posts() ) :
                ?>
                    <div class="uk-child-width-1-1 uk-child-width-1-3@m uk-grid-match uk-grid-medium" uk-grid>
                        <?php while ( $preset_cards_query->have_posts() ) : $preset_cards_query->the_post();
                            $card_thumb = has_post_thumbnail() 
                                ? get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) 
                                : get_template_directory_uri() . '/images/dummy-960x640.svg';
                        ?>
                            <div>
                                <div class="uk-card uk-card-default uk-card-hover uk-border-rounded uk-box-shadow-small uk-overflow-hidden uk-transition-toggle">
                                    <div class="uk-card-media-top uk-cover-container" style="height: 220px;">
                                        <img src="<?php echo esc_url( $card_thumb ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover class="uk-transition-scale-up uk-transition-opaque">
                                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="uk-position-cover" aria-label="<?php the_title_attribute(); ?>"></a>
                                    </div>
                                    <div class="uk-card-body uk-padding uk-flex uk-flex-column">
                                        <div class="uk-article-meta uk-margin-small-bottom uk-text-muted">
                                            <span uk-icon="icon: calendar; ratio: 0.8"></span> <?php echo get_the_date(); ?>
                                        </div>
                                        <h3 class="uk-card-title uk-margin-remove-top uk-margin-small-bottom" style="font-size: 1.25rem; line-height: 1.4;">
                                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="uk-link-heading">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <p class="uk-text-muted uk-text-small uk-margin-small-bottom uk-flex-1">
                                            <?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?>
                                        </p>
                                        <div class="uk-margin-small-top">
                                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="uk-button uk-button-text uk-text-bold uk-text-primary">
                                                <?php esc_html_e( 'Baca Lagi', 'ukmtheme' ); ?> <span uk-icon="icon: arrow-right; ratio: 0.85"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                <?php else : // Fallback 3 Curated Preset Cards ?>
                    <div class="uk-child-width-1-1 uk-child-width-1-3@m uk-grid-match uk-grid-medium" uk-grid>
                        <!-- Card 1: Akademik -->
                        <div>
                            <div class="uk-card uk-card-default uk-card-hover uk-border-rounded uk-box-shadow-small uk-overflow-hidden uk-transition-toggle">
                                <div class="uk-card-media-top uk-cover-container" style="height: 220px;">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/Slide-A.jpg' ); ?>" alt="Program Akademik" uk-cover class="uk-transition-scale-up uk-transition-opaque">
                                </div>
                                <div class="uk-card-body uk-padding uk-flex uk-flex-column">
                                    <span class="uk-label uk-label-warning uk-width-auto uk-margin-small-bottom" style="align-self: flex-start;"><?php esc_html_e( 'Akademik', 'ukmtheme' ); ?></span>
                                    <h3 class="uk-card-title uk-margin-remove-top uk-margin-small-bottom" style="font-size: 1.25rem; line-height: 1.4;">
                                        <a href="#" class="uk-link-heading"><?php esc_html_e( 'Program Prasiswazah & Pascasiswazah', 'ukmtheme' ); ?></a>
                                    </h3>
                                    <p class="uk-text-muted uk-text-small uk-margin-small-bottom uk-flex-1">
                                        <?php esc_html_e( 'Terokai spektrum program pendidikan berakreditasi tinggi merangkumi bidang sains, teknologi, perubatan dan kemanusiaan.', 'ukmtheme' ); ?>
                                    </p>
                                    <div class="uk-margin-small-top">
                                        <a href="#" class="uk-button uk-button-text uk-text-bold uk-text-primary">
                                            <?php esc_html_e( 'Ketahui Lebih Lanjut', 'ukmtheme' ); ?> <span uk-icon="icon: arrow-right; ratio: 0.85"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Penyelidikan -->
                        <div>
                            <div class="uk-card uk-card-default uk-card-hover uk-border-rounded uk-box-shadow-small uk-overflow-hidden uk-transition-toggle">
                                <div class="uk-card-media-top uk-cover-container" style="height: 220px;">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/Slide-B.jpg' ); ?>" alt="Penyelidikan & Inovasi" uk-cover class="uk-transition-scale-up uk-transition-opaque">
                                </div>
                                <div class="uk-card-body uk-padding uk-flex uk-flex-column">
                                    <span class="uk-label uk-label-danger uk-width-auto uk-margin-small-bottom" style="align-self: flex-start;"><?php esc_html_e( 'Penyelidikan', 'ukmtheme' ); ?></span>
                                    <h3 class="uk-card-title uk-margin-remove-top uk-margin-small-bottom" style="font-size: 1.25rem; line-height: 1.4;">
                                        <a href="#" class="uk-link-heading"><?php esc_html_e( 'Pusat Kecemerlangan Penyelidikan', 'ukmtheme' ); ?></a>
                                    </h3>
                                    <p class="uk-text-muted uk-text-small uk-margin-small-bottom uk-flex-1">
                                        <?php esc_html_e( 'Menerajui penemuan ilmiah baharu dan penyelesaian saintifik yang berimpak besar demi pembangunan lestari masyarakat.', 'ukmtheme' ); ?>
                                    </p>
                                    <div class="uk-margin-small-top">
                                        <a href="#" class="uk-button uk-button-text uk-text-bold uk-text-primary">
                                            <?php esc_html_e( 'Ketahui Lebih Lanjut', 'ukmtheme' ); ?> <span uk-icon="icon: arrow-right; ratio: 0.85"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3: Kehidupan Kampus -->
                        <div>
                            <div class="uk-card uk-card-default uk-card-hover uk-border-rounded uk-box-shadow-small uk-overflow-hidden uk-transition-toggle">
                                <div class="uk-card-media-top uk-cover-container" style="height: 220px;">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/Slide-C.jpg' ); ?>" alt="Kehidupan Kampus" uk-cover class="uk-transition-scale-up uk-transition-opaque">
                                </div>
                                <div class="uk-card-body uk-padding uk-flex uk-flex-column">
                                    <span class="uk-label uk-label-success uk-width-auto uk-margin-small-bottom" style="align-self: flex-start;"><?php esc_html_e( 'Kampus', 'ukmtheme' ); ?></span>
                                    <h3 class="uk-card-title uk-margin-remove-top uk-margin-small-bottom" style="font-size: 1.25rem; line-height: 1.4;">
                                        <a href="#" class="uk-link-heading"><?php esc_html_e( 'Komuniti & Hal Ehwal Pelajar', 'ukmtheme' ); ?></a>
                                    </h3>
                                    <p class="uk-text-muted uk-text-small uk-margin-small-bottom uk-flex-1">
                                        <?php esc_html_e( 'Suasana persekitaran kampus hijau yang kondusif, fasiliti bertaraf antarabangsa, dan aktiviti mahasiswa yang dinamik.', 'ukmtheme' ); ?>
                                    </p>
                                    <div class="uk-margin-small-top">
                                        <a href="#" class="uk-button uk-button-text uk-text-bold uk-text-primary">
                                            <?php esc_html_e( 'Ketahui Lebih Lanjut', 'ukmtheme' ); ?> <span uk-icon="icon: arrow-right; ratio: 0.85"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <?php
    // SLIDESET
    if ( 1 == get_theme_mod( 'ukmtheme_frontpage_slideset' ) ) : ?>
        <div class="uk-position-relative uk-visible-toggle" uk-slider="autoplay: true; autoplay-interval: 4000; finite: false" id="slideset-carousel">
            <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-4@m uk-grid">
                <?php
                $slideset_args = array(
                    'post_type'      => 'slideset',
                    'posts_per_page' => 10,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC'
                );

                $slideset = new WP_Query( $slideset_args );

                if ( $slideset->have_posts() ) :
                    while ( $slideset->have_posts() ) : $slideset->the_post();
                        $set_link  = get_post_meta( get_the_ID(), 'ut_slideset_link', true );
                        $set_image = get_post_meta( get_the_ID(), 'ut_slideset_image', true );
                        if ( $set_image ) :
                        ?>
                        <li>
                            <a href="<?php echo esc_url( $set_link ); ?>" title="<?php the_title_attribute(); ?>">
                                <img src="<?php echo esc_url( $set_image ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                            </a>
                        </li>
                        <?php
                        endif;
                    endwhile;
                    wp_reset_postdata();
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

    <?php
    // LATEST NEWS SLIDER
    if ( 1 == get_theme_mod( 'ukmtheme_frontpage_basic' ) ) :
        $news_title = ( 0 == get_theme_mod( 'ukmtheme_frontpage_news_title_edit' ) || ! get_theme_mod( 'ukmtheme_frontpage_news_title' ) )
            ? __( 'BERITA TERKINI', 'ukmtheme' )
            : get_theme_mod( 'ukmtheme_frontpage_news_title' );
    ?>
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <div class="frontpage-news-title">
                <h2 class="uk-heading-line uk-text-center uk-margin-medium-bottom">
                    <span><?php echo esc_html( $news_title ); ?></span>
                </h2>
            </div>
            <div class="uk-position-relative uk-visible-toggle uk-dark" tabindex="-1" uk-slider>
                <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-grid-match uk-grid">
                    <?php
                    $news_count = get_theme_mod( 'ukmtheme_frontpage_news', 6 );
                    $news_query = new WP_Query( array(
                        'post_type'      => 'news',
                        'posts_per_page' => $news_count,
                    ) );

                    while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
                        <li>
                            <div class="uk-card uk-card-default uk-box-shadow-small uk-border-rounded">
                                <div class="uk-card-media-top uk-cover-container" style="height: 220px;">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <img src="<?php the_post_thumbnail_url( 'news_thumbnail' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/placeholder_news.svg' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                                    <?php endif; ?>
                                </div>
                                <div class="uk-card-body">
                                    <h4 class="uk-card-title uk-margin-remove">
                                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="uk-link-heading">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                    <p class="uk-article-meta uk-margin-small-top">
                                        <span uk-icon="icon: calendar"></span> <?php echo get_the_date(); ?>
                                    </p>
                                </div>
                            </div>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-top"></ul>
            </div>
            <div class="uk-text-center uk-margin-top">
                <a class="uk-button uk-button-default uk-border-rounded" href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>">
                    <?php esc_html_e( 'ARKIB BERITA', 'ukmtheme' ); ?>
                </a>
            </div>
        </div>
    </section>
    <?php endif; // END LATEST NEWS ?>

    <?php
    // LATEST NEWS THUMBNAIL GRID
    if ( 1 == get_theme_mod( 'ukmtheme_frontpage_news_thumbnail' ) ) :
        $news_title = ( 0 == get_theme_mod( 'ukmtheme_frontpage_news_title_edit' ) || ! get_theme_mod( 'ukmtheme_frontpage_news_title' ) )
            ? __( 'BERITA TERKINI', 'ukmtheme' )
            : get_theme_mod( 'ukmtheme_frontpage_news_title' );
    ?>
    <section class="uk-container uk-padding">
        <div class="frontpage-news-title">
            <h2 class="uk-heading-line uk-text-center uk-margin-medium-bottom">
                <span><?php echo esc_html( $news_title ); ?></span>
            </h2>
        </div>
        <div class="uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-small uk-grid-match" uk-grid>
            <?php 
            $news_count = get_theme_mod( 'ukmtheme_frontpage_news', 6 );
            $thumb_query = new WP_Query( array(
                'post_type'      => 'news',
                'posts_per_page' => $news_count,
            ) );

            while ( $thumb_query->have_posts() ) : $thumb_query->the_post(); ?>
                <div>
                    <div class="uk-card uk-card-default uk-box-shadow-small uk-border-rounded">
                        <div class="uk-card-media-top uk-cover-container" style="height: 200px;">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <img src="<?php the_post_thumbnail_url( 'news_thumbnail' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                            <?php else : ?>
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/placeholder_news.svg' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                            <?php endif; ?>
                        </div>
                        <div class="uk-card-body">
                            <h4 class="uk-card-title uk-margin-remove">
                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="uk-link-heading">
                                    <?php the_title(); ?>
                                </a>
                            </h4>
                            <p class="uk-article-meta uk-margin-small-top">
                                <span uk-icon="icon: calendar"></span> <?php echo get_the_date(); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
        <div class="uk-text-center uk-margin-top">
            <a class="uk-button uk-button-secondary uk-border-rounded" href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>">
                <?php esc_html_e( 'ARKIB BERITA', 'ukmtheme' ); ?>
            </a>
        </div>
    </section>
    <?php endif; // END LATEST NEWS THUMBNAIL ?>

    <?php // YOUTUBE PLAYLIST
    if ( 1 == get_theme_mod( 'ukmtheme_frontpage_ytv' ) ) :
        $ytv_title = ( 0 == get_theme_mod( 'ukmtheme_frontpage_ytv_title_edit' ) || ! get_theme_mod( 'ukmtheme_frontpage_ytv_title' ) )
            ? __( 'PTMUKM-TV', 'ukmtheme' )
            : get_theme_mod( 'ukmtheme_frontpage_ytv_title' );
    ?>
        <section class="wrap uk-padding">
            <h2 class="uk-heading-line uk-text-center uk-margin-medium-bottom">
                <span><?php echo esc_html( $ytv_title ); ?></span>
            </h2>
            <div id="ptmukm-tv-responsive"></div>
            <script>
                jQuery(document).ready(function($){
                    if (typeof YTV !== 'undefined') {
                        window.controller = new YTV('ptmukm-tv-responsive', {
                            <?php echo get_theme_mod( 'ukmtheme_frontpage_ytv_user' ); ?>,
                            accent: '#ffa500',
                            browsePlaylists: true,
                            autoplay: false,
                            playerTheme: 'light',
                            listTheme: 'light',
                            responsive: true
                        });
                    }
                });
            </script>
        </section>
    <?php endif; // END YOUTUBE PLAYLIST ?>

    <?php // LAYOUT BUILDER BY SITEORIGIN / ELEMENTOR
    if ( 1 == get_theme_mod( 'ukmtheme_frontpage_one_box' ) ) : ?>
        <div class="wrap uk-padding-small">
            <?php dynamic_sidebar( 'sidebar-2' ); ?>
        </div>
    <?php endif; ?>

    <?php // 2 BLOCK WIDGET
    if ( 1 == get_theme_mod( 'ukmtheme_frontpage_two_box' ) ) : ?>
        <section class="wrap uk-padding">
            <div class="uk-grid-match uk-child-width-1-2@s" uk-grid>
                <?php dynamic_sidebar( 'sidebar-3' ); ?>
            </div>
        </section>
    <?php endif; ?>



<?php else : // Standard blog posts loop for non-frontpage index ?>

    <div class="wrap uk-section uk-section-xsmall">
        <div class="uk-container">
            <?php if ( have_posts() ) : ?>
                <div class="uk-child-width-1-1 uk-grid-medium" uk-grid>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div>
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-card uk-card-default uk-card-body' ); ?>>
                                <h2 class="uk-card-title">
                                    <a class="uk-link-heading" href="<?php echo esc_url( get_permalink() ); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <p class="uk-article-meta">
                                    <span uk-icon="icon: calendar"></span> <?php echo get_the_date(); ?>
                                    &nbsp;|&nbsp;<span uk-icon="icon: user"></span> <?php the_author(); ?>
                                </p>
                                <div class="uk-margin-top">
                                    <?php the_excerpt(); ?>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="uk-margin-top">
                    <?php get_template_part( 'template-parts/global/content', 'paginate' ); ?>
                </div>
            <?php else : ?>
                <div class="uk-card uk-card-default uk-card-body">
                    <p><?php esc_html_e( 'No posts found.', 'ukmtheme' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php endif; ?>

<?php get_footer(); ?>