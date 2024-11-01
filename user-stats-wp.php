<?php
/*
Plugin Name: User Stats WP
Plugin URI: https://plugins.worbee.com/user-stats-wp/
Description: Stores and displays user generated events, like logins and post edits.
Version: 1.0.0
Requires at least: 5.2
Requires PHP: 7.2
Author: worbee
Author URI: https://worbee.com/
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: user-stats-wp
Domain Path: /languages

LICENSE:
User Stats WP is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

User Stats WP is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with User Stats WP. If not, see https://www.gnu.org/licenses/old-licenses/gpl-2.0.txt

Please also respect the work of a small startup working on this. Thank you!
*/

$userstatswpworbee = [
	'version' => '1.0.0'
];
require_once(__DIR__ . '/lib/plugin_events.php');
require_once(__DIR__ . '/lib/dashboard.php');
require_once(__DIR__ . '/lib/functions.php');
require_once(__DIR__ . '/lib/assets.php');

register_activation_hook(__FILE__, 'userstatswpworbee_activate');
add_action('save_post', 'userstatswpworbee_post_is_saved', 10, 3);
add_action("add_attachment", 'userstatswpworbee_attachment_is_added');
