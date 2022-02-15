<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// delete the plugin options
delete_option( 'mnet_dark_mode_login_screen_options' );