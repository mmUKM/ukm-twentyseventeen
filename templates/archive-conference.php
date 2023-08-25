<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap column">
  <article class="article large-12-12">
    <h2><?php _e( 'Conference', 'ukmtheme') ?></h2>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h3 style="margin:0;"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
      <p style="margin:0 0 20px 0;">
        <?php _e('Date:&nbsp;','ukmtheme'); ?><?php echo get_post_meta( get_the_ID(), 'ut_conference_date_start', true ); ?>
        &nbsp;-&nbsp;
        <?php echo get_post_meta( get_the_ID(), 'ut_conference_date_end', true ); ?><br>
        <?php _e('Venue:&nbsp;','ukmtheme'); ?><?php echo get_post_meta( get_the_ID(), 'ut_conference_venue', true ); ?>
      <p>
      <hr>
      <?php endwhile; else: ?>
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
      <?php endif; ?>
    <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
</div>
<?php get_footer(); ?>