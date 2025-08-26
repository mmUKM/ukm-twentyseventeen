<?php

class Elementor_UKMTheme_Penghargaan extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ukmtheme_penghargaan';
    }

    public function get_title() {
        return __( 'UKM: Penghargaan', 'text-domain' );
    }

    public function get_icon() {
        return 'eicon-star';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function render() {
        $args = [
            'post_type' => 'penghargaan',
            'posts_per_page' => 99,
        ];
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo '<div uk-slider="autoplay: true; autoplay-interval: 3000; finite: true">';
            echo '<div class="uk-slider-container">';
            echo '<ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match">';

            while ($query->have_posts()) {
                $query->the_post();
                echo '<li class="uk-box-shadow-small">';
                echo '<div class="uk-card">';

                // Header
                echo '<div class="uk-card-header" style="border: none; margin">';
                echo '<h3 class="uk-h3 uk-margin-small-bottom" style="line-height: 1.2em;">' . get_the_title() . '</h3>';
                echo '<p class="uk-text-meta uk-margin-remove-top uk-margin-remove-bottom">' . get_the_excerpt() . '</p>';
                echo '<div class="uk-margin-small-top">';
                echo str_repeat('<span uk-icon="icon: star; ratio: 1" class="uk-text-warning"></span>', 5);
                echo '</div>';
                echo '</div>';

                // Body
                echo '<div class="uk-card-body" style="padding: 10px 40px 10px 40px;">';
                echo '<div class="uk-text-italic">' . get_the_content() . '</div>';
                echo '</div>';

                echo '</div>';
                echo '</li>';
            }

            echo '</ul>';
            echo '</div>';

            // Navigasi slider
            echo '<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slider-item="previous"></a>';
            echo '<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slider-item="next"></a>';

            echo '</div>';
            wp_reset_postdata();
        } else {
            echo '<p>' . __('Tiada penghargaan ditemui.', 'text-domain') . '</p>';
        }
    }
}