<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * @since 1.0
 */
get_header(); ?>
<div class="wrap">
    <article class="uk-padding">
    <h2><?php single_term_title(); ?></h2>
        <ul class="uk-list uk-list-divider">
            <?php
                $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

                $query = new WP_Query( array( 
                    'post_type'       => 'pekeliling',
                    'posts_per_page'  => -1,
                    'paged'           => $paged
                    ));
                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
            ?>  
                <li>
                    <div uk-grid>
                        <div class="uk-width-1-1 uk-width-1-6@s"><span class="uk-label"><?php echo get_post_meta( $post->ID, 'ut_pekeliling_date', true ); ?></span></div>
                        <div class="uk-width-1-1 uk-width-5-6@s uk-margin-remove">
                            <?php the_title( '<h4 class="uk-heading">', '</h4>'); ?>
                            <?php ut_pekeliling_list_file( 'ut_pekeliling_file' ); ?>
                        </div>
                    </div>
                </li>
            <?php endwhile; else: ?>
            <h2><?php _e( 'Nothing Found', 'ukmtheme' ); ?></h2>
            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
            <?php get_search_form(); ?>
            <?php endif; ?>
            <hr>
        </ul>
        <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </article>
</div>
<?php get_footer(); ?>