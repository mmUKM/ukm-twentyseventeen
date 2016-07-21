<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @version 1.0
 */
get_header(); ?>
<div class="wrap column">
<article class="article large-8-12">
    <?php while ( have_posts() ) : the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <ul>
        <li><?php echo get_post_meta($post->ID, 'ut_event_date', true); ?></li>
        <li><?php echo get_post_meta($post->ID, 'ut_event_time_start', true); ?>&nbsp;-&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_time_end', true); ?></li>
        <li><?php echo get_post_meta($post->ID, 'ut_event_venue', true); ?></li>
      </ul>
      <p><?php echo get_post_meta($post->ID, 'ut_event_summary', true); ?></p>
    <?php endwhile; ?>
    <?php get_template_part('templates/content','edit' ); ?>
</article>

  <aside class="aside large-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?> 