<?php
/**
 * Trait: Border Style
 *
 * Provides style controls for border color, width, style, radius, box-shadow.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Border_Style {
	/**
	 * Register border color, width, style, radius, box-shadow style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param array  $classes CSS selectors list.
	 * @param array  $default_border Default border values.
	 * @param array  $default_border_hover Default hover border values.
	 *
	 * @return void
	 */
	protected function register_border_style( $prefix, $classes = array(), $default_border = array(), $default_border_hover = array() ) {
		$prefix = is_string( $prefix ) ? $prefix : '';

		// Default classes.
		$default_classes = array(
			'class_1'       => '',
			'class_hover_1' => '',
			'class_focus_1' => '',
		);

		// Default border values.
		$default_border_val = array(
			'type'          => '',
			'top'           => '0',
			'right'         => '0',
			'bottom'        => '0',
			'left'          => '0',
			'unit'          => 'px',
			'color'         => '',
			'radius_top'    => '0',
			'radius_right'  => '0',
			'radius_bottom' => '0',
			'radius_left'   => '0',
			'radius_unit'   => 'px',
		);

		// Default hover border values.
		$default_border_hover_val = array(
			'type'          => '',
			'top'           => '0',
			'right'         => '0',
			'bottom'        => '0',
			'left'          => '0',
			'unit'          => 'px',
			'color'         => '',
			'radius_top'    => '0',
			'radius_right'  => '0',
			'radius_bottom' => '0',
			'radius_left'   => '0',
			'radius_unit'   => 'px',
		);

		// Merge user values.
		$classes              = wp_parse_args( $classes, $default_classes );
		$default_border       = wp_parse_args( $default_border, $default_border_val );
		$default_border_hover = wp_parse_args( $default_border_hover, $default_border_hover_val );

		// Default classes variables.
		$class_1       = $classes['class_1'];
		$class_hover_1 = $classes['class_hover_1'];
		$class_focus_1 = $classes['class_focus_1'];

		// Default border variables.
		$default_border_type          = $default_border['type'];
		$default_border_top           = $default_border['top'];
		$default_border_right         = $default_border['right'];
		$default_border_bottom        = $default_border['bottom'];
		$default_border_left          = $default_border['left'];
		$default_border_unit          = $default_border['unit'];
		$default_border_color         = $default_border['color'];
		$default_border_radius_top    = $default_border['radius_top'];
		$default_border_radius_right  = $default_border['radius_right'];
		$default_border_radius_bottom = $default_border['radius_bottom'];
		$default_border_radius_left   = $default_border['radius_left'];
		$default_border_radius_unit   = $default_border['radius_unit'];

		// Default hover border variables.
		$default_border_type_hover          = $default_border_hover['type'];
		$default_border_top_hover           = $default_border_hover['top'];
		$default_border_right_hover         = $default_border_hover['right'];
		$default_border_bottom_hover        = $default_border_hover['bottom'];
		$default_border_left_hover          = $default_border_hover['left'];
		$default_border_unit_hover          = $default_border_hover['unit'];
		$default_border_color_hover         = $default_border_hover['color'];
		$default_border_radius_top_hover    = $default_border_hover['radius_top'];
		$default_border_radius_right_hover  = $default_border_hover['radius_right'];
		$default_border_radius_bottom_hover = $default_border_hover['radius_bottom'];
		$default_border_radius_left_hover   = $default_border_hover['radius_left'];
		$default_border_radius_unit_hover   = $default_border_hover['radius_unit'];

		// =============================
		// Border Style
		// =============================
		$this->add_style_controls(
			$prefix . '_border_heading',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_border_heading',
						'label' => esc_html__( 'Border Style', 'rb-addons-for-elementor' ),
					),
				),
			)
		);

		// =============================
		// Tabs
		// =============================
		$this->start_controls_tabs( $prefix . '_border_tabs' );

		// -----------------------------
		// Normal Tab.
		// -----------------------------
		$this->start_controls_tab(
			$prefix . '_border_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
			)
		);

		$this->add_style_controls(
			$prefix . '_border_section',
			array(
				'controls' => array(
					'border'        => array(
						'name'           => $prefix . '_border',
						'select_class'   => $class_1,
						'fields_options' => array(
							'border' => array(
								'default' => $default_border_type,
							),
							'width'  => array(
								'default' => array(
									'top'      => $default_border_top,
									'right'    => $default_border_right,
									'bottom'   => $default_border_bottom,
									'left'     => $default_border_left,
									'unit'     => $default_border_unit,
									'isLinked' => false,
								),
							),
							'color'  => array(
								'default' => $default_border_color,
							),
						),
					),
					'border_radius' => array(
						'id'           => $prefix . '_border_radius',
						'select_class' => $class_1,
						'default'      => array(
							'top'      => $default_border_radius_top,
							'right'    => $default_border_radius_right,
							'bottom'   => $default_border_radius_bottom,
							'left'     => $default_border_radius_left,
							'unit'     => $default_border_radius_unit,
							'isLinked' => false,
						),
					),
					'box_shadow'    => array(
						'name'         => $prefix . '_box_shadow',
						'select_class' => $class_1,
					),
				),
			)
		);

		$this->end_controls_tab();

		// -----------------------------
		// Hover Tab.
		// -----------------------------
		$this->start_controls_tab(
			$prefix . '_border_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
			)
		);

		$this->add_style_controls(
			$prefix . '_border_section_hover',
			array(
				'controls' => array(
					'border'        => array(
						'name'           => $prefix . '_border_hover',
						'select_class'   => $class_hover_1 . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
						'fields_options' => array(
							'border' => array(
								'default' => $default_border_type_hover,
							),
							'width'  => array(
								'default' => array(
									'top'      => $default_border_top_hover,
									'right'    => $default_border_right_hover,
									'bottom'   => $default_border_bottom_hover,
									'left'     => $default_border_left_hover,
									'unit'     => $default_border_unit_hover,
									'isLinked' => false,
								),
							),
							'color'  => array(
								'default' => $default_border_color_hover,
							),
						),
					),
					'border_radius' => array(
						'id'           => $prefix . '_border_radius_hover',
						'select_class' => $class_hover_1 . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
						'default'      => array(
							'top'      => $default_border_radius_top_hover,
							'right'    => $default_border_radius_right_hover,
							'bottom'   => $default_border_radius_bottom_hover,
							'left'     => $default_border_radius_left_hover,
							'unit'     => $default_border_radius_unit_hover,
							'isLinked' => false,
						),
					),
					'box_shadow'    => array(
						'name'         => $prefix . '_box_shadow_hover',
						'select_class' => $class_hover_1 . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
					),
				),
			)
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
	}
}
