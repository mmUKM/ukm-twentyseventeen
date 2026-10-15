<?php
/**
 * News Category Taxonomy Template
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
                <span><?php esc_html_e( 'Kategori Berita: ', 'ukmtheme' ); ?><?php single_term_title(); ?></span>
            </h1>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="uk-child-width-1-1 uk-grid-medium" uk-grid>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@m uk-border-rounded uk-overflow-hidden' ); ?> uk-grid>
                            <div class="uk-card-media-left uk-cover-container">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php the_post_thumbnail_url( 'news_thumbnail' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                                <?php else : ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder_news.svg' ); ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                                <?php endif; ?>
                                <canvas width="800" height="450"></canvas>
                            </div>
                            <div class="uk-flex uk-flex-middle">
                                <div class="uk-card-body">
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