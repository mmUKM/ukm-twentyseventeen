<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>

<div class="wrap">
    <article class="uk-padding">
        
        <h2><?php single_cat_title(); ?></h2>
        <div class="uk-grid-match uk-child-width-1-3@s" uk-grid>
            
            <?php
                $query = new WP_Query( array(
                    'post_type'      => 'kelestarian',
                    'lestaricat'     => get_query_var( 'lestaricat' ),
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ));

                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
                    // Ambil senarai term (tahun) dan buang tag HTML / hyperlink <a>
                    $lestari_year = get_the_term_list( $post->ID, 'lestariyear', '', ', ', '' );
                    $plain_year   = ! empty( $lestari_year ) ? wp_strip_all_tags( $lestari_year ) : '';
            ?>

            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <?php ut_kelestarian_gallery( 'ut_kelestarian_foto', 'post-thumbnail' ); ?>
                    </div>
                    <div class="uk-card-body">
                        <p>
                            <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
                        </p>
                        <?php if ( $plain_year ) : ?>
                            <div class="uk-card-badge uk-label"><?php echo esc_html( $plain_year ); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <?php 
                endwhile; 
                wp_reset_postdata(); // Reset query selepas WP_Query
            else: 
            ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'ukmtheme' ); ?></p>  
            <?php endif; ?>

        </div>
        <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </article>
</div>

<?php get_footer(); ?>