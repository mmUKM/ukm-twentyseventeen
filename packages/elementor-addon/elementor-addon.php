<?php
/**
 * Plugin Name: Elementor Addon
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon
 */

function register_ukmtheme_elementor_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/elementor-ukmtheme-faq.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-slides.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-slideset.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-news-grid.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-news-slider.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-staffs.php' );

	$widgets_manager->register( new \Elementor_UKMTheme_FAQ() );
	$widgets_manager->register( new \Elementor_UKMTheme_Slides() );
	$widgets_manager->register( new \Elementor_UKMTheme_Slideset() );
	$widgets_manager->register( new \Elementor_UKMTheme_News_Grid() );
	$widgets_manager->register( new \Elementor_UKMTheme_News_Slider() );
	$widgets_manager->register( new \Elementor_UKMTheme_Staffs() );

}
add_action( 'elementor/widgets/register', 'register_ukmtheme_elementor_widget' );