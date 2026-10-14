<?php
/**
 * Metaboxes: gallery
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;    function ukmtheme_gallery_metaboxes() {

        $gallery = new_cmb2_box( array(
            'id'            => 'gallery_metabox',
            'title'         => esc_html__('Gallery Detail', 'ukmtheme' ),
            'object_types'  => array( 'gallery', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );
    
        $gallery->add_field( array(
            'name'    => esc_html__('Gallery Cover Image', 'ukmtheme' ),
            'desc'    => esc_html__('Upload an image or enter a URL. Dimensions of the image should be 300x240 pixels.', 'ukmtheme' ),
            'id'      => 'ut_gallery_cover',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );

        $gallery->add_field( array(
            'name'    => esc_html__('Date', 'ukmtheme' ),
            'desc'    => esc_html__('Gallery Date', 'ukmtheme' ),
            'id'      => 'ut_gallery_date',
            'type'    => 'text_date',
            'date_format' => esc_html__('d/m/Y', 'cmb2' ),
        ) );

        $gallery->add_field( array(
            'name'    => esc_html__('Photographer', 'ukmtheme' ),
            'desc'    => esc_html__('Photo by', 'ukmtheme' ),
            'id'      => 'ut_gallery_photographer',
            'type'    => 'text',
        ) );

        $gallery->add_field( array(
            'name'         => esc_html__('Image', 'ukmtheme' ),
            'desc'         => esc_html__('Upload or add multiple images/attachments.', 'ukmtheme' ),
            'id'           => 'ut_gallery_image',
            'type'         => 'file_list',
            'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        ) );
    }

// Post Type: Slideset

add_action( 'cmb2_init', 'ukmtheme_slideset_metaboxes' );

