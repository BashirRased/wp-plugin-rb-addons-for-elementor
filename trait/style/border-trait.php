<?php
/**
 * Trait: Border Style
 *
 * Provides style controls for border color, width, style, radius, box-shadow.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Border_Style {
	/**
	 * Register border color, width, style, radius, box-shadow style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param string $class_hover_1 CSS selector for link hover class.
	 * @param string $class_focus_1 CSS selector for link focus class.
	 *
	 * @return void
	 */
	protected function register_border_style( $prefix, $class_1, $class_hover_1, $class_focus_1 ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix        = is_string( $prefix ) ? $prefix : '';
		$class_1       = is_string( $class_1 ) ? $class_1 : '';
		$class_hover_1 = is_string( $class_hover_1 ) ? $class_hover_1 : '';
		$class_focus_1 = is_string( $class_focus_1 ) ? $class_focus_1 : '';

		// =============================
		// Border Style
		// =============================
		$this->add_style_controls(
			$prefix . '_border_heading',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_border_heading',
						'label' => esc_html__( 'Border Style', 'rb-elementor-addons' ),
					),
				),
			)
		);

		// =============================
		// Tabs
		// =============================
		$this->start_controls_tabs( $prefix . '_border_tabs' );

		// -----------------------------
		// Normal Tab.
		// -----------------------------
		$this->start_controls_tab(
			$prefix . '_border_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
			)
		);

		$this->add_style_controls(
			$prefix . '_border_color',
			array(
				'controls' => array(
					'border'        => array(
						'name'         => $prefix . '_border',
						'select_class' => $class_1,
					),
					'border_radius' => array(
						'id'           => $prefix . '_border_radius',
						'select_class' => $class_1,
					),
					'box_shadow'    => array(
						'name'         => $prefix . '_box_shadow',
						'select_class' => $class_1,
					),
				),
			)
		);

		$this->end_controls_tab();

		// -----------------------------
		// Hover Tab.
		// -----------------------------
		$this->start_controls_tab(
			$prefix . '_border_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
			)
		);

		$this->add_style_controls(
			$prefix . '_border_color_hover',
			array(
				'controls' => array(
					'border_color'  => array(
						'id'           => $prefix . '_hover_border_color',
						'default'      => RBELAD_PRIMARY_COLOR,
						'select_class' => $class_hover_1 ? $class_hover_1 : '' . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
					),
					'border_radius' => array(
						'id'           => $prefix . '_hover_border_radius',
						'select_class' => $class_hover_1 ? $class_hover_1 : '' . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
					),
					'box_shadow'    => array(
						'name'         => $prefix . '_hover_box_shadow',
						'select_class' => $class_hover_1 ? $class_hover_1 : '' . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
					),
				),
			)
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
	}
}
