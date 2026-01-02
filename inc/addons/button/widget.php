<?php
namespace RB_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

class Button extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return [
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
		require ( RB_ADDONS_WIDGET . "/button/content/general.php" );
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
		$this->__btn_before_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		require ( RB_ADDONS_WIDGET . "/button/style/general.php" );
	}

	/**
	 * Style - Button Before
	 */
	protected function __btn_before_style() {
		require ( RB_ADDONS_WIDGET . "/button/style/btn-before.php" );
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
	 * Register render display control
	 */
	protected function render() {
		require ( RB_ADDONS_WIDGET . "/button/render/design-1.php" );
	}
}