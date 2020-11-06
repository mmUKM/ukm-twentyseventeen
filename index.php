<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>

<?php if ( is_home() ) { ?>
    <?php // SLIDESHOW ?>
    <div
        id="ut-slideshow"
        class="uk-slidenav-position"
        data-uk-slideshow="{animation:'slice-up-down', autoplay:true, autoplayInterval:6000}"
        style="<?php if ( get_theme_mod( 'ukmtheme_resize_slideshow' ) == 1 ) { ?> max-width: 960px; margin: 30px auto; box-shadow: 0 1px 5px rgba(0,0,0,.5); <?php } ?>
    ">
        <ul class="uk-slideshow">
            <?php
                $args = array(
                    'post_type'       => 'slideshow',
                    'posts_per_page'   => 20,
                    'orderby'         => 'menu_order'
                );

                $slideshow = new WP_Query( $args );

                if ( $slideshow->have_posts() ) : while ( $slideshow->have_posts() ) : $slideshow->the_post(); 
            ?>
            <li>
                <a href="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_link', true ); ?>">
                    <img src="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_image', true ); ?>" alt="<?php the_title(); ?>" style="width: 100%;">
                </a>
                <?php $caption = get_post_meta( get_the_ID(), 'ut_slideshow_caption_hide', true ); ?>
                <?php if ( $caption == true ) { ?>
                <div class="uk-overlay-panel uk-overlay-bottom uk-overlay-fade">
                    <div class="wrap slideshow">
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo get_post_meta( get_the_ID(), 'ut_slideshow_caption', true ); ?></p>
                    </div>
                </div>
                <?php } ?>
            </li>            
            <?php endwhile; else: ?>
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-slideshow.jpg" alt="Slideshow Placeholder" style="width: 100%;">
            </li>
            <?php endif; ?>
        </ul>
        <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)"></a>
        <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)"></a>
    </div>

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
            <ul id="pengumuman" class="uk-slider uk-grid uk-grid-width-medium-1-3 uk-grid-width-small-1-3 uk-grid-collapse" data-uk-grid-match="{target:'.pengumuman-list'}">
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
                        <div class="large-3-12 small-3-12 pengumuman-item-image">
                            <img src="<?php echo get_template_directory_uri() . '/img/icon-announcement.svg'; ?>">
                        </div>
                        <div class="large-9-12 small-9-12 pengumuman-item-content">
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
            <div class="uk-slidenav-position" data-uk-slider="{ autoplay: true }">

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
                        
                        <li class="frontpage-news-widget">
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
        // START FRONTPAGE TAB
        if ( get_theme_mod( 'ukmtheme_frontpage_tabber' ) == 1 ) { ?>
        <div class="wrap padding-top padding-bottom device-padding ut-tabber-wrap">

            <div class="uk-button-group ut-tabber-button" data-uk-switcher="{connect:'#ut-tabber'}">
                <?php

                    $args = array(
                    'post_type'       => 'tab',
                    'posts_per_page'  => 10,
                    'orderby'         => 'menu_order',
                    'order'           => 'ASC'
                    );

                $tabber = new WP_Query( $args );

                while ( $tabber->have_posts() ) : $tabber->the_post(); ?>
                    <button class="uk-button uk-button-large" type="button"><?php the_title(); ?></button>
                <?php endwhile; ?>
            </div>

            <ul id="ut-tabber" class="uk-switcher uk-margin">
                <?php while ( $tabber->have_posts() ) : $tabber->the_post(); ?>
                    <li class="ut-tabber-content">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_content(); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php } //END TAB ?>
    <?php
    // START LAYOUT BUILDER BY SITEORIGIN
    if ( get_theme_mod( 'ukmtheme_frontpage_one_box' ) == 1 ) {
        if ( dynamic_sidebar( 'sidebar-2' ) ) : else : endif;
    } // END LAYOUT BUILDER BY SITEORIGIN ?>

    <?php
    // START 2 BLOCK WIDGET
    if ( get_theme_mod( 'ukmtheme_frontpage_two_box' ) == 1 ) { ?>
    <div class="wrap padding-top padding-bottom device-padding">
        <div class="uk-grid" data-uk-grid-match="">
            <?php if (dynamic_sidebar( 'sidebar-3' )) : else : ?><?php endif; ?>
        </div>
    </div>
    <?php } //END 2 BLOCK WIDGET?>
    <?php
    // START 3 BLOCK WIDGET
    if ( get_theme_mod( 'ukmtheme_frontpage_three_box' ) == 1 ) { ?>
    <div class="wrap padding-top padding-bottom device-padding">
        <div class="uk-grid" data-uk-grid-match="">
            <?php if (dynamic_sidebar( 'sidebar-4' )) : else : ?><?php endif; ?>
        </div>
    </div>
    <?php } //END 3 BLOCK WIDGET?>
<?php } else { // END IF IS_HOME ?>
    <div class="wrap column device-padding">
        <article class="article large-8-12">
            <?php while ( have_posts() ) : the_post(); ?>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
            <?php endwhile;?>
            <?php get_template_part('templates/content','edit' ); ?>
        </article>
        <aside class="aside large-4-12">
            <div class="uk-panel uk-panel-box">
                <?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?><?php endif; ?>
            </div>
        </aside>
    </div>
<?php } ?>

<?php get_footer(); ?>
