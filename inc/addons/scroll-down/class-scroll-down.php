<?php
/**
 * Scroll Down Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

/**
 * Scroll_Down class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Scroll_Down extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'scroll down',
			'scroll indicator',
			'scroll icon',
			'mouse scroll',
			'scroll cue',
			'scroll animation',
			'scroll hint',
			'page scroll',
			'scroll widget',
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
		require RBELAD_WIDGETS . '/scroll-down/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
		$this->__dropdown_ball_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		require RBELAD_WIDGETS . '/scroll-down/style/general.php';
	}

	/**
	 * Style - Dropdown Ball
	 */
	protected function __dropdown_ball_style() {
		require RBELAD_WIDGETS . '/scroll-down/style/dropdown-ball.php';
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
		require RBELAD_WIDGETS . '/scroll-down/render/design-1.php';
	}
}
