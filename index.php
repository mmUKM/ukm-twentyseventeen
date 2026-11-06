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

    <!-- 1. HERO SLIDER (bxSlider) -->
    <?php
    wp_enqueue_script( 'bxslider' );
    wp_enqueue_style( 'bxslider' );

    $slideshow_resize    = ( 1 == get_theme_mod( 'ukmtheme_resize_slideshow', 0 ) );
    $show_caption_global = ( 1 == get_theme_mod( 'ukmtheme_slideshow_caption', 1 ) );

    $slideshow_args = array(
        'post_type'      => 'slideshow',
        'posts_per_page' => 15,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'post_status'    => 'publish',
    );

    $slideshow_query = new WP_Query( $slideshow_args );
    $slides          = array();
    $default_image   = get_template_directory_uri() . '/assets/images/ukm-dectar-1.avif';

    if ( $slideshow_query->have_posts() ) {
        while ( $slideshow_query->have_posts() ) {
            $slideshow_query->the_post();
            $post_id     = get_the_ID();
            $slide_image = get_post_meta( $post_id, 'ut_slideshow_image', true );

            if ( empty( $slide_image ) ) {
                $img_id = get_post_meta( $post_id, 'ut_slideshow_image_id', true );
                if ( $img_id ) {
                    $slide_image = wp_get_attachment_url( $img_id );
                }
            }
            if ( empty( $slide_image ) && has_post_thumbnail( $post_id ) ) {
                $slide_image = get_the_post_thumbnail_url( $post_id, 'full' );
            }
            if ( empty( $slide_image ) ) {
                $slide_image = $default_image;
            }

            $caption_check = get_post_meta( $post_id, 'ut_slideshow_caption_hide', true );
            $slide_caption = get_post_meta( $post_id, 'ut_slideshow_caption', true );
            $slide_title   = get_the_title();

            // Caption can be enabled/disabled globally and per-slide
            $has_caption = $show_caption_global && (
                'on' === $caption_check ||
                1 == $caption_check ||
                ( '' === $caption_check && ! empty( $slide_caption ) )
            );

            $slides[] = array(
                'id'          => $post_id,
                'title'       => $slide_title,
                'image'       => $slide_image,
                'link'        => get_post_meta( $post_id, 'ut_slideshow_link', true ),
                'caption'     => $slide_caption,
                'has_caption' => $has_caption,
            );
        }
        wp_reset_postdata();
    } else {
        // Fallback default slides
        $slides = array(
            array(
                'id'          => 0,
                'title'       => 'Universiti Kebangsaan Malaysia',
                'image'       => get_template_directory_uri() . '/assets/images/ukm-dectar-1.avif',
                'link'        => '#frontpage-three-col',
                'caption'     => 'Mendaulatkan Bahasa Melayu, Memugar Ilmu Menembus Sempadan. Menerajui kecemerlangan pendidikan dan penyelidikan bertaraf global.',
                'has_caption' => $show_caption_global,
            ),
            array(
                'id'          => 0,
                'title'       => 'Pembelajaran Inovatif Masa Hadapan',
                'image'       => get_template_directory_uri() . '/assets/images/Slide-A.jpg',
                'link'        => '#',
                'caption'     => 'Menawarkan program prasiswazah dan pascasiswazah berdaya saing tinggi yang bersedia menghadapi cabaran Industri 4.0.',
                'has_caption' => $show_caption_global,
            ),
            array(
                'id'          => 0,
                'title'       => 'Inovasi Menyentuh Masyarakat',
                'image'       => get_template_directory_uri() . '/assets/images/Slide-B.jpg',
                'link'        => '#',
                'caption'     => 'Hasil kajian saintifik dan penerokaan ilmu baharu yang membawa impak positif kepada kemajuan komuniti dan negara.',
                'has_caption' => $show_caption_global,
            ),
        );
    }
    ?>

    <style>
        #hero-bxslider-wrapper {
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        #hero-bxslider-wrapper .bx-wrapper {
            margin: 0 !important;
            padding: 0 !important;
            border: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
            -webkit-box-shadow: none !important;
        }
        #hero-bxslider-wrapper .bx-wrapper .bx-viewport {
            border: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
            -webkit-box-shadow: none !important;
        }
        #hero-bxslider-wrapper ul.ukmtheme-bxslider {
            margin: 0 !important;
            padding: 0 !important;
            list-style: none !important;
        }
        /* Prevent FOUC before bxSlider initialization */
        #hero-bxslider-wrapper:not(.bx-slider-ready) .ukmtheme-bxslider > li:not(:first-child) {
            display: none;
        }
        #hero-bxslider-wrapper .ukmtheme-slide-item {
            position: relative;
            width: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        #hero-bxslider-wrapper .ukmtheme-slide-media {
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        #hero-bxslider-wrapper .ukmtheme-slide-img-link {
            display: block;
            width: 100%;
            text-decoration: none;
        }
        #hero-bxslider-wrapper .ukmtheme-slide-img {
            width: 100%;
            height: auto;
            display: block;
        }
        #hero-bxslider-wrapper .ukmtheme-slide-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.3) 60%, rgba(0,0,0,0.75) 100%);
            pointer-events: none;
            z-index: 2;
        }
        #hero-bxslider-wrapper .ukmtheme-slide-caption-wrap {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 5;
            display: flex;
            align-items: flex-end;
            justify-content: flex-start;
            padding: 24px 30px 48px;
            pointer-events: none;
        }
        #hero-bxslider-wrapper .ukmtheme-slide-caption-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }
        #hero-bxslider-wrapper .ukmtheme-slide-caption-box {
            background: transparent;
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
            max-width: 680px;
            padding: 0;
            border: none;
            box-shadow: none;
            pointer-events: auto;
        }
        #hero-bxslider-wrapper .ukmtheme-slide-title {
            color: #ffffff;
            font-family: "Poppins", Helvetica, Arial, sans-serif;
            font-size: 24px;
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: -0.3px;
            margin: 0 0 8px 0;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.7);
        }
        #hero-bxslider-wrapper .ukmtheme-slide-desc {
            color: #ffffff;
            font-family: "Inter", Helvetica, Arial, sans-serif;
            font-size: 15px;
            line-height: 1.6;
            margin: 0 0 14px 0;
            text-shadow: 0 1px 6px rgba(0, 0, 0, 0.7);
        }
        #hero-bxslider-wrapper .ukmtheme-slide-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: #263B97;
            color: #ffffff !important;
            text-decoration: none !important;
            font-weight: 600;
            font-size: 14px;
            padding: 9px 20px;
            border-radius: 6px;
            line-height: 1.5;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        }
        #hero-bxslider-wrapper .ukmtheme-slide-btn:hover {
            background-color: #1d2d75;
            transform: translateY(-1px);
            color: #ffffff !important;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.35);
        }
        #hero-bxslider-wrapper .ukmtheme-slide-cover-link {
            position: absolute;
            inset: 0;
            z-index: 6;
            text-indent: -9999px;
        }

        /* bxSlider Controls (Arrows) Styling */
        #hero-bxslider-wrapper .bx-wrapper .bx-controls-direction a {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 20;
            width: 44px;
            height: 44px;
            line-height: 44px;
            text-align: center;
            border-radius: 50%;
            text-indent: 0 !important;
            background-image: none !important;
            text-decoration: none !important;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-family: inherit;
            transition: all 0.25s ease;
            opacity: 0;
            pointer-events: auto;
            outline: none;
            background: rgba(15, 23, 42, 0.65);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        #hero-bxslider-wrapper:hover .bx-wrapper .bx-controls-direction a {
            opacity: 1;
        }
        #hero-bxslider-wrapper .bx-wrapper .bx-prev {
            left: 20px;
        }
        #hero-bxslider-wrapper .bx-wrapper .bx-next {
            right: 20px;
        }
        #hero-bxslider-wrapper .bx-wrapper .bx-controls-direction a:hover {
            background: #263B97;
            border-color: #263B97;
            color: #ffffff;
            transform: translateY(-50%) scale(1.08);
        }

        /* bxSlider Pager (Dots) Styling */
        #hero-bxslider-wrapper .bx-wrapper .bx-pager {
            position: absolute;
            bottom: 18px;
            left: 0;
            width: 100%;
            z-index: 20;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        #hero-bxslider-wrapper .bx-wrapper .bx-pager.bx-default-pager a {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 0 4px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.45);
            border: 1px solid rgba(0, 0, 0, 0.15);
            text-indent: -9999px;
            transition: all 0.3s ease;
            outline: none;
        }
        #hero-bxslider-wrapper .bx-wrapper .bx-pager.bx-default-pager a.active,
        #hero-bxslider-wrapper .bx-wrapper .bx-pager.bx-default-pager a:hover {
            background: #263B97;
            width: 26px;
            border-color: #263B97;
        }

        @media (max-width: 767px) {
            #hero-bxslider-wrapper .bx-wrapper .bx-controls-direction a {
                opacity: 0.85;
                width: 36px;
                height: 36px;
                line-height: 36px;
                font-size: 16px;
            }
            #hero-bxslider-wrapper .bx-wrapper .bx-prev {
                left: 10px;
            }
            #hero-bxslider-wrapper .bx-wrapper .bx-next {
                right: 10px;
            }
            #hero-bxslider-wrapper .ukmtheme-slide-caption-wrap {
                padding: 12px 16px 36px;
            }
            #hero-bxslider-wrapper .ukmtheme-slide-caption-box {
                padding: 0;
                max-width: 100%;
            }
            #hero-bxslider-wrapper .ukmtheme-slide-title {
                font-size: 16px;
                margin-bottom: 4px;
            }
            #hero-bxslider-wrapper .ukmtheme-slide-desc {
                font-size: 12px;
                line-height: 1.4;
                margin-bottom: 8px;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            #hero-bxslider-wrapper .ukmtheme-slide-btn {
                padding: 5px 12px;
                font-size: 12px;
            }
        }
    </style>

    <section class="ukmtheme-hero-slider-section <?php echo $slideshow_resize ? 'wrap uk-margin-medium-top uk-margin-medium-bottom' : ''; ?>">
        <div class="ukmtheme-slideshow-widget ukmtheme-bxslider-wrapper nav-light <?php echo $slideshow_resize ? 'uk-box-shadow-large uk-border-rounded uk-overflow-hidden' : ''; ?>" id="hero-bxslider-wrapper">
            <ul class="ukmtheme-bxslider" id="hero-bxslider">
                <?php foreach ( $slides as $slide ) : ?>
                    <li class="ukmtheme-slide-item">
                        <div class="ukmtheme-slide-media">
                            <?php if ( ! empty( $slide['link'] ) ) : ?>
                                <a href="<?php echo esc_url( $slide['link'] ); ?>" class="ukmtheme-slide-img-link" aria-label="<?php echo esc_attr( $slide['title'] ); ?>">
                                    <img src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" class="ukmtheme-slide-img">
                                </a>
                            <?php else : ?>
                                <img src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" class="ukmtheme-slide-img">
                            <?php endif; ?>

                            <?php if ( $slide['has_caption'] ) : ?>
                                <div class="ukmtheme-slide-overlay"></div>
                                <div class="ukmtheme-slide-caption-wrap">
                                    <div class="wrap uk-container ukmtheme-slide-caption-container">
                                        <div class="ukmtheme-slide-caption-box">
                                            <?php if ( ! empty( $slide['title'] ) ) : ?>
                                                <h2 class="ukmtheme-slide-title">
                                                    <?php echo esc_html( $slide['title'] ); ?>
                                                </h2>
                                            <?php endif; ?>

                                            <?php if ( ! empty( $slide['caption'] ) ) : ?>
                                                <p class="ukmtheme-slide-desc">
                                                    <?php echo esc_html( $slide['caption'] ); ?>
                                                </p>
                                            <?php endif; ?>

                                            <?php if ( ! empty( $slide['link'] ) ) : ?>
                                                <div>
                                                    <a href="<?php echo esc_url( $slide['link'] ); ?>" class="ukmtheme-slide-btn">
                                                        <span><?php esc_html_e( 'Ketahui Lebih Lanjut', 'ukmtheme' ); ?></span>
                                                        <span uk-icon="icon: arrow-right; ratio: 0.85"></span>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif ( ! empty( $slide['link'] ) ) : ?>
                                <a href="<?php echo esc_url( $slide['link'] ); ?>" class="ukmtheme-slide-cover-link" aria-label="<?php echo esc_attr( $slide['title'] ); ?>">
                                    <?php echo esc_html( $slide['title'] ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <script>
    (function($) {
        var sliderId = 'hero-bxslider';
        var wrapperId = 'hero-bxslider-wrapper';

        function initHeroBxSlider() {
            var $slider = $( '#' + sliderId );
            if ( ! $slider.length || typeof $.fn.bxSlider !== 'function' ) {
                return;
            }

            var existing = $slider.data( 'bxSlider' );
            if ( existing ) {
                try {
                    existing.destroySlider();
                } catch(e) {}
            }

            $slider.bxSlider({
                mode: 'fade',
                speed: 800,
                auto: true,
                pause: 6000,
                autoHover: true,
                controls: true,
                pager: true,
                adaptiveHeight: true,
                touchEnabled: true,
                preventDefaultSwipeX: false,
                stopAutoOnClick: true,
                nextText: '&#10095;',
                prevText: '&#10094;',
                onSliderLoad: function() {
                    $( '#' + wrapperId ).addClass( 'bx-slider-ready' );
                }
            });
        }

        function waitAndInit( retryCount ) {
            retryCount = retryCount || 0;
            if ( typeof $.fn.bxSlider === 'function' ) {
                initHeroBxSlider();
            } else if ( retryCount < 25 ) {
                setTimeout( function() {
                    waitAndInit( retryCount + 1 );
                }, 100 );
            }
        }

        if ( document.readyState === 'complete' || document.readyState === 'interactive' ) {
            waitAndInit();
        } else {
            $( document ).ready( function() {
                waitAndInit();
            });
        }
    })(jQuery);
    </script>

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
                                : get_template_directory_uri() . '/assets/images/dummy-960x640.svg';
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
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Slide-A.jpg' ); ?>" alt="Program Akademik" uk-cover class="uk-transition-scale-up uk-transition-opaque">
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
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Slide-B.jpg' ); ?>" alt="Penyelidikan & Inovasi" uk-cover class="uk-transition-scale-up uk-transition-opaque">
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
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Slide-C.jpg' ); ?>" alt="Kehidupan Kampus" uk-cover class="uk-transition-scale-up uk-transition-opaque">
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
                    <li><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder_slider_a.svg' ); ?>" alt=""></li>
                    <li><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder_slider_b.svg' ); ?>" alt=""></li>
                    <li><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder_slider_c.svg' ); ?>" alt=""></li>
                    <li><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder_slider_d.svg' ); ?>" alt=""></li>
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
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder_news.svg' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
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
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder_news.svg' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
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