<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
?>
<!DOCTYPE html>
<?php echo '<!-- WP UKMTheme v-' . wp_get_theme()->get( 'Version' ) . ' by Jamaludin Rajalu -->'; ?>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-wrap">
<header class="header-wrap">
  <div class="header">
    <div class="wrap column">
      <div class="large-6-12 small-hidden logo">
        <?php if ( get_post_meta( get_the_ID(), 'ut_conference_logo', true ) ) : ?>
          <a href="<?php echo get_permalink( $post->ID ); ?>" rel="home">
            <img src="<?php echo get_post_meta( get_the_ID(), 'ut_conference_logo', true ); ?>" alt="<?php echo the_title(); ?>">
          </a>
        <?php else : ?>
          <a href="<?php echo get_permalink( $post->ID ); ?>" rel="home">
            <img src="<?php echo get_template_directory_uri() . '/img/logo-black-text.svg'; ?>" alt="<?php echo get_bloginfo('name'); ?>">
          </a>
        <?php endif; ?>
      </div>
      <div class="large-6-12">
        <div class="column">
          <h1 class="conference-site-name"><?php the_title(); ?></h1>
        </div>
      </div>
  </div>
</header>
<nav class="main-nav" role="navigation" data-uk-sticky="{media:'(min-width: 959px)'}">
  <div class="wrap column">
    <div class="large-11-12 small-11-12">
      <div id="ConferenceMenu">
        <?php
          $content_1 = get_post_meta( get_the_ID(), 'ut_conference_title_1_hide', true );
          $content_2 = get_post_meta( get_the_ID(), 'ut_conference_title_2_hide', true );
          $content_3 = get_post_meta( get_the_ID(), 'ut_conference_title_3_hide', true );
          $content_4 = get_post_meta( get_the_ID(), 'ut_conference_title_4_hide', true );
          $content_5 = get_post_meta( get_the_ID(), 'ut_conference_title_5_hide', true );
          $content_6 = get_post_meta( get_the_ID(), 'ut_conference_title_6_hide', true );
          $content_7 = get_post_meta( get_the_ID(), 'ut_conference_title_7_hide', true );
          $content_8 = get_post_meta( get_the_ID(), 'ut_conference_title_8_hide', true );
          $content_9 = get_post_meta( get_the_ID(), 'ut_conference_title_9_hide', true );
          $content_10 = get_post_meta( get_the_ID(), 'ut_conference_title_10_hide', true );
        ?>
          <ul class data-uk-switcher="{connect:'#extd-content'}">
            <li><a href=""><?php _e( 'Home', 'ukmtheme' ); ?></a></li>
              <?php
              // Title #1
              if ( $content_1 == on ) {
                ?>
                <li>
                  <a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_1', true ); ?></a>
                </li>
                <?php
              }
              // Title #2
              if ( $content_2 == on ) {
                ?>
                <li>
                  <a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_2', true ); ?></a>
                </li>
                <?php
              }
              // Title #3
              if ( $content_3 == on ) {
                ?>
                <li>
                  <a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_3', true ); ?></a>
                </li>
                <?php
              }
              // Title #4
              if ( $content_4 == on ) {
                ?>
                <li>
                  <a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_4', true ); ?></a>
                </li>
                <?php
              }
              // Title #5
              if ( $content_5 == on ) {
                ?>
                <li>
                  <a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_5', true ); ?></a>
                </li>
                <?php
              }
              // Title #6
              if ( $content_6 == on ) {
                ?>
                <li>
                  <a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_6', true ); ?></a>
                </li>
                <?php
              }
              // Title #7
              if ( $content_7 == on ) {
                ?>
                <li>
                  <a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_7', true ); ?></a>
                </li>
                <?php
              }
              // Title #8
              if ( $content_8 == on ) {
                ?>
                <li>
                  <a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_8', true ); ?></a>
                </li>
                <?php
              } ?>
              <li><a href=""><?php _e( 'Gallery', 'ukmtheme' ); ?></a></li>
              <?php
              // Title #9
              if ( $content_9 == on ) {
                ?>
                <li>
                  <a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_9', true ); ?></a>
                </li>
                <?php
              }
              // Title #10
              if ( $content_10 == on ) {
                ?>
                <li>
                  <a href=""><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_10', true ); ?></a>
                </li>
                <?php
              }
              ?>
          </ul>
      </div>
    </div>
    <div class="large-1-12 small-1-12">
    <?php get_template_part( 'templates/off', 'canvas-search' );?>
    </div>
  </div>
