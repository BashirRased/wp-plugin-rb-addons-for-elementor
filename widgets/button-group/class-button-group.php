<?php
/**
 * Button Group Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || die();

/**
 * Button_Group class.
 */
class Button_Group extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'button group',
			'grouped buttons',
			'multi button layout',
			'button cluster',
			'Elementor button group',
			'group buttons widget',
			'button group layout',
			'multiple buttons widget',
			'button group styling',
			'Elementor CTA buttons',
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
		require RBELAD_WIDGET_PATH . 'button-group/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
		$this->__item_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		require RBELAD_WIDGET_PATH . 'button-group/style/general.php';
	}

	/**
	 * Style - General
	 */
	protected function __item_style() {
		require RBELAD_WIDGET_PATH . 'button-group/style/item.php';
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'button-group/render/design-1.php';
	}
}
