<?php
/*
Plugin Name: Fale Hafez
Plugin URI: https://ejtem.com/wp-plugin/hafez/
Description: The Hafez Poetry Randomizer is a delightful WordPress plugin that brings the enchanting world of Hafez's poetry to your website. With just a simple shortcode, you can easily display random verses of Hafez's timeless poetry to your visitors, adding a touch of cultural elegance to your site's content.
Version: 1.0.1
Author:  kalouvalou
Author URI: https://ejtem.com
License: GPLv2 or later
Text Domain: hafez-ejtemFal


*/

/** Prevent this file from being accessed directly */
if (!defined('ABSPATH')) {
    die("Direct access of plugin files is not allowed.");
}
 
/** Define ejtemFal_PLUGIN_FILE */
if (!defined('ejtemFal_PLUGIN_FILE')) {
    define('ejtemFal_PLUGIN_FILE', __FILE__);
}

/** Constant pointing to the root directory path of the plugin */
if (!defined("ejtemFal_PLUGIN_DIRECTORY")) {
    define("ejtemFal_PLUGIN_DIRECTORY", plugin_dir_path(__FILE__));
}

/** Constant pointing to the root directory URL of the plugin */
if (!defined("ejtemFal_PLUGIN_URL")) {
    define("ejtemFal_PLUGIN_URL", plugin_dir_url(__FILE__));
}

/** Constant defining the textdomain for localization */
if (!defined("ejtemFal_PLUGIN_TEXTDOMAIN")) {
    define("ejtemFal_PLUGIN_TEXTDOMAIN", "hafez-ejtemFal");
}

/** Load main class */
require 'includes/class-ejtemFal.php';

/** Main instance of plugin */
$ejtemFal = new ejtemFal();