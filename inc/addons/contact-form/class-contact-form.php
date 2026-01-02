<?php
/**
 * Contact Form Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

/**
 * Contact_Form class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Contact_Form extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return array(
			'contact form',
			'contact form 7',
			'contact us',
			'form',
			'email form',
			'message form',
			'inquiry form',
			'support form',
			'feedback form',
			'get in touch',
			'contact widget',
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
		require RBELAD_WIDGETS . '/contact-form/content/general.php';
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
		$this->__input_textarea_style();
		$this->__input_icon_style();
		$this->__label_style();
		$this->__placeholder_style();
		$this->__submit_btn_style();
		$this->__error_style();
		$this->__after_submit_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		require RBELAD_WIDGETS . '/contact-form/style/general.php';
	}

	/**
	 * Style - Input & Textarea
	 */
	protected function __input_textarea_style() {
		require RBELAD_WIDGETS . '/contact-form/style/input-textarea.php';
	}

	/**
	 * Style - Input Icon
	 */
	protected function __input_icon_style() {
		require RBELAD_WIDGETS . '/contact-form/style/input-icon.php';
	}

	/**
	 * Style - Label
	 */
	protected function __label_style() {
		require RBELAD_WIDGETS . '/contact-form/style/label.php';
	}

	/**
	 * Style - Placeholder
	 */
	protected function __placeholder_style() {
		require RBELAD_WIDGETS . '/contact-form/style/placeholder.php';
	}

	/**
	 * Style - Submit Button
	 */
	protected function __submit_btn_style() {
		require RBELAD_WIDGETS . '/contact-form/style/submit-btn.php';
	}

	/**
	 * Style - Error
	 */
	protected function __error_style() {
		require RBELAD_WIDGETS . '/contact-form/style/error.php';
	}

	/**
	 * Style - After Submit Message
	 */
	protected function __after_submit_style() {
		require RBELAD_WIDGETS . '/contact-form/style/after-submit.php';
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
		require RBELAD_WIDGETS . '/contact-form/render/design-1.php';
	}
}
