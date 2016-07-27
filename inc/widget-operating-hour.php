<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Seventeen
 * @version 1.0
 * @author Jamaludin Rajalu
 * 
 * Widget: Operating Hour
 */
class UKMTheme_Operating_Hour extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'operating_hour', // Base ID
			__( '&bull; Operating Hour', 'ukmtheme' ), // Name
			array( 'description' => __( 'Office or counter operating hour', 'ukmtheme' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
  ?>
  <p style="margin-top: 0;">
    <strong><?php _e( 'Monday - Thursday', 'ukmtheme' ); ?></strong><br>
    <?php _e( '08:00 - 17:00<br>(13:00-14:00 Close)', 'ukmtheme' ); ?><br>
    <strong><?php _e( 'Friday', 'ukmtheme' ); ?></strong><br>
    <?php _e( '08:00 - 17:00<br> (12:15-14:45 Close)', 'ukmtheme' ); ?><br>
    <strong><?php _e( 'Weekend', 'ukmtheme' ); ?></strong><br>
    <?php _e( 'Close', 'ukmtheme' ); ?>
  </p>
  <?php
    echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Operating Hour', 'ukmtheme' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class UKMTheme_Operating_Hour

// register UKMTheme_Operating_Hour widget
function register_operating_hour() {
    register_widget( 'UKMTheme_Operating_Hour' );
}
add_action( 'widgets_init', 'register_operating_hour' );
