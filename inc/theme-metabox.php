<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( file_exists( get_template_directory() . '/lib/cmb2/init.php' ) ) {
	require_once get_template_directory() . '/lib/cmb2/init.php';
} elseif ( file_exists( get_template_directory() . '/lib/CMB2/init.php' ) ) {
	require_once get_template_directory() . '/lib/CMB2/init.php';
}

// SLIDESHOW

function ukmtheme_slideshow_metaboxes() {

    $cmb = new_cmb2_box( array(
        'id'            => 'slideshow_metabox',
        'title'         => esc_html__( 'Tetapan Slideshow', 'ukmtheme' ),
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
        'name'    => esc_html__( 'Imej', 'ukmtheme' ),
        'desc'    => esc_html__( 'Sila muat naik grafik yang telah disunting. Saiz yang disarakan adalah 1440 x 560 px.', 'ukmtheme' ),
        'id'      => 'ut_slideshow_image',
        'type'    => 'file',
        'allow'   => array('url'),
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'Pautan', 'ukmtheme' ),
        'desc'    => esc_html__( 'Pautkan imej kepada pages atau ke lawan web luar', 'ukmtheme' ),
        'id'      => 'ut_slideshow_link',
        'type'    => 'text',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'Papar Caption', 'ukmtheme' ),
        'desc'    => esc_html__( 'Display slideshow title and caption for this image', 'ukmtheme' ),
        'id'      => 'ut_slideshow_caption_hide',
        'type'    => 'checkbox'
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'Caption', 'ukmtheme' ),
        'desc'    => esc_html__( 'Some caption for the image.', 'ukmtheme' ),
        'id'      => 'ut_slideshow_caption',
        'type'    => 'textarea',
    ) );   
}
add_action( 'cmb2_init', 'ukmtheme_slideshow_metaboxes' );

// STAFF DIRECTORY

function ukmtheme_staff_metaboxes() {

    $cmb = new_cmb2_box(  array(
        'id'            => 'staff_metabox',
        'title'         => esc_html__( 'Maklumat Kakitangan', 'ukmtheme' ),
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
        'name'    => esc_html__( 'Foto', 'ukmtheme' ),
        'desc'    => esc_html__( 'Pastikan telah disunting(crop) kepada saiz 300 x 380 pixel', 'ukmtheme' ),
        'id'      => 'ut_staff_photo',
        'type'    => 'file',
        'allow'   => array('url'),
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'Papar No. Telefon', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tandakan sekiranya ingin dipaparkan', 'ukmtheme' ),
        'id'      => 'ut_staff_phone_display',
        'type'    => 'checkbox',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'No. Telefon', 'ukmtheme' ),
        'desc'    => esc_html__( 'e.g. 03-8921-7070', 'ukmtheme' ),
        'id'      => 'ut_staff_phone',
        'type'    => 'text',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'E-mel', 'ukmtheme' ),
        'desc'    => esc_html__( 'e.g. user@ukm.edu.my', 'ukmtheme' ),
        'id'      => 'ut_staff_email',
        'type'    => 'text_email',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'Papar Skop Tugas', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tandakan sekiranya ingin dipaparkan', 'ukmtheme' ),
        'id'      => 'ut_staff_work_scope',
        'type'    => 'checkbox',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'Papar Tajuk', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tandakan sekiranya tidak ingin dipaparkan', 'ukmtheme' ),
        'id'      => 'ut_staff_work_scope_title',
        'type'    => 'checkbox',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'Tajuk Baru', 'ukmtheme' ),
        'desc'    => esc_html__( 'Tandakan sekiranya ingin dipaparkan', 'ukmtheme' ),
        'id'      => 'ut_staff_work_scope_title_custom',
        'type'    => 'text',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__( 'Perincian Skop Kerja', 'ukmtheme' ),
        'desc'    => esc_html__( 'e.g. Do Multimedia Work', 'ukmtheme' ),
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
            'title'         => esc_html__( 'Gallery Detail', 'ukmtheme' ),
            'object_types'  => array( 'gallery', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );
    
        $gallery->add_field( array(
            'name'    => esc_html__( 'Description', 'ukmtheme' ),
            'desc'    => esc_html__( 'Some description.', 'ukmtheme' ),
            'id'      => 'ut_gallery_description',
            'type'    => 'textarea',
        ) );

        $gallery->add_field( array(
            'name'    => esc_html__( 'Gallery Cover Image', 'ukmtheme' ),
            'desc'    => esc_html__( 'Upload an image or enter a URL. Dimensions of the image should be 300x240 pixels.', 'ukmtheme' ),
            'id'      => 'ut_gallery_cover',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );

        $gallery->add_field( array(
            'name'    => esc_html__( 'Date', 'ukmtheme' ),
            'desc'    => esc_html__( 'Gallery Date', 'ukmtheme' ),
            'id'      => 'ut_gallery_date',
            'type'    => 'text_date',
            'date_format' => esc_html__( 'd/m/Y', 'cmb2' ),
        ) );

        $gallery->add_field( array(
            'name'    => esc_html__( 'Photographer', 'ukmtheme' ),
            'desc'    => esc_html__( 'Photo by', 'ukmtheme' ),
            'id'      => 'ut_gallery_photographer',
            'type'    => 'text',
        ) );

        $gallery->add_field( array(
            'name'         => esc_html__( 'Image', 'ukmtheme' ),
            'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'ukmtheme' ),
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
            'title'         => esc_html__( 'Slideset Detail', 'ukmtheme' ),
            'object_types'  => array( 'slideset', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $slideset->add_field( array(
            'name'    => esc_html__( 'Slideset Image', 'ukmtheme' ),
            'desc'    => esc_html__( 'Upload an image or enter a URL. Dimensions of the image should be 600x340 pixels.', 'ukmtheme' ),
            'id'      => 'ut_slideset_image',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );

        $slideset->add_field( array(
            'name'    => esc_html__( 'Slideset Link', 'ukmtheme' ),
            'desc'    => esc_html__( 'links to posts, pages or external web.', 'ukmtheme' ),
            'id'      => 'ut_slideset_link',
            'type'    => 'text',
        ) );
    }