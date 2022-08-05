<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              example.com
 * @since             1.0.0
 * @package           Gg_Backend_Test
 *
 * @wordpress-plugin
 * Plugin Name:       GG Backend Test
 * Plugin URI:        example.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Robert Boggs
 * Author URI:        example.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gg-backend-test
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
define( 'GG_BACKEND_TEST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gg-backend-test-activator.php
 */
function activate_gg_backend_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gg-backend-test-activator.php';
	Gg_Backend_Test_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gg-backend-test-deactivator.php
 */
function deactivate_gg_backend_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gg-backend-test-deactivator.php';
	Gg_Backend_Test_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gg_backend_test' );
register_deactivation_hook( __FILE__, 'deactivate_gg_backend_test' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gg-backend-test.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gg_backend_test() {

	$plugin = new Gg_Backend_Test();
	$plugin->run();

}
run_gg_backend_test();
