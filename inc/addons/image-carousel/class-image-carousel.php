<?php
/**
 * Image Carousel Widget.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

/**
 * Image Carousel class.
 */
class Image_Carousel extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
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
		echo 'Image Carousel Content';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		echo 'Image Carousel Style';
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		echo 'Image Carousel Widget';
	}
}
