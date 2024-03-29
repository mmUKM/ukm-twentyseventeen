<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap">
    <article class="uk-padding">
        <h2><?php _e( 'Search', 'ukmtheme' ); ?></h2>
        <?php get_search_form(); ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php the_content(); ?>
        <?php endwhile;?>
    </article>
</div>
<?php get_footer(); ?>