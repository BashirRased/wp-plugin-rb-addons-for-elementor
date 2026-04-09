<?php
/**
 * Trait: Link Style
 *
 * Provides style controls for color.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Color_Style {
	/**
	 * Register color style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param string $default_color Default color set.
	 *
	 * @return void
	 */
	protected function register_color_style( $prefix, $class_1, $default_color ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix        = is_string( $prefix ) ? $prefix : '';
		$class_1       = is_string( $class_1 ) ? $class_1 : '';
		$default_color = is_string( $default_color ) ? $default_color : '';

		// =============================
		// Color Style
		// =============================
		$this->add_style_controls(
			$prefix . '_color_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_color_heading',
						'label' => esc_html__( 'Color', 'rb-addons-for-elementor' ),
					),
					'color'   => array(
						'id'           => $prefix . '_color',
						'default'      => $default_color,
						'select_class' => $class_1,
					),
				),
			)
		);
	}
}
