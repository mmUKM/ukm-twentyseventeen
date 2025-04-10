<?php
class Elementor_UKMTheme_Staffs extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ukmtheme_staffs';
	}

	public function get_title() {
		return esc_html__( 'UKM: Direktori', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'ukmtheme' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

    protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'ukmtheme' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slug_department',
			[
				'label' => esc_html__( 'Department', 'ukmtheme' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'kakitangan-sokongan', 'ukmtheme' ),
				'placeholder' => esc_html__( 'kakitangan-sokongan', 'ukmtheme' ),
                'description' => esc_html__( 'Masukkan slug Department dibahagian ini cth: kakitangan-sokongan. Sila rujuk nama slug di bahagian Direktori > Department', 'ukmtheme' ),
            ]
		);

        $this->add_control(
			'view_style',
			[
				'label' => esc_html__( 'View Style', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Grid', 'textdomain' ),
				'label_off' => esc_html__( 'List', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		?>
            <!--start slideshow-->
            <?php

            $settings = $this->get_settings_for_display();
            
            if ( 'yes' === $settings['view_style'] ) : ?>

            <div class="wrap">
            <article class="uk-padding">

                <?php

                $department = $settings['slug_department'];

                $query = new WP_Query( array(
                    'post_type'         => 'staff',
                    'department'         => $department,
                    'posts_per_page'    => -1,
                    'orderby'           => 'menu_order',
                    'order'             => 'ASC',
                    'post_status' => 'publish',
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
                                            <?php echo get_the_term_list( get_the_ID(), 'position', '', '<br>', '' ); ?>
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

                $settings = $this->get_settings_for_display();
                $department = $settings['slug_department'];

                $query = new WP_Query( array(
                    'post_type'         => 'staff',
                    'department'         => $department,
                    'posts_per_page'    => -1,
                    'orderby'           => 'menu_order',
                    'order'             => 'ASC',
                    'post_status' => 'publish',
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
                                <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="user"></span>&nbsp;<?php echo get_the_term_list( get_the_ID(), 'position', '', '<br>', '' ); ?></li>
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
        <!--end slideshow-->
		<?php
	}
}