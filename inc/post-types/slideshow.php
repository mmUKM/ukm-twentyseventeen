<?php
/**
 * Custom Post Type: slideshow
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: SLIDESHOW

function title_slideshow_input ( $title ) {
    if ( get_post_type() == 'slideshow' ) {
        $title = __( 'Enter slide title here', 'ukmtheme' );
    }
    return $title;
}
add_filter( 'enter_title_here', 'title_slideshow_input' );

function ut_slideshow() {
    $labels = array(
        'name'                => _x( 'Slideshow', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'Slideshow', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Slideshow', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Slideshow:', 'ukmtheme' ),
        'all_items'           => __( 'All Slideshow', 'ukmtheme' ),
        'view_item'           => __( 'View Slideshow', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New Slideshow', 'ukmtheme' ),
        'add_new'             => __( 'New Slideshow', 'ukmtheme' ),
        'edit_item'           => __( 'Edit Slideshow', 'ukmtheme' ),
        'update_item'         => __( 'Update Slideshow', 'ukmtheme' ),
        'search_items'        => __( 'Search Slideshow', 'ukmtheme' ),
        'not_found'           => __( 'No Slideshow found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'No Slideshow found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => __( 'slideshow', 'ukmtheme' ),
        'description'         => __( 'Frontpage image slideshow', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'page-attributes' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-format-image',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'slideshow', $args );
}
add_action( 'init', 'ut_slideshow', 0 );

function ut_add_new_slideshow_columns( $columns ) {
    $columns = array(
        'cb'                    => '<input type="checkbox">',
        'ut_slideshow_image'    => __( 'Image', 'ukmtheme' ),
        'title'                 => __( 'Title', 'ukmtheme' ),
        'date'                  => __( 'Date', 'ukmtheme' )
    );
    return $columns;
}
add_filter( 'manage_edit-slideshow_columns', 'ut_add_new_slideshow_columns' );

function ut_slideshow_custom_columns( $column ) {
    global $post;

    switch ($column) {
        case 'ut_slideshow_image' : echo '<img src="'. get_post_meta( $post->ID,'ut_slideshow_image',true ) .'" width="120">';break;
    }
}
add_action( 'manage_slideshow_posts_custom_column', 'ut_slideshow_custom_columns' );

