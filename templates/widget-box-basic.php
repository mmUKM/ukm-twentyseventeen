<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
?>
<div class="column pad-top pad-bottom">
  <div class="col-8-12 pad-right">
    <h3><?php _e( 'Latest News', 'ukmtheme' ) ?> | <a href="<?php echo get_post_type_archive_link('news'); ?>"><?php _e( 'More News', 'ukmtheme' ); ?></a></h3>
    <?php
    
    $news = get_theme_mod( 'ukmtheme_frontpage_news' );
    
    $args = array(
      'post_type' => 'news',
      'posts_per_page' => $news
    );
    $loop = new WP_Query( $args );
    
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <div class="column pad-bottom bottom-divider">
        <div class="sm-col-3-12 pad-right">
          <?php
            if ( has_post_thumbnail() ) { the_post_thumbnail( 'news_thumb' ); }
            else { echo '<img src="' . get_template_directory_uri() . '/img/placeholder_thumbnail.svg" height="auto" width="auto"/>'; }
          ?>
        </div>
          <div class="sm-col-9-12 pad-left">
            <h3 class="ut-news-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
          </div>
      </div>
    <?php endwhile; ?>
  </div>
  <div class="col-4-12 pad-left">
    <div class="uk-panel">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </div>
</div>