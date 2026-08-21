<?php
/**
 * Plugin base class
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

use Elementor\Controls_Manager;
use Elementor\Elements_Manager;

use RBELAD_Elementor_Addons\Classes as RBELAD_Classes;

defined( 'ABSPATH' ) || exit;

/**
 * Main Plugin Base Class
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
	 * Get instance
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Construct
	 */
	private function __construct() {
		$this->run_autoload();
	}

	/**
	 * Initialize plugin
	 */
	public function init() {

		$this->include_files();

		add_action(
			'elementor/init',
			function () {
				add_action( 'elementor/elements/categories_registered', array( RBELAD_Classes\Category_Manager::class, 'register' ) );
				add_action( 'elementor/controls/register', array( $this, 'register_controls' ) );
				add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
			},
			10
		);

		add_action( 'init', array( $this, 'init_extensions' ) );

		$this->init_appsero_tracking();

		do_action( 'rbelad_loaded' );
	}

	/**
	 * Initialize Appsero tracking.
	 *
	 * @return void
	 */
	protected function init_appsero_tracking() {

		if ( ! class_exists( 'Appsero\Client' ) ) {
			require_once RBELAD_PATH . 'appsero/class-client.php';
		}

		$this->appsero = new \Appsero\Client(
			'9dfbe8bb-826d-4693-97d0-de5b650e0d4b',
			'RB Addons for Elementor',
			RBELAD_FILE
		);

		$this->appsero->set_textdomain( 'rb-addons-for-elementor' );

		$this->appsero->insights()
			->add_plugin_data()
			->init();
	}

	/**
	 * Register all plugin hooks.
	 *
	 * @return void
	 */
	public static function hook_manager() {
		/* Icons_Manager */
		add_filter( 'elementor/icons_manager/additional_tabs', array( RBELAD_Classes\Icons_Manager::class, 'add_rbelad_icons_tab' ) );

		/**
		* Assets_Manager
		*/
		// Frontend assets.
		add_action( 'wp_enqueue_scripts', array( RBELAD_Classes\Assets_Manager::class, 'frontend_assets' ) );
		// Elementor editor assets.
		add_action( 'elementor/editor/after_enqueue_scripts', array( RBELAD_Classes\Assets_Manager::class, 'editor_assets' ) );
		// Admin assets.
		add_action( 'admin_enqueue_scripts', array( RBELAD_Classes\Assets_Manager::class, 'admin_assets' ) );

		if ( is_admin() ) {
			/* Dashboard */
			add_action( 'admin_menu', array( RBELAD_Classes\Dashboard::class, 'add_menu' ), 21 );
			add_action( 'admin_menu', array( RBELAD_Classes\Dashboard::class, 'update_menu_items' ), 99 );
			add_filter( 'plugin_action_links_' . plugin_basename( RBELAD_FILE ), array( RBELAD_Classes\Dashboard::class, 'add_action_links' ) );
			add_action( 'in_admin_header', array( RBELAD_Classes\Dashboard::class, 'remove_all_notices' ), PHP_INT_MAX );
		}

		if ( is_user_logged_in() ) {
			/* Review */
			add_action( 'admin_init', array( RBELAD_Classes\Review::class, 'rbelad_void_check_installation_time' ) );
			add_action( 'admin_init', array( RBELAD_Classes\Review::class, 'rbelad_void_spare_me' ), 5 );

			/* Clone_Handler */
			add_action( 'admin_action_rbelad_duplicate_thing', array( RBELAD_Classes\Clone_Handler::class, 'duplicate_thing' ) );
			add_filter( 'post_row_actions', array( RBELAD_Classes\Clone_Handler::class, 'add_row_actions' ), 10, 2 );
			add_filter( 'page_row_actions', array( RBELAD_Classes\Clone_Handler::class, 'add_row_actions' ), 10, 2 );
		}
	}

	/**
	 * Include core files
	 */
	public function include_files() {
		require_once RBELAD_CLASSES_PATH . 'class-widgets-manager.php';
		require_once RBELAD_CLASSES_PATH . 'class-font-list.php';
		self::hook_manager();
	}

	/**
	 * Register Elementor controls.
	 *
	 * @param Controls_Manager $controls_manager Elementor controls manager instance.
	 * @return void
	 */
	public function register_controls( Controls_Manager $controls_manager ) {

		// Example placeholder (Step 6–10 roadmap).
		// $controls_manager->register( new \RBELAD_Elementor_Addons\Controls\Example_Control() );.
	}

	/**
	 * Register Elementor widgets.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager instance.
	 * @return void
	 */
	public function register_widgets( $widgets_manager ) {
		\RBELAD_Elementor_Addons\Widgets_Manager::register( $widgets_manager );
	}

	/**
	 * Init extensions (Step 5+ roadmap)
	 */
	public function init_extensions() {

		// Future:
		// Admin Bar
		// Ajax Handler
		// API Handler
		// Cache Manager
		// Conditions
		// Icon Manager.

		do_action( 'rbelad_extensions_loaded' );
	}

	/**
	 * Autoload plugin classes.
	 *
	 * @param string $rbelad_class Fully qualified class name.
	 * @return void
	 */
	public function autoload( $rbelad_class ) {

		if ( 0 !== strpos( $rbelad_class, __NAMESPACE__ ) ) {
			return;
		}

		// Classes.
		if ( 0 === strpos( $rbelad_class, __NAMESPACE__ . '\\Classes\\' ) ) {

			$rbelad_class_name = str_replace(
				__NAMESPACE__ . '\\Classes\\',
				'',
				$rbelad_class
			);

			$file = RBELAD_CLASSES_PATH .
				'class-' .
				strtolower( str_replace( '_', '-', $rbelad_class_name ) ) .
				'.php';

			if ( file_exists( $file ) ) {
				require_once $file;
			}

			return;
		}
	}

	/**
	 * Register autoload
	 */
	public function run_autoload() {
		spl_autoload_register( array( $this, 'autoload' ) );
	}
}
