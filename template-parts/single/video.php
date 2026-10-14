<?php
/**
 * Single Video Template
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<div class="wrap uk-section uk-section-xsmall">
    <div class="uk-container uk-container-small">
        <?php while ( have_posts() ) : the_post();
            $video_url = get_post_meta( get_the_ID(), 'ut_video_url', true );
            $video_id  = get_post_meta( get_the_ID(), 'ut_video_id', true );
            if ( empty( $video_url ) && ! empty( $video_id ) ) {
                $video_url = 'https://www.youtube.com/watch?v=' . $video_id;
            }
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-card uk-card-default uk-card-body' ); ?>>
                <?php the_title( '<h1 class="uk-article-title">', '</h1>' ); ?>
                
                <p class="uk-article-meta">
                    <span uk-icon="icon: calendar"></span> <?php echo get_the_date(); ?>
                    <?php if ( get_the_term_list( get_the_ID(), 'vidcat' ) ) : ?>
                        &nbsp;|&nbsp;<span uk-icon="icon: tag"></span> <?php echo get_the_term_list( get_the_ID(), 'vidcat', '', ', ', '' ); ?>
                    <?php endif; ?>
                </p>

                <?php if ( ! empty( $video_url ) ) : ?>
                    <div class="uk-margin-medium-top uk-responsive-width" uk-responsive>
                        <?php echo wp_oembed_get( esc_url( $video_url ) ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content uk-margin-top">
                    <?php the_content(); ?>
                </div>

                <div class="uk-margin-top uk-text-center">
                    <a class="uk-button uk-button-default uk-border-rounded" href="<?php echo esc_url( get_post_type_archive_link( 'video' ) ); ?>">
                        <span uk-icon="icon: arrow-left"></span> <?php esc_html_e( 'Kembali ke Arkib Video', 'ukmtheme' ); ?>
                    </a>
                </div>

                <?php get_template_part( 'template-parts/global/content', 'edit' ); ?>
            </article>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>