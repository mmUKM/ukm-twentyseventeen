<?php
class Elementor_UKMTheme_Publications extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ukmtheme_publications';
	}

	public function get_title() {
		return esc_html__( 'UKM: Penerbitan', 'elementor-addon' );
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
			'slug_department',
			[
				'label' => esc_html__( 'Publications', 'ukmtheme' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'penerbitan-2025', 'ukmtheme' ),
				'placeholder' => esc_html__( 'penerbitan-2025', 'ukmtheme' ),
                'description' => esc_html__( 'Masukkan slug Department dibahagian ini cth: penerbitan-2025 Sila rujuk nama slug di bahagian Direktori > Department', 'ukmtheme' ),
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

                $pubcat = $settings['slug_pubcat'];

                $query = new WP_Query( array(
                    'post_type'         => 'publication',
                    'pubcat'            => $pubcat,
                    'posts_per_page'    => -1,
                    'orderby'           => 'menu_order',
                    'order'             => 'ASC',
                    'post_status'       => 'publish',
                ));

                if ( $query->have_posts() ) : ?>

                <h2><?php single_cat_title(); ?></h2>
                    <div uk-grid>
                        <div class="uk-width-1-6@s uk-width-1-1">
                            <?php
                                if ( get_post_meta( get_the_ID(), 'ut_publication_cover', true ) ) { ?>
                                    <img src="<?php echo get_post_meta( get_the_ID(), 'ut_publication_cover', true ); ?>" width="130" height="165" alt="<?php the_title(); ?>">
                                <?php } else { ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder_publication.svg" width="130" height="165">
                                <?php }
                            ?>
                        </div>
                        <div class="uk-width-5-6@s uk-width-1-1">
                            <?php the_title( '<h3>', '</h3>' ); ?>
                            <ul uk-grid>
                                <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="user"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_publication_author', true ); ?></li>
                                <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="print"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_publication_publisher', true ); ?></li>
                                <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="calendar"></span>&nbsp;<?php echo get_post_meta( get_the_ID(), 'ut_publication_year', true ); ?></li>
                                <li class="uk-width-1-1 uk-margin-remove"><span uk-icon="link"></span>&nbsp;<a href="<?php echo get_post_meta( get_the_ID(), 'ut_publication_reference', true ); ?>" target="_blank">
                                        <?php if ( get_post_meta( get_the_ID(), 'ut_publication_renamedownload', true ) ) { ?>
                                            <?php echo get_post_meta( get_the_ID(), 'ut_publication_renamedownload', true ); ?>
                                        <?php } else { ?>
                                            Download
                                        <?php } ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <?php else: ?>
                    <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?></p>
                    <?php get_search_form(); ?>
                    <?php endif; ?>
                    <p><?php //get_template_part( 'templates/content', 'paginate' ); ?></p>
            </article>
        </div>    
        <?php endif; ?>
        <!--end slideshow-->
		<?php
	}
}