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

	const LICENSE_PAGE_SLUG = 'rbelad-license';

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
	 * Check if current admin page belongs to this plugin.
	 *
	 * Verifies whether the current page matches the plugin
	 * dashboard or license page using the `page` query parameter.
	 *
	 * @return bool True if current page is plugin-related, false otherwise.
	 */
	public static function is_page() {

		if ( ! isset( $_GET['page'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Safe: only checking page slug.
			return false;
		}

		$page = sanitize_text_field(
			wp_unslash(
				$_GET['page'] // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Safe: only reading page slug, no data processing.
			)
		);

		return (
			self::PAGE_SLUG === $page ||
			self::LICENSE_PAGE_SLUG === $page
		);
	}

	/**
	 * Save credentials data.
	 *
	 * @param array $data Form submitted data.
	 * @return void
	 */
	public static function save_credentials_data( $data ) {
		$credentials = ! empty( $data['credentials'] ) ? $data['credentials'] : array();
		Credentials_Manager::save_credentials( $credentials );
	}

	/**
	 * Get fields
	 */
	public static function get_credentials_map() {
		return Credentials_Manager::get_credentials_map();
	}

	/**
	 * Get saved data
	 */
	public static function get_credentials() {
		return Credentials_Manager::get_credentials();
	}

	/**
	 * Add action links for the plugin on the plugins page.
	 *
	 * Adds a "Settings" link for administrators and a "Get Pro" link
	 * when the Pro version is not active.
	 *
	 * @param array $links Existing action links.
	 * @return array Modified action links.
	 */
	public static function add_action_links( $links ) {

		if ( ! current_user_can( 'manage_options' ) ) {
			return $links;
		}

		$settings_link = sprintf(
			'<a href="%s">%s</a>',
			esc_url( rbelad_get_dashboard_link() ),
			esc_html__( 'Settings', 'rb-addons-for-elementor' )
		);

		array_unshift( $links, $settings_link );

		if ( ! rbelad_has_pro() ) {

			$pro_link = sprintf(
				'<a href="%s" target="_blank" style="color:#e2498a; font-weight:bold;">%s</a>',
				esc_url( 'https://bashir-rased.com/go/get-pro' ),
				esc_html__( 'Get Pro', 'rb-addons-for-elementor' )
			);

			$links[] = $pro_link;
		}

		return $links;
	}

	/**
	 * Remove all admin notices on plugin pages.
	 *
	 * Prevents other plugins and WordPress core notices from
	 * displaying on this plugin's admin pages.
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
	 * Category labels - Free.
	 */
	public static function get_free_category_labels() {

		$labels = array(
			'rbelad_addons_basic'    => esc_html__( 'Basic Widgets', 'rb-addons-for-elementor' ),
			'rbelad_addons_general'  => esc_html__( 'General Widgets', 'rb-addons-for-elementor' ),
			'rbelad_addons_creative' => esc_html__( 'Creative Widgets', 'rb-addons-for-elementor' ),
			'rbelad_addons_site'     => esc_html__( 'Site Widgets', 'rb-addons-for-elementor' ),
		);

		return apply_filters( 'rbelad_widget_category_labels', $labels );
	}

	/**
	 * Get free widgets grouped + sorted
	 */
	public static function get_free_widget_map_catwise() {

		$widgets = Widget_Manager::get_free_widgets_map();
		$grouped = array();

		if ( empty( $widgets ) ) {
			return $grouped;
		}

		foreach ( $widgets as $slug => $widget ) {

			$cat = isset( $widget['cat'] )
				? sanitize_text_field( $widget['cat'] )
				: 'uncategorized';

			$grouped[ $cat ][ $slug ] = $widget;
		}

		// Sort widgets.
		foreach ( $grouped as $cat => $items ) {
			uksort( $items, array( __CLASS__, 'sort_widgets' ) );
			$grouped[ $cat ] = $items;
		}

		ksort( $grouped );

		return $grouped;
	}

	/**
	 * Category labels - Pro.
	 */
	public static function get_pro_category_labels() {

		$labels = array(
			'rbelad_pro_general' => esc_html__( 'General Widgets', 'rb-addons-for-elementor' ),
		);

		return apply_filters( 'rbelad_widget_category_labels', $labels );
	}

	/**
	 * Get pro widgets grouped + sorted
	 */
	public static function get_pro_widget_map_catwise() {

		$widgets = Widget_Manager::get_pro_widgets_map();
		$grouped = array();

		if ( empty( $widgets ) ) {
			return $grouped;
		}

		foreach ( $widgets as $slug => $widget ) {

			$cat = isset( $widget['cat'] )
				? sanitize_text_field( $widget['cat'] )
				: 'uncategorized';

			$grouped[ $cat ][ $slug ] = $widget;
		}

		// Sort widgets.
		foreach ( $grouped as $cat => $items ) {
			uksort( $items, array( __CLASS__, 'sort_widgets' ) );
			$grouped[ $cat ] = $items;
		}

		ksort( $grouped );

		return $grouped;
	}

	/**
	 * Sort widgets alphabetically by key.
	 *
	 * @param string $k1 First widget key.
	 * @param string $k2 Second widget key.
	 *
	 * @return int Returns < 0 if $k1 is less than $k2, > 0 if greater, 0 if equal.
	 */
	public static function sort_widgets( $k1, $k2 ) {
		return strcasecmp( $k1, $k2 );
	}

	/**
	 * Save dashboard (AJAX)
	 *
	 * @return void
	 */
	public static function save_data() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error();
		}

		check_ajax_referer( 'rbelad_nonce', 'nonce' );

		// PHPCS SAFE: no direct $_POST usage.
		$raw_data = filter_input( INPUT_POST, 'data', FILTER_UNSAFE_RAW );

		$raw_data = wp_unslash( $raw_data );

		$data = array();
		parse_str( $raw_data, $data );

		$data = self::sanitize_array( $data );

		self::save_widgets_data( $data );

		wp_send_json_success();
	}

	/**
	 * Save widgets data.
	 *
	 * Processes submitted widget data and updates inactive widgets list.
	 *
	 * @param array $data Sanitized dashboard form data.
	 *
	 * @return void
	 */
	public static function save_widgets_data( $data ) {

		$widgets = isset( $data['widgets'] )
			? (array) $data['widgets']
			: array();

		$all = array_keys( Widget_Manager::get_free_widgets_map() );

		$inactive = array_values( array_diff( $all, $widgets ) );

		update_option( 'rbelad_inactive_widgets', $inactive );
	}

	/**
	 * Recursive sanitize
	 *
	 * @param array $data Input data.
	 *
	 * @return array
	 */
	private static function sanitize_array( $data ) {
		foreach ( $data as $key => $value ) {
			$data[ $key ] = is_array( $value )
				? self::sanitize_array( $value )
				: sanitize_text_field( $value );
		}

		return $data;
	}

	/**
	 * Add Admin Menu.
	 *
	 * @return void
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

		$tabs = self::get_tabs();

		if ( is_array( $tabs ) ) {
			foreach ( $tabs as $key => $tab ) {

				if ( empty( $tab['renderer'] ) || ! is_callable( $tab['renderer'] ) ) {
					continue;
				}

				add_submenu_page(
					self::PAGE_SLUG,
					sprintf(
						/* translators: %s: Tab title. */
						esc_html__( '%s - RB Addons', 'rb-addons-for-elementor' ),
						$tab['title']
					),
					$tab['title'],
					'manage_options',
					self::PAGE_SLUG . '&tab=' . $key,
					array( __CLASS__, 'render_dashboard' )
				);
			}
		}

		// Theme Builder submenu.
		add_submenu_page(
			self::PAGE_SLUG,
			esc_html__( 'Theme Builder', 'rb-addons-for-elementor' ),
			esc_html__( 'Theme Builder', 'rb-addons-for-elementor' ),
			'manage_options',
			'edit.php?post_type=rbelad_library'
		);
	}

	/**
	 * Remove the first duplicate submenu item (default top-level page).
	 *
	 * @return void
	 */
	public static function update_menu_items() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		global $submenu;

		if ( isset( $submenu[ self::PAGE_SLUG ] ) && is_array( $submenu[ self::PAGE_SLUG ] ) ) {
			// Remove the first item (duplicate top-level menu link).
			array_shift( $submenu[ self::PAGE_SLUG ] );
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
				'title'    => esc_html__( 'Home', 'rb-addons-for-elementor' ),
				'renderer' => array( __CLASS__, 'render_home' ),
			),
			'free-widgets' => array(
				'title'    => esc_html__( 'Free Widgets', 'rb-addons-for-elementor' ),
				'renderer' => array( __CLASS__, 'render_free_widgets' ),
			),
			'pro-widgets'  => array(
				'title'    => esc_html__( 'Pro Widgets', 'rb-addons-for-elementor' ),
				'renderer' => array( __CLASS__, 'render_pro_widgets' ),
			),
			'extends'      => array(
				'title'    => esc_html__( 'Extends', 'rb-addons-for-elementor' ),
				'renderer' => array( __CLASS__, 'render_extends' ),
			),
			'credentials'  => array(
				'title'    => esc_html__( 'Credentials', 'rb-addons-for-elementor' ),
				'renderer' => array( __CLASS__, 'render_credentials' ),
			),
		);

		return apply_filters( 'rbelad_dashboard_tabs', $tabs );
	}

	/**
	 * Load dashboard template file.
	 *
	 * Includes a template file from the admin templates directory
	 * if it exists and is readable.
	 *
	 * @param string $template Template file name without extension.
	 *
	 * @return void
	 */
	private static function load_template( $template ) {
		$file = RBELAD_ADMIN . $template . '.php';
		if ( is_readable( $file ) ) {
			include $file;
		}
	}

	/**
	 * Render home tab content.
	 *
	 * @return void
	 */
	public static function render_home() {
		self::load_template( 'main' );
	}

	/**
	 * Render free-widgets tab content.
	 *
	 * @return void
	 */
	public static function render_free_widgets() {
		self::load_template( 'free-widgets' );
	}

	/**
	 * Render pro-widgets tab content.
	 *
	 * @return void
	 */
	public static function render_pro_widgets() {
		self::load_template( 'pro-widgets' );
	}

	/**
	 * Render extends tab content.
	 *
	 * @return void
	 */
	public static function render_extends() {
		self::load_template( 'extends' );
	}

	/**
	 * Render credentials tab content.
	 *
	 * @return void
	 */
	public static function render_credentials() {
		self::load_template( 'credentials' );
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
			'rbelad-layout',
			RBELAD_CSS . 'layout.css',
			array(),
			RBELAD_DEV_VERSION
		);

		wp_enqueue_style(
			'rbelad-general-icons',
			RBELAD_CSS . 'rbelad-general-icons.css',
			array(),
			RBELAD_DEV_VERSION
		);

		wp_enqueue_style(
			'rbelad-dashboard',
			RBELAD_CSS . 'dashboard.css',
			array(),
			RBELAD_DEV_VERSION
		);

		wp_enqueue_script(
			'rbelad-dashboard',
			RBELAD_JS . 'dashboard.js',
			array( 'jquery' ),
			RBELAD_DEV_VERSION,
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
	 *
	 * @return void
	 */
	public static function render_dashboard() {
		$tabs = self::get_tabs();

		$current_tab = 'home';

		if ( isset(
			$_GET['tab'] // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Safe: used only for tab navigation, no data processing.
		) ) {
			$current_tab = sanitize_text_field(
				wp_unslash(
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Safe: used only for tab navigation, no data processing.
					$_GET['tab']
				)
			);
		}

		// Fallback.
		if ( ! isset( $tabs[ $current_tab ] ) ) {
			$current_tab = 'home';
		}
		?>

		<div class="wrap rbelad-dashboard">
			<h1><?php esc_html_e( 'RB Addons Dashboard', 'rb-addons-for-elementor' ); ?></h1>

			<h2 class="nav-tab-wrapper">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<a href="
					<?php
					echo esc_url(
						admin_url( 'admin.php?page=' . self::PAGE_SLUG . '&tab=' . $key )
					);
					?>
					"
					class="nav-tab <?php echo ( $current_tab === $key ) ? 'nav-tab-active' : ''; ?>">
						<?php echo esc_html( $tab['title'] ); ?>
					</a>
				<?php endforeach; ?>
			</h2>

			<div class="rbelad-content">
				<?php
				// THIS IS THE KEY PART.
				if ( isset( $tabs[ $current_tab ]['renderer'] ) && is_callable( $tabs[ $current_tab ]['renderer'] ) ) {
					call_user_func( $tabs[ $current_tab ]['renderer'] );
				}
				?>
			</div>
		</div>

		<?php
	}
}