<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
?>
<!DOCTYPE html>
<?php echo '<!-- WP UKMTheme v-' . wp_get_theme()->get( 'Version' ) . ' oleh Jamaludin Rajalu -->'; ?>

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
                    <img src="<?php echo get_template_directory_uri() . '/img/logo-u-watan.png'; ?>" height="60" width="379" alt="<?php echo get_bloginfo('name'); ?>">
                </a>
            <?php endif; ?>
        </div>
        <div class="uk-width-1-3@s uk-hidden@s">
            <div uk-grid>
                <div class="uk-width-1-1 uk-padding-remove">
                    <img class="uk-align-center" src="<?php echo get_template_directory_uri() . '/img/logo-mobile.png'; ?>" alt="alt"/>
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
            <h4 id="ptj-name-title"><?php echo bloginfo( 'name' ); ?></h4>
        </div>
        <div class="uk-width-expand@s uk-padding-remove uk-margin-auto@s">
            <h4 id="ptj-name-sub-title">&nbsp;<?php echo bloginfo( 'description' ); ?></h4>
        </div>
    </div>
</div>