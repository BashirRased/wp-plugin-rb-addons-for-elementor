<?php
/**
 * Section Header Widget.
 *
 * @package RB_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

/**
 * Section_Header class.
 *
 * @package RB_Elementor_Addons
 */
class Section_Header extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'section header',
			'section title',
			'section heading',
			'Elementor section header',
			'Elementor section title',
			'custom section header',
			'section heading widget',
			'section title styling',
			'section title layout',
			'section heading element',
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
		$this->__subtitle_content();
		$this->__title_content();
		$this->__title_before_content();
		$this->__title_after_content();
		$this->__description_content();
	}

	/**
	 * Content - Subtitle
	 */
	protected function __subtitle_content() {
		require RBELAD_WIDGETS . '/section-header/content/subtitle.php';
	}

	/**
	 * Content - Title
	 */
	protected function __title_content() {
		require RBELAD_WIDGETS . '/section-header/content/title.php';
	}

	/**
	 * Content - Title Before
	 */
	protected function __title_before_content() {
		require RBELAD_WIDGETS . '/section-header/content/title-before.php';
	}

	/**
	 * Content - Title After
	 */
	protected function __title_after_content() {
		require RBELAD_WIDGETS . '/section-header/content/title-after.php';
	}

	/**
	 * Content - Description
	 */
	protected function __description_content() {
		require RBELAD_WIDGETS . '/section-header/content/description.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__subtitle_style();
		$this->__title_style();
		$this->__title_before_style();
		$this->__title_after_style();
		$this->__description_style();
		$this->__wrapper_style();
	}

	/**
	 * Style - Subtitle
	 */
	protected function __subtitle_style() {
		require RBELAD_WIDGETS . '/section-header/style/subtitle.php';
	}

	/**
	 * Style - Title
	 */
	protected function __title_style() {
		require RBELAD_WIDGETS . '/section-header/style/title.php';
	}

	/**
	 * Style - Title Before
	 */
	protected function __title_before_style() {
		require RBELAD_WIDGETS . '/section-header/style/title-before.php';
	}

	/**
	 * Style - Title After
	 */
	protected function __title_after_style() {
		require RBELAD_WIDGETS . '/section-header/style/title-after.php';
	}

	/**
	 * Style - Description
	 */
	protected function __description_style() {
		require RBELAD_WIDGETS . '/section-header/style/description.php';
	}

	/**
	 * Style - Wrapper
	 */
	protected function __wrapper_style() {
		require RBELAD_WIDGETS . '/section-header/style/wrapper.php';
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
		require RBELAD_WIDGETS . '/section-header/render/design-1.php';
	}
}
