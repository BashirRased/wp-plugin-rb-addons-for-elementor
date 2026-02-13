<?php
/**
 * Button Widget.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Widgets;

use RBELAD_Elementor_Addons\Traits\Background_Style;
use RBELAD_Elementor_Addons\Traits\Border_Style;
use RBELAD_Elementor_Addons\Traits\Link_Style;
use RBELAD_Elementor_Addons\Traits\Spacing_Style;
use RBELAD_Elementor_Addons\Traits\Text_Style;
use RBELAD_Elementor_Addons\Traits\Transition_Style;

defined( 'ABSPATH' ) || die();

/**
 * Button class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Button extends Base {
	/**
	* Use all trait.
	*/
	use Text_Style;
	use Spacing_Style;
	use Border_Style;
	use Transition_Style;
	use Link_Style;
	use Background_Style;

	/**
	 * Enqueue css files
	 */
	public function get_style_depends() {
		return array(
			'rbelad-button',
		);
	}

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
		global $settings; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		global $design_choose; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		global $link_type; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		global $btn_attr; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		$settings = $this->get_settings_for_display();
		$design   = $settings['rbelad_button_general_content_choose_design'] ?? 'style-1'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals
		$file     = RBELAD_WIDGETS . '/button/render/' . $design . '.php'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		/**
		 * --------------------------------------------------
		 * Button classes (design)
		 * --------------------------------------------------
		 */
		$design_choose = ! empty( $settings['rbelad_button_general_content_choose_design'] )
			? $settings['rbelad_button_general_content_choose_design']
			: 'style-1'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		$choose_design_class = 'rbelad-button-widget-' . $design_choose; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		$this->add_render_attribute(
			'rbelad_btn_attr',
			'class',
			'rbelad-button-widget-item'
		);
		$this->add_render_attribute(
			'rbelad_btn_attr',
			'class',
			$choose_design_class
		);

		/**
		 * --------------------------------------------------
		 * Button link handling
		 * --------------------------------------------------
		 */
		$link_type = $settings['rbelad_button_general_content_link_type'] ?? ''; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		if (
			'custom' === $link_type &&
			! empty( $settings['rbelad_button_general_content_custom_link']['url'] )
		) {
			$this->add_link_attributes(
				'rbelad_btn_attr',
				$settings['rbelad_button_general_content_custom_link']
			);
		} elseif ( 'page' === $link_type && ! empty( $settings['rbelad_button_general_content_page_link'] ) ) {
			$this->add_render_attribute( 'rbelad_btn_attr', 'href', esc_url( get_permalink( $settings['rbelad_button_general_content_page_link'] ) ) );
			$this->add_render_attribute( 'rbelad_btn_attr', 'target', '_self' );
			$this->add_render_attribute( 'rbelad_btn_attr', 'rel', 'nofollow' );
		}

		$btn_attr = $this->get_render_attribute_string( 'rbelad_btn_attr' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		if ( file_exists( $file ) ) {
			require $file;
		} else {
			require RBELAD_WIDGETS . '/button/render/style-1.php';
		}
	}
}
