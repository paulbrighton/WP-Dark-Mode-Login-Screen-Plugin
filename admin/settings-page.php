<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// display the plugin settings page
function mnet_dark_mode_login_screen_settings_page() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	?>

	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<?php settings_errors(); ?>
		<form action="options.php" method="post">
			<?php
			// output security fields
			settings_fields( 'mnet_dark_mode_login_screen_options' );
			// output setting sections
			do_settings_sections( 'mnet-dark-mode-login-screen' );
			
			submit_button();
			?>
		</form>
	</div>

	<?php
}