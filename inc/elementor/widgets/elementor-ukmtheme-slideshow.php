<?php
/**
 * Elementor Widget: UKM Slideshow
 *
 * Displays the 'slideshow' CPT using UIKit 3 Slideshow component.
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

class Elementor_UKMTheme_Slideshow extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ukmtheme_slideshow';
    }

    public function get_title() {
        return esc_html__( 'UKM: Slides', 'elementor-addon' );
    }

    public function get_icon() {
        return 'eicon-slides';
    }

    public function get_categories() {
        return [ 'ukmtheme' ];
    }

    public function get_keywords() {
        return [ 'slideshow', 'slider', 'ukm' ];
    }

    protected function register_controls(): void {
        $this->start_controls_section(
            'section_slideshow_settings',
            [
                'label' => esc_html__( 'Slideshow Settings', 'ukmtheme' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'aspect_ratio',
            [
                'label'       => esc_html__( 'Aspect Ratio', 'ukmtheme' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => '16:9',
                'options'     => [
                    '16:9'     => '16:9 (Landscape)',
                    '1440:560' => '1440:560 (Banner Lebar)',
                    '21:9'     => '21:9 (Ultrawide)',
                    '4:3'      => '4:3 (Standard)',
                    '3:2'      => '3:2 (Foto)',
                    '1:1'      => '1:1 (Segi Empat)',
                    'custom'   => esc_html__( 'Custom Ratio', 'ukmtheme' ),
                ],
                'description' => esc_html__( 'Nisbah perkadaran saiz gambar slideshow agar kekal konsisten dan responsif.', 'ukmtheme' ),
            ]
        );

        $this->add_control(
            'custom_ratio',
            [
                'label'       => esc_html__( 'Custom Ratio (W:H)', 'ukmtheme' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '16:9',
                'placeholder' => '1920:800',
                'condition'   => [
                    'aspect_ratio' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'min_height',
            [
                'label'       => esc_html__( 'Min Height (px)', 'ukmtheme' ),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'min'         => 100,
                'max'         => 1200,
                'step'        => 10,
                'default'     => 250,
                'description' => esc_html__( 'Ketinggian minimum (terutamanya pada paparan telefon pintar).', 'ukmtheme' ),
            ]
        );

        $this->add_control(
            'max_height',
            [
                'label'       => esc_html__( 'Max Height (px)', 'ukmtheme' ),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'min'         => 200,
                'max'         => 2000,
                'step'        => 10,
                'description' => esc_html__( 'Ketinggian maksimum (opsyenal).', 'ukmtheme' ),
            ]
        );

        $this->add_control(
            'animation',
            [
                'label'   => esc_html__( 'Animation', 'ukmtheme' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'fade',
                'options' => [
                    'slide' => esc_html__( 'Slide', 'ukmtheme' ),
                    'fade'  => esc_html__( 'Fade', 'ukmtheme' ),
                    'scale' => esc_html__( 'Scale', 'ukmtheme' ),
                    'pull'  => esc_html__( 'Pull', 'ukmtheme' ),
                    'push'  => esc_html__( 'Push', 'ukmtheme' ),
                ],
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'        => esc_html__( 'Autoplay', 'ukmtheme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'ukmtheme' ),
                'label_off'    => esc_html__( 'No', 'ukmtheme' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'autoplay_interval',
            [
                'label'     => esc_html__( 'Autoplay Interval (ms)', 'ukmtheme' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'default'   => 5000,
                'step'      => 500,
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label'        => esc_html__( 'Pause on Hover', 'ukmtheme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'ukmtheme' ),
                'label_off'    => esc_html__( 'No', 'ukmtheme' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $ratio = ( 'custom' === ( $settings['aspect_ratio'] ?? '16:9' ) && ! empty( $settings['custom_ratio'] ) )
            ? sanitize_text_field( $settings['custom_ratio'] )
            : ( $settings['aspect_ratio'] ?? '16:9' );

        $slideshow_options = [
            'animation: ' . esc_attr( $settings['animation'] ?? 'fade' ),
            'ratio: ' . esc_attr( $ratio ),
            'autoplay: ' . ( ( $settings['autoplay'] ?? 'yes' ) === 'yes' ? 'true' : 'false' ),
            'autoplay-interval: ' . absint( $settings['autoplay_interval'] ?? 5000 ),
            'pause-on-hover: ' . ( ( $settings['pause_on_hover'] ?? 'yes' ) === 'yes' ? 'true' : 'false' ),
        ];

        if ( ! empty( $settings['min_height'] ) ) {
            $slideshow_options[] = 'min-height: ' . absint( $settings['min_height'] );
        }

        if ( ! empty( $settings['max_height'] ) ) {
            $slideshow_options[] = 'max-height: ' . absint( $settings['max_height'] );
        }

        $slideshow_attr = implode( '; ', $slideshow_options );
        $args = array(
            'post_type'      => 'slideshow',
            'posts_per_page' => 20,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        );

        $slideshow = new WP_Query( $args );
        ?>
        <div class="uk-position-relative uk-visible-toggle" uk-slideshow="<?php echo esc_attr( $slideshow_attr ); ?>" tabindex="-1" id="elementor-slideshow-<?php echo esc_attr( $this->get_id() ); ?>">
            <ul class="uk-slideshow-items">
                <?php if ( $slideshow->have_posts() ) :
                    while ( $slideshow->have_posts() ) : $slideshow->the_post();
                        $slide_link  = esc_url( get_post_meta( get_the_ID(), 'ut_slideshow_link',  true ) );
                        $slide_image = esc_url( get_post_meta( get_the_ID(), 'ut_slideshow_image', true ) );
                        if ( $slide_image ) : ?>
                        <li>
                            <?php if ( $slide_link ) : ?>
                                <a href="<?php echo $slide_link; ?>">
                                    <img src="<?php echo $slide_image; ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                                </a>
                            <?php else : ?>
                                <img src="<?php echo $slide_image; ?>" alt="<?php the_title_attribute(); ?>" uk-cover>
                            <?php endif; ?>
                        </li>
                        <?php endif;
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <li><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/ukm-dectar-1.avif' ); ?>" alt="UKM" uk-cover></li>
                <?php endif; ?>
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>
            <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin-small"></ul>
        </div>
        <?php
    }
}