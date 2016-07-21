<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
?> 
<div class="uk-slidenav-position" data-uk-slideshow="{animation:'slice-up-down', autoplay:true, autoplayInterval:10000}">
  <ul class="uk-slideshow">
    <?php
      $args = array(
        'post_type'       => 'slideshow',
        'posts_per_page'   => 20,
        'orderby'         => 'menu_order'
      );

      $slideshow = new WP_Query( $args );

      if ( $slideshow->have_posts() ) : while ( $slideshow->have_posts() ) : $slideshow->the_post(); 
    ?>
    <li>
      <a href="<?php echo get_post_meta(get_the_ID(),'ut_slideshow_link',true); ?>">
        <img src="<?php echo get_post_meta(get_the_ID(),'ut_slideshow_image',true); ?>" alt="<?php the_title(); ?>" style="width: 100%;">
      </a>
      <div class="uk-overlay-panel uk-overlay-bottom uk-overlay-fade">
      <?php $hide_caption = get_post_meta(get_the_ID(), 'ut_slideshow_caption_hide', true); ?>
        <div class="wrap slideshow <?php if ( $hide_caption== on ) { echo 'hidden'; } ?>">
          <h2><?php the_title(); ?></h2>
          <p><?php echo get_post_meta(get_the_ID(),'ut_slideshow_caption',true); ?></p>
        </div>
      </div>
    </li>            
    <?php endwhile; else: ?>
    <li>
      <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-slideshow.jpg" alt="Slideshow Placeholder" style="width: 100%;">
      <div class="uk-overlay-panel uk-overlay-bottom uk-overlay-fade">
        <div class="wrap slideshow">
          <h2>UKM Awesome!</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed qui ut placeat quae, nisi ratione sunt, ex consectetur officia saepe.</p>
        </div>
      </div>
    </li>
    <?php endif; ?>
  </ul>
  <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)"></a>
  <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)"></a>
</div>
