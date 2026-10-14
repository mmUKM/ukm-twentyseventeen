<?php
/**
 * Metaboxes: slideset
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;    function ukmtheme_slideset_metaboxes() {

        $slideset = new_cmb2_box( array(
            'id'            => 'slideset_metabox',
            'title'         => esc_html__('Slideset Detail', 'ukmtheme' ),
            'object_types'  => array( 'slideset', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $slideset->add_field( array(
            'name'    => esc_html__('Slideset Image', 'ukmtheme' ),
            'desc'    => esc_html__('Upload an image or enter a URL. Dimensions of the image should be 600x340 pixels.', 'ukmtheme' ),
            'id'      => 'ut_slideset_image',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );

        $slideset->add_field( array(
            'name'    => esc_html__('Slideset Link', 'ukmtheme' ),
            'desc'    => esc_html__('links to posts, pages or external web.', 'ukmtheme' ),
            'id'      => 'ut_slideset_link',
            'type'    => 'text',
        ) );
    }

// Post Type: Press Release

add_action( 'cmb2_init', 'ukmtheme_press_metaboxes' );

