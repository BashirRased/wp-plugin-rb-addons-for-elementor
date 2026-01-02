<?php
/**
 * Comment Meta Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

/**
 * Comment_Meta class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Comment_Meta extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'comment meta',
			'comments',
			'comment',
			'comments info',
			'comment count',
			'comment number',
			'comment text',
			'comment date',
			'blog comments',
			'article comments',
			'post comments',
			'post meta',
			'meta',
			'rb',
			'rb addons',
			'rb addons elementor',
			'rb elementor',
			'rb widgets',
			'elementor addons',
			'elementor comments',
			'elementor meta',
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
		require RBELAD_WIDGETS . '/comment-meta/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
		$this->__icon_style();
		$this->__prefix_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		require RBELAD_WIDGETS . '/comment-meta/style/general.php';
	}

	/**
	 * Style - Icon
	 */
	protected function __icon_style() {
		require RBELAD_WIDGETS . '/comment-meta/style/icon.php';
	}

	/**
	 * Style - Prefix
	 */
	protected function __prefix_style() {
		require RBELAD_WIDGETS . '/comment-meta/style/prefix.php';
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
		require RBELAD_WIDGETS . '/comment-meta/render/design-1.php';
	}
}
