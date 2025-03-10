<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( file_exists( get_template_directory() . '/packages/cmb2/init.php' ) ) {
	require_once get_template_directory() . '/packages/cmb2/init.php';
} elseif ( file_exists( get_template_directory() . '/packages/CMB2/init.php' ) ) {
	require_once get_template_directory() . '/packages/CMB2/init.php';
}

// SLIDESHOW

function ukmtheme_slideshow_metaboxes() {

    $cmb = new_cmb2_box( array(
        'id'            => 'slideshow_metabox',
        'title'         => esc_html__('Tetapan Slideshow', 'ukmtheme' ),
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
        'name'    => esc_html__('Imej', 'ukmtheme' ),
        'desc'    => esc_html__('Sila muat naik grafik yang telah disunting. Saiz yang disarakan adalah 1440 x 560 px.', 'ukmtheme' ),
        'id'      => 'ut_slideshow_image',
        'type'    => 'file',
        'allow'   => array('url'),
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__('Pautan', 'ukmtheme' ),
        'desc'    => esc_html__('Pautkan imej kepada pages atau ke lawan web luar', 'ukmtheme' ),
        'id'      => 'ut_slideshow_link',
        'type'    => 'text',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__('Papar Caption', 'ukmtheme' ),
        'desc'    => esc_html__('Display slideshow title and caption for this image', 'ukmtheme' ),
        'id'      => 'ut_slideshow_caption_hide',
        'type'    => 'checkbox'
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__('Caption', 'ukmtheme' ),
        'desc'    => esc_html__('Some caption for the image.', 'ukmtheme' ),
        'id'      => 'ut_slideshow_caption',
        'type'    => 'textarea',
    ) );   
}
add_action( 'cmb2_init', 'ukmtheme_slideshow_metaboxes' );

// STAFF DIRECTORY

