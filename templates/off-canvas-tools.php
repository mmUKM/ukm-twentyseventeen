<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
  ?>
<a href="#main-tools" class="top-nav-tool" data-uk-offcanvas ><?php _e( '<i class="fas fa-language fa-2x"></i>', 'ukmtheme' ); ?></a>
<div id="main-tools" class="uk-offcanvas">
  <div class="uk-offcanvas-bar offcanvas-tools">
    
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
    <?php
    /**
     * Sidebar widget offcanvas
     */ 
    if (dynamic_sidebar( 'sidebar-11' )) : else : ?><?php endif; ?>
    
    <div class="padding-top">
    <h4><?php _e( 'Disclaimer Third Language Translation', 'ukmtheme' ); ?></h4>
    <p>
      <?php _e( 'Please note that the page which will be displayed later after translations have been made is an automatic computer translation. The odds that the content will differ from the original cannot be avoided. We are not responsible on any damage or wrong information which might occur from the contents which has been translated. Official content is only at the original page which is in English or Malay.', 'ukmtheme'); ?>
    </p>
    </div>
  </div>
</div>
