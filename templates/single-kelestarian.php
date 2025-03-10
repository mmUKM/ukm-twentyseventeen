<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="uk-container">

    <article>

        <?php while ( have_posts() ) : the_post(); ?>
        <h2 class="uk-h2 uk-padding"><?php the_title(); ?></h2>
        <div class="uk-padding" style="position: relative;">
            <?php echo get_post_meta( get_the_ID(), 'ut_kelestarian_ringkasan', true ); ?>
        </div>

    <?php endwhile;?>
    <?php get_template_part('templates/content','edit' ); ?>
  </article>
</div>
<?php get_footer(); ?>