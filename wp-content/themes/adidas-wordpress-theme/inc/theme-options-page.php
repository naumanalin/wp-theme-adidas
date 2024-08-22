<?php

// theme options Admin menu page

if(is_admin()){
	add_action( 'admin_menu', 'theme_setting_page_2' );	
}

function register_mysetting(){
	register_setting("pluging-name-settings", "plugin-form-name"); 
	register_setting("pluging-name-settings", "plugin-form-email");
	register_setting("pluging-name-settings", "plugin-form-age");
	register_setting("pluging-name-settings", "plugin-form-number");
	register_setting("pluging-name-settings", "plugin-form-address");
	register_setting("pluging-name-settings", "plugin-form-message");
	/**
	 * Two parameter
	 * 1. settings_fields("pluging-name-settings");
	 * 2.  field name
	*/
}

function theme_setting_page_2() {
    add_menu_page(
        'custom settings page',
        'Theme options-2',
        'manage_options',
        'theme-options_page-2',
        'theme_options_callback_function',
        'dashicons-media-spreadsheet',
        125
    );
}


if(!function_exists("theme_options_callback_function")) {

	function theme_options_callback_function(){
	?>
	<h1>Set Custom Options Here</h1>
	<form action="options.php" method="post">
		<?php 
			settings_fields("pluging-name-settings");
			do_settings_sections("pluging-name-settings")
		?>
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="plugin-form-name" value="<?= get_option('plugin-form-name') ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="plugin-form-email" value="<?= get_option('plugin-form-email') ?>"></td>
			</tr>
			<tr>
				<td>Age</td>
				<td><input type="number" name="plugin-form-age" value="<?= get_option('plugin-form-age') ?>"></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><input type="number" name="plugin-form-number" value="<?= get_option('plugin-form-number') ?>"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td> 
					<textarea name="plugin-form-address">
						<?php echo get_option('plugin-form-address'); ?>
					</textarea>   
				</td>
			</tr>
			<tr>
				<td>Message</td>
				<td> 
					<textarea name="plugin-form-message">
						<?php echo get_option('plugin-form-message'); ?>
					</textarea>   
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php submit_button(); ?>
				</td>
			</tr>
		</table>
	</form>
	<?php 
} // endfunction:
} // endif: