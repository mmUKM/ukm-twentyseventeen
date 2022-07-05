<?php
/**
* @package UKMTheme
* @subpackage UKM_Twenty_Seventeen
*/
get_header(); ?>
<div id="primary" class="wrap uk-margin uk-padding" uk-grid>

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-article uk-width-1-1' ); ?>>
            <?php the_title( '<h2>', '</h2>' ); ?>
            <?php the_content(); ?>
        </article>

    <?php endwhile;?>

    <?php get_template_part('templates/content','edit' ); ?>
    
</div>
<?php get_footer(); ?>