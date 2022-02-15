<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// custom login logo url
function mnet_dark_mode_login_screen_custom_login_logo( $logourl ) {
	$options = get_option( 'mnet_dark_mode_login_screen_options', mnet_dark_mode_login_screen_options_default() );

	if ( isset( $options['custom_login_logo'] ) && ! empty( $options['custom_login_logo'] ) ) {
		$logourl = esc_url( $options['custom_login_logo'] );
	}
	
	?> 
	<style type="text/css"> 
	body.login div#login h1 a {
	 background-image: url(<?php echo $logourl; ?>);
	 height:65px;
	 width:320px;
	 background-size: 320px 65px;
	 background-repeat: no-repeat;
	} 
	</style>
	 <?php 
}
add_filter( 'login_enqueue_scripts', 'mnet_dark_mode_login_screen_custom_login_logo' );

// custom login logo url
function mnet_dark_mode_login_screen_custom_login_url( $url ) {
	$options = get_option( 'mnet_dark_mode_login_screen_options', mnet_dark_mode_login_screen_options_default() );

	if ( isset( $options['custom_login_logo_url'] ) && ! empty( $options['custom_login_logo_url'] ) ) {
		$url = esc_url( $options['custom_login_logo_url'] );
	}
	
	return $url;
}
add_filter( 'login_headerurl', 'mnet_dark_mode_login_screen_custom_login_url' );

// custom login logo title
function mnet_dark_mode_login_screen_custom_login_title( $title ) {
	
	$options = get_option( 'mnet_dark_mode_login_screen_options', mnet_dark_mode_login_screen_options_default() );
	
	if ( isset( $options['custom_login_logo_title'] ) && ! empty( $options['custom_login_logo_title'] ) ) {
		
		$title = esc_attr( $options['custom_login_logo_title'] );
		
	}
	
	return $title;
	
}
add_filter( 'login_headertext', 'mnet_dark_mode_login_screen_custom_login_title' );


// custom login styles
function mnet_dark_mode_login_screen_custom_login_styles() {
	
	$styles = false;
	
	$options = get_option( 'mnet_dark_mode_login_screen_options', mnet_dark_mode_login_screen_options_default() );
	
	if ( isset( $options['custom_style'] ) && ! empty( $options['custom_style'] ) ) {
		
		$styles = sanitize_text_field( $options['custom_style'] );
		
	}
	
	if ( 'enable' === $styles ) {
		
		wp_enqueue_style( 'mnet-dark-mode-login-screen', plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/login.css', array(), null, 'screen' );
		
	}
	
}
add_action( 'login_enqueue_scripts', 'mnet_dark_mode_login_screen_custom_login_styles' );

// custom login message
function mnet_dark_mode_login_screen_custom_login_message( $message ) {
	
	$options = get_option( 'mnet_dark_mode_login_screen_options', mnet_dark_mode_login_screen_options_default() );
	
	if ( isset( $options['custom_message'] ) && ! empty( $options['custom_message'] ) ) {
		
		$message = '<p class="custom-message">' . wp_kses_post( $options['custom_message'] ) . '</p>';
		
	}
	
	return $message;
	
}
add_filter( 'login_message', 'mnet_dark_mode_login_screen_custom_login_message' );