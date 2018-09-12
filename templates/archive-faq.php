<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header();

  $query = new WP_Query( array( 
    'post_type'       => 'faq', 
    'posts_per_page'  => -1, 
    'orderby'         => 'menu_order', 
    'order'           => 'ASC' 
  ));
  
?>
<div class="wrap column">
  <article class="article large-12-12">
  <h2><?php _e( 'Frequently Asked Questions', 'ukmtheme' ) ?></h2>
    <div class="uk-accordion" data-uk-accordion="{showfirst: false}">
      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
      <h3 class="uk-accordion-title"><?php the_title(); ?><i class="uk-icon-chevron-circle-down uk-float-right"></i></h3>
        <div class="uk-accordion-content"><?php the_content(); ?></div>
      <?php endwhile; else: ?>
    </div>
      <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
  </article>
</div>
<?php get_footer(); ?>
