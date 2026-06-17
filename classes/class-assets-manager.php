<?php
/**
 * Elementor & Admin assets.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * CSS & JS controller class.
 */
class Assets_Manager {

	/**
	 * Initialize hooks.
	 */
	public static function init() {

		// Frontend styles.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_frontend_styles' ) );

		// Elementor editor assets.
		add_action( 'elementor/editor/after_enqueue_scripts', array( __CLASS__, 'editor_assets' ) );
	}

	/**
	 * Frontend styles.
	 */
	public static function enqueue_frontend_styles() {
		wp_enqueue_style(
			'rbelad-default',
			RBELAD_CSS_URL . 'rbelad-default.css',
			array(),
			RBELAD_VERSION
		);
	}

	/**
	 * Elementor editor assets (CSS + JS).
	 */
	public static function editor_assets() {
		// =========================
		// Styles
		// =========================
		wp_enqueue_style(
			'rbelad-default',
			RBELAD_CSS_URL . 'rbelad-default.css',
			array(),
			RBELAD_VERSION
		);

		wp_enqueue_style(
			'rbelad-editor',
			RBELAD_CSS_URL . 'editor.css',
			array(),
			RBELAD_VERSION
		);
	}
}
