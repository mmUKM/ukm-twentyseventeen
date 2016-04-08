<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 * 
 * New theme customizer for UKMTheme
 * ==================================
 * 01. Colour Options
 * 02. Frontpage Layout
 * 03. Language Switcher
 * 04. Social Media Links
 */
add_action( 'customize_register', 'ukmtheme_customizer' );
  function ukmtheme_customizer( $wp_customize ) {
    
    /**
     * Logo
     */
    $wp_customize->add_section( 'ukmtheme_theme_logo', array(
      'title' => __( 'Site Logo', 'ukmtheme' ),
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

    /**
     * Theme colour switcher
     * Three colour options
     */

    $wp_customize->add_section( 'ukmtheme_theme_colors', array(
      'title' => __( 'Site Colors', 'ukmtheme' ),
      'priority' => 100,
    ) );

    // Primary colour

    $wp_customize->add_setting( 'primary_color', array(
      'default' => '#d10000'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
      'label' => 'Primary',
      'section' => 'ukmtheme_theme_colors',
      'settings' => 'primary_color',
    ) ) );

    // Secondary colour

    $wp_customize->add_setting( 'secondary_color', array(
      'default' => '#0095d9'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
      'label' => 'Secondary',
      'section' => 'ukmtheme_theme_colors',
      'settings' => 'secondary_color',
    ) ) );

    // Tertiary colour

    $wp_customize->add_setting( 'tertiary_color', array(
      'default' => '#494949'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tertiary_color', array(
      'label' => 'Tertiary',
      'section' => 'ukmtheme_theme_colors',
      'settings' => 'tertiary_color',
    ) ) );

    /**
     * Frontpage Layout
     * 01. Basic Layout (News with Right Sidbar)
     * 02. One Column Box
     * 03. Two Column Box
     * 04. Three Column Box
     * 05. Four Column Box
     * 06. Slideset
     * 07. Tabber
     */

    $wp_customize->add_section( 'ukmtheme_frontpage_layout' , array(
    'title'      => __( 'Frontpage Layout', 'ukmtheme' ),
    'priority'   => 100,
    ) );

    // Basic layout (news with right sidebar)
    $wp_customize->add_setting( 'ukmtheme_frontpage_basic', array( 
      'default' => 1 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_basic', array(
      'label'     => __( 'Basic frontpage (News with right sidebar)', 'ukmtheme' ),
      'section'   => 'ukmtheme_frontpage_layout',
      'priority'  => 10,
      'type'      => 'checkbox'
    ) );
    
    // One column sidebar
    $wp_customize->add_setting( 'ukmtheme_frontpage_one_box', array( 
      'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_one_box', array(
      'label'     => __( 'One column box', 'ukmtheme' ),
      'section'   => 'ukmtheme_frontpage_layout',
      'priority'  => 10,
      'type'      => 'checkbox'
    ) );
    
    // Two column sidebar
    $wp_customize->add_setting( 'ukmtheme_frontpage_two_box', array( 
      'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_two_box', array(
      'label'     => __( 'Two column box', 'ukmtheme' ),
      'section'   => 'ukmtheme_frontpage_layout',
      'priority'  => 10,
      'type'      => 'checkbox'
    ) );
    
    // Three column sidebar
    $wp_customize->add_setting( 'ukmtheme_frontpage_three_box', array( 
      'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_three_box', array(
      'label'     => __( 'Three column box', 'ukmtheme' ),
      'section'   => 'ukmtheme_frontpage_layout',
      'priority'  => 10,
      'type'      => 'checkbox'
    ) );
    
    // Four column sidebar
    $wp_customize->add_setting( 'ukmtheme_frontpage_four_box', array( 
      'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_four_box', array(
      'label'     => __( 'Four column box', 'ukmtheme' ),
      'section'   => 'ukmtheme_frontpage_layout',
      'priority'  => 10,
      'type'      => 'checkbox'
    ) );
    
    // Slideset
    $wp_customize->add_setting( 'ukmtheme_frontpage_slideset', array( 
      'default' => 1 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_slideset', array(
      'label'     => __( 'Slideset', 'ukmtheme' ),
      'section'   => 'ukmtheme_frontpage_layout',
      'priority'  => 10,
      'type'      => 'checkbox'
    ) );
    
    // Tabber
    $wp_customize->add_setting( 'ukmtheme_frontpage_tabber', array( 
      'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_tabber', array(
      'label'     => __( 'Tabber', 'ukmtheme' ),
      'section'   => 'ukmtheme_frontpage_layout',
      'priority'  => 10,
      'type'      => 'checkbox'
    ) );
    
    // News
    $wp_customize->add_setting( 'ukmtheme_frontpage_news', array( 
      'default' => 4 
    ) );

    $wp_customize->add_control( 'ukmtheme_frontpage_news', array(
      'label'     => __( 'Number of news to show', 'ukmtheme' ),
      'section'   => 'ukmtheme_frontpage_layout',
      'priority'  => 10,
      'type'      => 'text'
    ) );
    
    /**
     * Social Media Links
     * 01. Facebook
     * 02. Instagram
     * 03. Twitter
     * 04. Youtube
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
     * Language Switcher
     * Display language switcher on left sidebar
     * 01. Polylang Language Switcher
     * 02. Google Translate
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
      'label'     => __( 'Polylang Language Switcher', 'ukmtheme' ),
      'section'   => 'ukmtheme_language_switcher',
      'priority'  => 10,
      'type'      => 'checkbox'
    ) );
    
    // Google Language Switcher
    $wp_customize->add_setting( 'ukmtheme_google_switcher', array( 
      'default' => 0 
    ) );

    $wp_customize->add_control( 'ukmtheme_google_switcher', array(
      'label'     => __( 'Google Language Switcher', 'ukmtheme' ),
      'section'   => 'ukmtheme_language_switcher',
      'priority'  => 10,
      'type'      => 'checkbox'
    ) );
    
    /**
     * Visitor Counter with Statistic
     * Plugin from http://www.supercounters.com
     * Copy only id no.
     */
    
    $wp_customize->add_section( 'ukmtheme_visitor_counter' , array(
    'title'      => __( 'Visitor Stat and Last Update', 'ukmtheme' ),
    'priority'   => 100,
    ) );
    
    // Facebook
    $wp_customize->add_setting( 'ukmtheme_supercounter', array( 
      'default' => 'PASTE HERE, NUMBER ONLY!'
    ) );

    $wp_customize->add_control( 'ukmtheme_supercounter', array(
      'label'     => __( 'Hit Counter ID', 'ukmtheme' ),
      'description' => __( 'Visit <a href="http://www.supercounters.com/hitcounter" target="_blank">www.supercounters.com</a>. Choose text then hit submit button. Copy and paste generated code into notepad. Copy number after --sc_text_hit(COPY_THIS_NUMBER_ONLY,"Visits"--', 'ukmtheme' ),
      'section'   => 'ukmtheme_visitor_counter',
      'priority'  => 10,
      'type'      => 'text'
    ) );
    
    $wp_customize->add_setting( 'ukmtheme_date_of_update', array( 
      'default' => '01/01/2016'
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
    
    $wp_customize->remove_section( 'title_tagline' );
    $wp_customize->remove_section( 'static_front_page' );
    $wp_customize->remove_section( 'nav' );
    $wp_customize->remove_section( 'header_image' );
    
  }

