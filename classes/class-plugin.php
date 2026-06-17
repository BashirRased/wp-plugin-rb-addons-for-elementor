<?php
/**
 * Plugin base class
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

use Elementor\Controls_Manager;
use Elementor\Elements_Manager;

use RBELAD_Elementor_Addons\Elementor\Classes as RBELAD_Classes;

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
	 * Initialize plugin
	 */
	public function init() {

		$this->include_files();

		add_action(
			'elementor/init',
			function () {

				// Elementor is now fully loaded → SAFE.

				add_action( 'elementor/elements/categories_registered', array( $this, 'add_category' ) );
				add_action( 'elementor/controls/register', array( $this, 'register_controls' ) );
				add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
			},
			10
		);

		add_action( 'init', array( $this, 'init_extensions' ) );

		do_action( 'rbelad_loaded' );
	}

	/**
	 * Register all plugin hooks.
	 *
	 * @return void
	 */
	public static function hook_manager() {
		if ( is_user_logged_in() ) {
			/* Review */
			add_action( 'admin_init', array( RBELAD_Classes\Review::class, 'rbelad_void_check_installation_time' ) );
			add_action( 'admin_init', array( RBELAD_Classes\Review::class, 'rbelad_void_spare_me' ), 5 );
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
	 * Include core files
	 */
	public function include_files() {
		require_once RBELAD_CLASSES_PATH . 'class-widgets-manager.php';
		require_once RBELAD_CLASSES_PATH . 'class-review.php';
		require_once RBELAD_CLASSES_PATH . 'class-font-list.php';
		require_once RBELAD_CLASSES_PATH . 'class-assets-manager.php';

		/**
		 * Trait contents.
		 */
		$this->load_content_directory(
			array(
				'select-link.php',
			),
			RBELAD_TRAIT_CONTENT_PATH
		);

		/**
		 * Trait styles.
		 */
		$this->load_style_directory(
			array(
				'background.php',
				'border.php',
				'color.php',
				'custom-typography.php',
				'flex.php',
				'hover-active-color.php',
				'hover-color.php',
				'position.php',
				'spacing.php',
				'width-height.php',
			),
			RBELAD_TRAIT_STYLE_PATH
		);

		self::hook_manager();
	}

	/**
	 * Register custom Elementor category.
	 *
	 * @param Elements_Manager $elements_manager Elementor elements manager instance.
	 * @return void
	 */
	public function add_category( Elements_Manager $elements_manager ) {

		$elements_manager->add_category(
			'rbelad_addons_basic',
			array(
				'title' => esc_html__( 'RB Addons - Basic', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-plug',
			)
		);

		$elements_manager->add_category(
			'rbelad_addons_general',
			array(
				'title' => esc_html__( 'RB Addons - General', 'rb-addons-for-elementor' ),
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
