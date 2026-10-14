<?php
/**
 * Page Template Part: Layout Builder
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div id="<?php echo $post->ID ?>" class="wrap uk-margin-top">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile;?>
    <?php get_template_part( 'template-parts/global/content', 'edit' ); ?>
</div>
<?php get_footer(); ?>
