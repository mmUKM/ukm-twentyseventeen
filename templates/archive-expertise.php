<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
get_header(); ?>
<div class="wrap">
    <article class="uk-padding">
        <h2><?php _e( 'Expertise', 'ukmtheme' ) ; ?></h2>
    <?php

        $query = new WP_Query( array( 
        'post_type'       => 'expertise', 
        'posts_per_page'  => -1, 
        'orderby'         => 'menu_order', 
        'order'           => 'ASC' 
        ));

    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="uk-padding" uk-grid>
            <div class="uk-width-1-4">
                <?php
                $photo = get_post_meta( $post->ID,'ut_expertise_photo',true );
                if ( $photo ) {
                    echo '<img src="'.$photo.'">';
                }
                else {
                    echo '<img src="'. get_template_directory_uri() .'/images/placeholder_staff.svg">';
                }
                ?>
            </div>
            <div class="uk-width-3-4">
                <?php the_title( '<h3>', '</h3>'); ?>

                <ul uk-grid>
                    <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="user"></span>&nbsp;<?php echo get_post_meta($post->ID, 'ut_expertise_position', true); ?></li>
                    <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="receiver"></span>&nbsp;<?php echo get_post_meta( $post->ID, 'ut_expertise_contact', true ); ?></li>
                    <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="mail"></span>&nbsp;<?php echo get_post_meta( $post->ID, 'ut_expertise_email', true ); ?></li>
                    <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="link"></span>&nbsp;<a href="<?php echo get_post_meta( $post->ID, 'ut_expertise_url', true ); ?>">UKM Sarjana</a></a></li>
                </ul>
                <p>
                <strong><?php _e( 'Specialisation', 'ukmtheme' ) ?></strong><br>
                <?php echo get_post_meta( $post->ID, 'ut_expertise_specialisation', true ); ?>
                </p>
            </div>
        </div>
        <hr>
        <?php endwhile; else: ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'ukmtheme' ); ?></p>  
        <?php endif; ?>
            <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
    </article>
</div>
<?php get_footer(); ?>