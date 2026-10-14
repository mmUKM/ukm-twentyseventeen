<?php
/**
 * Custom Post Type: news
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: NEWS

function ukmtheme_latest_news() {
    $labels = array(
        'name'                => _x( 'Berita', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'Berita', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Berita', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Berita:', 'ukmtheme' ),
        'all_items'           => __( 'All Berita', 'ukmtheme' ),
        'view_item'           => __( 'View Berita', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New Berita', 'ukmtheme' ),
        'add_new'             => __( 'Add New', 'ukmtheme' ),
        'edit_item'           => __( 'Edit Berita', 'ukmtheme' ),
        'update_item'         => __( 'Update Berita', 'ukmtheme' ),
        'search_items'        => __( 'Search Berita', 'ukmtheme' ),
        'not_found'           => __( 'Not found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ukmtheme' ),
    );
    $rewrite = array(
        'slug'                => 'news',
        'with_front'          => true,
        'pages'               => true,
        'feeds'               => true,
    );
    $args = array(
        'label'               => __( 'ukmnews', 'ukmtheme' ),
        'description'         => __( 'Latest Berita', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
        'taxonomies'          => array( 'newscat' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-megaphone',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'query_var'           => 'news',
        'rewrite'             => $rewrite,
        'capability_type'     => 'post',
    );
    register_post_type( 'news', $args );
}
add_action( 'init', 'ukmtheme_latest_news', 0 );

function ukmtheme_news_category_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Berita Categories', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => _x( 'Berita Category', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => __( 'Categories', 'ukmtheme' ),
        'all_items'                  => __( 'All Items', 'ukmtheme' ),
        'parent_item'                => __( 'Parent Berita Category', 'ukmtheme' ),
        'parent_item_colon'          => __( 'Parent Berita Category:', 'ukmtheme' ),
        'new_item_name'              => __( 'New Berita Category Name', 'ukmtheme' ),
        'add_new_item'               => __( 'Add New Berita Category', 'ukmtheme' ),
        'edit_item'                  => __( 'Edit Berita Category', 'ukmtheme' ),
        'update_item'                => __( 'Update Berita Category', 'ukmtheme' ),
        'separate_items_with_commas' => __( 'Separate Berita Categories with commas', 'ukmtheme' ),
        'search_items'               => __( 'Search Berita Categories', 'ukmtheme' ),
        'add_or_remove_items'        => __( 'Add or remove Berita Categories', 'ukmtheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used Berita Categories', 'ukmtheme' ),
        'not_found'                  => __( 'Not Found', 'ukmtheme' ),
    );
    $rewrite = array(
        'slug'                       => 'news-category',
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
        'query_var'                  => 'newscat',
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'newscat', array( 'news' ), $args );
}
add_action( 'init', 'ukmtheme_news_category_taxonomy', 0 );

