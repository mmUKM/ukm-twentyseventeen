<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * 
 * favicon.ico for all pages
 * wp-login, dashboard, frontpage
 */

function ukmtheme_favicon() {
    echo '<link rel="shortcut icon" href="' . get_stylesheet_directory_uri() . '/favicon.ico" />';
}
add_action( 'login_head', 'ukmtheme_favicon' );
add_action( 'admin_head', 'ukmtheme_favicon' );
add_action( 'wp_head', 'ukmtheme_favicon' );

/**
 * Load CSS and Javascript
 * UIKit
 * Admin Scripts
 */

add_action( 'admin_enqueue_scripts', 'ukmtheme_wp_admin_scripts' );
    function ukmtheme_wp_admin_scripts() {
        wp_enqueue_script( 'admin', get_template_directory_uri() . '/js/admin.min.js', array(), '2017.20220701', true );
        wp_enqueue_style( 'admin', get_template_directory_uri() . '/css/admin.css', false, '2017.20220701' );
    }

add_action( 'wp_enqueue_scripts', 'ukmtheme_scripts' );
    function ukmtheme_scripts() {
        // CSS
        wp_deregister_script( 'jquery' );
        wp_enqueue_script( 'jquery', get_template_directory_uri() . '/packages/jquery/jquery-3.6.0.min.js', array(), '3.6.0', false );
        wp_enqueue_script( 'uikit', get_template_directory_uri() . '/packages/uikit3/js/uikit.min.js', array(), '2017.20220701', true );
        wp_enqueue_script( 'uikit-icons', get_template_directory_uri() . '/packages/uikit3/js/uikit-icons.min.js', array(), '2017.20220701', true );
        wp_enqueue_script( 'fitvidsjs', get_template_directory_uri() . '/packages/fitvids/jquery.fitvids.js', array(), '2017.20220701', true );
        wp_enqueue_script( 'ytv', get_template_directory_uri() . '/packages/ytv/src/ytv.js', array(), '2017.20220701', true );
        wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/src/scripts.js', array(), '2017.20220701', true );
        // JS
        wp_enqueue_style( 'uikit', get_template_directory_uri() . '/packages/uikit3/css/uikit.min.css', false, '2017.20220701' );
        wp_enqueue_style( 'ytv', get_template_directory_uri() . '/packages/ytv/src/ytv.css', false, '2017.20220701' );
        wp_enqueue_style( 'poppins-font', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap', false, '2017.20220701' );
        wp_enqueue_style( 'style', get_stylesheet_uri(), false, '2017.20220701' );
    }

/**
 * Semakan versi theme terkini secara automatik
 * Jangan tukar nama folder theme "ukmtheme-master"
 */

require( get_template_directory() . '/packages/theme-updates/theme-update-checker.php' );
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
        set_post_thumbnail_size( 800, 450, true );
        add_image_size( 'news_thumbnail', 800, 450, true );
        remove_action( 'wp_head', 'wp_generator' );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        load_theme_textdomain( 'ukmtheme', get_template_directory() . '/languages' );
        register_nav_menus( array(
            'top'       => __( 'Top Navigation', 'ukmtheme' ),
            'main'      => __( 'Main Navigation', 'ukmtheme' ),
            'footer'    => __( 'Footer Navigation', 'ukmtheme' ),
        ) );
        add_filter( 'show_admin_bar', '__return_false' );
    }

/**
 * Fuction luaran dari folder /includes/
 * Post type, metabox, widgets dll.
 * Comment pautan yang tidak diperlukan sekiranya tidak perlu
 */

function ukmtheme_module() {
    require( get_template_directory() . '/includes/theme-archive-links.php' );
    require( get_template_directory() . '/includes/theme-customizer.php' );
    require( get_template_directory() . '/includes/theme-metabox.php' );
    require( get_template_directory() . '/includes/theme-walker-menu.php' );
    require( get_template_directory() . '/includes/theme-login.php' );
    require( get_template_directory() . '/includes/theme-plugins.php' );
    require( get_template_directory() . '/includes/theme-post-type.php' );
    require( get_template_directory() . '/includes/theme-sitemap.php' );
    require( get_template_directory() . '/includes/widget-address-with-social.php' );
    require( get_template_directory() . '/includes/widget-appreciation.php' );
    require( get_template_directory() . '/includes/widget-event.php' );
    require( get_template_directory() . '/includes/widget-news-list.php' );
    //require( get_template_directory() . '/includes/widget-news-thumbnail.php' );
    require( get_template_directory() . '/includes/widget-operating-hour.php' );
    //require( get_template_directory() . '/includes/widget-youtube.php' );
    require( get_template_directory() . '/includes/widget-visitor-counter.php' );
}
add_action( 'after_setup_theme', 'ukmtheme_module' );

