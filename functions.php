<?php
/**
 * UKM Theme Functions
 *
 * Loads all theme modules from /inc/ and /widgets/.
 * Keep this file lean — add new features in the relevant module.
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// -------------------------------------------------------
// Auto-update checker (PUC)
// -------------------------------------------------------
require get_template_directory() . '/assets/libs/puc/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://raw.githubusercontent.com/mmUKM/ukm-twentyseventeen/master/package.json',
    __FILE__,
    'ukm-twentyseventeen-master'
);

// -------------------------------------------------------
// Core modules — /inc/
// -------------------------------------------------------
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/sidebars.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/menu-walker.php';
require get_template_directory() . '/inc/login.php';
require get_template_directory() . '/inc/plugins.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/archive-links.php';
require get_template_directory() . '/inc/sitemap.php';
require get_template_directory() . '/inc/template-loader.php';

// -------------------------------------------------------
// Custom Post Types — /inc/post-types/
// Each file registers one CPT + its taxonomies
// -------------------------------------------------------
require get_template_directory() . '/inc/post-types/loader.php';

// -------------------------------------------------------
// Metaboxes (CMB2) — /inc/metaboxes/
// Each file handles metaboxes for one CPT
// -------------------------------------------------------
require get_template_directory() . '/inc/metaboxes/loader.php';

// -------------------------------------------------------
// Widgets — /widgets/
// -------------------------------------------------------
require get_template_directory() . '/widgets/widget-address-social.php';
require get_template_directory() . '/widgets/widget-appreciation.php';
require get_template_directory() . '/widgets/widget-event.php';
require get_template_directory() . '/widgets/widget-news-list.php';
// require get_template_directory() . '/widgets/widget-news-thumbnail.php';
require get_template_directory() . '/widgets/widget-operating-hour.php';
// require get_template_directory() . '/widgets/widget-youtube.php';
require get_template_directory() . '/widgets/widget-visitor-counter.php';

// -------------------------------------------------------
// Third-party addons
// -------------------------------------------------------
require get_template_directory() . '/inc/elementor/elementor-addon.php';