<?php
/**
 * Metaboxes: press
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

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
        'name'        => esc_html__( 'Date', 'ukmtheme' ),
        'desc'        => esc_html__( 'Press Release Date', 'ukmtheme' ),
        'id'          => 'ut_press_date',
        'type'        => 'text_date',
        'date_format' => esc_html__( 'd/m/Y', 'cmb2' ),
    ) );

    $press->add_field( array(
        'name' => esc_html__( 'URL', 'ukmtheme' ),
        'desc' => esc_html__( '', 'ukmtheme' ),
        'id'   => 'ut_press_url',
        'type' => 'text_url',
    ) );
    
    $press->add_field( array(
        'name'  => esc_html__( 'File', 'ukmtheme' ),
        'desc'  => esc_html__( 'Upload document file.', 'ukmtheme' ),
        'id'    => 'ut_press_file',
        'type'  => 'file',
        'allow' => array( 'url' ),
    ) );
}
add_action( 'cmb2_init', 'ukmtheme_press_metaboxes' );

