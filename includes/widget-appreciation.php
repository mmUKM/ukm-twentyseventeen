<?php
/**
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 *
 * Widget: Appreciation
 */

class Appreciation_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'appreciation_widget',
      __('&bull; Appreciation', 'ukmtheme'),
      array( 'description' => __( 'Appreciation Widget', 'ukmtheme' ), )
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
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
    ?>
      <div id="newsData"></div>
      <ul id="newsList">
      <?php
      $appreciation = array( 'post_type' => 'appreciation', 'posts_per_page' => 10, );
      $appreciation_loop = new WP_Query( $appreciation );
      while ( $appreciation_loop->have_posts() ) : $appreciation_loop->the_post();
      ?>
        <li class="news-item">
          <p style="font-style:italic;"><i class="uk-icon-quote-left"></i>&nbsp;<?php global $post; echo get_post_meta($post->ID, 'ut_appreciation_greeting', true); ?>&nbsp;<i class="uk-icon-quote-right"></i></p>
          <span style="float:right;">--&nbsp;<?php global $post; echo get_post_meta($post->ID, 'ut_appreciation_ptj', true); ?></span>
        </li>
      <?php endwhile; ?>
      </ul>
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
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'Appreciation', 'ukmtheme' );
    }
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

} // class appreciation_widget
// register appreciation_Widget widget
function register_appreciation_widget() {
    register_widget( 'Appreciation_Widget' );
}
add_action( 'widgets_init', 'register_appreciation_widget' );

?>
