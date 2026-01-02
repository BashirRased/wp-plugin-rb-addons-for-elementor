<?php
namespace RB_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

class Service_List extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return [
			'service list',
			'services',
			'features',
			'offerings',
			'service items',
			'service section',
			'service block',
			'what we do',
			'our services',
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
		require ( RB_ADDONS_WIDGET . "/service-list/content/general.php" );
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__icon_style();
		$this->__title_style();
		$this->__description_style();
		$this->__hover_box_style();
		$this->__hover_icon_style();
		$this->__service_wrap_style();
	}

	/**
	 * Style - Icon
	 */
	protected function __icon_style() {
		require ( RB_ADDONS_WIDGET . "/service-list/style/icon.php" );
	}

	/**
	 * Style - Title
	 */
	protected function __title_style() {
		require ( RB_ADDONS_WIDGET . "/service-list/style/title.php" );
	}

	/**
	 * Style - Description
	 */
	protected function __description_style() {
		require ( RB_ADDONS_WIDGET . "/service-list/style/description.php" );
	}

	/**
	 * Style - Hover Box
	 */
	protected function __hover_box_style() {
		require ( RB_ADDONS_WIDGET . "/service-list/style/hover-box.php" );
	}

	/**
	 * Style - Hover Icon
	 */
	protected function __hover_icon_style() {
		require ( RB_ADDONS_WIDGET . "/service-list/style/hover-icon.php" );
	}

	/**
	 * Style - Wrap
	 */
	protected function __service_wrap_style() {
		require ( RB_ADDONS_WIDGET . "/service-list/style/service-wrap.php" );
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
		require ( RB_ADDONS_WIDGET . "/service-list/render/design-1.php" );
	}
}