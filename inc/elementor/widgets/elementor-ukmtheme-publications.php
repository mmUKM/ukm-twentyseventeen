<?php
/**
 * Elementor Widget: UKM Theme Publications
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_UKMTheme_Publications extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ukmtheme_publications';
	}

	public function get_title() {
		return esc_html__( 'UKM: Penerbitan', 'ukmtheme' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'ukmtheme' ];
	}

	public function get_keywords() {
		return [ 'publication', 'penerbitan', 'buku', 'book', 'jurnal', 'pubcat' ];
	}

	/**
	 * Dapatkan senarai kategori taxonomy penerbitan (pubcat)
	 */
	private function get_publication_categories() {
		$options = [];

		if ( ! taxonomy_exists( 'pubcat' ) ) {
			return $options;
		}

		$terms = get_terms( [
			'taxonomy'   => 'pubcat',
			'hide_empty' => false,
		] );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				$options[ $term->slug ] = $term->name;
			}
		}

		return $options;
	}

	protected function register_controls(): void {

		// ==========================================
		// TAB CONTENT: Tetapan Kandungan & Kueri
		// ==========================================
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Kandungan Penerbitan', 'ukmtheme' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// 1. Pilih Taxonomy (Kategori Penerbitan)
		$this->add_control(
			'pubcat',
			[
				'label'       => esc_html__( 'Kategori Penerbitan', 'ukmtheme' ),
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple'    => true,
				'options'     => $this->get_publication_categories(),
				'default'     => [],
				'description' => esc_html__( 'Pilih satu atau lebih kategori penerbitan. Biarkan kosong untuk memaparkan semua kategori.', 'ukmtheme' ),
			]
		);

		// Jumlah Paparan
		$this->add_control(
			'posts_per_page',
			[
				'label'       => esc_html__( 'Jumlah Paparan', 'ukmtheme' ),
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'min'         => -1,
				'max'         => 100,
				'step'        => 1,
				'default'     => 6,
				'description' => esc_html__( 'Masukkan bilangan penerbitan untuk dipaparkan. Masukkan -1 untuk semua.', 'ukmtheme' ),
			]
		);

		// Lajur Grid
		$this->add_control(
			'columns',
			[
				'label'   => esc_html__( 'Lajur Grid', 'ukmtheme' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2' => esc_html__( '2 Lajur', 'ukmtheme' ),
					'3' => esc_html__( '3 Lajur (Asal)', 'ukmtheme' ),
					'4' => esc_html__( '4 Lajur', 'ukmtheme' ),
				],
			]
		);

		// 2. Tertib Susunan (Orderby & Order)
		$this->add_control(
			'orderby',
			[
				'label'   => esc_html__( 'Susunan Mengikut', 'ukmtheme' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date'       => esc_html__( 'Tarikh (Date)', 'ukmtheme' ),
					'title'      => esc_html__( 'Tajuk (Title)', 'ukmtheme' ),
					'menu_order' => esc_html__( 'Menu Order', 'ukmtheme' ),
					'rand'       => esc_html__( 'Rawak (Random)', 'ukmtheme' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Tertib Susunan', 'ukmtheme' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__( 'Menurun (DESC / Terkini)', 'ukmtheme' ),
					'ASC'  => esc_html__( 'Menaik (ASC / Terdahulu)', 'ukmtheme' ),
				],
			]
		);

		// 3. Sorok / Papar Butang
		$this->add_control(
			'show_button',
			[
				'label'        => esc_html__( 'Papar Butang Tindakan', 'ukmtheme' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Papar', 'ukmtheme' ),
				'label_off'    => esc_html__( 'Sorok', 'ukmtheme' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'description'  => esc_html__( 'Pilih untuk papar atau sorok butang pautan ke naskhah/halaman penerbitan.', 'ukmtheme' ),
			]
		);

		// Kustom Teks Butang (Pilihan)
		$this->add_control(
			'button_text',
			[
				'label'       => esc_html__( 'Teks Butang (Pilihan)', 'ukmtheme' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Dapatkan Naskhah / Get Copy', 'ukmtheme' ),
				'description' => esc_html__( 'Biarkan kosong untuk menggunakan teks butang automatik mengikut tetapan penerbitan.', 'ukmtheme' ),
				'condition'   => [
					'show_button' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		// ==========================================
		// TAB STYLE: 4. Tukar Warna Butang
		// ==========================================
		$this->start_controls_section(
			'section_style_button',
			[
				'label'     => esc_html__( 'Warna Butang', 'ukmtheme' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_button' => 'yes',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		// Tab Butang: Normal
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'ukmtheme' ),
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label'     => esc_html__( 'Warna Latar (Background)', 'ukmtheme' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .publication-card .publication-card-action .publication-btn-get' => 'background-color: {{VALUE}} !important; border-color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => esc_html__( 'Warna Teks (Text Color)', 'ukmtheme' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .publication-card .publication-card-action .publication-btn-get' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_tab();

		// Tab Butang: Hover
		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'ukmtheme' ),
			]
		);

		$this->add_control(
			'button_hover_bg_color',
			[
				'label'     => esc_html__( 'Warna Latar Hover', 'ukmtheme' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .publication-card .publication-card-action .publication-btn-get:hover, {{WRAPPER}} .publication-card .publication-card-action .publication-btn-get:focus' => 'background-color: {{VALUE}} !important; border-color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'button_hover_text_color',
			[
				'label'     => esc_html__( 'Warna Teks Hover', 'ukmtheme' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .publication-card .publication-card-action .publication-btn-get:hover, {{WRAPPER}} .publication-card .publication-card-action .publication-btn-get:focus' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render(): void {
		$settings = $this->get_settings_for_display();

		// Kategori taxonomy (pubcat)
		$selected_pubcats = [];
		if ( ! empty( $settings['pubcat'] ) ) {
			if ( is_array( $settings['pubcat'] ) ) {
				$selected_pubcats = array_filter( $settings['pubcat'] );
			} else {
				$selected_pubcats = [ $settings['pubcat'] ];
			}
		} elseif ( ! empty( $settings['slug_pubcat'] ) ) {
			$selected_pubcats = [ sanitize_title( $settings['slug_pubcat'] ) ];
		} elseif ( ! empty( $settings['slug_department'] ) && 'penerbitan-2025' !== $settings['slug_department'] ) {
			$selected_pubcats = [ sanitize_title( $settings['slug_department'] ) ];
		}

		// Kueri Penerbitan
		$posts_per_page = isset( $settings['posts_per_page'] ) && '' !== $settings['posts_per_page'] ? intval( $settings['posts_per_page'] ) : 6;
		$orderby        = ! empty( $settings['orderby'] ) ? sanitize_key( $settings['orderby'] ) : 'date';
		$order          = ! empty( $settings['order'] ) ? sanitize_key( $settings['order'] ) : 'DESC';

		$query_args = [
			'post_type'      => 'publication',
			'posts_per_page' => $posts_per_page,
			'orderby'        => $orderby,
			'order'          => $order,
			'post_status'    => 'publish',
		];

		if ( ! empty( $selected_pubcats ) ) {
			$query_args['tax_query'] = [
				[
					'taxonomy' => 'pubcat',
					'field'    => 'slug',
					'terms'    => $selected_pubcats,
					'operator' => 'IN',
				],
			];
		}

		$publication_query = new \WP_Query( $query_args );

		// Kelas Grid Lajur
		$columns_class = 'uk-child-width-1-3@m';
		if ( ! empty( $settings['columns'] ) ) {
			switch ( $settings['columns'] ) {
				case '2':
					$columns_class = 'uk-child-width-1-2@m';
					break;
				case '4':
					$columns_class = 'uk-child-width-1-4@m';
					break;
				case '3':
				default:
					$columns_class = 'uk-child-width-1-3@m';
					break;
			}
		}
		$grid_class = $columns_class . ' uk-child-width-1-2@s uk-grid-match uk-grid-medium';

		// Gaya butang inline fallback
		$btn_inline_style = '';
		if ( ! empty( $settings['button_bg_color'] ) ) {
			$btn_inline_style .= 'background-color: ' . esc_attr( $settings['button_bg_color'] ) . '; border-color: ' . esc_attr( $settings['button_bg_color'] ) . ';';
		}
		if ( ! empty( $settings['button_text_color'] ) ) {
			$btn_inline_style .= 'color: ' . esc_attr( $settings['button_text_color'] ) . ';';
		}
		?>

		<div class="ukmtheme-publications-widget">
			<?php if ( $publication_query->have_posts() ) : ?>
				<div class="<?php echo esc_attr( $grid_class ); ?>" uk-grid>
					<?php while ( $publication_query->have_posts() ) : $publication_query->the_post();
						$pub_cover = get_post_meta( get_the_ID(), 'ut_publication_cover', true );
						if ( empty( $pub_cover ) && has_post_thumbnail() ) {
							$pub_cover = get_the_post_thumbnail_url( get_the_ID(), 'large' );
						}
						if ( empty( $pub_cover ) ) {
							$pub_cover = get_template_directory_uri() . '/assets/images/placeholder_publication.svg';
						}

						$author    = get_post_meta( get_the_ID(), 'ut_publication_author', true );
						$price     = get_post_meta( get_the_ID(), 'ut_publication_price', true );
						$btn_label = ! empty( $settings['button_text'] )
							? $settings['button_text']
							: ( function_exists( 'ukmtheme_get_publication_btn_label' )
								? ukmtheme_get_publication_btn_label( get_the_ID() )
								: __( 'Get Copy', 'ukmtheme' ) );
					?>
						<div>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'uk-card uk-card-default uk-box-shadow-small uk-box-shadow-hover-medium uk-border-rounded uk-overflow-hidden uk-flex uk-flex-column publication-card' ); ?>>

								<!-- UIKit Card Media Top: Cover Buku -->
								<div class="uk-card-media-top uk-text-center uk-position-relative publication-card-media">
									<a href="<?php echo esc_url( get_permalink() ); ?>" class="uk-display-block uk-inline-clip uk-transition-toggle" aria-label="<?php the_title_attribute(); ?>">
										<div class="publication-cover-box uk-flex uk-flex-center uk-flex-middle">
											<img src="<?php echo esc_url( $pub_cover ); ?>" alt="<?php the_title_attribute(); ?>" class="publication-cover-img uk-transition-scale-up uk-transition-opaque uk-border-rounded uk-box-shadow-small">
										</div>
									</a>
								</div>

								<!-- UIKit Card Body: Penulis, Tajuk, Harga & Butang Dapatkan -->
								<div class="uk-card-body uk-flex-1 uk-flex uk-flex-column uk-padding-small">
									<?php if ( ! empty( $author ) ) : ?>
										<p class="uk-text-meta uk-margin-remove-top uk-margin-small-bottom uk-text-truncate" title="<?php echo esc_attr( $author ); ?>">
											<span uk-icon="icon: user; ratio: 0.8"></span> <?php echo esc_html( $author ); ?>
										</p>
									<?php endif; ?>

									<h3 class="uk-card-title uk-margin-remove-top uk-margin-small-bottom publication-card-title">
										<a class="uk-link-heading" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
											<?php the_title(); ?>
										</a>
									</h3>

									<?php if ( ! empty( $price ) ) : ?>
										<div class="publication-card-price uk-margin-small-bottom">
											<span class="uk-text-bold uk-text-primary"><?php echo esc_html( $price ); ?></span>
										</div>
									<?php endif; ?>

									<!-- Butang Dapatkan (pautan ke halaman single publication) -->
									<?php if ( 'yes' === $settings['show_button'] ) : ?>
										<div class="uk-margin-auto-top uk-margin-small-top publication-card-action">
											<a href="<?php echo esc_url( get_permalink() ); ?>" class="uk-button uk-button-primary uk-button-small uk-width-1-1 uk-border-rounded publication-btn-get"<?php echo ! empty( $btn_inline_style ) ? ' style="' . esc_attr( $btn_inline_style ) . '"' : ''; ?>>
												<?php echo esc_html( $btn_label ); ?>
												<span uk-icon="icon: arrow-right; ratio: 0.8" class="uk-margin-small-left"></span>
											</a>
										</div>
									<?php endif; ?>
								</div>

							</article>
						</div>
					<?php endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php else : ?>
				<div class="uk-card uk-card-default uk-card-body uk-border-rounded">
					<p><?php esc_html_e( 'Tiada penerbitan dijumpai.', 'ukmtheme' ); ?></p>
				</div>
			<?php endif; ?>
		</div>

		<?php
	}
}
