<?php
/**
 * Button Widget.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\RBELAD_Select_Link_Type_Trait;

defined( 'ABSPATH' ) || die();

/**
 * Button class.
 */
class Button extends Base {
	/**
	 * Use Trait Styles
	 */
	use RBELAD_Select_Link_Type_Trait;

	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'button',
			'link button',
			'icon button',
			'hover button',
			'full width button',
			'Elementor button',
			'styled button',
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
		require RBELAD_WIDGETS . '/button/content/general.php';
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
		require RBELAD_WIDGETS . '/button/style/general.php';
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		require RBELAD_WIDGETS . '/button/render/design-1.php';
	}
}
