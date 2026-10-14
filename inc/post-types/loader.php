<?php
/**
 * Post Type Loader — Load all CPT registration files
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load each CPT + taxonomy registration file
$post_type_files = glob( get_template_directory() . '/inc/post-types/*.php' );
foreach ( $post_type_files as $file ) {
    if ( basename( $file ) !== 'loader.php' ) {
        require_once $file;
    }
}
