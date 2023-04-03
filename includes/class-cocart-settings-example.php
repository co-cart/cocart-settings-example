<?php
/**
 * CoCart Settings Example core setup.
 *
 * @author   Sébastien Dumont
 * @category Package
 * @license  GPL-2.0+
 */

namespace CoCart\Settings;

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main CoCart Settings Example class.
 *
 * @class CoCart\Settings\Example
 */
final class Example {

	/**
	 * Plugin Version
	 *
	 * @access public
	 *
	 * @static
	 */
	public static $version = '1.0.0';

	/**
	 * Initiate CoCart Settings Example.
	 *
	 * @access public
	 *
	 * @static
	 */
	public static function init() {
		add_filter( 'cocart_get_settings_pages', function( $settings ) {
			$settings['example'] = include dirname( __FILE__ ) . '/settings/class-cocart-admin-settings-example.php';
		
			return $settings;
		});

		// Load translation files.
		add_action( 'init', array( __CLASS__, 'load_plugin_textdomain' ), 0 );
	} // END init()

	/**
	 * Return the name of the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_name() {
		return 'CoCart Settings Example';
	}

	/**
	 * Return the version of the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_version() {
		return self::$version;
	}

	/**
	 * Return the path to the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_path() {
		return dirname( __DIR__ );
	}

	/**
	 * Load the plugin translations if any ready.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/cocart-settings-example/cocart-settings-example-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/cocart-settings-example-LOCALE.mo
	 *
	 * @access public
	 *
	 * @static
	 */
	public static function load_plugin_textdomain() {
		if ( function_exists( 'determine_locale' ) ) {
			$locale = determine_locale();
		} else {
			$locale = is_admin() ? get_user_locale() : get_locale();
		}

		$locale = apply_filters( 'plugin_locale', $locale, 'cocart-settings-example' );

		unload_textdomain( 'cocart-settings-example' );
		load_textdomain( 'cocart-settings-example', WP_LANG_DIR . '/cocart-settings-example/cocart-settings-example-' . $locale . '.mo' );
		load_plugin_textdomain( 'cocart-settings-example', false, plugin_basename( dirname( COCART_SETTINGS_EXAMPLE_FILE ) ) . '/languages' );
	} // END load_plugin_textdomain()

} // END class
