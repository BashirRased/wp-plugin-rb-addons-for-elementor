<?php
/**
 * Card Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Widgets\Base;

defined( 'ABSPATH' ) || exit;

/**
 * General Card Widget
 */
class Card extends Base {
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
		$this->__before_img_style();
		$this->__before_icon_style();
		$this->__before_style();
		$this->__item_style();
		$this->__image_box_style();
		$this->__content_box_style();
		$this->__title_style();
		$this->__title_before_style();
		$this->__description_style();
		$this->__wrap_style();
		$this->__after_img_style();
		$this->__after_icon_style();
		$this->__after_style();
	}

	/**
	 * Style - Before Image
	 */
	protected function __before_img_style() {
		require RBELAD_WIDGET_PATH . 'card/style/before-img.php';
	}

	/**
	 * Style - Before Icon
	 */
	protected function __before_icon_style() {
		require RBELAD_WIDGET_PATH . 'card/style/before-icon.php';
	}

	/**
	 * Style - Before Wrap
	 */
	protected function __before_style() {
		require RBELAD_WIDGET_PATH . 'card/style/before.php';
	}

	/**
	 * Style - Item
	 */
	protected function __item_style() {
		require RBELAD_WIDGET_PATH . 'card/style/item.php';
	}

	/**
	 * Style - Image Box
	 */
	protected function __image_box_style() {
		require RBELAD_WIDGET_PATH . 'card/style/image-box.php';
	}

	/**
	 * Style - Content Box
	 */
	protected function __content_box_style() {
		require RBELAD_WIDGET_PATH . 'card/style/content-box.php';
	}

	/**
	 * Style - Title
	 */
	protected function __title_style() {
		require RBELAD_WIDGET_PATH . 'card/style/title.php';
	}

	/**
	 * Style - Title Before
	 */
	protected function __title_before_style() {
		require RBELAD_WIDGET_PATH . 'card/style/title-before.php';
	}

	/**
	 * Style - Description
	 */
	protected function __description_style() {
		require RBELAD_WIDGET_PATH . 'card/style/description.php';
	}

	/**
	 * Style - Wrap
	 */
	protected function __wrap_style() {
		require RBELAD_WIDGET_PATH . 'card/style/wrap.php';
	}

	/**
	 * Style - Before Image
	 */
	protected function __after_img_style() {
		require RBELAD_WIDGET_PATH . 'card/style/after-img.php';
	}

	/**
	 * Style - Before Icon
	 */
	protected function __after_icon_style() {
		require RBELAD_WIDGET_PATH . 'card/style/after-icon.php';
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
