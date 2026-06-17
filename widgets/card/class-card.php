<?php
/**
 * Card Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\RBELAD_Border_Style_Trait;
use RBELAD_Elementor_Addons\Traits\RBELAD_Color_Style_Trait;
use RBELAD_Elementor_Addons\Traits\RBELAD_Custom_Typography_Trait;
use RBELAD_Elementor_Addons\Traits\RBELAD_Flex_Style_Trait;
use RBELAD_Elementor_Addons\Traits\RBELAD_Position_Trait;
use RBELAD_Elementor_Addons\Traits\RBELAD_Select_Link_Type_Trait;
use RBELAD_Elementor_Addons\Traits\RBELAD_Spacing_Style_Trait;
use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || exit;

/**
 * General Card Widget
 */
class Card extends Base {
	/**
	 * Use Trait Contents
	 */
	use RBELAD_Select_Link_Type_Trait;
	use RBELAD_Color_Style_Trait;
	use RBELAD_Border_Style_Trait;
	use RBELAD_Spacing_Style_Trait;
	use RBELAD_Custom_Typography_Trait;
	use RBELAD_Position_Trait;
	use RBELAD_Flex_Style_Trait;

	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'card',
			'icon box',
			'info box',
			'image box',
			'rb',
		);
	}

	/**
	 * Register widget style
	 */
	public function get_style_depends() {
		return array( 'rbelad-default' );
	}

	/**
	 * Register controls
	 */
	protected function register_controls() {
		$this->register_content_tab();
		$this->register_style_tab();
	}

	/**
	 * Widget content tab
	 */
	protected function register_content_tab() {
		$this->__title_content();
		$this->__image_content();
		$this->__description_content();
		$this->__before_content();
		$this->__after_content();
	}

	/**
	 * Content - Before Content
	 */
	protected function __before_content() {
		require RBELAD_WIDGET_PATH . 'card/content/wrap-before.php';
	}

	/**
	 * Content - Image
	 */
	protected function __image_content() {
		require RBELAD_WIDGET_PATH . 'card/content/image.php';
	}

	/**
	 * Content - Title
	 */
	protected function __title_content() {
		require RBELAD_WIDGET_PATH . 'card/content/title.php';
	}

	/**
	 * Content - Content Box
	 */
	protected function __description_content() {
		require RBELAD_WIDGET_PATH . 'card/content/description.php';
	}

	/**
	 * Content - After Content
	 */
	protected function __after_content() {
		require RBELAD_WIDGET_PATH . 'card/content/wrap-after.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__before_style();
		$this->__title_style();
		$this->__description_style();
		$this->__wrap_style();
		$this->__image_box_style();
		$this->__after_style();
	}

	/**
	 * Style - Before Wrap
	 */
	protected function __before_style() {
		require RBELAD_WIDGET_PATH . 'card/style/before.php';
	}

	/**
	 * Style - Wrap
	 */
	protected function __wrap_style() {
		require RBELAD_WIDGET_PATH . 'card/style/wrap.php';
	}

	/**
	 * Style - Wrap
	 */
	protected function __title_style() {
		require RBELAD_WIDGET_PATH . 'card/style/title.php';
	}

	/**
	 * Style - Wrap
	 */
	protected function __description_style() {
		require RBELAD_WIDGET_PATH . 'card/style/description.php';
	}

	/**
	 * Style - Image Box
	 */
	protected function __image_box_style() {
		require RBELAD_WIDGET_PATH . 'card/style/image-box.php';
	}

	/**
	 * Style - After
	 */
	protected function __after_style() {
		require RBELAD_WIDGET_PATH . 'card/style/after.php';
	}

	/**
	 * Render output
	 */
	protected function render() {
		require RBELAD_WIDGET_PATH . 'card/render/design-1.php';
	}
}
