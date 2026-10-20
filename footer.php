<?php
/**
 * The template for displaying the footer
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
</div><?php // END page-wrap / STICKY FOOTER ?>

<?php
if ( function_exists( 'block_template_part' ) ) {
    block_template_part( 'footer-blocks' );
}
?>

<footer id="footer" class="uk-background-secondary uk-light">
    <?php if ( get_theme_mod( 'ukmtheme_footer_widget_basic', 1 ) == 1 ) : ?>
        <!-- 3 COLUMN WIDGET & PRESET SECTION -->
        <div class="ukm-footer-main uk-section uk-section-small">
            <div class="wrap uk-container">
                <?php if ( is_active_sidebar( 'sidebar-8' ) && ! is_active_sidebar( 'footer-1' ) && ! is_active_sidebar( 'footer-2' ) && ! is_active_sidebar( 'footer-3' ) ) : ?>
                    <div class="uk-grid-large uk-grid-divider uk-child-width-1-1 uk-child-width-1-3@m" uk-grid>
                        <?php dynamic_sidebar( 'sidebar-8' ); ?>
                    </div>
                <?php else : ?>
                    <div class="uk-grid-large uk-grid-divider uk-child-width-1-1 uk-child-width-1-3@m" uk-grid>
                        
                        <!-- 1. ALAMAT, NO TELEFON DAN ICON MEDIA SOSIAL (MENDATAR) -->
                        <div>
                            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                                <div class="ukm-footer-col ukm-footer-col-1">
                                    <?php dynamic_sidebar( 'footer-1' ); ?>
                                </div>
                            <?php else : ?>
                                <div class="ukm-footer-col ukm-footer-col-1">
                                    <h4 class="uk-h4 uk-heading-bullet uk-text-bold uk-margin-small-bottom">
                                        <?php esc_html_e( 'Hubungi Kami', 'ukmtheme' ); ?>
                                    </h4>

                                    <div class="ukm-footer-contact uk-margin-small-bottom">
                                        <!-- ALAMAT -->
                                        <div class="ukm-footer-item uk-margin-small-bottom uk-flex uk-flex-top">
                                            <span uk-icon="icon: location; ratio: 0.95" class="uk-margin-small-right uk-margin-xsmall-top ukm-icon-accent"></span>
                                            <div class="uk-text-small ukm-text-light" style="line-height: 1.6;">
                                                <?php 
                                                $footer_address = get_theme_mod( 'ukmtheme_footer_address', "Universiti Kebangsaan Malaysia\n43600 UKM Bangi, Selangor Darul Ehsan, Malaysia" );
                                                echo nl2br( esc_html( $footer_address ) );
                                                ?>
                                            </div>
                                        </div>

                                        <!-- NO TELEFON -->
                                        <?php 
                                        $footer_phone = get_theme_mod( 'ukmtheme_footer_phone', '+603-8921 5555 / 7070' ); 
                                        if ( ! empty( $footer_phone ) ) :
                                        ?>
                                        <div class="ukm-footer-item uk-margin-small-bottom uk-flex uk-flex-middle">
                                            <span uk-icon="icon: receiver; ratio: 0.95" class="uk-margin-small-right ukm-icon-accent"></span>
                                            <span class="uk-text-small">
                                                <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', explode( '/', $footer_phone )[0] ) ); ?>" class="uk-link-reset ukm-text-light">
                                                    <?php echo esc_html( $footer_phone ); ?>
                                                </a>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <!-- EMEL -->
                                        <?php 
                                        $footer_email = get_theme_mod( 'ukmtheme_footer_email', 'pendaftar@ukm.edu.my' ); 
                                        if ( ! empty( $footer_email ) ) :
                                        ?>
                                        <div class="ukm-footer-item uk-margin-small-bottom uk-flex uk-flex-middle">
                                            <span uk-icon="icon: mail; ratio: 0.95" class="uk-margin-small-right ukm-icon-accent"></span>
                                            <span class="uk-text-small">
                                                <a href="mailto:<?php echo esc_attr( $footer_email ); ?>" class="uk-link-reset ukm-text-light">
                                                    <?php echo esc_html( $footer_email ); ?>
                                                </a>
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- ICON MEDIA SOSIAL (MENDATAR) -->
                                    <div class="ukm-footer-social uk-margin-small-top">
                                        <h5 class="uk-text-bold uk-text-uppercase uk-margin-xsmall-bottom" style="font-size: 0.75rem; letter-spacing: 0.8px; opacity: 0.85;">
                                            <?php esc_html_e( 'Media Sosial', 'ukmtheme' ); ?>
                                        </h5>
                                        <div class="uk-flex uk-flex-middle uk-flex-wrap ukm-social-icons-row" style="gap: 8px;">
                                            <?php 
                                            $fb  = get_theme_mod( 'ukmtheme_social_media_facebook', 'https://www.facebook.com/UKMOfficial' );
                                            $tw  = get_theme_mod( 'ukmtheme_social_media_twitter', 'https://twitter.com/ukmtwit' );
                                            $ig  = get_theme_mod( 'ukmtheme_social_media_instagram', 'https://www.instagram.com/ukminsta' );
                                            $yt  = get_theme_mod( 'ukmtheme_social_media_youtube', 'https://www.youtube.com/user/ukmwebtv' );
                                            $rss = get_bloginfo( 'rss2_url' );
                                            ?>
                                            <?php if ( ! empty( $fb ) ) : ?>
                                                <a href="<?php echo esc_url( $fb ); ?>" target="_blank" rel="noopener noreferrer" class="uk-icon-button ukm-social-btn" uk-icon="icon: facebook" aria-label="Facebook" title="Facebook"></a>
                                            <?php endif; ?>
                                            <?php if ( ! empty( $tw ) ) : ?>
                                                <a href="<?php echo esc_url( $tw ); ?>" target="_blank" rel="noopener noreferrer" class="uk-icon-button ukm-social-btn" uk-icon="icon: twitter" aria-label="X / Twitter" title="X / Twitter"></a>
                                            <?php endif; ?>
                                            <?php if ( ! empty( $ig ) ) : ?>
                                                <a href="<?php echo esc_url( $ig ); ?>" target="_blank" rel="noopener noreferrer" class="uk-icon-button ukm-social-btn" uk-icon="icon: instagram" aria-label="Instagram" title="Instagram"></a>
                                            <?php endif; ?>
                                            <?php if ( ! empty( $yt ) ) : ?>
                                                <a href="<?php echo esc_url( $yt ); ?>" target="_blank" rel="noopener noreferrer" class="uk-icon-button ukm-social-btn" uk-icon="icon: youtube" aria-label="YouTube" title="YouTube"></a>
                                            <?php endif; ?>
                                            <?php if ( ! empty( $rss ) ) : ?>
                                                <a href="<?php echo esc_url( $rss ); ?>" target="_blank" rel="noopener noreferrer" class="uk-icon-button ukm-social-btn" uk-icon="icon: rss" aria-label="RSS Feed" title="RSS"></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- 2. PAUTAN PANTAS -->
                        <div>
                            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                                <div class="ukm-footer-col ukm-footer-col-2">
                                    <?php dynamic_sidebar( 'footer-2' ); ?>
                                </div>
                            <?php else : ?>
                                <div class="ukm-footer-col ukm-footer-col-2">
                                    <h4 class="uk-h4 uk-heading-bullet uk-text-bold uk-margin-small-bottom">
                                        <?php esc_html_e( 'Pautan Pantas', 'ukmtheme' ); ?>
                                    </h4>
                                    <?php 
                                    if ( has_nav_menu( 'footer-quick-links' ) ) :
                                        wp_nav_menu( array(
                                            'theme_location' => 'footer-quick-links',
                                            'container'      => false,
                                            'menu_class'     => 'uk-list uk-list-collapse ukm-footer-list',
                                            'depth'          => 1,
                                            'fallback_cb'    => false,
                                        ) );
                                    else :
                                    ?>
                                        <ul class="uk-list uk-list-collapse ukm-footer-list">
                                            <li>
                                                <a href="https://www.ukm.my" target="_blank" rel="noopener noreferrer">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'Portal Rasmi UKM', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://portal.ukm.my" target="_blank" rel="noopener noreferrer">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'Portal e-Pelajar UKM', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://smpweb.ukm.my" target="_blank" rel="noopener noreferrer">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'Sistem Maklumat Pelajar (SMPWeb)', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.ukm.my/direktori" target="_blank" rel="noopener noreferrer">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'Direktori Warga UKM', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.ukm.my/ptsl" target="_blank" rel="noopener noreferrer">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'Perpustakaan Tun Seri Lanang (PTSL)', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://mail.ukm.edu.my" target="_blank" rel="noopener noreferrer">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'UKM Webmail', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- 3. SENARAI PAUTAN -->
                        <div>
                            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                                <div class="ukm-footer-col ukm-footer-col-3">
                                    <?php dynamic_sidebar( 'footer-3' ); ?>
                                </div>
                            <?php else : ?>
                                <div class="ukm-footer-col ukm-footer-col-3">
                                    <h4 class="uk-h4 uk-heading-bullet uk-text-bold uk-margin-small-bottom">
                                        <?php esc_html_e( 'Senarai Pautan', 'ukmtheme' ); ?>
                                    </h4>
                                    <?php 
                                    if ( has_nav_menu( 'footer-links-list' ) ) :
                                        wp_nav_menu( array(
                                            'theme_location' => 'footer-links-list',
                                            'container'      => false,
                                            'menu_class'     => 'uk-list uk-list-collapse ukm-footer-list',
                                            'depth'          => 1,
                                            'fallback_cb'    => false,
                                        ) );
                                    else :
                                    ?>
                                        <ul class="uk-list uk-list-collapse ukm-footer-list">
                                            <li>
                                                <a href="https://www.mohe.gov.my" target="_blank" rel="noopener noreferrer">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'Kementerian Pendidikan Tinggi (KPT)', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.mqa.gov.my" target="_blank" rel="noopener noreferrer">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'Agensi Kelayakan Malaysia (MQA)', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.malaysia.gov.my" target="_blank" rel="noopener noreferrer">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'Portal Rasmi MyGovernment', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url( home_url( '/dasar-privasi' ) ); ?>">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'Dasar Privasi & Keselamatan', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url( home_url( '/penafian' ) ); ?>">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'Penafian & Notis Hak Cipta', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url( home_url( '/hubungi-kami' ) ); ?>">
                                                    <span uk-icon="icon: chevron-right; ratio: 0.8" class="uk-margin-xsmall-right ukm-icon-accent"></span>
                                                    <?php esc_html_e( 'Bantuan & Maklum Balas', 'ukmtheme' ); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- SUB-FOOTER: HAK CIPTA & NAVIGASI -->
    <div class="ukm-footer-bottom uk-padding-small">
        <div class="wrap uk-container">
            <hr class="ukm-footer-divider uk-margin-small-bottom" style="border-top: 1px solid rgba(255, 255, 255, 0.12);">
            <div class="uk-flex-between@m uk-flex-middle uk-text-center uk-text-left@m" uk-grid>
                <div class="uk-width-expand@m">
                    <p class="uk-margin-remove uk-text-small" style="color: rgba(255, 255, 255, 0.75);">
                        <?php esc_html_e( 'Hak Cipta Terpelihara &copy;', 'ukmtheme' ); ?> <?php echo esc_html( date( 'Y' ) ); ?> 
                        <span class="uk-text-bold" style="color: #ffffff;"><?php esc_html_e( 'Universiti Kebangsaan Malaysia', 'ukmtheme' ); ?></span>.
                    </p>
                </div>
                <div class="uk-width-auto@m">
                    <?php 
                        wp_nav_menu( array(
                            'theme_location' => 'footer',
                            'menu'           => 'Footer Navigation',
                            'menu_class'     => 'uk-subnav uk-subnav-divider uk-flex-center uk-flex-right@m uk-margin-remove footer-nav',
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        ) ); 
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
