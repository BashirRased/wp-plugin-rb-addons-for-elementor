<?php
namespace RB_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

class Contact_Info extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return [
			'contact info',
			'contact details',
			'contact us',
			'address',
			'phone',
			'email',
			'map',
			'social links',
			'contact widget',
			'info box',
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
		require ( RB_ADDONS_WIDGET . "/contact-info/content/general.php" );
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__icon_style();
		$this->__title_style();
		$this->__description_style();
		$this->__wrap_style();
	}

	/**
	 * Style - Icon
	 */
	protected function __icon_style() {
		require ( RB_ADDONS_WIDGET . "/contact-info/style/icon.php" );
	}

	/**
	 * Style - Title
	 */
	protected function __title_style() {
		require ( RB_ADDONS_WIDGET . "/contact-info/style/title.php" );
	}

	/**
	 * Style - Description
	 */
	protected function __description_style() {
		require ( RB_ADDONS_WIDGET . "/contact-info/style/description.php" );
	}

	/**
	 * Style - Wrap
	 */
	protected function __wrap_style() {
		require ( RB_ADDONS_WIDGET . "/contact-info/style/wrap.php" );
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
		require ( RB_ADDONS_WIDGET . "/contact-info/render/design-1.php" );
	}
}