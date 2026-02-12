<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * 
 * Template Name: Layout Builder
 */
get_header(); ?>
<div id="<?php echo $post->ID ?>" class="wrap uk-margin-top">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile;?>
    <?php get_template_part('templates/content','edit' ); ?>
</div>
<?php get_footer(); ?>
