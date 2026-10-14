<?php
class Elementor_UKMTheme_Slideset extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ukmtheme_slideset';
	}

	public function get_title() {
		return esc_html__( 'UKM: Slideset', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-carousel';
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
			'show_slide',
			[
				'label' => esc_html__( 'Jumlah Paparan', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 4,
				'max' => 24,
				'step' => 4,
				'default' => 4,
			]
		);

        $this->add_control(
			'show_nav',
			[
				'label' => esc_html__( 'Papar Navigasi', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'textdomain' ),
				'label_off' => esc_html__( 'Off', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		?>
            <!--start slideshow-->
            <div uk-slider>
                <ul class="uk-slider-items uk-child-width-1-4@s uk-child-width-1-4">
                    <?php

                        $settings = $this->get_settings_for_display();

                        $show = $settings['show_slide'];

                        $args = array(
                            'post_type'       => 'slideset',
                            'posts_per_page'  => $show,
                            'orderby'         => 'menu_order',
                            'order'           => 'ASC'
                        );

                        $slideset = new WP_Query( $args );

                        if ( $slideset->have_posts() ) : while ( $slideset->have_posts() ) : $slideset->the_post(); ?>
                    <li>
                        <a href="<?php echo get_post_meta( get_the_ID(), 'ut_slideset_link', true ); ?>" title="<?php the_title(); ?>">
                            <img src="<?php echo get_post_meta(get_the_ID(), 'ut_slideset_image', true ); ?>" alt="<?php the_title(); ?>">
                        </a>
                    </li>

                    <?php endwhile; else: ?>

                    <li><a><img src="<?php echo get_template_directory_uri() . '/images/placeholder_slideset.svg'; ?>" alt=""></a></li>
                    <li><a><img src="<?php echo get_template_directory_uri() . '/images/placeholder_slideset.svg'; ?>" alt=""></a></li>
                    <li><a><img src="<?php echo get_template_directory_uri() . '/images/placeholder_slideset.svg'; ?>" alt=""></a></li>
                    <li><a><img src="<?php echo get_template_directory_uri() . '/images/placeholder_slideset.svg'; ?>" alt=""></a></li>
                    <li><a><img src="<?php echo get_template_directory_uri() . '/images/placeholder_slideset.svg'; ?>" alt=""></a></li>
                    <li><a><img src="<?php echo get_template_directory_uri() . '/images/placeholder_slideset.svg'; ?>" alt=""></a></li>

                    <?php endif; ?>
                </ul>
                <?php
                    if ( 'yes' === $settings['show_nav'] ) { ?>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                <?php } ?>
            </div>
            <!--end slideshow-->

		<?php
	}
}