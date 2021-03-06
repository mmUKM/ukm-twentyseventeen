<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap column">
  <article class="article large-12-12">
    <h2><?php _e('Directory', 'ukmtheme'); ?></h2>

    <?php 
      $query = new WP_Query( array( 
        'post_type'       => 'staff',
        'posts_per_page'  => -1,
        'orderby'         => 'menu_order',
        'order'           => 'ASC'
      ));

      if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
    <div class="column">
      <div class="large-2-12 small-2-12">
          <div class="staff-photo padding-right">
            <?php
              $photo = get_post_meta( $post->ID,'ut_staff_photo',true );
              if ( $photo ) { ?>
              <img src="<?php echo get_post_meta( $post->ID,'ut_staff_photo',true ); ?>" alt="">
              <?php }

              else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_staff.svg">
              <?php }
            ?>
          </div>
      </div>

      <div class="large-8-12 small-8-12">
        <div class="staff-detail padding-left">
          <?php the_title( '<h3>', '</h3>' ); ?>
          <ul>
            <li><?php echo get_the_term_list( $post->ID, 'position', '', '<br>', '' ); ?></li>
            <?php $phone = get_post_meta( get_the_ID(), 'ut_staff_phone_display', true ); ?>
            <?php if ( $phone == on ) { ?>
            <li><i class="uk-icon-phone-square"></i> <?php echo get_post_meta( get_the_ID(), 'ut_staff_phone', true ); ?></li>
            <?php } ?>
            <li><i class="uk-icon-envelope-square"></i> <?php echo get_post_meta( get_the_ID(), 'ut_staff_email', true ); ?></li>
          </ul>
          <?php
           $scope               = get_post_meta($post->ID, 'ut_staff_work_scope', true);
           $scope_desc          = get_post_meta($post->ID, 'ut_staff_work_scope_desc', true);
           $scope_title         = get_post_meta($post->ID, 'ut_staff_work_scope_title', true);
           $scope_title_custom  = get_post_meta($post->ID, 'ut_staff_work_scope_title_custom', true);

            if($scope == on) { 
              if($scope_title == on) { ?>
                <h4><?php echo $scope_title_custom; ?></h4>            
              <?php }          
              else { ?>
                <h3><?php _e( 'Scope of Work','ukmtheme' ); ?></h3>
              <?php } ?>
            <span class="staff-scope">
              <?php echo get_post_meta($post->ID, 'ut_staff_work_scope_desc', true); ?>
            </span>
            <?php }  
            else {
              echo '';
            } ?>
            <?php get_template_part('templates/content','edit' ); ?>
        </div>
      </div>
    </div>
    <hr>
    <?php endwhile; else: ?>
    <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
    <?php get_search_form(); ?>
    <?php endif; ?>
  </article>
</div>
<?php get_footer(); ?>