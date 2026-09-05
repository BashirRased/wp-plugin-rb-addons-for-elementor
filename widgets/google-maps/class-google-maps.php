<?php
/**
 * Google Maps Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || exit;

/**
 * Google Maps Widget
 */
class Google_Maps extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'map',
			'google',
			'location',
			'rb',
		);
	}

	/**
	 * Controls
	 */
	protected function register_controls() {
		$this->register_content_tab();
	}

	/**
	 * Widget content tab
	 */
	protected function register_content_tab() {
		$this->__general_content();
	}

	/**
	 * Content - Title
	 */
	protected function __general_content() {
		require RBELAD_WIDGET_PATH . 'google-maps/content/general.php';
	}

	/**
	 * Render output
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'google-maps/render/design-1.php';
	}
}
