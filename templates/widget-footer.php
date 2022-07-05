<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
?>
<?php if ( get_theme_mod( 'ukmtheme_footer_widget_basic' ) == 1 ) { ?>
<div class="wrap uk-padding">
    <div class="uk-grid-divider uk-child-width-expand@s" uk-grid>
        <?php if (dynamic_sidebar( 'sidebar-8' )) : else : ?><?php endif; ?>
    </div>
</div>
<?php } ?>
