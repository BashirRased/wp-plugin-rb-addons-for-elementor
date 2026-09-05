<?php
/**
 * RBELAD Dashboard Manager.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Classes;

defined( 'ABSPATH' ) || exit;

/**
 * Class Dashboard.
 *
 * Manages plugin admin dashboard.
 */
class Dashboard {

	/**
	 * Dashboard page slug.
	 *
	 * @var string
	 */
	const PAGE_SLUG = 'rbelad-dashboard';

	/**
	 * License page slug.
	 *
	 * @var string
	 */
	const LICENSE_PAGE_SLUG = 'rbelad-license';

	/**
	 * AJAX tab query parameter.
	 *
	 * @var string
	 */
	const TAB_PARAM = 'rbelad_tab';

	/**
	 * Menu hook suffix.
	 *
	 * Used to load scripts only on dashboard page.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public static $menu_slug = '';

	/**
	 * Init.
	 *
	 * @return void
	 */
	public static function init() {

		add_action(
			'admin_menu',
			array( __CLASS__, 'add_menu' )
		);

		add_action(
			'admin_enqueue_scripts',
			array( __CLASS__, 'enqueue_assets' )
		);

		add_action(
			'admin_notices',
			array( __CLASS__, 'remove_all_notices' ),
			0
		);

		add_action(
			'admin_menu',
			array( __CLASS__, 'update_menu_items' ),
			999
		);
	}

