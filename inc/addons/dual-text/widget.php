<?php
namespace RB_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

class Dual_Text extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return [
			'dual text',
			'dual heading widget',
			'dual color heading',
			'split text heading',
			'two-tone text widget',
			'Elementor dual heading',
			'Elementor text styling widget',
			'custom dual text Elementor',
			'rb',
			'rb addons',
			'rb elementor addons',
		];
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
		require ( RB_ADDONS_WIDGET . "/dual-text/content/general.php" );
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__title_style();
		$this->__text_highlight_style();
	}

	/**
	 * Style - Title
	 */
	protected function __title_style() {
		require ( RB_ADDONS_WIDGET . "/dual-text/style/title.php" );
	}

	/**
	 * Style - Text Highlight
	 */
	protected function __text_highlight_style() {
		require ( RB_ADDONS_WIDGET . "/dual-text/style/text-highlight.php" );
	}

	/**
	 * Add style controls.
	 *
	 * @param string $prefix The prefix of the controls.
	 * @param array $args The element selector, controls list and more.
	 */
	private function add_style_controls( string $prefix, array $args ) {
		$controls = ! empty( $args['controls'] ) ? $args['controls'] : [];
		if ( ! empty( $controls ) && is_array( $controls ) ) {
			foreach ( $controls as $key => $values ) {
				require ( RB_ADDONS_GLOBAL . "/all-style.php" );
			}
		}
	}

	/**
	 * Add repeater controls.
	 *
	 * @param string $prefix The prefix of the controls.
	 * @param array $args The element selector, controls list and more.
	 */
	private function add_repeater_controls( string $prefix, array $args ) {
		require ( RB_ADDONS_GLOBAL . "/repeater-style.php" );
	}

	/**
	 * Register render display control
	 */
	protected function render() {
		require ( RB_ADDONS_WIDGET . "/dual-text/render/design-1.php" );		
	}
}