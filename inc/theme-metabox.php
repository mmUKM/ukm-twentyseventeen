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
        'title'         => __( 'Tetapan Slideshow', 'ukmtheme' ),
        'object_types'  => array( 'slideshow' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'closed'        => false,
    ) );

    $cmb->add_field( array(
        'name' => 'Tajuk',
        'desc' => 'Masukkan teks pada ruangan di atas.',
        'type' => 'title',
        'id'   => 'ut_slideshow_title'
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Imej', 'ukmtheme' ),
        'desc'    => __( 'Sila muat naik grafik yang telah disunting. Saiz yang disarakan adalah 1440 x 560 px.', 'ukmtheme' ),
        'id'      => 'ut_slideshow_image',
        'type'    => 'file',
        'allow'   => array('url'),
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Pautan', 'ukmtheme' ),
        'desc'    => __( 'Pautkan imej kepada pages atau ke lawan web luar', 'ukmtheme' ),
        'id'      => 'ut_slideshow_link',
        'type'    => 'text',
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Papar Caption', 'ukmtheme' ),
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
        'title'         => __( 'Maklumat Kakitangan', 'ukmtheme' ),
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