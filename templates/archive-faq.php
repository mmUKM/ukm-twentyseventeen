<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); 

    $query = new WP_Query( array( 
    'post_type'       => 'faq',
    'faqcat'          => get_query_var( 'faqcat' ),
    'posts_per_page'  => -1, 
    'orderby'         => 'menu_order',
    'order'           => 'ASC' 
    ));

?>
<div class="wrap">
    <article class="uk-padding">
    <h2><?php _e( 'Frequently Asked Questions', 'ukmtheme' ) ?></h2>
        <ul uk-accordion>
            <?php if  ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
            <li>
                <a class="uk-accordion-title" href="#"><?php the_title(); ?></a>
                <div class="uk-accordion-content"><?php the_content(); ?></div>
            </li>
            <?php endwhile; else: ?>
        </ul>
        <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
        <?php endif; ?>
    </article>
</div>
<?php get_footer(); ?>
