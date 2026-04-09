<?php
/**
 * Divider Widget.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\Background_Style;
use RBELAD_Elementor_Addons\Traits\Border_Style;
use RBELAD_Elementor_Addons\Traits\Item_Alignment_Style;
use RBELAD_Elementor_Addons\Traits\Item_Size_Style;

defined( 'ABSPATH' ) || die();

/**
 * Divider class.
 */
class Divider extends Base {
	/**
	 * Use all trait.
	 */
	use Item_Size_Style;
	use Border_Style;
	use Item_Alignment_Style;
	use Background_Style;

	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'divider',
			'separator',
			'section divider',
			'horizontal divider',
			'icon divider',
			'text divider',
			'image divider',
			'Elementor divider',
			'divider styling widget',
			'divider layout widget',
			'rb',
			'rb addons',
			'rb elementor addons',
		);
	}

	/**
	 * Register widget control
	 */
	protected function register_controls() {
		$this->register_style_tab();
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
		require RBELAD_WIDGETS . '/divider/style/general.php';
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
	 * Register render display control
	 */
	protected function render() {
		require RBELAD_WIDGETS . '/divider/render/design-1.php';
	}
}
