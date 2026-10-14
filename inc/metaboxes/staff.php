<?php
/**
 * Metaboxes: staff
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;function ukmtheme_staff_metaboxes() {

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

