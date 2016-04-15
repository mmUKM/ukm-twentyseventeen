<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @version 1.0
 */
get_header(); ?>
<div class="wrap column">
<?php while ( have_posts() ) : the_post(); ?>
  <article class="article large-8-12">
    <p><?php echo get_post_meta( get_the_ID(), 'ut_appreciation_date', true ); ?></p>
      <blockquote>
        <?php echo get_post_meta($post->ID, 'ut_appreciation_greeting', true); ?>
      </blockquote>
    <p><?php _e('By:&nbsp;','ukmtheme'); ?><?php echo get_post_meta($post->ID, 'ut_appreciation_by', true); ?>,&nbsp;<?php echo get_post_meta($post->ID, 'ut_appreciation_ptj', true); ?></p>

  <?php endwhile; ?>
  <?php get_template_part('templates/content','edit' ); ?>
  </article>
  </section>
  <aside class="aside large-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>