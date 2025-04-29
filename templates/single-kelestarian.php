<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>

<div class="uk-container">

    <article class="uk-article">
        <?php while ( have_posts() ) : the_post(); ?>
        <h1 class="uk-h1 uk-padding uk-padding-remove-bottom"><?php the_title(); ?></h1>
        <div class="uk-padding" style="position: relative;">
        <?php ut_kelestarian_gallery( 'ut_kelestarian_foto', 'post-thumbnail' ); ?>
        <p><span uk-icon="icon: calendar"></span>&nbsp;<?php echo get_post_meta( $post->ID, 'ut_kelestarian_date', true ); ?></p>
            <?php echo get_post_meta( get_the_ID(), 'ut_kelestarian_ringkasan', true ); ?>
            <div class="uk-padding uk-padding-remove-left">
                <ul class="uk-thumbnav" uk-margin>
                    <?php

                    $meta = get_post_meta( get_the_ID(), 'ut_kelestarian_sdg', true );

                    foreach ( $meta as $metas ) { ?>
                        <li>
                            <img src="<?php echo $metas; ?>" width="60" height="60">
                        </li>
                        <?php } ?>
                </ul>
            </div>
        </div>

        <?php endwhile;?>
        <?php get_template_part('templates/content','edit' ); ?>
    </article>
</div>

<?php get_footer(); ?>