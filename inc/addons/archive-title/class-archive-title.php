<?php
/**
 * Archive Title Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\Heading_Tag_Content;
use RBELAD_Elementor_Addons\Traits\Link_Style;
use RBELAD_Elementor_Addons\Traits\Link_Type_Content;
use RBELAD_Elementor_Addons\Traits\Link_Type_Render;
use RBELAD_Elementor_Addons\Traits\Text_Alignment_Style;
use RBELAD_Elementor_Addons\Traits\Text_Style;

defined( 'ABSPATH' ) || die();

/**
 * Archive_Title class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Archive_Title extends Base {
	/**
	 * Use all trait.
	 */
	use Link_Type_Content;
	use Heading_Tag_Content;
	use Text_Style;
	use Link_Style;
	use Text_Alignment_Style;
	use Link_Type_Render;

	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'archive title',
			'title archive',
			'archive heading',
			'dynamic archive title',
			'Elementor archive title',
			'theme builder archive title',
			'archive page title',
			'category title widget',
			'taxonomy title widget',
			'WooCommerce archive title',
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
		require RBELAD_WIDGETS . '/archive-title/content/general.php';
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
		require RBELAD_WIDGETS . '/archive-title/style/general.php';
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
		require RBELAD_WIDGETS . '/archive-title/render/design-1.php';
	}
}
