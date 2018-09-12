<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * @since 1.0
 */

  $primary      = get_theme_mod( 'primary_color' );
  $secondary    = get_theme_mod( 'secondary_color' );
  $tertiary     = get_theme_mod( 'tertiary_color' );
  
?>
<style type="text/css">
  .theme-color {
    background: <?php echo $primary; ?>;
  }
  .theme-option-2 {
    background: <?php echo $secondary; ?>;
  }
  .theme-option-3 {
    background: <?php echo $tertiary; ?>;
  }
</style>
