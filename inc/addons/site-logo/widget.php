<?php
namespace RB_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

class Site_Logo extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return [
			'site logo',
			'logo',
			'site',
			'site info',
			'site branding',
			'branding',
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
		require ( RB_ADDONS_WIDGET . "/site-logo/content/general.php" );
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
		require ( RB_ADDONS_WIDGET . "/site-logo/style/general.php" );
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
		require ( RB_ADDONS_WIDGET . "/site-logo/render/design-1.php" );
	}
}