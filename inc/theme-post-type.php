<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 *
 * Post type
 * ===============================
 * 01. Soalan Lazim
 * 02. Galeri
 *
 * Custom Column Adjustment
 * ===============================
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/manage_edit-post_type_columns
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_$post_type_posts_custom_column
 */

// POST TYPE: Soalan Lazim

function title_faq_input ( $title ) {
    if ( get_post_type() == 'faq' ) {
    $title = esc_html__( 'Enter question here', 'ukmtheme' );
    }
    return $title;
}
add_filter( 'enter_title_here', 'title_faq_input' );

function ukmtheme_faq() {
    $labels = array(
        'name'                => esc_html__( 'Soalan Lazim', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => esc_html__( 'Soalan Lazim', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => esc_html__( 'Soalan Lazim', 'ukmtheme' ),
        'parent_item_colon'   => esc_html__( 'Parent Soalan Lazim:', 'ukmtheme' ),
        'all_items'           => esc_html__( 'All Soalan Lazim', 'ukmtheme' ),
        'view_item'           => esc_html__( 'View Soalan Lazim', 'ukmtheme' ),
        'add_new_item'        => esc_html__( 'Add New Soalan Lazim', 'ukmtheme' ),
        'add_new'             => esc_html__( 'New Soalan Lazim', 'ukmtheme' ),
        'edit_item'           => esc_html__( 'Edit Soalan Lazim', 'ukmtheme' ),
        'update_item'         => esc_html__( 'Update Soalan Lazim', 'ukmtheme' ),
        'search_items'        => esc_html__( 'Search Soalan Lazim', 'ukmtheme' ),
        'not_found'           => esc_html__( 'No Soalan Lazim found', 'ukmtheme' ),
        'not_found_in_trash'  => esc_html__( 'No Soalan Lazim found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => esc_html__( 'faq', 'ukmtheme' ),
        'description'         => esc_html__( 'Soalan Lazim manager for UKM', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'revisions', ),
        'taxonomies'          => array( 'faqcat' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => get_template_directory_uri() . '/img/icon-faq.svg',
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
        'name'                       => esc_html__( 'Soalan Lazim Categories', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => esc_html__( 'Soalan Lazim Category', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => esc_html__( 'Categories', 'ukmtheme' ),
        'all_items'                  => esc_html__( 'All Categories', 'ukmtheme' ),
        'parent_item'                => esc_html__( 'Parent Category', 'ukmtheme' ),
        'parent_item_colon'          => esc_html__( 'Parent Category:', 'ukmtheme' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'ukmtheme' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'ukmtheme' ),
        'edit_item'                  => esc_html__( 'Edit Category', 'ukmtheme' ),
        'update_item'                => esc_html__( 'Update Category', 'ukmtheme' ),
        'separate_items_with_commas' => esc_html__( 'Separate Categories with commas', 'ukmtheme' ),
        'search_items'               => esc_html__( 'Search Categories', 'ukmtheme' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'ukmtheme' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'ukmtheme' ),
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
        'title'                       => esc_html__( 'Question', 'ukmtheme' ),
        'faqcat'                      => esc_html__( 'Category', 'ukmtheme' ),
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

// PHOTO GALLERY

function ut_lightbox_gallery( $file_list_meta_key, $img_size = 'medium' ) {

    $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

    echo '<div class="gallery">';

    foreach ( (array) $files as $attachment_id => $attachment_url ) {
        echo '<a class="gallery-image" href="'. wp_get_attachment_url( $attachment_id ) .'" data-uk-lightbox="&#123;group:&#39;group-'. get_the_ID() .'&#39;&#125;" title="'. get_the_title( $attachment_id ) .'">';
        echo wp_get_attachment_image( $attachment_id, $img_size );
        echo '</a>';
    }
    echo '</div>';
}

function ut_gallery() {
    $labels = array(
        'name'                => esc_html__( 'Galeri Foto', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => esc_html__( 'Galeri Foto', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => esc_html__( 'Galeri Foto', 'ukmtheme' ),
        'parent_item_colon'   => esc_html__( 'Parent Galeri Foto:', 'ukmtheme' ),
        'all_items'           => esc_html__( 'All Galeri Foto', 'ukmtheme' ),
        'view_item'           => esc_html__( 'View Galeri Foto', 'ukmtheme' ),
        'add_new_item'        => esc_html__( 'Add New Galeri Foto', 'ukmtheme' ),
        'add_new'             => esc_html__( 'Add New', 'ukmtheme' ),
        'edit_item'           => esc_html__( 'Edit Galeri Foto', 'ukmtheme' ),
        'update_item'         => esc_html__( 'Update Galeri Foto', 'ukmtheme' ),
        'search_items'        => esc_html__( 'Search Galeri Foto', 'ukmtheme' ),
        'not_found'           => esc_html__( 'No Galeri Foto found', 'ukmtheme' ),
        'not_found_in_trash'  => esc_html__( 'No Galeri Foto found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => esc_html__( 'Galeri Foto', 'ukmtheme' ),
        'description'         => esc_html__( 'Galeri Foto manager for UKM', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'taxonomies'          => array( 'galcat' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => get_template_directory_uri() . '/img/icon-gallery.svg',
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
        'name'                       => esc_html__( 'Galeri Foto Albums', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => esc_html__( 'Galeri Foto Album', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => esc_html__( 'Album', 'ukmtheme' ),
        'all_items'                  => esc_html__( 'All Items', 'ukmtheme' ),
        'parent_item'                => esc_html__( 'Parent Galeri Foto Album', 'ukmtheme' ),
        'parent_item_colon'          => esc_html__( 'Parent Galeri Foto Album:', 'ukmtheme' ),
        'new_item_name'              => esc_html__( 'New Galeri Foto Album Name', 'ukmtheme' ),
        'add_new_item'               => esc_html__( 'Add New Galeri Foto Album', 'ukmtheme' ),
        'edit_item'                  => esc_html__( 'Edit Galeri Foto Album', 'ukmtheme' ),
        'update_item'                => esc_html__( 'Update Galeri Foto Album', 'ukmtheme' ),
        'separate_items_with_commas' => esc_html__( 'Separate Galeri Foto Albums with commas', 'ukmtheme' ),
        'search_items'               => esc_html__( 'Search Galeri Foto Albums', 'ukmtheme' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Galeri Foto Albums', 'ukmtheme' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Galeri Foto Albums', 'ukmtheme' ),
        'not_found'                  => esc_html__( 'Not Found', 'ukmtheme' ),
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
        'name'                => esc_html__( 'Berita', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => esc_html__( 'Berita', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => esc_html__( 'Berita', 'ukmtheme' ),
        'parent_item_colon'   => esc_html__( 'Parent Berita:', 'ukmtheme' ),
        'all_items'           => esc_html__( 'All Berita', 'ukmtheme' ),
        'view_item'           => esc_html__( 'View Berita', 'ukmtheme' ),
        'add_new_item'        => esc_html__( 'Add New Berita', 'ukmtheme' ),
        'add_new'             => esc_html__( 'Add New', 'ukmtheme' ),
        'edit_item'           => esc_html__( 'Edit Berita', 'ukmtheme' ),
        'update_item'         => esc_html__( 'Update Berita', 'ukmtheme' ),
        'search_items'        => esc_html__( 'Search Berita', 'ukmtheme' ),
        'not_found'           => esc_html__( 'Not found', 'ukmtheme' ),
        'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'ukmtheme' ),
    );
    $rewrite = array(
        'slug'                => 'news',
        'with_front'          => true,
        'pages'               => true,
        'feeds'               => true,
    );
    $args = array(
        'label'               => esc_html__( 'ukmnews', 'ukmtheme' ),
        'description'         => esc_html__( 'Latest Berita', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
        'taxonomies'          => array( 'newscat' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => get_template_directory_uri() . '/img/icon-news.svg',
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
        'name'                       => esc_html__( 'Berita Categories', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => esc_html__( 'Berita Category', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => esc_html__( 'Categories', 'ukmtheme' ),
        'all_items'                  => esc_html__( 'All Items', 'ukmtheme' ),
        'parent_item'                => esc_html__( 'Parent Berita Category', 'ukmtheme' ),
        'parent_item_colon'          => esc_html__( 'Parent Berita Category:', 'ukmtheme' ),
        'new_item_name'              => esc_html__( 'New Berita Category Name', 'ukmtheme' ),
        'add_new_item'               => esc_html__( 'Add New Berita Category', 'ukmtheme' ),
        'edit_item'                  => esc_html__( 'Edit Berita Category', 'ukmtheme' ),
        'update_item'                => esc_html__( 'Update Berita Category', 'ukmtheme' ),
        'separate_items_with_commas' => esc_html__( 'Separate Berita Categories with commas', 'ukmtheme' ),
        'search_items'               => esc_html__( 'Search Berita Categories', 'ukmtheme' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Berita Categories', 'ukmtheme' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Berita Categories', 'ukmtheme' ),
        'not_found'                  => esc_html__( 'Not Found', 'ukmtheme' ),
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
        'name'                => esc_html__( 'Slideset', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => esc_html__( 'Slideset', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => esc_html__( 'Slideset', 'ukmtheme' ),
        'parent_item_colon'   => esc_html__( 'Parent Slideset:', 'ukmtheme' ),
        'all_items'           => esc_html__( 'All Slideset', 'ukmtheme' ),
        'view_item'           => esc_html__( 'View Slideset', 'ukmtheme' ),
        'add_new_item'        => esc_html__( 'Add New Slideset', 'ukmtheme' ),
        'add_new'             => esc_html__( 'New Slideset', 'ukmtheme' ),
        'edit_item'           => esc_html__( 'Edit Slideset', 'ukmtheme' ),
        'update_item'         => esc_html__( 'Update Slideset', 'ukmtheme' ),
        'search_items'        => esc_html__( 'Search Slideset', 'ukmtheme' ),
        'not_found'           => esc_html__( 'No Slideset found', 'ukmtheme' ),
        'not_found_in_trash'  => esc_html__( 'No Slideset found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => esc_html__( 'Slideset', 'ukmtheme' ),
        'description'         => esc_html__( 'Slideset manager for UKM', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => get_template_directory_uri() . '/img/icon-slideset.svg',
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
        'ut_slideset_image'     => esc_html__( 'Image', 'ukmtheme' ),
        'title'                 => esc_html__( 'Title', 'ukmtheme' ),
        'date'                  => esc_html__( 'Date', 'ukmtheme' )
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
        $title = esc_html__( 'Enter slide title here', 'ukmtheme' );
    }
    return $title;
}
add_filter( 'enter_title_here', 'title_slideshow_input' );

function ut_slideshow() {
    $labels = array(
        'name'                => esc_html__( 'Slideshow', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => esc_html__( 'Slideshow', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => esc_html__( 'Slideshow', 'ukmtheme' ),
        'parent_item_colon'   => esc_html__( 'Parent Slideshow:', 'ukmtheme' ),
        'all_items'           => esc_html__( 'All Slideshow', 'ukmtheme' ),
        'view_item'           => esc_html__( 'View Slideshow', 'ukmtheme' ),
        'add_new_item'        => esc_html__( 'Add New Slideshow', 'ukmtheme' ),
        'add_new'             => esc_html__( 'New Slideshow', 'ukmtheme' ),
        'edit_item'           => esc_html__( 'Edit Slideshow', 'ukmtheme' ),
        'update_item'         => esc_html__( 'Update Slideshow', 'ukmtheme' ),
        'search_items'        => esc_html__( 'Search Slideshow', 'ukmtheme' ),
        'not_found'           => esc_html__( 'No Slideshow found', 'ukmtheme' ),
        'not_found_in_trash'  => esc_html__( 'No Slideshow found in Trash', 'ukmtheme' ),
    );
    $args = array(
        'label'               => esc_html__( 'slideshow', 'ukmtheme' ),
        'description'         => esc_html__( 'Frontpage image slideshow', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => get_template_directory_uri() . '/img/icon-slideshow.svg',
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
        'ut_slideshow_image'    => esc_html__( 'Image', 'ukmtheme' ),
        'title'                 => esc_html__( 'Title', 'ukmtheme' ),
        'date'                  => esc_html__( 'Date', 'ukmtheme' )
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

// POST TYPE: STAFF DIRECTORY

function title_staff_input ( $title ) {
    if ( get_post_type() == 'staff' ) {
        $title = esc_html__( 'Enter staff name here', 'ukmtheme' );
    }
    return $title;
}
add_filter( 'enter_title_here', 'title_staff_input' );

function ukmtheme_staff_directory() {
    $labels = array(
        'name'                => esc_html__( 'Staf', 'Post Type General Name', 'ukmtheme' ),
        'singular_name'       => esc_html__( 'Staf', 'Post Type Singular Name', 'ukmtheme' ),
        'menu_name'           => esc_html__( 'Direktori Staf', 'ukmtheme' ),
        'parent_item_colon'   => esc_html__( 'Parent Staf:', 'ukmtheme' ),
        'all_items'           => esc_html__( 'All Staf', 'ukmtheme' ),
        'view_item'           => esc_html__( 'View Staf', 'ukmtheme' ),
        'add_new_item'        => esc_html__( 'Add New Staf', 'ukmtheme' ),
        'add_new'             => esc_html__( 'Add New', 'ukmtheme' ),
        'edit_item'           => esc_html__( 'Edit Staf', 'ukmtheme' ),
        'update_item'         => esc_html__( 'Update Staf', 'ukmtheme' ),
        'search_items'        => esc_html__( 'Search Staf', 'ukmtheme' ),
        'not_found'           => esc_html__( 'Not found', 'ukmtheme' ),
        'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'ukmtheme' ),
    );
    $rewrite = array(
        'slug'                => 'staff-directory',
        'with_front'          => true,
        'pages'               => true,
        'feeds'               => true,
    );
    $args = array(
        'label'               => esc_html__( 'staff', 'ukmtheme' ),
        'description'         => esc_html__( 'Latest Staf', 'ukmtheme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions', ),
        'taxonomies'          => array( 'department', 'position' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_icon'           => get_template_directory_uri() . '/img/icon-staff.svg',
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
        'name'                       => esc_html__( 'Positions', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => esc_html__( 'Position', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => esc_html__( 'Position', 'ukmtheme' ),
        'all_items'                  => esc_html__( 'All Items', 'ukmtheme' ),
        'parent_item'                => esc_html__( 'Parent Position', 'ukmtheme' ),
        'parent_item_colon'          => esc_html__( 'Parent Position:', 'ukmtheme' ),
        'new_item_name'              => esc_html__( 'New Position Name', 'ukmtheme' ),
        'add_new_item'               => esc_html__( 'Add New Position', 'ukmtheme' ),
        'edit_item'                  => esc_html__( 'Edit Position', 'ukmtheme' ),
        'update_item'                => esc_html__( 'Update Position', 'ukmtheme' ),
        'separate_items_with_commas' => esc_html__( 'Separate Positions with commas', 'ukmtheme' ),
        'search_items'               => esc_html__( 'Search Positions', 'ukmtheme' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Positions', 'ukmtheme' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Positions', 'ukmtheme' ),
        'not_found'                  => esc_html__( 'Not Found', 'ukmtheme' ),
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
        'name'                       => esc_html__( 'Departments', 'Taxonomy General Name', 'ukmtheme' ),
        'singular_name'              => esc_html__( 'Department', 'Taxonomy Singular Name', 'ukmtheme' ),
        'menu_name'                  => esc_html__( 'Department', 'ukmtheme' ),
        'all_items'                  => esc_html__( 'All Departments', 'ukmtheme' ),
        'parent_item'                => esc_html__( 'Parent Department', 'ukmtheme' ),
        'parent_item_colon'          => esc_html__( 'Parent Department:', 'ukmtheme' ),
        'new_item_name'              => esc_html__( 'New Department Name', 'ukmtheme' ),
        'add_new_item'               => esc_html__( 'Add New Department', 'ukmtheme' ),
        'edit_item'                  => esc_html__( 'Edit Department', 'ukmtheme' ),
        'update_item'                => esc_html__( 'Update Department', 'ukmtheme' ),
        'separate_items_with_commas' => esc_html__( 'Separate departments with commas', 'ukmtheme' ),
        'search_items'               => esc_html__( 'Search Departments', 'ukmtheme' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove departments', 'ukmtheme' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used departments', 'ukmtheme' ),
        'not_found'                  => esc_html__( 'Not Found', 'ukmtheme' ),
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
            'show_option_all' =>  esc_html__( 'All Department', 'ukmtheme' ),
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
            'show_option_all' =>  esc_html__( 'All Position', 'ukmtheme' ),
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
        'ut_staff_photo'      => esc_html__( 'Photo', 'ukmtheme' ),
        'title'               => esc_html__( 'Name', 'ukmtheme' ),
        'ut_staff_position'   => esc_html__( 'Position', 'ukmtheme' ),
        'ut_staff_department' => esc_html__( 'Department', 'ukmtheme' )
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
            <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_staff.svg" width="50">
        <?php } break;
        case 'ut_staff_position' : echo get_the_term_list( $post->ID, 'position', '', ', ',''); break;
        case 'ut_staff_department' : echo get_the_term_list( $post->ID, 'department', '', ', ',''); break;
    }
}
add_action( 'manage_staff_posts_custom_column', 'ut_staff_custom_columns' );

/**
 * Include single, archive and taxonomy from custom directory
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/template_include
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/single_template
 * @link http://codex.wordpress.org/Function_Reference/is_post_type_archive
 */

// POST TYPE FILES: Soalan Lazim

function archive_faq_page_template( $template_faq ) {
    if ( is_post_type_archive( 'faq' )  ) {
        $new_template_faq = get_template_directory() . '/templates/archive-faq.php';
        if ( '' != $new_template_faq ) {
            return $new_template_faq ;
        }
    }
    return $template_faq;
}
add_filter( 'template_include', 'archive_faq_page_template', 99 );

function get_faq_post_type_template( $single_faq_template ) {
    global $post;
    if ($post->post_type == 'faq') {
        $single_faq_template = get_template_directory() . '/templates/single-faq.php';
    }
    return $single_faq_template;
}
add_filter( 'single_template', 'get_faq_post_type_template' );

function taxonomy_faqcat_page_template( $template_faqcat ) {
    if ( is_tax( 'faqcat' )  ) {
        $new_template_faqcat = get_template_directory() . '/templates/taxonomy-faqcat.php';
        if ( '' != $new_template_faqcat ) {
            return $new_template_faqcat ;
        }
    }
    return $template_faqcat;
}
add_filter( 'template_include', 'taxonomy_faqcat_page_template', 99 );

// POST TYPE FILES: GALLERY

function get_gallery_post_type_template( $single_gallery_template ) {
    global $post;
        if ( $post->post_type == 'gallery' ) {
            $single_gallery_template = get_template_directory() . '/templates/single-gallery.php';
        }
        return $single_gallery_template;
}
add_filter( 'single_template', 'get_gallery_post_type_template' );

function archive_gallery_page_template( $template_gallery ) {
    if ( is_post_type_archive( 'gallery' )  ) {
        $new_template_gallery = get_template_directory() . '/templates/archive-gallery.php';
        if ( '' != $new_template_gallery ) {
            return $new_template_gallery ;
        }
    }
    return $template_gallery;
}
add_filter( 'template_include', 'archive_gallery_page_template', 99 );

function taxonomy_galcat_page_template( $template_galcat ) {
    if ( is_tax( 'galcat' )  ) {
        $new_template_galcat = get_template_directory() . '/templates/taxonomy-galcat.php';
        if ( '' != $new_template_galcat ) {
            return $new_template_galcat ;
        }
    }
    return $template_galcat;
}
add_filter( 'template_include', 'taxonomy_galcat_page_template', 99 );

// POST TYPE FILES: NEWS

function get_news_post_type_template($single_news_template) {
    global $post;
    if ( $post->post_type == 'news' ) {
        $single_news_template = get_template_directory() . '/templates/single-news.php';
    }
    return $single_news_template;
}
add_filter( 'single_template', 'get_news_post_type_template' );

function archive_news_page_template( $template_news ) {
    if ( is_post_type_archive( 'news' )  ) {
        $new_template_news = get_template_directory() . '/templates/archive-news.php';
        if ( '' != $new_template_news ) {
            return $new_template_news ;
        }
    }
    return $template_news;
}
add_filter( 'template_include', 'archive_news_page_template', 99 );

function taxonomy_news_page_template( $template_newscat ) {
    if ( is_tax( 'newscat' )  ) {
        $new_template_newscat = get_template_directory() . '/templates/taxonomy-newscat.php';
        if ( '' != $new_template_newscat ) {
            return $new_template_newscat ;
        }
    }
    return $template_newscat;
}
add_filter( 'template_include', 'taxonomy_news_page_template', 99 );

// POST TYPE FILES: STAFF

function get_staff_post_type_template($single_staff_template) {
    global $post;
        if ( $post->post_type == 'staff' ) {
            $single_staff_template = get_template_directory() . '/templates/single-staff.php';
        }
        return $single_staff_template;
}
add_filter( 'single_template', 'get_staff_post_type_template' );

function archive_staff_page_template( $template_staff ) {
    if ( is_post_type_archive( 'staff' )  ) {
        $new_template_staff = get_template_directory() . '/templates/archive-staff.php';
        if ( '' != $new_template_staff ) {
            return $new_template_staff ;
        }
    }
    return $template_staff;
}
add_filter( 'template_include', 'archive_staff_page_template', 99 );

function taxonomy_department_page_template( $template_department ) {
    if ( is_tax( 'department' )  ) {
        $new_template_department = get_template_directory() . '/templates/taxonomy-department.php';
        if ( '' != $new_template_department ) {
            return $new_template_department ;
        }
    }
    return $template_department;
}
add_filter( 'template_include', 'taxonomy_department_page_template', 99 );

function taxonomy_position_page_template( $template_position ) {
    if ( is_tax( 'position' )  ) {
        $new_template_position = get_template_directory() . '/templates/taxonomy-position.php';
        if ( '' != $new_template_position ) {
            return $new_template_position ;
        }
    }
    return $template_position;
}
add_filter( 'template_include', 'taxonomy_position_page_template', 99 );