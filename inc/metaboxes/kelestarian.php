<?php
/**
 * Metaboxes: kelestarian
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

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
        'name'        => esc_html__( 'Tarikh', 'ukmtheme' ),
        'desc'        => esc_html__( '01/05/2025', 'ukmtheme' ),
        'id'          => 'ut_kelestarian_date',
        'type'        => 'text_date',
        'date_format' => esc_html__( 'd/m/Y', 'cmb2' ),
    ) );
    
    $kelestarian->add_field( array(
        'name'         => esc_html__('Foto', 'ukmtheme' ),
        'desc'         => esc_html__('Sila muat naik grafik yang telah disunting.', 'ukmtheme' ),
        'id'           => 'ut_kelestarian_foto',
        'type'         => 'file_list',
        'preview_size' => array( 100, 100 ),
    ) );

    $kelestarian->add_field( array(
        'name'            => esc_html__( 'Ringkasan', 'ukmtheme' ),
        'desc'            => esc_html__( 'Paste facebook embed code di sini', 'ukmtheme' ),
        'id'              => 'ut_kelestarian_ringkasan',
        'type'            => 'wysiwyg',
        'options'         => array( 'textarea_rows' => 5, ),
        'sanitization_cb' => false,
    ) );

    $kelestarian->add_field( array(
        'name'         => esc_html__('Poster SDG', 'ukmtheme' ),
        'desc'         => esc_html__('Pilih Poster SDG', 'ukmtheme' ),
        'id'           => 'ut_kelestarian_sdg',
        'type'         => 'multicheck',
        'options'       => array(
            get_template_directory_uri() . '/assets/images/sdg-1.png' =>   esc_html__( 'SDG 1', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-2.png' =>   esc_html__( 'SDG 2', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-3.png' =>   esc_html__( 'SDG 3', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-4.png' =>   esc_html__( 'SDG 4', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-5.png' =>   esc_html__( 'SDG 5', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-6.png' =>   esc_html__( 'SDG 6', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-7.png' =>   esc_html__( 'SDG 7', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-8.png' =>   esc_html__( 'SDG 8', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-9.png' =>   esc_html__( 'SDG 9', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-10.png' =>   esc_html__( 'SDG 10', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-11.png' =>   esc_html__( 'SDG 11', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-12.png' =>   esc_html__( 'SDG 12', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-13.png' =>   esc_html__( 'SDG 13', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-14.png' =>   esc_html__( 'SDG 14', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-15.png' =>   esc_html__( 'SDG 15', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-16.png' =>   esc_html__( 'SDG 16', 'cmb2' ),
            get_template_directory_uri() . '/assets/images/sdg-17.png' =>   esc_html__( 'SDG 17', 'cmb2' ),
        ),
        'inline'        => 'true'
    ) );
}
add_action( 'cmb2_init', 'ukmtheme_kelestarian_metaboxes' );

