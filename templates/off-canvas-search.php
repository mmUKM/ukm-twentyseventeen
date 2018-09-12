<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
 ?>
<a href="#ut-search" class="main-nav-menu-icon" data-uk-offcanvas ><i class="uk-icon-search"></i></a>
<div id="ut-search" class="uk-offcanvas">
  <div class="uk-offcanvas-bar offcanvas-tools">
    <form role="search" method="get" id="searchform" class="uk-search searchform" action="<?php echo home_url( '/' ); ?>">
      <input class="uk-search-field" type="search" placeholder="<?php _e( 'Search...','ukmtheme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s">
    </form>
    <?php
    /**
     * Off-canvas search area
     * Add widget Area 12
     */
    if (dynamic_sidebar( 'sidebar-12' )) : else : ?><?php endif; ?>
  </div>
</div>