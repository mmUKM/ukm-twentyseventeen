<?php
/**
 * Custom Post Type: kelestarian
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: KELESTARIAN

function ut_kelestarian_foto( $file_list_meta_id, $img_size = 'medium' ) {

    $files = get_post_meta( get_the_ID(), $file_list_meta_id, 1 );

    foreach ( (array) $files as $attachment_id => $attachment_url ) {
        echo '<img src="';
        echo wp_get_attachment_url( $attachment_id, $img_size );
        echo '"';
    }
}


function ut_kelestarian_gallery( $file_list_meta_key, $img_size = 'medium' ) {

    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
    echo '<div uk-slideshow="animation: push;autoplay:true">';
        echo '<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow>';
            echo '<div class="uk-slideshow-items">';

                foreach ( (array) $files as $attachment_id => $attachment_url ) {
                    echo '<div>';
                        echo '<img src="';
                            echo wp_get_attachment_url( $attachment_id, array('800','600'), '', array( 'class' => 'uk-cover-container' ) );
                        echo '" uk-cover>';
                    echo '</div>';
                }
                echo '</div>';
                echo '<a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>';
                echo '<a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>';
            echo '</div>';
            //echo '<ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>';
    echo '</div>';
}


// Register Custom Post Type
function ut_post_type_kelestarian() {
    $labels = array(
        'name'                  => _x( 'Kelestarian', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'         => _x( 'Kelestarian', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'             => __( 'Kelestarian (SDG)', 'ukmtheme' ),
        'name_admin_bar'        => __( 'Kelestarian', 'ukmtheme' ),
        'archives'              => __( 'Kelestarian Archives', 'ukmtheme' ),
        'attributes'            => __( 'Kelestarian Attributes', 'ukmtheme' ),
        'parent_item_colon'     => __( 'Parent Kelestarian:', 'ukmtheme' ),
        'all_items'             => __( 'Senarai', 'ukmtheme' ),
        'add_new_item'          => __( 'Tambah', 'ukmtheme' ),
        'add_new'               => __( 'Add New', 'ukmtheme' ),
        'new_item'              => __( 'New Kelestarian', 'ukmtheme' ),
        'edit_item'             => __( 'Edit Kelestarian', 'ukmtheme' ),
        'update_item'           => __( 'Update Kelestarian', 'ukmtheme' ),
        'view_item'             => __( 'View Kelestarian', 'ukmtheme' ),
        'view_items'            => __( 'View Kelestarian', 'ukmtheme' ),
        'search_items'          => __( 'Search Kelestarian', 'ukmtheme' ),
        'not_found'             => __( 'Not found', 'ukmtheme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'ukmtheme' ),
        'featured_image'        => __( 'Featured Image', 'ukmtheme' ),
        'set_featured_image'    => __( 'Set featured image', 'ukmtheme' ),
        'remove_featured_image' => __( 'Remove featured image', 'ukmtheme' ),
        'use_featured_image'    => __( 'Use as featured image', 'ukmtheme' ),
        'insert_into_item'      => __( 'Insert into Kelestarian', 'ukmtheme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Kelestarian', 'ukmtheme' ),
        'items_list'            => __( 'Kelestarian list', 'ukmtheme' ),
        'items_list_navigation' => __( 'Kelestarian list navigation', 'ukmtheme' ),
        'filter_items_list'     => __( 'Filter Kelestarian list', 'ukmtheme' ),
    );
    $args = array(
        'label'                 => __( 'Kelestarian', 'ukmtheme' ),
        'description'           => __( 'Custom Post Type for Kelestarian', 'ukmtheme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail' ),
        'taxonomies'            => array( 'kelestarian_category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-admin-site',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'kelestarian', $args );
}
add_action( 'init', 'ut_post_type_kelestarian', 0 );


// Register Custom Taxonomy
function ut_taxonomy_kelestarian_category() {
    $labels = array(
        'name'                       => _x( 'SDG', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => _x( 'SDG', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => __( 'SDG', 'ukmtheme' ),
        'all_items'                  => __( 'Semua', 'ukmtheme' ),
        'parent_item'                => __( 'SDG', 'ukmtheme' ),
        'parent_item_colon'          => __( 'SDG:', 'ukmtheme' ),
        'new_item_name'              => __( 'SDG Baharu', 'ukmtheme' ),
        'add_new_item'               => __( 'Tambah Kategori SDG', 'ukmtheme' ),
        'edit_item'                  => __( 'Edit SDG', 'ukmtheme' ),
        'update_item'                => __( 'Update SDG', 'ukmtheme' ),
        'view_item'                  => __( 'View SDG', 'ukmtheme' ),
        'separate_items_with_commas' => __( 'Separate SDG with commas', 'ukmtheme' ),
        'add_or_remove_items'        => __( 'Add or remove SDG', 'ukmtheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'ukmtheme' ),
        'popular_items'              => __( 'Popular SDG', 'ukmtheme' ),
        'search_items'               => __( 'Search SDG', 'ukmtheme' ),
        'not_found'                  => __( 'Not Found', 'ukmtheme' ),
        'no_terms'                   => __( 'No SDG', 'ukmtheme' ),
        'items_list'                 => __( 'Categories list', 'ukmtheme' ),
        'items_list_navigation'      => __( 'Categories list navigation', 'ukmtheme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'lestaricat', array( 'kelestarian' ), $args );
}
add_action( 'init', 'ut_taxonomy_kelestarian_category', 0 );


// Register Custom Taxonomy
function ut_taxonomy_kelestarian_tahun() {
    $labels = array(
        'name'                       => _x( 'Tahun', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => _x( 'Tahun', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => __( 'Tahun', 'ukmtheme' ),
        'all_items'                  => __( 'Semua', 'ukmtheme' ),
        'parent_item'                => __( 'Tahun', 'ukmtheme' ),
        'parent_item_colon'          => __( 'Tahun:', 'ukmtheme' ),
        'new_item_name'              => __( 'Tahun Baharu', 'ukmtheme' ),
        'add_new_item'               => __( 'Tambah Kategori Tahun', 'ukmtheme' ),
        'edit_item'                  => __( 'Edit Tahun', 'ukmtheme' ),
        'update_item'                => __( 'Update Tahun', 'ukmtheme' ),
        'view_item'                  => __( 'View Tahun', 'ukmtheme' ),
        'separate_items_with_commas' => __( 'Separate Tahun with commas', 'ukmtheme' ),
        'add_or_remove_items'        => __( 'Add or remove Tahun', 'ukmtheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'ukmtheme' ),
        'popular_items'              => __( 'Popular Tahun', 'ukmtheme' ),
        'search_items'               => __( 'Search Tahun', 'ukmtheme' ),
        'not_found'                  => __( 'Not Found', 'ukmtheme' ),
        'no_terms'                   => __( 'No Tahun', 'ukmtheme' ),
        'items_list'                 => __( 'Categories list', 'ukmtheme' ),
        'items_list_navigation'      => __( 'Categories list navigation', 'ukmtheme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'lestariyear', array( 'kelestarian' ), $args );
}
add_action( 'init', 'ut_taxonomy_kelestarian_tahun', 0 );

