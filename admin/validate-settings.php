<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Used to validate options
function mnet_dark_mode_login_screen_callback_validate_options( $input ) {
	// custom logo
	if ( isset( $input['custom_login_logo'] ) ) {
		
		$input['custom_login_logo'] = esc_url( $input['custom_login_logo'] );
		
	}

  // custom url
	if ( isset( $input['custom_login_logo_url'] ) ) {
		
		$input['custom_login_logo_url'] = esc_url( $input['custom_login_logo_url'] );
		
	}
	
	// custom title
	if ( isset( $input['custom_login_logo_title'] ) ) {
		
		$input['custom_login_logo_title'] = sanitize_text_field( $input['custom_login_logo_title'] );
		
	}
	
	// custom style
	$radio_options = array(
		
		'enable'  => 'Enable custom styles',
		'disable' => 'Disable custom styles'
		
	);
	
	if ( ! isset( $input['custom_style'] ) ) {
		
		$input['custom_style'] = null;
		
	}
	if ( ! array_key_exists( $input['custom_style'], $radio_options ) ) {
		
		$input['custom_style'] = null;
		
	}
	
	// custom message
	if ( isset( $input['custom_message'] ) ) {
		
		$input['custom_message'] = wp_kses_post( $input['custom_message'] );
		
	}
	
	return $input;
}