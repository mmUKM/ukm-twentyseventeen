<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

get_header(); ?>
<div class="wrap">
    <article class="uk-padding">

        <?php

        $query = new WP_Query( array(
            'post_type'         => 'kelestarian',
            'lestaricat'          => get_query_var( 'lestaricat' ),
            'posts_per_page'    => -1,
            'orderby'           => 'menu_order',
            'order'             => 'ASC',
        ));

        if ( $query->have_posts() ) : ?>

        <h2><?php single_term_title(); ?></h2>
        <div class="uk-child-width-1-2 uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        
                <div class="uk-animation-toggle" tabindex="0">

                </div>
            
        <?php endwhile; else: endif; ?>
        </div>
    </article>
</div>
<?php get_footer(); ?>