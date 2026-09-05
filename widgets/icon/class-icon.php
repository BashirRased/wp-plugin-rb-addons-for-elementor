<?php
/**
 * Icon Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || exit;

/**
 * Icon Widget
 */
class Icon extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array( 'icon', 'svg', 'font icon', 'rb' );
	}

	/**
	 * Controls
	 */
	protected function register_controls() {
		$this->register_content_tab();
		$this->register_style_tab();
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
		require RBELAD_WIDGET_PATH . 'icon/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
	}

	/**
	 * Style - Title
	 */
	protected function __general_style() {
		require RBELAD_WIDGET_PATH . 'icon/style/general.php';
	}

	/**
	 * Render output
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'icon/render/design-1.php';
	}
}
