<?php
/**
 * The template for displaying archive pages
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
            <?php
            the_archive_title( '<h1 class="page-title uk-heading-line"><span>', '</span></h1>' );
            the_archive_description( '<div class="archive-description uk-text-muted uk-margin-small-top">', '</div>' );
            ?>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="uk-child-width-1-1 uk-grid-medium" uk-grid>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-card uk-card-default uk-card-body' ); ?>>
                            <div class="uk-grid-medium uk-flex-middle" uk-grid>
                                <div class="uk-width-1-4@m uk-width-1-3@s">
                                    <div class="uk-media-top">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <a href="<?php echo esc_url( get_permalink() ); ?>">
                                                <?php the_post_thumbnail( 'news_thumbnail', array( 'class' => 'uk-border-rounded' ) ); ?>
                                            </a>
                                        <?php else : ?>
                                            <a href="<?php echo esc_url( get_permalink() ); ?>">
                                                <img class="uk-border-rounded" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder_thumbnail.svg' ); ?>" alt="<?php the_title_attribute(); ?>">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-width-3-4@m uk-width-2-3@s">
                                    <h3 class="uk-card-title uk-margin-remove-bottom">
                                        <a class="uk-link-heading" href="<?php echo esc_url( get_permalink() ); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="uk-article-meta uk-margin-small-top">
                                        <span uk-icon="icon: calendar"></span> <?php echo get_the_date(); ?>
                                    </p>
                                    <div class="uk-margin-small-top">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </article>
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