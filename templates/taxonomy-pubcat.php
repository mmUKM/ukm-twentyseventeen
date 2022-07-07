<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap">
    <article class="uk-padding">
        <h2><?php single_cat_title(); ?></h2>
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

        $query = new WP_Query( array(
        'post_type'       => 'publication',
        'pubcat'          => get_query_var( 'pubcat' ),
        'posts_per_page'  => 10,
        'paged'           => $paged
        ));

        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <div uk-grid>
            <div class="uk-width-1-6@s uk-width-1-1">
                <?php
                    if ( get_post_meta( $post->ID, 'ut_publication_cover', true ) ) { ?>
                        <img src="<?php echo get_post_meta( $post->ID, 'ut_publication_cover', true ); ?>" width="130" height="165" alt="<?php the_title(); ?>">
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder_publication.svg" width="130" height="165">
                    <?php }
                ?>
            </div>
            <div class="uk-width-5-6@s uk-width-1-1">
                <?php the_title( '<h3>', '</h3>' ); ?>
                <ul uk-grid>
                    <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="user"></span>&nbsp;<?php echo get_post_meta( $post->ID, 'ut_publication_author', true ); ?></li>
                    <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="print"></span>&nbsp;<?php echo get_post_meta( $post->ID, 'ut_publication_publisher', true ); ?></li>
                    <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="calendar"></span>&nbsp;<?php echo get_post_meta( $post->ID, 'ut_publication_year', true ); ?></li>
                    <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="link"></span>&nbsp;<a href="<?php echo get_post_meta( $post->ID, 'ut_publication_reference', true ); ?>">Download</a></li>
                </ul>
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