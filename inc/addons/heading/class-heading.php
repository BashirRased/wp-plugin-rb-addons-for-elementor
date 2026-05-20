<?php
/**
 * Heading Widget.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\RBELAD_Custom_Typography_Trait;
use RBELAD_Elementor_Addons\Traits\RBELAD_Select_Link_Type_Trait;

defined( 'ABSPATH' ) || die();

/**
 * Heading class.
 */
class Heading extends Base {
	/**
	 * Use Trait Styles
	 */
	use RBELAD_Custom_Typography_Trait;
	use RBELAD_Select_Link_Type_Trait;

	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'heading',
			'Heading',
			'dual heading widget',
			'dual color heading',
			'split text heading',
			'two-tone text widget',
			'Elementor dual heading',
			'Elementor text styling widget',
			'custom Heading Elementor',
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
		require RBELAD_WIDGETS . '/heading/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
	}

	/**
	 * Style - Title
	 */
	protected function __general_style() {
		require RBELAD_WIDGETS . '/heading/style/general.php';
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		require RBELAD_WIDGETS . '/heading/render/design-1.php';
	}

	/**
	 * =========================
	 * LIVE PREVIEW (JS)
	 * =========================
	 */
	protected function content_template() {
		require RBELAD_WIDGETS . '/heading/template/design-1.php';
	}
}
