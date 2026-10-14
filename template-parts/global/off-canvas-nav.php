<?php
/**
 * Off-canvas Navigation Template Part
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<a href="#main-nav" class="main-nav-menu-icon" uk-toggle aria-label="<?php esc_attr_e( 'Menu', 'ukmtheme' ); ?>">
    <span class="uk-visible@s"><?php esc_html_e( 'MENU', 'ukmtheme' ); ?></span>
    <span uk-icon="icon: menu"></span>
</a>

<div id="main-nav" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close aria-label="<?php esc_attr_e( 'Close', 'ukmtheme' ); ?>"></button>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'main',
            'menu'           => 'Main Navigation',
            'menu_class'     => 'uk-nav uk-nav-default uk-nav-parent-icon',
            'fallback_cb'    => false,
            'walker'         => new CSS_Menu_Maker_Walker(),
        ) );
        ?>
    </div>
</div>