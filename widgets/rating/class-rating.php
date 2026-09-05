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
		$this->__full_icon_style();
		$this->__half_icon_style();
		$this->__empty_icon_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		require RBELAD_WIDGET_PATH . 'rating/style/general.php';
	}

	/**
	 * Style - Full Icon
	 */
	protected function __full_icon_style() {
		require RBELAD_WIDGET_PATH . 'rating/style/full-icon.php';
	}

	/**
	 * Style - Half Icon
	 */
	protected function __half_icon_style() {
		require RBELAD_WIDGET_PATH . 'rating/style/half-icon.php';
	}

	/**
	 * Style - Empty Icon
	 */
	protected function __empty_icon_style() {
		require RBELAD_WIDGET_PATH . 'rating/style/empty-icon.php';
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'rating/render/design-1.php';
	}
}
