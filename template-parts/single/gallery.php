<?php
/**
 * Single Gallery Template
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
        <?php while ( have_posts() ) : the_post();
            $gallery_date = get_post_meta( get_the_ID(), 'ut_gallery_date', true );
            $photographer = get_post_meta( get_the_ID(), 'ut_gallery_photographer', true );
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-card uk-card-default uk-card-body' ); ?>>
                <?php the_title( '<h1 class="uk-article-title">', '</h1>' ); ?>
                <p class="uk-article-meta uk-margin-bottom">
                    <?php if ( $gallery_date ) : ?>
                        <span uk-icon="icon: calendar"></span> <?php echo esc_html( $gallery_date ); ?>
                    <?php endif; ?>
                    <?php if ( $photographer ) : ?>
                        &nbsp;|&nbsp;<span uk-icon="icon: camera"></span> <?php echo esc_html( $photographer ); ?>
                    <?php endif; ?>
                </p>

                <div class="uk-margin-medium-top" uk-lightbox="animation: slide">
                    <?php 
                    if ( function_exists( 'ut_lightbox_gallery' ) ) {
                        ut_lightbox_gallery( 'ut_gallery_image', 'post-thumbnail' );
                    }
                    ?>
                </div>

                <div class="entry-content uk-margin-top">
                    <?php the_content(); ?>
                </div>

                <?php get_template_part( 'template-parts/global/content', 'edit' ); ?>
            </article>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>