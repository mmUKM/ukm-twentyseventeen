<?php
class Elementor_UKMTheme_FAQ extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ukmtheme_faq';
	}

	public function get_title() {
		return esc_html__( 'UKM: Soalan Lazim', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-help-o';
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
				'label' => esc_html__( 'Kategori', 'ukmtheme' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'it-support', 'ukmtheme' ),
				'placeholder' => esc_html__( 'it-support', 'ukmtheme' ),
                'description' => esc_html__( 'Masukkan slug Kategori dibahagian ini cth: it-support. Sila rujuk nama slug di bahagian Soalan Lazim > Categories', 'ukmtheme' ),
            ]
		);

		$this->end_controls_section();

	}

	protected function render() { ?>
        <!--start faq-->
        <div class="uk-container">
            <article class="uk-padding">
                <h2><?php single_cat_title(); ?></h2>
                <ul uk-accordion>
                    <?php

                        $query = new WP_Query( array( 
                            'post_type'       => 'faq',
                            'faqcat'          => get_query_var( 'faqcat' ),
                            'posts_per_page'  => -1, 
                            'orderby'         => 'menu_order',
                            'order'           => 'ASC' 
                            ));
            
                    if  ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li>
                        <a class="uk-accordion-title" href="#"><?php the_title(); ?></a>
                        <div class="uk-accordion-content"><?php the_content(); ?></div>
                    </li>
                    <?php endwhile; else: ?>
                </ul>
                <p><?php _e( 'Sorry, no page matched your criteria.', 'ukmtheme' ); ?></p>
                <?php endif; ?>
            </article>
        </div>
        <!--end faq-->
		<?php
	}
}