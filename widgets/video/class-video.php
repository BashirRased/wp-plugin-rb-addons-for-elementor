<?php
/**
 * Video Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || exit;

/**
 * Video Widget
 */
class Video extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array( 'video', 'youtube', 'vimeo', 'media', 'rb' );
	}

	/**
	 * Register controls
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
		require RBELAD_WIDGET_PATH . 'video/content/general.php';
	}

	/**
	 * Render output
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'video/render/design-1.php';
	}
}
