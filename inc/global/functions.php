<?php
/**
 * Plugins functions
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Theme colors.
define( 'RBELAD_PRIMARY_COLOR', '#007bff' );
define( 'RBELAD_BLACK_COLOR', '#000000' );
define( 'RBELAD_WHITE_COLOR', '#ffffff' );
define( 'RBELAD_TEXT_COLOR', '#777777' );

/**
 * Define Elementor typography constants for RB Addons.
 *
 * Loads after Elementor initializes and safely maps
 * Global Typography constants for use inside widgets.
 *
 * Prevents fatal errors when Elementor is inactive
 * or when the class is not yet available.
 *
 * @return void
 */
function rbelad_define_elementor_typography_constants() {
	// Bail if Elementor Global Typography class is unavailable.
	if ( ! class_exists( '\Elementor\Core\Kits\Documents\Tabs\Global_Typography' ) ) {
		return;
	}

	// Define constants only once.
	if ( ! defined( 'RBELAD_PRIMARY_TEXT' ) ) {
		define(
			'RBELAD_PRIMARY_TEXT',
			\Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY
		);
	}

	if ( ! defined( 'RBELAD_SECONDARY_TEXT' ) ) {
		define(
			'RBELAD_SECONDARY_TEXT',
			\Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY
		);
	}

	if ( ! defined( 'RBELAD_ACCENT_TEXT' ) ) {
		define(
			'RBELAD_ACCENT_TEXT',
			\Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT
		);
	}

	if ( ! defined( 'RBELAD_GENERAL_TEXT' ) ) {
		define(
			'RBELAD_GENERAL_TEXT',
			\Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT
		);
	}
}
add_action( 'elementor/init', 'rbelad_define_elementor_typography_constants' );

/**
 * Check whether pro version is defined.
 *
 * @return bool whether pro version is active
 */
function rbelad_has_pro() {
	return defined( 'RBELAD_Elementor_Pro' );
}

/**
 * Check elementor version
 *
 * @param string $operator '<'.
 * @param string $version Elementor Version.
 * @return bool
 */
function rbelad_is_elementor_version( $operator = '<', $version = '2.6.0' ) {
	return defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, $version, $operator );
}

/**
 * Add CSS & JS Files
 */
function rbelad_addons_styles() {
	wp_enqueue_style( 'rbelad-addons-style', RBELAD_ASSETS . 'css/style.css', null, time(), 'all' );
}
add_action( 'wp_enqueue_scripts', 'rbelad_addons_styles' );

/**
 * Elementor extended background overlay.
 */
require RBELAD_EXTENDS . '/background-overlay.php';

/**
 * Register extended background size.
 */
require RBELAD_EXTENDS . '/background-size.php';

/**
 * Register extended typography control.
 *
 * @param \Elementor\Controls_Manager $controls_manager Controls manager.
 */
function rbelad_register_typography_control( $controls_manager ) {

	require_once RBELAD_EXTENDS . '/class-group-control-typography-extended.php';

	$controls_manager->add_group_control(
		Group_Control_Typography_Extended::get_type(),
		new Group_Control_Typography_Extended()
	);
}
add_action( 'elementor/controls/controls_registered', 'rbelad_register_typography_control' );
