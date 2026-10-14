<?php
/**
 * Pagination template part
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $wp_query;
if ( $wp_query->max_num_pages <= 1 ) {
    return;
}
?>
<nav class="uk-margin-medium-top" aria-label="<?php esc_attr_e( 'Pagination', 'ukmtheme' ); ?>">
    <ul class="uk-pagination uk-flex-between">
        <li class="pagination-prev">
            <?php previous_posts_link( '<span uk-pagination-previous></span> ' . esc_html__( 'Newer Entries', 'ukmtheme' ) ); ?>
        </li>
        <li class="pagination-next">
            <?php next_posts_link( esc_html__( 'Older Entries', 'ukmtheme' ) . ' <span uk-pagination-next></span>' ); ?>
        </li>
    </ul>
</nav>