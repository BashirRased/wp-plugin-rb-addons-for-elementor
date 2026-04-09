<?php
/**
 * Elementor & Admin assets.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * CSS & JS controller class.
 */
class Assets_Manager {

	/**
	 * Initialize hooks.
	 */
	public static function init() {
		// Frontend styles.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_frontend_styles' ) );

		// Elementor editor assets.
		add_action( 'elementor/editor/after_enqueue_scripts', array( __CLASS__, 'editor_scripts' ) );
	}

	/**
	 * Frontend styles.
	 */
	public static function enqueue_frontend_styles() {
		wp_enqueue_style(
			'rbelad-widget-icons',
			RBELAD_ASSETS . 'css/rbelad-widget-icons.css',
			array(),
			time()
		);
	}

	/**
	 * Elementor editor assets (CSS + JS).
	 */
	public static function editor_scripts() {
		// Editor CSS.
		wp_enqueue_style(
			'rbelad-editor',
			RBELAD_ASSETS . 'css/editor.css',
			array(),
			time()
		);

		// Editor JS.
		wp_enqueue_script(
			'rbelad-editor',
			RBELAD_ASSETS . 'js/editor.js',
			array( 'elementor-editor', 'jquery' ),
			time(),
			true
		);

		// Icons.
		wp_enqueue_style(
			'rbelad-widget-icons',
			RBELAD_ASSETS . 'css/rbelad-widget-icons.css',
			array(),
			time()
		);

		$localize_data = array(
			'placeholder_widgets' => array(),
			'hasPro'              => function_exists( 'rbelad_has_pro' ) && rbelad_has_pro(),
			'editor_nonce'        => wp_create_nonce( 'rbelad_editor_nonce' ),
			'i18n'                => array(

				/* translators: %s: Widget name */
				'promotionDialogHeader'  => esc_html__( '%s Widget', 'rb-addons-for-elementor' ),

				/* translators: %s: Widget name */
				'promotionDialogMessage' => esc_html__( 'Use %s widget with pro features. Upgrade to unlock.', 'rb-addons-for-elementor' ),

				'promotionDialogBtnTxt'  => esc_html__( 'Upgrade Now', 'rb-addons-for-elementor' ),
			),
		);

		// Add category titles and icons.
		$localize_data['pro_categories'] = array(
			'rbelad_pro_general' => array(
				'title' => esc_html__( 'RB Pro - General', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-lock',
			),
		);

		// ONLY when FREE version.
		if ( ! $localize_data['hasPro'] ) {
			$localize_data['placeholder_widgets'] = Widget_Manager::get_pro_widgets_map();
		}

		wp_localize_script(
			'rbelad-editor',
			'RBELAD_EDITOR',
			$localize_data
		);
	}
}

// Bootstrap.
Assets_Manager::init();
