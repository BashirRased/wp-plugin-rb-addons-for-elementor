<?php
/**
 * Video Widget.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

/**
 * Video class.
 */
class Video extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'video',
			'player',
			'embed',
			'youtube',
			'vimeo',
			'dailymotion',
			'videopress',
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
		$this->__setting_content();
	}

	/**
	 * Content - General
	 */
	protected function __general_content() {
		require RBELAD_WIDGETS . '/video/content/general.php';
	}

	/**
	 * Content - Settings
	 */
	protected function __setting_content() {
		require RBELAD_WIDGETS . '/video/content/settings.php';
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
		require RBELAD_WIDGETS . '/video/style/general.php';
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
		require RBELAD_WIDGETS . '/video/render/design-1.php';
	}
}
