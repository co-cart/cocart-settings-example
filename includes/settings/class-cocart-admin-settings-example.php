<?php
/**
 * CoCart Settings: Example Settings.
 *
 * @author  Sébastien Dumont
 * @package CoCart\Admin\Settings
 * @since   4.0.0
 * @license GPL-2.0+
 */

namespace CoCart\Admin;

use CoCart\Admin\Settings;
use CoCart\Admin\SettingsPage as Page;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ExampleSettings extends Page {

	/**
	 * Constructor.
	 *
	 * @access public
	 */
	public function __construct() {
		$this->id    = 'example';
		$this->label = esc_html__( 'Example', 'cocart-settings-example' );

		add_action( 'cocart_settings_' . $this->id, array( $this, 'display_action_hook' ) );
		add_action( 'cocart_settings_' . $this->id . '_end', array( $this, 'display_action_hook' ) );
		add_action( 'cocart_settings_' . $this->id . '_after', array( $this, 'display_action_hook' ) );

		parent::__construct();
	} // END __construct()

	/**
	 * Get settings array.
	 *
	 * @access public
	 *
	 * @return array
	 */
	public function get_settings() {
		$settings[] = array(
			'id'    => $this->id,
			'type'  => 'title',
			'title' => __( 'Section Title', 'cocart-settings-example' ),
			'desc'  => __( 'Use the inputs below to help you apply the settings you need for your users.', 'cocart-settings-example' ),
		);

		$settings[] = array(
			'title'    => esc_html__( 'Text Input', 'cocart-settings-example' ),
			'id'       => 'example_text',
			'type'     => 'text',
			'default'  => '',
			'css'      => 'width:25em;',
			'desc'     => esc_html__( 'The default value. A single-line text field. Line-breaks are automatically removed from the input value.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'       => esc_html__( 'URL Input', 'cocart-settings-example' ),
			'id'          => 'example_url',
			'type'        => 'url',
			'default'     => '',
			'placeholder' => 'https://',
			'css'         => 'width:25em;',
			'desc'     => esc_html__( 'A field for entering a URL. Looks like a text input, but has validation parameters and relevant keyboard in supporting browsers and devices with dynamic keyboards.', 'cocart-settings-example' ),
			'autoload'    => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Password Input', 'cocart-settings-example' ),
			'id'       => 'example_password',
			'type'     => 'password',
			'default'  => '',
			'css'      => 'width:25em;',
			'desc'     => esc_html__( 'A single-line text field whose value is obscured. Will alert user if site is not secure.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Date Time Local Input', 'cocart-settings-example' ),
			'id'       => 'example_datetime_local',
			'type'     => 'datetime-local',
			'default'  => '',
			'css'      => 'width:14em;',
			'desc'     => esc_html__( 'A control for entering a date and time, with no time zone. Opens a date picker or numeric wheels for date- and time-components when active in supporting browsers.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Date Input', 'cocart-settings-example' ),
			'id'       => 'example_date',
			'type'     => 'date',
			'default'  => '',
			'css'      => 'width:10em;',
			'desc'     => esc_html__( 'A control for entering a date (year, month, and day, with no time). Opens a date picker or numeric wheels for year, month, day when active in supporting browsers.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Month Input', 'cocart-settings-example' ),
			'id'       => 'example_month',
			'type'     => 'month',
			'default'  => '',
			'css'      => 'width:25em;',
			'desc'     => esc_html__( 'A control for entering a month and year, with no time zone.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Week Input', 'cocart-settings-example' ),
			'id'       => 'example_week',
			'type'     => 'week',
			'default'  => '',
			'css'      => 'width:25em;',
			'desc'     => esc_html__( 'A control for entering a date consisting of a week-year number and a week number with no time zone.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Time Input', 'cocart-settings-example' ),
			'id'       => 'example_time',
			'type'     => 'time',
			'default'  => '',
			'css'      => 'width:10em;',
			'desc'     => esc_html__( 'A control for entering a time value with no time zone.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Number Input', 'cocart-settings-example' ),
			'id'       => 'example_number',
			'type'     => 'number',
			'default'  => '',
			'desc'     => esc_html__( 'A control for entering a number. Displays a spinner and adds default validation. Displays a numeric keypad in some devices with dynamic keypads.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Email Input', 'cocart-settings-example' ),
			'id'       => 'example_email',
			'type'     => 'email',
			'default'  => '',
			'css'      => 'width:25em;',
			'desc'     => esc_html__( 'A field for editing an email address. Looks like a text input, but has validation parameters and relevant keyboard in supporting browsers and devices with dynamic keyboards.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Telephone Input', 'cocart-settings-example' ),
			'id'       => 'example_tel',
			'type'     => 'tel',
			'default'  => '',
			'css'      => 'width:25em;',
			'desc'     => esc_html__( 'A control for entering a telephone number. Displays a telephone keypad in some devices with dynamic keypads.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Textarea', 'cocart-settings-example' ),
			'id'       => 'example_textarea',
			'type'     => 'textarea',
			'default'  => '',
			'css'      => 'width:25em; height: 10em;',
			'desc'     => esc_html__( 'This represents a multi-line plain-text editing, useful when you want to allow users to enter a sizeable amount of free-form text.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Select', 'cocart-settings-example' ),
			'id'       => 'example_select',
			'type'     => 'select',
			'default'  => '',
			'options'  => array(
				'option_1' => __( 'Option 1', 'cocart-settings-example' ),
				'option_2' => __( 'Option 2', 'cocart-settings-example' ),
				'option_3' => __( 'Option 3', 'cocart-settings-example' )
			),
			'css'      => 'width:10em;',
			'desc'     => esc_html__( 'This represents a control that provides a menu of options.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'MultiSelect', 'cocart-settings-example' ),
			'id'       => 'example_multiselect',
			'type'     => 'multiselect',
			'default'  => '',
			'options'  => array(
				'option_1' => __( 'Option 1', 'cocart-settings-example' ),
				'option_2' => __( 'Option 2', 'cocart-settings-example' ),
				'option_3' => __( 'Option 3', 'cocart-settings-example' )
			),
			'css'      => 'width:10em;',
			'desc'     => esc_html__( 'This represents a control that provides a menu of options that can be multiple selected.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Radio', 'cocart-settings-example' ),
			'id'       => 'example_radio',
			'type'     => 'radio',
			'default'  => '',
			'options'  => array(
				'option_1' => __( 'Option 1', 'cocart-settings-example' ),
				'option_2' => __( 'Option 2', 'cocart-settings-example' ),
				'option_3' => __( 'Option 3', 'cocart-settings-example' )
			),
			'desc'     => esc_html__( 'Radio buttons are typically rendered as small circles, which are filled or highlighted when selected.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'title'    => esc_html__( 'Checkbox', 'cocart-settings-example' ),
			'id'       => 'example_checkbox',
			'type'     => 'checkbox',
			'default'  => '',
			'desc'     => esc_html__( 'A check box allowing single values to be selected/deselected.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'id'       => 'example_button_external',
			'type'     => 'button',
			'url'      => 'https://wordpress.org/plugins/cart-rest-api-for-woocommerce/',
			'value'    => __( 'Button Targeted', 'cocart-settings-example' ),
			'desc'     => esc_html__( 'A button that opens an external page in a new window/tab.', 'cocart-settings-example' ),
			'target'   => '_blank',
			'autoload' => false,
		);

		$settings[] = array(
			'id'       => 'example_button_push',
			'type'     => 'button',
			'value'    => __( 'Push Button', 'cocart-settings-example' ),
			'desc'     => esc_html__( 'A push button with no default behavior displaying the value of the value attribute, empty by default.', 'cocart-settings-example' ),
			'autoload' => false,
		);

		$settings[] = array(
			'id'   => $this->id,
			'type' => 'sectionend',
		);

		return $settings;
	} // END get_settings()

	/**
	 * Displays a message showing the location of the action hooks.
	 *
	 * @access public
	 */
	public function display_action_hook() {
		echo sprintf( __( 'You can place content here via this action hook: %s', 'cocart-settings-example' ), '<code>do_action( \'' . current_filter() . '\' );</code>' );
	} // END display_action_hook()

	/**
	 * Output the settings.
	 *
	 * @access public
	 */
	public function output() {
		$settings = $this->get_settings();

		Settings::output_fields( $this->id, $settings );
	} // END output()

} // END class

return new ExampleSettings();
