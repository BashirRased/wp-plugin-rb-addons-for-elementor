<?php
/**
 * Icon List Widget.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

/**
 * Icon_List class.
 */
class Icon_List extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'icon list',
			'list style',
			'list widget',
			'icon list',
			'bullet list',
			'styled list',
			'feature list',
			'read more list',
			'interactive list',
			'Elementor list',
			'list layout widget',
			'list styling',
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
		require RBELAD_WIDGETS . '/icon-list/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__icon_style();
		$this->__label_style();
		$this->__separator_style();
		$this->__info_style();
		$this->__item_style();
		$this->__wrapper_style();
	}

	/**
	 * Style - Icon
	 */
	protected function __icon_style() {
		require RBELAD_WIDGETS . '/icon-list/style/icon.php';
	}

	/**
	 * Style - Label
	 */
	protected function __label_style() {
		require RBELAD_WIDGETS . '/icon-list/style/label.php';
	}

	/**
	 * Style - Separator
	 */
	protected function __separator_style() {
		require RBELAD_WIDGETS . '/icon-list/style/separator.php';
	}

	/**
	 * Style - Info
	 */
	protected function __info_style() {
		require RBELAD_WIDGETS . '/icon-list/style/info.php';
	}

	/**
	 * Style - Item
	 */
	protected function __item_style() {
		require RBELAD_WIDGETS . '/icon-list/style/item.php';
	}

	/**
	 * Style - Wrapper
	 */
	protected function __wrapper_style() {
		require RBELAD_WIDGETS . '/icon-list/style/wrapper.php';
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		require RBELAD_WIDGETS . '/icon-list/render/design-1.php';
	}
}
