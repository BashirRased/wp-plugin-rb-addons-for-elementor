<?php
/**
 * Elementor & Admin assets.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Classes;

defined( 'ABSPATH' ) || exit;

/**
 * CSS & JS controller class.
 */
class Assets_Manager {
	/**
	 * Frontend  assets (CSS + JS).
	 */
	public static function frontend_assets() {
		wp_enqueue_style(
			'rbelad-layout',
			RBELAD_CSS_URL . 'layout.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-default',
			RBELAD_CSS_URL . 'rbelad-default.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-general-icons',
			RBELAD_CSS_URL . 'rbelad-general-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-widget-icons',
			RBELAD_CSS_URL . 'rbelad-widget-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-b-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-b-icons.css',
			array(),
			time()
		);
	}

	/**
	 * Elementor editor assets (CSS + JS).
	 */
	public static function editor_assets() {
		wp_enqueue_style(
			'rbelad-layout',
			RBELAD_CSS_URL . 'layout.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-default',
			RBELAD_CSS_URL . 'rbelad-default.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-editor',
			RBELAD_CSS_URL . 'editor.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-general-icons',
			RBELAD_CSS_URL . 'rbelad-general-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-widget-icons',
			RBELAD_CSS_URL . 'rbelad-widget-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-b-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-b-icons.css',
			array(),
			time()
		);
	}

	/**
	 * Admin dashboard assets (CSS + JS).
	 */
	public static function admin_assets() {
		wp_enqueue_style(
			'rbelad-layout',
			RBELAD_CSS_URL . 'layout.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-default',
			RBELAD_CSS_URL . 'rbelad-default.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-review',
			RBELAD_CSS_URL . 'review.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-dashboard',
			RBELAD_CSS_URL . 'dashboard.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-general-icons',
			RBELAD_CSS_URL . 'rbelad-general-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-widget-icons',
			RBELAD_CSS_URL . 'rbelad-widget-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-icons.css',
			array(),
			time()
		);

		wp_enqueue_style(
			'rbelad-phosphor-b-icons',
			RBELAD_CSS_URL . 'rbelad-phosphor-b-icons.css',
			array(),
			time()
		);

		wp_enqueue_script(
			'rbelad-dashboard-menu',
			RBELAD_JS_URL . 'dashboard-menu.js',
			'',
			time(),
			true
		);
	}
}
