<?php
/**
 * Trait: Background Style
 *
 * Provides style controls for background color.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Background_Style {
	/**
	 * Register background color style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param string $class_hover_1 CSS selector for link hover class.
	 * @param string $class_focus_1 CSS selector for link focus class.
	 *
	 * @return void
	 */
	protected function register_bg_style( $prefix, $class_1, $class_hover_1, $class_focus_1 ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix        = is_string( $prefix ) ? $prefix : '';
		$class_1       = is_string( $class_1 ) ? $class_1 : '';
		$class_hover_1 = is_string( $class_hover_1 ) ? $class_hover_1 : '';
		$class_focus_1 = is_string( $class_focus_1 ) ? $class_focus_1 : '';

		// =============================
		// Background Style
		// =============================
		$this->add_style_controls(
			$prefix . '_bg_heading',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_bg_heading',
						'label' => esc_html__( 'Background Style', 'rb-elementor-addons' ),
					),
				),
			)
		);

		// =============================
		// Tabs
		// =============================
		$this->start_controls_tabs( $prefix . '_bg_tabs' );

		// -----------------------------
		// Normal Tab.
		// -----------------------------
		$this->start_controls_tab(
			$prefix . '_bg_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
			)
		);

		$this->add_style_controls(
			$prefix . '_bg_color',
			array(
				'controls' => array(
					'bg_color' => array(
						'id'           => $prefix . '_color_bg',
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
			$prefix . '_bg_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
			)
		);

		$this->add_style_controls(
			$prefix . '_bg_color_hover',
			array(
				'controls' => array(
					'bg_color' => array(
						'id'           => $prefix . '_color_bg_hover',
						'select_class' => $class_hover_1 ? $class_hover_1 : '' . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
					),
				),
			)
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
	}
}
