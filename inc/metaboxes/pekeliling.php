<?php
/**
 * Metaboxes: pekeliling
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;    function ukmtheme_pekeliling_metaboxes() { 

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

