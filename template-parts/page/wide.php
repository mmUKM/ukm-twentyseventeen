<?php
/**
 * Page Template Part: Full Width
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<div id="primary" class="wrap uk-section uk-section-xsmall">
    <div class="uk-container uk-container-expand">
        <main id="main" class="site-main" role="main">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-article' ); ?>>
                    <?php the_title( '<h1 class="uk-article-title">', '</h1>' ); ?>
                    
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
