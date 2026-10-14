<?php
/**
 * Off-canvas Search Template Part
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<a href="#ut-search" class="main-nav-menu-icon" uk-toggle aria-label="<?php esc_attr_e( 'Search', 'ukmtheme' ); ?>">
    <span uk-icon="icon: search"></span>
</a>

<div id="ut-search" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar offcanvas-tools">
        <button class="uk-offcanvas-close" type="button" uk-close aria-label="<?php esc_attr_e( 'Close', 'ukmtheme' ); ?>"></button>
        <h4 class="uk-margin-top"><?php esc_html_e( 'Search', 'ukmtheme' ); ?></h4>
        <form role="search" method="get" class="uk-search uk-search-default uk-width-1-1 uk-margin-bottom" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <span uk-search-icon></span>
            <input class="uk-search-input" type="search" placeholder="<?php esc_attr_e( 'Search...', 'ukmtheme' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s">
        </form>
        <?php
        if ( is_active_sidebar( 'sidebar-12' ) ) {
            dynamic_sidebar( 'sidebar-12' );
        }
        ?>
    </div>
</div>