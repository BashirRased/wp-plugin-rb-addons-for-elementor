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
		$this->__image_overlay_content();
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
	 * Content - Image Overlay
	 */
	protected function __image_overlay_content() {
		require RBELAD_WIDGETS . '/video/content/image-overlay.php';
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
	 * Register render display control
	 */
	protected function render() {
		require RBELAD_WIDGETS . '/video/render/design-1.php';
	}
}
