<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @since 1.0
 */
get_header(); ?>
<div class="wrap column">
  <article class="article large-12-12">
    <h2><?php _e( 'Journal', 'ukmtheme' ); ?>&nbsp;&#58;&nbsp;<?php single_cat_title(); ?></h2>
      <?php
      $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

      $query = new WP_Query( array( 
        'post_type'       => 'journal',
        'jourcat'         => get_query_var( 'jourcat' ),
        'posts_per_page'  => 10,
        'paged'           => $paged,
      ));
      
      if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="column">
        <div class="large-10-12">
          <?php the_title( '<h3>', '</h3>' ); ?>
          <p><em><?php echo get_post_meta( $post->ID, 'ut_journal_author', true ); ?></em><br>
          <?php echo get_the_term_list( $post->ID, 'jourkey', _e( 'Keywords: ', 'ukmtheme' ), ', ', '' ); ?></p>
        </div>
        <div class="large-2-12">
          <i class="uk-icon-file-pdf-o"></i>&nbsp;<a href="<?php echo get_post_meta( $post->ID, 'ut_journal_reference', true ); ?>"><?php _e( 'Download', 'ukmtheme' ); ?></a>
        </div>
      </div>
      <hr>
      <?php endwhile; else: ?>
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
        <?php get_search_form(); ?>
      <?php endif; ?>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
</div>
<?php get_footer(); ?>