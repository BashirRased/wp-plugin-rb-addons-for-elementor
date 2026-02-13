<?php
/**
 * Admin Dashboard Manager
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

use RBELAD_Elementor_Addons\Widget_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * Dashboard controller class.
 */
class Dashboard {
	const PAGE_SLUG      = 'rbelad_dashboard';
	const SETTINGS_GROUP = 'rbelad_widgets_group';

	/**
	 * Menu hook suffix.
	 *
	 * @var string
	 */
	private static $menu_hook = '';

	/**
	 * Boot dashboard system.
	 *
	 * @return void
	 */
	public static function init(): void {
		if ( ! is_admin() ) {
			return;
		}

		add_action( 'admin_menu', array( __CLASS__, 'add_menu' ) );
		add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
		add_action( 'admin_init', array( __CLASS__, 'handle_submenu_tab' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );
		add_filter( 'admin_body_class', array( __CLASS__, 'admin_body_class' ) );

		// Remove admin notices on plugin dashboard only.
		add_action(
			'in_admin_header',
			array( __CLASS__, 'remove_admin_notices' ),
			PHP_INT_MAX
		);

		// AJAX.
		add_action( 'wp_ajax_rbelad_load_dashboard_tab', array( __CLASS__, 'ajax_load_tab' ) );
		add_action( 'wp_ajax_rbelad_save_widgets', array( __CLASS__, 'ajax_save_widgets' ) );

		add_action( 'admin_head', array( __CLASS__, 'hide_first_submenu' ) );
	}

	/**
	 * Remove admin notices on dashboard screen only.
	 *
	 * @return void
	 */
	public static function remove_admin_notices(): void {
		if ( ! function_exists( 'get_current_screen' ) ) {
			return;
		}

		$screen = get_current_screen();

		if ( empty( $screen ) || 'toplevel_page_' . self::PAGE_SLUG !== $screen->id ) {
			return;
		}

		remove_all_actions( 'admin_notices' );
		remove_all_actions( 'all_admin_notices' );
	}

	/**
	 * Hide first submenu item.
	 *
	 * @return void
	 */
	public static function hide_first_submenu(): void {
		?>
		<style>
			#toplevel_page_<?php echo esc_attr( self::PAGE_SLUG ); ?> .wp-first-item:first-child {
				display: none;
			}
		</style>
		<?php
	}

	/**
	 * Register admin menu.
	 *
	 * @return void
	 */
	public static function add_menu(): void {
		self::$menu_hook = add_menu_page(
			esc_html__( 'RB Addons Dashboard', 'rb-addons-for-elementor' ),
			esc_html__( 'RB Addons', 'rb-addons-for-elementor' ),
			'manage_options',
			self::PAGE_SLUG,
			array( __CLASS__, 'render_main' ),
			rbelad_get_dashboard_icon(),
			80
		);

		foreach ( self::get_tabs() as $key => $tab ) {
			add_submenu_page(
				self::PAGE_SLUG,
				sprintf(
					/* translators: %s: Tab title */
					esc_html__( '%s - RB Addons', 'rb-addons-for-elementor' ),
					$tab['title']
				),
				$tab['title'],
				'manage_options',
				self::PAGE_SLUG . '#' . $key,
				array( __CLASS__, 'render_main' )
			);
		}
	}

	/**
	 * Handle submenu hash tabs.
	 *
	 * @return void
	 */
	public static function handle_submenu_tab(): void {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( empty( $_GET['page'] ) ) {
			return;
		}

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$page        = sanitize_key( wp_unslash( $_GET['page'] ) );
		$default_tab = 'home';

		foreach ( self::get_tabs() as $key => $tab ) {
			if ( false !== strpos( $page, '#' . $key ) ) {
				$default_tab = $key;
				break;
			}
		}

		add_filter(
			'rbelad_default_dashboard_tab',
			static function () use ( $default_tab ) {
				return $default_tab;
			}
		);
	}

