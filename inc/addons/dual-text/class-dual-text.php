<?php
/**
 * Dual Text Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\Display_Style;
use RBELAD_Elementor_Addons\Traits\Text_Style;
use RBELAD_Elementor_Addons\Traits\Link_Style;
use RBELAD_Elementor_Addons\Traits\Background_Style;
use RBELAD_Elementor_Addons\Traits\Border_Style;
use RBELAD_Elementor_Addons\Traits\Spacing_Style;
use RBELAD_Elementor_Addons\Traits\Transform_Style;
use RBELAD_Elementor_Addons\Traits\Transition_Style;
use RBELAD_Elementor_Addons\Traits\Text_Alignment_Style;

defined( 'ABSPATH' ) || die();

/**
 * Dual_Text class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Dual_Text extends Base {
	/**
	 * Use all trait.
	 */
	use Display_Style;
	use Text_Style;
	use Link_Style;
	use Background_Style;
	use Border_Style;
	use Spacing_Style;
	use Transform_Style;
	use Transition_Style;
	use Text_Alignment_Style;

	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'dual text',
			'dual heading widget',
			'dual color heading',
			'split text heading',
			'two-tone text widget',
			'Elementor dual heading',
			'Elementor text styling widget',
			'custom dual text Elementor',
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
		require RBELAD_WIDGETS . '/dual-text/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__title_style();
		$this->__text_highlight_style();
	}

	/**
	 * Style - Title
	 */
	protected function __title_style() {
		require RBELAD_WIDGETS . '/dual-text/style/title.php';
	}

	/**
	 * Style - Text Highlight
	 */
	protected function __text_highlight_style() {
		require RBELAD_WIDGETS . '/dual-text/style/text-highlight.php';
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
		require RBELAD_WIDGETS . '/dual-text/render/design-1.php';
	}
}
