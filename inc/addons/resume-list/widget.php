<?php
namespace RB_Elementor_Addons\Widgets;

defined( 'ABSPATH' ) || die();

class Resume_List extends Base {
	/**
	 * Register widget search keywords
	 */
	public function get_keywords() {
		return [ 
			'resume list', 
			'resume', 
			'cv', 
			'experience', 
			'work history', 
			'timeline', 
			'job list', 
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
		require ( RB_ADDONS_WIDGET . "/resume-list/content/general.php" );
	}

	/**
	 * Widget style tab
	 */
	protected function register_style_tab() {
		$this->__label_style();
		$this->__title_style();
		$this->__subtitle_style();
		$this->__description_style();
	}

	/**
	 * Style - Label
	 */
	protected function __label_style() {
		require ( RB_ADDONS_WIDGET . "/resume-list/style/label.php" );
	}

	/**
	 * Style - Title
	 */
	protected function __title_style() {
		require ( RB_ADDONS_WIDGET . "/resume-list/style/title.php" );
	}

	/**
	 * Style - Subtitle
	 */
	protected function __subtitle_style() {
		require ( RB_ADDONS_WIDGET . "/resume-list/style/subtitle.php" );
	}

	/**
	 * Style - Description
	 */
	protected function __description_style() {
		require ( RB_ADDONS_WIDGET . "/resume-list/style/description.php" );
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
		require ( RB_ADDONS_WIDGET . "/resume-list/render/design-1.php" );
	}
}