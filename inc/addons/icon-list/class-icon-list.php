<?php
/**
 * Icon List Widget.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\Background_Style;
use RBELAD_Elementor_Addons\Traits\Border_Style;
use RBELAD_Elementor_Addons\Traits\Color_Style;
use RBELAD_Elementor_Addons\Traits\Icon_Size_Style;
use RBELAD_Elementor_Addons\Traits\Icon_Style;
use RBELAD_Elementor_Addons\Traits\Image_Size_Style;
use RBELAD_Elementor_Addons\Traits\Item_Size_Style;
use RBELAD_Elementor_Addons\Traits\Spacing_Style;
use RBELAD_Elementor_Addons\Traits\Text_Alignment_Style;
use RBELAD_Elementor_Addons\Traits\Text_Style;

defined( 'ABSPATH' ) || die();

/**
 * Icon_List class.
 */
class Icon_List extends Base {
	/**
	 * Use all trait.
	 */
	use Color_Style;
	use Text_Style;
	use Text_Alignment_Style;
	use Spacing_Style;
	use Border_Style;
	use Background_Style;
	use Icon_Style;
	use Icon_Size_Style;
	use Item_Size_Style;
	use Image_Size_Style;

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
		require RBELAD_WIDGETS . '/icon-list/render/design-1.php';
	}
}
