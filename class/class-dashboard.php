<?php
/**
 * Admin Dashboard Manager.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

defined( 'ABSPATH' ) || exit;

/**
 * Dashboard controller class.
 */
class Dashboard {
	const PAGE_SLUG      = 'rbelad_dashboard';
	const SETTINGS_GROUP = 'rbelad_widgets_group';

	/**
	 * Generated admin menu slug.
	 *
	 * @var string
	 */
	public static $menu_slug = '';

	/**
	 * Check whether the current admin page is the RBELAD dashboard page.
	 *
	 * Verifies the `page` query argument against the dashboard page slug.
	 *
	 * @return bool True if current admin page is RBELAD dashboard, false otherwise.
	 */
	public static function is_page() {
		return (
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Used only for page detection.
			isset( $_GET['page'] ) &&
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Used only for page detection.
			sanitize_text_field( wp_unslash( $_GET['page'] ) ) === self::PAGE_SLUG
		);
	}

	/**
	 * Add custom body class for RBELAD dashboard pages.
	 *
	 * @param string[] $classes Array of body class names.
	 * @return string[] Modified array of body class names.
	 */
	public static function admin_body_class( $classes ) {
		$screen = get_current_screen();

		if ( $screen && 'toplevel_page_' . self::PAGE_SLUG === $screen->id ) {
			$classes .= ' rbelad-dashboard';
		}

		return $classes;
	}


	/**
	 * Boot dashboard system.
	 *
	 * @return void
	 */
	public static function init() {

		if ( is_admin() ) {

			add_action( 'admin_menu', array( __CLASS__, 'add_menu' ) );
			add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );

			// Handle credential saving.
			add_action( 'admin_post_rbelad_save_credentials', array( __CLASS__, 'process_save_credentials' ) );
		}
	}

	/**
	 * Register dashboard menu + tabs.
	 *
	 * @return void
	 */
	public static function add_menu() {
		self::$menu_slug = add_menu_page(
			esc_html__( 'RB Addons Dashboard', 'rb-elementor-addons' ),
			esc_html__( 'RB Addons', 'rb-elementor-addons' ),
			'manage_options',
			self::PAGE_SLUG,
			array( __CLASS__, 'render_main' ),
			rbelad_get_custom_icon(),
			80
		);

		remove_submenu_page( self::PAGE_SLUG, self::PAGE_SLUG );

		foreach ( self::get_tabs() as $key => $tab ) {
			add_submenu_page(
				self::PAGE_SLUG,
				sprintf(
					/* translators: %s: tab title */
					esc_html__( '%s - RB Addons', 'rb-elementor-addons' ),
					$tab['title']
				),
				$tab['title'],
				'manage_options',
				self::PAGE_SLUG . '&tab=' . $key,
				array( __CLASS__, 'render_main' )
			);
		}

		// Fix duplicate submenu.
		add_action(
			'admin_head',
			function () {
				remove_submenu_page( self::PAGE_SLUG, self::PAGE_SLUG );
			}
		);
	}

	/**
	 * Register widget settings.
	 *
	 * @return void
	 */
	public static function register_settings() {
		register_setting(
			self::SETTINGS_GROUP,
			'rbelad_enabled_widgets',
			array(
				'sanitize_callback' => array( __CLASS__, 'sanitize_enabled_widgets' ),
			)
		);
	}

	/**
	 * Sanitize enabled widgets array.
	 *
	 * @param array $input Raw input.
	 * @return array
	 */
	public static function sanitize_enabled_widgets( $input ) {
		if ( ! is_array( $input ) ) {
			return array();
		}
		return array_filter(
			array_map( 'sanitize_key', $input )
		);
	}

	/**
	 * Get dashboard tabs.
	 *
	 * @return array
	 */
	public static function get_tabs() {

		$tabs = array(
			'home'    => array(
				'title'    => esc_html__( 'Home', 'rb-elementor-addons' ),
				'renderer' => array( __CLASS__, 'render_home' ),
			),
			'widgets' => array(
				'title'    => esc_html__( 'Widgets', 'rb-elementor-addons' ),
				'renderer' => array( __CLASS__, 'render_widgets' ),
			),
		);

		return apply_filters( 'rbelad_dashboard_tabs', $tabs );
	}

	/**
	 * Get the current dashboard tab.
	 *
	 * Used only for UI routing, not form processing.
	 *
	 * @return string
	 */
	private static function get_current_tab() {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- UI routing only.
		return isset( $_GET['tab'] )
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- UI routing only.
			? sanitize_key( wp_unslash( $_GET['tab'] ) )
			: 'home';
	}

	/**
	 * Render main dashboard wrapper.
	 *
	 * @return void
	 */
	public static function render_main() {
		$tabs     = self::get_tabs();
		$tab_keys = array_keys( $tabs );

		// Get current tab (UI routing only).
		$current_tab = self::get_current_tab();

		// Validate tab.
		if ( ! in_array( $current_tab, $tab_keys, true ) ) {
			$current_tab = 'home';
		}

		echo '<div class="wrap">';
		echo '<h1 class="wp-heading-inline">' . esc_html__( 'RB Addons Dashboard', 'rb-elementor-addons' ) . '</h1>';

		echo '<h2 class="nav-tab-wrapper">';

		foreach ( $tabs as $key => $tab ) {

			$active = $current_tab === $key ? ' nav-tab-active' : '';

			$url = admin_url( 'admin.php?page=' . self::PAGE_SLUG . '&tab=' . $key );

			printf(
				'<a href="%s" class="nav-tab%s">%s</a>',
				esc_url( $url ),
				esc_attr( $active ),
				esc_html( $tab['title'] )
			);
		}

		echo '</h2>';

		echo '<div class="rbelad-tab-content">';

		if ( isset( $tabs[ $current_tab ]['renderer'] ) ) {
			call_user_func( $tabs[ $current_tab ]['renderer'] );
		} else {
			echo '<p>' . esc_html__( 'Invalid tab.', 'rb-elementor-addons' ) . '</p>';
		}

		echo '</div>'; // .rbelad-tab-content
		echo '</div>'; // .wrap
	}

	/**
	 * Render views.
	 */
	public static function render_home() {
		include RBELAD_ADMIN . 'home.php';
	}

	/**
	 * Widget tab.
	 */
	public static function render_widgets() {
		include RBELAD_ADMIN . 'widgets.php';
	}
}
Dashboard::init();
