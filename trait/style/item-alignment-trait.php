<?php
/**
 * Trait: Item Alignment
 *
 * Provides style controls for item alignment.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Item_Alignment_Style {
	/**
	 * Register item alignment style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 *
	 * @return void
	 */
	protected function register_item_alignment_style( $prefix, $class_1 ) {

		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix  = is_string( $prefix ) ? $prefix : '';
		$class_1 = is_string( $class_1 ) ? $class_1 : '';

		// =============================
		// Item Alignment
		// =============================
		$this->add_style_controls(
			$prefix . '_item_alignment_style',
			array(
				'controls' => array(
					'heading'    => array(
						'id'    => $prefix . '_item_align_heading',
						'label' => esc_html__( 'Item Alignment', 'rb-elementor-addons' ),
					),
					'item_align' => array(
						'id'           => $prefix . '_item_align',
						'options'      => rbelad_align_justify(),
						'default'      => is_rtl() ? 'right' : 'left',
						'select_class' => $class_1,
					),
				),
			)
		);
	}
}
