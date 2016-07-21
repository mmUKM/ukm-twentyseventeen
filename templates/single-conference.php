<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
get_header(); ?>
<div class="wrap column">
  <article class="large-12-12 article">
    <?php while ( have_posts() ) : the_post(); ?>
      <h1 style="margin:0;"><?php the_title(); ?></h1>
      <h3 style="margin:0 0 20px 0;">
        <?php _e('Date:&nbsp;','ukmtheme'); ?><?php echo get_post_meta( get_the_ID(), 'ut_conference_date_start', true ); ?>
        &nbsp;-&nbsp;
        <?php echo get_post_meta( get_the_ID(), 'ut_conference_date_end', true ); ?><br>
        <?php _e('Venue:&nbsp;','ukmtheme'); ?><?php echo get_post_meta( get_the_ID(), 'ut_conference_venue', true ); ?>
      </h3>
      <!--Slideshow for Banner-->
      <div class="uk-slidenav-position" data-uk-slideshow="{animation:'slice-up-down', autoplay:true, autoplayInterval:6000}">
        <?php ut_conference_slideshow( 'ut_conference_slide_image', 'full' ); ?>
        <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)"></a>
        <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)"></a>
      </div>
      <hr><!--Introduction-->
      <h2><?php _e( 'Introduction', 'ukmtheme' ); ?></h2>
      <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_introduction', true ) ); ?>
      <hr><!--Keynote Speaker-->
      <h2><?php _e( 'Keynote Speaker', 'ukmtheme' ); ?></h2>
      <div data-uk-slideset="{default: 4}">
        <div class="uk-slidenav-position">
          <?php ut_conference_keynote( 'ut_conference_keynote_image', 'full' ); ?>
          <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
          <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
        </div>
      </div>
      <hr><!--Extended Content-->
      <div class="uk-block uk-block-default">
        <?php get_template_part( 'templates/content', 'conference' ); ?>
      </div>
      <hr><!--Organizer-->
      <h2><?php _e( 'Organizer', 'ukmtheme' ); ?></h2>
      <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_organizer', true ) ); ?>
    <?php endwhile; ?>
    <?php get_template_part( 'templates/content', 'edit' ); ?>
  </article>
</div>
<?php get_footer(); ?>