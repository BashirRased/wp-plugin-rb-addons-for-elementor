<?php
/**
 * Button Widget.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\Background_Style;
use RBELAD_Elementor_Addons\Traits\Border_Style;
use RBELAD_Elementor_Addons\Traits\Link_Style;
use RBELAD_Elementor_Addons\Traits\Spacing_Style;
use RBELAD_Elementor_Addons\Traits\Text_Style;
use RBELAD_Elementor_Addons\Traits\Transition_Style;

defined( 'ABSPATH' ) || die();

/**
 * Button class.
 */
class Button extends Base {
	/**
	* Use all trait.
	*/
	use Text_Style;
	use Spacing_Style;
	use Border_Style;
	use Transition_Style;
	use Link_Style;
	use Background_Style;

	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'button',
			'link button',
			'icon button',
			'hover button',
			'full width button',
			'Elementor button',
			'styled button',
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
		require RBELAD_WIDGETS . '/button/content/general.php';
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
		require RBELAD_WIDGETS . '/button/style/general.php';
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
		require RBELAD_WIDGETS . '/button/render/design-1.php';
	}
}
