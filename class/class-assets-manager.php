<?php
/**
 * Elementor assets.
 *
 * @package RB_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Assets_Manager Class.
 *
 * @package RB_Elementor_Addons
 */
class Assets_Manager {
	/**
	 * Elementor Editor (Admin) CSS & JS
	 */
	public static function elementor_editor_assets() {
		wp_enqueue_style(
			'rbelad-icon-style',
			RBELAD_ASSETS . 'css/all-icon.css',
			array(),
			time(),
			'all'
		);
	}
}
