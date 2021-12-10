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
<div class="page-wrap">
<?php if ( get_theme_mod( 'ukmtheme_helpdesk_header' ) == 1 ) { ?>
<header class="header-wrap">
    <div class="header">
        <div class="wrap column">
            <div class="large-6-12 small-hidden logo">
                <div class="custom-header-logo-wrap">
                    <div class="ukm-custom-logo">
                        <?php if ( get_theme_mod( 'ukmtheme_logo_image' ) ) : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img src="<?php echo get_theme_mod( 'ukmtheme_logo_image' ); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                            </a>
                        <?php else : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img src="<?php echo get_template_directory_uri() . '/img/logo-u-watan.png'; ?>" height="90" width="400" alt="<?php echo get_bloginfo('name'); ?>">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="ukm-site-name">
                        <?php /** Header Title */
                            if ( get_theme_mod( 'ukmtheme_hide_title' ) == 0 ) { ?>
                            <div class="column">
                                <h1 class="site-name uk-float-left" style="font-size:<?php echo get_theme_mod( 'ukmtheme_title_size' ); ?>"><?php echo bloginfo( 'name' ); ?></h1>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="large-4-12">
                <div class="column top-nav-wrap uk-vertical-align-middle">
                    <div class="custom-header-top-nav">
                        <div class="large-9-12">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'top',
                                    'menu'            => 'Top Navigation',
                                    'menu_class'      => 'top-nav',
                                ));
                            ?>
                        </div>
                        <div class="large-3-12">
                            <?php get_template_part( 'templates/off', 'canvas-tools' ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="large-2-12 custom-header-right-image">
                        <?php if ( get_theme_mod( 'ukmtheme_custom_header_image' ) ) { ?>
                            <img src="<?php echo get_theme_mod( 'ukmtheme_custom_header_image' ); ?>" height="136" width="170" alt="<?php echo get_bloginfo('name'); ?>" class="uk-float-right">
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri() . '/img/placeholder-custom-header.png'; ?>"  height="136" width="150" alt="<?php echo get_bloginfo('name'); ?>" class="uk-float-right">
                        <?php } ?>
            </div>
    </div>
</header>
<?php } else { //END CUSTOM HEADER ?>
    <header class="header-wrap">
    <div class="header">
        <div class="wrap column">
            <div class="large-6-12 small-hidden logo">
                <div class="ukm-site-logo">
                    <?php if ( get_theme_mod( 'ukmtheme_logo_image' ) ) : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo get_theme_mod( 'ukmtheme_logo_image' ); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img src="<?php echo get_template_directory_uri() . '/img/logo-u-watan.png'; ?>" height="90" width="400" alt="<?php echo get_bloginfo('name'); ?>">
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="large-6-12">
                <div class="column top-nav-wrap">
                    <div class="large-10-12 small-7-12">
                        <?php
                            wp_nav_menu(array(
                                'theme_location'  => 'top',
                                'menu'            => 'Top Navigation',
                                'menu_class'      => 'top-nav',
                            ));
                        ?>
                    </div>
                    <div class="large-2-12 small-5-12">
                        <?php get_template_part( 'templates/off', 'canvas-tools' ); ?>
                    </div>
                </div>
                <?php /** Header Title */
                if ( get_theme_mod( 'ukmtheme_hide_title' ) == 0 ) { ?>
                <div class="column">
                    <h1 class="site-name" style="font-size:<?php echo get_theme_mod( 'ukmtheme_title_size' ); ?>"><?php echo bloginfo( 'name' ); ?></h1>
                </div>
                <?php } ?>
            </div>
    </div>
</header>
<?php } // END DEFAULT HEADER ?>
<nav class="main-nav" role="navigation" data-uk-sticky="{media:'(min-width: 959px)'}">
    <div class="wrap column">
        <div class="large-11-12 small-11-12">
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
        <div class="large-1-12 small-1-12">
        <?php get_template_part( 'templates/off', 'canvas-search' );?>
        </div>
    </div>
</nav>