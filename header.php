<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<?php // get_template_part( 'inc/theme', 'css' ); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-wrap">
<header class="header-wrap theme-color">
  <div class="header">
    <div class="wrap column">
      <div class="col-6-12 sm-hidden logo">
        <?php if ( get_theme_mod( 'ukmtheme_logo_image' ) ) : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php echo get_theme_mod( 'ukmtheme_logo_image' ); ?>" alt="<?php echo get_bloginfo('name'); ?>">
          </a>
        <?php else : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php echo get_template_directory_uri() . '/img/logo-white-text.svg'; ?>" alt="<?php echo get_bloginfo('name'); ?>">
          </a>
        <?php endif; ?>
        <div class="logo-triangle"></div>
      </div>
      <div class="col-6-12">
        <div class="column">
          <div class="col-10-12">
            <?php
              wp_nav_menu(array(
                'theme_location'  => 'top',
                'menu'            => 'Top Navigation',
                'menu_class'      => 'top-nav',
              ));
            ?>
          </div>
          <div class="col-2-12 sm-hidden">
            <?php get_template_part( 'templates/off', 'canvas-search' );?>
          </div>
        </div>
        <div class="column">
          <h1 class="site-name"><?php echo bloginfo( 'name' ); ?></h1>
        </div>
      </div>
  </div>
</header>
<nav class="main-nav" role="navigation">
  <div class="wrap column">
    <div class="col-11-12">
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
    <div class="col-1-12 sm-hidden">
    <?php get_template_part( 'templates/off', 'canvas-tools' );?>
    </div>
  </div>
</nav>