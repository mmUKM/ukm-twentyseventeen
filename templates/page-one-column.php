<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @version 1.0
 *
 * Template Name: Page without Sidebar
 */
get_header(); ?>
<div class="wrap column">
  <article class="article large-12-12">
    <?php while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>

    <?php endwhile;?>
    <?php get_template_part('templates/content','edit' ); ?>
  </article>
</div>
<?php get_footer(); ?>