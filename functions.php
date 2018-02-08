<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */

/**
 * favicon.ico for all pages
 * wp-login, dashboard, frontpage
 */

function add_favicon() {
  $favicon_url = get_stylesheet_directory_uri() . '/favicon.ico';
  echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

add_action( 'login_head', 'add_favicon' );
add_action( 'admin_head', 'add_favicon' );
add_action( 'wp_head', 'add_favicon' );

/**
 * Load CSS and Javascript
 * UIKit
 * Admin Scripts
 */

add_action( 'admin_enqueue_scripts', 'ukmtheme_wp_admin_scripts' );
  function ukmtheme_wp_admin_scripts() {
    wp_enqueue_script( 'admin', get_template_directory_uri() . '/js/admin.min.js', array(), '2017.3.x-20180208', true );
    wp_enqueue_style( 'admin', get_template_directory_uri() . '/css/admin.css', false, '2017.3.x-20180208' );
  }

add_action( 'wp_enqueue_scripts', 'ukmtheme_scripts' );
  function ukmtheme_scripts() {
    // CSS
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/lib/jquery/jquery.min.js', array(), '2017.3.x-20180208', false );
    wp_enqueue_script( 'uikit', get_template_directory_uri() . '/lib/uikit/js/uikit.min.js', array(), '2017.3.x-20180208', true );
    wp_enqueue_script( 'uikit-accordian', get_template_directory_uri() . '/lib/uikit/js/components/accordion.min.js', array(), '2017.3.x-20180208', true );
    wp_enqueue_script( 'uikit-slider', get_template_directory_uri() . '/lib/uikit/js/components/slider.min.js', array(), '2017.3.x-20180208', true );
    wp_enqueue_script( 'uikit-slideshow', get_template_directory_uri() . '/lib/uikit/js/components/slideshow.min.js', array(), '2017.3.x-20180208', true );
    wp_enqueue_script( 'uikit-slideset', get_template_directory_uri() . '/lib/uikit/js/components/slideset.min.js', array(), '2017.3.x-20180208', true );
    wp_enqueue_script( 'uikit-lightbox', get_template_directory_uri() . '/lib/uikit/js/components/lightbox.min.js', array(), '2017.3.x-20180208', true );
    wp_enqueue_script( 'uikit-search', get_template_directory_uri() . '/lib/uikit/js/components/search.min.js', array(), '2017.3.x-20180208', true );
    wp_enqueue_script( 'uikit-sticky', get_template_directory_uri() . '/lib/uikit/js/components/sticky.min.js', array(), '2017.3.x-20180208', true );
    wp_enqueue_script( 'jqnewsticker', get_template_directory_uri() . '/lib/jqnewsticker/newsTicker.js', array(), '2017.3.x-20180208', true );
    wp_enqueue_script( 'fitvidsjs', get_template_directory_uri() . '/lib/fitvids/jquery.fitvids.js', array(), '2017.3.x-20180208', true );
    wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/scripts.min.js', array(), '2017.3.x-20180208', true );
    // JS
    wp_enqueue_style( 'uikit', get_template_directory_uri() . '/lib/uikit/css/uikit.almost-flat.min.css', false, '2017.3.x-20180208' );
    wp_enqueue_style( 'uikit-accordian', get_template_directory_uri() . '/lib/uikit/css/components/accordion.almost-flat.min.css', false, '2017.3.x-20180208' );
    wp_enqueue_style( 'uikit-slider', get_template_directory_uri() . '/lib/uikit/css/components/slider.almost-flat.min.css', false, '2017.3.x-20180208' );
    wp_enqueue_style( 'uikit-slideshow', get_template_directory_uri() . '/lib/uikit/css/components/slideshow.almost-flat.min.css', false, '2017.3.x-20180208' );
    wp_enqueue_style( 'uikit-slidenav', get_template_directory_uri() . '/lib/uikit/css/components/slidenav.almost-flat.min.css', false, '2017.3.x-20180208' );
    wp_enqueue_style( 'uikit-search', get_template_directory_uri() . '/lib/uikit/css/components/search.almost-flat.min.css', false, '2017.3.x-20180208' );
    wp_enqueue_style( 'uikit-sticky', get_template_directory_uri() . '/lib/uikit/css/components/sticky.almost-flat.min.css', false, '2017.3.x-20180208' );
    wp_enqueue_style( 'lato-font', 'https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i', false, '2017.3.x-20180208' );
    wp_enqueue_style( 'style', get_stylesheet_uri(), false, '2017.3.x-20180208' );
  }

/**
 * Semakan versi theme terkini secara automatik
 * Jangan tukar nama folder theme "ukmtheme-master"
 */

require( get_template_directory() . '/lib/theme-updates/theme-update-checker.php' );
  new ThemeUpdateChecker(
    'ukm-twentyseventeen-master',
    'https://raw.githubusercontent.com/mmUKM/ukm-twentyseventeen/master/package.json'
);

/**
 * Tetapan pada theme
 * html5 support, post format, post thumbnail, automatic-feed-links, css, javascript
 * paparan admin bar pada muka hadapan disorokkan
 * saiz logo mengikut saiz lebar theme sekarang ialah 340x100 piksel
 */

add_action( 'after_setup_theme', 'ukmtheme_setup' );
  function ukmtheme_setup() {

    add_theme_support( 'title-tag' );
    add_theme_support( 'html5', array( 'search-form' ) );
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 145, 145, true );
    add_image_size( 'latest_news_thumbnail', 600, 480, true );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    load_theme_textdomain( 'ukmtheme', get_template_directory() . '/lang' );
    register_nav_menus( array(
      'top'       => __( 'Top Navigation', 'ukmtheme' ),
      'main'      => __( 'Main Navigation', 'ukmtheme' ),
      'footer'    => __( 'Footer Navigation', 'ukmtheme' ),
    ) );
    add_filter( 'show_admin_bar', '__return_false' );
  }

