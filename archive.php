<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 *
 * @link http://codex.wordpress.org/Function_Reference/get_post_type_archive_link
 * @link http://codex.wordpress.org/Function_Reference/post_type_archive_title
 */
get_header(); ?>
<div class="wrap">
    <article class="uk-padding">
        <h2><?php single_cat_title(); ?></h2>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div uk-grid>
                    <div class="uk-width-1-4@s">
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            }
                            else {
                                echo '<img src="' . get_template_directory_uri() . '/img/placeholder_thumbnail.svg" />';
                            }
                        ?>
                    </div>
                    <div class="uk-width-3-4@s">
                        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endwhile; else: ?>
                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
            <?php endif; ?>
        <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </article>
</div>
<?php get_footer(); ?>