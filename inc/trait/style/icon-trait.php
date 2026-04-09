<?php
/**
 * Trait: Icon Style
 *
 * Provides style controls for icon.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Icon_Style {
	/**
	 * Register icon style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param string $class_2 CSS selector for general class.
	 * @param string $class_hover_1 CSS selector for link hover class.
	 * @param string $class_focus_1 CSS selector for link focus class.
	 * @param string $class_hover_2 CSS selector for link hover class.
	 * @param string $class_focus_2 CSS selector for link focus class.
	 * @param string $default_fill_color Default color set for color.
	 * @param string $default_fill_color_hover Default color set for color.
	 *
	 * @return void
	 */
	protected function register_icon_style( $prefix, $class_1, $class_2, $class_hover_1, $class_focus_1, $class_hover_2, $class_focus_2, $default_fill_color, $default_fill_color_hover ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix                   = is_string( $prefix ) ? $prefix : '';
		$class_1                  = is_string( $class_1 ) ? $class_1 : '';
		$class_hover_1            = is_string( $class_hover_1 ) ? $class_hover_1 : '';
		$class_focus_1            = is_string( $class_focus_1 ) ? $class_focus_1 : '';
		$class_hover_2            = is_string( $class_hover_2 ) ? $class_hover_2 : '';
		$class_focus_2            = is_string( $class_focus_2 ) ? $class_focus_2 : '';
		$default_fill_color       = is_string( $default_fill_color ) ? $default_fill_color : '';
		$default_fill_color_hover = is_string( $default_fill_color_hover ) ? $default_fill_color_hover : '';

		// =============================
		// Icon Style
		// =============================
		$this->add_style_controls(
			$prefix . '_fill_color_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_fill_color_heading',
						'label' => esc_html__( 'Icon Style', 'rb-addons-for-elementor' ),
					),
				),
			),
		);

		// =============================
		// Tabs
		// =============================
		$this->start_controls_tabs( $prefix . '_fill_color_tabs' );

		// -----------------------------
		// Normal Tab.
		// -----------------------------
		$this->start_controls_tab(
			$prefix . '_fill_color_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
			)
		);

		$this->add_style_controls(
			$prefix . '_fill_color_color',
			array(
				'controls' => array(
					'fill_color' => array(
						'id'             => $prefix . 'fill_color',
						'default'        => $default_fill_color,
						'select_class'   => $class_1,
						'select_class_2' => $class_2,
					),
				),
			)
		);

		$this->end_controls_tab();

		// -----------------------------
		// Hover Tab.
		// -----------------------------
		$this->start_controls_tab(
			$prefix . '_fill_color_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
			)
		);

		$this->add_style_controls(
			$prefix . '_fill_color_color_hover',
			array(
				'controls' => array(
					'fill_color' => array(
						'id'             => $prefix . 'fill_color_hover',
						'default'        => $default_fill_color_hover,
						'select_class'   => $class_hover_1 ? $class_hover_1 : '' . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
						'select_class_2' => $class_hover_2 ? $class_hover_2 : '' . ( $class_focus_2 ? ', ' . $class_focus_2 : '' ),
					),
				),
			)
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
	}
}
