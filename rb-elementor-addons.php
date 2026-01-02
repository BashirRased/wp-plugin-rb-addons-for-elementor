<?php
/**
 * Plugin Name: RB Elementor Addons
 * Description: RB Elementor Addons plugin you install after Elementor! Packed with 45+ stunning elements including WordPress core widget and custom widget.
 * Plugin URI:  https://github.com/BashirRased/wp-plugin-rb-elementor-addons
 * Version:     1.0.0
 * Author:      Bashir Rased
 * Author URI:  https://bashirrased.com/
 * Text Domain: rb-elementor-addons
 * Domain Path: /languages
 * Elementor Pro tested up to: 3.30.0
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * [PHP]
 * Requires PHP: 7.4
 *
 * [WP]
 * Requires at least: 5.8
 * Tested up to: 6.8
 *
 * [Elementor]
 * Elementor requires at least: 3.30.0
 * Elementor tested up to: 3.30.0
 *
 * [WC]
 * WC requires at least: 5.9
 * WC tested up to: 6.7
 *
 * @package RBAddons
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Define Files
*/
define( 'RB_ADDONS_VERSION', '1.0.0' );
define( 'RB_ADDONS_PATH', plugin_dir_path( __FILE__ ) );
define( 'RB_ADDONS_COMMON', RB_ADDONS_PATH . '/inc/common/' );
define( 'RB_ADDONS_GLOBAL', RB_ADDONS_PATH . '/inc/global/' );
define( 'RB_ADDONS_WIDGET', RB_ADDONS_PATH . '/inc/addons/' );

define( 'RB_ADDONS_PRO_WIDGET', RB_ADDONS_PATH . '/inc/pro-addons/' );

define( 'RB_ADDONS_DIR_PATH', plugin_dir_path( RB_ADDONS_PATH ) );
define( 'RB_ADDONS_DIR_URL', plugin_dir_url( RB_ADDONS_PATH ) );
define( 'RB_ADDONS_ASSETS', trailingslashit( RB_ADDONS_DIR_URL . 'rb-elementor-addons/assets' ) );
define( 'RB_ADDONS_ICON', trailingslashit( RB_ADDONS_DIR_URL . 'rb-elementor-addons/assets/icons/' ) );
define( 'RB_ADDONS_PRO_ACTIVE', true );


/**
 * Main Elementor Class
 */
require ( RB_ADDONS_COMMON . "/final-class.php" );

/**
 * Get common plugin functions
 */
require ( RB_ADDONS_GLOBAL . "/functions.php" );

/**
 * Get common options
 */
require ( RB_ADDONS_GLOBAL . "/get-options.php" );

/**
 * Choose style options
 */
require ( RB_ADDONS_GLOBAL . "/choose-options.php" );

require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';

