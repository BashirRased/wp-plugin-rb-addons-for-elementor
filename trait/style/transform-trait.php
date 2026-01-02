<?php
/**
 * Trait: Transform Style
 *
 * Provides style controls for transform effect.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Transform_Style {
	/**
	 * Register transform effect style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param string $class_hover_1 CSS selector for link hover class.
	 * @param string $class_focus_1 CSS selector for link focus class.
	 *
	 * @return void
	 */
	protected function register_transform_style( $prefix, $class_1, $class_hover_1, $class_focus_1 ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix        = is_string( $prefix ) ? $prefix : '';
		$class_1       = is_string( $class_1 ) ? $class_1 : '';
		$class_hover_1 = is_string( $class_hover_1 ) ? $class_hover_1 : '';
		$class_focus_1 = is_string( $class_focus_1 ) ? $class_focus_1 : '';

		// =============================
		// Transform Style
		// =============================
		$this->add_style_controls(
			$prefix . '_transform_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_transform_heading',
						'label' => esc_html__( 'Transform Style', 'rb-elementor-addons' ),
					),
				),
			)
		);

		// =============================
		// Tabs
		// =============================
		$this->start_controls_tabs( $prefix . '_transform_tabs' );

			// -----------------------------
			// Normal Tab.
			// -----------------------------
			$this->start_controls_tab(
				$prefix . '_transform_normal_tab',
				array(
					'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
				)
			);
			$this->add_style_controls(
				$prefix . '_transform',
				array(
					'controls' => array(
						'transform_controls' => array(
							'id'           => $prefix . '_transform_controls',
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
				$prefix . '_transform_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
				)
			);
			$this->add_style_controls(
				$prefix . '_transform_hover',
				array(
					'controls' => array(
						'transform_controls' => array(
							'id'           => $prefix . '_transform_controls_hover',
							'select_class' => $class_hover_1 ? $class_hover_1 : '' . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
						),
					),
				)
			);
			$this->end_controls_tab();

		$this->end_controls_tabs();
	}
}
