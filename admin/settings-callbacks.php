<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Adds the sections to the admin page
function mnet_dark_mode_login_screen_callback_section_login() {
  echo '<p>' . esc_html__('These settings enable you to customise the WP Login screen and enable a dark mode theme.', 'mnet-dark-mode-login-screen' ) . '</p>';
}

// Adds fields to the sections on the admin page
function mnet_dark_mode_login_screen_callback_logo_field( $args ) {
  $options = get_option( 'mnet_dark_mode_login_screen_options', mnet_dark_mode_login_screen_options_default() );

  $id = isset( $args['id'] ) ? $args['id'] : '';
  $label = isset( $args['label'] ) ? $args['label'] : '';

  $value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

  echo '<input id="mnet_dark_mode_login_screen_options_'. $id .'" name="mnet_dark_mode_login_screen_options['. $id .']" type="text" placeholder="Enter image url here." size="40" value="'. $value .'"><br />';
  echo '<label for="mnet_dark_mode_login_screen_options_'. $id .'">'. $label .'</label>';

}

// Adds fields to the sections on the admin page
function mnet_dark_mode_login_screen_callback_text_field( $args ) {
  $options = get_option( 'mnet_dark_mode_login_screen_options', mnet_dark_mode_login_screen_options_default() );

  $id = isset( $args['id'] ) ? $args['id'] : '';
  $label = isset( $args['label'] ) ? $args['label'] : '';

  $value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

  echo '<input id="mnet_dark_mode_login_screen_options_'. $id .'" name="mnet_dark_mode_login_screen_options['. $id .']" type="text" placeholder="Enter logo link url here." size="40" value="'. $value .'"><br />';
  echo '<label for="mnet_dark_mode_login_screen_options_'. $id .'">'. $label .'</label>';

}

function mnet_dark_mode_login_screen_callback_title_field( $args ) {
  $options = get_option( 'mnet_dark_mode_login_screen_options', mnet_dark_mode_login_screen_options_default() );

  $id = isset( $args['id'] ) ? $args['id'] : '';
  $label = isset( $args['label'] ) ? $args['label'] : '';

  $value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

  echo '<input id="mnet_dark_mode_login_screen_options_'. $id .'" name="mnet_dark_mode_login_screen_options['. $id .']" type="text" placeholder="Enter logo title here."  size="40" value="'. $value .'"><br />';
  echo '<label for="mnet_dark_mode_login_screen_options_'. $id .'">'. $label .'</label>';
}

function mnet_dark_mode_login_screen_radio_button_field( $args ) {
  $options = get_option( 'mnet_dark_mode_login_screen_options', mnet_dark_mode_login_screen_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$radio_options = array(
		
		'enable'  => esc_html__( 'Enable Dark Mode', 'mnet-dark-mode-login-screen' ),
		'disable' => esc_html__( 'Disable Dark Mode', 'mnet-dark-mode-login-screen' )
		
	);
	
	foreach ( $radio_options as $value => $label ) {
		
		$checked = checked( $selected_option === $value, true, false );
		
		echo '<label><input name="mnet_dark_mode_login_screen_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
		
	}
}

function mnet_dark_mode_login_screen_callback_textarea_field( $args ) {
  $options = get_option( 'mnet_dark_mode_login_screen_options', mnet_dark_mode_login_screen_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$allowed_tags = wp_kses_allowed_html( 'post' );
	
	$value = isset( $options[$id] ) ? wp_kses( stripslashes_deep( $options[$id] ), $allowed_tags ) : '';
	
	echo '<textarea id="mnet_dark_mode_login_screen_options_'. $id .'" name="mnet_dark_mode_login_screen_options['. $id .']" placeholder="Enter a custom message for login screen." rows="5" cols="50">'. $value .'</textarea><br />';
	echo '<label for="mnet_dark_mode_login_screen_options_'. $id .'">'. $label .'</label>';
}