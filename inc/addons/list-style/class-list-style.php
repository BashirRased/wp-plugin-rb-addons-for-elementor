<?php
/**
 * List Style Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

/**
 * List_Style class.
 *
 * @package RBELAD_Elementor_Addons
 */
class List_Style extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
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
		require RBELAD_WIDGETS . '/list-style/content/general.php';
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
		require RBELAD_WIDGETS . '/list-style/style/icon.php';
	}

	/**
	 * Style - Label
	 */
	protected function __label_style() {
		require RBELAD_WIDGETS . '/list-style/style/label.php';
	}

	/**
	 * Style - Separator
	 */
	protected function __separator_style() {
		require RBELAD_WIDGETS . '/list-style/style/separator.php';
	}

	/**
	 * Style - Info
	 */
	protected function __info_style() {
		require RBELAD_WIDGETS . '/list-style/style/info.php';
	}

	/**
	 * Style - Item
	 */
	protected function __item_style() {
		require RBELAD_WIDGETS . '/list-style/style/item.php';
	}

	/**
	 * Style - Wrapper
	 */
	protected function __wrapper_style() {
		require RBELAD_WIDGETS . '/list-style/style/wrapper.php';
	}

	/**
	 * Add style controls.
	 *
	 * @param string $prefix The prefix of the controls.
	 * @param array  $args The element selector, controls list and more.
	 */
	private function add_style_controls( string $prefix, array $args ) {
		$controls = ! empty( $args['controls'] ) ? $args['controls'] : array();
		if ( ! empty( $controls ) && is_array( $controls ) ) {
			foreach ( $controls as $key => $values ) {
				require RBELAD_GLOBAL . '/all-style.php';
			}
		}
	}

	/**
	 * Add repeater controls.
	 *
	 * @param string $prefix The prefix of the controls.
	 * @param array  $args The element selector, controls list and more.
	 */
	private function add_repeater_controls( string $prefix, array $args ) {
		require RBELAD_GLOBAL . '/repeater-style.php';
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		require RBELAD_WIDGETS . '/list-style/render/design-1.php';
	}
}
