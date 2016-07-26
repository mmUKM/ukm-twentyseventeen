<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
?>
<?php if ( get_theme_mod( 'ukmtheme_footer_widget_five' ) == 1 ) { ?>
<div class="wrap padding-top padding-bottom device-padding">
  <div class="uk-grid" data-uk-grid-match="">
    <?php if (dynamic_sidebar( 'sidebar-5' )) : else : ?><?php endif; ?>
  </div>
</div>
<?php } ?>
<?php if ( get_theme_mod( 'ukmtheme_footer_widget_four' ) == 1 ) { ?>
<div class="wrap padding-top padding-bottom device-padding">
  <div class="uk-grid" data-uk-grid-match="">
    <?php if (dynamic_sidebar( 'sidebar-6' )) : else : ?><?php endif; ?>
  </div>
</div>
<?php } ?>
<?php if ( get_theme_mod( 'ukmtheme_footer_widget_three' ) == 1 ) { ?>
<div class="wrap padding-top padding-bottom device-padding">
  <div class="uk-grid" data-uk-grid-match="">
    <?php if (dynamic_sidebar( 'sidebar-7' )) : else : ?><?php endif; ?>
  </div>
</div>
<?php } ?>
<?php if ( get_theme_mod( 'ukmtheme_footer_widget_two' ) == 1 ) { ?>
<div class="wrap padding-top padding-bottom device-padding">
  <div class="uk-grid" data-uk-grid-match="">
    <?php if (dynamic_sidebar( 'sidebar-8' )) : else : ?><?php endif; ?>
  </div>
</div>
<?php } ?>
<?php if ( get_theme_mod( 'ukmtheme_footer_widget_one' ) == 1 ) { ?>
<div class="wrap padding-top padding-bottom device-padding">
  <div class="uk-grid" data-uk-grid-match="">
    <?php if (dynamic_sidebar( 'sidebar-9' )) : else : ?><?php endif; ?>
  </div>
</div>
<?php } ?>
