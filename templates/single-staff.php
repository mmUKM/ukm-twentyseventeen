<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap column">
  <article class="article large-12-12">
    <?php while ( have_posts() ) : the_post(); ?>
     <h2><?php the_title(); ?></h2>
    <div class="column">
      <div class="sm-large-3-12">
          <div class="staff-photo padding-right">
            <?php
              $staff_photo = get_post_meta($post->ID,'ut_staff_photo',true);
              if ( $staff_photo ) { ?>
              <img src="<?php echo get_post_meta($post->ID,'ut_staff_photo',true); ?>" alt="">
              <?php }

              else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_staff.svg">
              <?php }
            ?>
          </div>
      </div>

      <div class="sm-large-9-12">
        <div class="staff-detail padding-left">
          <ul>
            <li><?php echo get_the_term_list( $post->ID, 'position', '', ', ', '' ); ?></li>
            <li><i class="uk-icon-phone-square"></i> <?php echo get_post_meta($post->ID, 'ut_staff_phone', true); ?></li>
            <li><i class="uk-icon-envelope-square"></i> <?php echo get_post_meta($post->ID, 'ut_staff_email', true); ?></li>
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
        </div>
      </div>
    </div>
    <hr>
    <?php endwhile; ?>
  </article>
</div>
<?php get_template_part('templates/content','edit' ); ?>
<?php get_footer(); ?>