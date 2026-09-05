<?php
/**
 * Font Icons
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Classes;

defined( 'ABSPATH' ) || exit;

/**
 * RB Addons Icons Manager.
 */
class Icons_Manager {
	/**
	 * Register RB Addons icon set with Elementor.
	 *
	 * @param array $tabs Existing icon tabs.
	 * @return array
	 */
	public static function add_rbelad_icons_tab( $tabs ) {
		$tabs['rbelad-general-icons'] = array(
			'name'          => 'rbelad-general-icons',
			'label'         => esc_html__( 'RB General Icons', 'rb-addons-for-elementor' ),
			'url'           => RBELAD_CSS_URL . 'rbelad-general-icons.css',
			'enqueue'       => array(
				RBELAD_CSS_URL . 'rbelad-general-icons.css',
			),
			'prefix'        => 'rbelad-gi-',
			'displayPrefix' => 'rbelad-gi',
			'labelIcon'     => 'rbelad-wi rbelad-wi-plugin',
			'ver'           => RBELAD_VERSION,
			'fetchJson'     => RBELAD_JS_URL . 'rbelad-general-icons.js',
			'native'        => false,
		);

		$tabs['rbelad-widget-icons'] = array(
			'name'          => 'rbelad-widget-icons',
			'label'         => esc_html__( 'RB Widget Icons', 'rb-addons-for-elementor' ),
			'url'           => RBELAD_CSS_URL . 'rbelad-widget-icons.css',
			'enqueue'       => array(
				RBELAD_CSS_URL . 'rbelad-widget-icons.css',
			),
			'prefix'        => 'rbelad-wi-',
			'displayPrefix' => 'rbelad-wi',
			'labelIcon'     => 'rbelad-wi rbelad-wi-plugin',
			'ver'           => RBELAD_VERSION,
			'fetchJson'     => RBELAD_JS_URL . 'rbelad-widget-icons.js',
			'native'        => false,
		);

		$tabs['rbelad-phosphor-icons'] = array(
			'name'          => 'rbelad-phosphor-icons',
			'label'         => esc_html__( 'RB Phosphor Icons', 'rb-addons-for-elementor' ),
			'url'           => RBELAD_CSS_URL . 'rbelad-phosphor-icons.css',
			'enqueue'       => array(
				RBELAD_CSS_URL . 'rbelad-phosphor-icons.css',
			),
			'prefix'        => 'rbelad-ph-',
			'displayPrefix' => 'rbelad-ph',
			'labelIcon'     => 'rbelad-ph rbelad-ph-phosphor-regular',
			'ver'           => RBELAD_VERSION,
			'fetchJson'     => RBELAD_JS_URL . 'rbelad-phosphor-icons.js',
			'native'        => false,
		);

		$tabs['rbelad-phosphor-b-icons'] = array(
			'name'          => 'rbelad-phosphor-b-icons',
			'label'         => esc_html__( 'RB Phosphor Bold Icons', 'rb-addons-for-elementor' ),
			'url'           => RBELAD_CSS_URL . 'rbelad-phosphor-b-icons.css',
			'enqueue'       => array(
				RBELAD_CSS_URL . 'rbelad-phosphor-b-icons.css',
			),
			'prefix'        => 'rbelad-ph-b-',
			'displayPrefix' => 'rbelad-ph-b',
			'labelIcon'     => 'rbelad-ph-b rbelad-ph-b-phosphor-bold',
			'ver'           => RBELAD_VERSION,
			'fetchJson'     => RBELAD_JS_URL . 'rbelad-phosphor-icons.js',
			'native'        => false,
		);
		return $tabs;
	}

	/**
	 * Get RB Addons icons.
	 *
	 * @return array
	 */
	public static function get_rbelad_icons() {
		$rbelad_general_icons    = require RBELAD_GLOBAL_PATH . 'general-icons.php';
		$rbelad_widget_icons     = require RBELAD_GLOBAL_PATH . 'widget-icons.php';
		$rbelad_phosphor_icons   = require RBELAD_GLOBAL_PATH . 'phosphor-regular-icons.php';
		$rbelad_phosphor_b_icons = require RBELAD_GLOBAL_PATH . 'phosphor-bold-icons.php';

		return array_merge(
			$rbelad_general_icons,
			$rbelad_widget_icons,
			$rbelad_phosphor_icons,
			$rbelad_phosphor_b_icons
		);
	}
}
