<?php
/**
 * Metabox Loader
 *
 * Requires CMB2 plugin to be installed and activated.
 * Install: https://wordpress.org/plugins/cmb2/
 *
 * Admin notice for missing CMB2 is handled by inc/plugins.php.
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// CMB2 not active — skip loading metaboxes (notice shown via inc/plugins.php)
if ( ! function_exists( 'cmb2_bootstrap' ) && ! defined( 'CMB2_LOADED' ) ) {
    return;
}

// Load individual metabox files
$metabox_dir   = get_template_directory() . '/inc/metaboxes/';
$metabox_files = glob( $metabox_dir . '*.php' );

if ( $metabox_files ) {
    foreach ( $metabox_files as $file ) {
        $basename = basename( $file );
        if ( $basename !== 'loader.php' && $basename !== 'index.php' ) {
            require_once $file;
        }
    }
}