	/**
	 * Enqueue admin assets.
	 *
	 * @param string $hook Page hook.
	 * @return void
	 */
	public static function enqueue_assets( $hook ): void {
		if ( self::$menu_hook !== $hook ) {
			return;
		}

		wp_enqueue_style(
			'rbelad-admin',
			RBELAD_ASSETS . 'css/admin.css',
			array(),
			RBELAD_VERSION
		);

		wp_enqueue_script(
			'rbelad-admin',
			RBELAD_ASSETS . 'js/admin.js',
			array( 'jquery' ),
			RBELAD_VERSION,
			true
		);

		wp_localize_script(
			'rbelad-admin',
			'RBELADDashboard',
			array(
				'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
				'nonce'      => wp_create_nonce( 'rbelad_dashboard_nonce' ),
				'defaultTab' => apply_filters( 'rbelad_default_dashboard_tab', 'home' ),
			)
		);
	}

	/**
	 * Add dashboard body class.
	 *
	 * @param string $classes Body classes.
	 * @return string
	 */
	public static function admin_body_class( $classes ) {
		if ( ! function_exists( 'get_current_screen' ) ) {
			return $classes;
		}

		$screen = get_current_screen();

		if ( $screen && 'toplevel_page_' . self::PAGE_SLUG === $screen->id ) {
			$classes .= ' rbelad-dashboard';
		}

		return $classes;
	}

	/**
	 * Register settings.
	 *
	 * @return void
	 */
	public static function register_settings(): void {
		register_setting(
			self::SETTINGS_GROUP,
			'rbelad_enabled_widgets',
			array(
				'sanitize_callback' => array( __CLASS__, 'sanitize_enabled_widgets' ),
			)
		);
	}

	/**
	 * Sanitize widget list.
	 *
	 * @param mixed $input Raw input.
	 * @return array
	 */
	public static function sanitize_enabled_widgets( $input ): array {
		if ( ! is_array( $input ) ) {
			return array();
		}

		return array_map( 'sanitize_key', $input );
	}

	/**
	 * Dashboard tabs.
	 *
	 * @return array
	 */
	public static function get_tabs(): array {
		$tabs = array(
			'home'    => array(
				'title'    => esc_html__( 'Home', 'rb-addons-for-elementor' ),
				'renderer' => array( __CLASS__, 'render_home' ),
			),
			'widgets' => array(
				'title'    => esc_html__( 'Widgets', 'rb-addons-for-elementor' ),
				'renderer' => array( __CLASS__, 'render_widgets' ),
			),
		);

		return apply_filters( 'rbelad_dashboard_tabs', $tabs );
	}

