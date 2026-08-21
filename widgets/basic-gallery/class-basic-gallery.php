<?php
/**
 * Basic Gallery Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || die();

/**
 * Basic Gallery class.
 */
class Basic_Gallery extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'image',
			'photo',
			'visual',
			'gallery',
			'rb',
			'rb addons',
			'rb elementor addons',
		);
	}

	/**
	 * Register widget control
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
		require RBELAD_WIDGET_PATH . 'basic-gallery/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
		$this->__image_style();
		$this->__caption_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		require RBELAD_WIDGET_PATH . 'basic-gallery/style/general.php';
	}

	/**
	 * Style - General
	 */
	protected function __image_style() {
		require RBELAD_WIDGET_PATH . 'basic-gallery/style/image.php';
	}

	/**
	 * Style - General
	 */
	protected function __caption_style() {
		require RBELAD_WIDGET_PATH . 'basic-gallery/style/caption.php';
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'basic-gallery/render/design-1.php';
	}
}
