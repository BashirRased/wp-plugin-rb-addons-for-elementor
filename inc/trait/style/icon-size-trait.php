<?php
/**
 * Trait: Icon Size Style
 *
 * Provides style controls for margin & padding.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Icon_Size_Style {
	/**
	 * Register margin & padding style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param string $class_2 CSS selector for general class.
	 * @param string $default_font_size_unit Default unit set.
	 * @param int    $default_font_size Default set.
	 *
	 * @return void
	 */
	protected function register_icon_size_style( $prefix, $class_1, $class_2, $default_font_size_unit, $default_font_size ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix                 = is_string( $prefix ) ? $prefix : '';
		$class_1                = is_string( $class_1 ) ? $class_1 : '';
		$class_2                = is_string( $class_2 ) ? $class_2 : '';
		$default_font_size_unit = is_string( $default_font_size_unit ) ? $default_font_size_unit : '';
		$default_font_size      = is_numeric( $default_font_size ) ? $default_font_size : '';

		// =============================
		// Icon Size Style
		// =============================
		$this->add_style_controls(
			$prefix . '_font_size_style',
			array(
				'controls' => array(
					'heading'   => array(
						'id'    => $prefix . '_font_size_heading',
						'label' => esc_html__( 'Icon Size Style', 'rb-addons-for-elementor' ),
					),
					'icon_size' => array(
						'id'             => $prefix . 'font_size',
						'default'        => array(
							'unit' => $default_font_size_unit,
							'size' => $default_font_size,
						),
						'select_class'   => $class_1,
						'select_class_2' => $class_2,
					),
				),
			),
		);
	}
}
