<?php
/**
 * Archive Description Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\Text_Style;
use RBELAD_Elementor_Addons\Traits\Color_Style;
use RBELAD_Elementor_Addons\Traits\Text_Alignment_Style;

defined( 'ABSPATH' ) || die();

/**
 * Archive_Description class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Archive_Description extends Base {
	/**
	 * Use all trait.
	 */
	use Text_Style;
	use Color_Style;
	use Text_Alignment_Style;

	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'archive description',
			'description',
			'archive',
			'archive info',
			'archive details',
			'archive category',
			'tag description',
			'tag info',
			'tag details',
			'tag line',
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
		require RBELAD_WIDGETS . '/archive-description/content/general.php';
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
		require RBELAD_WIDGETS . '/archive-description/style/general.php';
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
		require RBELAD_WIDGETS . '/archive-description/render/design-1.php';
	}
}
