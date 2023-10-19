<?php
class Elementor_UKMTheme_News_Grid extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ukmtheme_news_grid';
	}

	public function get_title() {
		return esc_html__( 'UKM: Berita (Grid)', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'basic' ];
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
			'show_news',
			[
				'label' => esc_html__( 'Jumlah Paparan', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 3,
				'max' => 24,
				'step' => 3,
				'default' => 6,
			]
		);

        $this->add_control(
			'show_button',
			[
				'label' => esc_html__( 'Button Arkib', 'textdomain' ),
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
            <div class="uk-section">
                <div class="uk-container">
                            <div class="uk-child-width-1-3@s uk-child-width-1-1 uk-grid" uk-grid uk-height-match="target: > div > .uk-card">
                                <?php

                                $settings = $this->get_settings_for_display();

                                $show = $settings['show_news'];

                                $loop = new WP_Query( 
                                    array(
                                    'post_type' => 'news',
                                    'posts_per_page' => $show,
                                    )
                                );

                                while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                    <div>
                                        <div class="uk-card uk-card-default">
                                            <div class="uk-card-media-top">
                                                <?php
                                                    if ( has_post_thumbnail() ) { ?> <img src="<?php the_post_thumbnail_url( 'news_thumbnail' ); ?>" width="800" height="450"> <?php }
                                                    else { echo '<img src="' . get_template_directory_uri() . '/images/placeholder_news.svg" height="450" width="800"/>'; }
                                                ?>
                                            </div>
                                            <div class="uk-card-body">
                                                <p><a href="<?php echo get_permalink(); ?>" class="uk-link-heading"><?php the_title(); ?></a></p>
                                            </div>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                            </div>
                    <?php
                    if ( 'yes' === $settings['show_button'] ) { ?>
                    <a class="uk-button uk-button-default uk-width-1-6@s uk-width-1-2 uk-align-center" href="<?php echo get_post_type_archive_link('news'); ?>">ARKIB</a>
                    <?php } ?>
                </div>
            </div>
            <!--end slideshow-->

		<?php
	}
}