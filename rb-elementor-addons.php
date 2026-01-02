<?php
/**
 * Plugin Name: RB Addons for Elementor
 * Plugin URI:  https://github.com/BashirRased/wp-plugin-rb-addons-for-elementor
 * Description: Adds 45+ Elementor widgets, including WordPress core widgets and custom widgets.
 * Version:     1.0.3
 * Author:      Bashir Rased
 * Author URI:  https://bashirrased.com/
 * Text Domain: rb-elementor-addons
 * Domain Path: /languages
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires Plugins: elementor
 * Requires PHP: 7.4
 * Requires at least: 5.8
 * Tested up to: 6.8
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
define( 'RBELAD_VERSION', '1.0.3' );

// Extra helpful constants.
define( 'RBELAD_ASSETS', trailingslashit( RBELAD_PLUGIN_URL . 'assets' ) );
define( 'RBELAD_ICONS', trailingslashit( RBELAD_PLUGIN_URL . 'assets/icons' ) );
define( 'RBELAD_INC', trailingslashit( RBELAD_PLUGIN_DIR . 'inc' ) );
define( 'RBELAD_WIDGETS', trailingslashit( RBELAD_PLUGIN_DIR . 'inc/addons' ) );
define( 'RBELAD_GLOBAL', trailingslashit( RBELAD_PLUGIN_DIR . 'inc/global' ) );
define( 'RBELAD_CLASS', trailingslashit( RBELAD_PLUGIN_DIR . 'class' ) );
define( 'RBELAD_TRAIT', trailingslashit( RBELAD_PLUGIN_DIR . 'trait' ) );
define( 'RBELAD_TRAIT_CONTENT', trailingslashit( RBELAD_PLUGIN_DIR . 'trait/content/' ) );
define( 'RBELAD_TRAIT_STYLE', trailingslashit( RBELAD_PLUGIN_DIR . 'trait/style/' ) );
define( 'RBELAD_TRAIT_RENDER', trailingslashit( RBELAD_PLUGIN_DIR . 'trait/render/' ) );
define( 'RBELAD_ADMIN', trailingslashit( RBELAD_PLUGIN_DIR . 'admin' ) );

// Theme colors.
define( 'RBELAD_PRIMARY_COLOR', '#007bff' );
define( 'RBELAD_BLACK_COLOR', '#000000' );
define( 'RBELAD_WHITE_COLOR', '#ffffff' );
define( 'RBELAD_TEXT_COLOR', '#777777' );

// Theme typography.
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
define( 'RBELAD_PRIMARY_TEXT', Global_Typography::TYPOGRAPHY_PRIMARY );
define( 'RBELAD_SECONDARY_TEXT', Global_Typography::TYPOGRAPHY_SECONDARY );
define( 'RBELAD_ACCENT_TEXT', Global_Typography::TYPOGRAPHY_ACCENT );
define( 'RBELAD_GENERAL_TEXT', Global_Typography::TYPOGRAPHY_TEXT );

/**
 * Main Elementor Class
 */
require RBELAD_CLASS . '/class-rbelad-elementor-addons.php';

/**
 * Plugin Dashboard.
 */
require_once RBELAD_CLASS . 'class-dashboard.php';

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
