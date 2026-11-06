<?php
/**
 * Elementor Widget: UKM Slideshow (BX Slider)
 *
 * Displays the 'slideshow' CPT using bxSlider.
 * Fully compatible with Elementor Editor Mode and Frontend.
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_UKMTheme_Slideshow extends \Elementor\Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        $uri = get_template_directory_uri();
        if ( ! wp_script_is( 'bxslider', 'registered' ) ) {
            wp_register_script( 'bxslider', $uri . '/assets/libs/bxslider/jquery.bxslider.min.js', [ 'jquery' ], '4.2.17', true );
        }
        if ( ! wp_style_is( 'bxslider', 'registered' ) ) {
            wp_register_style( 'bxslider', $uri . '/assets/libs/bxslider/jquery.bxslider.min.css', [], '4.2.17' );
        }
    }

    public function get_name() {
        return 'ukmtheme_slideshow';
    }

    public function get_title() {
        return esc_html__( 'UKM: Slideshow (BX Slider)', 'ukmtheme' );
    }

    public function get_icon() {
        return 'eicon-slides';
    }

    public function get_categories() {
        return [ 'ukmtheme' ];
    }

    public function get_keywords() {
        return [ 'slideshow', 'slider', 'bxslider', 'ukm', 'hero', 'banner' ];
    }

    public function get_script_depends() {
        return [ 'jquery', 'bxslider' ];
    }

    public function get_style_depends() {
        return [ 'bxslider' ];
    }

    protected function register_controls(): void {
        // --- SECTION: Query Settings ---
        $this->start_controls_section(
            'section_query_settings',
            [
                'label' => esc_html__( 'Tetapan Query', 'ukmtheme' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label'   => esc_html__( 'Bilangan Slaid', 'ukmtheme' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 30,
                'step'    => 1,
                'default' => 10,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__( 'Susunan Mengikut', 'ukmtheme' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'menu_order',
                'options' => [
                    'menu_order' => esc_html__( 'Menu Order', 'ukmtheme' ),
                    'date'       => esc_html__( 'Tarikh', 'ukmtheme' ),
                    'title'      => esc_html__( 'Tajuk', 'ukmtheme' ),
                    'rand'       => esc_html__( 'Rawak (Random)', 'ukmtheme' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label'   => esc_html__( 'Tertib Susunan', 'ukmtheme' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => esc_html__( 'Menaik (ASC)', 'ukmtheme' ),
                    'DESC' => esc_html__( 'Menurun (DESC)', 'ukmtheme' ),
                ],
            ]
        );

        $this->end_controls_section();

        // --- SECTION: Slideshow Display Settings ---
        $this->start_controls_section(
            'section_slideshow_settings',
            [
                'label' => esc_html__( 'Tetapan BX Slider', 'ukmtheme' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'mode',
            [
                'label'   => esc_html__( 'Mod Transisi (Animasi)', 'ukmtheme' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'fade',
                'options' => [
                    'fade'       => esc_html__( 'Fade (Pudar)', 'ukmtheme' ),
                    'horizontal' => esc_html__( 'Horizontal (Mendatar)', 'ukmtheme' ),
                    'vertical'   => esc_html__( 'Vertical (Menegak)', 'ukmtheme' ),
                ],
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
                    '1920:700' => '1920:700 (Hero Banner)',
                    '1440:560' => '1440:560 (Banner Lebar)',
                    '21:9'     => '21:9 (Ultrawide)',
                    '4:3'      => '4:3 (Standard)',
                    '3:2'      => '3:2 (Foto)',
                    '1:1'      => '1:1 (Segi Empat)',
                    'auto'     => esc_html__( 'Auto (Ketinggian Semulajadi)', 'ukmtheme' ),
                    'custom'   => esc_html__( 'Custom Ratio', 'ukmtheme' ),
                ],
                'description' => esc_html__( 'Nisbah perkadaran saiz imej slideshow.', 'ukmtheme' ),
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
                'default'     => 300,
                'condition'   => [
                    'aspect_ratio!' => 'auto',
                ],
                'description' => esc_html__( 'Ketinggian minimum terutama pada paparan mudah alih.', 'ukmtheme' ),
            ]
        );

        $this->add_control(
            'max_height',
            [
                'label'       => esc_html__( 'Max Height (px)', 'ukmtheme' ),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'min'         => 0,
                'max'         => 2000,
                'step'        => 10,
                'default'     => 0,
                'condition'   => [
                    'aspect_ratio!' => 'auto',
                ],
                'description' => esc_html__( 'Ketinggian maksimum (0 untuk tiada had).', 'ukmtheme' ),
            ]
        );

        $this->add_control(
            'adaptive_height',
            [
                'label'        => esc_html__( 'Adaptive Height', 'ukmtheme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Ya', 'ukmtheme' ),
                'label_off'    => esc_html__( 'Tidak', 'ukmtheme' ),
                'return_value' => 'yes',
                'default'      => 'no',
                'description'  => esc_html__( 'Ketinggian slaid mengikut ketinggian imej semasa secara dinamik.', 'ukmtheme' ),
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'        => esc_html__( 'Autoplay', 'ukmtheme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Ya', 'ukmtheme' ),
                'label_off'    => esc_html__( 'Tidak', 'ukmtheme' ),
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
                'min'       => 1000,
                'max'       => 20000,
                'step'      => 500,
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'speed',
            [
                'label'     => esc_html__( 'Kelajuan Transisi (ms)', 'ukmtheme' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'default'   => 800,
                'min'       => 200,
                'max'       => 3000,
                'step'      => 100,
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label'        => esc_html__( 'Pause On Hover', 'ukmtheme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Ya', 'ukmtheme' ),
                'label_off'    => esc_html__( 'Tidak', 'ukmtheme' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // --- SECTION: Caption & Overlay ---
        $this->start_controls_section(
            'section_caption_settings',
            [
                'label' => esc_html__( 'Kapsyen & Hamparan (Overlay)', 'ukmtheme' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_caption',
            [
                'label'        => esc_html__( 'Papar Tajuk & Kapsyen', 'ukmtheme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Ya', 'ukmtheme' ),
                'label_off'    => esc_html__( 'Tidak', 'ukmtheme' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'show_overlay',
            [
                'label'        => esc_html__( 'Hamparan Gradien Gelap', 'ukmtheme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Ya', 'ukmtheme' ),
                'label_off'    => esc_html__( 'Tidak', 'ukmtheme' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'description'  => esc_html__( 'Meningkatkan kebolehbacaan teks di atas imej.', 'ukmtheme' ),
            ]
        );

        $this->add_control(
            'show_button',
            [
                'label'        => esc_html__( 'Papar Butang Pautan', 'ukmtheme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Ya', 'ukmtheme' ),
                'label_off'    => esc_html__( 'Tidak', 'ukmtheme' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'show_caption' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => esc_html__( 'Teks Butang', 'ukmtheme' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Ketahui Lebih Lanjut', 'ukmtheme' ),
                'condition'   => [
                    'show_caption' => 'yes',
                    'show_button'  => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // --- SECTION: Navigation Controls ---
        $this->start_controls_section(
            'section_nav_settings',
            [
                'label' => esc_html__( 'Navigasi', 'ukmtheme' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_arrows',
            [
                'label'        => esc_html__( 'Papar Anak Panah (Controls)', 'ukmtheme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Ya', 'ukmtheme' ),
                'label_off'    => esc_html__( 'Tidak', 'ukmtheme' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'show_dots',
            [
                'label'        => esc_html__( 'Papar Dot Navigasi (Pager)', 'ukmtheme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Ya', 'ukmtheme' ),
                'label_off'    => esc_html__( 'Tidak', 'ukmtheme' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'nav_color',
            [
                'label'   => esc_html__( 'Warna Butang Navigasi', 'ukmtheme' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'nav-light',
                'options' => [
                    'nav-light' => esc_html__( 'Terang / Putih (nav-light)', 'ukmtheme' ),
                    'nav-dark'  => esc_html__( 'Gelap / Hitam (nav-dark)', 'ukmtheme' ),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        // Enqueue fallback if not loaded via Elementor dependencies
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'bxslider' );
        wp_enqueue_style( 'bxslider' );

        $settings = $this->get_settings_for_display();

        $mode              = ! empty( $settings['mode'] ) ? sanitize_key( $settings['mode'] ) : 'fade';
        $aspect_ratio      = $settings['aspect_ratio'] ?? '16:9';
        $autoplay          = ( $settings['autoplay'] ?? 'yes' ) === 'yes';
        $autoplay_interval = ! empty( $settings['autoplay_interval'] ) ? absint( $settings['autoplay_interval'] ) : 5000;
        $speed             = ! empty( $settings['speed'] ) ? absint( $settings['speed'] ) : 800;
        $pause_on_hover    = ( $settings['pause_on_hover'] ?? 'yes' ) === 'yes';
        $adaptive_height   = ( $settings['adaptive_height'] ?? 'no' ) === 'yes';
        $show_arrows       = ( $settings['show_arrows'] ?? 'yes' ) === 'yes';
        $show_dots         = ( $settings['show_dots'] ?? 'yes' ) === 'yes';
        $nav_color         = ! empty( $settings['nav_color'] ) ? esc_attr( $settings['nav_color'] ) : 'nav-light';

        $show_caption = ( $settings['show_caption'] ?? 'yes' ) === 'yes';
        $show_overlay = ( $settings['show_overlay'] ?? 'yes' ) === 'yes';
        $show_button  = ( $settings['show_button'] ?? 'yes' ) === 'yes';
        $button_text  = ! empty( $settings['button_text'] ) ? esc_html( $settings['button_text'] ) : esc_html__( 'Ketahui Lebih Lanjut', 'ukmtheme' );

        // Ratio & height calculations
        $ratio = ( 'custom' === $aspect_ratio && ! empty( $settings['custom_ratio'] ) )
            ? sanitize_text_field( $settings['custom_ratio'] )
            : $aspect_ratio;

        $min_height = ! empty( $settings['min_height'] ) ? absint( $settings['min_height'] ) : 300;
        $max_height = ! empty( $settings['max_height'] ) ? absint( $settings['max_height'] ) : 0;

        $media_style_rules = [
            'position: relative;',
            'width: 100%;',
            'overflow: hidden;',
        ];

        if ( 'auto' !== $aspect_ratio ) {
            $ratio_css = str_replace( ':', ' / ', $ratio );
            $media_style_rules[] = 'aspect-ratio: ' . esc_attr( $ratio_css ) . ';';
            if ( $min_height > 0 ) {
                $media_style_rules[] = 'min-height: ' . $min_height . 'px;';
            }
            if ( $max_height > 0 ) {
                $media_style_rules[] = 'max-height: ' . $max_height . 'px;';
            }
        }
        $media_style = implode( ' ', $media_style_rules );

        // Query CPT: slideshow
        $posts_per_page = ! empty( $settings['posts_per_page'] ) ? intval( $settings['posts_per_page'] ) : 10;
        $orderby        = ! empty( $settings['orderby'] ) ? sanitize_key( $settings['orderby'] ) : 'menu_order';
        $order          = ! empty( $settings['order'] ) ? sanitize_key( $settings['order'] ) : 'ASC';

        $args = [
            'post_type'      => 'slideshow',
            'post_status'    => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby'        => $orderby,
            'order'          => $order,
        ];

        $slideshow_query = new \WP_Query( $args );

        // Collect slides
        $slides = [];
        $default_image = get_template_directory_uri() . '/assets/images/ukm-dectar-1.avif';

        if ( $slideshow_query->have_posts() ) {
            while ( $slideshow_query->have_posts() ) {
                $slideshow_query->the_post();
                $post_id = get_the_ID();

                $slide_image = get_post_meta( $post_id, 'ut_slideshow_image', true );

                if ( empty( $slide_image ) ) {
                    $img_id = get_post_meta( $post_id, 'ut_slideshow_image_id', true );
                    if ( $img_id ) {
                        $slide_image = wp_get_attachment_url( $img_id );
                    }
                }

                if ( empty( $slide_image ) && has_post_thumbnail( $post_id ) ) {
                    $slide_image = get_the_post_thumbnail_url( $post_id, 'full' );
                }

                if ( empty( $slide_image ) ) {
                    $slide_image = $default_image;
                }

                $slides[] = [
                    'id'          => $post_id,
                    'title'       => get_the_title(),
                    'image'       => esc_url( $slide_image ),
                    'link'        => esc_url( get_post_meta( $post_id, 'ut_slideshow_link', true ) ),
                    'caption'     => get_post_meta( $post_id, 'ut_slideshow_caption', true ),
                    'caption_hide'=> get_post_meta( $post_id, 'ut_slideshow_caption_hide', true ),
                ];
            }
            wp_reset_postdata();
        }

        // Demo fallback if no slides exist
        if ( empty( $slides ) ) {
            $slides = [
                [
                    'id'          => 0,
                    'title'       => 'Universiti Kebangsaan Malaysia',
                    'image'       => get_template_directory_uri() . '/assets/images/ukm-dectar-1.avif',
                    'link'        => '#',
                    'caption'     => 'Mendaulatkan Bahasa Melayu, Memugar Ilmu Menembus Sempadan. Menerajui kecemerlangan pendidikan dan penyelidikan bertaraf global.',
                    'caption_hide'=> 'on',
                ],
                [
                    'id'          => 0,
                    'title'       => 'Pembelajaran Inovatif & Kecemerlangan',
                    'image'       => get_template_directory_uri() . '/assets/images/Slide-A.jpg',
                    'link'        => '#',
                    'caption'     => 'Menawarkan program prasiswazah dan pascasiswazah berdaya saing tinggi yang bersedia menghadapi cabaran masa depan.',
                    'caption_hide'=> 'on',
                ],
            ];
        }

        $widget_id = 'elementor-bxslider-' . esc_attr( $this->get_id() );
        $slider_id = 'bxslider-' . esc_attr( $this->get_id() );
        ?>

        <style>
            #<?php echo esc_attr( $widget_id ); ?> {
                position: relative;
                width: 100%;
                overflow: hidden;
            }
            #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper {
                margin: 0 !important;
                padding: 0 !important;
                border: 0 !important;
                background: transparent !important;
                box-shadow: none !important;
                -webkit-box-shadow: none !important;
            }
            #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper .bx-viewport {
                border: 0 !important;
                background: transparent !important;
                box-shadow: none !important;
                -webkit-box-shadow: none !important;
            }
            #<?php echo esc_attr( $widget_id ); ?> ul.ukmtheme-bxslider {
                margin: 0 !important;
                padding: 0 !important;
                list-style: none !important;
            }
            /* Prevent FOUC before BX Slider initialization */
            #<?php echo esc_attr( $widget_id ); ?>:not(.bx-slider-ready) .ukmtheme-bxslider > li:not(:first-child) {
                display: none;
            }
            #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-item {
                position: relative;
                width: 100%;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }
            #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
            }
            #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(0,0,0,0.18) 0%, rgba(0,0,0,0.45) 60%, rgba(0,0,0,0.78) 100%);
                pointer-events: none;
                z-index: 2;
            }
            #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-caption-wrap {
                position: absolute;
                inset: 0;
                z-index: 5;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                padding: 30px;
                pointer-events: none;
            }
            #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-caption-container {
                width: 100%;
                max-width: 1140px;
                margin: 0 auto;
            }
            #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-caption-box {
                background: rgba(15, 23, 42, 0.85);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                max-width: 620px;
                padding: 24px 28px;
                border-radius: 8px;
                border-left: 5px solid #cc0000;
                box-shadow: 0 12px 32px rgba(0,0,0,0.35);
                pointer-events: auto;
            }
            #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-title {
                color: #ffffff;
                font-family: "Poppins", Helvetica, Arial, sans-serif;
                font-size: 26px;
                font-weight: 700;
                line-height: 1.25;
                letter-spacing: -0.5px;
                margin: 0 0 10px 0;
            }
            #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-desc {
                color: #e2e8f0;
                font-family: "Inter", Helvetica, Arial, sans-serif;
                font-size: 15px;
                line-height: 1.6;
                margin: 0 0 14px 0;
            }
            #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background-color: #cc0000;
                color: #ffffff !important;
                text-decoration: none !important;
                font-weight: 600;
                font-size: 14px;
                padding: 8px 20px;
                border-radius: 6px;
                line-height: 1.5;
                transition: all 0.2s ease;
            }
            #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-btn:hover {
                background-color: #b30000;
                transform: translateY(-1px);
                color: #ffffff !important;
            }
            #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-cover-link {
                position: absolute;
                inset: 0;
                z-index: 6;
                text-indent: -9999px;
            }

            /* BX Slider Controls (Arrows) Styling */
            #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper .bx-controls-direction a {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                z-index: 20;
                width: 44px;
                height: 44px;
                line-height: 44px;
                text-align: center;
                border-radius: 50%;
                text-indent: 0 !important;
                background-image: none !important;
                text-decoration: none !important;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                font-family: inherit;
                transition: all 0.25s ease;
                opacity: 0;
                pointer-events: auto;
                outline: none;
            }
            #<?php echo esc_attr( $widget_id ); ?>:hover .bx-wrapper .bx-controls-direction a {
                opacity: 1;
            }
            #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper .bx-prev {
                left: 20px;
            }
            #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper .bx-next {
                right: 20px;
            }

            /* Controls Light Style */
            #<?php echo esc_attr( $widget_id ); ?>.nav-light .bx-wrapper .bx-controls-direction a {
                background: rgba(15, 23, 42, 0.65);
                color: #ffffff;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            #<?php echo esc_attr( $widget_id ); ?>.nav-light .bx-wrapper .bx-controls-direction a:hover {
                background: #cc0000;
                border-color: #cc0000;
                color: #ffffff;
                transform: translateY(-50%) scale(1.08);
            }

            /* Controls Dark Style */
            #<?php echo esc_attr( $widget_id ); ?>.nav-dark .bx-wrapper .bx-controls-direction a {
                background: rgba(255, 255, 255, 0.85);
                color: #111827;
                border: 1px solid rgba(0, 0, 0, 0.1);
            }
            #<?php echo esc_attr( $widget_id ); ?>.nav-dark .bx-wrapper .bx-controls-direction a:hover {
                background: #cc0000;
                border-color: #cc0000;
                color: #ffffff;
                transform: translateY(-50%) scale(1.08);
            }

            /* BX Slider Pager (Dots) Styling */
            #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper .bx-pager {
                position: absolute;
                bottom: 20px;
                left: 0;
                width: 100%;
                z-index: 20;
                padding: 0;
                margin: 0;
                text-align: center;
            }
            #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper .bx-pager.bx-default-pager a {
                display: inline-block;
                width: 10px;
                height: 10px;
                margin: 0 4px;
                border-radius: 5px;
                background: rgba(255, 255, 255, 0.45);
                border: 1px solid rgba(0, 0, 0, 0.15);
                text-indent: -9999px;
                transition: all 0.3s ease;
                outline: none;
            }
            #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper .bx-pager.bx-default-pager a.active,
            #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper .bx-pager.bx-default-pager a:hover {
                background: #cc0000;
                width: 26px;
                border-color: #cc0000;
            }

            @media (max-width: 767px) {
                #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper .bx-controls-direction a {
                    opacity: 0.85;
                    width: 36px;
                    height: 36px;
                    line-height: 36px;
                    font-size: 16px;
                }
                #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper .bx-prev {
                    left: 10px;
                }
                #<?php echo esc_attr( $widget_id ); ?> .bx-wrapper .bx-next {
                    right: 10px;
                }
                #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-caption-wrap {
                    padding: 15px;
                    align-items: flex-end;
                    padding-bottom: 45px;
                }
                #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-caption-box {
                    padding: 16px 18px;
                    max-width: 100%;
                }
                #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-title {
                    font-size: 18px;
                    margin-bottom: 6px;
                }
                #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-desc {
                    font-size: 13px;
                    line-height: 1.45;
                    margin-bottom: 10px;
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }
                #<?php echo esc_attr( $widget_id ); ?> .ukmtheme-slide-btn {
                    padding: 6px 16px;
                    font-size: 13px;
                }
            }
        </style>

        <div class="ukmtheme-slideshow-widget ukmtheme-bxslider-wrapper <?php echo esc_attr( $nav_color ); ?>"
             id="<?php echo esc_attr( $widget_id ); ?>">

            <ul class="ukmtheme-bxslider" id="<?php echo esc_attr( $slider_id ); ?>">
                <?php foreach ( $slides as $slide ) :
                    $has_caption = $show_caption && (
                        'on' === $slide['caption_hide'] ||
                        1 == $slide['caption_hide'] ||
                        ! empty( $slide['caption'] ) ||
                        ! empty( $slide['title'] )
                    );
                ?>
                    <li class="ukmtheme-slide-item">
                        <div class="ukmtheme-slide-media" style="<?php echo esc_attr( $media_style ); ?>">
                            <img src="<?php echo esc_url( $slide['image'] ); ?>" 
                                 alt="<?php echo esc_attr( $slide['title'] ); ?>" 
                                 class="ukmtheme-slide-img">

                            <?php if ( $show_overlay ) : ?>
                                <div class="ukmtheme-slide-overlay"></div>
                            <?php endif; ?>

                            <?php if ( $has_caption ) : ?>
                                <div class="ukmtheme-slide-caption-wrap">
                                    <div class="wrap uk-container ukmtheme-slide-caption-container">
                                        <div class="ukmtheme-slide-caption-box">
                                            <?php if ( ! empty( $slide['title'] ) ) : ?>
                                                <h2 class="ukmtheme-slide-title">
                                                    <?php echo esc_html( $slide['title'] ); ?>
                                                </h2>
                                            <?php endif; ?>

                                            <?php if ( ! empty( $slide['caption'] ) ) : ?>
                                                <p class="ukmtheme-slide-desc">
                                                    <?php echo esc_html( $slide['caption'] ); ?>
                                                </p>
                                            <?php endif; ?>

                                            <?php if ( ! empty( $slide['link'] ) && $show_button ) : ?>
                                                <div>
                                                    <a href="<?php echo esc_url( $slide['link'] ); ?>" class="ukmtheme-slide-btn">
                                                        <span><?php echo $button_text; ?></span>
                                                        <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif ( ! empty( $slide['link'] ) ) : ?>
                                <a href="<?php echo esc_url( $slide['link'] ); ?>" class="ukmtheme-slide-cover-link" aria-label="<?php echo esc_attr( $slide['title'] ); ?>">
                                    <?php echo esc_html( $slide['title'] ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>

        <script>
        (function($) {
            var sliderId = '<?php echo esc_js( $slider_id ); ?>';
            var widgetId = '<?php echo esc_js( $widget_id ); ?>';

            function initBxSlider() {
                var $slider = $( '#' + sliderId );
                if ( ! $slider.length || typeof $.fn.bxSlider !== 'function' ) {
                    return;
                }

                // If existing instance exists, destroy before re-init
                var existing = $slider.data( 'bxSlider' );
                if ( existing ) {
                    try {
                        existing.destroySlider();
                    } catch(e) {}
                }

                $slider.bxSlider({
                    mode: '<?php echo esc_js( $mode ); ?>',
                    speed: <?php echo absint( $speed ); ?>,
                    auto: <?php echo $autoplay ? 'true' : 'false'; ?>,
                    pause: <?php echo absint( $autoplay_interval ); ?>,
                    autoHover: <?php echo $pause_on_hover ? 'true' : 'false'; ?>,
                    controls: <?php echo $show_arrows ? 'true' : 'false'; ?>,
                    pager: <?php echo $show_dots ? 'true' : 'false'; ?>,
                    adaptiveHeight: <?php echo $adaptive_height ? 'true' : 'false'; ?>,
                    touchEnabled: true,
                    preventDefaultSwipeX: false,
                    stopAutoOnClick: true,
                    nextText: '&#10095;',
                    prevText: '&#10094;',
                    onSliderLoad: function() {
                        $( '#' + widgetId ).addClass( 'bx-slider-ready' );
                    }
                });
            }

            function waitAndInit( retryCount ) {
                retryCount = retryCount || 0;
                if ( typeof $.fn.bxSlider === 'function' ) {
                    initBxSlider();
                } else if ( retryCount < 20 ) {
                    setTimeout( function() {
                        waitAndInit( retryCount + 1 );
                    }, 100 );
                }
            }

            if ( document.readyState === 'complete' || document.readyState === 'interactive' ) {
                waitAndInit();
            } else {
                $( document ).ready( function() {
                    waitAndInit();
                });
            }

            // Elementor editor live hooks
            $( window ).on( 'elementor/frontend/init', function() {
                if ( window.elementorFrontend && window.elementorFrontend.hooks ) {
                    elementorFrontend.hooks.addAction( 'frontend/element_ready/ukmtheme_slideshow.default', function( $scope ) {
                        if ( $scope.find( '#' + sliderId ).length ) {
                            waitAndInit();
                        }
                    });
                }
            });
        })(jQuery);
        </script>
        <?php
    }
}
