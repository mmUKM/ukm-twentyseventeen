<?php
/**
 * Metaboxes: expertise
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;    function ukmtheme_expertise_metaboxes() {

        $expertise = new_cmb2_box(  array(
            'id'            => 'expertise_metabox',
            'title'         => esc_html__( 'Expertise Detail', 'ukmtheme' ),
            'object_types'  => array( 'expertise', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $expertise->add_field( array(
            'name'    => esc_html__( 'Expert Photo', 'ukmtheme' ),
            'desc'    => esc_html__( 'Upload an image or enter a URL. Dimensions of the image should be 300x380 pixels.', 'ukmtheme' ),
            'id'      => 'ut_expertise_photo',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );

        $expertise->add_field( array(
            'name'    => esc_html__( 'Contact', 'ukmtheme' ),
            'desc'    => esc_html__( 'e.g. 03-8921-7070', 'ukmtheme' ),
            'id'      => 'ut_expertise_contact',
            'type'    => 'text',
        ) );

        $expertise->add_field( array(
            'name'    => esc_html__( 'Email', 'ukmtheme' ),
            'desc'    => esc_html__( 'e.g. user@ukm.edu.my', 'ukmtheme' ),
            'id'      => 'ut_expertise_email',
            'type'    => 'text_email',
        ) );

        $expertise->add_field( array(
            'name'    => esc_html__( 'Current Position', 'ukmtheme' ),
            'desc'    => esc_html__( 'e.g. Professor', 'ukmtheme' ),
            'id'      => 'ut_expertise_position',
            'type'    => 'text',
        ) );

        $expertise->add_field( array(
            'name'    => esc_html__( 'Specialisation', 'ukmtheme' ),
            'desc'    => esc_html__( 'Tourism and Hospitality Marketing, &amp; Services Marketing', 'ukmtheme' ),
            'id'      => 'ut_expertise_specialisation',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => esc_html__( 'UKM Sarjana URL', 'ukmtheme' ),
            'desc'    => esc_html__( 'e.g. https://ukmsarjana.ukm.my/main/lihat_profil/12345abcD', 'ukmtheme' ),
            'id'      => 'ut_expertise_url',
            'type'    => 'text_url',
        ) );
        
    }

// Post Type: Video

add_action( 'cmb2_init', 'ukmtheme_video_metaboxes' );

