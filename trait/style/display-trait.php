<?php
/**
 * Trait: Display Style
 *
 * Provides style controls for display layout.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Display_Style {
	/**
	 * Register display layout style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 *
	 * @return void
	 */
	protected function register_display_style( $prefix, $class_1 ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix  = is_string( $prefix ) ? $prefix : '';
		$class_1 = is_string( $class_1 ) ? $class_1 : '';

		// =============================
		// Display Style
		// =============================
		$this->add_style_controls(
			$prefix . '_display_style',
			array(
				'controls' => array(
					'heading'        => array(
						'id'    => $prefix . '_display_heading',
						'label' => esc_html__( 'Display Style', 'rb-elementor-addons' ),
					),
					'display_layout' => array(
						'id'           => $prefix . '_display_layout',
						'select_class' => $class_1,
					),
				),
			)
		);
	}
}
