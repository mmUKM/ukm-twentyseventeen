<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
require_once get_template_directory() . '/packages/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ukmtheme_register_required_plugins' );

function ukmtheme_register_required_plugins() {

    $plugins = array(

        array(
            'name'      => 'Elementor Website Builder',
            'slug'      => 'elementor',
            'required'  => false,
        ),

        array(
            'name'      => 'Elementor Header & Footer Builder',
            'slug'      => 'header-footer-elementor',
            'required'  => false,
        ),

        array(
            'name'      => 'ElementsKit Elementor addons',
            'slug'      => 'elementskit-lite',
            'required'  => false,
        ),
        
        array(
            'name'      => 'ARYO Activity Log',
            'slug'      => 'aryo-activity-log',
            'required'  => false,
        ),

        array(
            'name'      => 'Polylang',
            'slug'      => 'polylang',
            'required'  => false,
        ),

        array(
            'name'      => 'Simple Page Ordering',
            'slug'      => 'simple-page-ordering',
            'required'  => false,
        ),
    
        array(
            'name'      => 'All in One SEO Pack',
            'slug'      => 'all-in-one-seo-pack',
            'required'  => false,
        ),

        array(
            'name'      => 'Lockdown WP Admin',
            'slug'      => 'lockdown-wp-admin',
            'required'  => false,
        ),

    );

    $config = array(
            'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}