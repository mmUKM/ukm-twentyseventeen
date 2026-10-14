<?php
/**
 * Register Sidebars / Widget Areas
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'widgets_init', 'ukmtheme_widgets_init' );
function ukmtheme_widgets_init() {

    // Primary Sidebar
    register_sidebar( array(
        'name'          => __( 'PRIMARY SIDEBAR', 'ukmtheme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Sidebar utama untuk template halaman dan post.', 'ukmtheme' ),
        'before_widget' => '<div class="uk-card uk-card-default uk-card-body uk-margin-bottom">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="uk-card-title uk-heading-bullet">',
        'after_title'   => '</h4>',
    ) );

    // Frontpage: Layout Builder
    register_sidebar( array(
        'name'          => __( 'FRONTPAGE: LAYOUT BUILDER', 'ukmtheme' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Gunakan widget Page Builder by SiteOrigin atau Elementor', 'ukmtheme' ),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="uk-hidden">',
        'after_title'   => '</h3>',
    ) );

    // Off-canvas widget
    register_sidebar( array(
        'name'          => __( 'OFF CANVAS WIDGET', 'ukmtheme' ),
        'id'            => 'sidebar-12',
        'description'   => __( 'Off-canvas sidebar widget language', 'ukmtheme' ),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    // Frontpage: 3 Block Widget
    register_sidebar( array(
        'name'          => __( 'FRONTPAGE: 3 BLOCK', 'ukmtheme' ),
        'id'            => 'sidebar-4',
        'description'   => __( '3 blok widget di frontpage (jika tiada widget, preset kad media top akan dipaparkan).', 'ukmtheme' ),
        'before_widget' => '<div><div class="uk-card uk-card-default uk-card-hover uk-border-rounded uk-box-shadow-small uk-card-body uk-height-1-1">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h3 class="uk-card-title uk-heading-bullet uk-margin-small-bottom">',
        'after_title'   => '</h3>',
    ) );

    // Footer: Kolum 1 (Alamat & Media Sosial)
    register_sidebar( array(
        'name'          => __( 'FOOTER: KOLUM 1', 'ukmtheme' ),
        'id'            => 'footer-1',
        'description'   => __( 'Kolum 1 Footer: Alamat, no. telefon & icon media sosial. Jika tiada widget, preset dipaparkan.', 'ukmtheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s uk-margin-bottom">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="uk-h4 uk-heading-bullet uk-text-bold uk-margin-small-bottom">',
        'after_title'   => '</h4>',
    ) );

    // Footer: Kolum 2 (Pautan Pantas)
    register_sidebar( array(
        'name'          => __( 'FOOTER: KOLUM 2', 'ukmtheme' ),
        'id'            => 'footer-2',
        'description'   => __( 'Kolum 2 Footer: Pautan Pantas. Jika tiada widget, preset dipaparkan.', 'ukmtheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s uk-margin-bottom">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="uk-h4 uk-heading-bullet uk-text-bold uk-margin-small-bottom">',
        'after_title'   => '</h4>',
    ) );

    // Footer: Kolum 3 (Senarai Pautan)
    register_sidebar( array(
        'name'          => __( 'FOOTER: KOLUM 3', 'ukmtheme' ),
        'id'            => 'footer-3',
        'description'   => __( 'Kolum 3 Footer: Senarai Pautan. Jika tiada widget, preset dipaparkan.', 'ukmtheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s uk-margin-bottom">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="uk-h4 uk-heading-bullet uk-text-bold uk-margin-small-bottom">',
        'after_title'   => '</h4>',
    ) );

    // Footer: Legasi 3 Kolum
    register_sidebar( array(
        'name'          => __( 'FOOTER: 3 KOLUM (LEGASI)', 'ukmtheme' ),
        'id'            => 'sidebar-8',
        'description'   => __( 'Sidebar legasi untuk 3 widget footer.', 'ukmtheme' ),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="uk-h4 uk-heading-bullet uk-text-bold uk-margin-small-bottom">',
        'after_title'   => '</h4>',
    ) );
}

add_action( 'widgets_init', 'ukmtheme_extra_widgets_init' );
function ukmtheme_extra_widgets_init() {

    if ( get_theme_mod( 'ukmtheme_frontpage_two_box' ) == 1 ) {
        register_sidebar( array(
            'name'          => __( 'FRONTPAGE: 2 BLOCK', 'ukmtheme' ),
            'id'            => 'sidebar-3',
            'description'   => __( '2 blok widget di frontpage di bawah berita.', 'ukmtheme' ),
            'before_widget' => '<div><div class="uk-card uk-card-default uk-padding-small">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h3 class="uk-hidden">',
            'after_title'   => '</h3>',
        ) );
    }
}
