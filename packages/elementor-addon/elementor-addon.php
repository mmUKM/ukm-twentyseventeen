<?php
/**
 * Plugin Name: Elementor Addon
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon
 */

function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'ukmtheme',
		[
			'title' => esc_html__( 'UKMTheme', 'ukmteheme' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );


function register_ukmtheme_elementor_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/elementor-ukmtheme-faq.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-card-slides.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-slides.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-slideset.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-news-grid.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-news-slider.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-publications.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-staffs.php' );
	require_once( __DIR__ . '/widgets/elementor-ukmtheme-video-channel.php' );

	$widgets_manager->register( new \Elementor_UKMTheme_FAQ() );
	$widgets_manager->register( new \Elementor_UKMTheme_Card_Slides() );
	$widgets_manager->register( new \Elementor_UKMTheme_Slides() );
	$widgets_manager->register( new \Elementor_UKMTheme_Slideset() );
	$widgets_manager->register( new \Elementor_UKMTheme_News_Grid() );
	$widgets_manager->register( new \Elementor_UKMTheme_News_Slider() );
	$widgets_manager->register( new \Elementor_UKMTheme_Publications() );
	$widgets_manager->register( new \Elementor_UKMTheme_Staffs() );
	$widgets_manager->register( new \Elementor_UKMTheme_Video_Channel() );

}
add_action( 'elementor/widgets/register', 'register_ukmtheme_elementor_widget' );