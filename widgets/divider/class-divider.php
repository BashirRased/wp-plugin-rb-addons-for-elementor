<?php
/**
 * Divider Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || exit;

/**
 * Divider Widget
 */
class Divider extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array( 'divider', 'separator', 'line', 'hr', 'rb' );
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
		require RBELAD_WIDGET_PATH . 'divider/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
		$this->__text_style();
		$this->__icon_style();
		$this->__image_style();
		$this->__wrap_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		require RBELAD_WIDGET_PATH . 'divider/style/general.php';
	}

	/**
	 * Style - Text
	 */
	protected function __text_style() {
		require RBELAD_WIDGET_PATH . 'divider/style/text.php';
	}

	/**
	 * Style - Icon
	 */
	protected function __icon_style() {
		require RBELAD_WIDGET_PATH . 'divider/style/icon.php';
	}

	/**
	 * Style - Image
	 */
	protected function __image_style() {
		require RBELAD_WIDGET_PATH . 'divider/style/image.php';
	}

	/**
	 * Style - General
	 */
	protected function __wrap_style() {
		require RBELAD_WIDGET_PATH . 'divider/style/wrap.php';
	}

	/**
	 * Render output
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'divider/render/design-1.php';
	}
}
