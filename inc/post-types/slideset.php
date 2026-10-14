<?php
/**
 * Custom Post Type: slideset
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: SLIDESET

function ut_slideset() {
    $labels = array(
        'name'                => _x( 'Slideset', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'Slideset', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Slideset', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Slideset:', 'ukmtheme' ),
        'all_items'           => __( 'All Slideset', 'ukmtheme' ),
        'view_item'           => __( 'View Slideset', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New Slideset', 'ukmtheme' ),
        'add_new'             => __( 'New Slideset', 'ukmtheme' ),
        'edit_item'           => __( 'Edit Slideset', 'ukmtheme' ),
        'update_item'         => __( 'Update Slideset', 'ukmtheme' ),
        'search_items'        => __( 'Search Slideset', 'ukmtheme' ),
        'not_found'           => __( 'No Slideset found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'No Slideset found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => __( 'Slideset', 'ukmtheme' ),
        'description'         => __( 'Slideset manager for UKM', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions', 'page-attributes' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-cover-image',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'slideset', $args );
}
add_action( 'init', 'ut_slideset', 0 );

function ut_add_new_slideset_columns( $columns ) {
    $columns = array(
        'cb'                    => '<input type="checkbox">',
        'ut_slideset_image'     => __( 'Image', 'ukmtheme' ),
        'title'                 => __( 'Title', 'ukmtheme' ),
        'date'                  => __( 'Date', 'ukmtheme' )
    );
    return $columns;
}
add_filter('manage_edit-slideset_columns', 'ut_add_new_slideset_columns');

function ut_slideset_custom_columns( $column ) {
    global $post;

    switch ($column) {
    case 'ut_slideset_image' : echo '<img src="'. get_post_meta( get_the_ID(), 'ut_slideset_image', true ) .'" width="120">';break;
    }
}
add_action('manage_slideset_posts_custom_column', 'ut_slideset_custom_columns');

