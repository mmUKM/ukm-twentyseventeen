<?php
/**
 * Metaboxes: slideshow
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;
 
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
        'desc'    => esc_html__('Saiz yang disarakan adalah 2880 x 1200 px dalam format .avif.', 'ukmtheme' ),
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
