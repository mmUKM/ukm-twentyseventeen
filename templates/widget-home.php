<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
if ( get_theme_mod( 'ukmtheme_frontpage_slideset' ) == 1 ) { ?>
<div class="uk-slidenav-position" data-uk-slider>
  <div class="uk-slider-container">
    <div class="uk-slider uk-grid-width-1-4">
    <?php
      $args = array(
        'post_type'       => 'slideset',
        'posts_per_page'  => 10,
        'orderby'         => 'menu_order',
        'order'           => 'ASC'
      );

      $slideset = new WP_Query( $args );

      if ( $slideset->have_posts() ) : while ( $slideset->have_posts() ) : $slideset->the_post(); ?>
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
<?php } ?>
<?php
/**
 * Frontpage widget: Slideset
 */
if ( get_theme_mod( 'ukmtheme_frontpage_one_box' ) == 1 ) {
  if ( dynamic_sidebar( 'sidebar-2' ) ) : else : endif;
} ?>
<?php
/**
 * Frontpage widget: News
 * Custom post type: news
 */
if ( get_theme_mod( 'ukmtheme_frontpage_basic' ) == 1 ) { ?>
<div class="wrap padding-top padding-bottom device-padding column">
    <h2 class="title"><?php _e( 'Latest News', 'ukmtheme' ) ?> | <a href="<?php echo get_post_type_archive_link('news'); ?>"><?php _e( 'More News', 'ukmtheme' ); ?></a></h2>
    <ul class="uk-grid uk-grid-match" data-uk-grid-margin data-uk-grid-match="{target:'.uk-panel'}">
    <?php

    $news = get_theme_mod( 'ukmtheme_frontpage_news' );

    $args = array(
      'post_type' => 'news',
      'posts_per_page' => $news
    );
    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <li class="uk-width-medium-1-3">
        <div class="uk-panel uk-panel-box">
          <div class="padding-bottom">
            <?php
              if ( has_post_thumbnail() ) { the_post_thumbnail( 'latest_news_thumbnail' ); }
              else { echo '<img src="' . get_template_directory_uri() . '/img/placeholder_thumbnail.svg" height="auto" width="auto"/>'; }
            ?>
          </div>
          <div class="latest-news-excerpt">
            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
          </div>
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
</div>
<?php } ?>
<?php
/**
 * Frontpage widget: Frontpage widget
 * Custom post type: Tabber
 */
if ( get_theme_mod( 'ukmtheme_frontpage_tabber' ) == 1 ) { ?>
<div class="wrap padding-top padding-bottom device-padding ut-tabber-wrap">

  <div class="uk-button-group ut-tabber-button" data-uk-switcher="{connect:'#ut-tabber'}">
    <?php

      $args = array(
      'post_type'       => 'tab',
      'posts_per_page'  => 10,
      'orderby'         => 'menu_order',
      'order'           => 'ASC'
      );

    $tabber = new WP_Query( $args );

    while ( $tabber->have_posts() ) : $tabber->the_post(); ?>
      <button class="uk-button uk-button-large" type="button"><?php the_title(); ?></button>
    <?php endwhile; ?>
  </div>

  <ul id="ut-tabber" class="uk-switcher uk-margin">
    <?php while ( $tabber->have_posts() ) : $tabber->the_post(); ?>
      <li class="ut-tabber-content">
      <h3><?php the_title(); ?></h3>
      <p><?php the_content(); ?></p>
      </li>
    <?php endwhile; ?>
  </ul>
</div>
<?php } ?>
<?php
/**
 * Frontpage widget: Two column sidebar widget
 */
if ( get_theme_mod( 'ukmtheme_frontpage_two_box' ) == 1 ) { ?>
<div class="wrap padding-top padding-bottom device-padding">
  <div class="uk-grid" data-uk-grid-match="">
    <?php if (dynamic_sidebar( 'sidebar-3' )) : else : ?><?php endif; ?>
  </div>
</div>
<?php } ?>
<?php
/**
 * Frontpage widget: Three column sidebar widget
 */
if ( get_theme_mod( 'ukmtheme_frontpage_three_box' ) == 1 ) { ?>
<div class="wrap padding-top padding-bottom device-padding">
  <div class="uk-grid" data-uk-grid-match="">
    <?php if (dynamic_sidebar( 'sidebar-4' )) : else : ?><?php endif; ?>
  </div>
</div>
<?php } ?>
<?php
/**
 * Frontpage widget: Four column sidebar widget
 */
if ( get_theme_mod( 'ukmtheme_frontpage_four_box' ) == 1 ) { ?>
<div class="wrap padding-top padding-bottom device-padding">
  <div class="uk-grid" data-uk-grid-match="">
    <?php if (dynamic_sidebar( 'sidebar-5' )) : else : ?><?php endif; ?>
  </div>
</div>
<?php } ?>
