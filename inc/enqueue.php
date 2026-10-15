<?php
/**
 * Enqueue Scripts & Styles
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Frontend scripts & styles
 */
add_action( 'wp_enqueue_scripts', 'ukmtheme_scripts' );
function ukmtheme_scripts() {
    $version = wp_get_theme()->get( 'Version' );
    $uri     = get_template_directory_uri();

    // Scripts
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'uikit',       $uri . '/assets/libs/uikit3/js/uikit.min.js',       array(),          $version, true );
    wp_enqueue_script( 'uikit-icons', $uri . '/assets/libs/uikit3/js/uikit-icons.min.js', array( 'uikit' ), $version, true );
    wp_enqueue_script( 'ytv',         $uri . '/assets/libs/ytv/src/ytv.js',                 array(),          $version, true );
    wp_enqueue_script( 'theme',       $uri . '/assets/js/scripts.min.js',                  array( 'jquery', 'uikit' ), $version, true );

    // Styles
    wp_enqueue_style( 'uikit',        $uri . '/assets/libs/uikit3/css/uikit.min.css',      array(),          $version );
    wp_enqueue_style( 'ytv',          $uri . '/assets/libs/ytv/src/ytv.css',                array(),          $version );
    wp_enqueue_style( 'poppins-font', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap', array(), null );
    wp_enqueue_style( 'inter-font',   'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap', array(), null );
    wp_enqueue_style( 'style',        get_stylesheet_uri(),                                array( 'uikit' ), $version );
}

/**
 * Admin scripts & styles
 */
add_action( 'admin_enqueue_scripts', 'ukmtheme_wp_admin_scripts' );
function ukmtheme_wp_admin_scripts() {
    $version = wp_get_theme()->get( 'Version' );
    $uri     = get_template_directory_uri();

    wp_enqueue_script( 'admin', $uri . '/assets/js/admin.min.js', array(), $version, true );
    wp_enqueue_style(  'admin', $uri . '/assets/css/admin.css',   array(), $version );
}
