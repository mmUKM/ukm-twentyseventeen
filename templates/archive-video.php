<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * @since 1.0
 */
get_header(); ?>
<div class="wrap">
    <article class="uk-padding">
        <h2><?php _e( 'Video', 'ukmtheme' ); ?></h2>
        <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
        <?php
        
        $query = new WP_Query( array( 
            'post_type'       => 'video',
            'position'        => get_query_var( 'video' ),
            'posts_per_page'  => 10,
        ));
        
        
        while ( $query->have_posts() ) : $query->the_post(); ?>
        <div>
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top">
                    <?php
                    if ( get_post_meta( get_the_ID(), 'ut_video_id', 1 ) ) {
                        $video_id = get_post_meta( get_the_ID(), 'ut_video_id', 1 );
                        echo '<img src="https://i.ytimg.com/vi_webp/'. $video_id .'/sddefault.webp" style="height:100%;width:100%;">';
                    }
                    else {
                        echo '<img src="' . get_template_directory_uri() . '/img/placeholder_thumbnail.svg" style="height:100%;width:100%;"/>';
                    }
                    ?>
                </div>
                <div class="uk-card-body" uk-lightbox>
                    <p>
                        <a class="uk-link-heading" href="<?php
                            $url = esc_url( get_post_meta( get_the_ID(), 'ut_video_url', 1 ) );
                            echo $url ?>" data-caption="YouTube">
                            <?php the_title(); ?>&nbsp;
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        </div>
        <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </article>
</div>
<?php get_footer(); ?>