<?php
/**
 * Trait: Text Alignment
 *
 * Provides style controls for text alignment.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Text_Alignment_Style {
	/**
	 * Register text alignment style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 *
	 * @return void
	 */
	protected function register_text_alignment_style( $prefix, $class_1 ) {

		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix  = is_string( $prefix ) ? $prefix : '';
		$class_1 = is_string( $class_1 ) ? $class_1 : '';

		// =============================
		// Text Alignment
		// =============================
		$this->add_style_controls(
			$prefix . '_text_alignment_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_text_align_heading',
						'label' => esc_html__( 'Text Alignment', 'rb-elementor-addons' ),
					),
					'align'   => array(
						'id'           => $prefix . '_align',
						'options'      => rbelad_align_justify(),
						'select_class' => $class_1,
					),
				),
			)
		);
	}
}