add_filter( 'wp_nav_menu_items', 'ukmtheme_home_link', 10, 2 );
  function ukmtheme_home_link ( $items, $args ) {
      if (is_single() && $args->menu->main == 'main') {
        $items .= '<li>'. __( 'Home','ukmtheme' ).' </li>';
      }
      return $items;
  }

/**
 * Fuction luaran dari folder /inc/
 * Post type, metabox, widgets dll.
 * Comment pautan yang tidak diperlukan sekiranya tidak perlu
 */

add_action( 'after_setup_theme', 'ukmtheme_module' );
  if (!function_exists('ukmtheme_module')) {
    function ukmtheme_module() {
      require( get_template_directory() . '/inc/theme-archive-links.php' );
      require( get_template_directory() . '/inc/theme-customizer.php' );
      require( get_template_directory() . '/inc/theme-metabox.php' );
      require( get_template_directory() . '/inc/theme-walker-menu.php' );
      require( get_template_directory() . '/inc/theme-login.php' );
      require( get_template_directory() . '/inc/theme-plugins.php' );
      require( get_template_directory() . '/inc/theme-post-type.php' );
      require( get_template_directory() . '/inc/theme-sitemap.php' );
      require( get_template_directory() . '/inc/widget-address-with-social.php' );
      require( get_template_directory() . '/inc/widget-appreciation.php' );
      require( get_template_directory() . '/inc/widget-event.php' );
      require( get_template_directory() . '/inc/widget-news-list.php' );
      //require( get_template_directory() . '/inc/widget-news-thumbnail.php' );
      require( get_template_directory() . '/inc/widget-operating-hour.php' );
      //require( get_template_directory() . '/inc/widget-youtube.php' );
      require( get_template_directory() . '/inc/widget-visitor-counter.php' );
    }
  }

remove_filter( 'term_description','wpautop' );

/**
 * Excerpt
 * Replaces the excerpt "more" text by a link
 * Adjust excerpt lenght
 * @link http://codex.wordpress.org/Function_Reference/the_excerpt
 */

