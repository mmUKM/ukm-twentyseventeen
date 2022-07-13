<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap">
    <article class="uk-padding">
        <?php while ( have_posts() ) : the_post(); ?>
            <h2><?php the_title(); ?></h2>
            <p>
                <span uk-icon="icon: calendar"></span>&nbsp;<?php echo get_post_meta($post->ID, 'ut_gallery_date', true); ?>&nbsp;|&nbsp;
                <span uk-icon="icon: camera"></span>&nbsp;<?php echo get_post_meta($post->ID, 'ut_gallery_photographer', true); ?>
            </p>
            <?php ut_lightbox_gallery( 'ut_gallery_image', 'post-thumbnail' ); ?>
        <?php endwhile; ?>
    </article>
</div>
<?php get_footer(); ?>