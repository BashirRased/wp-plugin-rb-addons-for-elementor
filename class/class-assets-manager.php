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
		add_action( 'elementor/editor/after_enqueue_scripts', array( __CLASS__, 'editor_scripts' ) );

		// Admin dashboard styles.
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin_styles' ) );
	}

	/**
	 * Frontend styles.
	 */
	public static function enqueue_frontend_styles() {
		wp_enqueue_style(
			'rbelad-button',
			RBELAD_ASSETS . 'css/button.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-icons',
			RBELAD_ASSETS . 'css/rbelad-fonts.css',
			array(),
			time()
		);
	}

	/**
	 * Elementor editor assets (CSS + JS).
	 */
	public static function editor_scripts() {
		// Editor CSS.
		wp_enqueue_style(
			'rbelad-editor',
			RBELAD_ASSETS . 'css/editor.css',
			array(),
			time()
		);

		// Icons.
		wp_enqueue_style(
			'rbelad-icons',
			RBELAD_ASSETS . 'css/rbelad-fonts.css',
			array(),
			time()
		);

		wp_enqueue_script(
			'rbelad-editor',
			RBELAD_ASSETS . 'js/editor.js',
			array( 'jquery', 'elementor-editor' ), // IMPORTANT: only elementor-editor.
			time(),
			true
		);
	}

	/**
	 * Enqueue admin dashboard styles.
	 *
	 * Loads only on RB Addons dashboard page.
	 *
	 * @param string $hook Admin page hook.
	 *
	 * @return void
	 */
	public static function enqueue_admin_styles( $hook ) {

		if ( 'toplevel_page_rbelad_dashboard' !== $hook ) {
			return;
		}

		wp_enqueue_style(
			'rbelad-admin-icons',
			RBELAD_ASSETS . 'css/rbelad-fonts.css',
			array(),
			time()
		);
	}
}

// Bootstrap.
Assets_Manager::init();
