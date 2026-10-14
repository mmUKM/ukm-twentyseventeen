<?php
/**
 * Custom Post Type: expertise
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: KEPAKARAN

function title_expert_input ( $title ) {
    if ( get_post_type() == 'expertise' ) {
    $title = __( 'Expert Name', 'ukmtheme' );
    }
    return $title;
}
add_filter( 'enter_title_here', 'title_expert_input' );

function ut_expertise() {
    $labels = array(
        'name'                => _x( 'Expertise', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'Expertise', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Kepakaran', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Expertise:', 'ukmtheme' ),
        'all_items'           => __( 'All Expertise', 'ukmtheme' ),
        'view_item'           => __( 'View Expertise', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New Expertise', 'ukmtheme' ),
        'add_new'             => __( 'New Expert', 'ukmtheme' ),
        'edit_item'           => __( 'Edit Expertise', 'ukmtheme' ),
        'update_item'         => __( 'Update Expertise', 'ukmtheme' ),
        'search_items'        => __( 'Search Expertise', 'ukmtheme' ),
        'not_found'           => __( 'No Expertise found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'No Expertise found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => __( 'expertise', 'ukmtheme' ),
        'description'         => __( 'Expertise manager for UKM', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions', ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-businessman',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'expertise', $args );
}
add_action( 'init', 'ut_expertise', 0 );

function ut_add_new_expertise_columns( $columns ) {
    $columns = array(
        'cb'                          => '<input type="checkbox">',
        'ut_expertise_photo'          => __( 'Photo', 'ukmtheme' ),
        'title'                       => __( 'Name', 'ukmtheme' ),
        'ut_expertise_position'       => __( 'Current Position', 'ukmtheme' ),
        'ut_expertise_email'          => __( 'Email', 'ukmtheme' ),
        'ut_expertise_contact'        => __( 'Contact', 'ukmtheme' )
    );
    return $columns;
}
add_filter('manage_edit-expertise_columns', 'ut_add_new_expertise_columns');

function ut_expertise_custom_columns( $column ) {
    global $post;

    switch ( $column ) {
        case 'ut_expertise_photo' :
        $expertPhoto = get_post_meta( $post->ID,'ut_expertise_photo',true );
        if ( $expertPhoto ) {
            echo '<img src="'.$expertPhoto.'" width="60">'; break;
        }
        else {
            echo '<img src="'. get_template_directory_uri() .'/images/placeholder_staff.svg" width="60">'; break;
        }
        case 'ut_expertise_position' : echo get_post_meta( $post->ID,'ut_expertise_position',true ); break;
        case 'ut_expertise_email' : echo get_post_meta( $post->ID,'ut_expertise_email',true ); break;
        case 'ut_expertise_contact' : echo get_post_meta( $post->ID,'ut_expertise_contact',true );
    }
}
add_action( 'manage_expertise_posts_custom_column', 'ut_expertise_custom_columns' );

