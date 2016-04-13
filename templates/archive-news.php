<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
get_header();

  $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

  $query = new WP_Query( array( 
    'post_type'       => 'news',
    'posts_per_page'  => 10,
    'paged'           => $paged,
  ));
  
?>
<div class="wrap column">
  <article class="article col-8-12">
   <h2><?php _e( 'News Archive', 'ukmtheme' ) ; ?></h2>

      <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="column bottom-divider">
          <div class="col-3-12 pad-right">
            <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'latest_news_thumbnail' );
              }
              else {
                echo '<img src="' . get_template_directory_uri() . '/img/placeholder_thumbnail.svg" />';
              }
            ?>
          </div>
          <div class="col-9-12 pad-left">
            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
          </div>
        </div>
      <?php endwhile; else: ?>
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
        <?php get_search_form(); ?>
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