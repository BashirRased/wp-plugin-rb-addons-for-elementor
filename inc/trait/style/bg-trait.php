<?php
/**
 * Trait: Background Style
 *
 * Provides style controls for background color.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Background_Style {
	/**
	 * Register background color style controls.
	 *
	 * @param string $prefix  Control prefix for generating unique control IDs.
	 * @param array  $classes CSS selectors list.
	 * @param array  $colors Default background color values.
	 *
	 * @return void
	 */
	protected function register_bg_style( $prefix, $classes = array(), $colors = array() ) {
		$prefix = is_string( $prefix ) ? $prefix : '';

		// Default classes.
		$default_classes = array(
			'class_1'       => '',
			'class_hover_1' => '',
			'class_focus_1' => '',
		);

		// Default colors.
		$default_colors = array(
			'bg_color'       => '',
			'bg_color_hover' => '',
		);

		// Merge user values.
		$classes = wp_parse_args( $classes, $default_classes );
		$colors  = wp_parse_args( $colors, $default_colors );

		$class_1       = $classes['class_1'];
		$class_hover_1 = $classes['class_hover_1'];
		$class_focus_1 = $classes['class_focus_1'];

		$bg_default_color       = $colors['bg_color'];
		$bg_default_color_hover = $colors['bg_color_hover'];

		// =============================
		// Background Style Heading
		// =============================
		$this->add_style_controls(
			$prefix . '_bg_heading',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_bg_heading',
						'label' => esc_html__( 'Background Style', 'rb-addons-for-elementor' ),
					),
				),
			)
		);

		// Tabs.
		$this->start_controls_tabs( $prefix . '_bg_tabs' );

		// Normal.
		$this->start_controls_tab(
			$prefix . '_bg_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
			)
		);

		$this->add_style_controls(
			$prefix . '_bg_color',
			array(
				'controls' => array(
					'bg_color' => array(
						'id'           => $prefix . '_color_bg',
						'select_class' => $class_1,
						'default'      => $bg_default_color,
					),
				),
			)
		);

		$this->end_controls_tab();

		// Hover.
		$this->start_controls_tab(
			$prefix . '_bg_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
			)
		);

		$this->add_style_controls(
			$prefix . '_bg_color_hover',
			array(
				'controls' => array(
					'bg_color' => array(
						'id'           => $prefix . '_color_bg_hover',
						'select_class' => $class_hover_1 . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
						'default'      => $bg_default_color_hover,
					),
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
	}
}
