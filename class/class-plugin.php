<?php
/**
 * Elementor plugin class.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

use RBELAD_Elementor_Addons\Page_Settings;
use RBELAD_Elementor_Addons\Widget_Manager;
use RBELAD_Elementor_Addons\Assets_Manager;
use RBELAD_Elementor_Addons\Dashboard;

defined( 'ABSPATH' ) || exit;

/**
 * Plugin Class.
 *
 * @package RBELAD_Elementor_Addons
 */
class Plugin {
	/**
	 * Main plugin instance.
	 *
	 * Ensures only one instance of the plugin is loaded.
	 *
	 * @var self|null
	 */
	private static $instance = null;

	/**
	 * Get the singleton instance of the plugin.
	 *
	 * If no instance exists, creates one and initializes it.
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
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		add_action(
			'init',
			array(
				$this,
				'include_files',
			)
		);
		// Elementor Editor Icons.
		add_action(
			'elementor/editor/after_enqueue_scripts',
			function () {
				wp_enqueue_style(
					'rbelad-icons',
					RBELAD_ASSETS . 'css/rbelad-fonts.css',
					array(),
					RBELAD_VERSION
				);
			}
		);

		// Admin Dashboard Icons.
		add_action(
			'admin_enqueue_scripts',
			function () {
				wp_enqueue_style(
					'rbelad-icons',
					RBELAD_ASSETS . 'css/rbelad-fonts.css',
					array(),
					RBELAD_VERSION
				);
			}
		);
		add_action(
			'elementor/editor/after_enqueue_scripts',
			array(
				Assets_Manager::class,
				'elementor_editor_assets',
			)
		);
		add_action(
			'elementor/widgets/register',
			array(
				Widget_Manager::class,
				'register_widgets',
			)
		);
		add_action(
			'elementor/elements/categories_registered',
			array(
				Widget_Manager::class,
				'register_categories',
			)
		);
		$this->add_page_settings_controls();
		do_action( 'rbelad_addons_loaded' );
	}

	/**
	 * Load the plugin textdomain for translation.
	 *
	 * This checks the global WordPress languages directory for a matching
	 * translation file based on the current locale, and loads it.
	 *
	 * @return void
	 */
	public function load_textdomain() {
		load_plugin_textdomain(
			'rb-elementor-addons',
			false,
			dirname( plugin_basename( RBELAD_PLUGIN_FILE ) ) . '/languages'
		);
	}

	/**
	 * Include core plugin class files.
	 *
	 * Loads the base class, widget manager, assets manager,
	 * traits, and any other required files.
	 *
	 * @return void
	 */
	public function include_files() {
		// Core classes.
		include_once RBELAD_CLASS . 'class-widget-manager.php';
		include_once RBELAD_CLASS . 'class-base.php';
		include_once RBELAD_CLASS . 'class-assets-manager.php';
		include_once RBELAD_CLASS . 'class-utilities.php';
		include_once RBELAD_CLASS . 'class-icons-manager.php';

		// Trait - contents.
		$trait_content = RBELAD_TRAIT_CONTENT;
		if ( file_exists( $trait_content . 'link-type-trait.php' ) ) {
			require_once $trait_content . 'link-type-trait.php';
		}
		if ( file_exists( $trait_content . 'heading-tag-trait.php' ) ) {
			require_once $trait_content . 'heading-tag-trait.php';
		}

		// Trait - styles.
		$trait_style = RBELAD_TRAIT_STYLE;
		if ( file_exists( $trait_style . 'display-trait.php' ) ) {
			require_once $trait_style . 'display-trait.php';
		}
		if ( file_exists( $trait_style . 'text-trait.php' ) ) {
			require_once $trait_style . 'text-trait.php';
		}
		if ( file_exists( $trait_style . 'color-trait.php' ) ) {
			require_once $trait_style . 'color-trait.php';
		}
		if ( file_exists( $trait_style . 'link-trait.php' ) ) {
			require_once $trait_style . 'link-trait.php';
		}
		if ( file_exists( $trait_style . 'bg-trait.php' ) ) {
			require_once $trait_style . 'bg-trait.php';
		}
		if ( file_exists( $trait_style . 'border-trait.php' ) ) {
			require_once $trait_style . 'border-trait.php';
		}
		if ( file_exists( $trait_style . 'spacing-trait.php' ) ) {
			require_once $trait_style . 'spacing-trait.php';
		}
		if ( file_exists( $trait_style . 'transform-trait.php' ) ) {
			require_once $trait_style . 'transform-trait.php';
		}
		if ( file_exists( $trait_style . 'transition-trait.php' ) ) {
			require_once $trait_style . 'transition-trait.php';
		}
		if ( file_exists( $trait_style . 'text-alignment-trait.php' ) ) {
			require_once $trait_style . 'text-alignment-trait.php';
		}
		if ( file_exists( $trait_style . 'item-alignment-trait.php' ) ) {
			require_once $trait_style . 'item-alignment-trait.php';
		}

		// Trait - renders.
		$trait_render = RBELAD_TRAIT_RENDER;
		if ( file_exists( $trait_render . 'link-type-trait.php' ) ) {
			require_once $trait_render . 'link-type-trait.php';
		}

		// Admin Dashboard.
		if ( is_admin() ) {
			add_filter(
				'admin_body_class',
				array( Dashboard::class, 'admin_body_class' )
			);
		}
	}

	/**
	 * Add custom page settings controls in Elementor editor.
	 *
	 * Loads the Page_Settings class and registers it with Elementor.
	 *
	 * @return void
	 */
	private function add_page_settings_controls() {
		require_once RBELAD_CLASS . 'class-page-settings.php';
		new Page_Settings();
	}
}

// Bootstrap the plugin.
Plugin::instance();
