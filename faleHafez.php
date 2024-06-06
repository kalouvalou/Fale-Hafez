<?php
/*
Plugin Name: Fale Hafez
Plugin URI: https://ejtem.com/plugins/hafez/
Description: The Hafez Poetry Randomizer is a delightful WordPress plugin that brings the enchanting world of Hafez's poetry to your website. With just a simple shortcode, you can easily display random verses of Hafez's timeless poetry to your visitors, adding a touch of cultural elegance to your site's content.
Version: 1.0.0
Author:  Ejtem,kalouvalou
Author URI: https://ejtem.com
License: GPLv2 or later
Text Domain: fale-hafez


*/

/** Prevent this file from being accessed directly */
if (!defined('ABSPATH')) {
    die("Direct access of plugin files is not allowed.");
}
 
/** Define faleHafez_PLUGIN_FILE */
if (!defined('faleHafez_PLUGIN_FILE')) {
    define('faleHafez_PLUGIN_FILE', __FILE__);
}

/** Constant pointing to the root directory path of the plugin */
if (!defined("faleHafez_PLUGIN_DIRECTORY")) {
    define("faleHafez_PLUGIN_DIRECTORY", plugin_dir_path(__FILE__));
}

/** Constant pointing to the root directory URL of the plugin */
if (!defined("faleHafez_PLUGIN_URL")) {
    define("faleHafez_PLUGIN_URL", plugin_dir_url(__FILE__));
}

/** Constant defining the textdomain for localization */
if (!defined("faleHafez_PLUGIN_TEXTDOMAIN")) {
    define("faleHafez_PLUGIN_TEXTDOMAIN", "fale-hafez");
}

/** Load main class */
require 'includes/class-faleHafez.php';

/** Main instance of plugin */
$faleHafez = new faleHafez();

//HT