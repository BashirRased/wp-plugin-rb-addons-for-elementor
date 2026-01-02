<?php
/**
 * Trait: Transition Style
 *
 * Provides style controls for transition effect.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Transition_Style {
	/**
	 * Register transition effect style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param string $class_hover_1 CSS selector for link hover class.
	 * @param string $class_focus_1 CSS selector for link focus class.
	 *
	 * @return void
	 */
	protected function register_transition_style( $prefix, $class_1, $class_hover_1, $class_focus_1 ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix        = is_string( $prefix ) ? $prefix : '';
		$class_1       = is_string( $class_1 ) ? $class_1 : '';
		$class_hover_1 = is_string( $class_hover_1 ) ? $class_hover_1 : '';
		$class_focus_1 = is_string( $class_focus_1 ) ? $class_focus_1 : '';

		// =============================
		// Transition Style
		// =============================
		$this->add_style_controls(
			$prefix . '_transition_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_transition_heading',
						'label' => esc_html__( 'Transition Style', 'rb-elementor-addons' ),
					),
				),
			)
		);

		// =============================
		// Tabs
		// =============================
		$this->start_controls_tabs( $prefix . '_transition_tabs' );

			// -----------------------------
			// Normal Tab.
			// -----------------------------
			$this->start_controls_tab(
				$prefix . '_transition_normal_tab',
				array(
					'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
				)
			);
			$this->add_style_controls(
				$prefix . '_transition',
				array(
					'controls' => array(
						'transition_property' => array(
							'id'           => $prefix . '_transition_property',
							'default'      => 'all',
							'select_class' => $class_1,
						),
						'timing_function'     => array(
							'id'           => $prefix . '_timing_function',
							'default'      => 'ease-in-out',
							'select_class' => $class_1,
						),
						'transition_duration' => array(
							'id'           => $prefix . '_transition_duration',
							'default'      => array(
								'unit' => 's',
								'size' => 0.5,
							),
							'select_class' => $class_1,
						),
						'transition_delay'    => array(
							'id'           => $prefix . '_transition_delay',
							'default'      => array(
								'unit' => 's',
								'size' => 0,
							),
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
				$prefix . '_transition_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
				)
			);
			$this->add_style_controls(
				$prefix . '_transition_hover',
				array(
					'controls' => array(
						'transition_duration' => array(
							'id'           => $prefix . '_transition_hover_duration',
							'default'      => array(
								'unit' => 's',
								'size' => 0.5,
							),
							'select_class' => $class_hover_1 ? $class_hover_1 : '' . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
						),
						'transition_delay'    => array(
							'id'           => $prefix . '_transition_hover_delay',
							'default'      => array(
								'unit' => 's',
								'size' => 0,
							),
							'select_class' => $class_hover_1 ? $class_hover_1 : '' . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
						),
					),
				)
			);
			$this->end_controls_tab();

		$this->end_controls_tabs();
	}
}
