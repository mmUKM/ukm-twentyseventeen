<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap column">
  <article class="large-12-12 article">
    <?php while ( have_posts() ) : the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <p>
        <?php _e('Date:&nbsp;','ukmtheme'); ?><?php echo get_post_meta($post->ID, 'ut_gallery_date', true); ?>&nbsp;|&nbsp;
        <?php _e('Photo by:&nbsp;','ukmtheme'); ?><?php echo get_post_meta($post->ID, 'ut_gallery_photographer', true); ?>&nbsp;|&nbsp;
        <a href="<?php echo get_post_type_archive_link( 'gallery' ); ?>"><?php _e('Back to Index','ukmtheme'); ?></a>
      </p>
      <p><?php echo get_post_meta($post->ID, 'ut_gallery_description', true); ?></p>
      <?php ut_lightbox_gallery( 'ut_gallery_image', 'post-thumbnail' ); ?>
    <?php endwhile; ?>
  </article>
</div>
<?php get_footer(); ?>
