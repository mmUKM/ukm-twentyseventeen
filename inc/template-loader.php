<?php
/**
 * Dynamic Template Loader for Custom Post Types & Taxonomies
 *
 * Automatically resolves single, archive, and taxonomy templates located in
 * the theme's /template-parts/ directory (sub-folders: single/, archive/, taxonomy/).
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Filter template_include to load templates from /template-parts/ sub-folders.
 *
 * @param string $template Path to the template file.
 * @return string Filtered template path.
 */
function ukmtheme_custom_template_include( $template ) {
    $theme_dir = get_template_directory();

    // 1. Single templates — /template-parts/single/{post-type}.php
    if ( is_singular() ) {
        $post_type  = get_post_type();
        $candidates = array(
            "{$theme_dir}/template-parts/single/{$post_type}.php",
        );

        // Alias: ut_pekeliling <-> pekeliling
        if ( 'ut_pekeliling' === $post_type ) {
            $candidates[] = "{$theme_dir}/template-parts/single/pekeliling.php";
        } elseif ( 'pekeliling' === $post_type ) {
            $candidates[] = "{$theme_dir}/template-parts/single/ut_pekeliling.php";
        }

        foreach ( $candidates as $candidate ) {
            if ( file_exists( $candidate ) ) {
                return $candidate;
            }
        }
    }

    // 2. Archive templates — /template-parts/archive/{post-type}.php
    if ( is_post_type_archive() ) {
        $post_type = get_query_var( 'post_type' );
        if ( is_array( $post_type ) ) {
            $post_type = reset( $post_type );
        }

        $candidates = array(
            "{$theme_dir}/template-parts/archive/{$post_type}.php",
        );

        // Alias: ut_pekeliling <-> pekeliling
        if ( 'ut_pekeliling' === $post_type ) {
            $candidates[] = "{$theme_dir}/template-parts/archive/pekeliling.php";
        } elseif ( 'pekeliling' === $post_type ) {
            $candidates[] = "{$theme_dir}/template-parts/archive/ut_pekeliling.php";
        }

        foreach ( $candidates as $candidate ) {
            if ( file_exists( $candidate ) ) {
                return $candidate;
            }
        }
    }

    // 3. Taxonomy templates — /template-parts/taxonomy/{taxonomy}.php
    if ( is_tax() ) {
        $taxonomy   = get_query_var( 'taxonomy' );
        $term       = get_query_var( 'term' );

        $candidates = array(
            "{$theme_dir}/template-parts/taxonomy/{$taxonomy}-{$term}.php",
            "{$theme_dir}/template-parts/taxonomy/{$taxonomy}.php",
        );

        foreach ( $candidates as $candidate ) {
            if ( file_exists( $candidate ) ) {
                return $candidate;
            }
        }
    }

    return $template;
}
add_filter( 'template_include', 'ukmtheme_custom_template_include', 99 );