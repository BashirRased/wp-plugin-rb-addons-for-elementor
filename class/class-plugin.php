<?php
/**
 * Elementor plugin class.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

use RBELAD_Elementor_Addons\Page_Settings;
use RBELAD_Elementor_Addons\Widget_Manager;
use RBELAD_Elementor_Addons\Assets_Manager;
use RBELAD_Elementor_Addons\Dashboard;
use RBELAD_Elementor_Addons\Review;

defined( 'ABSPATH' ) || exit;

/**
 * Plugin Class.
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
	 * Instance
	 *
	 * @access public
	 *
	 * @var Client The instance of the class.
	 */
	public $appsero = null;

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
		add_action( 'init', array( $this, 'include_files' ) );

		// Register Widgets.
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

		$this->appsero_tracking_init();

		do_action( 'rbelad_addons_loaded' );
	}

	/**
	 * Initialize the appsero tracker
	 *
	 * @return void
	 */
	protected function appsero_tracking_init() {
		if ( ! class_exists( 'Appsero\Client' ) ) {
			include_once RBELAD_PLUGIN_DIR . 'appsero/class-client.php';
		}

		$this->appsero = new \Appsero\Client(
			'9dfbe8bb-826d-4693-97d0-de5b650e0d4b',
			'RB Addons for Elementor',
			RBELAD_PLUGIN_FILE
		);

		$this->appsero->set_textdomain( 'rb-addons-for-elementor' );

		// Active insights.
		$this->appsero->insights()
			->add_plugin_data()
			->init();
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
		load_textdomain(
			'rb-addons-for-elementor',
			WP_LANG_DIR . '/plugins/rb-addons-for-elementor-' . determine_locale() . '.mo'
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
		include_once RBELAD_CLASS . 'class-icons-manager.php';
		include_once RBELAD_CLASS . 'class-dashboard.php';
		include_once RBELAD_CLASS . 'class-review.php';

		// Hook AFTER include.
		add_action( 'admin_init', array( Review::class, 'rbelad_check_installation_time' ) );
		add_action( 'admin_init', array( Review::class, 'rbelad_handle_actions' ) );

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
		if ( file_exists( $trait_style . 'top-trait.php' ) ) {
			require_once $trait_style . 'top-trait.php';
		}
		if ( file_exists( $trait_style . 'gap-trait.php' ) ) {
			require_once $trait_style . 'gap-trait.php';
		}
		if ( file_exists( $trait_style . 'icon-trait.php' ) ) {
			require_once $trait_style . 'icon-trait.php';
		}
		if ( file_exists( $trait_style . 'icon-size-trait.php' ) ) {
			require_once $trait_style . 'icon-size-trait.php';
		}
		if ( file_exists( $trait_style . 'img-size-trait.php' ) ) {
			require_once $trait_style . 'img-size-trait.php';
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
		if ( file_exists( $trait_style . 'item-size-trait.php' ) ) {
			require_once $trait_style . 'item-size-trait.php';
		}

		// Trait - renders.
		$trait_render = RBELAD_TRAIT_RENDER;
		if ( file_exists( $trait_render . 'link-type-trait.php' ) ) {
			require_once $trait_render . 'link-type-trait.php';
		}

		Assets_Manager::init();
		Dashboard::init();
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
