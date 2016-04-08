<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-12-12">
    <h2><?php the_title(); ?></h2>
    <?php _e('Author','ukmtheme'); ?>&nbsp;:&nbsp;<?php echo get_post_meta($post->ID, 'ut_journal_author', true); ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="column">
          <div class="col-12-12 pad-top">
            <strong><?php _e('Abstract','ukmtheme') ?></strong>
            <?php the_content(); ?>
          </div>
        </div>
      <?php endwhile; ?>
  </article>
</div>
<?php get_footer(); ?>