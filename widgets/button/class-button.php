<?php
/**
 * Button Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || exit;

/**
 * Button Widget
 */
class Button extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'button',
			'link',
			'click',
			'rb',
		);
	}

	/**
	 * Register controls
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
		require RBELAD_WIDGET_PATH . 'button/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
		$this->__wrpa_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		require RBELAD_WIDGET_PATH . 'button/style/general.php';
	}

	/**
	 * Style - Wrap
	 */
	protected function __wrpa_style() {
		require RBELAD_WIDGET_PATH . 'button/style/wrap.php';
	}

	/**
	 * Render output
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'button/render/design-1.php';
	}
}
