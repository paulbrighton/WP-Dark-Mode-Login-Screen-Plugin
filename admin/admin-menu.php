<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

function mnet_dark_mode_login_screen_add_toplevel_menu() {
	
	add_menu_page(
		esc_html__( 'Modernet Dark Mode Login Screen Settings', 'mnet-dark-mode-login-screen' ),
		esc_html__( 'Dark Mode Login Screen', 'mnet-dark-mode-login-screen' ),
		'manage_options',
		'mnet-dark-mode-login-screen',
		'mnet_dark_mode_login_screen_settings_page',
		'dashicons-layout',
		99
	);
	
}
add_action( 'admin_menu', 'mnet_dark_mode_login_screen_add_toplevel_menu' );