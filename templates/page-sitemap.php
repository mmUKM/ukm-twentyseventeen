<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @version 1.0
 * 
 * Template Name: Page: Sitemap
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-8-12">
    <?php while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <?php echo do_shortcode('[ukmtheme-sitemap]'); ?>

    <?php endwhile;?>
    <?php get_template_part('templates/content','edit' ); ?>
  </article>
  <aside class="aside col-4-12">
    <div class="uk-panel uk-panel-box">
      <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
    </div>
  </aside>
</div>
<?php get_footer(); ?>