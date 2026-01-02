<?php
/**
 * Elementor plugin main class.
 *
 * @package RB_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

use RBELAD_Elementor_Addons\Page_Settings;
use RBELAD_Elementor_Addons\Widget_Manager;
use RBELAD_Elementor_Addons\Assets_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * Main Plugin Class.
 *
 * Ensures only one instance of the plugin is loaded.
 *
 * @package RB_Elementor_Addons
 */
class Plugin {

	/**
	 * Main plugin instance.
	 *
	 * @var self|null
	 */
	private static $instance = null;

	/**
	 * Get the singleton instance of the plugin.
	 *
	 * @return self
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->init();
		}
		return self::$instance;
	}

	/**
	 * Initialize the plugin.
	 *
	 * Hooks into WordPress and Elementor actions to register
	 * assets, widgets, categories, and page settings controls.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'init', array( $this, 'include_files' ) );

		// Elementor hooks.
		add_action( 'elementor/editor/after_enqueue_scripts', array( Assets_Manager::class, 'elementor_editor_assets' ) );
		add_action( 'elementor/widgets/register', array( Widget_Manager::class, 'register_widgets' ) );
		add_action( 'elementor/elements/categories_registered', array( Widget_Manager::class, 'register_categories' ) );

		// Page settings.
		$this->add_page_settings_controls();

		/**
		 * Fires after RB Addons for Elementor has fully loaded.
		 */
		do_action( 'rbelad_addons_loaded' );
	}

	/**
	 * Include core plugin class files.
	 *
	 * @return void
	 */
	public function include_files() {
		include_once RBELAD_CLASS . 'class-base.php';
		include_once RBELAD_CLASS . 'class-widget-manager.php';
		include_once RBELAD_CLASS . 'class-assets-manager.php';
	}

	/**
	 * Add custom page settings controls in Elementor editor.
	 *
	 * @return void
	 */
	private function add_page_settings_controls() {
		require_once RBELAD_CLASS . 'class-page-settings.php';
		new Page_Settings();
	}
}

Plugin::instance();
