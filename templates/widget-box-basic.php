<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
?>
<div class="column pad-top pad-bottom">
    <h2 class="title"><?php _e( 'Latest News', 'ukmtheme' ) ?> | <a href="<?php echo get_post_type_archive_link('news'); ?>"><?php _e( 'More News', 'ukmtheme' ); ?></a></h2>
    <ul class="uk-grid">
    <?php
    
    $news = get_theme_mod( 'ukmtheme_frontpage_news' );
    
    $args = array(
      'post_type' => 'news',
      'posts_per_page' => $news
    );
    $loop = new WP_Query( $args );
    
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <li class="uk-width-medium-1-3">
        <div class="pad-bottom">
          <?php
            if ( has_post_thumbnail() ) { the_post_thumbnail( 'latest_news_thumbnail' ); }
            else { echo '<img src="' . get_template_directory_uri() . '/img/placeholder_thumbnail.svg" height="auto" width="auto"/>'; }
          ?>
        </div>
        <div class="latest-news-excerpt">
          <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php the_excerpt(); ?>
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
</div>