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
                <script>
                    // bx-slider    
                    $(document).ready(function(){
                        $(".bxslider-home").bxSlider({
                            adaptiveHeight: true,
                            pager: false
                        });
                    });
                </script>
                <div class="bxslider-home"><!-- bx-slider -->
                    <?php
                        $args = array(
                        'post_type'       => 'slideshow',
                        'posts_per_page'  => 20,
                        'orderby'         => 'menu_order'
                        );

                        $slideshow = new WP_Query( $args );

                        if ( $slideshow->have_posts() ) : while ( $slideshow->have_posts() ) : $slideshow->the_post(); 
                    ?>
                    <div>
                        <a href="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_link', true ); ?>">
                            <img src="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_image', true ); ?>">
                        </a>
                    </div>
                    <?php endwhile; else: ?>
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ukm-dectar-1.avif">
                    </div>
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ukm-dectar-1.avif">
                    </div>
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/ukm-dectar-1.avif">
                    </div>
                    <?php endif; ?>
                </div><!-- end bx-slider -->
            </div>
            <!--end slideshow-->

		<?php
	}
}