<?php
/**
 * Trait: Top Style
 *
 * Provides style controls for margin & padding.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Top_Style {
	/**
	 * Register margin & padding style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param string $default_top_unit Default top unit set.
	 * @param int    $default_top Default top set.
	 *
	 * @return void
	 */
	protected function register_top_style( $prefix, $class_1, $default_top_unit, $default_top ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix           = is_string( $prefix ) ? $prefix : '';
		$class_1          = is_string( $class_1 ) ? $class_1 : '';
		$default_top_unit = is_string( $default_top_unit ) ? $default_top_unit : '';
		$default_top      = is_numeric( $default_top ) ? $default_top : '';

		// =============================
		// Top Style
		// =============================
		$this->add_style_controls(
			$prefix . '_top_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_top_heading',
						'label' => esc_html__( 'Top Style', 'rb-addons-for-elementor' ),
					),
					'top'     => array(
						'id'           => $prefix . 'top',
						'default'      => array(
							'unit' => $default_top_unit,
							'size' => $default_top,
						),
						'select_class' => $class_1,
					),
				),
			),
		);
	}
}
