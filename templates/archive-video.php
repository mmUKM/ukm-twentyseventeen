<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
get_header(); ?>
<div class="wrap column">
  <article class="article large-8-12">
    <h2><?php post_type_archive_title(); ?></h2>
      <?php
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

        $query = new WP_Query( array( 
          'post_type'       => 'video',
          'posts_per_page'  => 10,
          'paged'           => $paged
        ));
      
        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="column">
          <div class="large-3-12">
            <?php
              if ( get_post_meta( get_the_ID(), 'ut_video_id', 1 ) ) {
                $video_id = get_post_meta( get_the_ID(), 'ut_video_id', 1 );
                echo '<img src="http://img.youtube.com/vi/'. $video_id .'/default.jpg">';
              }
              else {
                echo '<img src="' . get_template_directory_uri() . '/img/placeholder_thumbnail.svg" width="100" />';
              }
            ?>
          </div>
          <div class="large-9-12">
            <h3>
              <a href="<?php
                  $url = esc_url( get_post_meta( get_the_ID(), 'ut_video_url', 1 ) );
                  echo $url ?>" data-uk-lightbox >
                  <?php the_title(); ?>
              </a>
            </h3>
            <p><?php echo get_post_meta( get_the_ID(), 'ut_video_desc', 1 ); ?></p>
          </div>
        </div>
    <hr>
      <?php endwhile; else: ?>
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
        <?php get_search_form(); ?>
      <?php endif; ?>
    <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
  <aside class="aside large-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>