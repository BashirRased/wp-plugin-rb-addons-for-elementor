<?php
/**
 * Resume List Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

/**
 * Resume_List class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Resume_List extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'resume list',
			'resume',
			'cv',
			'experience',
			'work history',
			'timeline',
			'job list',
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
		require RBELAD_WIDGETS . '/resume-list/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__label_style();
		$this->__title_style();
		$this->__subtitle_style();
		$this->__description_style();
	}

	/**
	 * Style - Label
	 */
	protected function __label_style() {
		require RBELAD_WIDGETS . '/resume-list/style/label.php';
	}

	/**
	 * Style - Title
	 */
	protected function __title_style() {
		require RBELAD_WIDGETS . '/resume-list/style/title.php';
	}

	/**
	 * Style - Subtitle
	 */
	protected function __subtitle_style() {
		require RBELAD_WIDGETS . '/resume-list/style/subtitle.php';
	}

	/**
	 * Style - Description
	 */
	protected function __description_style() {
		require RBELAD_WIDGETS . '/resume-list/style/description.php';
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
		require RBELAD_WIDGETS . '/resume-list/render/design-1.php';
	}
}
