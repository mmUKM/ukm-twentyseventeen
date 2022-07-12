<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * @since 1.0
 */
get_header();

    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

    $query = new WP_Query( array( 
    'post_type'       => 'news',
    'posts_per_page'  => 10,
    'paged'           => $paged,
    ));

?>
<div class="wrap">
    <article class="uk-padding">
        <h2><?php _e( 'News:&nbsp;', 'ukmtheme' ); ?><?php single_cat_title(); ?></h2>

        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
            <div class="uk-card-media-left uk-cover-container">
            <?php
                if ( has_post_thumbnail() ) { ?> <img src="<?php the_post_thumbnail_url( 'news_thumbnail' ); ?>" uk-cover> <?php }
                else { echo '<img src="' . get_template_directory_uri() . '/images/placeholder_news.svg" uk-cover>'; }
            ?>
            <canvas width="800" height="450"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php the_excerpt(); ?></p>
                </div>
            </div>
        </div>
        <?php endwhile; else: ?>
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
        <?php get_search_form(); ?>
        <?php endif; ?>
    <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </article>
</div>
<?php get_footer(); ?>