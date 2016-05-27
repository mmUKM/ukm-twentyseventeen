<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @since 1.0
 * @name Visitor Counter
 */
class Visitor_Counter_Widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'visitor_counter_widget',
      __( '&bull; Best View, Visitor Counter and Last Update', 'ukmtheme' ),
      array( 'description' => __( 'Widget for best view, visitor counter and last update statement', 'ukmtheme' ), )
    );
  }

  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    
?>
    <p style="margin-top: 0;"><?php _e( 'This site can be accessed using smart devices. Best viewed using the latest versions of web browsers on a minimum resolution of 1024x768.', 'ukmtheme' ); ?></p>
    <p><?php _e( 'Last Update:&nbsp;', 'ukmtheme' ); ?><?php echo get_theme_mod( 'ukmtheme_date_of_update' ); ?></p>
  <?php
    echo $args['after_widget'];
  }

  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Visitor Counter', 'ukmtheme' );
  ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <?php 
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }

}

add_action( 'widgets_init', 'register_ukmtheme_visitor_counter_widget' );
  function register_ukmtheme_visitor_counter_widget() {
    register_widget( 'Visitor_Counter_Widget' );
  }