<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */

$args = array( 
  'post_type'       => 'slideset',
  'posts_per_page'  => 10,
  'orderby'         => 'menu_order', 
  'order'           => 'ASC' 
);

$slideset = new WP_Query( $args ); ?>

<div class="uk-slidenav-position" data-uk-slider>
  <div class="uk-slider-container">
    <div class="uk-slider uk-grid-width-1-4">
    <?php if ( $slideset->have_posts() ) : while ( $slideset->have_posts() ) : $slideset->the_post(); ?>
      <a href="<?php echo get_post_meta(get_the_ID(),'ut_slideset_link',true); ?>" title="<?php the_title(); ?>">
        <img src="<?php echo get_post_meta(get_the_ID(),'ut_slideset_image',true); ?>" alt="<?php the_title(); ?>">
      </a>
    <?php endwhile; else: ?>
      <a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_a.svg'; ?>" alt=""></a>
      <a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_b.svg'; ?>" alt=""></a>
      <a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_c.svg'; ?>" alt=""></a>
      <a><img src="<?php echo get_template_directory_uri() . '/img/placeholder_slider_d.svg'; ?>" alt=""></a>
    <?php endif; ?>
    </div>
  </div>
<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
</div>