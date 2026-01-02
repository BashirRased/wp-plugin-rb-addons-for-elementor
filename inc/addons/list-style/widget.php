<?php
namespace RB_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

class List_Style extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return [
			'list style',
			'list widget',
			'icon list',
			'bullet list',
			'styled list',
			'feature list',
			'read more list',
			'interactive list',
			'Elementor list',
			'list layout widget',
			'list styling',		
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
		require ( RB_ADDONS_WIDGET . "/list-style/content/general.php" );
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__icon_style();
		$this->__label_style();
		$this->__separator_style();
		$this->__info_style();
		$this->__item_style();
		$this->__wrapper_style();
	}

	/**
	 * Style - Icon
	 */
	protected function __icon_style() {
		require ( RB_ADDONS_WIDGET . "/list-style/style/icon.php" );
	}

	/**
	 * Style - Label
	 */
	protected function __label_style() {
		require ( RB_ADDONS_WIDGET . "/list-style/style/label.php" );
	}

	/**
	 * Style - Separator
	 */
	protected function __separator_style() {
		require ( RB_ADDONS_WIDGET . "/list-style/style/separator.php" );
	}

	/**
	 * Style - Info
	 */
	protected function __info_style() {
		require ( RB_ADDONS_WIDGET . "/list-style/style/info.php" );
	}

	/**
	 * Style - Item
	 */
	protected function __item_style() {
		require ( RB_ADDONS_WIDGET . "/list-style/style/item.php" );
	}

	/**
	 * Style - Wrapper
	 */
	protected function __wrapper_style() {
		require ( RB_ADDONS_WIDGET . "/list-style/style/wrapper.php" );
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
		require ( RB_ADDONS_WIDGET . "/list-style/render/design-1.php" );		
	}
}