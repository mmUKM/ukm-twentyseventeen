<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * 
 * Template Name: With Sidebar
 */
get_header(); ?>
<div id="primary" class="content-area wrap column device-padding">
  <div id="main" class="site-main large-8-12 small-12-12" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
    <?php the_title( '<h2>', '</h2>' ); ?>
    <?php the_content(); ?>
    </article>
    <?php endwhile;?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_template_part('templates/content','edit' ); ?>
<?php get_footer(); ?>
