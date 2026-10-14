<?php
/**
 * Metaboxes: publication
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;    function ukmtheme_publication_metaboxes() {

        $publication = new_cmb2_box(  array(
            'id'            => 'publication_metabox',
            'title'         => esc_html__( 'Publication Detail', 'ukmtheme' ),
            'object_types'  => array( 'publication', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );

        $publication->add_field( array(
            'name'    => esc_html__( 'Description', 'ukmtheme' ),
            'desc'    => esc_html__( 'Tourism and Hospitality Marketing, &amp; Services Marketing', 'ukmtheme' ),
            'id'      => 'ut_publication_description',
            'type'    => 'wysiwyg',
            'options' => array( 'textarea_rows' => 5, ),
        ) );
        
        $publication->add_field( array(
	'name'    => esc_html__( 'Biography', 'ukmtheme' ),
	'desc'    => esc_html__( 'Author Biography', 'ukmtheme' ),
	'id'      => 'ut_publication_biography',
	'type'    => 'wysiwyg',
	'options' => array( 'textarea_rows' => 5, ),
        ) );

        $publication->add_field( array(
                'name'    => esc_html__( 'Review', 'ukmtheme' ),
                'desc'    => esc_html__( 'Review', 'ukmtheme' ),
                'id'      => 'ut_publication_review',
                'type'    => 'wysiwyg',
                'options' => array( 'textarea_rows' => 5, ),
        ) );

        $publication->add_field( array(
            'name'    => esc_html__( 'Cover Image', 'ukmtheme' ),
            'desc'    => esc_html__( 'Upload an image or enter a URL. Dimensions of the image should be 300x380 pixels.', 'ukmtheme' ),
            'id'      => 'ut_publication_cover',
            'type'    => 'file',
            'allow'   => array('url'),
        ) );
        
        $publication->add_field( array(
            'name'         => __( 'Galeri Gambar Terbitan', 'ukmtheme' ),
            'desc'         => __( 'Muat naik gambar untuk slider (Cover & Halaman Pilihan)', 'ukmtheme' ),
            'id'           => 'ut_publication_gallery',
            'type'         => 'file_list',
            'preview_size' => array( 100, 100 ),
        ) );

        $publication->add_field( array(
            'name'         => esc_html__('Additional Image', 'ukmtheme' ),
            'desc'         => esc_html__('Upload or add multiple images/attachments.', 'ukmtheme' ),
            'id'           => 'ut_publication_image',
            'type'         => 'file_list',
            'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
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
            'name'    => esc_html__( 'ISBN', 'ukmtheme' ),
            'desc'    => esc_html__( 'e.g. 978-3-16-148410-0', 'ukmtheme' ),
            'id'      => 'ut_publication_isbn',
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

        $publication->add_field( array(
            'name'         => esc_html__('Pautan e-commerce', 'ukmtheme' ),
            'desc'         => esc_html__('Pilih platform e-commerce', 'ukmtheme' ),
            'id'           => 'ut_publication_ecommerce',
            'type'         => 'multicheck',
            'options'       => array(
                get_template_directory_uri() . '/images/pub-shopee.png' =>   esc_html__( 'Shopee', 'cmb2' ),
                // get_template_directory_uri() . '/images/pub-lazada.png' =>   esc_html__( 'Lazada', 'cmb2' ),
                get_template_directory_uri() . '/images/pub-amazon.png' =>   esc_html__( 'Amazon', 'cmb2' ),
            ),
            'inline'        => 'true'
        ) );

        $publication->add_field( array(
            'name'    => esc_html__( 'Shopee URL', 'ukmtheme' ),
            'desc'    => esc_html__( 'e.g. https://shopee.com.my/', 'ukmtheme' ),
            'id'      => 'ut_publication_shopee',
            'type'    => 'text_url',
        ) );

        $publication->add_field( array(
            'name'    => esc_html__( 'Amazon', 'ukmtheme' ),
            'desc'    => esc_html__( 'e.g. https://www.amazon.com', 'ukmtheme' ),
            'id'      => 'ut_publication_amazon',
            'type'    => 'text_url',
        ) );
    }

// Post Type: Expertise

add_action( 'cmb2_init', 'ukmtheme_expertise_metaboxes' );

