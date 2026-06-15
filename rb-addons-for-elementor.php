<?php
/**
 * Plugin Name: RB Addons for Elementor
 * Plugin URI: https://github.com/BashirRased/wp-plugin-rb-addons-for-elementor
 * Description: Powerful Elementor widgets and extensions for building modern websites.
 * Version: 2.0.0
 * Author: Bashir Rased
 * Author URI: https://bashirrased.dev/
 * Requires Plugins: elementor
 * Requires at least: 6.5
 * Tested up to: 6.9
 * Requires PHP: 7.4
 * Elementor tested up to: 4.1
 * Elementor Pro tested up to: 4.1
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: rb-addons-for-elementor
 * Domain Path: /languages/
 *
 * @package    RBELAD_Elementor_Addons
 */

defined( 'ABSPATH' ) || exit;

/**
 * Plugin constants.
 */
define( 'RBELAD_VERSION', '2.0.0' );

define( 'RBELAD_FILE', __FILE__ );
define( 'RBELAD_BASENAME', plugin_basename( RBELAD_FILE ) );

define( 'RBELAD_PATH', plugin_dir_path( RBELAD_FILE ) );
define( 'RBELAD_URL', plugin_dir_url( RBELAD_FILE ) );

define( 'RBELAD_ASSETS_PATH', RBELAD_PATH . 'assets/' );
define( 'RBELAD_ASSETS_URL', RBELAD_URL . 'assets/' );

define( 'RBELAD_CLASSES_PATH', RBELAD_PATH . 'classes/' );

define( 'RBELAD_WIDGET_PATH', RBELAD_PATH . 'widgets/' );
define( 'RBELAD_WIDGET_URL', RBELAD_URL . 'widgets/' );

define( 'RBELAD_GLOBAL_PATH', RBELAD_PATH . 'global/' );
define( 'RBELAD_GLOBAL_URL', RBELAD_URL . 'global/' );

define( 'RBELAD_MINIMUM_PHP_VERSION', '7.4' );
define( 'RBELAD_MINIMUM_WP_VERSION', '6.5' );
define( 'RBELAD_MINIMUM_ELEMENTOR_VERSION', '3.7.0' );

/**
 * Bootstrap plugin.
 *
 * @return void
 */
function rbelad_init() {

	// PHP Version Check.
	if ( version_compare( PHP_VERSION, RBELAD_MINIMUM_PHP_VERSION, '<' ) ) {
		add_action( 'admin_notices', 'rbelad_php_notice' );
		return;
	}

	// Elementor Check.
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'rbelad_elementor_notice' );
		return;
	}

	// Elementor Version Check.
	if ( version_compare( ELEMENTOR_VERSION, RBELAD_MINIMUM_ELEMENTOR_VERSION, '<' ) ) {
		add_action( 'admin_notices', 'rbelad_elementor_version_notice' );
		return;
	}

	require_once RBELAD_CLASSES_PATH . 'class-plugin.php';

	\RBELAD_Elementor_Addons\Plugin::instance()->init();
}

add_action( 'plugins_loaded', 'rbelad_init', 10 );

/**
 * PHP notice.
 *
 * @return void
 */
function rbelad_php_notice() {
	?>
	<div class="notice notice-warning">
		<p>
			<?php
			printf(
				/* translators: 1: Plugin name, 2: Minimum PHP version. */
				esc_html__( '"%1$s" requires PHP version %2$s or greater.', 'rb-addons-for-elementor' ),
				esc_html( 'RB Addons for Elementor' ),
				esc_html( RBELAD_MINIMUM_PHP_VERSION )
			);
			?>
		</p>
	</div>
	<?php
}

/**
 * Elementor missing notice.
 *
 * @return void
 */
function rbelad_elementor_notice() {
	?>
	<div class="notice notice-warning">
		<p>
			<?php
			/* translators: 1: Plugin name, 2: PHP version */
			esc_html_e(
				'RB Addons for Elementor requires Elementor to be installed and activated.',
				'rb-addons-for-elementor'
			);
			?>
		</p>
	</div>
	<?php
}

/**
 * Elementor version notice.
 *
 * @return void
 */
function rbelad_elementor_version_notice() {
	?>
	<div class="notice notice-warning">
		<p>
			<?php
			printf(
				/* translators: 1: Plugin name, 2: Minimum Elementor version. */
				esc_html__( '"%1$s" requires Elementor version %2$s or greater.', 'rb-addons-for-elementor' ),
				esc_html( 'RB Addons for Elementor' ),
				esc_html( RBELAD_MINIMUM_ELEMENTOR_VERSION )
			);
			?>
		</p>
	</div>
	<?php
}

/**
 * Plugin activation.
 *
 * @return void
 */
function rbelad_activate() {

	add_option( 'rbelad_activation_redirect', true );
	add_option( 'rbelad_activation_time', time() );
}

register_activation_hook( RBELAD_FILE, 'rbelad_activate' );
