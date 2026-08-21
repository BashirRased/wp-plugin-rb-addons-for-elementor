<?php
/**
 * Heading Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || exit;

/**
 * Basic Heading Widget
 */
class Heading extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'heading',
			'title',
			'text',
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
	 * Content - Title
	 */
	protected function __general_content() {
		require RBELAD_WIDGET_PATH . 'heading/content/general.php';
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
		require RBELAD_WIDGET_PATH . 'heading/style/general.php';
	}

	/**
	 * Render output
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'heading/render/design-1.php';
	}
}
