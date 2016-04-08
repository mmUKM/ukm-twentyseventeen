<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @since 1.0
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
  <article class="article col-8-12">
  <h2><?php _e( 'Frequently Asked Questions', 'ukmtheme' ) ?></h2>
    <ol class="uk-accordion" data-uk-accordion="{showfirst: false}">
      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <li class="uk-accordion-title"><?php the_title(); ?></li>
        <div class="uk-accordion-content"><?php the_content(); ?></div>
      <?php endwhile; else: ?>
    </ol>
      <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
  </article>
  <aside class="aside col-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>