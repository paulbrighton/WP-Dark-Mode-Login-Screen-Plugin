<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Callbacks are in settings-callbacks.php
function mnet_dark_mode_login_screen_register_settings() {

  register_setting(
    // option group
    'mnet_dark_mode_login_screen_options',
    // option name
    'mnet_dark_mode_login_screen_options',
    // sanitized callback
    'mnet_dark_mode_login_screen_callback_validate_options'
  );
	
  // Adds a section for login page options
	add_settings_section(
    // id
		'mnet_dark_mode_login_screen_section_login',
    // title
		esc_html__( 'Customize Login Page', 'mnet-dark-mode-login-screen' ),
    // callback
		'mnet_dark_mode_login_screen_callback_section_login',
    // page
		'mnet-dark-mode-login-screen'
	);

  // Add settings fields
	add_settings_field(
		'custom_login_logo',
		esc_html__( 'Custom Login Logo', 'mnet-dark-mode-login-screen' ),
    // callback
		'mnet_dark_mode_login_screen_callback_logo_field',
		'mnet-dark-mode-login-screen',
		'mnet_dark_mode_login_screen_section_login',
		[ 'id' => 'custom_login_logo', 'label' => esc_html__( 'Custom logo for the login page', 'mnet-dark-mode-login-screen' ) . '<br />' . '<strong>' . esc_html__( 'The ideal size for this image is 320px x 65px', 'mnet-dark-mode-login-screen' ) . '</strong>' ]
	);

	add_settings_field(
		'custom_login_logo_url',
		esc_html__( 'Custom Login Logo URL', 'mnet-dark-mode-login-screen' ),
    // callback
		'mnet_dark_mode_login_screen_callback_text_field',
		'mnet-dark-mode-login-screen',
		'mnet_dark_mode_login_screen_section_login',
		[ 'id' => 'custom_login_logo_url', 'label' => esc_html__( 'Custom URL for the login logo link', 'mnet-dark-mode-login-screen' ) ]
	);

	add_settings_field(
		'custom_login_logo_title',
		esc_html__( 'Custom Login Logo Title', 'mnet-dark-mode-login-screen' ),
    // callback
		'mnet_dark_mode_login_screen_callback_title_field',
		'mnet-dark-mode-login-screen',
		'mnet_dark_mode_login_screen_section_login',
		[ 'id' => 'custom_login_logo_title', 'label' => esc_html__( 'Custom title attribute for the login logo link', 'mnet-dark-mode-login-screen' ) ]
	);

	add_settings_field(
		'custom_message',
		esc_html__( 'Custom Message', 'mnet-dark-mode-login-screen' ),
    // callback
		'mnet_dark_mode_login_screen_callback_textarea_field',
		'mnet-dark-mode-login-screen',
		'mnet_dark_mode_login_screen_section_login',
		[ 'id' => 'custom_message', 'label' => esc_html__( 'Custom text to add a message on login page', 'mnet-dark-mode-login-screen' ) ]
	);

	add_settings_field(
		'custom_style',
		esc_html__( 'Enable Dark Mode', 'mnet-dark-mode-login-screen' ),
    // callback
		'mnet_dark_mode_login_screen_radio_button_field',
		'mnet-dark-mode-login-screen',
		'mnet_dark_mode_login_screen_section_login',
		[ 'id' => 'custom_style', 'label' => esc_html__( 'Enables a dark mode theme for the login screen', 'mnet-dark-mode-login-screen' ) ]
	);
}

add_action( 'admin_init', 'mnet_dark_mode_login_screen_register_settings' );