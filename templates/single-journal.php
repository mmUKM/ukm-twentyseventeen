<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap column">
  <article class="article large-12-12">
    <h2><?php the_title(); ?></h2>
    <?php _e('Author','ukmtheme'); ?>&nbsp;:&nbsp;<?php echo get_post_meta($post->ID, 'ut_journal_author', true); ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="column">
          <div class="large-12-12 padding-top">
            <strong><?php _e('Abstract','ukmtheme') ?></strong>
            <?php the_content(); ?>
          </div>
        </div>
      <?php endwhile; ?>
  </article>
</div>
<?php get_footer(); ?>
