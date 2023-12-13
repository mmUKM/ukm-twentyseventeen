<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

get_header(); ?>
<div class="wrap">
    <article class="uk-padding">
        <h2><?php single_term_title(); ?></h2>
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="uk-margin-top" uk-grid>
            <div class="uk-width-1-3 uk-width-1-4@s">
                    <div class="staff-photo">
                        <?php
                            $staff_photo = get_post_meta( get_the_ID(),'ut_staff_photo',true );
                            if ( $staff_photo ) { ?>
                                <img src="<?php echo get_post_meta( get_the_ID(),'ut_staff_photo',true ); ?>" alt="">
                            <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder_staff.svg">
                            <?php }
                        ?>
                    </div>
            </div>
            <div class="uk-width-2-3 uk-width-3-4@s">
                <div class="staff-details">
                    <?php the_title( '<h3>', '</h3>' ); ?>
                    <ul uk-grid>
                        <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="user"></span>&nbsp;<?php echo get_the_term_list( $post->ID, 'position', '', '<br>', '' ); ?></li>
                        <?php if ( get_post_meta( get_the_ID(), 'ut_staff_phone', true ) ) { ?>
                            <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="receiver"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_staff_phone', true ); ?></li>
                        <?php } else { ?>
                            <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="receiver"></span>&nbsp;03-8921-5555</li>
                        <?php } ?>
                        <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="mail"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_staff_email', true ); ?></li>
                    </ul>
                    <?php
                        if ( get_post_meta( get_the_ID(), 'ut_staff_work_scope', 1 ) ) {
                            if ( get_post_meta( get_the_ID(), 'ut_staff_work_scope_title', 1 ) ) { ?>
                                    <h4>
                                        <?php echo get_post_meta( get_the_ID(), 'ut_staff_work_scope_title_custom', true ); ?>
                                    </h4>
                                <?php } else { ?>
                                    <h3>
                                        <?php _e( 'Bidang Tugas','ukmtheme' ); ?>
                                    </h3>
                                <?php } ?>
                        <span class="staff-scope">
                            <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_staff_work_scope_desc', true ) ); ?>
                        </span>
                        <?php } else {
                            echo '';
                        }
                    ?>
                    <?php get_template_part('templates/content','edit' ); ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </article>
</div>
<?php get_footer(); ?>