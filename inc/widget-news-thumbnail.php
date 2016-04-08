<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * Widget: Latest News with Thumbnail and Category
 */

class Latest_News_Widget_Thumbnail extends WP_Widget {
  function __construct() {

    parent::__construct(

      'latest_news_widget_thumbnail', // Base ID

      __('&bull; News with Image', 'ukmtheme'),

      array( 'description' => __( 'Latest news list with thumbnail and category.', 'ukmtheme' ), )

    );
  }

  public function widget( $args, $instance ) {

    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $args['before_widget'];

    if ( ! empty( $title ) ) {
      echo $args['before_title'] . $title . $args['after_title'];
    }

    if ( ! isset( $instance['newscat'] ) ) {
      $newscat = $instance['newscat'];
    }

    if ( ! isset( $instance['newscount'] ) ) {
      $newscount = $instance['newscount'];
    }

    /**
     * Events Widget with Post Type
     * @link http://codex.wordpress.org/Widgets_API
     * @link http://codex.wordpress.org/Class_Reference/WP_Query
     */

    $news_args = array(
      'post_type'       => 'news',
      'posts_per_page'  => $instance['newscount'],
      'newscat'         => $instance['newscat'],
      );

    $news_query = new WP_Query( $news_args );

    if ( $news_query->have_posts() ) : while ( $news_query->have_posts() ) : $news_query->the_post(); ?>

      <div class="column pad-bottom bottom-divider">
        <div class="sm-col-2-12 pad-right">
          <?php 
            if ( has_post_thumbnail() ) { the_post_thumbnail( 'news_thumb' ); }
            else { echo '<img src="' . get_template_directory_uri() . '/img/placeholder_news.svg" height="auto" width="auto"/>'; }
          ?>
        </div>
          <div class="sm-col-10-12 pad-left">
            <h3 class="ut-news-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
          </div>
      </div>

    <?php endwhile; endif; ?>

    <div class="uk-panel pad-top">
      <a href="<?php echo get_post_type_archive_link('news'); ?>"><button class="uk-button uk-button-small uk-button-primary"><?php _e('News Archive','ukmtheme'); ?></button></a>
    </div>

<?php

    echo $args['after_widget'];

}

  public function form( $instance ) {

    if ( isset( $instance['title'] ) ) {
      $title = $instance['title'];
    }
    
    else {
      $title = __( 'Latest Awesome News', 'ukmtheme' );
    }

    if ( isset( $instance['newscat'] ) ) {
      $newscat = $instance['newscat'];
    }

    if ( isset( $instance[ 'newscount'] ) ) {
      $newscount = $instance['newscount'];
    }
    else {
      $newscount = '4';
    }
       
    echo '<p class="tukm-widget-text">';
    echo '<label for="'. $this->get_field_id('title') .'">' . __( 'Title:', 'ukmtheme' ) . '</label>';
    echo '<input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') .'" type="text" value="'. $title .'" />';
    echo '</p>';

    echo '<p class="tukm-widget-text">';
    echo '<label for="'. $this->get_field_id('newscat') .'">'. __( 'News category slug:', 'ukmtheme' ) .'</label>';
    echo '<input class="widefat" id="'. $this->get_field_id('newscat') .'" placeholder="e.g. awesome" name="'. $this->get_field_name('newscat') .'" type="text" value="'. $newscat .'" />';
    echo '</p>';

    echo '<p class="tukm-widget-text">';
    echo '<label for="'. $this->get_field_id('newscount') .'">'. __( 'Number of news to show:', 'ukmtheme' ) .'</label>';
    echo '<input class="widefat" id="'. $this->get_field_id('newscount') .'" name="'. $this->get_field_name('newscount') .'" type="text" value="'. $newscount .'" />';
    echo '</p>';


  }

  public function update( $new_instance, $old_instance ) {

    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['newscat'] = ( ! empty( $new_instance['newscat'] ) ) ? strip_tags( $new_instance['newscat'] ) : '';
    $instance['newscount'] = ( ! empty( $new_instance['newscount'] ) ) ? strip_tags( $new_instance['newscount'] ) : '';

    return $instance;
  }

}

function register_Latest_News_Widget_Thumbnail() {
  register_widget( 'Latest_News_Widget_Thumbnail' );
}

add_action( 'widgets_init', 'register_Latest_News_Widget_Thumbnail' );

?>