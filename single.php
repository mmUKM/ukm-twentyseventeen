<?php
/**
 * The template for displaying all single posts
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
        <main id="main" class="site-main" role="main">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-article uk-card uk-card-default uk-card-body' ); ?>>
                    <?php the_title( '<h1 class="uk-article-title">', '</h1>' ); ?>
                    
                    <p class="uk-article-meta">
                        <span uk-icon="icon: calendar"></span> <?php echo get_the_date(); ?>
                        &nbsp;|&nbsp;<span uk-icon="icon: user"></span> <?php the_author(); ?>
                        <?php if ( has_category() ) : ?>
                            &nbsp;|&nbsp;<span uk-icon="icon: folder"></span> <?php the_category( ', ' ); ?>
                        <?php endif; ?>
                    </p>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="uk-margin uk-text-center">
                            <?php the_post_thumbnail( 'large', array( 'class' => 'uk-border-rounded' ) ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content uk-margin">
                        <?php the_content(); ?>
                    </div>

                    <?php get_template_part( 'template-parts/global/content', 'edit' ); ?>
                </article>
            <?php endwhile; ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>