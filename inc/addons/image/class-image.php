<?php
/**
 * Image Widget.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\Border_Style;
use RBELAD_Elementor_Addons\Traits\Item_Size_Style;
use RBELAD_Elementor_Addons\Traits\Link_Style;
use RBELAD_Elementor_Addons\Traits\Spacing_Style;
use RBELAD_Elementor_Addons\Traits\Text_Alignment_Style;
use RBELAD_Elementor_Addons\Traits\Text_Style;

defined( 'ABSPATH' ) || die();

/**
 * Image class.
 */
class Image extends Base {
	/**
	 * Use all trait.
	 */
	use Text_Alignment_Style;
	use Item_Size_Style;
	use Spacing_Style;
	use Border_Style;
	use Text_Style;
	use Link_Style;

	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'image',
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
		require RBELAD_WIDGETS . '/image/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
		$this->__caption_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		require RBELAD_WIDGETS . '/image/style/general.php';
	}

	/**
	 * Style - General
	 */
	protected function __caption_style() {
		require RBELAD_WIDGETS . '/image/style/caption.php';
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
		require RBELAD_WIDGETS . '/image/render/design-1.php';
	}
}
