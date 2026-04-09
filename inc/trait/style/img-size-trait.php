<?php
/**
 * Trait: Image Size Style
 *
 * Provides style controls for image size.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Image_Size_Style {
	/**
	 * Register image size style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param string $default_img_size_unit Default unit set.
	 * @param int    $default_img_size Default set.
	 *
	 * @return void
	 */
	protected function register_img_size_style( $prefix, $class_1, $default_img_size_unit, $default_img_size ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix                = is_string( $prefix ) ? $prefix : '';
		$class_1               = is_string( $class_1 ) ? $class_1 : '';
		$default_img_size_unit = is_string( $default_img_size_unit ) ? $default_img_size_unit : '';
		$default_img_size      = is_numeric( $default_img_size ) ? $default_img_size : '';

		// =============================
		// Image Size Style
		// =============================
		$this->add_style_controls(
			$prefix . '_img_size_style',
			array(
				'controls' => array(
					'heading'       => array(
						'id'    => $prefix . '_img_size_heading',
						'label' => esc_html__( 'Image Size Style', 'rb-addons-for-elementor' ),
					),
					'icon_img_size' => array(
						'id'           => $prefix . 'img_size',
						'default'      => array(
							'unit' => $default_img_size_unit,
							'size' => $default_img_size,
						),
						'select_class' => $class_1,
					),
				),
			),
		);
	}
}
