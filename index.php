<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
get_header(); ?>

<?php if ( is_home() ) {

  get_template_part( 'templates/slideshow', 'uikit' );

  if ( get_theme_mod( 'ukmtheme_frontpage_slideset' ) == 1 ) : get_template_part( 'templates/widget', 'box-slideset' );  endif;
  if ( get_theme_mod( 'ukmtheme_frontpage_one_box' ) == 1 ) : get_template_part( 'templates/widget', 'box-one' );  endif;
  
  get_template_part( 'templates/widget', 'home' );

} else { ?>
  <div class="wrap column device-padding">
    <article class="article large-8-12">
      <?php while ( have_posts() ) : the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
      <?php endwhile;?>
      <?php get_template_part('templates/content','edit' ); ?>
    </article>
    <aside class="aside large-4-12">
      <div class="uk-panel uk-panel-box">
        <?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?><?php endif; ?>
      </div>
    </aside>
  </div>
<?php } ?>

<?php get_footer(); ?>
