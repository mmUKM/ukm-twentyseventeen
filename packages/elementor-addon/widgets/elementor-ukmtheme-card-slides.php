<?php
class Elementor_UKMTheme_Card_Slides extends \Elementor\Widget_Base {

    public function get_name() {
		return 'ukmtheme_card_slides';
	}

	public function get_title() {
		return esc_html__( 'UKM: Card Slides', 'elementor-addon' );
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
			'list',
			[
				'label' => esc_html__( 'List', 'ukmtheme' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    [
                        'name' => 'image',
                        'label' => esc_html__( 'Image', 'ukmtheme' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => get_template_directory_uri() . '/images/elementor-image-placeholder.svg',
                        ],
                    ],
					[
						'name' => 'text',
						'label' => esc_html__( 'Text', 'ukmtheme' ),
						'label_block' => true,
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Slot 1', 'ukmtheme' ),
						'default' => esc_html__( 'Slot 1', 'ukmtheme' ),
					],
					[
						'name' => 'text-description',
						'label' => esc_html__( 'Text Description', 'ukmtheme' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'row' => 3,
						'placeholder' => esc_html__( 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz', 'ukmtheme' ),
						'default' => esc_html__( 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz', 'ukmtheme' ),
					],
					[
						'name' => 'additional-text',
						'label' => esc_html__( 'Additional Text', 'ukmtheme' ),
						'label_block' => true,
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Jamaludin Rajalu', 'ukmtheme' ),
						'default' => esc_html__( 'Jamaludin Rajalu', 'ukmtheme' ),
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'ukmtheme' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__( 'https://your-link.com', 'ukmtheme' ),
					],
				],
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'ukmtheme' ),
						'text_description' => esc_html__( 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz', 'ukmtheme' ),
						'link' => 'https://elementor.com/',
					],
					[
						'text' => esc_html__( 'List Item #2', 'ukmtheme' ),
						'text_description' => esc_html__( 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz', 'ukmtheme' ),
						'link' => 'https://elementor.com/',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render(): void {
		$settings = $this->get_settings_for_display();

		if ( ! $settings['list'] ) {
			return;
		}
		?>
		<div class="uk-slider-container-offset" uk-slider>

			<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

				<div class="uk-slider-items uk-child-width-1-3@s uk-grid">
			
					<?php foreach ( $settings['list'] as $index => $item ) : ?>
						<div>
							<div class="uk-card uk-card-default">
								<div class="uk-card-media-top">
										<?php
										if ( $item['image']['url'] ) { ?>
											<img src="<?php echo esc_url( $item['image']['url'] ); ?>" width="1800" height="1200" alt="">
										<?php } else { ?>
											<img src="<?php echo get_template_directory_uri() . '/images/elementor-image-placeholder.svg'; ?>" width="1800" height="1200" alt="">
										<?php } ?>
								</div>
								<div class="uk-card-body">
									<h3 class="uk-card-title">
										<?php
										if ( $item['link']['url'] ) {
											?><a href="<?php echo esc_url( $item['link']['url'] ); ?>"><?php echo $item['text']; ?></a><?php
										} else {
											echo $item['text'];
										}
										?>
									</h3>
										<?php
										if ( $item['text-description'] ) { ?>
											<p><?php echo esc_html__( $item['text-description'] ); ?></p>
										<?php } else { ?>
											<p>Please insert some text!</p>
										<?php } ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
				<a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
			
			</div>

			<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
		</div>
		<?php
	}

	protected function content_template(): void {
		?>
		<#
		if ( ! settings.list.length ) {
			return;
		}
		#>
		<ul>
		<# _.each( settings.list, function( item, index ) { #>
			<li>
			<# if ( item.link && item.link.url ) { #>
				<a href="{{{ item.link.url }}}">{{{ item.text }}}</a>
			<# } else { #>
				{{{ item.text }}}
			<# } #>
			</li>
		<# } ); #>
		</ul>
		<?php
	}

}
