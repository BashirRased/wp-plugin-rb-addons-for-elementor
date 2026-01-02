<?php
/**
 * Post Thumbnail Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

/**
 * Post_Thumbnail class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Post_Thumbnail extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'post thumbnail',
			'featured image',
			'post image',
			'dynamic image',
			'Elementor post thumbnail',
			'Elementor featured image',
			'dynamic featured image',
			'post thumbnail widget',
			'post featured image widget',
			'single post image',
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
		require RBELAD_WIDGETS . '/post-thumbnail/content/general.php';
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
		require RBELAD_WIDGETS . '/post-thumbnail/style/general.php';
	}

	/**
	 * Style - Caption
	 */
	protected function __caption_style() {
		require RBELAD_WIDGETS . '/post-thumbnail/style/caption.php';
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
		require RBELAD_WIDGETS . '/post-thumbnail/render/design-1.php';
	}
}
