<?php
/**
 * Plugin base class
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

use Elementor\Controls_Manager;
use Elementor\Elements_Manager;

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
	 * Get instance
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor
	 */
	private function __construct() {
		add_action( 'init', array( $this, 'i18n' ) );
	}

	/**
	 * Initialize plugin
	 */
	public function init() {

		$this->include_files();

		// Elementor hooks.
		add_action( 'elementor/elements/categories_registered', array( $this, 'add_category' ) );
		add_action( 'elementor/controls/register', array( $this, 'register_controls' ) );
		add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );

		// Load extensions on init.
		add_action( 'init', array( $this, 'init_extensions' ) );

		do_action( 'rbelad_loaded' );
	}

	/**
	 * Load translations
	 */
	public function i18n() {
		load_plugin_textdomain(
			'rb-addons-for-elementor',
			false,
			dirname( plugin_basename( RBELAD_FILE ) ) . '/languages/'
		);
	}

	/**
	 * Include core files
	 */
	public function include_files() {

		// Base helpers (later you can expand).
		if ( file_exists( RBELAD_PATH . 'includes/functions.php' ) ) {
			require_once RBELAD_PATH . 'includes/functions.php';
		}

		require_once RBELAD_CLASSES_PATH . 'class-widgets-manager.php';

		// Dashboard (Step 1–4 roadmap).
		if ( is_admin() ) {
			if ( file_exists( RBELAD_PATH . 'admin/dashboard.php' ) ) {
				require_once RBELAD_PATH . 'admin/dashboard.php';
			}
		}
	}

	/**
	 * Register custom Elementor category.
	 *
	 * @param Elements_Manager $elements_manager Elementor elements manager instance.
	 * @return void
	 */
	public function add_category( Elements_Manager $elements_manager ) {

		$elements_manager->add_category(
			'rbelad_category',
			array(
				'title' => esc_html__( 'RB Addons', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-plug',
			)
		);
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

		$relative = str_replace(
			array( __NAMESPACE__ . '\\', '\\', '_' ),
			array( '', '/', '-' ),
			$rbelad_class
		);

		$file = RBELAD_PATH . strtolower( $relative ) . '.php';

		if ( file_exists( $file ) ) {
			include_once $file;
		}
	}

	/**
	 * Register autoload
	 */
	public function register_autoload() {
		spl_autoload_register( array( $this, 'autoload' ) );
	}
}
