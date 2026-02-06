<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap">
    <article class="uk-padding">
        
        <h2><?php _e( 'Kelestarian', 'ukmtheme' ) ; ?></h2>
        <div class="uk-grid-match uk-child-width-1-3@s" uk-grid>
            <?php

                $query = new WP_Query( array( 
                'post_type'       => 'kelestarian', 
                'posts_per_page'  => -1, 
                'orderby'         => 'menu_order', 
                'order'           => 'ASC' 
                ));

            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <?php ut_kelestarian_gallery( 'ut_kelestarian_foto', 'post-thumbnail' ); ?>
                    </div>
                    <div class="uk-card-body">
                        <p>
                            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                        </p>
                    </div>
                </div>
            </div>
            <?php endwhile; else: ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'ukmtheme' ); ?></p>  
            <?php endif; ?>
        </div>
        <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </article>
</div>
<?php get_footer(); ?>