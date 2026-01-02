<?php
/**
 * Utilities for RB Addons for Elementor.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons;

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Widget_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * Utilities Class.
 *
 * Provides helper methods like tutorial/demo buttons.
 */
class Utilities {

	/**
	 * Add widget library buttons in Elementor panel.
	 *
	 * @param \Elementor\Widget_Base $module Elementor widget instance.
	 * @param string                 $widget_name Widget slug (matches map key).
	 *
	 * @return void
	 */
	public static function add_library_buttons( $module, $widget_name ) {
		$demo_url     = Widget_Manager::get_widget_demo( $widget_name );
		$tutorial_url = Widget_Manager::get_widget_tutorial( $widget_name );
		$doc_url      = Widget_Manager::get_widget_doc( $widget_name );
		$import_url   = Widget_Manager::get_widget_import( $widget_name );

		if ( empty( $demo_url ) && empty( $tutorial_url ) ) {
			return;
		}

		$links = '';

		if ( ! empty( $demo_url ) ) {
			$links .= '<a href="' . esc_url( $demo_url ) . '" target="_blank">'
				. esc_html__( 'Live Demo', 'rb-elementor-addons' )
				. '</a> ';
		}

		if ( ! empty( $import_url ) ) {
			$links .= '<a href="' . esc_url( $import_url ) . '" target="_blank">'
				. esc_html__( 'Import Demos', 'rb-elementor-addons' )
				. '</a>';
		}

		if ( ! empty( $doc_url ) ) {
			$links .= '<a href="' . esc_url( $doc_url ) . '" target="_blank">'
				. esc_html__( 'Documentation', 'rb-elementor-addons' )
				. '</a>';
		}

		if ( ! empty( $tutorial_url ) ) {
			$links .= '<a href="' . esc_url( $tutorial_url ) . '" target="_blank">'
				. esc_html__( 'Video Tutorial', 'rb-elementor-addons' )
				. '</a>';
		}

		$module->add_control(
			'rbelad_library_buttons',
			array(
				'type' => Controls_Manager::RAW_HTML,
				'raw'  => '<div class="rbelad-library-buttons">' . $links . '</div>',
			)
		);
	}
}
