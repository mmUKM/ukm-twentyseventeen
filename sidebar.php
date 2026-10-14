<?php
/**
 * The sidebar containing the main widget area
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>
<aside id="secondary" class="widget-area uk-margin-bottom" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar', 'ukmtheme' ); ?>">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>