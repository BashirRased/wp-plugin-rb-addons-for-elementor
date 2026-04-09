<?php
/**
 * Trait: Transition Style
 *
 * Provides style controls for transition effect.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Transition_Style {
	/**
	 * Register transition effect style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param array  $classes CSS selectors list.
	 *
	 * @return void
	 */
	protected function register_transition_style( $prefix, $classes = array() ) {
		$prefix = is_string( $prefix ) ? $prefix : '';

		// Default classes.
		$default_classes = array(
			'class_1'       => '',
			'class_hover_1' => '',
			'class_focus_1' => '',
		);

		// Merge user values.
		$classes = wp_parse_args( $classes, $default_classes );

		$class_1       = $classes['class_1'];
		$class_hover_1 = $classes['class_hover_1'];
		$class_focus_1 = $classes['class_focus_1'];

		// =============================
		// Transition Style
		// =============================
		$this->add_style_controls(
			$prefix . '_transition_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_transition_heading',
						'label' => esc_html__( 'Transition Style', 'rb-addons-for-elementor' ),
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
					'label' => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
				)
			);
			$this->add_style_controls(
				$prefix . '_transition',
				array(
					'controls' => array(
						'transition_property' => array(
							'id'           => $prefix . '_transition_property',
							'select_class' => $class_1,
						),
						'timing_function'     => array(
							'id'           => $prefix . '_timing_function',
							'select_class' => $class_1,
						),
						'transition_duration' => array(
							'id'           => $prefix . '_transition_duration',
							'select_class' => $class_1,
						),
						'transition_delay'    => array(
							'id'           => $prefix . '_transition_delay',
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
					'label' => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
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
