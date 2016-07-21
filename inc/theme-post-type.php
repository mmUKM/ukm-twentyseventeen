<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @since 1.0
 * 
 * Post type
 * ===============================
 * 01. Appreciation
 * 02. Conference
 * 03. Events
 * 04. Expertise
 * 05. FAQs
 * 06. Gallery
 * 07. Journal
 * 08. Latest News/News
 * 09. Page Taxonomies
 * 10. Press Release
 * 11. Publications
 * 12. Staff Directory
 * 13. Slideset
 * 14. Slideshow
 * 15. Tab
 * 
 * Custom Column Adjustment
 * ===============================
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/manage_edit-post_type_columns
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_$post_type_posts_custom_column
 */

/**
 * @name Appreciation
 * @package UKMTheme Appreciation plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */
function ut_appreciation() {

  $labels = array(
    'name'                => _x( 'Appreciation', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Appreciation', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Appreciation', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Appreciation:', 'ukmtheme' ),
    'all_items'           => __( 'All Appreciation', 'ukmtheme' ),
    'view_item'           => __( 'View Appreciation', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Appreciation', 'ukmtheme' ),
    'add_new'             => __( 'New Appreciation', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Appreciation', 'ukmtheme' ),
    'update_item'         => __( 'Update Appreciation', 'ukmtheme' ),
    'search_items'        => __( 'Search Appreciation', 'ukmtheme' ),
    'not_found'           => __( 'No Appreciation found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Appreciation found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'Appreciation', 'ukmtheme' ),
    'description'         => __( 'Appreciation manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'revisions', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-appreciation.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'appreciation', $args );

}

add_action( 'init', 'ut_appreciation', 0 );

add_action('manage_appreciation_posts_custom_column', 'ut_appreciation_custom_columns');
add_filter('manage_edit-appreciation_columns', 'ut_add_new_appreciation_columns');

function ut_add_new_appreciation_columns( $columns ){
  $columns = array(
    'cb'                    => '<input type="checkbox">',
    'title'                 => __( 'Greeting', 'ukmtheme' ),
    'ut_appreciation_by'    => __( 'By','ukmtheme' ),
    'ut_appreciation_ptj'   => __( 'PTJ','ukmtheme' ),
    'ut_appreciation_date'  => __( 'Date','ukmtheme' )
  );
  return $columns;
}

function ut_appreciation_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_appreciation_by' : echo get_post_meta($post->ID,'ut_appreciation_by',true); break;
    case 'ut_appreciation_ptj' : echo get_post_meta($post->ID,'ut_appreciation_ptj',true); break;
    case 'ut_appreciation_date' : echo get_post_meta($post->ID,'ut_appreciation_date',true); break;
  }
}

/**
 * @name Conference
 * @package UKMTheme
 * @subpackage Conference Plugin
 * @since 2.0
 * @author Jamaludin Rajalu
 */

add_filter( 'enter_title_here', 'title_conference_input' );
  function title_conference_input ( $title ) {
    if ( get_post_type() == 'conference' ) {
      $title = __( 'Enter Conference Name', 'ukmtheme' );
    }
    return $title;
  }
  
function ut_conference_slideshow( $file_list_meta_key, $img_size = 'full' ) {
  $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
  echo '<ul class="uk-slideshow">';
  foreach ( (array) $files as $attachment_id => $attachment_url ) {
    echo '<li>';
    echo wp_get_attachment_image( $attachment_id, $img_size );
    echo '</li>';
  }
  echo '</ul>';
}

function ut_conference_keynote( $file_list_meta_key, $img_size = 'full' ) {
  $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
  echo '<ul class="uk-slideset uk-grid uk-flex-center uk-grid-width-1-4">';
  foreach ( (array) $files as $attachment_id => $attachment_url ) {
    echo '<li>';
      echo '<a href="'. wp_get_attachment_url( $attachment_id ) .'" title="'. get_the_title( $attachment_id ) .'">';
        echo wp_get_attachment_image( $attachment_id, $img_size );
      echo '</a>';
      echo '<p style="text-align:center;">';
        echo '<strong>' . get_the_title( $attachment_id ) . '</strong><br>';
        echo get_post( $attachment_id )->post_excerpt . '<br>';
        echo get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
      echo '</p>';
    echo '</li>';
  }
  echo '</ul';
}
  
function ut_conference() {

  $labels = array(
    'name'                  => _x( 'Conferences', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'         => _x( 'Conference', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'             => __( 'Conference', 'ukmtheme' ),
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
    'description'           => __( 'Conference plugin for UKM Twenty Fifteen Theme', 'ukmtheme' ),
    'labels'                => $labels,
    'supports'              => array( 'title', ),
    //'taxonomies'            => array( 'category', 'post_tag' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_icon'             => get_template_directory_uri() . '/img/icon-conference.svg',
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

/**
 * @name Events
 * @package UKMTheme
 * @subpackage Events Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */

function ut_event() {

  $labels = array(
    'name'                => _x( 'Events', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Event', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Event:', 'ukmtheme' ),
    'all_items'           => __( 'All Events', 'ukmtheme' ),
    'view_item'           => __( 'View Event', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Event', 'ukmtheme' ),
    'add_new'             => __( 'New Event', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Event', 'ukmtheme' ),
    'update_item'         => __( 'Update Event', 'ukmtheme' ),
    'search_items'        => __( 'Search Events', 'ukmtheme' ),
    'not_found'           => __( 'No Events found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Events found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'event', 'ukmtheme' ),
    'description'         => __( 'Event manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,  
    'menu_icon'           => get_template_directory_uri() . '/img/icon-event.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'event', $args );

}

add_action( 'init', 'ut_event', 0 );

add_action('manage_event_posts_custom_column', 'ut_event_custom_columns');
add_filter('manage_edit-event_columns', 'ut_add_new_event_columns');

function ut_add_new_event_columns( $columns ){
  $columns = array(
    'cb'                  => '<input type="checkbox">',
    'title'               => __( 'Event', 'ukmtheme' ),
    'ut_event_date'       => __( 'Date', 'ukmtheme' ),
    'ut_event_time_start' => __( 'Start', 'ukmtheme' ),
    'ut_event_time_end'   => __( 'End', 'ukmtheme' ),
    'ut_event_venue'      => __( 'Venue', 'ukmtheme' )   
  );
  return $columns;
}

function ut_event_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_event_date' : echo get_post_meta($post->ID,'ut_event_date',true); break;
    case 'ut_event_time_start' : echo get_post_meta($post->ID,'ut_event_time_start',true); break;
    case 'ut_event_time_end' : echo get_post_meta($post->ID,'ut_event_time_end',true); break;
    case 'ut_event_venue' : echo get_post_meta($post->ID,'ut_event_venue',true); break;
  }
}
/**
 * @name Expertise
 * @package UKMTheme
 * @subpackage Expertise Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */
add_filter( 'enter_title_here', 'title_expert_input' );
  function title_expert_input ( $title ) {
    if ( get_post_type() == 'expertise' ) {
      $title = __( 'Expert Name', 'ukmtheme' );
    }
    return $title;
  }

function ut_expertise() {

  $labels = array(
    'name'                => _x( 'Expertise', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Expertise', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Expertise', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Expertise:', 'ukmtheme' ),
    'all_items'           => __( 'All Expertise', 'ukmtheme' ),
    'view_item'           => __( 'View Expertise', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Expertise', 'ukmtheme' ),
    'add_new'             => __( 'New Expertise', 'ukmtheme' ),
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
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-expertise.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'expertise', $args );

}

add_action( 'init', 'ut_expertise', 0 );

add_action('manage_expertise_posts_custom_column', 'ut_expertise_custom_columns');
add_filter('manage_edit-expertise_columns', 'ut_add_new_expertise_columns');

function ut_add_new_expertise_columns( $columns ){
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

function ut_expertise_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_expertise_photo' : 
      $expertPhoto = get_post_meta($post->ID,'ut_expertise_photo',true);
       if ( $expertPhoto ) {
        echo '<img src="'.$expertPhoto.'" width="60">'; break;
       }
       else {
        echo '<img src="'. get_template_directory_uri() .'/img/placeholder_staff.svg" width="60">'; break;
       }
    case 'ut_expertise_position' : echo get_post_meta($post->ID,'ut_expertise_position',true); break;
    case 'ut_expertise_email' : echo get_post_meta($post->ID,'ut_expertise_email',true); break;
    case 'ut_expertise_contact' : echo get_post_meta($post->ID,'ut_expertise_contact',true); 
  }
}
/**
 * @name Frequently Ask Question
 * @package UKMTheme
 * @subpackage FAQ Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */
add_filter( 'enter_title_here', 'title_faq_input' );
  function title_faq_input ( $title ) {

    if ( get_post_type() == 'faq' ) {
      $title = __( 'Enter question here', 'ukmtheme' );
    }
    return $title;
  }

function ukmtheme_faq() {

  $labels = array(
    'name'                => _x( 'FAQs', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'FAQ', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'FAQ', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent FAQ:', 'ukmtheme' ),
    'all_items'           => __( 'All FAQs', 'ukmtheme' ),
    'view_item'           => __( 'View FAQ', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New FAQ', 'ukmtheme' ),
    'add_new'             => __( 'New FAQ', 'ukmtheme' ),
    'edit_item'           => __( 'Edit FAQ', 'ukmtheme' ),
    'update_item'         => __( 'Update FAQ', 'ukmtheme' ),
    'search_items'        => __( 'Search FAQs', 'ukmtheme' ),
    'not_found'           => __( 'No FAQs found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No FAQs found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'faq', 'ukmtheme' ),
    'description'         => __( 'FAQ manager for UKM', 'ukmtheme' ),
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
    'name'                       => _x( 'FAQ Categories', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'FAQ Category', 'Taxonomy Singular Name', 'ukmtheme' ),
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

add_action('manage_faq_posts_custom_column', 'ukmtheme_faq_custom_columns');
add_filter('manage_edit-faq_columns', 'ut_add_new_faq_columns');

function ut_add_new_faq_columns( $columns ){
  $columns = array(
    'cb'                          => '<input type="checkbox">',
    'title'                       => __( 'Question', 'ukmtheme' ),
    'faqcat'                      => __( 'Category', 'ukmtheme' ),
  );
  return $columns;
}

function ukmtheme_faq_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'faqcat' : echo get_the_term_list( $post->ID, 'faqcat', '', ', ',''); break;
  }
}
/**
 * @name Photo Gallery
 * @package UKMTheme
 * @subpackage Gallery Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */
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
    'name'                => _x( 'Gallery', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Gallery', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Gallery', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Gallery:', 'ukmtheme' ),
    'all_items'           => __( 'All Gallery', 'ukmtheme' ),
    'view_item'           => __( 'View Gallery', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Gallery', 'ukmtheme' ),
    'add_new'             => __( 'Add New', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Gallery', 'ukmtheme' ),
    'update_item'         => __( 'Update Gallery', 'ukmtheme' ),
    'search_items'        => __( 'Search Gallery', 'ukmtheme' ),
    'not_found'           => __( 'No Gallery found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Gallery found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'Gallery', 'ukmtheme' ),
    'description'         => __( 'Gallery manager for UKM', 'ukmtheme' ),
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
    'name'                       => _x( 'Gallery Albums', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'Gallery Album', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Album', 'ukmtheme' ),
    'all_items'                  => __( 'All Items', 'ukmtheme' ),
    'parent_item'                => __( 'Parent Gallery Album', 'ukmtheme' ),
    'parent_item_colon'          => __( 'Parent Gallery Album:', 'ukmtheme' ),
    'new_item_name'              => __( 'New Gallery Album Name', 'ukmtheme' ),
    'add_new_item'               => __( 'Add New Gallery Album', 'ukmtheme' ),
    'edit_item'                  => __( 'Edit Gallery Album', 'ukmtheme' ),
    'update_item'                => __( 'Update Gallery Album', 'ukmtheme' ),
    'separate_items_with_commas' => __( 'Separate Gallery Albums with commas', 'ukmtheme' ),
    'search_items'               => __( 'Search Gallery Albums', 'ukmtheme' ),
    'add_or_remove_items'        => __( 'Add or remove Gallery Albums', 'ukmtheme' ),
    'choose_from_most_used'      => __( 'Choose from the most used Gallery Albums', 'ukmtheme' ),
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

/**
 * @name Journal
 * @package UKMTheme
 * @subpackage Journal Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */
add_filter( 'enter_title_here', 'title_journal_input' );
  function title_journal_input ( $title ) {
    if ( get_post_type() == 'journal' ) {
      $title = __( 'Enter journal name here', 'ukmtheme' );
    }
    return $title;
  }

function ut_journal() {

  $labels = array(
    'name'                => _x( 'Journals', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Journal', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Journal', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Journal:', 'ukmtheme' ),
    'all_items'           => __( 'All Articles', 'ukmtheme' ),
    'view_item'           => __( 'View Journal', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Journal', 'ukmtheme' ),
    'add_new'             => __( 'New Article', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Journal', 'ukmtheme' ),
    'update_item'         => __( 'Update Journal', 'ukmtheme' ),
    'search_items'        => __( 'Search Journals', 'ukmtheme' ),
    'not_found'           => __( 'No Journals found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Journals found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'Journal', 'ukmtheme' ),
    'description'         => __( 'Journal information pages', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor' ),
    'taxonomies'          => array( 'jourcat', 'jourkey' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-journal.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'journal', $args );

}

add_action( 'init', 'ut_journal', 0 );

function ut_journal_category()  {

  $labels = array(
    'name'                       => _x( 'Journal Categories', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'Journal Category', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Journals', 'ukmtheme' ),
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
    'slug'                       => 'journal-category',
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
    'query_var'                  => 'jourcat',
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'jourcat', 'journal', $args );

}

add_action( 'init', 'ut_journal_category', 0 );

function ut_journal_keyword()  {

  $labels = array(
    'name'                       => _x( 'Journal Keywords', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'Journal Keyword', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Keywords', 'ukmtheme' ),
    'all_items'                  => __( 'All Keywords', 'ukmtheme' ),
    'parent_item'                => __( 'Parent Keyword', 'ukmtheme' ),
    'parent_item_colon'          => __( 'Parent Keyword:', 'ukmtheme' ),
    'new_item_name'              => __( 'New Keyword Name', 'ukmtheme' ),
    'add_new_item'               => __( 'Add New Keyword', 'ukmtheme' ),
    'edit_item'                  => __( 'Edit Keyword', 'ukmtheme' ),
    'update_item'                => __( 'Update Keyword', 'ukmtheme' ),
    'separate_items_with_commas' => __( 'Separate Keywords with commas', 'ukmtheme' ),
    'search_items'               => __( 'Search Keywords', 'ukmtheme' ),
    'add_or_remove_items'        => __( 'Add or remove Keywords', 'ukmtheme' ),
    'choose_from_most_used'      => __( 'Choose from the most used Keywords', 'ukmtheme' ),
  );
  $rewrite = array(
    'slug'                       => 'journal-keyword',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'query_var'                  => 'jourkey',
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'jourkey', 'journal', $args );

}

add_action( 'init', 'ut_journal_keyword', 0 );

add_action('manage_journal_posts_custom_column', 'ut_journal_custom_columns');
add_filter('manage_edit-journal_columns', 'ut_add_new_journal_columns');

function ut_add_new_journal_columns( $columns ){
  $columns = array(
    'cb'                => '<input type="checkbox">',
    'ut_journal_cover'  => __( 'Cover', 'ukmtheme' ),
    'title'             => __( 'Article', 'ukmtheme' ),
    'jourcat'           => __( 'Journal', 'ukmtheme' ),
    'jourkey'           => __( 'Keyword', 'ukmtheme' ),
    'ut_journal_author' => __( 'Author', 'ukmtheme' )
  );
  return $columns;
}

function ut_journal_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_journal_cover' :
      $pub_cover = get_post_meta($post->ID,'ut_journal_cover',true);
      if ( $pub_cover ) { ?>
      <img src="<?php echo $pub_cover; ?>" alt="" width="50">
      <?php }
      else { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_journal.svg" width="50">
    <?php } break;
    case 'jourcat' : echo get_the_term_list( $post->ID, 'jourcat', '', ', ',''); break;
    case 'jourkey' : echo get_the_term_list( $post->ID, 'jourkey', '', ', ',''); break;
    case 'ut_journal_author' : echo get_post_meta($post->ID,'ut_journal_author',true); break;
  }
}

/**
 * @name News
 * @package UKMTheme
 * @subpackage News Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */
function ukmtheme_latest_news() {

  $labels = array(
    'name'                => _x( 'News', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'News', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'News', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent News:', 'ukmtheme' ),
    'all_items'           => __( 'All News', 'ukmtheme' ),
    'view_item'           => __( 'View News', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New News', 'ukmtheme' ),
    'add_new'             => __( 'Add New', 'ukmtheme' ),
    'edit_item'           => __( 'Edit News', 'ukmtheme' ),
    'update_item'         => __( 'Update News', 'ukmtheme' ),
    'search_items'        => __( 'Search News', 'ukmtheme' ),
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
    'description'         => __( 'Latest News', 'ukmtheme' ),
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
    'name'                       => _x( 'News Categories', 'Taxonomy General Name', 'ukmtheme' ),
    'singular_name'              => _x( 'News Category', 'Taxonomy Singular Name', 'ukmtheme' ),
    'menu_name'                  => __( 'Categories', 'ukmtheme' ),
    'all_items'                  => __( 'All Items', 'ukmtheme' ),
    'parent_item'                => __( 'Parent News Category', 'ukmtheme' ),
    'parent_item_colon'          => __( 'Parent News Category:', 'ukmtheme' ),
    'new_item_name'              => __( 'New News Category Name', 'ukmtheme' ),
    'add_new_item'               => __( 'Add New News Category', 'ukmtheme' ),
    'edit_item'                  => __( 'Edit News Category', 'ukmtheme' ),
    'update_item'                => __( 'Update News Category', 'ukmtheme' ),
    'separate_items_with_commas' => __( 'Separate News Categories with commas', 'ukmtheme' ),
    'search_items'               => __( 'Search News Categories', 'ukmtheme' ),
    'add_or_remove_items'        => __( 'Add or remove News Categories', 'ukmtheme' ),
    'choose_from_most_used'      => __( 'Choose from the most used News Categories', 'ukmtheme' ),
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
  
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 2.0
 * @author Jamaludin Rajalu
 *
 * Post Type: Press Release
 */

add_action( 'init', 'ut_press', 0 );

  function ut_press() {
    $labels = array(
      'name'                => _x( 'News Clipping', 'Post Type General Name', 'ukmtheme' ),
      'singular_name'       => _x( 'News Clipping', 'Post Type Singular Name', 'ukmtheme' ),
      'menu_name'           => __( 'News Clipping', 'ukmtheme' ),
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
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => false,
      'menu_icon'           => get_template_directory_uri() . '/img/icon-press.svg',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
    );
    register_post_type( 'press', $args );
  }

add_action('manage_press_posts_custom_column', 'ut_press_custom_columns');
  function ut_press_custom_columns( $column ){
    global $post;
    
    switch ($column) {
      case 'ut_press_date' : echo get_post_meta($post->ID,'ut_press_date',true); break;
    }
  }

add_filter('manage_edit-press_columns', 'ut_add_new_press_columns');
  function ut_add_new_press_columns( $columns ){
    $columns = array(
      'cb'                  => '<input type="checkbox">',
      'ut_press_date'       => __( 'Date', 'ukmtheme' ),
      'title'               => __( 'Title', 'ukmtheme' ),
    );
    return $columns;
  }
  
/**
 * @name Publication
 * @package UKMTheme
 * @subpackage Publication Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */
add_filter( 'enter_title_here', 'title_publication_input' );
  function title_publication_input ( $title ) {
    if ( get_post_type() == 'publication' ) {
      $title = __( 'Enter publication name here', 'ukmtheme' );
    }
    return $title;
  }

function ut_publication() {

  $labels = array(
    'name'                => _x( 'Publications', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Publication', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Publication', 'ukmtheme' ),
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
    'supports'            => array( 'title' ),
    'taxonomies'          => array( 'pubcat' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-publication.svg',
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

add_action('manage_publication_posts_custom_column', 'ut_publication_custom_columns');
add_filter('manage_edit-publication_columns', 'ut_add_new_publication_columns');

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

function ut_publication_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_publication_cover' :
      $pub_cover = get_post_meta($post->ID,'ut_publication_cover',true);
      if ( $pub_cover ) { ?>
      <img src="<?php echo $pub_cover; ?>" alt="" width="50">
      <?php }
      else { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_publication.svg" width="50">
    <?php } break;
    case 'pubcat' : echo get_the_term_list( $post->ID, 'pubcat', '', ', ',''); break;
    case 'ut_publication_author' : echo get_post_meta($post->ID,'ut_publication_author',true); break;
    case 'ut_publication_publisher' : echo get_post_meta($post->ID,'ut_publication_publisher',true); break;
    case 'ut_publication_year' : echo get_post_meta($post->ID,'ut_publication_year',true); 
  }
}

/**
 * @name Slideset
 * @package UKMTheme
 * @subpackage Slideset Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */

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

add_action('manage_slideset_posts_custom_column', 'ut_slideset_custom_columns');
add_filter('manage_edit-slideset_columns', 'ut_add_new_slideset_columns');

function ut_add_new_slideset_columns( $columns ){
  $columns = array(
    'cb'                    => '<input type="checkbox">',
    'ut_slideset_image'    => __( 'Image', 'ukmtheme' ),
    'title'                 => __( 'Title', 'ukmtheme' ),
    'date'                  => __( 'Date', 'ukmtheme' )
  );
  return $columns;
}

function ut_slideset_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_slideset_image' : echo '<img src="'. get_post_meta( get_the_ID(), 'ut_slideset_image', true ) .'" width="120">';break;
  }
}

/**
 * @name Slideshow
 * @package UKMTheme
 * @subpackage Slideshow Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */

add_filter( 'enter_title_here', 'title_slideshow_input' );
  function title_slideshow_input ( $title ) {
    if ( get_post_type() == 'slideshow' ) {
      $title = __( 'Enter slide title here', 'ukmtheme' );
    }
    return $title;
  }

function ut_slideshow() {

  $labels = array(
    'name'                => _x( 'Slideshows', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Slideshow', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Slideshow', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Slideshow:', 'ukmtheme' ),
    'all_items'           => __( 'All Slideshows', 'ukmtheme' ),
    'view_item'           => __( 'View Slideshow', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Slideshow', 'ukmtheme' ),
    'add_new'             => __( 'New Slideshow', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Slideshow', 'ukmtheme' ),
    'update_item'         => __( 'Update Slideshow', 'ukmtheme' ),
    'search_items'        => __( 'Search Slideshows', 'ukmtheme' ),
    'not_found'           => __( 'No Slideshows found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Slideshows found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'slideshow', 'ukmtheme' ),
    'description'         => __( 'Frontpage image slideshow', 'ukmtheme' ),
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

add_action('manage_slideshow_posts_custom_column', 'ut_slideshow_custom_columns');
add_filter('manage_edit-slideshow_columns', 'ut_add_new_slideshow_columns');

function ut_add_new_slideshow_columns( $columns ){
  $columns = array(
    'cb'                    => '<input type="checkbox">',
    'ut_slideshow_image'    => __( 'Image', 'ukmtheme' ),
    'title'                 => __( 'Title', 'ukmtheme' ),
    'date'                  => __( 'Date', 'ukmtheme' )
  );
  return $columns;
}

function ut_slideshow_custom_columns( $column ){
  global $post;
  
  switch ($column) {
    case 'ut_slideshow_image' : $slideshowURL = get_post_meta($post->ID,'ut_slideshow_image',true); echo '<img src="'.$slideshowURL.'" width="120">';break;
  }
}

/**
 * @name Staff Directory
 * @package UKMTheme
 * @subpackage Staff Directory Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */

add_filter( 'enter_title_here', 'title_staff_input' );
  function title_staff_input ( $title ) {
    if ( get_post_type() == 'staff' ) {
      $title = __( 'Enter staff name here', 'ukmtheme' );
    }
    return $title;
  }

function ukmtheme_staff_directory() {

  $labels = array(
    'name'                => _x( 'Staffs', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Staff', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Staff Directory', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Staff:', 'ukmtheme' ),
    'all_items'           => __( 'All Staffs', 'ukmtheme' ),
    'view_item'           => __( 'View Staff', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Staff', 'ukmtheme' ),
    'add_new'             => __( 'Add New', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Staff', 'ukmtheme' ),
    'update_item'         => __( 'Update Staff', 'ukmtheme' ),
    'search_items'        => __( 'Search Staffs', 'ukmtheme' ),
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
    'description'         => __( 'Latest Staffs', 'ukmtheme' ),
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

add_action('restrict_manage_posts','restrict_listings_by_department');
  function restrict_listings_by_department() {
    global $typenow;
    global $wp_query;
    if ($typenow=='staff') {
    $taxonomy = 'department';
    $term = isset($wp_query->query['department']) ? $wp_query->query['department'] :'';
    $department_taxonomy = get_taxonomy($taxonomy);
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
  
add_filter('parse_query','convert_department_id_to_taxonomy_term_in_query');
  function convert_department_id_to_taxonomy_term_in_query($query) {
    global $pagenow;
    $qv = &$query->query_vars;
    if ($pagenow=='edit.php' && isset($qv['department']) && is_numeric($qv['department'])) {
      $term = get_term_by('id',$qv['department'],'department');
      $qv['department'] = ($term ? $term->slug : '');
    }
  }

add_action('restrict_manage_posts','restrict_listings_by_position');
  function restrict_listings_by_position() {
      global $typenow;
      global $wp_query;
      if ($typenow=='staff') {
      $taxonomy = 'position';
      $term = isset($wp_query->query['position']) ? $wp_query->query['position'] :'';
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
  
add_filter('parse_query','convert_position_id_to_taxonomy_term_in_query');
  function convert_position_id_to_taxonomy_term_in_query($query) {
      global $pagenow;
      $qv = &$query->query_vars;
      if ($pagenow=='edit.php' && isset($qv['position']) && is_numeric($qv['position'])) {
          $term = get_term_by('id',$qv['position'],'position');
          $qv['position'] = ($term ? $term->slug : '');
      }
  }

add_action('manage_staff_posts_custom_column', 'ut_staff_custom_columns');
add_filter('manage_edit-staff_columns', 'ut_add_new_staff_columns');

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

function ut_staff_custom_columns( $column ){
  global $post;
  
  switch ($column) {
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

/**
 * @name Tab Set
 * @package UKMTheme
 * @subpackage Tabber Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */

function ut_tab() {

  $labels = array(
    'name'                => _x( 'Tab', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Tab', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Tabber', 'ukmtheme' ),
    'parent_item_colon'   => __( 'Parent Tab:', 'ukmtheme' ),
    'all_items'           => __( 'All Tab', 'ukmtheme' ),
    'view_item'           => __( 'View Tab', 'ukmtheme' ),
    'add_new_item'        => __( 'Add New Tab', 'ukmtheme' ),
    'add_new'             => __( 'New Tab', 'ukmtheme' ),
    'edit_item'           => __( 'Edit Tab', 'ukmtheme' ),
    'update_item'         => __( 'Update Tab', 'ukmtheme' ),
    'search_items'        => __( 'Search Tab', 'ukmtheme' ),
    'not_found'           => __( 'No Tab found', 'ukmtheme' ),
    'not_found_in_trash'  => __( 'No Tab found in Trash', 'ukmtheme' ),
  );
  $args = array(
    'label'               => __( 'Tab', 'ukmtheme' ),
    'description'         => __( 'Tab manager for UKM', 'ukmtheme' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'revisions', ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-tab.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'tab', $args );

}

add_action( 'init', 'ut_tab', 0 );

/**
 * @name Video Collection from youtube, vimeo etc.
 * @package UKMTheme
 * @subpackage Video Plugin
 * @since 1.0
 * @author Jamaludin Rajalu
 */

function ut_video() {

  $labels = array(
    'name'                => _x( 'Video', 'Post Type General Name', 'ukmtheme' ),
    'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'ukmtheme' ),
    'menu_name'           => __( 'Video', 'ukmtheme' ),
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
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-video.svg',
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
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'vidcat', 'video', $args );

}

add_action( 'init', 'ut_video_category', 0 );

add_action('manage_video_posts_custom_column', 'ut_video_custom_columns');
add_filter('manage_edit-video_columns', 'ut_add_new_video_columns');

function ut_add_new_video_columns( $columns ){
  $columns = array(
    'cb'      => '<input type="checkbox">',
    'title'   => __( 'Title', 'ukmtheme' ),
    'vidcat'  => __( 'Category', 'ukmtheme' ),
  );
  return $columns;
}

function ut_video_custom_columns( $column ){
  global $post;
  switch ($column) {
    case 'vidcat' : echo get_the_term_list( $post->ID, 'vidcat', '', ', ',''); break;
  }
}

/**
 * Include single, archive and taxonomy from custom directory
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/template_include
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/single_template
 * @link http://codex.wordpress.org/Function_Reference/is_post_type_archive
 */

/**
 * @name Appreciation
 * @package Appreciation Plugin
 */
add_filter( 'single_template', 'get_appreciation_post_type_template' );
  function get_appreciation_post_type_template($single_appreciation_template) {
    global $post;
      if ($post->post_type == 'appreciation') {
        $single_appreciation_template = get_template_directory() . '/templates/single-appreciation.php';
      }      
      return $single_appreciation_template;
  }

add_filter( 'template_include', 'archive_appreciation_page_template', 99 );
  function archive_appreciation_page_template( $template_appreciation ) {
    if ( is_post_type_archive( 'appreciation' )  ) {
      $new_template_appreciation = get_template_directory() . '/templates/archive-appreciation.php';
      if ( '' != $new_template_appreciation ) {
        return $new_template_appreciation ;
      }
    }
    return $template_appreciation;
  }

/**
 * @name Conference
 * @package Conference Plugin
 */

add_filter( 'single_template', 'get_conference_post_type_template' );
  function get_conference_post_type_template($single_conference_template) {
    global $post;
      if ($post->post_type == 'conference') {
        $single_conference_template = get_template_directory() . '/templates/single-conference.php';
      }
      return $single_conference_template;
  }
  
add_filter( 'template_include', 'archive_conference_page_template', 99 );
  function archive_conference_page_template( $template_conference ) {
    if ( is_post_type_archive( 'conference' )  ) {
      $new_template_conference = get_template_directory() . '/templates/archive-conference.php';
      if ( '' != $new_template_conference ) {
        return $new_template_conference ;
      }
    }
    return $template_conference;
  }
  
/**
 * @name Events
 * @package Events Plugin
 */

add_filter( 'single_template', 'get_event_post_type_template' );
  function get_event_post_type_template($single_event_template) {
    global $post;
      if ($post->post_type == 'event') {
        $single_event_template = get_template_directory() . '/templates/single-event.php';
      }
      return $single_event_template;
  }

add_filter( 'template_include', 'archive_event_page_template', 99 );
  function archive_event_page_template( $template_event ) {
    if ( is_post_type_archive( 'event' )  ) {
      $new_template_event = get_template_directory() . '/templates/archive-event.php';
      if ( '' != $new_template_event ) {
        return $new_template_event ;
      }
    }
    return $template_event;
  }

/**
 * @name Expertise
 * @package Expertise Plugin
 */

add_filter( 'single_template', 'get_expertise_post_type_template' );
  function get_expertise_post_type_template($single_expertise_template) {
    global $post;
      if ($post->post_type == 'expertise') {
        $single_expertise_template = get_template_directory() . '/templates/single-expertise.php';
      }
      return $single_expertise_template;
  }
add_filter( 'template_include', 'archive_expertise_page_template', 99 );
  function archive_expertise_page_template( $template_expertise ) {
    if ( is_post_type_archive( 'expertise' )  ) {
      $new_template_expertise = get_template_directory() . '/templates/archive-expertise.php';
      if ( '' != $new_template_expertise ) {
        return $new_template_expertise ;
      }
    }
    return $template_expertise;
  }

/**
 * @name Frequently Asked Question
 * @package FAQ Plugin
 */

add_filter( 'template_include', 'archive_faq_page_template', 99 );
  function archive_faq_page_template( $template_faq ) {
    if ( is_post_type_archive( 'faq' )  ) {
      $new_template_faq = get_template_directory() . '/templates/archive-faq.php';
      if ( '' != $new_template_faq ) {
        return $new_template_faq ;
      }
    }
    return $template_faq;
  }

add_filter( 'single_template', 'get_faq_post_type_template' );
  function get_faq_post_type_template($single_faq_template) {
    global $post;
      if ($post->post_type == 'faq') {
        $single_faq_template = get_template_directory() . '/templates/single-faq.php';
      }
      return $single_faq_template;
  }

add_filter( 'template_include', 'taxonomy_faqcat_page_template', 99 );
  function taxonomy_faqcat_page_template( $template_faqcat ) {
    if ( is_tax( 'faqcat' )  ) {
      $new_template_faqcat = get_template_directory() . '/templates/taxonomy-faqcat.php';
      if ( '' != $new_template_faqcat ) {
        return $new_template_faqcat ;
      }
    }
    return $template_faqcat;
  }

/**
 * @name Photo Gallery
 * @package Photo Gallery Plugin
 */

add_filter( 'single_template', 'get_gallery_post_type_template' );
  function get_gallery_post_type_template($single_gallery_template) {
    global $post;
      if ($post->post_type == 'gallery') {
        $single_gallery_template = get_template_directory() . '/templates/single-gallery.php';
      }
      return $single_gallery_template;
  }

add_filter( 'template_include', 'archive_gallery_page_template', 99 );
  function archive_gallery_page_template( $template_gallery ) {
    if ( is_post_type_archive( 'gallery' )  ) {
      $new_template_gallery = get_template_directory() . '/templates/archive-gallery.php';
      if ( '' != $new_template_gallery ) {
        return $new_template_gallery ;
      }
    }
    return $template_gallery;
  }

add_filter( 'template_include', 'taxonomy_galcat_page_template', 99 );
  function taxonomy_galcat_page_template( $template_galcat ) {
    if ( is_tax( 'galcat' )  ) {
      $new_template_galcat = get_template_directory() . '/templates/taxonomy-galcat.php';
      if ( '' != $new_template_galcat ) {
        return $new_template_galcat ;
      }
    }
    return $template_galcat;
  }

/**
 * @name Latest News
 * @package News Plugin
 */

add_filter( 'single_template', 'get_news_post_type_template' );
  function get_news_post_type_template($single_news_template) {
    global $post;
      if ($post->post_type == 'news') {
        $single_news_template = get_template_directory() . '/templates/single-news.php';
      }
      return $single_news_template;
  }

add_filter( 'template_include', 'archive_news_page_template', 99 );
  function archive_news_page_template( $template_news ) {
    if ( is_post_type_archive( 'news' )  ) {
      $new_template_news = get_template_directory() . '/templates/archive-news.php';
      if ( '' != $new_template_news ) {
        return $new_template_news ;
      }
    }
    return $template_news;
  }

add_filter( 'template_include', 'taxonomy_news_page_template', 99 );
  function taxonomy_news_page_template( $template_newscat ) {
    if ( is_tax( 'newscat' )  ) {
      $new_template_newscat = get_template_directory() . '/templates/taxonomy-newscat.php';
      if ( '' != $new_template_newscat ) {
        return $new_template_newscat ;
      }
    }
    return $template_newscat;
  }

/**
 * @name Journal
 * @package Journal Plugin
 */

add_filter( 'single_template', 'get_journal_post_type_template' );
  function get_journal_post_type_template($single_journal_template) {
    global $post;
      if ($post->post_type == 'journal') {
        $single_journal_template = get_template_directory() . '/templates/single-journal.php';
      }
      return $single_journal_template;
  }

add_filter( 'template_include', 'archive_journal_page_template', 99 );
  function archive_journal_page_template( $template_journal ) {
    if ( is_post_type_archive( 'journal' )  ) {
      $new_template_journal = get_template_directory() . '/templates/archive-journal.php';
      if ( '' != $new_template_journal ) {
        return $new_template_journal ;
      }
    }
    return $template_journal;
  }

add_filter( 'template_include', 'taxonomy_jourcat_page_template', 99 );
  function taxonomy_jourcat_page_template( $template_journalcat ) {
    if ( is_tax( 'jourcat' )  ) {
      $new_template_journalcat = get_template_directory() . '/templates/taxonomy-jourcat.php';
      if ( '' != $new_template_journalcat ) {
        return $new_template_journalcat ;
      }
    }
    return $template_journalcat;
  }
  
  add_filter( 'template_include', 'taxonomy_jourkey_page_template', 99 );
  function taxonomy_jourkey_page_template( $template_journalcat ) {
    if ( is_tax( 'jourkey' )  ) {
      $new_template_journalcat = get_template_directory() . '/templates/taxonomy-jourkey.php';
      if ( '' != $new_template_journalcat ) {
        return $new_template_journalcat ;
      }
    }
    return $template_journalcat;
  }
  
/**
 * @name Press Release
 * @package Press Release Plugin
 */ 

add_filter( 'template_include', 'archive_press_page_template', 99 );
  function archive_press_page_template( $template_press ) {
    if ( is_post_type_archive( 'press' )  ) {
      $new_template_press = get_template_directory() . '/templates/archive-press.php';
      if ( '' != $new_template_press ) {
        return $new_template_press ;
      }
    }
    return $template_press;
  }
  
/**
 * @name Publication
 * @package Publication Plugin
 */ 

add_filter( 'single_template', 'get_publication_post_type_template' );
  function get_publication_post_type_template($single_publication_template) {
    global $post;
      if ($post->post_type == 'publication') {
        $single_publication_template = get_template_directory() . '/templates/single-publication.php';
      }
      return $single_publication_template;
  }
 
add_filter( 'template_include', 'archive_publication_page_template', 99 );
  function archive_publication_page_template( $template_publication ) {
    if ( is_post_type_archive( 'publication' )  ) {
      $new_template_publication = get_template_directory() . '/templates/archive-publication.php';
      if ( '' != $new_template_publication ) {
        return $new_template_publication ;
      }
    }
    return $template_publication;
  }

add_filter( 'template_include', 'taxonomy_pubcat_page_template', 99 );
  function taxonomy_pubcat_page_template( $template_pubcat ) {
    if ( is_tax( 'pubcat' )  ) {
      $new_template_pubcat = get_template_directory() . '/templates/taxonomy-pubcat.php';
      if ( '' != $new_template_pubcat ) {
        return $new_template_pubcat ;
      }
    }
    return $template_pubcat;
  }

/**
 * @name Staff Directory
 * @package Staff Directory Plugin
 */ 

add_filter( 'single_template', 'get_staff_post_type_template' );
  function get_staff_post_type_template($single_staff_template) {
    global $post;
      if ($post->post_type == 'staff') {
        $single_staff_template = get_template_directory() . '/templates/single-staff.php';
      }
      return $single_staff_template;
  }

add_filter( 'template_include', 'archive_staff_page_template', 99 );
  function archive_staff_page_template( $template_staff ) {
    if ( is_post_type_archive( 'staff' )  ) {
      $new_template_staff = get_template_directory() . '/templates/archive-staff.php';
      if ( '' != $new_template_staff ) {
        return $new_template_staff ;
      }
    }
    return $template_staff;
  }

add_filter( 'template_include', 'taxonomy_department_page_template', 99 );
  function taxonomy_department_page_template( $template_department ) {
    if ( is_tax( 'department' )  ) {
      $new_template_department = get_template_directory() . '/templates/taxonomy-department.php';
      if ( '' != $new_template_department ) {
        return $new_template_department ;
      }
    }
    return $template_department;
  }

add_filter( 'template_include', 'taxonomy_position_page_template', 99 );
  function taxonomy_position_page_template( $template_position ) {
    if ( is_tax( 'position' )  ) {
      $new_template_position = get_template_directory() . '/templates/taxonomy-position.php';
      if ( '' != $new_template_position ) {
        return $new_template_position ;
      }
    }
    return $template_position;
  }

/**
 * @name Video Collections
 * @package Video Plugin
 */

add_filter( 'single_template', 'get_video_post_type_template' );
  function get_video_post_type_template($single_video_template) {
    global $post;
      if ($post->post_type == 'video') {
        $single_video_template = get_template_directory() . '/templates/single-video.php';
      }
      return $single_video_template;
  }

add_filter( 'template_include', 'archive_video_page_template', 99 );
  function archive_video_page_template( $template_video ) {
    if ( is_post_type_archive( 'video' )  ) {
      $new_template_video = get_template_directory() . '/templates/archive-video.php';
      if ( '' != $new_template_video ) {
        return $new_template_video ;
      }
    }
    return $template_video;
  }

add_filter( 'template_include', 'taxonomy_vidcat_page_template', 99 );
  function taxonomy_vidcat_page_template( $template_vidcat ) {
    if ( is_tax( 'vidcat' )  ) {
      $new_template_vidcat = get_template_directory() . '/templates/taxonomy-vidcat.php';
      if ( '' != $new_template_vidcat ) {
        return $new_template_vidcat ;
      }
    }
    return $template_vidcat;
  }