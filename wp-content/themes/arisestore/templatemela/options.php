<?php
/** Adding TM Menu in admin panel. */
function arise_plugin_menu() {	
	add_theme_page( __('Theme Settings','arise'), __('TM Theme Settings','arise'), 'manage_options', 'tm_theme_settings', 'arise_theme_settings_page' );		
	add_theme_page( __('Hook Manager','arise'), __('TM Hook Manager','arise'), 'manage_options', 'tm_hook_manage', 'arise_hook_manage_page');	
}
?>