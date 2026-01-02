<?php
/**
 * Trait: Spacing Style
 *
 * Provides style controls for margin & padding.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Spacing_Style {
	/**
	 * Register margin & padding style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 *
	 * @return void
	 */
	protected function register_spacing_style( $prefix, $class_1 ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix  = is_string( $prefix ) ? $prefix : '';
		$class_1 = is_string( $class_1 ) ? $class_1 : '';

		// =============================
		// Spacing Style
		// =============================
		$this->add_style_controls(
			$prefix . '_spacing_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_spacing_heading',
						'label' => esc_html__( 'Spacing Style', 'rb-elementor-addons' ),
					),
					'margin'  => array(
						'id'           => $prefix . '_margin',
						'select_class' => $class_1,
					),
					'padding' => array(
						'id'           => $prefix . '_padding',
						'select_class' => $class_1,
					),
				),
			)
		);
	}
}
