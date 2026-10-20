<?php
/**
 * Publication Archive Template
 *
 * Layout: UIKit Card Media Top 3-Column Grid
 * Displays: Book Cover, Title, Price, and Dynamic Action Button linking to single publication.
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
                <span><?php post_type_archive_title( '', true ); ?></span>
            </h1>
            <?php the_archive_description( '<div class="archive-description uk-text-muted uk-margin-small-top">', '</div>' ); ?>
        </header>

        <?php
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $publication_query = new WP_Query( array(
            'post_type'      => 'publication',
            'posts_per_page' => get_option( 'posts_per_page' ),
            'paged'          => $paged,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ) );

        if ( $publication_query->have_posts() ) : ?>
            <div class="uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-match uk-grid-medium" uk-grid>
                <?php while ( $publication_query->have_posts() ) : $publication_query->the_post();
                    $pub_cover = get_post_meta( get_the_ID(), 'ut_publication_cover', true );
                    if ( empty( $pub_cover ) && has_post_thumbnail() ) {
                        $pub_cover = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                    }
                    if ( empty( $pub_cover ) ) {
                        $pub_cover = get_template_directory_uri() . '/assets/images/placeholder_publication.svg';
                    }

                    $author    = get_post_meta( get_the_ID(), 'ut_publication_author', true );
                    $price     = get_post_meta( get_the_ID(), 'ut_publication_price', true );
                    $btn_label = function_exists( 'ukmtheme_get_publication_btn_label' )
                        ? ukmtheme_get_publication_btn_label( get_the_ID() )
                        : __( 'Get Copy', 'ukmtheme' );
                ?>
                    <div>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-card uk-card-default uk-box-shadow-small uk-box-shadow-hover-medium uk-border-rounded uk-overflow-hidden uk-flex uk-flex-column publication-card' ); ?>>
                            
                            <!-- UIKit Card Media Top: Cover Buku -->
                            <div class="uk-card-media-top uk-text-center uk-position-relative publication-card-media">
                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="uk-display-block uk-inline-clip uk-transition-toggle" aria-label="<?php the_title_attribute(); ?>">
                                    <div class="publication-cover-box uk-flex uk-flex-center uk-flex-middle">
                                        <img src="<?php echo esc_url( $pub_cover ); ?>" alt="<?php the_title_attribute(); ?>" class="publication-cover-img uk-transition-scale-up uk-transition-opaque uk-border-rounded uk-box-shadow-small">
                                    </div>
                                </a>
                            </div>

                            <!-- UIKit Card Body: Tajuk, Harga & Butang Dapatkan -->
                            <div class="uk-card-body uk-flex-1 uk-flex uk-flex-column uk-padding-small">
                                <?php if ( ! empty( $author ) ) : ?>
                                    <p class="uk-text-meta uk-margin-remove-top uk-margin-small-bottom uk-text-truncate" title="<?php echo esc_attr( $author ); ?>">
                                        <span uk-icon="icon: user; ratio: 0.8"></span> <?php echo esc_html( $author ); ?>
                                    </p>
                                <?php endif; ?>

                                <h3 class="uk-card-title uk-margin-remove-top uk-margin-small-bottom publication-card-title">
                                    <a class="uk-link-heading" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <?php if ( ! empty( $price ) ) : ?>
                                    <div class="publication-card-price uk-margin-small-bottom">
                                        <span class="uk-text-bold uk-text-primary"><?php echo esc_html( $price ); ?></span>
                                    </div>
                                <?php endif; ?>

                                <!-- Butang Dapatkan (pautan ke halaman single publication) -->
                                <div class="uk-margin-auto-top uk-margin-small-top publication-card-action">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="uk-button uk-button-primary uk-button-small uk-width-1-1 uk-border-rounded publication-btn-get">
                                        <?php echo esc_html( $btn_label ); ?>
                                        <span uk-icon="icon: arrow-right; ratio: 0.8" class="uk-margin-small-left"></span>
                                    </a>
                                </div>
                            </div>

                        </article>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <div class="uk-margin-top">
                <?php
                if ( function_exists( 'ukmtheme_pagination' ) ) {
                    ukmtheme_pagination( $publication_query );
                } else {
                    $orig_wp_query = $GLOBALS['wp_query'];
                    $GLOBALS['wp_query'] = $publication_query;
                    get_template_part( 'template-parts/global/content', 'paginate' );
                    $GLOBALS['wp_query'] = $orig_wp_query;
                }
                ?>
            </div>

        <?php else : ?>
            <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                <p><?php esc_html_e( 'No publications found.', 'ukmtheme' ); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>