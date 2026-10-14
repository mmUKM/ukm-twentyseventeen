<?php
/**
 * Theme Helper Functions
 *
 * Excerpt, MIME types, search form, feeds, CF7, taxonomy HTML, pagination filters.
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// -------------------------------------------------------
// Excerpt
// -------------------------------------------------------

add_filter( 'excerpt_more', 'ukmtheme_excerpt_more' );
function ukmtheme_excerpt_more( $more ) {
    global $post;
    return '<a class="ut-readmore" href="' . get_permalink( $post->ID ) . '">' . __( ' ...', 'ukmtheme' ) . '</a>';
}

add_filter( 'excerpt_length', 'ukmtheme_excerpt_length', 999 );
function ukmtheme_excerpt_length( $length ) {
    return 25;
}

// -------------------------------------------------------
// Edit post link — add UIKit classes
// -------------------------------------------------------

add_filter( 'edit_post_link', 'ukmtheme_custom_edit_post_link' );
function ukmtheme_custom_edit_post_link( $output ) {
    return str_replace(
        'class="post-edit-link"',
        'class="post-edit-link uk-button uk-button-default uk-button-small uk-margin-small-top"',
        $output
    );
}

// -------------------------------------------------------
// Allowed upload MIME types
// -------------------------------------------------------

add_filter( 'upload_mimes', 'ukmtheme_custom_mime_types' );
function ukmtheme_custom_mime_types( $mimes ) {
    return array_merge( $mimes, array(
        'ac3'  => 'audio/ac3',
        'mpa'  => 'audio/MPA',
        'flv'  => 'video/x-flv',
        'svg'  => 'image/svg+xml',
        'avif' => 'image/avif',
    ) );
}

// -------------------------------------------------------
// Custom search form (UIKit 3)
// -------------------------------------------------------

add_filter( 'get_search_form', 'ukmtheme_search_form' );
function ukmtheme_search_form( $form ) {
    $form = '<form role="search" method="get" class="uk-search uk-search-default uk-width-1-1 uk-margin-small-bottom" action="' . esc_url( home_url( '/' ) ) . '">
        <span uk-search-icon></span>
        <input class="uk-search-input" type="search" placeholder="' . esc_attr__( 'Search...', 'ukmtheme' ) . '" value="' . esc_attr( get_search_query() ) . '" name="s" id="s" />
    </form>';

    return $form;
}

// -------------------------------------------------------
// RSS feed: include custom post types
// -------------------------------------------------------

add_filter( 'request', 'ukmtheme_feed_request' );
function ukmtheme_feed_request( $qv ) {
    if ( isset( $qv['feed'] ) && ! isset( $qv['post_type'] ) ) {
        $qv['post_type'] = array( 'post', 'news' );
    }
    return $qv;
}

// -------------------------------------------------------
// Contact Form 7 — add UIKit class
// -------------------------------------------------------

add_filter( 'wpcf7_form_class_attr', 'ukmtheme_custom_form_class_attr' );
function ukmtheme_custom_form_class_attr( $class ) {
    $class .= ' uk-form';
    return $class;
}

// -------------------------------------------------------
// Allow HTML in category / taxonomy descriptions
// -------------------------------------------------------

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes',       'wp_filter_kses' );
remove_filter( 'term_description',     'wp_kses_data' );
remove_filter( 'term_description',     'wpautop' );

// -------------------------------------------------------
// Custom posts_per_page for specific taxonomies & archives
// -------------------------------------------------------

$option_posts_per_page = get_option( 'posts_per_page' );

add_action( 'init', 'ukmtheme_posts_per_taxonomy', 0 );
function ukmtheme_posts_per_taxonomy() {
    add_filter( 'option_posts_per_page', 'ukmtheme_option_posts_per_taxonomy' );
}

function ukmtheme_option_posts_per_taxonomy( $value ) {
    global $option_posts_per_page;
    if ( is_tax( array( 'newscat', 'galcat' ) ) ) {
        return 10;
    }
    return $option_posts_per_page;
}

add_action( 'init', 'ukmtheme_posts_per_archive', 0 );
function ukmtheme_posts_per_archive() {
    add_filter( 'option_posts_per_page', 'ukmtheme_option_posts_per_archive' );
}

function ukmtheme_option_posts_per_archive( $value ) {
    global $option_posts_per_page;
    if ( is_post_type_archive( array( 'news', 'gallery', 'video' ) ) ) {
        return 10;
    }
    return $option_posts_per_page;
}
