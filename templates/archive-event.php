<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 */
get_header();

  $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

  $query = new WP_Query( array( 
    'post_type'       => 'event',
    'posts_per_page'  => 10,
    'post_status'     => array( 'publish', 'future' ),
    'paged'           => $paged,
  ));

?>
<div class="wrap column">
  <article class="col-8-12 article">
  <h2><?php echo __( 'Events', 'ukmtheme' ); ?></h2>
    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="bottom-divider">
        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
        <ul>
          <li class="ut-event-list-content ut-event-date"><?php echo get_post_meta($post->ID, 'ut_event_date', true); ?></li>
          <li class="ut-event-list-content ut-event-time"><?php echo get_post_meta($post->ID, 'ut_event_time_start', true); ?>&nbsp;-&nbsp;<?php echo get_post_meta($post->ID, 'ut_event_time_end', true); ?></li>
          <li class="ut-event-list-content ut-event-venue"><?php echo get_post_meta($post->ID, 'ut_event_venue', true); ?></li>
        </ul>
        <p><?php echo get_post_meta( $post->ID, 'ut_event_summary', true ); ?></p>
      </div>
      <?php endwhile; else: ?>
        <p><?php _e( 'Sorry, no post matched your criteria.', 'ukmtheme' ); ?></p>
    <?php endif; ?>
    <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
  <aside class="aside col-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>