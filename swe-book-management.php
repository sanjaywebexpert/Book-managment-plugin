<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://sanjaywebexpert.com/
 * @since             1.0.0
 * @package           Swe_Book_Management
 *
 * @wordpress-plugin
 * Plugin Name:       swe book management
 * Plugin URI:        http://sanjaywebexpert.com/
 * Description:       Book Management Plugin, Manage Book with Book self category in admin area.
 * Version:           1.0.0
 * Author:            Sanjay Sharma
 * Author URI:        http://sanjaywebexpert.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       swe-book-management
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SWE_BOOK_MANAGEMENT_VERSION', '1.0.0' );

if(!defined("SWE_BOOK_MANAGEMENT_PLUGIN_DIR"))
    define("SWE_BOOK_MANAGEMENT_PLUGIN_DIR",plugin_dir_path(__FILE__));
if(!defined("SWE_BOOK_MANAGEMENT_PLAGIN_URL"))
    define("SWE_BOOK_MANAGEMENT_PLAGIN_URL",plugins_url()."/swe-book-management");

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-swe-book-management-activator.php
 */
function activate_swe_book_management() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-swe-book-management-activator.php';
	$activator = new Swe_Book_Management_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-swe-book-management-deactivator.php
 */
function deactivate_swe_book_management() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-swe-book-management-deactivator.php';
	$deactivator = new Swe_Book_Management_Deactivator();
	$deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_swe_book_management' );
register_deactivation_hook( __FILE__, 'deactivate_swe_book_management' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-swe-book-management.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_swe_book_management() {

	$plugin = new Swe_Book_Management();
	$plugin->run();

}
run_swe_book_management();
