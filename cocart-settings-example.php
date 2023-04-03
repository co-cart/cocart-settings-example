<?php
/*
 * Plugin Name: CoCart Settings Example
 * Plugin URI:  https://cocart.xyz
 * Description: Just an example of adding settings of your own to CoCart.
 * Author:      Sébastien Dumont
 * Author URI:  https://sebastiendumont.com
 * Version:     1.0.0
 * Text Domain: cocart-settings-example
 * Domain Path: /languages/
 * Requires at least: 5.6
 * Requires PHP: 7.4
 * WC requires at least: 6.4
 * WC tested up to: 7.5
 *
 * @package CoCart Settings Example
 */

defined( 'ABSPATH' ) || exit;

if ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
	return;
}

if ( ! defined( 'COCART_SETTINGS_EXAMPLE_FILE' ) ) {
	define( 'COCART_SETTINGS_EXAMPLE_FILE', __FILE__ );
}

// Include the main CoCart Settings Example class.
if ( ! class_exists( 'CoCart\Settings\Example', false ) ) {
	include_once( untrailingslashit( plugin_dir_path( COCART_SETTINGS_EXAMPLE_FILE ) ) . '/includes/class-cocart-settings-example.php' );
}

/**
 * Returns the main instance of cocart_settings_example and only runs if it does not already exists.
 *
 * @return cocart_settings_example
 */
if ( ! function_exists( 'cocart_settings_example' ) ) {
	function cocart_settings_example() {
		return \CoCart\Settings\Example::init();
	}

	cocart_settings_example();
}
