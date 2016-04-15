<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
?>
</div><!-- stickyfooter -->
<footer class="footer">
  <div class="wrap device-padding">
    <div class="uk-grid uk-grid-divider" data-uk-grid-match="">
      <?php if (dynamic_sidebar( 'sidebar-5' )) : else : ?><?php endif; ?>
    </div>  
  </div>
  <div class="copyright-with-navigation">
    <div class="wrap column">
      <div class="large-12-12">
        <p class="ut-copyright"><?php _e( 'Copyright &copy;&nbsp;', 'ukmtheme' ); ?><?php echo date( 'Y' ); ?>&nbsp;<?php _e( 'The National University of Malaysia', 'ukmtheme' ); ?></p>
        <?php 
          wp_nav_menu(
            array(
            'theme_location'  => 'footer',
            'menu'            => 'Footer Navigation',
            'menu_class'      => 'footer-nav',
          )); 
        ?>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html><?php echo '<!-- UKM Twenty Seventeen v-' . wp_get_theme()->get( 'Version' ) . ' @http://www.ukm.my/templates -->'; ?>