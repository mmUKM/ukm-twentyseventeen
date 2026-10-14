<?php
/**
 * The template for displaying search results pages
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
                <span>
                    <?php
                    /* translators: %s: search query. */
                    printf( esc_html__( 'Search Results for: %s', 'ukmtheme' ), '<strong>' . esc_html( get_search_query() ) . '</strong>' );
                    ?>
                </span>
            </h1>
            <div class="uk-width-1-2@m uk-margin-top">
                <?php get_search_form(); ?>
            </div>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="uk-child-width-1-1 uk-grid-medium" uk-grid>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-card uk-card-default uk-card-body' ); ?>>
                            <h3 class="uk-card-title uk-margin-remove-bottom">
                                <a class="uk-link-heading" href="<?php echo esc_url( get_permalink() ); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p class="uk-article-meta uk-margin-small-top">
                                <span uk-icon="icon: calendar"></span> <?php echo get_the_date(); ?>
                                &nbsp;|&nbsp;<span uk-icon="icon: folder"></span> <?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?>
                            </p>
                            <div class="uk-margin-small-top">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="uk-margin-top">
                <?php get_template_part( 'template-parts/global/content', 'paginate' ); ?>
            </div>

        <?php else : ?>
            <div class="uk-card uk-card-default uk-card-body uk-margin-top">
                <h2><?php esc_html_e( 'Nothing Found', 'ukmtheme' ); ?></h2>
                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ukmtheme' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>