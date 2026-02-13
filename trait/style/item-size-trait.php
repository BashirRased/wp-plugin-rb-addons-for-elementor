<?php
/**
 * Trait: Item Size Style
 *
 * Provides style controls for item width, height & max-width.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Item_Size_Style {
	/**
	 * Register item width, height & max-width style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 *
	 * @return void
	 */
	protected function register_item_size_style( $prefix, $class_1 ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix  = is_string( $prefix ) ? $prefix : '';
		$class_1 = is_string( $class_1 ) ? $class_1 : '';

		// =============================
		// Item Size Style
		// =============================
		$this->add_style_controls(
			$prefix . '_item_size_style',
			array(
				'controls' => array(
					'heading'   => array(
						'id'    => $prefix . '_item_size_heading',
						'label' => esc_html__( 'Item Size Style', 'rb-addons-for-elementor' ),
					),
					'width'     => array(
						'id'           => $prefix . '_width',
						'select_class' => $class_1,
					),
					'height'    => array(
						'id'           => $prefix . '_height',
						'select_class' => $class_1,
					),
					'max_width' => array(
						'id'           => $prefix . '_max_width',
						'select_class' => $class_1,
					),
				),
			)
		);
	}
}
