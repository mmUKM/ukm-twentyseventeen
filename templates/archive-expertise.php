<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap column">
  <article class="article large-12-12">
    <h2><?php _e( 'Expertise', 'ukmtheme' ) ; ?></h2>
    <?php

      $query = new WP_Query( array( 
        'post_type'       => 'expertise', 
        'posts_per_page'  => -1, 
        'orderby'         => 'menu_order', 
        'order'           => 'ASC' 
      ));

    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="column bottom-divider">
        <div class="large-3-12 padding-right">
          <?php
            $photo = get_post_meta( $post->ID,'ut_expertise_photo',true );
            if ( $photo ) {
              echo '<img src="'.$photo.'">';
            }
            else {
              echo '<img src="'. get_template_directory_uri() .'/img/placeholder_staff.svg">';
            }
          ?>
        </div>
        <div class="large-9-12 staff-detail padding-left">
          <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>

          <ul>
            <li><?php echo get_post_meta($post->ID, 'ut_expertise_position', true); ?></li>
            <li><i class="uk-icon-phone-square"></i> <?php echo get_post_meta( $post->ID, 'ut_expertise_contact', true ); ?></li>
            <li><i class="uk-icon-envelope-square"></i> <?php echo get_post_meta( $post->ID, 'ut_expertise_email', true ); ?></li>
          </ul>
          <p>
            <strong><?php _e( 'Specialisation', 'ukmtheme' ) ?></strong><br>
            <?php echo get_post_meta( $post->ID, 'ut_expertise_specialisation', true ); ?>
          </p>
        </div>
      </div>
    <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.', 'ukmtheme' ); ?></p>  
    <?php endif; ?>
    <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
</div>
<?php get_footer(); ?>