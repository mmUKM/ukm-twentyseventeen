<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * 
 * Widget: Address with social icon
 */

class UKMtheme_Social_Widget extends WP_Widget {


function __construct() {
    parent::__construct(
        'ukmtheme_social_widget',
        __( 'Address with Social Media Icon', 'ukmtheme' ),
        array( 'description' => __( 'Social media icon', 'ukmtheme' ), )
    );
    }

    public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }

    if ( ! isset( $instance['textarea_address'] ) ) {
        $textarea_address = apply_filters( 'widget_textarea', empty( $instance['textarea_address'] ) ? '' : $instance['textarea_address'], $instance );
    }
    ?>
    <div class="ukm-address-social-widget">
        <div class="uk-margin-small-bottom">
            <div class="uk-text-small ukm-widget-address-text" style="line-height: 1.6;">
                <?php echo ! empty( $instance['textarea_address'] ) ? wp_kses_post( $instance['textarea_address'] ) : ''; ?>
            </div>
        </div>
        <div class="ukm-widget-social-row uk-margin-small-top">
            <div class="uk-flex uk-flex-middle uk-flex-wrap ukm-social-icons-row" style="gap: 8px;">
                <?php 
                $fb = get_theme_mod( 'ukmtheme_social_media_facebook', 'https://www.facebook.com/UKMOfficial' );
                $tw = get_theme_mod( 'ukmtheme_social_media_twitter', 'https://twitter.com/ukmtwit' );
                $ig = get_theme_mod( 'ukmtheme_social_media_instagram', 'https://www.instagram.com/ukminsta' );
                $yt = get_theme_mod( 'ukmtheme_social_media_youtube', 'https://www.youtube.com/user/ukmwebtv' );
                $rss = get_bloginfo('rss2_url');
                ?>
                <?php if ( ! empty( $fb ) ) : ?>
                    <a class="uk-icon-button ukm-social-btn" uk-icon="icon: facebook" href="<?php echo esc_url( $fb ); ?>" target="_blank" rel="noopener noreferrer" title="Facebook" aria-label="Facebook"></a>
                <?php endif; ?>
                <?php if ( ! empty( $tw ) ) : ?>
                    <a class="uk-icon-button ukm-social-btn" uk-icon="icon: twitter" href="<?php echo esc_url( $tw ); ?>" target="_blank" rel="noopener noreferrer" title="Twitter" aria-label="X / Twitter"></a>
                <?php endif; ?>
                <?php if ( ! empty( $ig ) ) : ?>
                    <a class="uk-icon-button ukm-social-btn" uk-icon="icon: instagram" href="<?php echo esc_url( $ig ); ?>" target="_blank" rel="noopener noreferrer" title="Instagram" aria-label="Instagram"></a>
                <?php endif; ?>
                <?php if ( ! empty( $yt ) ) : ?>
                    <a class="uk-icon-button ukm-social-btn" uk-icon="icon: youtube" href="<?php echo esc_url( $yt ); ?>" target="_blank" rel="noopener noreferrer" title="YouTube" aria-label="YouTube"></a>
                <?php endif; ?>
                <?php if ( ! empty( $rss ) ) : ?>
                    <a class="uk-icon-button ukm-social-btn" uk-icon="icon: rss" href="<?php echo esc_url( $rss ); ?>" target="_blank" rel="noopener noreferrer" title="RSS" aria-label="RSS Feed"></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
    echo $args['after_widget'];
    }


    public function form( $instance ) {

    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Address with Social Icon', 'ukmtheme' );

    $textarea_address = ! empty( $instance['textarea_address'] ) ? $instance['textarea_address'] : 
        '
            Pusat Teknologi Maklumat<br/>
            Universiti Kebangsaan Malaysia<br/>
            43600 Bangi<br/>
            Selangor<br/>
            <span uk-icon="icon: receiver"></span>03-8921-7070<br/>
            <span uk-icon="icon: print"></span>03-8921-7070<br/>
        '; ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
    <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('textarea_address'); ?>" name="<?php echo $this->get_field_name('textarea_address'); ?>"><?php echo $textarea_address; ?></textarea>
    </p>
    <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        if ( current_user_can('unfiltered_html') )
        $instance['textarea_address'] =  $new_instance['textarea_address'];
        else
        $instance['textarea_address'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['textarea_address']) ) );

        return $instance;
    }

} 


function register_ukmtheme_social_widget() {
    register_widget( 'UKMtheme_Social_Widget' );
}
add_action( 'widgets_init', 'register_ukmtheme_social_widget' );
