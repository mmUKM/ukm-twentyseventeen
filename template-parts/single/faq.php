<?php
/**
 * Single FAQ Template
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<div id="primary" class="wrap uk-section uk-section-xsmall">
    <div class="uk-container">
        <div class="uk-grid-medium" uk-grid>
            <main id="main" class="site-main uk-width-2-3@m" role="main">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-article uk-card uk-card-default uk-card-body' ); ?>>
                        <?php the_title( '<h1 class="uk-article-title">', '</h1>' ); ?>
                        
                        <?php if ( get_the_term_list( get_the_ID(), 'faqcat' ) ) : ?>
                            <p class="uk-article-meta">
                                <span uk-icon="icon: tag"></span> <?php echo get_the_term_list( get_the_ID(), 'faqcat', '', ', ', '' ); ?>
                            </p>
                        <?php endif; ?>

                        <div class="entry-content uk-margin">
                            <?php the_content(); ?>
                        </div>

                        <?php get_template_part( 'template-parts/global/content', 'edit' ); ?>
                    </article>
                <?php endwhile; ?>
            </main>
            <div class="uk-width-1-3@m">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>