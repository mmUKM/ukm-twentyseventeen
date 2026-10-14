<?php
/**
 * Custom Post Type: conference
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: CONFERENCE

function title_conference_input ( $title ) {
    if ( get_post_type() == 'conference' ) {
        $title = __( 'Enter Conference Name', 'ukmtheme' );
    }
    return $title;
}
add_filter( 'enter_title_here', 'title_conference_input' );

function ut_conference_slideshow( $file_list_meta_key, $img_size = 'full' ) {
    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
    echo '<ul class="uk-slideshow-items">';
    foreach ( (array) $files as $attachment_id => $attachment_url ) {
        echo '<li>';
            echo wp_get_attachment_image( $attachment_id, $img_size,'', array( "uk-cover" => null ) );
        echo '</li>';
    }
    echo '</ul>';
}

function ut_conference_keynote( $file_list_meta_key, $img_size = 'full' ) {
    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
    echo '<ul class="uk-slider-items uk-child-width-1-4@s uk-grid" uk-height-match="target: > li > .uk-card">';
    foreach ( (array) $files as $attachment_id => $attachment_url ) {
        echo '<li>';
            echo '<div class="uk-card uk-card-default">';
                echo '<div class="uk-card-media-top">';
                    echo '<a href="'. wp_get_attachment_url( $attachment_id ) .'" title="'. get_the_title( $attachment_id ) .'">';
                    echo wp_get_attachment_image( $attachment_id, $img_size );
                    echo '</a>';
                echo '</div>';
                echo '<div class="uk-card-body">';
                    echo '<strong>' . get_the_title( $attachment_id ) . '</strong><br>';
                    echo '<i>' . get_post( $attachment_id )->post_excerpt . '</i><br>';
                    echo get_post( $attachment_id )->post_content . '<br>';
            echo '</div>';
        echo '</li>';
    }
    echo '</ul';
}

function ut_conference() {
    $labels = array(
        'name'                  => _x( 'Conferences', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'         => _x( 'Conference', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'             => __( 'Persidangan', 'ukmtheme' ),
        'name_admin_bar'        => __( 'Conference', 'ukmtheme' ),
        'archives'              => __( 'Conference Archives', 'ukmtheme' ),
        'parent_item_colon'     => __( 'Parent Conference:', 'ukmtheme' ),
        'all_items'             => __( 'All Conferences', 'ukmtheme' ),
        'add_new_item'          => __( 'Add New Conference', 'ukmtheme' ),
        'add_new'               => __( 'Add New', 'ukmtheme' ),
        'new_item'              => __( 'New Conference', 'ukmtheme' ),
        'edit_item'             => __( 'Edit Conference', 'ukmtheme' ),
        'update_item'           => __( 'Update Conference', 'ukmtheme' ),
        'view_item'             => __( 'View Conference', 'ukmtheme' ),
        'search_items'          => __( 'Search Conference', 'ukmtheme' ),
        'not_found'             => __( 'Not found', 'ukmtheme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'ukmtheme' ),
        'featured_image'        => __( 'Featured Image', 'ukmtheme' ),
        'set_featured_image'    => __( 'Set featured image', 'ukmtheme' ),
        'remove_featured_image' => __( 'Remove featured image', 'ukmtheme' ),
        'use_featured_image'    => __( 'Use as featured image', 'ukmtheme' ),
        'insert_into_item'      => __( 'Insert into conference', 'ukmtheme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this conference', 'ukmtheme' ),
        'items_list'            => __( 'Conferences list', 'ukmtheme' ),
        'items_list_navigation' => __( 'Conferences list navigation', 'ukmtheme' ),
        'filter_items_list'     => __( 'Filter conferences list', 'ukmtheme' ),
    );
    $args = array(
        'label'                 => __( 'Conference', 'ukmtheme' ),
        'description'           => __( 'Conference plugin for UKM Twenty Seventeen Theme', 'ukmtheme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', ),
        //'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-schedule',
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'conference', $args );
}
add_action( 'init', 'ut_conference', 0 );

