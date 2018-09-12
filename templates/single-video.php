<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap">
  <article class="article">
    <div class="column fitvids">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="large-12-12 padding-top padding-bottom">
          <?php
            $url = esc_url( get_post_meta( get_the_ID(), 'ut_video_url', 1 ) );
            echo wp_oembed_get( $url );
          ?>
        </div>
      <div class="padding-top" style="text-align: center;">
        <h5><?php the_title(); ?></h5>
        <p><a href="<?php echo get_post_type_archive_link( 'video' ); ?>"><?php _e('Back to Index','ukmtheme'); ?></a></p>
      </div>
      <?php endwhile ?>
    </div>
    <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
</div>
<?php get_footer(); ?>