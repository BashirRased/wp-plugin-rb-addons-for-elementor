<?php
/**
 * Rating Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || die();

/**
 * Rating class.
 */
class Rating extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'star',
			'rating',
			'review',
			'score',
			'scale',
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
		require RBELAD_WIDGET_PATH . 'rating/content/general.php';
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
		require RBELAD_WIDGET_PATH . 'rating/style/general.php';
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'rating/render/design-1.php';
	}
}
