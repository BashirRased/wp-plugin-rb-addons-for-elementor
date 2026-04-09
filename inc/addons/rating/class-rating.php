<?php
/**
 * Rating Widget.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\Color_Style;
use RBELAD_Elementor_Addons\Traits\Gap_Style;
use RBELAD_Elementor_Addons\Traits\Icon_Size_Style;
use RBELAD_Elementor_Addons\Traits\Item_Alignment_Style;

defined( 'ABSPATH' ) || die();

/**
 * Rating class.
 */
class Rating extends Base {
	/**
	* Use all trait.
	*/
	use Item_Alignment_Style;
	use Color_Style;
	use Gap_Style;
	use Icon_Size_Style;

	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'rating',
			'rating star',
			'progress',
			'star rating',
			'skill rating',
			'level',
			'expertise',
			'rb',
			'rb addons',
			'rb addons elementor',
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
		require RBELAD_WIDGETS . '/rating/content/general.php';
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
		require RBELAD_WIDGETS . '/rating/style/general.php';
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
		require RBELAD_WIDGETS . '/rating/render/design-1.php';
	}
}
