<?php
/**
 * Metaboxes: conference
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function ukmtheme_conference_metaboxes() {

    $conference_basic = new_cmb2_box( array(
        'id'            => 'conference_metabox_basic',
        'title'         => __( 'Conference Details', 'ukmtheme' ),
        'object_types'  => array( 'conference', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    $conference_basic->add_field( array(
        'name'         => __( 'Header Logo', 'ukmtheme' ),
        'desc'         => __( 'Upload images. Dimensions of the image should be 400x90 pixels', 'ukmtheme' ),
        'id'           => 'ut_conference_logo',
        'type'         => 'file',
    ) );

    $conference_basic->add_field( array(
        'name'         => __( 'Slides', 'ukmtheme' ),
        'desc'         => __( 'Upload or add multiple images. Dimensions of the image should be 960x380 pixels', 'ukmtheme' ),
        'id'           => 'ut_conference_slide_image',
        'type'         => 'file_list',
        'preview_size' => array( 160, 63 ), // Default: array( 50, 50 )
    ) );

    $conference_basic->add_field( array(
        'name'         => __( 'Speaker', 'ukmtheme' ),
        'desc'         => __( 'Upload or add multiple images. Dimensions of the image should be 1200 x 580 pixels. Go into Media edit image, enter image Title for speaker name, Caption for title/position and Description for additional content.', 'ukmtheme' ),
        'id'           => 'ut_conference_keynote_image',
        'type'         => 'file_list',
        'preview_size' => array( 100, 127 ), // Default: array( 50, 50 )
    ) );

    $conference_basic->add_field( array(
        'name'    => __( 'Introduction', 'ukmtheme' ),
        'desc'    => __( 'Some description.', 'ukmtheme' ),
        'id'      => 'ut_conference_introduction',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );



    $conference_basic->add_field( array(
        'name'    => __( 'Start Date', 'ukmtheme' ),
        'desc'    => __( 'Conference Start Date', 'ukmtheme' ),
        'id'      => 'ut_conference_date_start',
        'type'    => 'text_date',
        'date_format' => 'd/m/Y',
    ) );

    $conference_basic->add_field( array(
        'name'    => __( 'End Date', 'ukmtheme' ),
        'desc'    => __( 'Conference End Date', 'ukmtheme' ),
        'id'      => 'ut_conference_date_end',
        'type'    => 'text_date',
        'date_format' => 'd/m/Y',
    ) );

    $conference_basic->add_field( array(
        'name'    => __( 'Venue', 'ukmtheme' ),
        'desc'    => __( 'Conference Venue', 'ukmtheme' ),
        'id'      => 'ut_conference_venue',
        'type'    => 'text',
    ) );

    $conference_basic->add_field( array(

        'name'    => __( 'Organiser', 'ukmtheme' ),
        'desc'    => __( 'organiser detail', 'ukmtheme' ),
        'id'      => 'ut_conference_organizer',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

    $conference_basic->add_field( array(
        'name'    => __( 'Footer #1', 'ukmtheme' ),
        'desc'    => __( 'Footer content #1', 'ukmtheme' ),
        'id'      => 'ut_conference_footer_1',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

    $conference_basic->add_field( array(
        'name'    => __( 'Footer #2', 'ukmtheme' ),
        'desc'    => __( 'Footer content #2', 'ukmtheme' ),
        'id'      => 'ut_conference_footer_2',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

    $conference_basic->add_field( array(
        'name'    => __( 'Footer #3', 'ukmtheme' ),
        'desc'    => __( 'Footer content #3', 'ukmtheme' ),
        'id'      => 'ut_conference_footer_3',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );



    $conference_basic->add_field( array(
        'name'         => __( 'Gallery', 'ukmtheme' ),
        'desc'         => __( 'Upload or add multiple images.', 'ukmtheme' ),
        'id'           => 'ut_conference_gallery',
        'type'         => 'file_list',
        'preview_size' => array( 100, 127 ), // Default: array( 50, 50 )
    ) );

    $conference_extd = new_cmb2_box( array(

        'id'            => 'conference_metabox_extd',
        'title'         => __( 'Additional Page', 'ukmtheme' ),
        'object_types'  => array( 'conference', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );


    $conference_extd->add_field( array(
        'name'    => __( 'Show Title and Content #1', 'ukmtheme' ),
        'desc'    => __( 'Show Title and Content #1', 'ukmtheme' ),
        'id'      => 'ut_conference_title_1_hide',
        'type'    => 'checkbox',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #1', 'ukmtheme' ),
        'desc'    => __( 'Edit this title (use short term)', 'ukmtheme' ),
        'id'      => 'ut_conference_title_ext_1',
        'type'    => 'text',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #1 Content', 'ukmtheme' ),
        'desc'    => __( 'Some content for title #1.', 'ukmtheme' ),
        'id'      => 'ut_conference_ext_content_1',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,

    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Show Title and Content #2', 'ukmtheme' ),
        'desc'    => __( 'Show Title and Content #2', 'ukmtheme' ),
        'id'      => 'ut_conference_title_2_hide',
        'type'    => 'checkbox',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #2', 'ukmtheme' ),
        'desc'    => __( 'Edit this title (use short term)', 'ukmtheme' ),
        'id'      => 'ut_conference_title_ext_2',
        'type'    => 'text',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #2 Content', 'ukmtheme' ),
        'desc'    => __( 'Some content for title #2.', 'ukmtheme' ),
        'id'      => 'ut_conference_ext_content_2',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Show Title and Content #3', 'ukmtheme' ),
        'desc'    => __( 'Show Title and Content #3', 'ukmtheme' ),
        'id'      => 'ut_conference_title_3_hide',
        'type'    => 'checkbox',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #3', 'ukmtheme' ),
        'desc'    => __( 'Edit this title (use short term)', 'ukmtheme' ),
        'id'      => 'ut_conference_title_ext_3',
        'type'    => 'text',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #3 Content', 'ukmtheme' ),
        'desc'    => __( 'Some content for title #3.', 'ukmtheme' ),
        'id'      => 'ut_conference_ext_content_3',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );



    $conference_extd->add_field( array(
        'name'    => __( 'Show Title and Content #4', 'ukmtheme' ),
        'desc'    => __( 'Show Title and Content #4', 'ukmtheme' ),
        'id'      => 'ut_conference_title_4_hide',
        'type'    => 'checkbox',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #4', 'ukmtheme' ),
        'desc'    => __( 'Edit this title (use short term)', 'ukmtheme' ),
        'id'      => 'ut_conference_title_ext_4',
        'type'    => 'text',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #4 Content', 'ukmtheme' ),
        'desc'    => __( 'Some content for title #4.', 'ukmtheme' ),
        'id'      => 'ut_conference_ext_content_4',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Show Title and Content #5', 'ukmtheme' ),
        'desc'    => __( 'Show Title and Content #5', 'ukmtheme' ),
        'id'      => 'ut_conference_title_5_hide',
        'type'    => 'checkbox',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #5', 'ukmtheme' ),
        'desc'    => __( 'Edit this title (use short term)', 'ukmtheme' ),
        'id'      => 'ut_conference_title_ext_5',
        'type'    => 'text',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #5 Content', 'ukmtheme' ),
        'desc'    => __( 'Some content for title #5.', 'ukmtheme' ),
        'id'      => 'ut_conference_ext_content_5',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Show Title and Content #6', 'ukmtheme' ),
        'desc'    => __( 'Show Title and Content #6', 'ukmtheme' ),
        'id'      => 'ut_conference_title_6_hide',
        'type'    => 'checkbox',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #6', 'ukmtheme' ),
        'desc'    => __( 'Edit this title (use short term)', 'ukmtheme' ),
        'id'      => 'ut_conference_title_ext_6',
        'type'    => 'text',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #6 Content', 'ukmtheme' ),
        'desc'    => __( 'Some content for title #6.', 'ukmtheme' ),
        'id'      => 'ut_conference_ext_content_6',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Show Title and Content #7', 'ukmtheme' ),
        'desc'    => __( 'Show Title and Content #7', 'ukmtheme' ),
        'id'      => 'ut_conference_title_7_hide',
        'type'    => 'checkbox',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #7', 'ukmtheme' ),
        'desc'    => __( 'Edit this title (use short term)', 'ukmtheme' ),
        'id'      => 'ut_conference_title_ext_7',
        'type'    => 'text',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #7 Content', 'ukmtheme' ),
        'desc'    => __( 'Some content for title #7.', 'ukmtheme' ),
        'id'      => 'ut_conference_ext_content_7',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Show Title and Content #8', 'ukmtheme' ),
        'desc'    => __( 'Show Title and Content #8', 'ukmtheme' ),
        'id'      => 'ut_conference_title_8_hide',
        'type'    => 'checkbox',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #8', 'ukmtheme' ),
        'desc'    => __( 'Edit this title (use short term)', 'ukmtheme' ),
        'id'      => 'ut_conference_title_ext_8',
        'type'    => 'text',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #8 Content', 'ukmtheme' ),
        'desc'    => __( 'Some content for title #8.', 'ukmtheme' ),
        'id'      => 'ut_conference_ext_content_8',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Show Title and Content #9', 'ukmtheme' ),
        'desc'    => __( 'Show Title and Content #9', 'ukmtheme' ),
        'id'      => 'ut_conference_title_9_hide',
        'type'    => 'checkbox',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #9', 'ukmtheme' ),
        'desc'    => __( 'Edit this title (use short term)', 'ukmtheme' ),
        'id'      => 'ut_conference_title_ext_9',
        'type'    => 'text',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #9 Content', 'ukmtheme' ),
        'desc'    => __( 'Some content for title #9.', 'ukmtheme' ),
        'id'      => 'ut_conference_ext_content_9',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Show Title and Content #10', 'ukmtheme' ),
        'desc'    => __( 'Show Title and Content #10', 'ukmtheme' ),
        'id'      => 'ut_conference_title_10_hide',
        'type'    => 'checkbox',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #10', 'ukmtheme' ),
        'desc'    => __( 'Edit this title (use short term)', 'ukmtheme' ),
        'id'      => 'ut_conference_title_ext_10',
        'type'    => 'text',
    ) );

    $conference_extd->add_field( array(
        'name'    => __( 'Title #10 Content', 'ukmtheme' ),
        'desc'    => __( 'Some content for title #10.', 'ukmtheme' ),
        'id'      => 'ut_conference_ext_content_10',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

}
add_action( 'cmb2_init', 'ukmtheme_conference_metaboxes' );