<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 *
 * Custom Column Adjustment
 * ===============================
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/manage_edit-post_type_columns
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_$post_type_posts_custom_column
 */

/** POST TYPE TEMPLATE FILE */

if ( file_exists( get_template_directory() . '/includes/theme-post-type-templates.php' ) ) {
	require_once get_template_directory() . '/includes/theme-post-type-templates.php';
    }
/** POST TYPE CUSTOM FIELD */

if ( file_exists( get_template_directory() . '/includes/theme-post-type-metabox.php' ) ) {
    require_once get_template_directory() . '/includes/theme-post-type-metabox.php';
    }
// POST TYPE: SOALAN LAZIM (FAQ)

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

// POST TYPE: GALERI FOTO

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

// POST TYPE: NEWS

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

// POST TYPE: SLIDESET

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

// POST TYPE: SLIDESHOW

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

// POST TYPE: DIREKTORI STAF

function title_staff_input ( $title ) {
    if ( get_post_type() == 'staff' ) {
        $title = __( 'Enter staff name here', 'ukmtheme' );
    }
    return $title;
}
add_filter( 'enter_title_here', 'title_staff_input' );

function ukmtheme_staff_directory() {
    $labels = array(
        'name'                => _x( 'Staf', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'Staf', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Direktori Staf', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Staf:', 'ukmtheme' ),
        'all_items'           => __( 'All Staf', 'ukmtheme' ),
        'view_item'           => __( 'View Staf', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New Staf', 'ukmtheme' ),
        'add_new'             => __( 'Add New', 'ukmtheme' ),
        'edit_item'           => __( 'Edit Staf', 'ukmtheme' ),
        'update_item'         => __( 'Update Staf', 'ukmtheme' ),
        'search_items'        => __( 'Search Staf', 'ukmtheme' ),
        'not_found'           => __( 'Not found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ukmtheme' ),
    );
    $rewrite = array(
        'slug'                => 'staff-directory',
        'with_front'          => true,
        'pages'               => true,
        'feeds'               => true,
    );
    $args = array(
        'label'               => __( 'staff', 'ukmtheme' ),
        'description'         => __( 'Latest Staf', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions', 'page-attributes' ),
        'taxonomies'          => array( 'department', 'position' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-groups',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'query_var'           => 'staff',
        'rewrite'             => $rewrite,
        'capability_type'     => 'post',
    );
    register_post_type( 'staff', $args );
}
add_action( 'init', 'ukmtheme_staff_directory', 0 );

function ukmtheme_staff_position_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Positions', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => _x( 'Position', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => __( 'Position', 'ukmtheme' ),
        'all_items'                  => __( 'All Items', 'ukmtheme' ),
        'parent_item'                => __( 'Parent Position', 'ukmtheme' ),
        'parent_item_colon'          => __( 'Parent Position:', 'ukmtheme' ),
        'new_item_name'              => __( 'New Position Name', 'ukmtheme' ),
        'add_new_item'               => __( 'Add New Position', 'ukmtheme' ),
        'edit_item'                  => __( 'Edit Position', 'ukmtheme' ),
        'update_item'                => __( 'Update Position', 'ukmtheme' ),
        'separate_items_with_commas' => __( 'Separate Positions with commas', 'ukmtheme' ),
        'search_items'               => __( 'Search Positions', 'ukmtheme' ),
        'add_or_remove_items'        => __( 'Add or remove Positions', 'ukmtheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used Positions', 'ukmtheme' ),
        'not_found'                  => __( 'Not Found', 'ukmtheme' ),
    );
    $rewrite = array(
        'slug'                       => 'staff-position',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
        'query_var'                  => 'position',
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'position', array( 'staff' ), $args );
}
add_action( 'init', 'ukmtheme_staff_position_taxonomy', 0 );

function ukmtheme_staff_department_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Departments', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => __( 'Department', 'ukmtheme' ),
        'all_items'                  => __( 'All Departments', 'ukmtheme' ),
        'parent_item'                => __( 'Parent Department', 'ukmtheme' ),
        'parent_item_colon'          => __( 'Parent Department:', 'ukmtheme' ),
        'new_item_name'              => __( 'New Department Name', 'ukmtheme' ),
        'add_new_item'               => __( 'Add New Department', 'ukmtheme' ),
        'edit_item'                  => __( 'Edit Department', 'ukmtheme' ),
        'update_item'                => __( 'Update Department', 'ukmtheme' ),
        'separate_items_with_commas' => __( 'Separate departments with commas', 'ukmtheme' ),
        'search_items'               => __( 'Search Departments', 'ukmtheme' ),
        'add_or_remove_items'        => __( 'Add or remove departments', 'ukmtheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used departments', 'ukmtheme' ),
        'not_found'                  => __( 'Not Found', 'ukmtheme' ),
    );
    $rewrite = array(
        'slug'                       => 'staff-department',
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
        'query_var'                  => 'department',
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'department', array( 'staff' ), $args );
}
add_action( 'init', 'ukmtheme_staff_department_taxonomy', 0 );