	/**
	 * Check if current admin page belongs to this plugin.
	 *
	 * @return bool
	 */
	public static function is_page() {

		if ( ! isset( $_GET['page'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Safe: only checking page slug.
			return false;
		}

		$page = sanitize_key(
			wp_unslash(
				$_GET['page'] // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Safe: only reading page slug.
			)
		);

		return (
			self::PAGE_SLUG === $page ||
			self::LICENSE_PAGE_SLUG === $page
		);
	}

	/**
	 * Add action links for the plugin on the plugins page.
	 *
	 * @param array $links Existing action links.
	 * @return array
	 */
	public static function add_action_links( $links ) {

		if ( ! current_user_can( 'manage_options' ) ) {
			return $links;
		}

		$settings_link = sprintf(
			'<a href="%s">%s</a>',
			esc_url( rbelad_get_dashboard_link() ),
			esc_html__(
				'Settings',
				'rb-addons-for-elementor'
			)
		);

		array_unshift(
			$links,
			$settings_link
		);

		if ( ! rbelad_has_pro() ) {

			$pro_link = sprintf(
				'<a href="%s" target="_blank" rel="noopener noreferrer" style="color:#e2498a; font-weight:bold;">%s</a>',
				esc_url(
					'https://bashir-rased.dev/go/get-pro'
				),
				esc_html__(
					'Get Pro',
					'rb-addons-for-elementor'
				)
			);

			$links[] = $pro_link;
		}

		return $links;
	}

	/**
	 * Remove all admin notices on plugin pages.
	 *
	 * @return void
	 */
	public static function remove_all_notices() {

		if ( ! self::is_page() ) {
			return;
		}

		remove_all_actions( 'admin_notices' );
		remove_all_actions( 'all_admin_notices' );
	}

	/**
	 * Add admin menu.
	 *
	 * @return void
	 */
	public static function add_menu() {

		self::$menu_slug = add_menu_page(
			esc_html__(
				'RB Addons Dashboard',
				'rb-addons-for-elementor'
			),
			esc_html__(
				'RB Addons',
				'rb-addons-for-elementor'
			),
			'manage_options',
			self::PAGE_SLUG,
			array( __CLASS__, 'render_dashboard' ),
			rbelad_get_dashboard_icon(),
			58
		);

		$tabs = self::get_tabs();

		if ( is_array( $tabs ) ) {

			foreach ( $tabs as $key => $tab ) {

				if (
					empty( $tab['renderer'] ) ||
					! is_callable( $tab['renderer'] )
				) {
					continue;
				}

				add_submenu_page(
					self::PAGE_SLUG,
					sprintf(
						/* translators: %s: Tab title. */
						esc_html__(
							'%s - RB Addons',
							'rb-addons-for-elementor'
						),
						$tab['title']
					),
					$tab['title'],
					'manage_options',
					self::PAGE_SLUG . '#' . $key,
					array( __CLASS__, 'render_dashboard' )
				);
			}
		}
	}

	/**
	 * Remove the first duplicate submenu item.
	 *
	 * @return void
	 */
	public static function update_menu_items() {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		global $submenu;

		if (
			isset( $submenu[ self::PAGE_SLUG ] ) &&
			is_array( $submenu[ self::PAGE_SLUG ] )
		) {
			array_shift(
				$submenu[ self::PAGE_SLUG ]
			);
		}
	}

	/**
	 * Get dashboard tabs.
	 *
	 * @return array
	 */
	public static function get_tabs() {

		$tabs = array(

			'home'         => array(
				'title'    => esc_html__(
					'Home',
					'rb-addons-for-elementor'
				),
				'renderer' => array(
					__CLASS__,
					'render_home',
				),
			),

			'free-widgets' => array(
				'title'    => esc_html__(
					'Free Widgets',
					'rb-addons-for-elementor'
				),
				'renderer' => array(
					__CLASS__,
					'render_free_widgets',
				),
			),

			'pro-widgets'  => array(
				'title'    => esc_html__(
					'Pro Widgets',
					'rb-addons-for-elementor'
				),
				'renderer' => array(
					__CLASS__,
					'render_pro_widgets',
				),
			),
		);

		return apply_filters(
			'rbelad_dashboard_tabs',
			$tabs
		);
	}

	/**
	 * Get current dashboard tab.
	 *
	 * Uses the AJAX query parameter when available.
	 *
	 * @return string
	 */
	private static function get_current_tab() {

		$current_tab = 'home';

		if ( isset( $_GET[ self::TAB_PARAM ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Safe: used only for tab navigation.
			$current_tab = sanitize_key(
				wp_unslash(
					$_GET[ self::TAB_PARAM ] // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Safe: used only for tab navigation.
				)
			);
		}

		$tabs = self::get_tabs();

		if ( ! isset( $tabs[ $current_tab ] ) ) {
			$current_tab = 'home';
		}

		return $current_tab;
	}

	/**
	 * Load dashboard template file.
	 *
	 * @param string $template Template file name without extension.
	 *
	 * @return void
	 */
	private static function load_template( $template ) {

		$file = RBELAD_ADMIN_PATH . $template . '.php';

		if ( is_readable( $file ) ) {
			include $file;
		}
	}

	/**
	 * Render home tab.
	 *
	 * @return void
	 */
	public static function render_home() {
		self::load_template( 'main' );
	}

	/**
	 * Render free widgets tab.
	 *
	 * @return void
	 */
	public static function render_free_widgets() {
		self::load_template( 'free-widgets' );
	}

	/**
	 * Render pro widgets tab.
	 *
	 * @return void
	 */
	public static function render_pro_widgets() {
		self::load_template( 'pro-widgets' );
	}

	/**
	 * Render dashboard.
	 *
	 * @return void
	 */
	public static function render_dashboard() {

		$tabs = self::get_tabs();

		$current_tab = self::get_current_tab();
		?>

		<div class="wrap rbelad-dashboard">

			<h1>
				<?php
				esc_html_e(
					'RB Addons Dashboard',
					'rb-addons-for-elementor'
				);
				?>
			</h1>

			<h2 class="nav-tab-wrapper">

				<?php foreach ( $tabs as $key => $tab ) : ?>

					<a
						href="<?php echo esc_url( rbelad_get_dashboard_link( '#' . $key ) ); ?>"
						class="nav-tab <?php echo ( $current_tab === $key ) ? 'nav-tab-active' : ''; ?>"
						data-tab="<?php echo esc_attr( $key ); ?>"
					>
						<?php echo esc_html( $tab['title'] ); ?>
					</a>

				<?php endforeach; ?>

			</h2>

			<div
				class="rbelad-content"
				id="rbelad-content"
				data-current-tab="<?php echo esc_attr( $current_tab ); ?>"
			>
				<?php

				if (
					isset( $tabs[ $current_tab ]['renderer'] ) &&
					is_callable( $tabs[ $current_tab ]['renderer'] )
				) {
					call_user_func(
						$tabs[ $current_tab ]['renderer']
					);
				}

				?>
			</div>

		</div>

		<?php
	}
}
