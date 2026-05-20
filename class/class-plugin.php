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
use RBELAD_Elementor_Addons\Icons_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * Plugin Class.
 */
class Plugin {

	/**
	 * Main plugin instance.
	 *
	 * @var self|null
	 */
	private static $instance = null;

	/**
	 * Appsero client instance.
	 *
	 * @var object|null
	 */
	public $appsero = null;

	/**
	 * Get plugin instance.
	 *
	 * @return self
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
			self::$instance->init();
		}
		return self::$instance;
	}

	/**
	 * Initialize plugin.
	 *
	 * @return void
	 */
	public function init() {

		add_action( 'plugins_loaded', array( $this, 'i18n' ) );

		// Load files early (important for hooks like icons).
		add_action( 'init', array( $this, 'include_files' ), 5 );

		// Elementor hooks.
		add_action(
			'elementor/widgets/register',
			array( Widget_Manager::class, 'register_widgets' )
		);

		add_action(
			'elementor/elements/categories_registered',
			array( Widget_Manager::class, 'register_categories' )
		);

		$this->add_page_settings_controls();

		$this->appsero_tracking_init();

		do_action( 'rbelad_addons_loaded' );
	}

	/**
	 * Register all plugin hooks.
	 *
	 * @return void
	 */
	public static function hook_manager() {

		// Admin hooks.
		if ( is_admin() ) {
			add_filter(
				'plugin_action_links_' . plugin_basename( RBELAD_PLUGIN_FILE ),
				array( Dashboard::class, 'add_action_links' )
			);

			add_action(
				'in_admin_header',
				array( Dashboard::class, 'remove_all_notices' ),
				PHP_INT_MAX
			);

			add_action(
				'wp_ajax_rbelad_save_dashboard',
				array( Dashboard::class, 'save_data' )
			);

			add_action(
				'rbelad_save_dashboard_data',
				array( Dashboard::class, 'save_credentials_data' )
			);
		}

		// Review system.
		if ( is_user_logged_in() ) {
			add_action(
				'admin_init',
				array( Review::class, 'rbelad_check_installation_time' )
			);

			add_action(
				'admin_init',
				array( Review::class, 'rbelad_handle_actions' )
			);
		}

		/**
		 * Register Icons here.
		 */
		add_filter(
			'elementor/icons_manager/additional_tabs',
			array( Icons_Manager::class, 'add_rbelad_icons_tab' )
		);
	}

	/**
	 * Load PHP files from a directory list.
	 *
	 * @param array  $files List of file paths.
	 * @param string $base  Base directory path.
	 *
	 * @return void
	 */
	private function load_style_directory( array $files, string $base ) {

		foreach ( $files as $file ) {

			$file_path = $base . $file;

			if ( file_exists( $file_path ) ) {
				require_once $file_path;
			}
		}
	}

	/**
	 * Load PHP files from a directory list.
	 *
	 * @param array  $files List of file paths.
	 * @param string $base  Base directory path.
	 *
	 * @return void
	 */
	private function load_content_directory( array $files, string $base ) {

		foreach ( $files as $file ) {

			$file_path = $base . $file;

			if ( file_exists( $file_path ) ) {
				require_once $file_path;
			}
		}
	}

	/**
	 * Include required files.
	 *
	 * @return void
	 */
	public function include_files() {

		/**
		 * Core classes.
		 */
		$classes = array(
			'class-widget-manager.php',
			'class-base.php',
			'class-assets-manager.php',
			'class-icons-manager.php',
			'class-dashboard.php',
			'class-review.php',
			'class-credentials-manager.php',
			'class-font-list.php',
			'class-theme-builder.php',
		);

		foreach ( $classes as $file ) {
			$file_path = RBELAD_CLASS . $file;

			if ( file_exists( $file_path ) ) {
				require_once $file_path;
			}
		}

		/**
		 * Trait styles.
		 */
		$this->load_style_directory(
			array(
				'custom-typography.php',
			),
			RBELAD_TRAIT_STYLE
		);

		/**
		 * Trait contents.
		 */
		$this->load_content_directory(
			array(
				'select-link.php',
			),
			RBELAD_TRAIT_CONTENT
		);

		/**
		 * Hooks AFTER loading classes.
		 */
		self::hook_manager();

		/**
		 * Init core systems.
		 */
		Assets_Manager::init();
		Dashboard::init();
	}

	/**
	 * Load text domain.
	 *
	 * @return void
	 */
	public function i18n() {
		load_plugin_textdomain(
			'rb-addons-for-elementor',
			false,
			dirname( plugin_basename( RBELAD_PLUGIN_FILE ) ) . '/languages/'
		);
	}

	/**
	 * Initialize Appsero tracking.
	 *
	 * @return void
	 */
	protected function appsero_tracking_init() {

		if ( ! class_exists( 'Appsero\Client' ) ) {
			require_once RBELAD_PLUGIN_DIR . 'appsero/class-client.php';
		}

		$this->appsero = new \Appsero\Client(
			'9dfbe8bb-826d-4693-97d0-de5b650e0d4b',
			'RB Addons for Elementor',
			RBELAD_PLUGIN_FILE
		);

		$this->appsero->set_textdomain( 'rb-addons-for-elementor' );

		$this->appsero->insights()
			->add_plugin_data()
			->init();
	}

	/**
	 * Register Elementor page settings.
	 *
	 * @return void
	 */
	private function add_page_settings_controls() {
		require_once RBELAD_CLASS . 'class-page-settings.php';
		new Page_Settings();
	}
}

// Bootstrap plugin.
Plugin::instance();
