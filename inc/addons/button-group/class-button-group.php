<?php
/**
 * Button Group Widget.
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
 * Button_Group class.
 */
class Button_Group extends Base {
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
	 * Enqueue css files
	 */
	public function get_style_depends() {
		return array(
			'rbelad-button',
		);
	}
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
		require RBELAD_WIDGETS . '/button-group/content/general.php';
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
		require RBELAD_WIDGETS . '/button-group/style/general.php';
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
		require RBELAD_WIDGETS . '/button-group/render/design-1.php';
	}
}
