<?php
/**
 * HTML Sitemap Shortcode [ukmtheme-sitemap]
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ukmtheme_html_sitemap() {
    $pages_args = array(
        'exclude'     => '',
        'post_type'   => 'page',
        'post_status' => 'publish',
        'sort_column' => 'post_title',
        'sort_order'  => 'ASC',
    );

    $pages = get_pages( $pages_args );

    $output  = '<div class="ukmtheme-sitemap uk-margin-bottom">';
    $output .= '<h3>' . esc_html__( 'Pages', 'ukmtheme' ) . '</h3>';
    $output .= '<ul class="uk-list uk-list-bullet">';

    if ( ! empty( $pages ) ) {
        foreach ( $pages as $page ) {
            $output .= '<li class="pages-list"><a href="' . esc_url( get_page_link( $page->ID ) ) . '" rel="bookmark">' . esc_html( $page->post_title ) . '</a></li>';
        }
    } else {
        $output .= '<li>' . esc_html__( 'No pages found.', 'ukmtheme' ) . '</li>';
    }

    $output .= '</ul>';
    $output .= '</div>';

    return $output;
}
add_shortcode( 'ukmtheme-sitemap', 'ukmtheme_html_sitemap' );
add_shortcode( 'spp-sitemap', 'ukmtheme_html_sitemap' ); // Backward compatibility alias
