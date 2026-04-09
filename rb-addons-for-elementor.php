<?php
/**
 * Plugin Name: RB Addons for Elementor
 * Plugin URI:  https://github.com/BashirRased/wp-plugin-rb-addons-for-elementor
 * Description: Supercharge your Elementor workflow with a collection of lightweight, high-performance custom widgets designed for modern web design.
 * Version:     1.0.4
 * Author:      Bashir Rased
 * Author URI:  https://bashirrased.com/
 * Text Domain: rb-addons-for-elementor
 * Domain Path: /languages
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires Plugins: elementor
 * Requires PHP: 7.4
 * Requires at least: 6.6
 * Tested up to: 6.9
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define main file constant once.
define( 'RBELAD_PLUGIN_FILE', __FILE__ );
define( 'RBELAD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'RBELAD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'RBELAD_VERSION', '1.0.4' );

// Extra helpful constants.
define( 'RBELAD_ASSETS', trailingslashit( RBELAD_PLUGIN_URL . 'assets' ) );
define( 'RBELAD_ICONS', trailingslashit( RBELAD_PLUGIN_URL . 'assets/icons' ) );
define( 'RBELAD_CSS', trailingslashit( RBELAD_PLUGIN_URL . 'assets/css/' ) );
define( 'RBELAD_JS', trailingslashit( RBELAD_PLUGIN_URL . 'assets/js/' ) );
define( 'RBELAD_INC', trailingslashit( RBELAD_PLUGIN_DIR . 'inc' ) );
define( 'RBELAD_WIDGETS', trailingslashit( RBELAD_PLUGIN_DIR . 'inc/addons' ) );
define( 'RBELAD_GLOBAL', trailingslashit( RBELAD_PLUGIN_DIR . 'inc/global' ) );
define( 'RBELAD_EXTENDS', trailingslashit( RBELAD_PLUGIN_DIR . 'inc/extends' ) );
define( 'RBELAD_TRAIT_CONTENT', trailingslashit( RBELAD_PLUGIN_DIR . 'inc/trait/content/' ) );
define( 'RBELAD_TRAIT_STYLE', trailingslashit( RBELAD_PLUGIN_DIR . 'inc/trait/style/' ) );
define( 'RBELAD_TRAIT_RENDER', trailingslashit( RBELAD_PLUGIN_DIR . 'inc/trait/render/' ) );
define( 'RBELAD_CLASS', trailingslashit( RBELAD_PLUGIN_DIR . 'class' ) );

/**
 * Main Elementor Class
 */
require RBELAD_CLASS . '/class-rbelad-elementor-addons.php';

/**
 * Get common plugin functions
 */
require RBELAD_GLOBAL . '/functions.php';

/**
 * Get common options
 */
require RBELAD_GLOBAL . '/get-options.php';

/**
 * Choose style options
 */
require RBELAD_GLOBAL . '/choose-options.php';

register_activation_hook(
	RBELAD_PLUGIN_FILE,
	function () {
		if ( ! get_option( 'rbelad_activation_time' ) ) {
			update_option( 'rbelad_activation_time', time() );
		}
	}
);