function restrict_listings_by_department() {
    global $typenow;
    global $wp_query;
    if ($typenow=='staff') {
        $taxonomy = 'department';
        $term = isset($wp_query->query['department']) ? $wp_query->query['department'] :'';
        $department_taxonomy = get_taxonomy( $taxonomy );
        wp_dropdown_categories(array(
            'show_option_all' =>  __( 'All Department', 'ukmtheme' ),
            'taxonomy'        =>  $taxonomy,
            'name'            =>  'department',
            'orderby'         =>  'name',
            'selected'        =>  $term,
            'hierarchical'    =>  true,
            'depth'           =>  3,
            'show_count'      =>  true, // Show # listings in parens
            'hide_empty'      =>  true, // Don't show departmentes w/o listings
        ));
    }
}
add_action('restrict_manage_posts','restrict_listings_by_department');

function convert_department_id_to_taxonomy_term_in_query($query) {
    global $pagenow;
    $qv = &$query->query_vars;
    if ($pagenow=='edit.php' && isset($qv['department']) && is_numeric($qv['department'])) {
        $term = get_term_by('id',$qv['department'],'department');
        $qv['department'] = ($term ? $term->slug : '');
    }
}
add_filter('parse_query','convert_department_id_to_taxonomy_term_in_query');

function restrict_listings_by_position() {
    global $typenow;
    global $wp_query;
    if ($typenow=='staff') {
        $taxonomy = 'position';
        $term = isset( $wp_query->query['position'] ) ? $wp_query->query['position'] :'';
        $position_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' =>  __( 'All Position', 'ukmtheme' ),
            'taxonomy'        =>  $taxonomy,
            'name'            =>  'position',
            'orderby'         =>  'name',
            'selected'        =>  $term,
            'hierarchical'    =>  true,
            'depth'           =>  3,
            'show_count'      =>  true, // Show # listings in parens
            'hide_empty'      =>  true, // Don't show positiones w/o listings
        ));
    }
}
add_action('restrict_manage_posts','restrict_listings_by_position');

function convert_position_id_to_taxonomy_term_in_query( $query ) {
    global $pagenow;
    $qv = &$query->query_vars;
    if ( $pagenow=='edit.php' && isset($qv['position'] ) && is_numeric($qv['position'])) {
        $term = get_term_by( 'id',$qv['position'],'position' );
        $qv['position'] = ($term ? $term->slug : '');
    }
}
add_filter( 'parse_query','convert_position_id_to_taxonomy_term_in_query' );

function ut_add_new_staff_columns( $columns ){
    $columns = array(
        'cb'                  => '<input type="checkbox">',
        'ut_staff_photo'      => __( 'Photo', 'ukmtheme' ),
        'title'               => __( 'Name', 'ukmtheme' ),
        'ut_staff_position'   => __( 'Position', 'ukmtheme' ),
        'ut_staff_department' => __( 'Department', 'ukmtheme' )
    );
    return $columns;
}
add_filter( 'manage_edit-staff_columns', 'ut_add_new_staff_columns' );

