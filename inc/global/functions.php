<?php
/**
 * Plugins functions
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
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
 * Add CSS & JS Files
 */
function rbelad_addons_admin_dashboard() {
	// Admin Dashboard CSS.
	wp_enqueue_style(
		'rbelad-admin-style',
		RBELAD_ASSETS . 'css/admin.css',
		array(),
		time(),
		'all'
	);

	// Admin Dashboard JS.
	wp_enqueue_script(
		'rbelad-admin',
		RBELAD_ASSETS . 'js/admin.js',
		array( 'jquery' ),
		RBELAD_VERSION,
		true
	);
}
add_action( 'admin_enqueue_scripts', 'rbelad_addons_admin_dashboard' );