</nav>
<div class="wrap column">
  <article class="large-12-12 article">
  <ul id="extd-content" class="uk-switcher uk-margin">
    <li>
        <?php while ( have_posts() ) : the_post(); ?>
        <h1 style="margin:0;"><?php the_title(); ?></h1>
        <h3 style="margin:0 0 20px 0;">
          <?php _e('Date:&nbsp;','ukmtheme'); ?><?php echo get_post_meta( get_the_ID(), 'ut_conference_date_start', true ); ?>
          &nbsp;-&nbsp;
          <?php echo get_post_meta( get_the_ID(), 'ut_conference_date_end', true ); ?><br>
          <?php _e('Venue:&nbsp;','ukmtheme'); ?><?php echo get_post_meta( get_the_ID(), 'ut_conference_venue', true ); ?>
        </h3>
        <!--Slideshow for Banner-->
        <div class="uk-slidenav-position" data-uk-slideshow="{animation:'slice-up-down', autoplay:true, autoplayInterval:6000}">
          <?php ut_conference_slideshow( 'ut_conference_slide_image', 'full' ); ?>
          <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)"></a>
          <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)"></a>
        </div>
        <hr><!--Introduction-->
        <h2><?php _e( 'Introduction', 'ukmtheme' ); ?></h2>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_introduction', true ) ); ?>
        <hr><!--Keynote Speaker-->
        <h2><?php _e( 'Speakers', 'ukmtheme' ); ?></h2>
        <div data-uk-slideset="{default: 4, autoplay:true, autoplayInterval:6000}">
          <div class="uk-slidenav-position">
            <?php ut_conference_keynote( 'ut_conference_keynote_image', 'full' ); ?>
            <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
          </div>
        </div>
        <hr><!--Organizer-->
        <h2><?php _e( 'Organiser', 'ukmtheme' ); ?></h2>
        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_conference_organizer', true ) ); ?>
      <?php endwhile; ?>
    </li>
    <?php
      // Content #1
      if ( $content_1 == on ) {
        ?>
        <li>
          <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_1', true ); ?></h1>
          <?php
            $wysiwyg_1 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_1', true ) );
            echo $wysiwyg_1;
          ?>
        </li>
        <?php
      }
      // Content #2
      if ( $content_2 == on ) {
        ?>
        <li>
          <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_2', true ); ?></h1>
          <?php
            $wysiwyg_2 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_2', true ) );
            echo $wysiwyg_2;
          ?>
        </li>
        <?php
      }
      // Content #3
      if ( $content_3 == on ) {
        ?>
        <li>
          <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_3', true ); ?></h1>
            <?php
            $wysiwyg_3 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_3', true ) );
            echo $wysiwyg_3;
          ?>
        </li>
        <?php
      }
      // Content #4
      if ( $content_4 == on ) {
        ?>
        <li>
          <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_4', true ); ?></h1>
          <?php
            $wysiwyg_4 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_4', true ) );
            echo $wysiwyg_4;
          ?>
        </li>
        <?php
      }
      // Content #5
      if ( $content_5 == on ) {
        ?>
        <li>
          <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_5', true ); ?></h1>
          <?php
            $wysiwyg_5 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_5', true ) );
            echo $wysiwyg_5;
          ?>
        </li>
        <?php
      }
      // Content #6
      if ( $content_6 == on ) {
        ?>
        <li>
          <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_6', true ); ?></h1>
          <?php
            $wysiwyg_6 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_6', true ) );
            echo $wysiwyg_6;
          ?>
        </li>
        <?php
      }
      // Content #7
      if ( $content_7 == on ) {
        ?>
        <li>
          <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_7', true ); ?></h1>
          <?php
            $wysiwyg_7 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_7', true ) );
            echo $wysiwyg_7;
          ?>
        </li>
        <?php
      }
      // Content #8
      if ( $content_8 == on ) {
        ?>
        <li>
          <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_8', true ); ?></h1>
          <?php
            $wysiwyg_8 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_8', true ) );
            echo $wysiwyg_8;
          ?>
        </li>
        <?php
      } ?>
      <li>
        <h1><?php _e( 'Gallery', 'ukmtheme' ); ?></h1>
        <p><?php ut_lightbox_gallery( 'ut_conference_gallery', 'post-thumbnail' ); ?></p>
      </li>
      <?php
      // Content #9
      if ( $content_9 == on ) {
        ?>
        <li>
          <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_9', true ); ?></h1>
          <?php
            $wysiwyg_9 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_9', true ) );
            echo $wysiwyg_9;
          ?>
        </li>
        <?php
      }
      // Content #10
      if ( $content_10 == on ) {
        ?>
        <li>
          <h1><?php echo get_post_meta( get_the_ID(), 'ut_conference_title_ext_10', true ); ?></h1>
          <?php
            $wysiwyg_10 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_ext_content_10', true ) );
            echo $wysiwyg_10;
          ?>
        </li>
        <?php
      } ?>
  </ul>
<?php // END Tabeer Content ?>
    <?php get_template_part( 'templates/content', 'edit' ); ?>
  </article>
</div>
</div><!-- stickyfooter -->
<footer class="footer">
<div class="wrap padding-top padding-bottom device-padding">
  <div class="uk-grid">
  <div class="uk-width-medium-1-3">
    <?php
      $wysiwyg_footer_1 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_footer_1', true ) );
      echo $wysiwyg_footer_1;
    ?>
  </div>
  <div class="uk-width-medium-1-3">
    <?php
      $wysiwyg_footer_2 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_footer_2', true ) );
      echo $wysiwyg_footer_2;
    ?>
  </div>
  <div class="uk-width-medium-1-3">
    <?php
      $wysiwyg_footer_3 = apply_filters( 'the_content', get_post_meta( get_the_ID(), 'ut_conference_footer_3', true ) );
      echo $wysiwyg_footer_3;
    ?>
  </div>
  </div>
</div>
  <div class="copyright-with-navigation">
    <div class="wrap column">
      <div class="large-12-12">
        <p class="ut-copyright"><?php _e( 'Copyright &copy;&nbsp;', 'ukmtheme' ); ?><?php echo date( 'Y' ); ?>&nbsp;<?php _e( 'Universiti Kebangsaan Malaysia', 'ukmtheme' ); ?></p>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>