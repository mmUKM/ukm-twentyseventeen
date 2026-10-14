<?php
/**
 * Custom WordPress Login Styling & Customization
 *
 * @package UKMTheme
 * @subpackage UKM_Twenty_Seventeen
 * @link http://codex.wordpress.org/Customizing_the_Login_Form
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Custom logo and styling for login page
 */
function ukmtheme_login_logo() { ?>
  <style type="text/css">
  body.login div#login h1 a {
    background-image: url("<?php echo esc_url( get_template_directory_uri() . '/images/logo-login.svg' ); ?>");
    background-size: 320px 80px;
    background-position: center top;
    background-repeat: no-repeat;
    color: #999;
    height: 80px;
    font-size: 20px;
    font-weight: 400;
    line-height: 1.3em;
    margin: 0 auto 25px;
    padding: 0;
    text-decoration: none;
    width: 320px;
    text-indent: -9999px;
    outline: 0 none;
    overflow: hidden;
    display: block;
  }
  body.login {
    background: #292929;
  }
  .login form {
    border-radius: 4px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
  }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'ukmtheme_login_logo' );

/**
 * Change login logo URL to site homepage
 */
function ukmtheme_login_logo_url() {
    return esc_url( home_url( '/' ) );
}
add_filter( 'login_headerurl', 'ukmtheme_login_logo_url' );

/**
 * Change login logo title/text (modern login_headertext filter)
 */
function ukmtheme_login_logo_url_title() {
    return esc_html( get_bloginfo( 'name' ) );
}
add_filter( 'login_headertext', 'ukmtheme_login_logo_url_title' );
add_filter( 'login_headertitle', 'ukmtheme_login_logo_url_title' ); // Backward compatibility
