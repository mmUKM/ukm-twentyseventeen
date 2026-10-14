<?php
/**
 * Custom Post Type: video
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: VIDEO

function ut_video() {
    $labels = array(
        'name'                => _x( 'Video', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Galeri Video', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Video:', 'ukmtheme' ),
        'all_items'           => __( 'All Video', 'ukmtheme' ),
        'view_item'           => __( 'View Video', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New Video', 'ukmtheme' ),
        'add_new'             => __( 'New Video', 'ukmtheme' ),
        'edit_item'           => __( 'Edit Video', 'ukmtheme' ),
        'update_item'         => __( 'Update Video', 'ukmtheme' ),
        'search_items'        => __( 'Search Video', 'ukmtheme' ),
        'not_found'           => __( 'No Video found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'No Video found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => __( 'Video', 'ukmtheme' ),
        'description'         => __( 'Video manager for UKM', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', ),
        'taxonomies'          => array( 'vidcat' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-format-video',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'video', $args );
}
add_action( 'init', 'ut_video', 0 );

function ut_video_category()  {
    $labels = array(
        'name'                       => _x( 'Video Categories', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => _x( 'Video Category', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => __( 'Video Category', 'ukmtheme' ),
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
        'slug'                       => 'video-category',
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
        'rewrite'                    => $rewrite
    );
    register_taxonomy( 'vidcat', 'video', $args );
}
add_action( 'init', 'ut_video_category', 0 );

function ut_add_new_video_columns( $columns ) {
    $columns = array(
    'cb'      => '<input type="checkbox">',
    'title'   => __( 'Title', 'ukmtheme' ),
    'vidcat'  => __( 'Category', 'ukmtheme' ),
    );
    return $columns;
}
add_filter( 'manage_edit-video_columns', 'ut_add_new_video_columns' );

function ut_video_custom_columns( $column ){
    global $post;
    switch ( $column ) {
        case 'vidcat' : echo get_the_term_list( $post->ID, 'vidcat', '', ', ',''); break;
    }
}
add_action( 'manage_video_posts_custom_column', 'ut_video_custom_columns' );

// PEKELILING 
add_action( 'init', 'ukmtheme_pekeliling' );
function ukmtheme_pekeliling() {
	$args = [
		'label'  => __( 'Pekeliling', 'ukmtheme' ),
		'labels' => [
			'menu_name'          => __( 'Pekeliling / GP', 'ukmtheme' ),
			'name_admin_bar'     => __( 'Pekeliling', 'ukmtheme' ),
			'add_new'            => __( 'Add Pekeliling', 'ukmtheme' ),
			'add_new_item'       => __( 'Add new Pekeliling', 'ukmtheme' ),
			'new_item'           => __( 'New Pekeliling', 'ukmtheme' ),
			'edit_item'          => __( 'Edit Pekeliling', 'ukmtheme' ),
			'view_item'          => __( 'View Pekeliling', 'ukmtheme' ),
			'update_item'        => __( 'View Pekeliling', 'ukmtheme' ),
			'all_items'          => __( 'All Pekeliling', 'ukmtheme' ),
			'search_items'       => __( 'Search Pekeliling', 'ukmtheme' ),
			'parent_item_colon'  => __( 'Parent Pekeliling', 'ukmtheme' ),
			'not_found'          => __( 'No Pekeliling found', 'ukmtheme' ),
			'not_found_in_trash' => __( 'No Pekeliling found in Trash', 'ukmtheme' ),
			'name'               => _x( 'Pekeliling', 'ukmtheme' ),
			'singular_name'      => _x( 'Pekeliling', 'ukmtheme' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'show_in_rest'        => false,
		'capability_type'     => 'page',
		'hierarchical'        => true,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-list-view',
		'supports' => [
			'title',
            'page-attributes'
		],
		
		'rewrite' => true
	];

	register_post_type( 'ut_pekeliling', $args );
}

// TAHUN PEKELILING

add_action( 'init', 'ukmtheme_pekeliling_tahun' );
function ukmtheme_pekeliling_tahun() {
	$args = [
		'label'  => __( 'Kategori Pekeliling', 'ukmtheme' ),
		'labels' => [
			'menu_name'                  => __( 'Kategori Pekeliling', 'ukmtheme' ),
			'all_items'                  => __( 'All Kategori Pekeliling', 'ukmtheme' ),
			'edit_item'                  => __( 'Edit Kategori Pekeliling', 'ukmtheme' ),
			'view_item'                  => __( 'View Kategori Pekeliling', 'ukmtheme' ),
			'update_item'                => __( 'Update Kategori Pekeliling', 'ukmtheme' ),
			'add_new_item'               => __( 'Add new Kategori Pekeliling', 'ukmtheme' ),
			'new_item'                   => __( 'New Kategori Pekeliling', 'ukmtheme' ),
			'parent_item'                => __( 'Parent Kategori Pekeliling', 'ukmtheme' ),
			'parent_item_colon'          => __( 'Parent Kategori Pekeliling', 'ukmtheme' ),
			'search_items'               => __( 'Search Kategori Pekeliling', 'ukmtheme' ),
			'popular_items'              => __( 'Popular Kategori Pekeliling', 'ukmtheme' ),
			'separate_items_with_commas' => __( 'Separate Kategori Pekeliling with commas', 'ukmtheme' ),
			'add_or_remove_items'        => __( 'Add or remove Kategori Pekeliling', 'ukmtheme' ),
			'choose_from_most_used'      => __( 'Choose most used Kategori Pekeliling', 'ukmtheme' ),
			'not_found'                  => __( 'No Kategori Pekeliling found', 'ukmtheme' ),
			'name'                       => _x( 'Kategori Pekeliling', 'ukmtheme' ),
			'singular_name'              => _x( 'Kategori Pekeliling', 'ukmtheme' ),
		],
		'public'               => true,
		'show_ui'              => true,
		'show_in_menu'         => true,
		'show_in_nav_menus'    => true,
		'show_tagcloud'        => true,
		'show_in_quick_edit'   => true,
		'show_admin_column'    => false,
		'show_in_rest'         => true,
        'menu_position'        => 20,
		'hierarchical'         => true,
		'query_var'            => true,
		'sort'                 => false,
		'rewrite_no_front'     => false,
		'rewrite_hierarchical' => false,
		'rewrite' => [ 'slug' => 'kategori-pekeliling' ]
	];
	register_taxonomy( 'circat', [ 'ut_pekeliling' ], $args );
}

function ut_pekeliling_list_file( $file_list_meta_pekeliling_list_file ) {

	// Get the list of files
	$files = get_post_meta( get_the_ID(), $file_list_meta_pekeliling_list_file, 1 );

	echo '<div class="file-list-wrap">';
	// Loop through them and output an image
	foreach ( (array) $files as $attachment_id => $attachment_url ) {
		echo '<div class="file-list-image">';
            echo '<span uk-icon="file-text"></span>&nbsp;<a href="'. wp_get_attachment_url( $attachment_id ) . '">'. get_the_title( $attachment_id ). '</a>';
		echo '</div>';
	}
	echo '</div>';
}

