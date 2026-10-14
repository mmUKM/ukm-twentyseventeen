<?php
/**
 * Metaboxes: video
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;    function ukmtheme_video_metaboxes() {

        $video = new_cmb2_box( array(
            'id'            => 'video_metabox',
            'title'         => __( 'Video Detail', 'ukmtheme' ),
            'object_types'  => array( 'video', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $video->add_field( array(
            'name'    => __( 'Video Link', 'ukmtheme' ),
            'desc'    => __( 'Right click at youtube video then copy video url.', 'ukmtheme' ),
            'id'      => 'ut_video_url',
            'type'    => 'oembed',
        ) );

        $video->add_field( array(
            'name'    => __( 'Video ID', 'ukmtheme' ),
            'desc'    => __( 'Example: https://youtu.be/AkoOCm1Oug4. Copy only AkoOCm1Oug4', 'ukmtheme' ),
            'id'      => 'ut_video_id',
            'type'    => 'text',
        ) );

        $video->add_field( array(
            'name'    => __( 'Video Description', 'ukmtheme' ),
            'desc'    => __( 'Video Description', 'ukmtheme' ),
            'id'      => 'ut_video_desc',
            'type'    => 'textarea',
        ) );

        }

// Post Type: Pekeliling

add_action( 'cmb2_init', 'ukmtheme_pekeliling_metaboxes' );

