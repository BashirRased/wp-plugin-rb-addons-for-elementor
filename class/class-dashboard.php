<?php
/**
 * Admin Dashboard Setting
 *
 * @package RB_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Admin Dashboard page handler.
 *
 * Provides the UI and logic for managing RB Elementor Addons
 * settings and widget controls inside the WordPress dashboard.
 *
 * @package RB_Elementor_Addons
 */
class Dashboard {

	/**
	 * Init all hooks
	 */
	public static function init() {
		if ( is_admin() ) {
			// Menus.
			add_action( 'admin_menu', array( __CLASS__, 'add_menu' ) );

			// Settings.
			add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
		}
	}

	/**
	 * Add menu + submenu
	 */
	public static function add_menu() {
		// Top-level menu (this will act as "Home").
		add_menu_page(
			'RB Elementor Addons Dashboard',
			'RB Addons',
			'manage_options',
			'rbelad_dashboard',
			array( __CLASS__, 'render_tabs_page' ),
			rbelad_get_custom_icon(),
			80
		);

		// Submenus (only 4 needed).
		self::add_submenu( 'rbelad_dashboard', 'Widgets', 'widgets' );
		self::add_submenu( 'rbelad_dashboard', 'Credentials', 'credentials' );
		self::add_submenu( 'rbelad_dashboard', 'Get Pro', 'get-pro' );
		self::add_submenu( 'rbelad_dashboard', 'Theme Builder', 'theme-builder' );
	}

	/**
	 * Helper to create admin submenus for dashboard tabs.
	 *
	 * @param string $parent_slug The slug of the parent menu.
	 * @param string $title       The submenu page title.
	 * @param string $tab         The dashboard tab identifier.
	 *
	 * @return void
	 */
	protected static function add_submenu( $parent_slug, $title, $tab ) {
		add_submenu_page(
			$parent_slug,
			$title,
			$title,
			'manage_options',
			'rbelad_dashboard_' . $tab,
			function () use ( $tab ) {
				$_GET['tab'] = $tab;
				self::render_tabs_page();
			}
		);
	}

	/**
	 * Register widget settings
	 */
	public static function register_settings() {
		register_setting(
			'rbelad_widgets_group',
			'rbelad_enabled_widgets',
			array(
				'sanitize_callback' => array( __CLASS__, 'sanitize_enabled_widgets' ),
			)
		);
	}

	/**
	 * Sanitize the enabled widgets array.
	 *
	 * @param array $input The input array of widget slugs to sanitize.
	 * @return array Sanitized array of widget slugs.
	 */
	public static function sanitize_enabled_widgets( $input ) {
		if ( ! is_array( $input ) ) {
			return array();
		}
		return array_filter( array_map( 'sanitize_key', $input ) );
	}

	/**
	 * Render dashboard tabs page
	 */
	public static function render_tabs_page() {
		// Define tabs (only 4 now).
		$tabs = array(
			'home'        => 'Home',
			'widgets'     => 'Widgets',
			'credentials' => 'Credentials',
			'get-pro'     => 'Get Pro',
		);

		if ( isset( $_GET['_wpnonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'rbelad_dashboard_tabs' ) ) {
			wp_die( esc_html__( 'Invalid tab nonce.', 'rb-elementor-addons' ) );
		}

		$current_tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'home';

		echo '<div class="wrap"><h1 class="wp-heading-inline">RB Elementor Addons</h1>';
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $tabs as $slug => $label ) {
			$active  = $slug === $current_tab ? ' nav-tab-active' : '';
			$tab_url = add_query_arg(
				array(
					'page'     => 'rbelad_dashboard',
					'tab'      => $slug,
					'_wpnonce' => wp_create_nonce( 'rbelad_dashboard_tabs' ),
				)
			);
			echo '<a href="' . esc_url( $tab_url ) . '" class="nav-tab' . esc_attr( $active ) . '">' . esc_html( $label ) . '</a>';
		}
		echo '</h2>';

		echo '<div class="rbelad-tab-content">';
		$default_tab_file = RBELAD_ADMIN . $current_tab . '.php';
		if ( file_exists( $default_tab_file ) ) {
			require $default_tab_file;
		} else {
			echo '<p>Invalid tab file.</p>';
		}
		echo '</div>';
		echo '</div>';
	}
}

// Initialize.
Dashboard::init();
