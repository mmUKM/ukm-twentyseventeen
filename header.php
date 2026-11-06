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
<?php
if ( function_exists( 'block_template_part' ) ) {
    block_template_part( 'header-top-bar' );
}
?>
<div class="page-wrap">
<div id="header-wrap">
    <div id="header-wrap-overlay"></div>
    <div id="header" class="wrap">
        <!-- Desktop Header -->
        <div class="uk-visible@s uk-flex uk-flex-between uk-flex-middle header-desktop-container">
            <div class="header-left-brand uk-flex uk-flex-middle">
                <div class="header-logo">
                    <?php
                    $ukm_logo = get_theme_mod( 'ukmtheme_logo_image' );
                    if ( $ukm_logo ) : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo esc_url( $ukm_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php elseif ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-ukm-white.svg' ); ?>" height="65" width="130" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php endif; ?>
                </div>

                <div class="header-divider uk-visible@s"></div>

                <div id="ptj-name" class="header-titles">
                    <h2 id="ptj-name-title" class="uk-margin-remove"><?php bloginfo( 'name' ); ?></h2>
                    <?php if ( get_bloginfo( 'description' ) ) : ?>
                        <p id="ptj-name-sub-title" class="uk-margin-remove"><?php bloginfo( 'description' ); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="header-menu-toggle-desktop">
                <a href="#offcanvas-nav" uk-toggle class="uk-navbar-toggle header-toggle-btn" aria-label="<?php esc_attr_e( 'Menu', 'ukmtheme' ); ?>">
                    <span uk-navbar-toggle-icon></span>
                </a>
            </div>
        </div>

        <!-- Mobile Header -->
        <div class="uk-hidden@s header-mobile-container">
            <div class="header-mobile-top uk-flex uk-flex-between uk-flex-middle">
                <div class="header-mobile-logo">
                    <?php if ( $ukm_logo ) : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo esc_url( $ukm_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php elseif ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-ukm-white.svg' ); ?>" height="52" width="105" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="header-mobile-toggle">
                    <a href="#offcanvas-nav" uk-toggle class="uk-navbar-toggle header-toggle-btn" aria-label="<?php esc_attr_e( 'Menu', 'ukmtheme' ); ?>">
                        <span uk-navbar-toggle-icon></span>
                    </a>
                </div>
            </div>

            <div class="header-mobile-divider"></div>

            <div class="header-mobile-bottom">
                <h3 class="uk-margin-remove site-title-mobile"><?php bloginfo( 'name' ); ?></h3>
                <?php if ( get_bloginfo( 'description' ) ) : ?>
                    <p class="uk-margin-remove site-tagline-mobile"><?php bloginfo( 'description' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!-- Off-Canvas Mobile Navigation -->
<div id="offcanvas-nav" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar" style="background: #000034;">
        <button class="uk-offcanvas-close" type="button" uk-close aria-label="<?php esc_attr_e( 'Close menu', 'ukmtheme' ); ?>"></button>
        <div class="uk-margin-bottom uk-text-center">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-single-white.svg' ); ?>" height="50" width="90" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
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