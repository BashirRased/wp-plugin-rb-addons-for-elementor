<?php
/**
 * Trait: Transform Style
 *
 * Provides style controls for transform effect.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Transform_Style {
	/**
	 * Register transform effect style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param array  $classes CSS selectors list.
	 *
	 * @return void
	 */
	protected function register_transform_style( $prefix, $classes = array() ) {
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
		// Transform Style
		// =============================
		$this->add_style_controls(
			$prefix . '_transform_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_transform_heading',
						'label' => esc_html__( 'Transform Style', 'rb-addons-for-elementor' ),
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
					'label' => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
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
					'label' => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
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