	/**
	 * Render dashboard shell.
	 *
	 * @return void
	 */
	public static function render_main(): void {
		$tabs        = self::get_tabs();
		$default_tab = apply_filters( 'rbelad_default_dashboard_tab', 'home' );
		$admin_url   = admin_url( 'admin.php?page=' . self::PAGE_SLUG );

		// Get widget maps.
		$free_widgets = Widget_Manager::get_free_widgets_map();
		$pro_widgets  = Widget_Manager::get_pro_widgets_map();

		// Counts.
		$total_free_widgets_count = count( $free_widgets );
		$total_pro_widgets_count  = count( $pro_widgets );
		$total_widgets_count      = $total_free_widgets_count + $total_pro_widgets_count;

		echo '<div class="wrap rbelad-dashboard rbelad-dashboard-wrap">';
		?>
		<!-- Dashboard Header -->
		<div class="rbelad-dashboard-header">
			<div class="rbelad-logo-wrapper">
				<div class="rbelad-logo">
					<span class="rbelad-icon rbelad-rb-addons"></span>
					<span class="rbelad-plugin-tile">
						<?php echo esc_html__( 'RB Addons for Elementor', 'rb-addons-for-elementor' ); ?>
					</span>
				</div>
				<div class="rbelad-widget-count">
					<p><?php esc_html_e( 'Total Widgets', 'rb-addons-for-elementor' ); ?></p>
					<span><?php echo esc_html( $total_widgets_count ); ?></span>
				</div>
				<div class="rbelad-widget-count">
					<p><?php esc_html_e( 'Free Widgets', 'rb-addons-for-elementor' ); ?></p>
					<span><?php echo esc_html( $total_free_widgets_count ); ?></span>
				</div>
				<div class="rbelad-widget-count">
					<p><?php esc_html_e( 'Pro Widgets', 'rb-addons-for-elementor' ); ?></p>
					<span><?php echo esc_html( $total_pro_widgets_count ); ?></span>
				</div>
				<div class="rbelad-version">
					<span class="badge-free">
						<?php echo esc_html__( 'Free', 'rb-addons-for-elementor' ); ?>
					</span>
					<span class="version-number">
						<?php
						/* translators: %s is the plugin version */
						printf( esc_html__( 'Version %s', 'rb-addons-for-elementor' ), esc_html( RBELAD_VERSION ) );
						?>
					</span>
				</div>
				<?php if ( defined( 'RBELPRO_VERSION' ) ) : ?>
					<div class="rbelad-version pro">
						<span class="badge-pro"><?php esc_html_e( 'Pro', 'rb-addons-for-elementor' ); ?></span>
						<span class="version-number">
							<?php
							printf(
								/* translators: %s: Pro plugin version number */
								esc_html__( 'Version %s', 'rb-addons-for-elementor' ),
								esc_html( RBELPRO_VERSION )
							);
							?>
						</span>
					</div>
				<?php endif; ?>
				<button type="button" class="button button-primary" id="rbelad-save-widgets">
					<?php echo esc_html__( 'Save Changes', 'rb-addons-for-elementor' ); ?>
				</button>
			</div>
		</div>
		<?php

		echo '<div class="nav-tab-wrapper">';
		foreach ( $tabs as $key => $tab ) {
			$active = ( $key === $default_tab ) ? ' nav-tab-active' : '';
			printf(
				'<a href="%1$s#%2$s" class="nav-tab%3$s" data-tab="%2$s">%4$s</a>',
				esc_url( $admin_url ),
				esc_attr( $key ),
				esc_attr( $active ),
				esc_html( $tab['title'] )
			);
		}
		echo '</div>';

		printf(
			'<div id="rbelad-dashboard-content" data-default-tab="%s"></div>',
			esc_attr( $default_tab )
		);

		echo '</div>';
	}

	/**
	 * AJAX: Load tab.
	 *
	 * @return void
	 */
	public static function ajax_load_tab(): void {
		check_ajax_referer( 'rbelad_dashboard_nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error();
		}

		$tab  = isset( $_POST['tab'] ) ? sanitize_key( wp_unslash( $_POST['tab'] ) ) : 'home';
		$tabs = self::get_tabs();

		if ( empty( $tabs[ $tab ]['renderer'] ) ) {
			wp_send_json_error();
		}

		ob_start();
		call_user_func( $tabs[ $tab ]['renderer'] );

		wp_send_json_success(
			array(
				'content' => ob_get_clean(),
			)
		);
	}

	/**
	 * AJAX: Save widgets.
	 *
	 * @return void
	 */
	public static function ajax_save_widgets(): void {
		check_ajax_referer( 'rbelad_dashboard_nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error();
		}

		$widgets = isset( $_POST['widgets'] ) && is_array( $_POST['widgets'] )
			? array_map( 'sanitize_key', $_POST['widgets'] )
			: array();

		update_option( 'rbelad_enabled_widgets', $widgets );

		wp_send_json_success();
	}

	/**
	 * Home tab.
	 *
	 * @return void
	 */
	public static function render_home(): void {
		include RBELAD_ADMIN . 'home.php';
	}

	/**
	 * Widgets tab.
	 *
	 * @return void
	 */
	public static function render_widgets(): void {
		include RBELAD_ADMIN . 'widgets.php';
	}
}

// Bootstrap dashboard.
Dashboard::init();
