<?php
/**
 * Video Category Taxonomy Template
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<div class="wrap uk-section uk-section-xsmall">
    <div class="uk-container">
        <header class="page-header uk-margin-bottom">
            <h1 class="page-title uk-heading-line">
                <span><?php esc_html_e( 'Kategori Video: ', 'ukmtheme' ); ?><?php single_term_title(); ?></span>
            </h1>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-small uk-grid-match" uk-grid>
                <?php while ( have_posts() ) : the_post();
                    $video_id  = get_post_meta( get_the_ID(), 'ut_video_id', true );
                    $video_url = get_post_meta( get_the_ID(), 'ut_video_url', true );
                    if ( empty( $video_url ) && ! empty( $video_id ) ) {
                        $video_url = 'https://www.youtube.com/watch?v=' . $video_id;
                    }
                ?>
                    <div>
                        <div class="uk-card uk-card-default uk-box-shadow-small uk-border-rounded uk-overflow-hidden">
                            <div class="uk-card-media-top uk-cover-container" style="height: 200px;">
                                <?php if ( $video_id ) : ?>
                                    <img src="https://i.ytimg.com/vi/<?php echo esc_attr( $video_id ); ?>/hqdefault.jpg" alt="<?php the_title_attribute(); ?>" uk-cover>
                                <?php elseif ( has_post_thumbnail() ) : ?>
                                    <img src="<?php the_post_thumbnail_url( 'medium_large' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                                <?php else : ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/placeholder_thumbnail.svg' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                                <?php endif; ?>
                            </div>
                            <div class="uk-card-body" uk-lightbox>
                                <h4 class="uk-card-title uk-margin-remove">
                                    <a class="uk-link-heading" href="<?php echo esc_url( $video_url ); ?>" data-caption="<?php the_title_attribute(); ?>">
                                        <span uk-icon="icon: play-circle"></span> <?php the_title(); ?>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="uk-margin-top">
                <?php get_template_part( 'template-parts/global/content', 'paginate' ); ?>
            </div>

        <?php else : ?>
            <div class="uk-card uk-card-default uk-card-body">
                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>