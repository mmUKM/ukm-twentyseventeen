<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
?>
</div <?php // END STICKY FOOTER ?>>
<footer id="footer" uk-sticky="position: bottom">
<?php 

    get_template_part( 'templates/widget', 'footer' ); 

    //block_template_part( 'footer' );

?>
    <div class="uk-padding">
        <div uk-grid>
            <div class="uk-width-1-1 uk-padding">
                <p class="uk-text-center"><?php _e( 'Copyright &copy;&nbsp;', 'ukmtheme' ); ?><?php echo date( 'Y' ); ?>&nbsp;<?php _e( 'Universiti Kebangsaan Malaysia', 'ukmtheme' ); ?></p>
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
</html>
