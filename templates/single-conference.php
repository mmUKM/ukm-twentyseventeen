<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
?>
<!DOCTYPE html>
<?php echo '<!-- WP UKMTheme v-' . wp_get_theme()->get( 'Version' ) . ' by Jamaludin Rajalu -->'; ?>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="header-wrap">
    <div id="header-wrap-overlay"></div>
    <div id="header" class="wrap" uk-grid>
        <div class="uk-width-1-3@s uk-visible@s">
            <?php if ( get_theme_mod( 'ukmtheme_logo_image' ) ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php echo get_theme_mod( 'ukmtheme_logo_image' ); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php echo get_template_directory_uri() . '/images/logo-u-watan.png'; ?>" height="60" width="379" alt="<?php echo get_bloginfo('name'); ?>">
                </a>
            <?php endif; ?>
        </div>
        <div class="uk-width-1-3@s uk-hidden@s">
            <div uk-grid>
                <div class="uk-width-1-1 uk-padding-remove">
                    <img class="uk-align-center" src="<?php echo get_template_directory_uri() . '/images/logo-mobile.png'; ?>" alt="alt"/>
                </div>
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <h6 class="uk-text-center" id="ptj-name-title-mobile"><?php echo bloginfo( 'name' ); ?></h6>
                </div>
            </div>
        </div>
        <div class="uk-width-2-3@s uk-padding-remove uk-margin-remove">
            <?php
                wp_nav_menu(array(
                    'theme_location'    => 'main',
                    'menu'              => 'Main Navigation',
                    'container_id'      => 'cssmenu',
                    'fallback_cb'       => false,
                    'walker'            => new CSS_Menu_Maker_Walker()
                ));
            ?>
        </div>
    </div>
</div>
<div id="ptj-name-container">
    <div id="ptj-name" class="wrap uk-visible@s" uk-grid>
        <div class="uk-width-auto@s">
            <h4 id="ptj-name-title"><?php the_title(); ?></h4>
        </div>
        <div class="uk-width-expand@s uk-padding-remove uk-margin-auto@s">
            <h4 id="ptj-name-sub-title">&nbsp;<?php echo bloginfo( 'description' ); ?></h4>
        </div>
    </div>
</div>
<div class="wrap column">
    <div class="large-11-12 small-11-12">
        <div id="ConferenceMenu">
            <?php
            $content_1 = get_post_meta( get_the_ID(), 'ut_conference_title_1_hide', 1 );
            $content_2 = get_post_meta( get_the_ID(), 'ut_conference_title_2_hide', 1 );
            $content_3 = get_post_meta( get_the_ID(), 'ut_conference_title_3_hide', 1 );
            $content_4 = get_post_meta( get_the_ID(), 'ut_conference_title_4_hide', 1 );
            $content_5 = get_post_meta( get_the_ID(), 'ut_conference_title_5_hide', 1 );
            $content_6 = get_post_meta( get_the_ID(), 'ut_conference_title_6_hide', 1 );
            $content_7 = get_post_meta( get_the_ID(), 'ut_conference_title_7_hide', 1 );
            $content_8 = get_post_meta( get_the_ID(), 'ut_conference_title_8_hide', 1 );
            $content_9 = get_post_meta( get_the_ID(), 'ut_conference_title_9_hide', 1 );
            $content_10 = get_post_meta( get_the_ID(), 'ut_conference_title_10_hide', 1 );
            ?>

        </div>
    </div>
</div>
<div class="uk-container uk-margin-medium-top uk-margin-medium-bottom">
    <ul class="uk-flex-center" uk-tab>
        <li><a href=""><?php _e( 'Home', 'ukmtheme' ); ?></a></li>
        <?php
        // Title #1
        if ( $content_1 ) { ?>
            <li><a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_1', true ); ?></a></li>
        <?php }
        // Title #2
        if ( $content_2 ) { ?>
            <li><a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_2', true ); ?></a></li>
        <?php }
        // Title #3
        if ( $content_3 ) { ?>
            <li><a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_3', true ); ?></a></li>
        <?php }
        // Title #4
        if ( $content_4 ) { ?>
            <li><a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_4', true ); ?></a></li>
        <?php }
        // Title #5
        if ( $content_5 ) { ?>
            <li><a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_5', true ); ?></a></li>
        <?php }
        // Title #6
        if ( $content_6 ) { ?>
            <li><a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_6', true ); ?></a></li>
        <?php }
        // Title #7
        if ( $content_7) { ?>
            <li><a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_7', true ); ?></a></li>
        <?php }
        // Title #8
        if ( $content_8 ) { ?>
            <li><a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_8', true ); ?></a></li>
        <?php }
        // Title #9
        if ( $content_9 ) { ?>
            <li><a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_9', true ); ?></a></li>
        <?php }
        // Title #2
        if ( $content_10 ) { ?>
            <li><a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_10', true ); ?></a></li>
        <?php }
        ?>
    </ul>
    <ul class="uk-switcher uk-margin">
        <li>
            <?php while ( have_posts() ) : the_post(); ?>
            <h1 style="margin:0;"><?php the_title(); ?></h1>
            <h3 style="margin:0 0 20px 0;">
                <?php _e('Date:&nbsp;','ukmtheme'); ?><?php echo get_post_meta( get_the_ID(), 'ut_conference_date_start', true ); ?>
                &nbsp;-&nbsp;
                <?php echo get_post_meta( get_the_ID(), 'ut_conference_date_end', true ); ?><br>
                <?php _e('Venue:&nbsp;','ukmtheme'); ?><?php echo get_post_meta( get_the_ID(), 'ut_conference_venue', true ); ?>
            </h3>
            <!--Slideshow for Banner-->
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow>
                <?php ut_conference_slideshow( 'ut_conference_slide_image', 'full' ); ?>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
            </div>
            <hr><!--Introduction-->
            <h2><?php _e( 'Introduction', 'ukmtheme' ); ?></h2>
            <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_introduction', true ) ); ?>
            <hr><!--Keynote Speaker-->
            <h2><?php _e( 'Speakers', 'ukmtheme' ); ?></h2>
            <div class="uk-slider-container-offset" uk-slider>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                <?php ut_conference_keynote( 'ut_conference_keynote_image', 'full' ); ?>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>
            </div>
            <div class="uk-margin-top uk-margin-bottom">
                <hr><!--Organizer-->
                <h2><?php _e( 'Organiser', 'ukmtheme' ); ?></h2>
                <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_organizer', true ) ); ?>
            </div>
            <?php endwhile; ?>
        </li>
        <?php
        // Content #1
        if ( $content_1 ) {
        ?>
        <li>
            <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_1', true ); ?></h1>
            <?php
            $wysiwyg_1 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_1', true ) );
            echo $wysiwyg_1;
            ?>
        </li>
        <?php
        }
        // Content #2
        if ( $content_2 ) {
        ?>
        <li>
            <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_2', true ); ?></h1>
            <?php
            $wysiwyg_2 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_2', true ) );
            echo $wysiwyg_2;
            ?>
        </li>
        <?php
        }
        // Content #3
        if ( $content_3 ) {
        ?>
        <li>
            <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_3', true ); ?></h1>
            <?php
            $wysiwyg_3 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_3', true ) );
            echo $wysiwyg_3;
            ?>
        </li>
        <?php
        }
        // Content #4
        if ( $content_4 ) {
        ?>
        <li>
            <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_4', true ); ?></h1>
            <?php
            $wysiwyg_4 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_4', true ) );
            echo $wysiwyg_4;
            ?>
        </li>
        <?php
        }
        // Content #5
        if ( $content_5 ) {
        ?>
        <li>
            <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_5', true ); ?></h1>
            <?php
            $wysiwyg_5 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_5', true ) );
            echo $wysiwyg_5;
            ?>
        </li>
        <?php
        }
        // Content #6
        if ( $content_6 ) {
        ?>
        <li>
            <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_6', true ); ?></h1>
            <?php
            $wysiwyg_6 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_6', true ) );
            echo $wysiwyg_6;
            ?>
        </li>
        <?php
        }
        // Content #7
        if ( $content_7 ) {
        ?>
        <li>
            <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_7', true ); ?></h1>
            <?php
            $wysiwyg_7 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_7', true ) );
            echo $wysiwyg_7;
            ?>
        </li>
        <?php
        }
        // Content #8
        if ( $content_8 ) {
        ?>
        <li>
            <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_8', true ); ?></h1>
            <?php
            $wysiwyg_8 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_8', true ) );
            echo $wysiwyg_8;
            ?>
        </li>
        <?php
        } ?>
        <li>
        <h1><?php _e( 'Gallery', 'ukmtheme' ); ?></h1>
        <p><?php ut_lightbox_gallery( 'ut_conference_gallery', 'post-thumbnail' ); ?></p>
        </li>
        <?php
        // Content #9
        if ( $content_9 ) {
        ?>
        <li>
            <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_9', true ); ?></h1>
            <?php
            $wysiwyg_9 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_9', true ) );
            echo $wysiwyg_9;
            ?>
        </li>
        <?php
        }
        // Content #10
        if ( $content_10 ) {
        ?>
        <li>
            <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_10', true ); ?></h1>
            <?php
            $wysiwyg_10 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_10', true ) );
            echo $wysiwyg_10;
            ?>
        </li>
        <?php
        } ?>
    </ul>
</div>
<div id="footer">
    <div class="uk-container">
        <div class="uk-grid-divider uk-margin-top uk-child-width-expand@s" uk-grid>
            <div>
                <?php
                    $wysiwyg_footer_1 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_footer_1', true ) );
                    echo $wysiwyg_footer_1;
                ?>
            </div>
            <div>
                <?php
                    $wysiwyg_footer_2 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_footer_2', true ) );
                    echo $wysiwyg_footer_2;
                ?>
            </div>
            <div>
                <?php
                    $wysiwyg_footer_3 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_footer_3', true ) );
                    echo $wysiwyg_footer_3;
                ?>
            </div>
        </div>
        <div class="copyright-with-navigation">
            <div class="wrap column">
                <div class="large-12-12">
                    <p class="ut-copyright"><?php _e( 'Copyright &copy;&nbsp;', 'ukmtheme' ); ?><?php echo date( 'Y' ); ?>&nbsp;<?php _e( 'Universiti Kebangsaan Malaysia', 'ukmtheme' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>