<?php
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
		return [ 'hello', 'world' ];
	}

	protected function render() {
		?>
            <!--start slideshow-->
            <div>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; autoplay-interval: 6000; ratio: 1440:560; animation: push">
                    <ul class="uk-slideshow-items">
                        <?php
                            $args = array(
                                'post_type'       => 'slideshow',
                                'posts_per_page'  => 20,
                                'orderby'         => 'menu_order',
                                'post_status' => 'publish',
                            );

                            $slideshow = new WP_Query( $args );

                            if ( $slideshow->have_posts() ) : while ( $slideshow->have_posts() ) : $slideshow->the_post(); 
                        ?>
                        <li>
                            <a href="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_link', true ); ?>">
                                <img src="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_image', true ); ?>" alt="<?php the_title(); ?>" uk-cover>
                            </a>
                        </li>            
                        <?php endwhile; else: ?>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/ukm-dectar-1.avif" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/ukm-dectar-1.avif" alt="" uk-cover>
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/ukm-dectar-1.avif" alt="" uk-cover>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                </div>
            </div>
            <!--end slideshow-->

		<?php
	}
}