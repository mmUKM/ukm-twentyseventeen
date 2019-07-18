<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */
?> 
<script type="text/javascript">
    $(document).ready(function(){
        $('#bxslider').bxSlider({
            auto: true,
        });
    });
</script>
<ul id="bxslider">
        <?php
            $args = array(
                'post_type'         => 'slideshow',
                'posts_per_page'    => 20,
                'orderby'           => 'menu_order'
            );

            $slideshow = new WP_Query( $args );

            if ( $slideshow->have_posts() ) : while ( $slideshow->have_posts() ) : $slideshow->the_post(); 
        ?>
        <li>
        <a href="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_link', true ); ?>">
            <img src="<?php echo get_post_meta( get_the_ID(),'ut_slideshow_image', true ); ?>" alt="<?php the_title(); ?>" style="width: 100%;">
        </a>
        </li>
        <?php endwhile; else: ?>
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-slideshow.jpg" alt="Slideshow Placeholder" style="width: 100%;">
            </li>
        <?php endif; ?>
</ul>