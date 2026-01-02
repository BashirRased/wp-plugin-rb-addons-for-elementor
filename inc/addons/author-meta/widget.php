<?php
namespace RB_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

class Author_Meta extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
    	return [
			'author meta',
			'post author',
			'author info',
			'author name',
			'author', 
			'rb',
			'rb addons',
			'rb addons elementor',
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
		require ( RB_ADDONS_WIDGET . "/author-meta/content/general.php" );
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__general_style();
		$this->__icon_style();
		$this->__prefix_style();
	}

	/**
	 * Style - General
	 */
	protected function __general_style() {
		require ( RB_ADDONS_WIDGET . "/author-meta/style/general.php" );
	}

	/**
	 * Style - Icon
	 */
	protected function __icon_style() {
		require ( RB_ADDONS_WIDGET . "/author-meta/style/icon.php" );
	}

	/**
	 * Style - Prefix
	 */
	protected function __prefix_style() {
		require ( RB_ADDONS_WIDGET . "/author-meta/style/prefix.php" );
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
		require ( RB_ADDONS_WIDGET . "/author-meta/render/design-1.php" );		
	}
}