<?php
/**
 * Trait: Item Size Style
 *
 * Provides style controls for item width, height & max-width.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Item_Size_Style {
	/**
	 * Register item width, height & max-width style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param array  $default_width Default border values.
	 * @param array  $default_min_width Default border values.
	 * @param array  $default_max_width Default border values.
	 * @param array  $default_height Default border values.
	 *
	 * @return void
	 */
	protected function register_item_size_style( $prefix, $class_1, $default_width = array(), $default_min_width = array(), $default_max_width = array(), $default_height = array() ) {
		$prefix  = is_string( $prefix ) ? $prefix : '';
		$class_1 = is_string( $class_1 ) ? $class_1 : '';

		// Default width values.
		$default_width_val = array(
			'unit' => 'px',
			'size' => '',
		);

		// Default min width values.
		$default_min_width_val = array(
			'unit' => 'px',
			'size' => '',
		);

		// Default max width values.
		$default_max_width_val = array(
			'unit' => 'px',
			'size' => '',
		);

		// Default height values.
		$default_height_val = array(
			'unit' => 'px',
			'size' => '',
		);

		// Merge user values.
		$default_width     = wp_parse_args( $default_width, $default_width_val );
		$default_min_width = wp_parse_args( $default_min_width, $default_min_width_val );
		$default_max_width = wp_parse_args( $default_max_width, $default_max_width_val );
		$default_height    = wp_parse_args( $default_height, $default_height_val );

		// Default width variables.
		$default_width_unit = $default_width['unit'];
		$default_width_size = $default_width['size'];

		// Default min width variables.
		$default_min_width_unit = $default_min_width['unit'];
		$default_min_width_size = $default_min_width['size'];

		// Default max width variables.
		$default_max_width_unit = $default_max_width['unit'];
		$default_max_width_size = $default_max_width['size'];

		// Default height variables.
		$default_height_unit = $default_height['unit'];
		$default_height_size = $default_height['size'];

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
						'default'      => array(
							'unit' => $default_width_unit,
							'size' => $default_width_size,
						),
					),
					'min_width' => array(
						'id'           => $prefix . '_min_width',
						'select_class' => $class_1,
						'default'      => array(
							'unit' => $default_min_width_unit,
							'size' => $default_min_width_size,
						),
					),
					'max_width' => array(
						'id'           => $prefix . '_max_width',
						'select_class' => $class_1,
						'default'      => array(
							'unit' => $default_max_width_unit,
							'size' => $default_max_width_size,
						),
					),
					'height'    => array(
						'id'           => $prefix . '_height',
						'select_class' => $class_1,
						'default'      => array(
							'unit' => $default_height_unit,
							'size' => $default_height_size,
						),
					),
				),
			)
		);
	}
}
