<?php

function oa_add_submenu() {
		add_submenu_page( 'themes.php', 'My Super Awesome Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'oa_add_submenu' );
	

function oa_settings_init() { 
	register_setting( 'theme_options', 'oa_options_settings' );
	
	add_settings_section(
		'oa_options_page_section', 
		'Display what you want in the footer', 
		'oa_options_page_section_callback', 
		'theme_options'
	);
	
	function oa_options_page_section_callback() { 
		echo 'Various Options for Omarcct460 Theme.';
	}

	add_settings_field( 
		'oa_text_field', 
		'Enter Announcement', 
		'oa_text_field_render', 
		'theme_options', 
		'oa_options_page_section' 
	);

	
//radio Field
	add_settings_field( 
		'oa_radio_field', 
		'Choose a color for the background of the header', 
		'oa_radio_field_render', 
		'theme_options', 
		'oa_options_page_section'  
	);
	
	
	
	add_settings_field( 
		'oa_select_field', 
		'Select Font Size', 
		'oa_select_field_render', 
		'theme_options', 
		'oa_options_page_section'  
	);


	//Anouncement on top of the page
	function oa_text_field_render() { 
		$options = get_option( 'oa_options_settings' );
		?>
		<input type="text" name="oa_options_settings[oa_text_field]" value="<?php if (isset($options['oa_text_field'])) echo $options['oa_text_field']; ?>" />
		<?php
	}
	
	
	function oa_radio_field_render() { 
		$options = get_option( 'oa_options_settings' );
		?>
		<input type="radio" name="oa_options_settings[oa_radio_field]" <?php if (isset($options['oa_radio_field'])) checked( $options['oa_radio_field'], 1 ); ?> value="#ff00ff" /> <label> Fuchsia  </label><br />
		<input type="radio" name="oa_options_settings[oa_radio_field]" <?php if (isset($options['oa_radio_field'])) checked( $options['oa_radio_field'], 2 ); ?> value="#800080" /> <label> Purple </label><br />
		<input type="radio" name="oa_options_settings[oa_radio_field]" <?php if (isset($options['oa_radio_field'])) checked( $options['oa_radio_field'], 3 ); ?> value="#008080" /> <label> Teal </label>
		<?php
	}
	

	function oa_select_field_render() { 
		$options = get_option( 'oa_options_settings' );
		?>
		<select name="oa_options_settings[oa_select_field]">
			<option value="0.5em" <?php if (isset($options['oa_select_field'])) selected( $options['oa_select_field'], 1 ); ?>> Small </option>
			<option value="1em" <?php if (isset($options['oa_select_field'])) selected( $options['oa_select_field'], 2 ); ?>> Medium </option>
			<option value="1.5em" <?php if (isset($options['oa_select_field'])) selected( $options['oa_select_field'], 2 ); ?>> Large </option>
		</select>
	<?php
	}
	
	function my_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>Omar CCT 460 Options Page</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}

add_action( 'admin_init', 'oa_settings_init' );
