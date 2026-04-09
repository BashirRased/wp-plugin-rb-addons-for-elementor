<?php
/**
 * RBELAD Dashboard Manager
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Class Dashboard
 *
 * Manages plugin admin dashboard.
 */
class Dashboard {

	/**
	 * Dashboard page slug
	 *
	 * @var string
	 */
	const PAGE_SLUG = 'rbelad-dashboard';

	/**
	 * Menu hook suffix
	 *
	 * Used to load scripts only on dashboard page.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public static $menu_slug = '';

	/**
	 * Init
	 */
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'add_menu' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );
	}

	/**
	 * Add Admin Menu
	 */
	public static function add_menu() {
		self::$menu_slug = add_menu_page(
			esc_html__( 'RB Addons Dashboard', 'rb-addons-for-elementor' ),
			esc_html__( 'RB Addons', 'rb-addons-for-elementor' ),
			'manage_options',
			self::PAGE_SLUG,
			array( __CLASS__, 'render_dashboard' ),
			rbelad_get_dashboard_icon(),
			58
		);

		// Submenus.
		add_submenu_page(
			self::PAGE_SLUG,
			esc_html__( 'Widgets', 'rb-addons-for-elementor' ),
			esc_html__( 'Widgets', 'rb-addons-for-elementor' ),
			'manage_options',
			self::PAGE_SLUG . '#widgets',
			array( __CLASS__, 'render_dashboard' )
		);

		add_submenu_page(
			self::PAGE_SLUG,
			esc_html__( 'Settings', 'rb-addons-for-elementor' ),
			esc_html__( 'Settings', 'rb-addons-for-elementor' ),
			'manage_options',
			self::PAGE_SLUG . '#settings',
			array( __CLASS__, 'render_dashboard' )
		);
	}

	/**
	 * Enqueue admin scripts and styles for the dashboard page.
	 *
	 * Loads CSS and JS only on the RB Addons dashboard.
	 *
	 * @param string $hook The current admin page hook suffix.
	 *
	 * @return void
	 */
	public static function enqueue_assets( $hook ) {

		if ( self::$menu_slug !== $hook ) {
			return;
		}

		wp_enqueue_style(
			'rbelad-dashboard',
			RBELAD_CSS . 'dashboard.css',
			array(),
			'1.0.0'
		);

		wp_enqueue_script(
			'rbelad-dashboard',
			RBELAD_JS . 'dashboard.js',
			array( 'jquery' ),
			'1.0.0',
			true
		);

		wp_localize_script(
			'rbelad-dashboard',
			'RBELAD',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'rbelad_nonce' ),
			)
		);
	}

	/**
	 * Render Dashboard
	 */
	public static function render_dashboard() {
		?>
		<div class="wrap rbelad-dashboard">
			<h1><?php esc_html_e( 'RB Addons Dashboard', 'rb-addons-for-elementor' ); ?></h1>

			<div class="rbelad-tabs">
				<a href="#home"><?php echo esc_html__( 'Home', 'rb-addons-for-elementor' ); ?></a>
				<a href="#widgets"><?php echo esc_html__( 'Free Widgets', 'rb-addons-for-elementor' ); ?></a>
				<a href="#widgets"><?php echo esc_html__( 'Pro Widgets', 'rb-addons-for-elementor' ); ?></a>
				<a href="#features"><?php echo esc_html__( 'Extends', 'rb-addons-for-elementor' ); ?></a>
				<a href="#widgets"><?php echo esc_html__( 'Credentials', 'rb-addons-for-elementor' ); ?></a>
			</div>

			<div id="rbelad-content">
				<p><?php echo esc_html__( 'Welcome to RB Addons.', 'rb-addons-for-elementor' ); ?></p>
			</div>
		</div>
		<?php
	}
}