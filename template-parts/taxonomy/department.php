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
            'department'        => get_query_var( 'department' ),
            'posts_per_page'    => -1,
            'orderby'           => 'menu_order',
            'order'             => 'ASC',
        ));

        if ( $query->have_posts() ) : ?>

        <h2><?php single_term_title(); ?></h2>
        <div class="uk-child-width-1-3@s uk-grid-match" uk-grid>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div>
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <div class="uk-width-1-1@m">      
                        <?php
                            $staff_photo = get_post_meta( get_the_ID(),'ut_staff_photo',true );
                            if ( $staff_photo ) { ?>
                                <img src="<?php echo get_post_meta( get_the_ID(),'ut_staff_photo',true ); ?>" width="100%" alt="">
                            <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder_staff.svg">
                        <?php } ?>
                    </div><!--staff photo -->
                    <div class="uk-width-1-1@m">
                        <h3><?php the_title(); ?></h3>
                        <ul class="uk-list">
                            <li class="uk-margin-remove">
                                <?php echo get_the_term_list( $post->ID, 'position', '', '<br>', '' ); ?>
                            </li>
                            <?php if ( get_theme_mod( 'ukmtheme_staff_hide_phone' ) ) { ?>
                                <?php if ( get_post_meta( get_the_ID(), 'ut_staff_phone', true ) ) { ?>
                                    <li class="uk-margin-remove"><span uk-icon="receiver"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_staff_phone', true ); ?></li>
                                <?php } else { ?>
                                    <li class="uk-margin-remove"><span uk-icon="receiver"></span>&nbsp;03-8921-5555</li>
                                <?php } ?>
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
                                    <h4>
                                        <?php _e( 'Bidang Tugas','ukmtheme' ); ?>
                                    </h4>
                                <?php } ?>
                                <span class="staff-scope">
                                    <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_staff_work_scope_desc', true ) ); ?>
                                </span>
                            <?php }
                            else {
                                echo '';
                            }
                        ?>
                    </div><!-- staff details -->
                </div><!-- staff card -->
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
        
        
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="uk-padding uk-padding-remove-left uk-card uk-card-default uk-card-hover uk-card-body uk-flex-middle" uk-grid>
            <div class="uk-width-1-4@s uk-flex-first">        
                <?php
                    $staff_photo = get_post_meta( get_the_ID(),'ut_staff_photo',true );
                    if ( $staff_photo ) { ?>
                        <img src="<?php echo get_post_meta( get_the_ID(),'ut_staff_photo',true ); ?>" width="100%" alt="">
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder_staff.svg">
                <?php } ?>
            </div>
            <div class="uk-width-3-4@s">
                <h3><?php the_title(); ?></h3>
                <ul class="uk-list">
                    <li class="uk-margin-remove">
                        <?php echo get_the_term_list( $post->ID, 'position', '<span uk-icon="user"></span>&nbsp;', '<br>', '' ); ?>
                    </li>
                    <?php if ( get_theme_mod( 'ukmtheme_staff_hide_phone' ) ) { ?>
                        <?php if ( get_post_meta( get_the_ID(), 'ut_staff_phone', true ) ) { ?>
                            <li class="uk-margin-remove"><span uk-icon="receiver"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_staff_phone', true ); ?></li>
                        <?php } else { ?>
                            <li class="uk-margin-remove"><span uk-icon="receiver"></span>&nbsp;03-8921-5555</li>
                        <?php } ?>
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
                            <h4>
                                <?php _e( 'Bidang Tugas','ukmtheme' ); ?>
                            </h4>
                        <?php } ?>
                        <span class="staff-scope">
                            <?php echo wpautop( get_post_meta( get_the_ID(), 'ut_staff_work_scope_desc', true ) ); ?>
                        </span>
                    <?php }
                    else {
                        echo '';
                    }
                ?>
            </div>
        </div><!-- end staff card -->
        <?php endwhile; else: endif; ?>
    </article>
</div>    
<?php endif; ?>
<?php get_footer(); ?>