function ukmtheme_staff_metaboxes() {

    $cmb = new_cmb2_box(  array(
        'id'            => 'staff_metabox',
        'title'         => esc_html__('Maklumat Kakitangan', 'ukmtheme' ),
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
        'name'    => esc_html__('Foto', 'ukmtheme' ),
        'desc'    => esc_html__('Pastikan telah disunting(crop) kepada saiz 300 x 380 pixel', 'ukmtheme' ),
        'id'      => 'ut_staff_photo',
        'type'    => 'file',
        'allow'   => array('url'),
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__('No. Telefon', 'ukmtheme' ),
        'desc'    => esc_html__('e.g. 03-8921-5555', 'ukmtheme' ),
        'id'      => 'ut_staff_phone',
        'type'    => 'text',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__('E-mel', 'ukmtheme' ),
        'desc'    => esc_html__('e.g. user@ukm.edu.my', 'ukmtheme' ),
        'id'      => 'ut_staff_email',
        'type'    => 'text_email',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__('Papar Skop Tugas', 'ukmtheme' ),
        'desc'    => esc_html__('Tandakan sekiranya ingin dipaparkan', 'ukmtheme' ),
        'id'      => 'ut_staff_work_scope',
        'type'    => 'checkbox',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__('Papar Tajuk', 'ukmtheme' ),
        'desc'    => esc_html__('Tandakan sekiranya tidak ingin dipaparkan', 'ukmtheme' ),
        'id'      => 'ut_staff_work_scope_title',
        'type'    => 'checkbox',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__('Tajuk Baru', 'ukmtheme' ),
        'desc'    => esc_html__('Tandakan sekiranya ingin dipaparkan', 'ukmtheme' ),
        'id'      => 'ut_staff_work_scope_title_custom',
        'type'    => 'text',
    ) );

    $cmb->add_field( array(
        'name'    => esc_html__('Perincian Skop Kerja', 'ukmtheme' ),
        'desc'    => esc_html__('e.g. Do Multimedia Work', 'ukmtheme' ),
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

    function ukmtheme_slideset_metaboxes() {

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

    function ukmtheme_press_metaboxes() { 

        $press = new_cmb2_box( array(
            'id'            => 'press_metabox',
            'title'         => esc_html__( 'Press Release Detail', 'ukmtheme' ),
            'object_types'  => array( 'press', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );
        $press->add_field( array(
            'name'    => esc_html__( 'Date', 'ukmtheme' ),
            'desc'    => esc_html__( 'Press Release Date', 'ukmtheme' ),
            'id'      => 'ut_press_date',
            'type'    => 'text_date',
            'date_format' => esc_html__( 'd/m/Y', 'cmb2' ),
        ));

        $press->add_field( array(
            'name'    => esc_html__( 'URL', 'ukmtheme' ),
            'desc'    => esc_html__( '', 'ukmtheme' ),
            'id'      => 'ut_press_url',
            'type'    => 'text_url',
        ));
        
        $press->add_field( array(
            'name'    => esc_html__( 'File', 'ukmtheme' ),
            'desc'    => esc_html__( 'Upload document file.', 'ukmtheme' ),
            'id'      => 'ut_press_file',
            'type'    => 'file',
            'allow'   => array( 'url' ),
        ) );
    }

// Post Type: Publication

add_action( 'cmb2_init', 'ukmtheme_publication_metaboxes' );

    function ukmtheme_publication_metaboxes() {

        $publication = new_cmb2_box(  array(
            'id'            => 'publication_metabox',
            'title'         => esc_html__( 'Publication Detail', 'ukmtheme' ),
            'object_types'  => array( 'publication', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $publication->add_field( array(
            'name'    => esc_html__( 'Cover Image', 'ukmtheme' ),
            'desc'    => esc_html__( 'Upload an image or enter a URL. Dimensions of the image should be 300x380 pixels.', 'ukmtheme' ),
            'id'      => 'ut_publication_cover',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );

        $publication->add_field( array(
            'name'    => esc_html__( 'Author', 'ukmtheme' ),
            'desc'    => esc_html__( 'e.g. Jamaludin Rajalu', 'ukmtheme' ),
            'id'      => 'ut_publication_author',
            'type'    => 'text',
        ) );

        $publication->add_field( array(
            'name'    => esc_html__( 'Publisher', 'ukmtheme' ),
            'desc'    => esc_html__( 'e.g. Pusat Teknologi Maklumat', 'ukmtheme' ),
            'id'      => 'ut_publication_publisher',
            'type'    => 'text',
        ) );

        $publication->add_field( array(
            'name'    => esc_html__( 'Year', 'ukmtheme' ),
            'desc'    => esc_html__( 'e.g. 2014', 'ukmtheme' ),
            'id'      => 'ut_publication_year',
            'type'    => 'text',
        ) );

        $publication->add_field( array(
            'name'    => esc_html__( 'Reference/Download', 'ukmtheme' ),
            'desc'    => esc_html__( 'e.g. http://www.ukm.my', 'ukmtheme' ),
            'id'      => 'ut_publication_reference',
            'type'    => 'text_url',
        ) );

        $publication->add_field( array(
            'name'    => esc_html__( 'Rename Download Title', 'ukmtheme' ),
            'desc'    => esc_html__( 'Get Now!', 'ukmtheme' ),
            'id'      => 'ut_publication_renamedownload',
            'type'    => 'text',
        ) );
    }

// Post Type: Expertise

add_action( 'cmb2_init', 'ukmtheme_expertise_metaboxes' );

    function ukmtheme_expertise_metaboxes() {

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

// Post Type: Pekeliling

add_action( 'cmb2_init', 'ukmtheme_pekeliling_metaboxes' );

    function ukmtheme_pekeliling_metaboxes() { 

        $pekeliling = new_cmb2_box( array(
            'id'            => 'pekeliling_metabox',
            'title'         => esc_html__( 'Butiran', 'ukmtheme' ),
            'object_types'  => array( 'pekeliling', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );
        $pekeliling->add_field( array(
            'name'    => esc_html__( 'Tarikh Kuat Kuasa', 'ukmtheme' ),
            'desc'    => esc_html__( '20/11/2011', 'ukmtheme' ),
            'id'      => 'ut_pekeliling_date',
            'type'    => 'text_date',
            'date_format' => esc_html__( 'd/m/Y', 'cmb2' ),
        ));  
        $pekeliling->add_field( array(
            'name'    => esc_html__( 'Fail', 'ukmtheme' ),
            'desc'    => esc_html__( 'Muat naik fail pdf, doc dan lain-lain. Namakan fail mengikut nama sebenar sebelum dimuat naik. Boleh muat naik lebih dari satu fail.', 'ukmtheme' ),
            'id'      => 'ut_pekeliling_file',
            'type'         => 'file_list',
            'allow'   => array( 'url' ),
        ) );

        $pekeliling->add_field( array(
            'name'    => esc_html__( 'Pindaan', 'ukmtheme' ),
            'desc'    => esc_html__( 'Pindaan', 'ukmtheme' ),
            'id'      => 'ut_pekeliling_pinda',
            'type'         => 'text',
        ) );

        $pekeliling->add_field( array(
            'name'    => esc_html__( 'Tindakan', 'ukmtheme' ),
            'desc'    => esc_html__( 'Tindakan', 'ukmtheme' ),
            'id'      => 'ut_pekeliling_tindakan',
            'type'         => 'text',
        ) );
    }

    // Post Type: kelestarian

    add_action( 'cmb2_init', 'ukmtheme_kelestarian_metaboxes' );

    function ukmtheme_kelestarian_metaboxes() { 

        $kelestarian = new_cmb2_box( array(
            'id'            => 'kelestarian_metabox',
            'title'         => esc_html__( 'Butiran', 'ukmtheme' ),
            'object_types'  => array( 'kelestarian', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );
        $kelestarian->add_field( array(
            'name'    => esc_html__( 'Tarikh', 'ukmtheme' ),
            'desc'    => esc_html__( '20/11/2011', 'ukmtheme' ),
            'id'      => 'ut_kelestarian_date',
            'type'    => 'text_date',
            'date_format' => esc_html__( 'd/m/Y', 'cmb2' ),
        ));  

        $kelestarian->add_field( array(
            'name'       => esc_html__( 'Ringkasan', 'ukmtheme' ),
            'desc'      => esc_html__( 'Paste facebook embed code di sini', 'ukmtheme' ),
            'id'        => 'ut_kelestarian_ringkasan',
            'type'      => 'textarea_code'
        ) );
    }

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