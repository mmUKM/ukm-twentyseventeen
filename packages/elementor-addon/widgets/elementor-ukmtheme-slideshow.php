<?php
class Elementor_UKMTheme_Slideshow extends \Elementor\Widget_Base {

    public function get_name() {
		return 'ukmtheme_slideshow';
	}

	public function get_title() {
		return esc_html__( 'UKM: Slideshow (Carousel)', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-slider-push';
	}

	public function get_categories() {
		return [ 'ukmtheme' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

	protected function register_controls(): void {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'ukmtheme' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'listSlide',
			[
				'label' => esc_html__( 'List', 'ukmtheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'image',
                        'label' => esc_html__( 'Image', 'ukmtheme' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => get_template_directory_uri() . '/images/dummy-1440x560.svg',
                        ],
                    ],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'ukmtheme' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__( 'https://www.ukm.my/', 'ukmtheme' ),
					],
				],
				'default' => [
					[
						'text' => esc_html__( 'Slide #1', 'ukmtheme' ),
						'link' => 'https://www.ukm.my/',
					],
					[
						'text' => esc_html__( 'Slide #2', 'ukmtheme' ),
						'link' => 'https://www.ukm.my/',
					],
					[
						'text' => esc_html__( 'Slide #3', 'ukmtheme' ),
						'link' => 'https://www.ukm.my/',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'ukmtheme' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .ukmtheme-slide-card',
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ukmtheme-slide-card' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render(): void {
		$settings = $this->get_settings_for_display();

		if ( ! $settings['listSlide'] ) {
			return;
		}
		?>

        <div><!--start slideshow-->
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; autoplay-interval: 6000; ratio: 1440:560; animation: push">

                <div class="uk-slideshow-items">

                    <?php foreach ( $settings['listSlide'] as $index => $item ) : ?>

                        <div>
                            <?php
                            if ( $item['image']['url'] ) { ?>
                                <img src="<?php echo esc_url( $item['image']['url'] ); ?>" uk-cover>
                            <?php } else { ?>
                                <img src="<?php echo get_template_directory_uri() . '/images/dummy-1440x560.svg'; ?>" uk-cover>
                            <?php } ?>
                        </div>

                    <?php endforeach; ?>
                </div>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>
            </div>
        </div><!--end slideshow-->

		<?php
	}

	protected function content_template(): void {
		?>
		<#
		if ( ! settings.listSlide.length ) {
			return;
		}
		#>
        <div>
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; autoplay-interval: 6000; ratio: 1440:560; animation: push">

                <div class="uk-slideshow-items">
                    <# _.each( settings.listSlide, function( item, index ) { #>
                        <div>
                            <# if ( item.image && item.image.url ) { #>
                                <img src="{{{ item.image.url }}}" uk-cover>
                            <# } #>
                        </div>
                    <# } ); #>
                </div>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>
            </div>
        </div>
		<?php
	}

}
