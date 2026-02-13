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
 * Check whether pro version is defined.
 *
 * @return bool whether pro version is active
 */
function rbelad_has_pro() {
	return defined( 'RBELAD_PRO_VERSION' );
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
