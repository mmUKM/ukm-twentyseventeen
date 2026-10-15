<?php
/**
 * Custom Post Type: publication
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;// POST TYPE: PUBLICATION

function title_publication_input ( $title ) {
    if ( get_post_type() == 'publication' ) {
        $title = __( 'Enter publication name here', 'ukmtheme' );
    }
    return $title;
}
add_filter( 'enter_title_here', 'title_publication_input' );

function ut_publication() {
    $labels = array(
        'name'                => _x( 'Publications', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'Publication', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Penerbitan', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Publication:', 'ukmtheme' ),
        'all_items'           => __( 'All Publications', 'ukmtheme' ),
        'view_item'           => __( 'View Publication', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New Publication', 'ukmtheme' ),
        'add_new'             => __( 'New Publication', 'ukmtheme' ),
        'edit_item'           => __( 'Edit Publication', 'ukmtheme' ),
        'update_item'         => __( 'Update Publication', 'ukmtheme' ),
        'search_items'        => __( 'Search Publications', 'ukmtheme' ),
        'not_found'           => __( 'No Publications found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'No Publications found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => __( 'publication', 'ukmtheme' ),
        'description'         => __( 'Publication information pages', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
        'taxonomies'          => array( 'pubcat' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-book-alt',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'publication', $args );
}
add_action( 'init', 'ut_publication', 0 );

function ut_publication_category()  {
    $labels = array(
        'name'                       => _x( 'Publication Categories', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => _x( 'Publication Category', 'Taxonomy Singular Name', 'ukmtheme' ),
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
        'slug'                       => 'publication-category',
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
        'query_var'                  => 'pubcat',
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'pubcat', 'publication', $args );
}
add_action( 'init', 'ut_publication_category', 0 );

function ut_add_new_publication_columns( $columns ){
    $columns = array(
        'cb'                          => '<input type="checkbox">',
        'ut_publication_cover'        => __( 'Cover', 'ukmtheme' ),
        'title'                       => __( 'Title', 'ukmtheme' ),
        'pubcat'                      => __( 'Category', 'ukmtheme' ),
        'ut_publication_author'       => __( 'Author', 'ukmtheme' ),
        'ut_publication_publisher'    => __( 'Publisher', 'ukmtheme' ),
        'ut_publication_year'         => __( 'Year', 'ukmtheme' )
    );
    return $columns;
}
add_filter('manage_edit-publication_columns', 'ut_add_new_publication_columns');

function ut_publication_custom_columns( $column ){
    global $post;
    switch ($column) {
        case 'ut_publication_cover' :
        $pub_cover = get_post_meta( $post->ID,'ut_publication_cover',true );
        if ( $pub_cover ) { ?>
            <img src="<?php echo $pub_cover; ?>" alt="" width="50">
        <?php }
        else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder_publication.svg" width="50">
        <?php } break;
        case 'pubcat' : echo get_the_term_list( $post->ID, 'pubcat', '', ', ',''); break;
        case 'ut_publication_author' : echo get_post_meta( $post->ID,'ut_publication_author',true ); break;
        case 'ut_publication_publisher' : echo get_post_meta( $post->ID,'ut_publication_publisher',true ); break;
        case 'ut_publication_year' : echo get_post_meta( $post->ID,'ut_publication_year',true );
    }
}
add_action('manage_publication_posts_custom_column', 'ut_publication_custom_columns');

