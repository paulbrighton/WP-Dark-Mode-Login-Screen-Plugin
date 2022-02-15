<?php
/*
Plugin Name:  Modernet Dark Mode Login Screen
Description:  Adds a dark mode theme to the login screen and lets the admins change the logo, logo title and logo link url and add a custom message. 
Plugin URI:   https://modernet.co.uk/
Author:       Paul Brighton
Version:      1.0
Text Domain:  mnet-dark-mode-login-screen
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Load text domain for internationalization
function mnet_dark_mode_login_screen_load_textdomain() {
	load_plugin_textdomain( 'mnet-dark-mode-login-screen', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'mnet_dark_mode_login_screen_load_textdomain' );

// Include admin files
if ( is_admin() ) {
	require_once( plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php' );
  require_once( plugin_dir_path( __FILE__ ) . 'admin/settings-page.php' );
  require_once( plugin_dir_path( __FILE__ ) . 'admin/register-settings.php' );
  require_once( plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'admin/validate-settings.php' );
}

// custom login styles
function mnet_dark_mode_login_screen_styles() {
	wp_register_style( 'mnet-login-styles', plugins_url( 'public/css/mnet-dark-mode-login-screen.css' , __FILE__ ) );
	wp_enqueue_style( 'mnet-login-styles' );
}
add_action( 'login_enqueue_scripts', 'mnet_dark_mode_login_screen_styles' );

require_once( plugin_dir_path( __FILE__ ) . 'includes/core-functions.php' );

// default plugin options
function mnet_dark_mode_login_screen_options_default() {

	return array(
		'custom_login_logo'     => esc_url( 'http://192.168.1.117:3000/linkedin-plugin/wp-admin/images/wordpress-logo.svg?ver=20131107', 'mnet-dark-mode-login-screen' ),
		'custom_login_logo_url'     => esc_url( 'https://wordpress.org/', 'mnet-dark-mode-login-screen' ),
		'custom_login_logo_title'   =>   esc_html__( 'Powered by WordPress', 'mnet-dark-mode-login-screen' ),
		'custom_style'   => 'disable',
		'custom_message' => '<p class="custom-message">' . esc_html__( 'My custom message', 'mnet-dark-mode-login-screen' ) . '</p>',
	);

}