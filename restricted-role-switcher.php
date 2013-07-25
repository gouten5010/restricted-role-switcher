<?php
/*
Plugin Name: Restricted Role Switcher
Plugin URI: https://github.com/gouten5010/restricted-role-switcher
Description: Webmaster用権限グループを追加します
Version: 0.0.2
Author: GOUTEN
Author URI: http://5010works.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: rrswitcher
*/

require_once(dirname(__FILE__).'/includes/role.class.php');

function activate_add_role() {
	global $wp_roles;
	if (!isset($wp_roles->roles['owner'])) {
		new rrs_createNewRole(
			'owner',
			'owner',
			'editor',
			array('edit_theme_options')
		);
	}
}
register_activation_hook(__FILE__, 'activate_add_role');

function deactivate_remove_role() {
	remove_role('owner');
}
register_deactivation_hook(__FILE__, 'deactivate_remove_role');
