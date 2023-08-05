<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

get_header(); ?>
<?php if ( get_theme_mod( 'ukmtheme_staff_grid_view' ) ) : ?>
    <div class="wrap">
    <article class="uk-padding">

        <?php

        $query = new WP_Query( array(
            'post_type'         => 'staff',
            'department'         => get_query_var( 'department'),
            'posts_per_page'    => -1,
            'orderby'           => 'menu_order',
            'order'             => 'ASC',
        ));

        if ( $query->have_posts() ) : ?>

        <h2><?php single_term_title(); ?></h2>
        <div class="uk-child-width-1-2 uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        
                <div class="uk-animation-toggle" tabindex="0">
                    <div class="uk-card uk-card-default uk-animation-fade">
                        <div class="uk-card-media-top">
                                                    <?php
                                        $staff_photo = get_post_meta( get_the_ID(),'ut_staff_photo',true );
                                        if ( $staff_photo ) { ?>
                                            <img src="<?php echo get_post_meta( get_the_ID(),'ut_staff_photo',true ); ?>" width="100%" alt="">
                                        <?php } else { ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder_staff.svg">
                                        <?php }
                                    ?>
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title"><?php the_title(); ?></h3>
                            <ul class="uk-list uk-text-small">
                                <li class="uk-margin-remove">
                                    <?php echo get_the_term_list( $post->ID, 'position', '', '<br>', '' ); ?>
                                </li>
                                <?php if ( get_post_meta( get_the_ID(), 'ut_staff_phone', true ) ) { ?>
                                    <li class="uk-margin-remove"><span uk-icon="receiver"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_staff_phone', true ); ?></li>
                                <?php } else { ?>
                                    <li class="uk-margin-remove"><span uk-icon="receiver"></span>&nbsp;03-8921-5555</li>
                                <?php } ?>
                                <li class="uk-margin-remove"><span uk-icon="mail"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_staff_email', true ); ?></li>
                            </ul>
                            <?php
                            if ( get_post_meta( get_the_ID(), 'ut_staff_work_scope', 1 ) ) {
                                if ( get_post_meta( get_the_ID(), 'ut_staff_work_scope_title', 1 ) ) { ?>
                                    <h4>
                                        <?php echo get_post_meta( get_the_ID(), 'ut_staff_work_scope_title_custom', true ); ?>
                                    </h4>
                                <?php }
                                else { ?>
                                    <h3>
                                        <?php _e( 'Bidang Tugas','ukmtheme' ); ?>
                                    </h3>
                                <?php } ?>
                                    <span class="staff-scope">
                                        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_staff_work_scope_desc', true ) ); ?>
                                    </span>
                            <?php }
                            else {
                                echo '';
                            } ?>
                            
                        </div>
                    </div>
                </div>
            
        <?php endwhile; else: endif; ?>
        </div>
    </article>
</div>
<?php else : ?>
<div class="wrap">
    <article class="uk-padding">

        <?php

        $query = new WP_Query( array(
            'post_type'       => 'staff',
            'department'      => get_query_var( 'department' ),
            'posts_per_page'  => -1,
            'orderby'         => 'menu_order',
            'order'           => 'ASC',
        ));

        if ( $query->have_posts() ) : ?>

        <h2><?php single_term_title(); ?></h2>
        
        <div class="uk-margin-top" uk-grid>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="uk-grid-collapse uk-grid-match uk-margin-top uk-margin-bottom uk-card-default uk-padding" uk-grid>
            <div class="uk-width-1-4">
                <div class="uk-card">
                    <?php
                        if ( get_post_meta( get_the_ID(),'ut_staff_photo', true ) ) { ?>
                            <img src="<?php echo get_post_meta( get_the_ID(), 'ut_staff_photo', true ); ?>" alt="">
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder_staff.svg">
                        <?php }
                    ?>
                </div>
            </div>
            <div class="uk-width-3-4">
                <div class="uk-card uk-card-body">
                <h3 class="uk-card-title"><?php the_title(); ?></h3>
                    <ul uk-grid>
                        <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="user"></span>&nbsp;<?php echo get_the_term_list( $post->ID, 'position', '', '<br>', '' ); ?></li>
                        <?php if ( get_post_meta( get_the_ID(), 'ut_staff_phone', true ) ) { ?>
                            <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="receiver"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_staff_phone', true ); ?></li>
                        <?php } else { ?>
                            <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="receiver"></span>&nbsp;03-8921-5555</li>
                        <?php } ?>
                        <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="mail"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_staff_email', true ); ?></li>
                        <li>
                        <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_staff_work_scope_desc', true ) ); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endwhile; else: endif; ?>
    </article>
</div>    
<?php endif; ?>
<?php get_footer(); ?>