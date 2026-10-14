<?php
/**
 * Custom Post Type: press
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: PRESS RELEASE

function ut_press() {
    $labels = array(
        'name'                => _x( 'News Clipping', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'News Clipping', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Klip Berita', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Press Release:', 'ukmtheme' ),
        'all_items'           => __( 'All', 'ukmtheme' ),
        'view_item'           => __( 'View News Clipping', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New', 'ukmtheme' ),
        'add_new'             => __( 'Add New', 'ukmtheme' ),
        'edit_item'           => __( 'Edit News Clipping', 'ukmtheme' ),
        'update_item'         => __( 'Update News Clipping', 'ukmtheme' ),
        'search_items'        => __( 'Search News Clipping', 'ukmtheme' ),
        'not_found'           => __( 'No News Clipping found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'No News Clipping found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => __( 'News Clipping', 'ukmtheme' ),
        'description'         => __( 'News Clipping manager for UKM', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions', ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-media-document',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'press', $args );
}
add_action( 'init', 'ut_press', 0 );

function ut_press_custom_columns( $column ) {
    global $post;

    switch ($column) {
        case 'ut_press_date' : echo get_post_meta( $post->ID,'ut_press_date',true ); break;
    }
}
add_action( 'manage_press_posts_custom_column', 'ut_press_custom_columns' );

function ut_add_new_press_columns( $columns ){
    $columns = array(
        'cb'                  => '<input type="checkbox">',
        'ut_press_date'       => __( 'Date', 'ukmtheme' ),
        'title'               => __( 'Title', 'ukmtheme' ),
    );
    return $columns;
}
add_filter('manage_edit-press_columns', 'ut_add_new_press_columns');