function ut_staff_custom_columns( $column ) {
    global $post;

    switch ( $column ) {
        case 'ut_staff_photo' :
        $staff_photo = get_post_meta($post->ID,'ut_staff_photo',true);
        if ( $staff_photo ) { ?>
            <img src="<?php echo get_post_meta($post->ID,'ut_staff_photo',true); ?>" width="50" alt="">
        <?php }

        else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder_staff.svg" width="50">
        <?php } break;
        case 'ut_staff_position' : echo get_the_term_list( $post->ID, 'position', '', ', ',''); break;
        case 'ut_staff_department' : echo get_the_term_list( $post->ID, 'department', '', ', ',''); break;
    }
}
add_action( 'manage_staff_posts_custom_column', 'ut_staff_custom_columns' );

// POST TYPE: KEPAKARAN

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

// POST TYPE: PRESS RELEASE

function ut_press() {
    $labels = array(
        'name'                => _x( 'News Clipping', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => _x( 'News Clipping', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => __( 'Klip Berita', 'ukmtheme' ),
        'parent_item_colon'   => __( 'Parent Press Release:', 'ukmtheme' ),
        'all_items'           => __( 'All', 'ukmtheme' ),
        'view_item'           => __( 'View News Clipping', 'ukmtheme' ),
        'add_new_item'        => __( 'Add New', 'ukmtheme' ),
        'add_new'             => __( 'Add New', 'ukmtheme' ),
        'edit_item'           => __( 'Edit News Clipping', 'ukmtheme' ),
        'update_item'         => __( 'Update News Clipping', 'ukmtheme' ),
        'search_items'        => __( 'Search News Clipping', 'ukmtheme' ),
        'not_found'           => __( 'No News Clipping found', 'ukmtheme' ),
        'not_found_in_trash'  => __( 'No News Clipping found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => __( 'News Clipping', 'ukmtheme' ),
        'description'         => __( 'News Clipping manager for UKM', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions', ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => 'dashicons-media-document',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type( 'press', $args );
}
add_action( 'init', 'ut_press', 0 );

function ut_press_custom_columns( $column ) {
    global $post;

    switch ($column) {
        case 'ut_press_date' : echo get_post_meta( $post->ID,'ut_press_date',true ); break;
    }
}
add_action( 'manage_press_posts_custom_column', 'ut_press_custom_columns' );

function ut_add_new_press_columns( $columns ){
    $columns = array(
        'cb'                  => '<input type="checkbox">',
        'ut_press_date'       => __( 'Date', 'ukmtheme' ),
        'title'               => __( 'Title', 'ukmtheme' ),
    );
    return $columns;
}
add_filter('manage_edit-press_columns', 'ut_add_new_press_columns');

// POST TYPE: PUBLICATION

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
            <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder_publication.svg" width="50">
        <?php } break;
        case 'pubcat' : echo get_the_term_list( $post->ID, 'pubcat', '', ', ',''); break;
        case 'ut_publication_author' : echo get_post_meta( $post->ID,'ut_publication_author',true ); break;
        case 'ut_publication_publisher' : echo get_post_meta( $post->ID,'ut_publication_publisher',true ); break;
        case 'ut_publication_year' : echo get_post_meta( $post->ID,'ut_publication_year',true );
    }
}
add_action('manage_publication_posts_custom_column', 'ut_publication_custom_columns');

// POST TYPE: VIDEO

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

// POST TYPE: KELESTARIAN


function ut_kelestarian_gallery( $file_list_meta_key, $img_size = 'medium' ) {

    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
    echo '<div uk-slideshow="animation: push">';
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
            echo '<ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>';
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
        'supports'              => array( 'title' ),
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

// POST TYPE: CONFERENCE

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