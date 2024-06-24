<?php
/*
 * Plugin Name: WordPress Odds Comparison Plugin
 * Description: Custom plugin for comparing odds from different bookmakers.
 * Version: 1.0
 * @package    Odds_Comparison
 * Author: Learning Manish Solutions
 * Author URI: http://Learningmanish.com/
 * Text Domain: common-overrides
 * Tags: common overrides
 * @category Core
 * WC tested up to: 6.4
*/

/**
 * STEP 1
 * ABSPATH must be check before any futher development
 * It will cross check if file is executed outside admin area
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * STEP 2
 * Global constant must be defined initially
 * It will help to modify at single place in entire plugin
 */
define( 'Odds_Comparison_VERSION', '1.0.0' );
define( 'Odds_Comparison_PUBLIC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'Odds_Comparison_GLOBAL_PATH', plugin_dir_path( __FILE__ ) );

/*
* Step 3 : OOps concept plugin activation & deactivation process
* function & classes must be checked before use/initialization
*/


function activate_Odds_Comparison_plugin() {
	require_once Odds_Comparison_GLOBAL_PATH . 'includes/classes/class-common-overrides-activator.php';
}

function deactivate_Odds_Comparison_plugin() {
	require_once Odds_Comparison_GLOBAL_PATH . 'includes/classes/class-common-overrides-deactivator.php';
}

function uninstall_Odds_Comparison_plugin() {
	require_once Odds_Comparison_GLOBAL_PATH . 'includes/classes/class-common-overrides-uninstall.php';
}

// Activation hook while plugin exist & activate
register_activation_hook( __FILE__, 'activate_Odds_Comparison_plugin' );

// Deactivation hook while plugin active and try to deactivate
register_deactivation_hook( __FILE__, 'deactivate_Odds_Comparison_plugin' );

// Uninstall Hook While plugin is uninstalled
register_uninstall_hook( __FILE__, 'uninstall_Odds_Comparison_plugin' );

// Load Entire Plugin Hooks, Method and Filters


require Odds_Comparison_GLOBAL_PATH . 'includes/classes/class-common-overrides.php';

if ( ! function_exists( 'run_activation_deactivation_common_loaders' ) ) {
	function run_activation_deactivation_common_loaders() {

		$plugin = new Odds_Comparison_Common_Class();
		$plugin->run();
	}
}
run_activation_deactivation_common_loaders();