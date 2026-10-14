<?php
/**
 * FAQ Archive Template
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); 

$faq_query = new WP_Query( array( 
    'post_type'      => 'faq',
    'posts_per_page' => -1, 
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );
?>
<div class="wrap uk-section uk-section-xsmall">
    <div class="uk-container">
        <article class="uk-card uk-card-default uk-card-body">
            <h1 class="uk-heading-line uk-margin-bottom">
                <span><?php esc_html_e( 'Frequently Asked Questions', 'ukmtheme' ); ?></span>
            </h1>

            <?php if ( $faq_query->have_posts() ) : ?>
                <ul uk-accordion="multiple: true" class="uk-accordion">
                    <?php while ( $faq_query->have_posts() ) : $faq_query->the_post(); ?>
                        <li>
                            <a class="uk-accordion-title" href="#"><?php the_title(); ?></a>
                            <div class="uk-accordion-content">
                                <?php the_content(); ?>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, no questions found at this time.', 'ukmtheme' ); ?></p>
            <?php endif; ?>
        </article>
    </div>
</div>

<?php get_footer(); ?>
