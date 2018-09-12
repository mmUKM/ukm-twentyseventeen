<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap column">
  <article class="article large-12-12">
    <h2><?php _e( 'Appreciation', 'ukmtheme' ) ?></h2>
      <?php
      
        $query = new WP_Query( array( 
          'post_type'       => 'appreciation', 
          'posts_per_page'  => 10,
        ));
      
        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="column bottom-divider">
          <blockquote><?php global $post; echo get_post_meta($post->ID, 'ut_appreciation_greeting', true); ?></blockquote>
          <span style="float:right;text-align:right;">
            <i class="uk-icon-gift"></i>&nbsp;<?php global $post; echo get_post_meta($post->ID, 'ut_appreciation_ptj', true); ?><br/>
            <?php global $post; echo get_post_meta($post->ID, 'ut_appreciation_date', true); ?>
          </span>
        </div>
        <?php endwhile; else: ?>
        <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
</div>
<?php get_footer(); ?>