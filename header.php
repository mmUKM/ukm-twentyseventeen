<?php
/**
 * The header for our theme
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<!-- WP UKMTheme v-<?php echo esc_attr( wp_get_theme()->get( 'Version' ) ); ?> oleh Jamaludin Rajalu -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-wrap">
<div id="header-wrap">
    <div id="header-wrap-overlay"></div>
    <div id="header" class="wrap uk-flex-middle" uk-grid>
        <!-- Desktop Logo -->
        <div class="uk-width-1-3@s uk-visible@s uk-padding-remove-left">
            <?php if ( get_theme_mod( 'ukmtheme_logo_image' ) ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php echo esc_url( get_theme_mod( 'ukmtheme_logo_image' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/logo-single-black.svg' ); ?>" height="60" width="110" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                </a>
            <?php endif; ?>
        </div>

        <!-- Mobile Header -->
        <div class="uk-width-1-1 uk-hidden@s">
            <div class="uk-flex uk-flex-between uk-flex-middle uk-padding-small">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/logo-single-black.svg' ); ?>" height="45" width="85" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>
                </a>
                <div class="uk-flex uk-flex-middle">
                    <a href="#offcanvas-nav" uk-toggle class="uk-button uk-button-default uk-button-small uk-margin-small-left" aria-label="<?php esc_attr_e( 'Menu', 'ukmtheme' ); ?>">
                        <span uk-icon="menu"></span>
                    </a>
                </div>
            </div>
            <div class="uk-padding-small uk-padding-remove-top uk-text-center">
                <h6 class="uk-margin-remove" id="ptj-name-title-mobile"><?php bloginfo( 'name' ); ?></h6>
            </div>
        </div>

        <!-- Desktop Title & Description -->
        <div class="uk-width-2-3@s uk-flex uk-flex-middle uk-flex-right uk-visible@s">
            <div id="ptj-name" class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-auto@s">
                    <h4 id="ptj-name-title" class="uk-margin-remove"><?php bloginfo( 'name' ); ?></h4>
                </div>
                <?php if ( get_bloginfo( 'description' ) ) : ?>
                <div class="uk-width-expand@s uk-margin-remove">
                    <h4 id="ptj-name-sub-title" class="uk-margin-remove">&nbsp;<?php bloginfo( 'description' ); ?></h4>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<nav id="navigation-menu" class="uk-navbar-container uk-visible@s" aria-label="<?php esc_attr_e( 'Main Menu', 'ukmtheme' ); ?>">
    <div class="wrap" uk-navbar>
        <div class="uk-navbar-left">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main',
                'menu'           => 'Main Navigation',
                'container'      => false,
                'menu_class'     => 'uk-navbar-nav',
                'fallback_cb'    => 'ukmtheme_fallback_menu',
                'walker'         => new UKM_UIkit_Navbar_Walker(),
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'          => 4,
            ) );
            ?>
        </div>
    </div>
</nav>

<!-- Off-Canvas Mobile Navigation -->
<div id="offcanvas-nav" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close aria-label="<?php esc_attr_e( 'Close menu', 'ukmtheme' ); ?>"></button>
        <div class="uk-margin-bottom uk-text-center">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/logo-single-white.svg' ); ?>" height="50" width="90" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
            <h5 class="uk-margin-small-top"><?php bloginfo( 'name' ); ?></h5>
        </div>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'main',
            'menu'           => 'Main Navigation',
            'container'      => false,
            'menu_class'     => 'uk-nav uk-nav-default uk-nav-parent-icon',
            'items_wrap'     => '<ul id="%1$s" class="%2$s" uk-nav>%3$s</ul>',
            'fallback_cb'    => 'ukmtheme_fallback_menu',
            'walker'         => new UKM_UIkit_Offcanvas_Walker(),
            'depth'          => 4,
        ) );
        ?>
    </div>
</div>