add_filter( 'excerpt_more', 'ukmtheme_excerpt_more' );
  function ukmtheme_excerpt_more($more) {
    global $post;
      return '<a class="ut-readmore" href="'. get_permalink($post->ID) . '">'. __( ' ...', 'ukmtheme' ) . '</a>';
  }

add_filter( 'excerpt_length', 'ukmtheme_excerpt_length', 999 );
  function ukmtheme_excerpt_length( $length ) {
    return 25;
  }

/**
 * Add class to edit post link
 * @link http://codex.wordpress.org/Function_Reference/edit_post_link
 */

function ukmtheme_custom_edit_post_link($output) {
  $output = str_replace('class="post-edit-link"', 'class="post-edit-link"', $output);
    return $output;
}
add_filter( 'edit_post_link', 'ukmtheme_custom_edit_post_link' );

/**
 * Add extra mimetype
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
 */

add_filter( 'upload_mimes','add_custom_mime_types' );
  function add_custom_mime_types($mimes){
    return array_merge($mimes,array (
      'ac3' => 'audio/ac3',
      'mpa' => 'audio/MPA',
      'flv' => 'video/x-flv',
      'svg' => 'image/svg+xml'
    ));
  }

/**
 * Filter Search
 * filter by post type
 */

function ukmtheme_filter_search($query) {
  if ($query->is_search) {
    $query->set('post_type', array( 'page', 'staff', 'gallery', 'publication', 'news', 'event', 'expertise', 'press', 'video' ));
  };

  return $query;
};
add_filter('pre_get_posts', 'ukmtheme_filter_search');

/**
 * Register Sidebar
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

add_action( 'widgets_init', 'ukmtheme_widgets_init' );
if (!function_exists('ukmtheme_widgets_init')) {
  function ukmtheme_widgets_init() {

    register_sidebar( array(
      'name'            => __( 'Page Sidebar', 'ukmtheme' ),
      'id'              => 'sidebar-1',
      'description'     => __( 'Appears in frontpage, pages, posts and post type.', 'ukmtheme' ),
      'before_widget'   => '<aside class="widgets padding-bottom">',
      'after_widget'    => '</aside>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Frontpage: One Column', 'ukmtheme' ),
      'id'              => 'sidebar-2',
      'description'     => __( 'Advanced use with SiteOrigin page builder/widget bundle', 'ukmtheme' ),
      'before_widget'   => '<div class="column"><div class="large-12-12">',
      'after_widget'    => '</div></div>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Frontpage: Two Column', 'ukmtheme' ),
      'id'              => 'sidebar-3',
      'description'     => __( 'Appears when using the optional Front Page', 'ukmtheme' ),
      'before_widget'   => '<div class="uk-width-medium-1-2" style="min-height: 100px;">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Frontpage: Three Column', 'ukmtheme' ),
      'id'              => 'sidebar-4',
      'description'     => __( 'Appears when using the optional Front Page', 'ukmtheme' ),
      'before_widget'   => '<div class="uk-width-medium-1-3" style="min-height: 100px;">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Frontpage: Four Column', 'ukmtheme' ),
      'id'              => 'sidebar-5',
      'description'     => __( 'Appears when using the optional Front Page', 'ukmtheme' ),
      'before_widget'   => '<div class="uk-width-medium-1-4" style="min-height: 100px;">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Footer: Five Column', 'ukmtheme' ),
      'id'              => 'sidebar-6',
      'description'     => __( 'Five Column footer widgets. Dont put more than five widget.', 'ukmtheme' ),
      'before_widget'   => '<div class="uk-width-medium-1-5" style="min-height: 100px;">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="widget-title uk-hidden">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Footer: Four Column', 'ukmtheme' ),
      'id'              => 'sidebar-7',
      'description'     => __( 'Four Column footer widgets. Dont put more than four widget.', 'ukmtheme' ),
      'before_widget'   => '<div class="uk-width-medium-1-4" style="min-height: 100px;">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="widget-title uk-hidden">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Footer: Three Column', 'ukmtheme' ),
      'id'              => 'sidebar-8',
      'description'     => __( 'Three Column footer widgets. Dont put more than three widget.', 'ukmtheme' ),
      'before_widget'   => '<div class="uk-width-medium-1-3" style="min-height: 100px;">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="widget-title uk-hidden">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Footer: Two Column', 'ukmtheme' ),
      'id'              => 'sidebar-9',
      'description'     => __( 'Two Column footer widgets. Dont put more than two widget.', 'ukmtheme' ),
      'before_widget'   => '<div class="uk-width-medium-1-2" style="min-height: 100px;">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="widget-title uk-hidden">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Footer: One Column', 'ukmtheme' ),
      'id'              => 'sidebar-10',
      'description'     => __( 'One Column footer widgets. Customise using siteorigin widgets', 'ukmtheme' ),
      'before_widget'   => '<div class="uk-width-medium-1-1" style="min-height: 100px;">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3 class="widget-title uk-hidden">',
      'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Off-canvas Widget: Language', 'ukmtheme' ),
      'id'              => 'sidebar-11',
      'description'     => __( 'Off-canvas sidebar widget language', 'ukmtheme' ),
      'before_widget'   => '<div class="off-canvas-widget">',
      'after_widget'    => '</div>',
      'before_title'    => '<h4>',
      'after_title'     => '</h4>',
    ) );

    register_sidebar( array(
      'name'            => __( 'Off-canvas Widget: Search', 'ukmtheme' ),
      'id'              => 'sidebar-12',
      'description'     => __( 'Off-canvas sidebar widget search', 'ukmtheme' ),
      'before_widget'   => '<div class="off-canvas-widget">',
      'after_widget'    => '</div>',
      'before_title'    => '<h4>',
      'after_title'     => '</h4>',
    ) );
  }
}

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 *
 * @param string $form
 * @return string
 */
