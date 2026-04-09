<?php
/**
 * Trait: Spacing Style
 *
 * Provides style controls for margin & padding.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Spacing_Style {
	/**
	 * Register margin & padding style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param array  $default_padding  Default padding values.
	 * @param array  $default_margin  Default margin values.
	 *
	 * @return void
	 */
	protected function register_spacing_style( $prefix, $class_1, $default_padding = array(), $default_margin = array() ) {
		$prefix  = is_string( $prefix ) ? $prefix : '';
		$class_1 = is_string( $class_1 ) ? $class_1 : '';

		// Default padding values.
		$default_padding_val = array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
			'unit'   => 'px',
		);

		// Default margin values.
		$default_margin_val = array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
			'unit'   => 'px',
		);

		// Merge user values.
		$default_padding = wp_parse_args( $default_padding, $default_padding_val );
		$default_margin  = wp_parse_args( $default_margin, $default_margin_val );

		// Default padding variables.
		$default_padding_top    = $default_padding['top'];
		$default_padding_right  = $default_padding['right'];
		$default_padding_bottom = $default_padding['bottom'];
		$default_padding_left   = $default_padding['left'];
		$default_padding_unit   = $default_padding['unit'];

		// Default margin variables.
		$default_margin_top    = $default_margin['top'];
		$default_margin_right  = $default_margin['right'];
		$default_margin_bottom = $default_margin['bottom'];
		$default_margin_left   = $default_margin['left'];
		$default_margin_unit   = $default_margin['unit'];

		// =============================
		// Spacing Style
		// =============================
		$this->add_style_controls(
			$prefix . '_spacing_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_spacing_heading',
						'label' => esc_html__( 'Spacing Style', 'rb-addons-for-elementor' ),
					),
					'padding' => array(
						'id'           => $prefix . '_padding',
						'select_class' => $class_1,
						'default'      => array(
							'top'      => $default_padding_top,
							'right'    => $default_padding_right,
							'bottom'   => $default_padding_bottom,
							'left'     => $default_padding_left,
							'unit'     => $default_padding_unit,
							'isLinked' => false,
						),
					),
					'margin'  => array(
						'id'           => $prefix . '_margin',
						'select_class' => $class_1,
						'default'      => array(
							'top'      => $default_margin_top,
							'right'    => $default_margin_right,
							'bottom'   => $default_margin_bottom,
							'left'     => $default_margin_left,
							'unit'     => $default_margin_unit,
							'isLinked' => false,
						),
					),
				),
			)
		);
	}
}
