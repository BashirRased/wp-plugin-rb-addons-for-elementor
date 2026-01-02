<?php
/**
 * Elementor assets.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Assets_Manager Class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Assets_Manager {
	/**
	 * Elementor Editor (Admin) CSS & JS
	 */
	public static function elementor_editor_assets() {
		// Editor CSS.
		wp_enqueue_style(
			'rbelad-editor',
			RBELAD_ASSETS . 'css/editor.css',
			array(),
			time(),
			'all'
		);
	}
}
