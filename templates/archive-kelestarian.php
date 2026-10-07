<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>

<div class="wrap">
    <article class="uk-padding">
        
        <h2><?php _e( 'Kelestarian', 'ukmtheme' ); ?></h2>
        
        <div class="uk-grid-match uk-child-width-1-3@s" uk-grid>
            <?php
            $query = new WP_Query( array( 
                'post_type'      => 'kelestarian', 
                'posts_per_page' => -1, 
                'orderby'        => 'date', // Disusun mengikut tarikh penerbitan
                'order'          => 'DESC'  // Post terkini dipaparkan paling atas
            ) );

            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post(); 
                    
                    // Ambil terma taxonomy lestariyear dan buang tag HTML / link <a>
                    $terms_list  = get_the_term_list( get_the_ID(), 'lestariyear', '', ', ', '' );
                    $plain_terms = ! empty( $terms_list ) ? wp_strip_all_tags( $terms_list ) : '';
            ?>

                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <?php ut_kelestarian_gallery( 'ut_kelestarian_foto', 'post-thumbnail' ); ?>
                        </div>
                        <div class="uk-card-body">
                            <p>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </p>
                            
                            <?php if ( $plain_terms ) : ?>
                                <!-- Badge Label Tahun daripada taksonomi lestariyear (tanpa pautan <a>) -->
                                <div class="uk-card-badge uk-label"><?php echo esc_html( $plain_terms ); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php 
                endwhile;
                wp_reset_postdata(); // Pembersihan data kueri WordPress
            else : ?>

                <p><?php _e( 'Sorry, no posts matched your criteria.', 'ukmtheme' ); ?></p>

            <?php endif; ?>
        </div>

        <div>
            <?php get_template_part( 'templates/content', 'paginate' ); ?>
        </div>

    </article>
</div>

<?php get_footer(); ?>