<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<div class="wrap uk-section uk-section-medium">
    <div class="uk-container uk-container-small uk-text-center">
        <div class="uk-card uk-card-default uk-card-body uk-box-shadow-small uk-border-rounded">
            <span uk-icon="icon: warning; ratio: 3" class="uk-text-warning uk-margin-bottom"></span>
            <h1 class="uk-heading-medium uk-margin-remove-bottom">404</h1>
            <h2 class="uk-margin-small-top"><?php esc_html_e( 'Page Not Found', 'ukmtheme' ); ?></h2>
            <p class="uk-text-lead uk-text-muted">
                <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ukmtheme' ); ?>
            </p>
            <div class="uk-width-2-3@m uk-align-center uk-margin-top">
                <?php get_search_form(); ?>
            </div>
            <div class="uk-margin-top">
                <a class="uk-button uk-button-primary uk-border-rounded" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <span uk-icon="icon: home"></span> <?php esc_html_e( 'Back to Homepage', 'ukmtheme' ); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>