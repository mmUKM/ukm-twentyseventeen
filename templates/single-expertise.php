<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap column">
  <article class="large-12-12 article"></article>
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="column bottom-divider">
        <div class="large-3-12 padding-right">
          <?php
            $expertPhoto = get_post_meta( get_the_ID(),'ut_expertise_photo',true );
            if ( $expertPhoto ) {
              echo '<img src="'.$expertPhoto.'">';
            }
            else {
              echo '<img src="'. get_template_directory_uri() .'/img/placeholder_staff.svg">';
            }
          ?>
        </div>

        <div class="large-9-12 padding-left">
          <h2><?php the_title(); ?></h2>
          <p><strong><?php _e('Email','ukmtheme'); ?>:</strong>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_expertise_email', true ); ?>&nbsp;<strong><?php _e('Phone','ukmtheme'); ?>:</strong>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_expertise_contact', true ); ?></p>
          <p><strong><?php _e( 'Current Position', 'ukmtheme' ) ?>:</strong>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_expertise_position', true ); ?></p>
          <p><strong><?php _e( 'Specialisation', 'ukmtheme' ) ?>:</strong>
          <?php echo get_post_meta( get_the_ID(), 'ut_expertise_specialisation', true ); ?></p>
          <p><strong><?php _e( 'Biography', 'ukmtheme' ) ?>:</strong><br>
          <?php echo get_post_meta( get_the_ID(), 'ut_expertise_biography', true ); ?></p>
        </div>
      </div>
      <div class="bottom-divider">
        <p><strong><?php _e( 'Qualifications', 'ukmtheme' ) ?></strong><br>
        <?php echo get_post_meta( get_the_ID(), 'ut_expertise_qualification', true ); ?></p>
      </div>
      <div class="bottom-divider">
        <p><strong><?php _e( 'Areas of Research', 'ukmtheme' ) ?></strong><br>
        <?php echo get_post_meta( get_the_ID(), 'ut_expertise_research_area', true ); ?></p>
      </div>

      <?php
        /**
         * Senarai item yang boleh disembunyikan
         * 20141121 1357
         */
        $hide_consultation    = get_post_meta( get_the_ID(), 'ut_expertise_research_consultation_hide', true );
        $hide_journal         = get_post_meta( get_the_ID(), 'ut_expertise_journal_hide', true );
        $hide_proceedings     = get_post_meta( get_the_ID(), 'ut_expertise_proceedings_hide', true );
        $hide_book            = get_post_meta( get_the_ID(), 'ut_expertise_book_hide', true );
        $hide_antologi        = get_post_meta( get_the_ID(), 'ut_expertise_antologi_hide', true );
        $hide_monograph       = get_post_meta( get_the_ID(), 'ut_expertise_monograph_hide', true );
        $hide_seminar         = get_post_meta( get_the_ID(), 'ut_expertise_seminar_hide', true );
        $hide_award           = get_post_meta( get_the_ID(), 'ut_expertise_award_hide', true );
        $hide_supervision     = get_post_meta( get_the_ID(), 'ut_expertise_supervision_hide', true );
        $hide_administrative  = get_post_meta( get_the_ID(), 'ut_expertise_administrative_hide', true );
        $hide_reports         = get_post_meta( get_the_ID(), 'ut_expertise_reports_hide', true );
        $hide_research_grant  = get_post_meta( get_the_ID(), 'ut_expertise_research_grant_hide', true );
        $hide_teaching        = get_post_meta( get_the_ID(), 'ut_expertise_teaching_hide', true );
      ?>
      <div class="bottom-divider <?php if ( $hide_consultation == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Research/Consultation/Expansion', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_research_consultation', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_journal == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Publications Journals', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_journal', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_proceedings == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Proceedings', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_proceedings', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_book == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Book', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_book', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_antologi == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Articles in Antologi/Chapters in Book', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_antologi', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_monograph == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Monograph, Working Papers and Non-Periodical Publications', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_monograph', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_seminar == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Seminar', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_seminar', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_award == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Award', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_award', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_supervision == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Supervision', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_supervision', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_administrative == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Administrative Services/Committee', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_administrative', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_reports == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Reports: Technical/Research/Consultation', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_reports', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_research_grant == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Research Grant', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_research_grant', true ) ); ?></p>
      </div>
      <div class="bottom-divider <?php if ( $hide_teaching == on ) { echo 'hidden'; } ?>">
        <p><strong><?php _e( 'Teaching', 'ukmtheme' ) ?></strong><br>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_expertise_teaching', true ) ); ?></p>
      </div>
        <?php endwhile; ?>
        <?php get_template_part( 'templates/content', 'edit' ); ?>
  </article>
</div>
<?php get_footer(); ?>