function ukmtheme_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="uk-form searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <button class="uk-button uk-button-primary" type="submit" id="searchsubmit" >'. esc_attr__( 'Search' ) .'</button>
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'ukmtheme_search_form' );

/**
 * Custom Post Type Feed
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-add-custom-post-types-to-your-main-wordpress-rss-feed/
 */

function ukmtheme_feed_request($qv) {
  if (isset($qv['feed']) && !isset($qv['post_type']))
    $qv['post_type'] = array( 'news', 'event' );
  return $qv;
}
add_filter( 'request', 'ukmtheme_feed_request' );

/**
 * Contact form 7
 * Add class "form"
 */

add_filter( 'wpcf7_form_class_attr', 'ukmtheme_custom_form_class_attr' );

function ukmtheme_custom_form_class_attr( $class ) {
  $class .= ' uk-form';
  return $class;
}

/**
 * Enabling HTML in your category & taxonomy descriptions
 * @link http://docs.appthemes.com/tutorials/allow-html-in-wordpress-category-taxonomy-descriptions/
 */

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

/**
 * custom taxonomy pagination
 */

$option_posts_per_page = get_option( 'posts_per_page' );

add_action( 'init', 'ukmtheme_posts_per_taxonomy', 0);
  function ukmtheme_posts_per_taxonomy() {
    add_filter( 'option_posts_per_page', 'ukmtheme_option_posts_per_taxonomy' );
  }

  function ukmtheme_option_posts_per_taxonomy( $value ) {
    global $option_posts_per_page;
    if ( is_tax( array( 'pubcat', 'newscat', 'galcat', 'vidcat', 'jourcat' )) ) {
      return 10;
    } else {
        return $option_posts_per_page;
    }
  }

add_action( 'init', 'ukmtheme_posts_per_archive', 0 );
  function ukmtheme_posts_per_archive() {
    add_filter( 'option_posts_per_page', 'ukmtheme_option_posts_per_archive' );
  }

  function ukmtheme_option_posts_per_archive( $value ) {
    global $option_posts_per_page;
    if ( is_post_type_archive( array( 'news', 'gallery', 'video' )) ) {
      return 10;
    } else {
        return $option_posts_per_page;
    }
  }
