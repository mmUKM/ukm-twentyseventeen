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

    protected function render() {
        $args = array(
            'post_type'      => 'slideshow',
            'posts_per_page' => 20,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        );

        $slideshow = new WP_Query( $args );
        ?>
        <div class="uk-position-relative uk-visible-toggle" uk-slideshow="animation: fade; autoplay: true; autoplay-interval: 5000" tabindex="-1" id="elementor-slideshow-<?php echo esc_attr( $this->get_id() ); ?>">
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
                    <li><img src="<?php echo esc_url( get_template_directory_uri() . '/images/ukm-dectar-1.avif' ); ?>" alt="UKM" uk-cover></li>
                <?php endif; ?>
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>
            <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin-small"></ul>
        </div>
        <?php
    }
}