<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
 ?>
<a href="#main-tools" class="main-nav-menu-icon" data-uk-offcanvas ><i class="uk-icon-cog"></i></a>
<div id="main-tools" class="uk-offcanvas">
  <div class="uk-offcanvas-bar offcanvas-tools">
    <div class="column">
      <h4><?php _e( 'Theme', 'ukmtheme' ); ?></h4>
       <ul class="theme-switcher">
         <li><a role="button" style="background:<?php echo get_theme_mod( 'primary_color' ); ?>;" class="button-reset-color"></a></li>
         <li><a role="button" style="background:<?php echo get_theme_mod( 'secondary_color' ); ?>;" class="button-option-2"></a></li>
         <li><a role="button" style="background:<?php echo get_theme_mod( 'tertiary_color' ); ?>;" class="button-option-3"></a></li>
       </ul>
    </div>
    <?php
      /**
       * Plugin: Polylang
       * Widget language switcher
       */
      if ( get_theme_mod( 'ukmtheme_polylang_switcher' ) == 1 ) { ?>
        <h4><?php _e( 'Language', 'ukmtheme' ); ?></h4>
        <ul>
          <li>
            <ul>
              <?php pll_the_languages();?>
            </ul>
          </li>
        </ul>
      <?php }
      /**
       * Plugin: Google language switcher
       * Widget language switcher
       */
      if ( get_theme_mod( 'ukmtheme_google_switcher' ) == 1 ) { ?>
        <h4>
          <?php _e( 'Google Translator', 'ukmtheme' ); ?>
        </h4>
        <?php echo do_shortcode('[google-translator]'); ?>
      <?php }
    ?>
  </div>
</div>
