<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
get_header(); ?>
<div id="primary" class="content-area wrap column device-padding">
  <div id="main" class="site-main large-8-12" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
    <?php the_title( '<h2>', '</h2>' ); ?>
    <?php the_content(); ?>
    </article>
    <?php endwhile;?>
    <?php get_template_part('templates/content','edit' ); ?>
  </div>
  <aside class="aside large-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>