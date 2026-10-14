<?php
/**
 * Plugin Recommendations
 *
 * Displays an admin notice listing recommended plugins that are not yet installed or active.
 * No third-party library required.
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * List of recommended plugins.
 * Format: 'plugin-folder/main-file.php' => [ 'name', 'slug', 'required' ]
 */
function ukmtheme_recommended_plugins() {
    return array(
        'cmb2/init.php' => array(
            'name'     => 'CMB2',
            'slug'     => 'cmb2',
            'required' => true,
            'reason'   => __( 'Diperlukan untuk metabox custom fields tema berfungsi.', 'ukmtheme' ),
        ),
        'elementor/elementor.php' => array(
            'name'     => 'Elementor Website Builder',
            'slug'     => 'elementor',
            'required' => false,
            'reason'   => __( 'Untuk membina halaman dengan visual builder.', 'ukmtheme' ),
        ),
        'header-footer-elementor/main.php' => array(
            'name'     => 'Header Footer Elementor',
            'slug'     => 'header-footer-elementor',
            'required' => false,
            'reason'   => __( 'Untuk kustomisasi header & footer dengan Elementor.', 'ukmtheme' ),
        ),
        'simple-page-ordering/simple-page-ordering.php' => array(
            'name'     => 'Simple Page Ordering',
            'slug'     => 'simple-page-ordering',
            'required' => false,
            'reason'   => __( 'Untuk susun semula halaman dengan drag & drop.', 'ukmtheme' ),
        ),
    );
}

/**
 * Check which recommended plugins are missing and display an admin notice.
 */
add_action( 'admin_notices', 'ukmtheme_plugin_recommendations_notice' );
function ukmtheme_plugin_recommendations_notice() {

    // Only show to admins
    if ( ! current_user_can( 'install_plugins' ) ) return;

    // Only show on dashboard, themes, and plugins pages
    $screen = get_current_screen();
    if ( ! in_array( $screen->id, array( 'dashboard', 'themes', 'plugins' ), true ) ) return;

    $missing_required   = array();
    $missing_optional   = array();

    foreach ( ukmtheme_recommended_plugins() as $plugin_file => $plugin ) {
        if ( is_plugin_active( $plugin_file ) ) continue;

        $install_url = esc_url( admin_url( 'plugin-install.php?s=' . urlencode( $plugin['slug'] ) . '&tab=search&type=term' ) );
        $item = '<strong><a href="' . $install_url . '" target="_blank">' . esc_html( $plugin['name'] ) . '</a></strong>';

        if ( $plugin['required'] ) {
            $missing_required[] = $item . ' — ' . esc_html( $plugin['reason'] );
        } else {
            $missing_optional[] = $item . ' — ' . esc_html( $plugin['reason'] );
        }
    }

    if ( empty( $missing_required ) && empty( $missing_optional ) ) return;

    // Required plugins notice
    if ( ! empty( $missing_required ) ) {
        echo '<div class="notice notice-error">';
        echo '<p><strong>UKM Theme</strong> — ' . esc_html__( 'Plugin berikut DIPERLUKAN untuk tema berfungsi sepenuhnya:', 'ukmtheme' ) . '</p>';
        echo '<ul style="list-style:disc;padding-left:2em;">';
        foreach ( $missing_required as $item ) {
            echo '<li>' . wp_kses( $item, array( 'strong' => array(), 'a' => array( 'href' => array(), 'target' => array() ) ) ) . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }

    // Optional plugins notice (dismissible)
    if ( ! empty( $missing_optional ) ) {
        echo '<div class="notice notice-info is-dismissible">';
        echo '<p><strong>UKM Theme</strong> — ' . esc_html__( 'Plugin berikut disyorkan untuk pengalaman terbaik:', 'ukmtheme' ) . '</p>';
        echo '<ul style="list-style:disc;padding-left:2em;">';
        foreach ( $missing_optional as $item ) {
            echo '<li>' . wp_kses( $item, array( 'strong' => array(), 'a' => array( 'href' => array(), 'target' => array() ) ) ) . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}