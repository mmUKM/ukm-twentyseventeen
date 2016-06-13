<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
get_header(); ?>

<?php if ( is_home() ) {
  /**
   * Bagi pengguna ukm-twentyfifteen-child susunan kotak widget boleh ubah mengikut keperluan.
   * Susun semua code di bawah dengan menukar kedudukan nombor
   * Rujuk pembangun untuk penerangan lanjut bagi mewujudkan widget baru
   */
  get_template_part( 'templates/slideshow', 'uikit' );
  
    /**
     * Senarai Widget
     * ====================
     * 00. Sliset
     * 01. Tabber
     * 02. Basic Layout (News with Right Sidebar
     * 03. One Box
     * 04. Two Box
     * 05. Three Box
     * 06. Four Box
     *
     * Widget yang boleh disusun ada yang bernombor berikut:
     */
    /** 00. */ if ( get_theme_mod( 'ukmtheme_frontpage_slideset' ) == 1 ) : get_template_part( 'templates/widget', 'box-slideset' );  endif;
  ?>
  <div class="wrap device-padding">
    <?php
    /** 01. */ if ( get_theme_mod( 'ukmtheme_frontpage_tabber' ) == 1 ) : get_template_part( 'templates/widget', 'box-tabber' );  endif;
    /** 02. */ if ( get_theme_mod( 'ukmtheme_frontpage_basic' ) == 1 ) : get_template_part( 'templates/widget', 'box-basic' );  endif;
    /** 03. */ if ( get_theme_mod( 'ukmtheme_frontpage_one_box' ) == 1 ) : get_template_part( 'templates/widget', 'box-one' );  endif;
    /** 04. */ if ( get_theme_mod( 'ukmtheme_frontpage_two_box' ) == 1 ) : get_template_part( 'templates/widget', 'box-two' );  endif;
    /** 05. */ if ( get_theme_mod( 'ukmtheme_frontpage_three_box' ) == 1 ) : get_template_part( 'templates/widget', 'box-three' );  endif;
    /** 06. */ if ( get_theme_mod( 'ukmtheme_frontpage_four_box' ) == 1 ) : get_template_part( 'templates/widget', 'box-four' );  endif;
    /**
     * Peringatan
     * ====================
     * Jangan ubah/susun kod di atas sekiranya anda mengguna ukm-twentyfifteen-master
     * Susunan akan kembali kepada keadaan asal selepas kemaskini theme dibuat
     * Jika terdapat keraguan, hubungi pembangun theme melalui Facebook di alamat https://www.facebook.com/jrajalu
     */
    ?>
  </div>
  <?php

} else { ?>
  <div class="wrap column device-padding">
    <article class="article large-8-12">
      <?php while ( have_posts() ) : the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
      <?php endwhile;?>
      <?php get_template_part('templates/content','edit' ); ?>
    </article>
    <aside class="aside large-4-12">
      <div class="uk-panel uk-panel-box">
        <?php if (dynamic_sidebar( 'sidebar-1' )) : else : ?><?php endif; ?>
      </div>
    </aside>
  </div>
<?php } ?>

<?php get_footer(); ?>