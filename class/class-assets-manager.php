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
		add_action( 'elementor/editor/after_enqueue_scripts', array( __CLASS__, 'editor_assets' ) );
	}

	/**
	 * Frontend styles.
	 */
	public static function enqueue_frontend_styles() {
		wp_enqueue_style(
			'rbelad-general-icons',
			RBELAD_CSS . 'rbelad-general-icons.css',
			array(),
			RBELAD_DEV_VERSION
		);
	}

	/**
	 * Elementor editor assets (CSS + JS).
	 */
	public static function editor_assets() {

		// =========================
		// Styles
		// =========================
		wp_enqueue_style(
			'rbelad-general-icons',
			RBELAD_CSS . 'rbelad-general-icons.css',
			array(),
			RBELAD_DEV_VERSION
		);

		wp_enqueue_style(
			'rbelad-editor',
			RBELAD_CSS . 'editor.css',
			array(),
			RBELAD_DEV_VERSION
		);

		// =========================
		// Scripts
		// =========================
		wp_enqueue_script(
			'rbelad-editor',
			RBELAD_JS . 'editor.js',
			array( 'elementor-editor', 'jquery', 'underscore' ), // fixed dependency.
			RBELAD_DEV_VERSION,
			true
		);

		// =========================
		// Localize Data (SAFE)
		// =========================
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
			'pro_categories'      => array(
				'rbelad_pro_general' => array(
					'title' => esc_html__( 'RB Pro - General', 'rb-addons-for-elementor' ),
					'icon'  => 'eicon-lock',
				),
			),
		);

		// =========================
		// Safe Widget Data Load
		// =========================
		if ( ! $localize_data['hasPro'] ) {

			try {

				if ( class_exists( __NAMESPACE__ . '\\Widget_Manager' ) ) {

					$data = Widget_Manager::get_pro_widgets_map();

					// Ensure valid array.
					if ( is_array( $data ) ) {
						$localize_data['placeholder_widgets'] = $data;
					} else {
						$localize_data['placeholder_widgets'] = array();
					}
				}
			} catch ( \Throwable $e ) {

				// Prevent fatal crash in editor.
				$localize_data['placeholder_widgets'] = array();

				// Log only in debug mode.
				if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
					// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
					error_log( 'RBELAD Widgets Error: ' . $e->getMessage() );
				}
			}
		}

		// =========================
		// Pass to JS
		// =========================
		wp_localize_script(
			'rbelad-editor',
			'RBELAD_EDITOR',
			$localize_data
		);
	}
}

// Bootstrap.
Assets_Manager::init();
