<?php
/**
 * Image Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;


defined( 'ABSPATH' ) || exit;

/**
 * RB Image Widget
 */
class Image extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array( 'image', 'photo', 'rb', 'media' );
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
	 * Content - General
	 */
	protected function __general_content() {
		require RBELAD_WIDGET_PATH . 'image/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__image_style();
		$this->__caption_style();
		$this->__wrap_style();
	}

	/**
	 * Style - Image
	 */
	protected function __image_style() {
		require RBELAD_WIDGET_PATH . 'image/style/image.php';
	}

	/**
	 * Style - Caption
	 */
	protected function __caption_style() {
		require RBELAD_WIDGET_PATH . 'image/style/caption.php';
	}

	/**
	 * Style - Caption
	 */
	protected function __wrap_style() {
		require RBELAD_WIDGET_PATH . 'image/style/wrap.php';
	}

	/**
	 * Render output
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'image/render/design-1.php';
	}
}
