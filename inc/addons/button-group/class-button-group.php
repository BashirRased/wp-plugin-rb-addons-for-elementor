<?php
/**
 * Button Group Widget.
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
 * Button_Group class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Button_Group extends Base {
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
			'button group',
			'grouped buttons',
			'multi button layout',
			'button cluster',
			'Elementor button group',
			'group buttons widget',
			'button group layout',
			'multiple buttons widget',
			'button group styling',
			'Elementor CTA buttons',
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
		require RBELAD_WIDGETS . '/button-group/content/general.php';
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
		require RBELAD_WIDGETS . '/button-group/style/general.php';
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
	 * Add repeater controls.
	 *
	 * @param string $prefix The prefix of the controls.
	 * @param array  $args The element selector, controls list and more.
	 */
	private function add_repeater_controls( string $prefix, array $args ) {
		require RBELAD_GLOBAL . '/repeater-style.php';
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		global $settings;
		global $design_choose;
		global $link_type;
		global $btn_attr;

		$settings = $this->get_settings_for_display();
		$design   = $settings['rbelad_button_group_general_content_choose_design'] ?? 'style-1';
		$file     = RBELAD_WIDGETS . '/button-group/render/' . $design . '.php';

		/**
		 * --------------------------------------------------
		 * Button classes (design)
		 * --------------------------------------------------
		 */
		$design_choose = ! empty( $settings['rbelad_button_group_general_content_choose_design'] )
			? $settings['rbelad_button_group_general_content_choose_design']
			: 'style-1';

		$choose_design_class = 'rbelad-button-widget-' . $design_choose;

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
		$link_type = $settings['rbelad_button_group_general_content_link_type'] ?? '';

		if (
			'custom' === $link_type &&
			! empty( $settings['rbelad_button_group_general_content_custom_link']['url'] )
		) {
			$this->add_link_attributes(
				'rbelad_btn_attr',
				$settings['rbelad_button_group_general_content_custom_link']
			);
		} elseif ( 'page' === $link_type && ! empty( $settings['rbelad_button_group_general_content_page_link'] ) ) {
			$this->add_render_attribute( 'rbelad_btn_attr', 'href', esc_url( get_permalink( $settings['rbelad_button_group_general_content_page_link'] ) ) );
			$this->add_render_attribute( 'rbelad_btn_attr', 'target', '_self' );
			$this->add_render_attribute( 'rbelad_btn_attr', 'rel', 'nofollow' );
		}

		$btn_attr = $this->get_render_attribute_string( 'rbelad_btn_attr' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

		if ( file_exists( $file ) ) {
			require $file;
		} else {
			require RBELAD_WIDGETS . '/button-group/render/style-1.php';
		}
	}
}
