<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * @since 1.0
 */
get_header(); ?>
<div class="wrap column">
  <article class="article large-12-12">
   <h2><?php _e( 'Nothing Found', 'ukmtheme' ); ?></h2>
   <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
   <?php get_search_form(); ?>
  </article>
</div>
<?php get_footer(); ?>