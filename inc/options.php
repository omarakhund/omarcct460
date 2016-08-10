<?php

//options page

//submenu into an existing menu item

function my_theme_options_page(){
	echo "Test";
}

add_action('test','my_theme_options_page');

function cd_add_submenu(){
	add_submenu_page('themes.php','Option 1','Theme Options', 'manage_options','theme_options','my_theme_options_page');
}

add_action('admin_menu','cd_add_submenu');