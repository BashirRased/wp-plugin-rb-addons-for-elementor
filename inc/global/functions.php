<?php

/**
 * Check elementor version
 *
 * @since 1.0.0
 * @param string $operator '<'.
 * @param string $version Elementor Version.
 * @return bool
 */
function rb_is_elementor_version( $operator = '<', $version = '2.6.0' ) {
	return defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, $version, $operator );
}

/**
 * Add CSS & JS Files
 */
function rb_addons_styles() {
	wp_enqueue_style( 'rb-addons-style', RB_ADDONS_ASSETS . 'css/style.css', null, time(), 'all' );
}
add_action( 'wp_enqueue_scripts', 'rb_addons_styles' );

/**
 * Add CSS & JS Files
 */
function rb_addons_admin_dashboard() {
    wp_enqueue_style( 'rb-admin-style', RB_ADDONS_ASSETS . 'css/admin-dashboard.css', [], time(), 'all' );
    wp_enqueue_script( 'rb-admin-script', RB_ADDONS_ASSETS . 'js/admin-dashboard.js', ['jquery'], time(), true );
}
add_action( 'admin_enqueue_scripts', 'rb_addons_admin_dashboard' );