<?php
/**
 * Off-canvas Tools Template Part
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<a href="#main-tools" class="top-nav-tool" uk-toggle aria-label="<?php esc_attr_e( 'Language & Tools', 'ukmtheme' ); ?>">
    <span uk-icon="icon: world; ratio: 1.2"></span>
</a>

<div id="main-tools" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar offcanvas-tools">
        <button class="uk-offcanvas-close" type="button" uk-close aria-label="<?php esc_attr_e( 'Close', 'ukmtheme' ); ?>"></button>
        
        <?php
        // Plugin: Polylang switcher
        if ( 1 == get_theme_mod( 'ukmtheme_polylang_switcher' ) && function_exists( 'pll_the_languages' ) ) : ?>
            <h4 class="uk-margin-top"><?php esc_html_e( 'Language', 'ukmtheme' ); ?></h4>
            <ul class="uk-list uk-list-divider">
                <?php pll_the_languages(); ?>
            </ul>
        <?php endif; ?>

        <?php
        // Plugin: Google language switcher
        if ( 1 == get_theme_mod( 'ukmtheme_google_switcher' ) ) : ?>
            <h4 class="uk-margin-top"><?php esc_html_e( 'Google Translator', 'ukmtheme' ); ?></h4>
            <div>
                <?php echo do_shortcode( '[google-translator]' ); ?>
            </div>
        <?php endif; ?>

        <?php
        // Sidebar widget offcanvas (sidebar-11 or sidebar-12)
        if ( is_active_sidebar( 'sidebar-11' ) ) {
            dynamic_sidebar( 'sidebar-11' );
        }
        ?>
        
        <div class="uk-margin-top uk-text-small uk-text-muted">
            <h5 class="uk-margin-small-bottom"><?php esc_html_e( 'Penafian Terjemahan Bahasa Ketiga', 'ukmtheme' ); ?></h5>
            <p>
                <?php esc_html_e( 'Sila ambil perhatian bahawa halaman yang dipaparkan selepas terjemahan adalah terjemahan komputer secara automatik. Kandungan rasmi hanya terdapat pada halaman asal dalam Bahasa Melayu atau Bahasa Inggeris.', 'ukmtheme' ); ?>
            </p>
        </div>
    </div>
</div>
