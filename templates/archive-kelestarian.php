<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap">
    <article class="uk-padding">
        
        <h2><?php _e( 'Kelestarian', 'ukmtheme' ) ; ?></h2>
        <div class="uk-padding" uk-grid>
                <?php

                    $query = new WP_Query( array( 
                    'post_type'       => 'kelestarian', 
                    'posts_per_page'  => -1, 
                    'orderby'         => 'menu_order', 
                    'order'           => 'ASC' 
                    ));

                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
            
                <div class="uk-width-3-4">
                    <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                </div>
                    <?php endwhile; else: ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.', 'ukmtheme' ); ?></p>  
                    <?php endif; ?>
                    
            
        </div>
        <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </article>
</div>
<?php get_footer(); ?>