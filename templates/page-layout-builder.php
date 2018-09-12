<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * 
 * Template Name: Layout Builder
 */
get_header(); ?>
<div class="column">
  <article class="large-12-12 full-width-article">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_post_thumbnail( 'full') ?>
        <div class="column">
          <div class="">
            <?php the_content(); ?>
          </div>
        </div>
    <?php endwhile;?>
    <?php get_template_part('templates/content','edit' ); ?>
  </article>
</div>
<?php get_footer(); ?>
