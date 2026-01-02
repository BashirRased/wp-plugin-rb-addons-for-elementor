<?php
/**
 * Trait: Text Style
 *
 * Provides style controls for general heading text.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Text_Style {
	/**
	 * Register general heading text style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 *
	 * @return void
	 */
	protected function register_text_style( $prefix, $class_1 ) {

		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix  = is_string( $prefix ) ? $prefix : '';
		$class_1 = is_string( $class_1 ) ? $class_1 : '';

		// =============================
		// Text Style
		// =============================
		$this->add_style_controls(
			$prefix . '_text_style',
			array(
				'controls' => array(
					'heading'     => array(
						'id'    => $prefix . '_text_heading',
						'label' => esc_html__( 'Text Style', 'rb-elementor-addons' ),
					),
					'typography'  => array(
						'name'         => $prefix . '_typography',
						'global'       => array( 'default' => RBELAD_PRIMARY_TEXT ),
						'select_class' => $class_1,
					),
					'text_stroke' => array(
						'name'         => $prefix . '_text_stroke',
						'select_class' => $class_1,
					),
					'text_shadow' => array(
						'name'         => $prefix . '_text_shadow',
						'select_class' => $class_1,
					),
				),
			)
		);
	}
}
