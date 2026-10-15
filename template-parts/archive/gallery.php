<?php
/**
 * Gallery Archive Template
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
                <span><?php esc_html_e( 'Galeri', 'ukmtheme' ); ?></span>
            </h1>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-small uk-grid-match" uk-grid>
                <?php while ( have_posts() ) : the_post();
                    $cover        = get_post_meta( get_the_ID(), 'ut_gallery_cover', true );
                    $gallery_date = get_post_meta( get_the_ID(), 'ut_gallery_date', true );
                    $photographer = get_post_meta( get_the_ID(), 'ut_gallery_photographer', true );
                ?>
                    <div>
                        <div class="uk-card uk-card-default uk-box-shadow-small uk-border-rounded uk-overflow-hidden">
                            <div class="uk-card-media-top uk-cover-container" style="height: 200px;">
                                <?php if ( $cover ) : ?>
                                    <img src="<?php echo esc_url( $cover ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                                <?php elseif ( has_post_thumbnail() ) : ?>
                                    <img src="<?php the_post_thumbnail_url( 'medium_large' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                                <?php else : ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder_thumbnail.svg' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                                <?php endif; ?>
                            </div>
                            <div class="uk-card-body">
                                <h4 class="uk-card-title uk-margin-remove-bottom">
                                    <a class="uk-link-heading" href="<?php echo esc_url( get_permalink() ); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                <p class="uk-article-meta uk-margin-small-top">
                                    <?php if ( $gallery_date ) : ?>
                                        <span uk-icon="icon: calendar"></span> <?php echo esc_html( $gallery_date ); ?><br/>
                                    <?php endif; ?>
                                    <?php if ( $photographer ) : ?>
                                        <span uk-icon="icon: camera"></span> <?php echo esc_html( $photographer ); ?>
                                    <?php endif; ?>
                                </p>
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