<?php
/**
 * Theme Setup — Hybrid (Classic + FSE)
 *
 * Supports both classic PHP templates (for CPTs) and
 * Block Editor / Full Site Editing for standard pages.
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Favicon for all pages: login, admin, frontend
 */
function ukmtheme_favicon() {
    echo '<link rel="shortcut icon" href="' . get_stylesheet_directory_uri() . '/favicon.ico" />';
}
add_action( 'login_head', 'ukmtheme_favicon' );
add_action( 'admin_head', 'ukmtheme_favicon' );
add_action( 'wp_head',    'ukmtheme_favicon' );

/**
 * Theme Feature Setup — Hybrid Mode
 *
 * Classic supports are retained; block editor supports added
 * so that standard pages/posts use the block editor fully.
 */
add_action( 'after_setup_theme', 'ukmtheme_setup' );
function ukmtheme_setup() {

    // -------------------------------------------------------
    // Block Editor Supports (Hybrid)
    // -------------------------------------------------------
    add_theme_support( 'wp-block-styles' );            // Opt-in to block default styles
    add_theme_support( 'editor-styles' );              // Load editor-style.css in block editor
    add_theme_support( 'align-wide' );                 // Enable wide/full alignment in editor
    add_theme_support( 'responsive-embeds' );          // Responsive embeds (YouTube, etc.)
    add_editor_style( 'css/editor-style.css' );        // Custom styles in block editor

    // -------------------------------------------------------
    // Classic Theme Supports (retained)
    // -------------------------------------------------------
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
    add_theme_support( 'customize-selective-refresh-widgets' );

    // -------------------------------------------------------
    // Image sizes
    // -------------------------------------------------------
    set_post_thumbnail_size( 800, 450, true );
    add_image_size( 'news_thumbnail',    800, 450,  true );
    add_image_size( 'gallery_thumbnail', 600, 400,  true );
    add_image_size( 'staff_thumbnail',   400, 400,  true );

    // -------------------------------------------------------
    // Menus
    // -------------------------------------------------------
    register_nav_menus( array(
        'main'               => __( 'Main Navigation', 'ukmtheme' ),
        'footer'             => __( 'Footer Navigation', 'ukmtheme' ),
        'footer-quick-links' => __( 'Footer: Pautan Pantas', 'ukmtheme' ),
        'footer-links-list'  => __( 'Footer: Senarai Pautan', 'ukmtheme' ),
        'mobile'             => __( 'Mobile Navigation', 'ukmtheme' ),
    ) );

    // -------------------------------------------------------
    // i18n
    // -------------------------------------------------------
    load_theme_textdomain( 'ukmtheme', get_template_directory() . '/languages' );

    // -------------------------------------------------------
    // Cleanup <head>
    // -------------------------------------------------------
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rsd_link' );

    add_filter( 'show_admin_bar', '__return_false' );
}

/**
 * Fallback menu when no menu is assigned
 */
function ukmtheme_fallback_menu() {
    if ( current_user_can( 'manage_options' ) ) {
        echo '<div class="uk-flex uk-flex-center uk-padding-small">
            <p class="uk-text-muted">' . esc_html__( 'Sila tetapkan menu dalam panel admin.', 'ukmtheme' ) . '</p>
        </div>';
    }
}
