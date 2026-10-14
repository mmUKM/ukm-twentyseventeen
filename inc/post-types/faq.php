<?php
/**
 * Custom Post Type: faq
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: SOALAN LAZIM (FAQ)

function title_faq_input ( $title ) {
    if ( get_post_type() == 'faq' ) {
    $title = __( 'Enter question here', 'ukmtheme' );
    }
    return $title;
}
add_filter( 'enter_title_here', 'title_faq_input' );

function ukmtheme_faq() {
    $labels = array(
        'name'                => _x( 'Soalan Lazim', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'Soalan Lazim', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Soalan Lazim', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Soalan Lazim:', 'ukmtheme' ),
        'all_items'           => __( 'All Soalan Lazim', 'ukmtheme' ),
        'view_item'           => __( 'View Soalan Lazim', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New Soalan Lazim', 'ukmtheme' ),
        'add_new'             => __( 'New Soalan Lazim', 'ukmtheme' ),
        'edit_item'           => __( 'Edit Soalan Lazim', 'ukmtheme' ),
        'update_item'         => __( 'Update Soalan Lazim', 'ukmtheme' ),
        'search_items'        => __( 'Search Soalan Lazim', 'ukmtheme' ),
        'not_found'           => __( 'No Soalan Lazim found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'No Soalan Lazim found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => __( 'faq', 'ukmtheme' ),
        'description'         => __( 'Soalan Lazim manager for UKM', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
        'taxonomies'          => array( 'faqcat' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-editor-help',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'faq', $args );
}
add_action( 'init', 'ukmtheme_faq', 0 );

function ukmtheme_faq_category()  {
    $labels = array(
        'name'                       => _x( 'Soalan Lazim Categories', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => _x( 'Soalan Lazim Category', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => __( 'Categories', 'ukmtheme' ),
        'all_items'                  => __( 'All Categories', 'ukmtheme' ),
        'parent_item'                => __( 'Parent Category', 'ukmtheme' ),
        'parent_item_colon'          => __( 'Parent Category:', 'ukmtheme' ),
        'new_item_name'              => __( 'New Category Name', 'ukmtheme' ),
        'add_new_item'               => __( 'Add New Category', 'ukmtheme' ),
        'edit_item'                  => __( 'Edit Category', 'ukmtheme' ),
        'update_item'                => __( 'Update Category', 'ukmtheme' ),
        'separate_items_with_commas' => __( 'Separate Categories with commas', 'ukmtheme' ),
        'search_items'               => __( 'Search Categories', 'ukmtheme' ),
        'add_or_remove_items'        => __( 'Add or remove Categories', 'ukmtheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used Categories', 'ukmtheme' ),
    );
    $rewrite = array(
        'slug'                       => 'faq-category',
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
        'query_var'                  => 'faqcat',
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'faqcat', array( 'faq' ), $args );
}
add_action( 'init', 'ukmtheme_faq_category', 0 );

function ut_add_new_faq_columns( $columns ){
    $columns = array(
        'cb'                          => '<input type="checkbox">',
        'title'                       => __( 'Question', 'ukmtheme' ),
        'faqcat'                      => __( 'Category', 'ukmtheme' ),
    );
    return $columns;
}
add_filter('manage_edit-faq_columns', 'ut_add_new_faq_columns');

function ukmtheme_faq_custom_columns( $column ){
    global $post;

    switch ($column) {
        case 'faqcat' : echo get_the_term_list( $post->ID, 'faqcat', '', ', ',''); break;
    }
}
add_action('manage_faq_posts_custom_column', 'ukmtheme_faq_custom_columns');

