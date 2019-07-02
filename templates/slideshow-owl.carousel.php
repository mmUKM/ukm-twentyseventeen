<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
?> 
<script type="text/javascript">
    $(document).ready(function(){
        $('#carousel').owlCarousel( {
            items:1,
            autoplay:true,
            autoplayTimeout:5000
        }

        );
    });
</script>
<div id="carousel" class="owl-carousel owl-theme">
        <?php
            $args = array(
                'post_type'       => 'slideshow',
                'posts_per_page'   => 20,
                'orderby'         => 'menu_order'
            );

            $slideshow = new WP_Query( $args );

            if ( $slideshow->have_posts() ) : while ( $slideshow->have_posts() ) : $slideshow->the_post(); 
        ?>
        <a href="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_link', true ); ?>">
            <img src="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_image', true ); ?>" alt="<?php the_title(); ?>" style="width: 100%;">
        </a>
        <?php endwhile; else: ?>
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-slideshow.jpg" alt="Slideshow Placeholder" style="width: 100%;">
            </div>
        <?php endif; ?>
</div>