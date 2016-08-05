<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
 ?>
<a href="#ut-search" class="main-nav-menu-icon" data-uk-offcanvas ><i class="uk-icon-search"></i></a>
<div id="ut-search" class="uk-offcanvas">
  <div class="uk-offcanvas-bar">
    <form role="search" method="get" id="searchform" class="uk-search searchform" action="<?php echo home_url( '/' ); ?>">
      <input class="uk-search-field" type="search" placeholder="<?php _e( 'Search...','ukmtheme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s">
    </form>
  </div>
</div>
