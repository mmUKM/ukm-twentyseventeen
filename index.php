<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>

<?php if ( is_home() ) { ?>
    <?php // SLIDESHOW ?>
    <div style="<?php if ( get_theme_mod( 'ukmtheme_resize_slideshow' ) == 1 ) { ?> max-width: 1140px; margin: 30px auto; box-shadow: 0 1px 5px rgba(0,0,0,.5); <?php } ?>">
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio: 1440:560; animation: push">
            <ul class="uk-slideshow-items">
                <?php
                    $args = array(
                        'post_type'       => 'slideshow',
                        'posts_per_page'  => 10,
                        'orderby'         => 'menu_order'
                    );

                    $slideshow = new WP_Query( $args );

                    if ( $slideshow->have_posts() ) : while ( $slideshow->have_posts() ) : $slideshow->the_post(); 
                ?>
                <li>
                    <a href="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_link', true ); ?>">
                        <img src="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_image', true ); ?>" alt="<?php the_title(); ?>">
                    </a>
                </li>            
                <?php endwhile; else: ?>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-slideshow-a.jpg" alt="" uk-cover>
                </li>
                <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-slideshow-b.jpg" alt="" uk-cover>
                </li>
                <?php endif; ?>
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
        </div>
    </div><!--end slideshow-->
    <?php
    // SLIDESET
    if ( get_theme_mod( 'ukmtheme_frontpage_slideset' ) == 1 ) { ?>
    <div style="<?php if ( get_theme_mod( 'ukmtheme_resize_slideshow' ) == 1 ) { ?> max-width: 1140px; margin: 30px auto; box-shadow: 0 1px 5px rgba(0,0,0,.5); <?php } ?>">
        <div uk-slider>
            <ul class="uk-slider-items uk-child-width-1-6@s uk-child-width-1-4">
                <?php
                    $args = array(
                        'post_type'       => 'slideset',
                        'posts_per_page'  => 10,
                        'orderby'         => 'menu_order',
                        'order'           => 'ASC'
                    );

                    $slideset = new WP_Query( $args );

                    if ( $slideset->have_posts() ) : while ( $slideset->have_posts() ) : $slideset->the_post(); ?>
                <li>
                    <a href="<?php echo get_post_meta(get_the_ID(),'ut_slideset_link',true); ?>" title="<?php the_title(); ?>">
                        <img src="<?php echo get_post_meta(get_the_ID(),'ut_slideset_image',true); ?>" alt="<?php the_title(); ?>">
                    </a>
                </li>
                <?php endwhile; else: ?>
                    <li><a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_a.svg'; ?>" alt=""></a></li>
                    <li><a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_b.svg'; ?>" alt=""></a></li>
                    <li><a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_c.svg'; ?>" alt=""></a></li>
                    <li><a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_d.svg'; ?>" alt=""></a></li>
                    <li><a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_a.svg'; ?>" alt=""></a></li>
                    <li><a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_b.svg'; ?>" alt=""></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div><!--end slideset-->
    <?php } // END SLIDESET ?>
    <?php
    // LATEST NEWS START
    if ( get_theme_mod( 'ukmtheme_frontpage_basic' ) == 1 ) { ?>
    <div class="uk-section uk-section-muted">
        <div class="uk-container">
            <div class="frontpage-news-title">
                <?php if ( get_theme_mod( 'ukmtheme_frontpage_news_title_edit' ) == 0 ) { ?>
                    <h2 class="uk-heading-line uk-text-center uk-padding uk-padding-remove-top uk-margin-remove-top"><span>BERITA TERKINI</span></h2>
                <?php } else { ?>
                    <h2 class="uk-heading-line uk-text-center uk-padding uk-padding-remove-top uk-margin-remove-top"><span><?php echo get_theme_mod( 'ukmtheme_frontpage_news_title' ); ?></span></h2>
                <?php } ?>
            </div>
            <div class="uk-slider-container-offset" uk-slider>
                <div class="uk-position-relative uk-visible-toggle uk-dark" tabindex="-1">
                    <ul class="uk-slider-items uk-child-width-1-3@s uk-child-width-1-2 uk-grid" uk-grid uk-height-match="target: > li > .uk-card">
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
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top">
                                    <?php
                                        if ( has_post_thumbnail() ) { ?> <img src="<?php the_post_thumbnail_url(); ?>" width="800" height="450"> <?php }
                                        else { echo '<img src="' . get_template_directory_uri() . '/img/placeholder_news.svg" height="auto" width="auto"/>'; }
                                    ?>
                                </div>
                                <div class="uk-card-body">
                                    <p><a href="<?php echo get_permalink(); ?>" class="uk-link-heading"><?php the_title(); ?></a></p>
                                </div>
                            </div>
                        </li>

                        <?php endwhile; ?>
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>
            </div>
            <a class="uk-button uk-button-secondary uk-width-1-6@s uk-width-1-2 uk-align-center" href="<?php echo get_post_type_archive_link('news'); ?>">ARKIB</a>
        </div>
    </div>
    <?php } // END LATEST NEWS ?>
    <?php
    // LATEST THUMBNAIL
    if ( get_theme_mod( 'ukmtheme_frontpage_news_thumbnail' ) == 1 ) { ?>
    <div class="uk-container uk-padding">
        <div class="frontpage-news-title">
            <?php if ( get_theme_mod( 'ukmtheme_frontpage_news_title_edit' ) == 0 ) { ?>
                <h2 class="uk-heading-line uk-text-center uk-padding uk-padding-remove-top uk-margin-remove-top"><span>BERITA TERKINI</span></h2>
            <?php } else { ?>
                <h2 class="uk-heading-line uk-text-center uk-padding uk-padding-remove-top uk-margin-remove-top"><span><?php echo get_theme_mod( 'ukmtheme_frontpage_news_title' ); ?></span></h2>
            <?php } ?>
        </div>
        <div class="uk-child-width-1-3@s uk-grid-small uk-grid-match" uk-grid>

                <?php 
                    $news = get_theme_mod( 'ukmtheme_frontpage_news' );
                    $loop = new WP_Query( 
                        array(
                        'post_type' => 'news',
                        'posts_per_page' => $news
                        )
                    );

                    while ( $loop->have_posts() ) : $loop->the_post();

                ?>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <?php
                            if ( has_post_thumbnail() ) { ?> <img src="<?php the_post_thumbnail_url(); ?>" width="800" height="450"> <?php }
                            else { echo '<img src="' . get_template_directory_uri() . '/img/placeholder_news.svg" height="auto" width="auto"/>'; }
                        ?>
                    </div>
                    <div class="uk-card-body">
                        <p><a href="<?php echo get_permalink(); ?>" class="uk-link-heading"><?php the_title(); ?></a></p>
                    </div>
                </div>
                <?php endwhile; ?>
        </div>
        <a class="uk-button uk-button-secondary uk-width-1-6@s uk-width-1-2 uk-align-center" href="<?php echo get_post_type_archive_link('news'); ?>">ARKIB</a>
    </div>
    <?php } // END LATEST NEWS THUMBNAIL ?>
    <?php // YOUTUBE PLAYLIST
    if ( get_theme_mod( 'ukmtheme_frontpage_ytv' ) == 1 ) { ?>
        <div id="frontpage-video-playlist" class="uk-container">
            <?php if ( get_theme_mod( 'ukmtheme_frontpage_ytv_title_edit' ) == 0 ) { ?>
            <h2 class="uk-heading-line uk-text-center uk-padding uk-padding-remove-top uk-margin-remove-top"><span>PTMUKM-TV</span></h2>
            <?php } else { ?>
                <h3 class="uk-h3"><?php echo get_theme_mod( 'ukmtheme_frontpage_ytv_title' ); ?></h3>
            <?php } ?>
            <div id="ptmukm-tv-responsive"></div>
            <script>
                    window.onload = function(){
                        
                        window.controller = new YTV('ptmukm-tv-responsive', {
                            <?php echo get_theme_mod( 'ukmtheme_frontpage_ytv_user' ); ?>,
                            accent: '#ffa500',
                            browsePlaylists: true,
                            autoplay: false,
                            playerTheme: 'light',
                            listTheme: 'light',
                            responsive: true
                        });
                
                    };
                </script>
        </div>
    <?php } //END YOUTUBE PLAYLIST ?>
<?php } //is_home() ?>
<?php get_footer(); ?>