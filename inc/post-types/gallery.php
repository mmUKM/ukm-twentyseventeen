<?php
/**
 * Custom Post Type: gallery
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: GALERI FOTO

function ut_lightbox_gallery( $file_list_meta_key, $img_size = 'medium' ) {

    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

    echo '<div class="uk-child-width-1-2 uk-child-width-1-3@s" uk-grid uk-lightbox="animation: slide">';

        foreach ( (array) $files as $attachment_id => $attachment_url ) {
            echo '<div>';
                echo '<a class="gallery-image" href="'. wp_get_attachment_url( $attachment_id ) .'" data-caption="'. get_the_title( $attachment_id ) .'">';
                    echo wp_get_attachment_image( $attachment_id, $img_size );
                echo '</a>';
            echo '</div>';
        }
        echo '</div>';
}

function ut_gallery() {
    $labels = array(
        'name'                => _x( 'Galeri Foto', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'Galeri Foto', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Galeri Foto', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Galeri Foto:', 'ukmtheme' ),
        'all_items'           => __( 'All Galeri Foto', 'ukmtheme' ),
        'view_item'           => __( 'View Galeri Foto', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New Galeri Foto', 'ukmtheme' ),
        'add_new'             => __( 'Add New', 'ukmtheme' ),
        'edit_item'           => __( 'Edit Galeri Foto', 'ukmtheme' ),
        'update_item'         => __( 'Update Galeri Foto', 'ukmtheme' ),
        'search_items'        => __( 'Search Galeri Foto', 'ukmtheme' ),
        'not_found'           => __( 'No Galeri Foto found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'No Galeri Foto found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => __( 'Galeri Foto', 'ukmtheme' ),
        'description'         => __( 'Galeri Foto manager for UKM', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'taxonomies'          => array( 'galcat' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-format-gallery',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'gallery', $args );
}
add_action( 'init', 'ut_gallery', 0 );

function ukmtheme_gallery_category_taxonomy() {
    $labels = array(
        'name'                       => __( 'Galeri Foto Albums', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => __( 'Galeri Foto Album', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => __( 'Album', 'ukmtheme' ),
        'all_items'                  => __( 'All Items', 'ukmtheme' ),
        'parent_item'                => __( 'Parent Galeri Foto Album', 'ukmtheme' ),
        'parent_item_colon'          => __( 'Parent Galeri Foto Album:', 'ukmtheme' ),
        'new_item_name'              => __( 'New Galeri Foto Album Name', 'ukmtheme' ),
        'add_new_item'               => __( 'Add New Galeri Foto Album', 'ukmtheme' ),
        'edit_item'                  => __( 'Edit Galeri Foto Album', 'ukmtheme' ),
        'update_item'                => __( 'Update Galeri Foto Album', 'ukmtheme' ),
        'separate_items_with_commas' => __( 'Separate Galeri Foto Albums with commas', 'ukmtheme' ),
        'search_items'               => __( 'Search Galeri Foto Albums', 'ukmtheme' ),
        'add_or_remove_items'        => __( 'Add or remove Galeri Foto Albums', 'ukmtheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used Galeri Foto Albums', 'ukmtheme' ),
        'not_found'                  => __( 'Not Found', 'ukmtheme' ),
    );
    $rewrite = array(
        'slug'                       => 'gallery-category',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'query_var'                  => 'galcat',
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'galcat', array( 'gallery' ), $args );
}
add_action( 'init', 'ukmtheme_gallery_category_taxonomy', 0 );

