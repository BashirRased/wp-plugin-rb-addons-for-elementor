<?php

final class RB_Elementor_Addons {

	/**
	 * Plugin Version
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	/**
	 * Minimum PHP Version
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Constructor
	 */
	public function __construct() {
		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Initialize the plugin
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}
	
		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( RB_ADDONS_PATH . '/inc/common/plugin.php' );
	}

	/**
	 * Admin notice
	 */
	public function admin_notice_missing_main_plugin() {
		$plugin_file = 'rb-elementor-addons/rb-elementor-addons.php'; // Define this correctly!
		if (
			isset( $_GET['activate'] )
			&& isset( $_GET['_wpnonce'] )
			&& wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'activate-plugin_' . $plugin_file )
		) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'rb-elementor-addons' ),
			'<strong>' . esc_html__( 'RB Elementor Addons', 'rb-elementor-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'rb-elementor-addons' ) . '</strong>'
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post( $message ) );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 */
	public function admin_notice_minimum_elementor_version() {
		$plugin_file = 'rb-elementor-addons/rb-elementor-addons.php'; // Define this correctly!
		if (
			isset( $_GET['activate'] )
			&& isset( $_GET['_wpnonce'] )
			&& wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'activate-plugin_' . $plugin_file )
		) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'rb-elementor-addons' ),
			'<strong>' . esc_html__( 'RB Elementor Addons', 'rb-elementor-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'rb-elementor-addons' ) . '</strong>'
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post( $message ) );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 */
	public function admin_notice_minimum_php_version() {
		$plugin_file = 'rb-elementor-addons/rb-elementor-addons.php'; // Define this correctly!
		if (
			isset( $_GET['activate'] )
			&& isset( $_GET['_wpnonce'] )
			&& wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'activate-plugin_' . $plugin_file )
		) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'rb-elementor-addons' ),
			'<strong>' . esc_html__( 'RB Elementor Addons', 'rb-elementor-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'rb-elementor-addons' ) . '</strong>'
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post( $message ) );
	}
}

// Instantiate RB_Elementor_Addons.
new RB_Elementor_Addons();