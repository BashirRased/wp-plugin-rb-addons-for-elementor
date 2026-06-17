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
 * Tested up to: 7.0
 * Requires PHP: 7.4
 * Elementor tested up to: 4.1
 * Elementor Pro tested up to: 4.1
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: rb-addons-for-elementor
 * Domain Path: /languages
 *
 * @package    RBELAD_Elementor_Addons
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2026 Bashir Rased <https://bashirrased.dev/>
*/

defined( 'ABSPATH' ) || exit;

/**
 * Plugin constants.
 */
if ( defined( 'RBELAD_VERSION_DEV' ) && true === RBELAD_VERSION_DEV ) {
	define( 'RBELAD_VERSION', '2.0.0' . time() );
} else {
	define( 'RBELAD_VERSION', '2.0.0' );
}

define( 'RBELAD_FILE', __FILE__ );
define( 'RBELAD_BASENAME', plugin_basename( RBELAD_FILE ) );

define( 'RBELAD_PATH', plugin_dir_path( RBELAD_FILE ) );
define( 'RBELAD_URL', plugin_dir_url( RBELAD_FILE ) );

define( 'RBELAD_ASSETS_PATH', RBELAD_PATH . 'assets/' );
define( 'RBELAD_ASSETS_URL', RBELAD_URL . 'assets/' );

define( 'RBELAD_CSS_PATH', RBELAD_PATH . 'assets/css/' );
define( 'RBELAD_CSS_URL', RBELAD_URL . 'assets/css/' );

define( 'RBELAD_CLASSES_PATH', RBELAD_PATH . 'classes/' );

define( 'RBELAD_WIDGET_PATH', RBELAD_PATH . 'widgets/' );
define( 'RBELAD_WIDGET_URL', RBELAD_URL . 'widgets/' );

define( 'RBELAD_GLOBAL_PATH', RBELAD_PATH . 'global/' );
define( 'RBELAD_GLOBAL_URL', RBELAD_URL . 'global/' );

define( 'RBELAD_TRAIT_CONTENT_PATH', RBELAD_PATH . 'trait/content/' );
define( 'RBELAD_TRAIT_CONTENT_URL', RBELAD_URL . 'trait/content/' );

define( 'RBELAD_TRAIT_STYLE_PATH', RBELAD_PATH . 'trait/style/' );
define( 'RBELAD_TRAIT_STYLE_URL', RBELAD_URL . 'trait/style/' );

define( 'RBELAD_MINIMUM_PHP_VERSION', '7.4' );
define( 'RBELAD_MINIMUM_WP_VERSION', '6.5' );
define( 'RBELAD_MINIMUM_ELEMENTOR_VERSION', '3.7.0' );

/**
 * The journey of a thousand miles starts here.
 *
 * @return void Some voids are not really void, you have to explore to figure out why not!
 */
function rbelad_let_the_journey_begin() {
	include_once RBELAD_GLOBAL_PATH . 'allow-tag-functions.php';
	include_once RBELAD_GLOBAL_PATH . 'content-options-functions.php';

	// Check for required PHP version.
	if ( version_compare( PHP_VERSION, RBELAD_MINIMUM_PHP_VERSION, '<' ) ) {
		add_action( 'admin_notices', 'rbelad_required_php_version_missing_notice' );
		return;
	}

	// Check if Elementor installed and activated.
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'rbelad_elementor_missing_notice' );
		return;
	}

	// Check for required Elementor version.
	if ( ! version_compare( ELEMENTOR_VERSION, RBELAD_MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
		add_action( 'admin_notices', 'rbelad_required_elementor_version_missing_notice' );
		return;
	}

	require RBELAD_CLASSES_PATH . 'class-plugin.php';
	\RBELAD_Elementor_Addons\Plugin::instance()->init();
}

add_action( 'plugins_loaded', 'rbelad_let_the_journey_begin' );

/**
 * Admin notice for required php version
 *
 * @return void
 */
function rbelad_required_php_version_missing_notice() {
	$notice = sprintf(
		/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
		esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'rb-addons-for-elementor' ),
		'<strong>' . esc_html__( 'RB Addons for Elementor', 'rb-addons-for-elementor' ) . '</strong>',
		'<strong>' . esc_html__( 'PHP', 'rb-addons-for-elementor' ) . '</strong>',
		RBELAD_MINIMUM_PHP_VERSION
	);

	echo '<div class="notice notice-warning is-dismissible"><p style="padding: 13px 0">' . wp_kses_post( $notice ) . '</p></div>';
}

/**
 * Admin notice for elementor if missing
 *
 * @return void
 */
function rbelad_elementor_missing_notice() {

	if ( file_exists( WP_PLUGIN_DIR . '/elementor/elementor.php' ) ) {
		$notice_title = esc_html__( 'Activate Elementor', 'rb-addons-for-elementor' );
		$notice_url   = wp_nonce_url( 'plugins.php?action=activate&plugin=elementor/elementor.php&plugin_status=all&paged=1', 'activate-plugin_elementor/elementor.php' );
	} else {
		$notice_title = __( 'Install Elementor', 'rb-addons-for-elementor' );
		$notice_url   = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
	}

	$notice = rbelad_kses_intermediate(
		sprintf(
		/* translators: 1: Plugin name 2: Elementor 3: Elementor installation link */
			esc_html__( '%1$s requires %2$s to be installed and activated to function properly. %3$s', 'rb-addons-for-elementor' ),
			'<strong>' . esc_html__( 'RB Addons for Elementor', 'rb-addons-for-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'rb-addons-for-elementor' ) . '</strong>',
			'<a href="' . esc_url( $notice_url ) . '">' . $notice_title . '</a>'
		)
	);

	echo '<div class="notice notice-warning is-dismissible"><p style="padding: 13px 0">' . wp_kses_post( $notice ) . '</p></div>';
}

/**
 * Admin notice for required elementor version
 *
 * @return void
 */
function rbelad_required_elementor_version_missing_notice() {

	$notice_title = __( 'Update Elementor', 'rb-addons-for-elementor' );
	$notice_url   = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=elementor/elementor.php' ), 'upgrade-plugin_elementor/elementor.php' );

	$notice = sprintf(
		/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
		esc_html__( '"%1$s" requires "%2$s" version %4$s or greater. %3$s', 'rb-addons-for-elementor' ),
		'<strong>' . esc_html__( 'RB Addons for Elementor', 'rb-addons-for-elementor' ) . '</strong>',
		'<strong>' . esc_html__( 'Elementor', 'rb-addons-for-elementor' ) . '</strong>',
		'<a href="' . esc_url( $notice_url ) . '">' . $notice_title . '</a>',
		RBELAD_MINIMUM_ELEMENTOR_VERSION
	);

	echo '<div class="notice notice-warning is-dismissible"><p style="padding: 13px 0">' . wp_kses_post( $notice ) . '</p></div>';
}

/**
 * Add CSS & JS Files
 */
function rbelad_addons_styles() {
	wp_enqueue_style( 'rbelad-default', RBELAD_CSS_URL . 'rbelad-default.css', null, time(), 'all' );
}
add_action( 'wp_enqueue_scripts', 'rbelad_addons_styles' );
