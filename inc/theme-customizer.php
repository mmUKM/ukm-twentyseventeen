<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * 
 * New theme customizer for UKMTheme
 * ==================================
 * 01. Colour Options
 * 02. Frontpage Layout
 * 03. Language Switcher
 * 04. Social Media Links
 */

function ukmtheme_customizer( $wp_customize ) {

// LOGO

    $wp_customize->add_section( 'ukmtheme_theme_logo', array(
        'title' => __( 'Logo & Title', 'ukmtheme' ),
        'priority' => 100,
    ) );

    $wp_customize->add_setting( 'ukmtheme_logo_image', array(
        'default' => null
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ukmtheme_logo_image', array(
        'label'		=> __( 'Custom Site Logo', 'ukmtheme' ),
        'description' => __( 'Image or vector file size 399x100 pixel. Use PNG or SVG file only', 'ukmtheme' ),
        'section'	=> 'ukmtheme_theme_logo',
        'settings'	=> 'ukmtheme_logo_image',
        'priority'	=> 20
    ) ) );

    $wp_customize->add_setting( 'ukmtheme_title_size', array( 
        'default' => null 
    ) );

    $wp_customize->add_control( 'ukmtheme_title_size', array(
        'label'       => __( 'Title Size', 'ukmtheme' ),
        'description' => __( 'Choose this value to suite your needs', 'ukmtheme'),
        'section'     => 'ukmtheme_theme_logo',
        'priority'    => 30,
        'type'        => 'select',
        'choices'     => array(
            null => __( 'Default', 'ukmtheme'),
            '15px'  => '15px',
            '16px'  => '16px',
            '17px'  => '17px',
            '18px'  => '18px',
            '19px'  => '19px',
            '20px'  => '20px'
            )
    ) );

    $wp_customize->add_setting( 'ukmtheme_hide_title', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_hide_title', array(
        'label'       => __( 'Hide Site Title', 'ukmtheme' ),
        'description' => __( 'Hide my site title', 'ukmtheme'),
        'section'     => 'ukmtheme_theme_logo',
        'priority'    => 40,
        'type'        => 'checkbox'
    ) );

    // CUSTOM HEADER
    $wp_customize->add_setting( 'ukmtheme_helpdesk_header', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_helpdesk_header', array(
        'label'       => __( 'CUSTOM HEADER', 'ukmtheme' ),
        'description' => __( 'Custom header with additional image', 'ukmtheme'),
        'section'     => 'ukmtheme_theme_logo',
        'priority'    => 40,
        'type'        => 'checkbox'
    ) );
    // CUSTOM HEADER IMAGE
    $wp_customize->add_setting( 'ukmtheme_custom_header_image', array(
        'default' => null
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ukmtheme_custom_header_image', array(
        'label'		=> __( 'Custom Header Image', 'ukmtheme' ),
        'description' => __( 'Image size 150 x 120px', 'ukmtheme' ),
        'section'	=> 'ukmtheme_theme_logo',
        'settings'	=> 'ukmtheme_custom_header_image',
        'priority'	=> 40
    ) ) );

    // PENGUMUMAN
    $wp_customize->add_setting( 'ukmtheme_frontpage_pengumuman', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_pengumuman', array(
        'label'         => __( 'PENGUMUMAN', 'ukmtheme' ),
        'description'   => 'Widget Pengumuman. Buat satu kategori di news "pengumuman".',
        'section'       => 'ukmtheme_frontpage_layout',
        'priority'      => 10,
        'type'          => 'checkbox'
    ) );

    // LAYOUT MUKA HADAPAN

    $wp_customize->add_section( 'ukmtheme_frontpage_layout' , array(
        'title'      => __( 'Frontpage', 'ukmtheme' ),
        'priority'   => 100,
    ) );

    // SMALL SLIDESHOW

    $wp_customize->add_setting( 'ukmtheme_resize_slideshow', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_resize_slideshow', array(
        'label'       => __( 'SMALL SIZE SLIDESHOW', 'ukmtheme' ),
        'description' => __( 'Papar slideshow dengan saiz 960px', 'ukmtheme'),
        'section'     => 'ukmtheme_frontpage_layout',
        'priority'    => 10,
        'type'        => 'checkbox'
    ) );

    // BERITA VERSI THUMBNAIL
    $wp_customize->add_setting( 'ukmtheme_frontpage_news_thumbnail', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_news_thumbnail', array(
        'label'     => __( 'BERITA VERSI THUMBNAIL', 'ukmtheme' ),
        'description'   => 'Widget asas bagi paparan berita dalam bentuk thumbnail. Tandakan salah satu versi sahaja',
        'section'   => 'ukmtheme_frontpage_layout',
        'priority'  => 10,
        'type'      => 'checkbox'
    ) );

    // BERITA VERSI SLIDER
    $wp_customize->add_setting( 'ukmtheme_frontpage_basic', array( 
        'default' => 1 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_basic', array(
        'label'     => __( 'BERITA VERSI SLIDER', 'ukmtheme' ),
        'description'   => 'Widget asas bagi paparan berita dalam bentuk slider. Tandakan salah satu versi sahaja',
        'section'   => 'ukmtheme_frontpage_layout',
        'priority'  => 10,
        'type'      => 'checkbox'
    ) );

    // BERITA
    $wp_customize->add_setting( 'ukmtheme_frontpage_news_title_edit', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_news_title_edit', array(
        'label'     => __( 'TUKAR TAJUK BERITA TERKINI', 'ukmtheme' ),
        'description'   => 'Widget asas bagi paparan berita terkini',
        'section'   => 'ukmtheme_frontpage_layout',
        'priority'  => 10,
        'type'      => 'checkbox'
    ) );

    // NEWS TITLE
    $wp_customize->add_setting( 'ukmtheme_frontpage_news_title', array( 
        'default' => 'BERITA TERKINI' 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_news_title', array(
        'label'     => 'Tukar tajuk kepada yang lain.',
        'section'   => 'ukmtheme_frontpage_layout',
        'priority'  => 10,
        'type'      => 'text'
    ) );

    // JUMLAH PAPARAN
    $wp_customize->add_setting( 'ukmtheme_frontpage_news', array( 
        'default' => 9 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_news', array(
        'label'     => 'Jumlah untuk dipaparkan',
        'section'   => 'ukmtheme_frontpage_layout',
        'priority'  => 10,
        'type'      => 'text'
    ) );

    // PAGE BUILDER
    $wp_customize->add_setting( 'ukmtheme_frontpage_one_box', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_one_box', array(
        'label'         => __( 'PAGE BUILDER', 'ukmtheme' ),
        'description'   => 'Tandakan ini untuk menggunakan sepenuhnya plugin Page Builder by SiteOrigin',
        'section'       => 'ukmtheme_frontpage_layout',
        'priority'      => 10,
        'type'          => 'checkbox'
    ) );

    // PENGUMUMAN
    $wp_customize->add_setting( 'ukmtheme_frontpage_pengumuman', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_pengumuman', array(
        'label'         => __( 'PENGUMUMAN', 'ukmtheme' ),
        'description'   => 'Widget Pengumuman. Buat satu kategori di news "pengumuman".',
        'section'       => 'ukmtheme_frontpage_layout',
        'priority'      => 10,
        'type'          => 'checkbox'
    ) );

    // SLIDESET
    $wp_customize->add_setting( 'ukmtheme_frontpage_slideset', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_slideset', array(
        'label'         => __( 'SLIDESET', 'ukmtheme' ),
        'description'   => 'Empat kotak slide di bawah Slideshow',
        'section'       => 'ukmtheme_frontpage_layout',
        'priority'      => 10,
        'type'          => 'checkbox'
    ) );

    // FRONTPAGE 2 BLOCK
    $wp_customize->add_setting( 'ukmtheme_frontpage_two_box', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_two_box', array(
        'label'         => __( 'FRONTPAGE WIDGET 2 BLOCK', 'ukmtheme' ),
        'description'   => '2 kotak widget frontpage',
        'section'       => 'ukmtheme_frontpage_layout',
        'priority'      => 10,
        'type'          => 'checkbox'
    ) );

    // FRONTPAGE 3 BLOCK
    $wp_customize->add_setting( 'ukmtheme_frontpage_three_box', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_three_box', array(
        'label'         => __( 'FRONTPAGE WIDGET 3 BLOCK', 'ukmtheme' ),
        'description'   => '3 kotak widget frontpage',
        'section'       => 'ukmtheme_frontpage_layout',
        'priority'      => 10,
        'type'          => 'checkbox'
    ) );

    // FRONTPAGE DISPLAY TAB
    $wp_customize->add_setting( 'ukmtheme_frontpage_tabber', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_tabber', array(
        'label'         => __( 'FRONTPAGE TAB', 'ukmtheme' ),
        'description'   => 'Paparan widget dalam bentuk tab. Isi kandungan di Dashbord Tab Widget',
        'section'       => 'ukmtheme_frontpage_layout',
        'priority'      => 10,
        'type'          => 'checkbox'
    ) );

    // FRONTPAGE YOUTUBE PLAYLIST
    $wp_customize->add_setting( 'ukmtheme_frontpage_ytv', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_ytv', array(
        'label'         => __( 'YOUTUBE PLAYLIST', 'ukmtheme' ),
        'description'   => 'Paparan playlist YouTube (Ini adalah percubaan di laman web PTM)',
        'section'       => 'ukmtheme_frontpage_layout',
        'priority'      => 10,
        'type'          => 'checkbox'
    ) );

    $wp_customize->add_setting( 'ukmtheme_frontpage_ytv_user', array( 
        'default' => 'user&#58;&nbsp;&#39;ptmukm&#39;'
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_ytv_user', array(
        'label'     => 'USERNAME ATAU ID',
        'description'   => 'Semak sama ada channel anda menggunakan username atau ID. Ubah user&#58;&nbsp;&#39;namauser&#39; kepada channelId&#58;&nbsp;&#39;UCXXXXXXXXXXXXXXXXXXXXXX&#39; ',
        'section'   => 'ukmtheme_frontpage_layout',
        'priority'  => 10,
        'type'      => 'text'
    ) );

    $wp_customize->add_setting( 'ukmtheme_frontpage_ytv_title_edit', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_ytv_title_edit', array(
        'label'         => __( 'TUKAR NAMA CHANNEL', 'ukmtheme' ),
        'description'   => 'Paparan playlist YouTube (Ini adalah percubaan di laman web PTM)',
        'section'       => 'ukmtheme_frontpage_layout',
        'priority'      => 10,
        'type'          => 'checkbox'
    ) );

    $wp_customize->add_setting( 'ukmtheme_frontpage_ytv_title', array( 
        'default' => 'PTMUKM-TV'
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_ytv_title', array(
        'label'     => 'NAMA CHANNEL',
        'section'   => 'ukmtheme_frontpage_layout',
        'priority'  => 10,
        'type'      => 'text'
    ) );


    // FOOTER SECTION
    $wp_customize->add_section( 'ukmtheme_footer_widgets' , array(
    'title'      => __( 'Footer', 'ukmtheme' ),
    'priority'   => 100,
    ) );

    // Footer widgets: one column
    $wp_customize->add_setting( 'ukmtheme_footer_widget_one', array(
        'default' => 0
    ) );

    $wp_customize->add_control( 'ukmtheme_footer_widget_one', array(
        'label'         => __( 'FOOTER BUILDER', 'ukmtheme' ),
        'description'   => 'Tandakan ini untuk menggunakan sepenuhnya plugin Page Builder by SiteOrigin',
        'section'       => 'ukmtheme_footer_widgets',
        'priority'      => 10,
        'type'          => 'checkbox'
    ) );

    // Footer widgets: three column
    $wp_customize->add_setting( 'ukmtheme_footer_widget_three', array(
        'default' => 0
    ) );

    $wp_customize->add_control( 'ukmtheme_footer_widget_three', array(
        'label'     => __( 'BASIC FOOTER', 'ukmtheme' ),
        'description'   => 'Paparan asas 3 blok footer',
        'section'   => 'ukmtheme_footer_widgets',
        'priority'  => 10,
        'type'      => 'checkbox'
    ) );

    /**
     * Social media links
     * link in widgets with sidebar icon
     */
    $wp_customize->add_section( 'ukmtheme_social_media_links' , array(
        'title'      => __( 'Social Media Links', 'ukmtheme' ),
        'priority'   => 100,
    ) );

    // Facebook
    $wp_customize->add_setting( 'ukmtheme_social_media_facebook', array( 
        'default' => 'https://www.facebook.com/UKMOfficial'
    ) );

    $wp_customize->add_control( 'ukmtheme_social_media_facebook', array(
        'label'     => __( 'Facebook', 'ukmtheme' ),
        'section'   => 'ukmtheme_social_media_links',
        'priority'  => 10,
        'type'      => 'text'
    ) );

    // Instagram
    $wp_customize->add_setting( 'ukmtheme_social_media_instagram', array( 
        'default' => 'https://www.instagram.com/ukminsta'
    ) );

    $wp_customize->add_control( 'ukmtheme_social_media_instagram', array(
        'label'     => __( 'Instagram', 'ukmtheme' ),
        'section'   => 'ukmtheme_social_media_links',
        'priority'  => 10,
        'type'      => 'text'
    ) );

    // Twitter
    $wp_customize->add_setting( 'ukmtheme_social_media_twitter', array( 
        'default' => 'https://twitter.com/ukmtwit'
    ) );

    $wp_customize->add_control( 'ukmtheme_social_media_twitter', array(
        'label'     => __( 'Twitter', 'ukmtheme' ),
        'section'   => 'ukmtheme_social_media_links',
        'priority'  => 10,
        'type'      => 'text'
    ) );

    // Youtube
    $wp_customize->add_setting( 'ukmtheme_social_media_youtube', array( 
        'default' => 'https://www.youtube.com/user/ukmwebtv'
    ) );

    $wp_customize->add_control( 'ukmtheme_social_media_youtube', array(
        'label'     => __( 'Youtube', 'ukmtheme' ),
        'section'   => 'ukmtheme_social_media_links',
        'priority'  => 10,
        'type'      => 'text'
    ) );

    /**
     * LANGUANGE SWITCHER
     * - POLYLANG
     * - GOOGLE TRANSLATE
     */

    $wp_customize->add_section( 'ukmtheme_language_switcher' , array(
        'title'      => __( 'Language Switcher', 'ukmtheme' ),
        'priority'   => 100,
    ) );

    // Polylang Language Switcher
    $wp_customize->add_setting( 'ukmtheme_polylang_switcher', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_polylang_switcher', array(
        'label'     => __( 'POLYLANG', 'ukmtheme' ),
        'description'   => 'Jangan tandakan sekiranya plugin tidak dipasang',
        'section'   => 'ukmtheme_language_switcher',
        'priority'  => 10,
        'type'      => 'checkbox'
    ) );

    // Google Language Switcher
    $wp_customize->add_setting( 'ukmtheme_google_switcher', array( 
        'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_google_switcher', array(
        'label'     => __( 'GOOGLE TRANSLATE', 'ukmtheme' ),
        'description'   => 'Jangan tandakan sekiranya plugin tidak dipasang',
        'section'   => 'ukmtheme_language_switcher',
        'priority'  => 10,
        'type'      => 'checkbox'
    ) );

    $wp_customize->add_section( 'ukmtheme_visitor_counter' , array(
    'title'      => __( 'Last Update', 'ukmtheme' ),
    'priority'   => 100,
    ) );

    $wp_customize->add_setting( 'ukmtheme_date_of_update', array( 
        'default' => '20/02/2020'
    ) );

    $wp_customize->add_control( 'ukmtheme_date_of_update', array(
        'label'     => __( 'Date of Update', 'ukmtheme' ),
        'description' => __( 'Date of update format dd/mm/yyyy', 'ukmtheme' ),
        'section'   => 'ukmtheme_visitor_counter',
        'priority'  => 10,
        'type'      => 'text'
    ) );

    /**
     * Remove default customize setting
     * Title, Frontpage, navigation, header image.
     */

    //$wp_customize->remove_section( 'title_tagline' );
    $wp_customize->remove_section( 'static_front_page' );
    $wp_customize->remove_section( 'nav' );
    $wp_customize->remove_section( 'header_image' );

}
add_action( 'customize_register', 'ukmtheme_customizer' );

