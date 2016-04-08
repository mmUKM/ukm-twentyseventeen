<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-8-12">
    <h2><?php _e( 'News Clipping', 'ukmtheme' ); ?></h2>
    <ul>
      <?php
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        
        $query = new WP_Query( array( 
          'post_type'       => 'press', 
          'posts_per_page'  => -1,
          'paged'           => $paged
        ));
      if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <li>
          <?php echo get_post_meta($post->ID,'ut_press_date',true); ?>&nbsp;
          <a href="<?php echo get_post_meta($post->ID,'ut_press_file',true); ?>"><?php the_title(); ?></a>
        </li>
      <?php endwhile; else: ?>
      <h2><?php _e( 'Nothing Found', 'ukmtheme' ); ?></h2>
      <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
      <?php get_search_form(); ?>
      <?php endif; ?>
    </ul>
    <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
  <aside class="aside col-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>