remove_filter( 'term_description','wpautop' );

/**
 * Excerpt
 * Replaces the excerpt "more" text by a link
 * Adjust excerpt lenght
 * @link http://codex.wordpress.org/Function_Reference/the_excerpt
 */

add_filter( 'excerpt_more', 'ukmtheme_excerpt_more' );
    function ukmtheme_excerpt_more( $more ) {
        global $post;
            return '<a class="ut-readmore" href="'. get_permalink( $post->ID ) . '">'. __( ' ...', 'ukmtheme' ) . '</a>';
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
    $output = str_replace( 'class="post-edit-link"', 'class="post-edit-link"', $output );
        return $output;
}
add_filter( 'edit_post_link', 'ukmtheme_custom_edit_post_link' );

/**
 * Add extra mimetype
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
 */

add_filter( 'upload_mimes','add_custom_mime_types' );
    function add_custom_mime_types( $mimes ) {
        return array_merge( $mimes, array (
            'ac3' => 'audio/ac3',
            'mpa' => 'audio/MPA',
            'flv' => 'video/x-flv',
            'svg' => 'image/svg+xml'
        ));
    }

/**
 * Register Sidebar
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

function ukmtheme_widgets_init() {

    register_sidebar( array(
        'name'            => __( 'FRONTPAGE: LAYOUT BUILDER', 'ukmtheme' ),
        'id'              => 'sidebar-2',
        'description'     => __( 'Gunakan widget Page Builder by SiteOrigin atau Elementor', 'ukmtheme' ),
        'before_widget'   => '<div>',
        'after_widget'    => '</div>',
        'before_title'    => '<h3 class="uk-hidden">',
        'after_title'     => '</h3>',
    ) );

    register_sidebar( array(
        'name'            => __( 'OFF CANVAS WIDGET', 'ukmtheme' ),
        'id'              => 'sidebar-12',
        'description'     => __( 'Off-canvas sidebar widget language', 'ukmtheme' ),
        'before_widget'   => '<div>',
        'after_widget'    => '</div>',
        'before_title'    => '<h4>',
        'after_title'     => '</h4>',
    ) );
}
add_action( 'widgets_init', 'ukmtheme_widgets_init' );

function ukmtheme_extra_widgets_init() {

    if ( get_theme_mod( 'ukmtheme_frontpage_two_box' ) == 1 ) {
        register_sidebar( array(
            'name'            => __( 'FRONTPAGE: 2 BLOCK', 'ukmtheme' ),
            'id'              => 'sidebar-3',
            'description'     => __( '2 blok widget di frontpage di bawah berita.', 'ukmtheme' ),
            'before_widget'   => '<div><div class="uk-card uk-card-default uk-padding-small">',
            'after_widget'    => '</div></div>',
            'before_title'    => '<h3 class="uk-hidden">',
            'after_title'     => '</h3>',
        ) );
    }

    if ( get_theme_mod( 'ukmtheme_frontpage_three_box' ) == 1 ) {
        register_sidebar( array(
            'name'            => __( 'FRONTPAGE: 3 BLOCK', 'ukmtheme' ),
            'id'              => 'sidebar-4',
            'description'     => __( '3 blok widget di frontpage di bawah berita.', 'ukmtheme' ),
            'before_widget'   => '<div><div class="uk-card uk-card-default uk-padding-small">',
            'after_widget'    => '</div></div>',
            'before_title'    => '<h3 class="uk-hidden">',
            'after_title'     => '</h3>',
        ) );
    }

    if ( get_theme_mod( 'ukmtheme_footer_widget_basic' ) == 1 ) {
        register_sidebar( array(
            'name'            => __( 'FOOTER', 'ukmtheme' ),
            'id'              => 'sidebar-8',
            'description'     => __( 'Masukkan 3 widget sahaja', 'ukmtheme' ),
            'before_widget'   => '<div>',
            'after_widget'    => '</div>',
            'before_title'    => '<h3 class="uk-hidden">',
            'after_title'     => '</h3>',
        ) );
    }
}
add_action( 'widgets_init', 'ukmtheme_extra_widgets_init' );

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
        $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
        <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
        <input class="uk-input uk-form-width-medium" type="text" value="' . get_search_query() . '" name="s" id="s" />
        <button class="uk-button uk-button-default" type="submit" id="searchsubmit" >'. esc_attr__( 'Search' ) .'</button>
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
    if ( isset($qv['feed']) && !isset( $qv['post_type'] ) )
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
        if ( is_tax( array( 'newscat', 'galcat' )) ) {
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