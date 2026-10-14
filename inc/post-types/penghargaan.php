<?php
/**
 * Custom Post Type: penghargaan
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: PENGHARGAAN

function ukmtheme_cpt_penghargaan() {
    $labels = array(
        'name'                => _x( 'Penghargaan', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'Penghargaan', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Penghargaan', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Press Release:', 'ukmtheme' ),
        'all_items'           => __( 'All', 'ukmtheme' ),
        'view_item'           => __( 'View Penghargaan', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New', 'ukmtheme' ),
        'add_new'             => __( 'Add New', 'ukmtheme' ),
        'edit_item'           => __( 'Edit Penghargaan', 'ukmtheme' ),
        'update_item'         => __( 'Update Penghargaan', 'ukmtheme' ),
        'search_items'        => __( 'Search Penghargaan', 'ukmtheme' ),
        'not_found'           => __( 'No Penghargaan found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'No Penghargaan found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => __( 'Penghargaan', 'ukmtheme' ),
        'description'         => __( 'Penghargaan manager for UKM', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'revisions', ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-star-filled',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'penghargaan', $args );
}
