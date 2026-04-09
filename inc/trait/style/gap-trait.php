<?php
/**
 * Trait: Gap Style
 *
 * Provides style controls for column & row.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Gap_Style {
	/**
	 * Register column & row style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param array  $gaps Default item gaps values.
	 *
	 * @return void
	 */
	protected function register_gap_style( $prefix, $class_1, $gaps = array() ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix  = is_string( $prefix ) ? $prefix : '';
		$class_1 = is_string( $class_1 ) ? $class_1 : '';

		// Default gaps.
		$default_gaps = array(
			'column_gap_unit' => '',
			'column_gap'      => '',
			'row_gap_unit'    => '',
			'row_gap'         => '',
		);

		// Merge user values.
		$gaps = wp_parse_args( $gaps, $default_gaps );

		$default_column_gap_unit = $gaps['column_gap_unit'];
		$default_column_gap      = $gaps['column_gap'];
		$default_row_gap_unit    = $gaps['row_gap_unit'];
		$default_row_gap         = $gaps['row_gap'];

		// =============================
		// Gap Style
		// =============================
		$this->add_style_controls(
			$prefix . '_gap_style',
			array(
				'controls' => array(
					'heading'    => array(
						'id'    => $prefix . '_gap_heading',
						'label' => esc_html__( 'Gap Style', 'rb-addons-for-elementor' ),
					),
					'column_gap' => array(
						'id'           => $prefix . 'column_gap',
						'default'      => array(
							'unit' => $default_column_gap_unit,
							'size' => $default_column_gap,
						),
						'select_class' => $class_1,
					),
					'row_gap'    => array(
						'id'           => $prefix . 'row_gap',
						'default'      => array(
							'unit' => $default_row_gap_unit,
							'size' => $default_row_gap,
						),
						'select_class' => $class_1,
					),
				),
			),
		);
	}
}
