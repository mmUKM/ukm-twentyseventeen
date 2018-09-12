<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
  $content_1 = get_post_meta( get_the_ID(), 'ut_conference_title_1_hide', true );
  $content_2 = get_post_meta( get_the_ID(), 'ut_conference_title_2_hide', true );
  $content_3 = get_post_meta( get_the_ID(), 'ut_conference_title_3_hide', true );
  $content_4 = get_post_meta( get_the_ID(), 'ut_conference_title_4_hide', true );
  $content_5 = get_post_meta( get_the_ID(), 'ut_conference_title_5_hide', true );
  $content_6 = get_post_meta( get_the_ID(), 'ut_conference_title_6_hide', true );
  ?>
  <div class="uk-button-group ut-tabber-button" data-uk-switcher="{connect:'#extd-content'}">
    <?php
    // Title #1
    if ( $content_1 == on ) {
      ?>
      <button class="uk-button uk-button-large" type="button">
        <?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_1', true ); ?>
      </button>
      <?php
    }
    // Title #2
    if ( $content_2 == on ) {
      ?>
      <button class="uk-button uk-button-large" type="button">
        <?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_2', true ); ?>
      </button>
      <?php
    }
    // Title #3
    if ( $content_3 == on ) {
      ?>
      <button class="uk-button uk-button-large" type="button">
        <?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_3', true ); ?>
      </button>
      <?php
    }
    // Title #4
    if ( $content_4 == on ) {
      ?>
      <button class="uk-button uk-button-large" type="button">
        <?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_4', true ); ?>
      </button>
      <?php
    }
    // Title #5
    if ( $content_5 == on ) {
      ?>
      <button class="uk-button uk-button-large" type="button">
        <?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_5', true ); ?>
      </button>
      <?php
    }
    // Title #6
    if ( $content_6 == on ) {
      ?>
      <button class="uk-button uk-button-large" type="button">
        <?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_6', true ); ?>
      </button>
      <?php
    }
    ?>
  </div>
  <?php // Closing Tabber Button ?>
  <ul id="extd-content" class="uk-switcher uk-margin">
    <?php
      // Content #1
      if ( $content_1 == on ) {
        ?>
        <li>
          <h3><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_1', true ); ?></h3>
          <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_ext_content_1', true ) ); ?>
        </li>
        <?php
      }
      // Content #2
      if ( $content_2 == on ) {
        ?>
        <li>
          <h3><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_2', true ); ?></h3>
          <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_ext_content_2', true ) ); ?>
        </li>
        <?php
      }
      // Content #3
      if ( $content_3 == on ) {
        ?>
        <li>
          <h3><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_3', true ); ?></h3>
          <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_ext_content_3', true ) ); ?>
        </li>
        <?php
      }
      // Content #4
      if ( $content_4 == on ) {
        ?>
        <li>
          <h3><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_4', true ); ?></h3>
          <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_ext_content_4', true ) ); ?>
        </li>
        <?php
      }
      // Content #5
      if ( $content_5 == on ) {
        ?>
        <li>
          <h3><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_5', true ); ?></h3>
          <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_ext_content_5', true ) ); ?>
        </li>
        <?php
      }
      // Content #6
      if ( $content_6 == on ) {
        ?>
        <li>
          <h3><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_6', true ); ?></h3>
          <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_ext_content_6', true ) ); ?>
        </li>
        <?php
      } ?>
  </ul>
<?php // END Tabeer Content ?>