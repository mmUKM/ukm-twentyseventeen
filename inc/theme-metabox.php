<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

require_once get_template_directory() . '/lib/cmb2/init.php';

// SLIDESHOW

function ukmtheme_slideshow_metaboxes() {

    $cmb = new_cmb2_box( array(
        'id'            => 'slideshow_metabox',
        'title'         => __( 'Slideshow Settings', 'ukmtheme' ),
        'object_types'  => array( 'slideshow' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'closed'        => false,
    ) );

    $cmb->add_field( array(
        'name' => 'Slideshow Title',
        'desc' => 'Masukkan teks pada ruangan di atas.',
        'type' => 'title',
        'id'   => 'ut_slideshow_title'
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Image', 'ukmtheme' ),
        'desc'    => __( 'Upload an image or enter a URL. Dimensions of the image should be 1440x560 pixels.', 'ukmtheme' ),
        'id'      => 'ut_slideshow_image',
        'type'    => 'file',
        'allow'   => array('url'),
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Link', 'ukmtheme' ),
        'desc'    => __( 'link image to posts, pages or external web.', 'ukmtheme' ),
        'id'      => 'ut_slideshow_link',
        'type'    => 'text',
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Display Caption', 'ukmtheme' ),
        'desc'    => __( 'Display slideshow title and caption for this image', 'ukmtheme' ),
        'id'      => 'ut_slideshow_caption_hide',
        'type'    => 'checkbox'
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Caption', 'ukmtheme' ),
        'desc'    => __( 'Some caption for the image.', 'ukmtheme' ),
        'id'      => 'ut_slideshow_caption',
        'type'    => 'textarea',
    ) );   
}
add_action( 'cmb2_init', 'ukmtheme_slideshow_metaboxes' );

// STAFF DIRECTORY

function ukmtheme_staff_metaboxes() {

    $cmb = new_cmb2_box(  array(
        'id'            => 'staff_metabox',
        'title'         => __( 'Staff Detail', 'ukmtheme' ),
        'object_types'  => array( 'staff', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    $cmb->add_field( array(
        'name' => 'Nama',
        'desc' => 'Masukkan nama pada ruangan title di atas.',
        'type' => 'title',
        'id'   => 'ut_staff_title'
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Foto', 'ukmtheme' ),
        'desc'    => __( 'Pastikan telah disunting(crop) kepada saiz 300 x 380 pixel', 'ukmtheme' ),
        'id'      => 'ut_staff_photo',
        'type'    => 'file',
        'allow'   => array('url'),
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Papar No. Telefon', 'ukmtheme' ),
        'desc'    => __( 'Tandakan sekiranya ingin dipaparkan', 'ukmtheme' ),
        'id'      => 'ut_staff_phone_display',
        'type'    => 'checkbox',
    ) );

    $cmb->add_field( array(
        'name'    => __( 'No. Telefon', 'ukmtheme' ),
        'desc'    => __( 'e.g. 03-8921-7070', 'ukmtheme' ),
        'id'      => 'ut_staff_phone',
        'type'    => 'text',
    ) );

    $cmb->add_field( array(
        'name'    => __( 'E-mel', 'ukmtheme' ),
        'desc'    => __( 'e.g. user@ukm.edu.my', 'ukmtheme' ),
        'id'      => 'ut_staff_email',
        'type'    => 'text_email',
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Papar Skop Tugas', 'ukmtheme' ),
        'desc'    => __( 'Tandakan sekiranya ingin dipaparkan', 'ukmtheme' ),
        'id'      => 'ut_staff_work_scope',
        'type'    => 'checkbox',
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Papar Tajuk', 'ukmtheme' ),
        'desc'    => __( 'Tandakan sekiranya tidak ingin dipaparkan', 'ukmtheme' ),
        'id'      => 'ut_staff_work_scope_title',
        'type'    => 'checkbox',
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Tajuk Baru', 'ukmtheme' ),
        'desc'    => __( 'Tandakan sekiranya ingin dipaparkan', 'ukmtheme' ),
        'id'      => 'ut_staff_work_scope_title_custom',
        'type'    => 'text',
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Perincian Skop Kerja', 'ukmtheme' ),
        'desc'    => __( 'e.g. Do Multimedia Work', 'ukmtheme' ),
        'id'      => 'ut_staff_work_scope_desc',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
    ) );
}
add_action( 'cmb2_init', 'ukmtheme_staff_metaboxes' );
// Post Type: Conference

add_action( 'cmb2_init', 'ukmtheme_conference_metaboxes' );

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
            'desc'         => __( 'Upload or add multiple images. Dimensions of the image should be 380x300 pixels. Go into Media edit image, enter image title for speaker name, caption for title/position and alternate text for additional content.', 'ukmtheme' ),
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

// Post Type: Video

function ukmtheme_video_metaboxes() {

    

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
add_action( 'cmb2_init', 'ukmtheme_video_metaboxes' );

// Post Type: Gallery

add_action( 'cmb2_init', 'ukmtheme_gallery_metaboxes' );

    function ukmtheme_gallery_metaboxes() {

        

        $gallery = new_cmb2_box( array(
            'id'            => 'gallery_metabox',
            'title'         => __( 'Gallery Detail', 'ukmtheme' ),
            'object_types'  => array( 'gallery', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );
    
        $gallery->add_field( array(
            'name'    => __( 'Description', 'ukmtheme' ),
            'desc'    => __( 'Some description.', 'ukmtheme' ),
            'id'      => 'ut_gallery_description',
            'type'    => 'textarea',
        ) );

        $gallery->add_field( array(
            'name'    => __( 'Gallery Cover Image', 'ukmtheme' ),
            'desc'    => __( 'Upload an image or enter a URL. Dimensions of the image should be 300x240 pixels.', 'ukmtheme' ),
            'id'      => 'ut_gallery_cover',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );

        $gallery->add_field( array(
            'name'    => __( 'Date', 'ukmtheme' ),
            'desc'    => __( 'Gallery Date', 'ukmtheme' ),
            'id'      => 'ut_gallery_date',
            'type'    => 'text_date',
            'date_format' => __( 'd/m/Y', 'cmb2' ),
        ) );

        $gallery->add_field( array(
            'name'    => __( 'Photographer', 'ukmtheme' ),
            'desc'    => __( 'Photo by', 'ukmtheme' ),
            'id'      => 'ut_gallery_photographer',
            'type'    => 'text',
        ) );

        $gallery->add_field( array(
            'name'         => __( 'Image', 'ukmtheme' ),
            'desc'         => __( 'Upload or add multiple images/attachments.', 'ukmtheme' ),
            'id'           => 'ut_gallery_image',
            'type'         => 'file_list',
            'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        ) );
    }

// Post Type: Slideset

add_action( 'cmb2_init', 'ukmtheme_slideset_metaboxes' );

    function ukmtheme_slideset_metaboxes() {

        

        $slideset = new_cmb2_box( array(
            'id'            => 'slideset_metabox',
            'title'         => __( 'Slideset Detail', 'ukmtheme' ),
            'object_types'  => array( 'slideset', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $slideset->add_field( array(
            'name'    => __( 'Slideset Image', 'ukmtheme' ),
            'desc'    => __( 'Upload an image or enter a URL. Dimensions of the image should be 600x340 pixels.', 'ukmtheme' ),
            'id'      => 'ut_slideset_image',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );

        $slideset->add_field( array(
            'name'    => __( 'Slideset Link', 'ukmtheme' ),
            'desc'    => __( 'links to posts, pages or external web.', 'ukmtheme' ),
            'id'      => 'ut_slideset_link',
            'type'    => 'text',
        ) );
    }


// Post Type: Appreciation

add_action( 'cmb2_init', 'ukmtheme_appreciation_metaboxes' );

    function ukmtheme_appreciation_metaboxes() {

        

        $appreciation = new_cmb2_box(  array(
            'id'            => 'appreciation_metabox',
            'title'         => __( 'Appreciation Detail', 'ukmtheme' ),
            'object_types'  => array( 'appreciation', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $appreciation->add_field( array(
            'name'    => __( 'By', 'ukmtheme' ),
            'desc'    => __( 'e.g. Jamaludin Rajalu', 'ukmtheme' ),
            'id'      => 'ut_appreciation_by',
            'type'    => 'text',
        ) );

        $appreciation->add_field( array(
            'name'    => __( 'PTJ', 'ukmtheme' ),
            'desc'    => __( 'e.g. Pusat Teknologi Maklumat', 'ukmtheme' ),
            'id'      => 'ut_appreciation_ptj',
            'type'    => 'text',
        ) );

        $appreciation->add_field( array(
            'name'    => __( 'Date', 'ukmtheme' ),
            'desc'    => __( 'Date of appreciation', 'ukmtheme' ),
            'id'      => 'ut_appreciation_date',
            'type'    => 'text_date',
            'date_format' => __( 'd/m/Y', 'cmb2' ),
        ) );

        $appreciation->add_field( array(
            'name'    => __( 'Appreciation', 'ukmtheme' ),
            'desc'    => __( 'e.g. Terima kasih atas sumbangan sebagai urusetia majlis', 'ukmtheme' ),
            'id'      => 'ut_appreciation_greeting',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );
    }


// Post Type: Events Manager

add_action( 'cmb2_init', 'ukmtheme_event_metaboxes' );

    function ukmtheme_event_metaboxes() {

        

        $event = new_cmb2_box(  array(
            'id'            => 'event_metabox',
            'title'         => __( 'Event Detail', 'ukmtheme' ),
            'object_types'  => array( 'event', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $event->add_field( array(
            'name'    => __( 'Date', 'ukmtheme' ),
            'desc'    => __( 'Date of event', 'ukmtheme' ),
            'id'      => 'ut_event_date',
            'type'    => 'text_date',
            'date_format' => __( 'd/m/Y', 'cmb2' ),
        ) );

        $event->add_field( array(
            'name'    => __( 'Time: Start', 'ukmtheme' ),
            'desc'    => __( 'Start time of the event', 'ukmtheme' ),
            'id'      => 'ut_event_time_start',
            'type'    => 'text_time',
        ) );

        $event->add_field( array(
            'name'    => __( 'Time: End', 'ukmtheme' ),
            'desc'    => __( 'End time of the event', 'ukmtheme' ),
            'id'      => 'ut_event_time_end',
            'type'    => 'text_time',
        ) );

        $event->add_field( array(
            'name'    => __( 'Venue', 'ukmtheme' ),
            'desc'    => __( 'Venue of the event', 'ukmtheme' ),
            'id'      => 'ut_event_venue',
            'type'    => 'text',
        ) );

        $event->add_field( array(
            'name'    => __( 'Summary', 'ukmtheme' ),
            'desc'    => __( 'Event Summary', 'ukmtheme' ),
            'id'      => 'ut_event_summary',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );
    }

// Post Type: Journal

add_action( 'cmb2_init', 'ukmtheme_journal_metaboxes' );

    function ukmtheme_journal_metaboxes() {

        

        $journal = new_cmb2_box(  array(
            'id'            => 'journal_metabox',
            'title'         => __( 'Journal Detail', 'ukmtheme' ),
            'object_types'  => array( 'journal', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $journal->add_field( array(
            'name'    => __( 'Author', 'ukmtheme' ),
            'desc'    => __( 'e.g. Jamaludin Rajalu, Meor Sony Hermi, Faril Izaldi, Muhammad Zaidi. Separate names with commas', 'ukmtheme' ),
            'id'      => 'ut_journal_author',
            'type'    => 'text',
        ) );

        $journal->add_field( array(
            'name'    => __( 'Download', 'ukmtheme' ),
            'desc'    => __( 'e.g. http://www.ukm.my/files.pdf', 'ukmtheme' ),
            'id'      => 'ut_journal_reference',
            'type'    => 'text_url',
        ) ); 
    }

    // Post Type: Press Release

add_action( 'cmb2_init', 'ukmtheme_press_metaboxes' );

    function ukmtheme_press_metaboxes() {
    
        

        $press = new_cmb2_box( array(
            'id'            => 'press_metabox',
            'title'         => __( 'Press Release Detail', 'ukmtheme' ),
            'object_types'  => array( 'press', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );
        $press->add_field( array(
            'name'    => __( 'Date', 'ukmtheme' ),
            'desc'    => __( 'Press Release Date', 'ukmtheme' ),
            'id'      => 'ut_press_date',
            'type'    => 'text_date',
            'date_format' => __( 'd/m/Y', 'cmb2' ),
        ));
    
        $press->add_field( array(
            'name'    => __( 'URL', 'ukmtheme' ),
            'desc'    => __( '', 'ukmtheme' ),
            'id'      => 'ut_press_content',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ));
    
        $press->add_field( array(
            'name'    => __( 'URL', 'ukmtheme' ),
            'desc'    => __( '', 'ukmtheme' ),
            'id'      => 'ut_press_url',
            'type'    => 'text_url',
        ));
        
        $press->add_field( array(
            'name'    => __( 'File', 'ukmtheme' ),
            'desc'    => __( 'Upload document file.', 'ukmtheme' ),
            'id'      => 'ut_press_file',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );
    }

// Post Type: Publication

add_action( 'cmb2_init', 'ukmtheme_publication_metaboxes' );

    function ukmtheme_publication_metaboxes() {

        

        $publication = new_cmb2_box(  array(
            'id'            => 'publication_metabox',
            'title'         => __( 'Publication Detail', 'ukmtheme' ),
            'object_types'  => array( 'publication', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $publication->add_field( array(
            'name'    => __( 'Cover Image', 'ukmtheme' ),
            'desc'    => __( 'Upload an image or enter a URL. Dimensions of the image should be 300x380 pixels.', 'ukmtheme' ),
            'id'      => 'ut_publication_cover',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );

        $publication->add_field( array(
            'name'    => __( 'Author', 'ukmtheme' ),
            'desc'    => __( 'e.g. Jamaludin Rajalu', 'ukmtheme' ),
            'id'      => 'ut_publication_author',
            'type'    => 'text',
        ) );

        $publication->add_field( array(
            'name'    => __( 'Publisher', 'ukmtheme' ),
            'desc'    => __( 'e.g. Pusat Teknologi Maklumat', 'ukmtheme' ),
            'id'      => 'ut_publication_publisher',
            'type'    => 'text',
        ) );

        $publication->add_field( array(
            'name'    => __( 'Year', 'ukmtheme' ),
            'desc'    => __( 'e.g. 2014', 'ukmtheme' ),
            'id'      => 'ut_publication_year',
            'type'    => 'text',
        ) );

        $publication->add_field( array(
            'name'    => __( 'Number of Pages', 'ukmtheme' ),
            'desc'    => __( 'e.g. 199', 'ukmtheme' ),
            'id'      => 'ut_publication_pages',
            'type'    => 'text',
        ) );

        $publication->add_field( array(
            'name'    => __( 'Reference/Download', 'ukmtheme' ),
            'desc'    => __( 'e.g. http://www.ukm.my', 'ukmtheme' ),
            'id'      => 'ut_publication_reference',
            'type'    => 'text_url',
        ) );
    }

// Post Type: Expertise

add_action( 'cmb2_init', 'ukmtheme_expertise_metaboxes' );

    function ukmtheme_expertise_metaboxes() {

        

        $expertise = new_cmb2_box(  array(
            'id'            => 'expertise_metabox',
            'title'         => __( 'Expertise Detail', 'ukmtheme' ),
            'object_types'  => array( 'expertise', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Expert Photo', 'ukmtheme' ),
            'desc'    => __( 'Upload an image or enter a URL. Dimensions of the image should be 300x380 pixels.', 'ukmtheme' ),
            'id'      => 'ut_expertise_photo',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Biography', 'ukmtheme' ),
            'desc'    => __( 'A brief biography', 'ukmtheme' ),
            'id'      => 'ut_expertise_biography',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Contact', 'ukmtheme' ),
            'desc'    => __( 'e.g. 03-8921-7070', 'ukmtheme' ),
            'id'      => 'ut_expertise_contact',
            'type'    => 'text',
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Email', 'ukmtheme' ),
            'desc'    => __( 'e.g. user@ukm.edu.my', 'ukmtheme' ),
            'id'      => 'ut_expertise_email',
            'type'    => 'text_email',
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Current Position', 'ukmtheme' ),
            'desc'    => __( 'e.g. Professor', 'ukmtheme' ),
            'id'      => 'ut_expertise_position',
            'type'    => 'text',
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Specialisation', 'ukmtheme' ),
            'desc'    => __( 'Tourism and Hospitality Marketing, &amp; Services Marketing', 'ukmtheme' ),
            'id'      => 'ut_expertise_specialisation',
            'type'    => 'text',
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Qualifications', 'ukmtheme' ),
            'desc'    => __( 'e.g. Doctor of Philosophy (University of Malaya) [2002-2005]', 'ukmtheme' ),
            'id'      => 'ut_expertise_qualification',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Areas of Research', 'ukmtheme' ),
            'desc'    => __( 'e.g. Services Marketing and Consumer Behavior Analysis', 'ukmtheme' ),
            'id'      => 'ut_expertise_research_area',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Research/<br/>Consultation/<br/>Expansion', 'ukmtheme' ),
            'desc'    => __( 'e.g. Developing A Higher Education Brand Index for Malaysia. Jan1, 2009-June 30,2010. GSB-001-2009 (External Grant). Ongoing.', 'ukmtheme' ),
            'id'      => 'ut_expertise_research_consultation',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Publications Journals', 'ukmtheme' ),
            'desc'    => __( 'e.g. Ahmad Azmi M. Ariffin & Mohd Safar Hashim. 2009. Marketing Malaysia to the Middle East Tourists: Towards a Prime Inter-Regional Destination. International Journal of West Asian Studies. 1(1): 43-58. ISSN 1394-0902.', 'ukmtheme' ),
            'id'      => 'ut_expertise_journal',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Proceedings', 'ukmtheme' ),
            'desc'    => __( 'e.g. Ahmad Azmi M.Ariffin, Aliah Hanim M.Salleh, Norzalita A.Aziz & Astuti A.Asbudin. 2009. Determining Passengers’ Expectation, Service Quality and Satisfaction for Low Cost Carriers. The Proceeding of The 11th. International Business Research Conference. Sydney Australia. Dec 2-4, 2009. ISBN: 978-0-980-4557-0-7 (Presenter).', 'ukmtheme' ),
            'id'      => 'ut_expertise_proceedings',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Book', 'ukmtheme' ),
            'desc'    => __( 'e.g. Ahmad Azmi Mohd. Ariffin, Norzalita Abd. Aziz. 2009. Chapter 5: Service Quality and Zone of Tolerance in Malaysian Banking Services. In Services Management and Marketing: Studies in Malaysia. Edited by Aliah Hanim Mohd. Salleh, Ahmad Azmi Mohd. Ariffin, June M. L. Poon & Aini Aman. GSB-UKM. Bangi.', 'ukmtheme' ),
            'id'      => 'ut_expertise_book',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Articles in Antologi/<br/>Chapters in Book', 'ukmtheme' ),
            'desc'    => __( 'e.g. Ahmad Azmi Mohd. Ariffin, Norzalita Abd. Aziz. 2009. Chapter 5: Service Quality and Zone of Tolerance in Malaysian Banking Services. In Services Management and Marketing: Studies in Malaysia. Edited by Aliah Hanim Mohd. Salleh, Ahmad Azmi Mohd. Ariffin, June M. L. Poon & Aini Aman. GSB-UKM. Bangi.', 'ukmtheme' ),
            'id'      => 'ut_expertise_antologi',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Monograph,<br/> Working Papers<br/> and Non-Periodical<br/> Publications', 'ukmtheme' ),
            'desc'    => __( 'e.g. Module ”Tourism Marketing” (Code: BBAS 3103).  Open University Malaysia. 2007/2008', 'ukmtheme' ),
            'id'      => 'ut_expertise_monograph',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Seminar', 'ukmtheme' ),
            'desc'    => __( 'e.g. Ahmad Azmi Mohd. Ariffin, Norzalita Abd. Aziz. 2009. Chapter 5: Service Quality and Zone of Tolerance in Malaysian Banking Services. In Services Management and Marketing: Studies in Malaysia. Edited by Aliah Hanim Mohd. Salleh, Ahmad Azmi Mohd. Ariffin, June M. L. Poon & Aini Aman. GSB-UKM. Bangi.', 'ukmtheme' ),
            'id'      => 'ut_expertise_seminar',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Award', 'ukmtheme' ),
            'desc'    => __( 'e.g. EXCELLENT SERVICE AWARD 2007. Faculty of Economics and BusinessUniversiti Kebangsaan Malaysia', 'ukmtheme' ),
            'id'      => 'ut_expertise_award',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Supervision', 'ukmtheme' ),
            'desc'    => __( 'e.g. Lim Chui Seong (DBA. Disertasi) The Influence of e-Hospitality on Websites Satisfaction and Loyalty (Ongoing)', 'ukmtheme' ),
            'id'      => 'ut_expertise_supervision',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Administrative<br/> Services/Committee', 'ukmtheme' ),
            'desc'    => __( 'e.g. MANAGING EDITOR OF JURNAL PENGURUSAN 1 April 2007 – Present Graduate School of Business, Universiti Kebangsaan Malaysia', 'ukmtheme' ),
            'id'      => 'ut_expertise_administrative',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Reports: Technical/<br/>Research/<br/>Consultation', 'ukmtheme' ),
            'desc'    => __( 'e.g. Mohd Fauzi Mohd Jani, Zaimah Derawi, Tih Sio Hong, Rozita Amirudin, Ahmad Azmi Ariffin, Zafir Makhbul, Aini Aman, Mohd Radzuan Rahid, Ahmad Raflis Omar, Kamalrudin Mohamed Saleh. 2008. “Laporan Akhir Program Latihan Keusahawanan: Kerjasama Pelajar Universiti dan Entepris Kecil dan Sederhana (EKS)”. SMIDEC.', 'ukmtheme' ),
            'id'      => 'ut_expertise_reports',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Research Grant', 'ukmtheme' ),
            'desc'    => __( 'e.g. Ahmad Azmi Mohd. Ariffin, Norzalita Abd. Aziz. 2009. Chapter 5: Service Quality and Zone of Tolerance in Malaysian Banking Services. In Services Management and Marketing: Studies in Malaysia. Edited by Aliah Hanim Mohd. Salleh, Ahmad Azmi Mohd. Ariffin, June M. L. Poon & Aini Aman. GSB-UKM. Bangi.', 'ukmtheme' ),
            'id'      => 'ut_expertise_research_grant',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );

        $expertise->add_field( array(
            'name'    => __( 'Teaching', 'ukmtheme' ),
            'desc'    => __( 'e.g. Courses Taught at Ph.D./DBA Level Hospitality Marketing: Theory and Research', 'ukmtheme' ),
            'id'      => 'ut_expertise_teaching',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );
    }


// Post Type: Expertise > Hide extra option

add_action( 'cmb2_init', 'ukmtheme_expertise_hide_metaboxes' );

    function ukmtheme_expertise_hide_metaboxes() {

        

        $expertise_hide = new_cmb2_box(  array(
            'id'            => 'expertise_metabox_hide',
            'title'         => __( 'Hide Option (Please check if want to hide)', 'ukmtheme' ),
            'object_types'  => array( 'expertise', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => false,
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Research/Consultation/Expansion', 'ukmtheme' ),
            'desc'    => __( 'Hide Research/Consultation/Expansion', 'ukmtheme' ),
            'id'      => 'ut_expertise_research_consultation_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Publications Journals', 'ukmtheme' ),
            'desc'    => __( 'Hide Publications Journals', 'ukmtheme' ),
            'id'      => 'ut_expertise_journal_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Proceedings', 'ukmtheme' ),
            'desc'    => __( 'Hide Proceedings', 'ukmtheme' ),
            'id'      => 'ut_expertise_proceedings_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Book', 'ukmtheme' ),
            'desc'    => __( 'Hide Book', 'ukmtheme' ),
            'id'      => 'ut_expertise_book_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Articles in Antologi/Chapters in Book', 'ukmtheme' ),
            'desc'    => __( 'Hide Articles in Antologi/Chapters in Book', 'ukmtheme' ),
            'id'      => 'ut_expertise_antologi_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Monograph, Working Papers and Non-Periodical Publications', 'ukmtheme' ),
            'desc'    => __( 'Hide Monograph, Working Papers and Non-Periodical Publications', 'ukmtheme' ),
            'id'      => 'ut_expertise_monograph_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Seminar', 'ukmtheme' ),
            'desc'    => __( 'Hide Seminar', 'ukmtheme' ),
            'id'      => 'ut_expertise_seminar_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Award', 'ukmtheme' ),
            'desc'    => __( 'Hide Award', 'ukmtheme' ),
            'id'      => 'ut_expertise_award_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Supervision', 'ukmtheme' ),
            'desc'    => __( 'Hide Supervision', 'ukmtheme' ),
            'id'      => 'ut_expertise_supervision_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Administrative Services/Committee', 'ukmtheme' ),
            'desc'    => __( 'Hide Administrative Services/Committee', 'ukmtheme' ),
            'id'      => 'ut_expertise_administrative_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Reports: Technical/Research/Consultation', 'ukmtheme' ),
            'desc'    => __( 'Hide Reports: Technical/Research/Consultation', 'ukmtheme' ),
            'id'      => 'ut_expertise_reports_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Research Grant', 'ukmtheme' ),
            'desc'    => __( 'Hide Research Grant', 'ukmtheme' ),
            'id'      => 'ut_expertise_research_grant_hide',
            'type'    => 'checkbox',
        ) );

        $expertise_hide->add_field( array(
            'name'    => __( 'Hide Teaching', 'ukmtheme' ),
            'desc'    => __( 'Hide Teaching', 'ukmtheme' ),
            'id'      => 'ut_expertise_teaching_hide',
            'type'    => 'checkbox',
        ) );
    }
