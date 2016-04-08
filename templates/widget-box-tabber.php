<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */

$args = array( 
  'post_type'       => 'tab',
  'posts_per_page'  => 10,
  'orderby'         => 'menu_order', 
  'order'           => 'ASC' 
);
$tabber = new WP_Query( $args ); ?>

<div class="ut-tabber-wrap">

  <div class="uk-button-group ut-tabber-button" data-uk-switcher="{connect:'#ut-tabber'}">
    <?php while ( $tabber->have_posts() ) : $tabber->the_post(); ?>
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
