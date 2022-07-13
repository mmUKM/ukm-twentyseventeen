<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * @since 1.0
 */
get_header(); ?>

<div class="wrap">
    <article class="uk-padding">
        <h2><?php single_cat_title(); ?></h2>
        <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
            <?php

            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

            $query = new WP_Query( array( 
                'post_type'       => 'gallery',
                'posts_per_page'  => 10,
                'paged'           => $paged
            ));

                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
            ?>
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <?php
                            $cover = get_post_meta( get_the_ID(),'ut_gallery_cover', true );
                            if ( $cover ) { ?>
                            <img src="<?php echo $cover; ?>" alt="">
                            <?php }

                            else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_thumbnail.svg" width="600" height="480" alt="Gallery Cover">
                            <?php }
                        ?>
                    </div>
                    <div class="uk-card-body">
                        <h5><a class="uk-link-heading" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p>
                            <span uk-icon="icon: calendar"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_gallery_date', true ); ?><br/>
                            <span uk-icon="icon: camera"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_gallery_photographer', true ); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endwhile; else: ?>
                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
                <?php endif; ?>
            <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
        </div>
    </article>
</div>
<?php get_footer(); ?>