<?php
/**
 * Trait: Link Style
 *
 * Provides style controls for link color.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Link_Style {
	/**
	 * Register link color style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param array  $classes CSS selectors list.
	 * @param array  $colors Default link color values.
	 *
	 * @return void
	 */
	protected function register_link_style( $prefix, $classes = array(), $colors = array() ) {
		$prefix = is_string( $prefix ) ? $prefix : '';

		// Default classes.
		$default_classes = array(
			'class_1'       => '',
			'class_hover_1' => '',
			'class_focus_1' => '',
		);

		// Default colors.
		$default_colors = array(
			'link_color'       => '',
			'link_color_hover' => '',
		);

		// Merge user values.
		$classes = wp_parse_args( $classes, $default_classes );
		$colors  = wp_parse_args( $colors, $default_colors );

		$class_1       = $classes['class_1'];
		$class_hover_1 = $classes['class_hover_1'];
		$class_focus_1 = $classes['class_focus_1'];

		$link_default_color       = $colors['link_color'];
		$link_default_color_hover = $colors['link_color_hover'];

		// =============================
		// Link Style
		// =============================
		$this->add_style_controls(
			$prefix . '_link_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_link_heading',
						'label' => esc_html__( 'Link Color', 'rb-addons-for-elementor' ),
					),
				),
			)
		);

		// =============================
		// Tabs
		// =============================
		$this->start_controls_tabs( $prefix . '_link_tabs' );

			// -----------------------------
			// Normal Tab.
			// -----------------------------
			$this->start_controls_tab(
				$prefix . '_link_normal_tab',
				array(
					'label' => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
				)
			);
			$this->add_style_controls(
				$prefix . '_link_color',
				array(
					'controls' => array(
						'color' => array(
							'id'           => $prefix . '_color',
							'select_class' => $class_1,
							'default'      => $link_default_color,
						),
					),
				)
			);
			$this->end_controls_tab();

			// -----------------------------
			// Hover Tab.
			// -----------------------------
			$this->start_controls_tab(
				$prefix . '_link_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
				)
			);
			$this->add_style_controls(
				$prefix . '_link_color_hover',
				array(
					'controls' => array(
						'color' => array(
							'id'           => $prefix . '_hover_color',
							'select_class' => $class_hover_1 . ( $class_focus_1 ? ', ' . $class_focus_1 : '' ),
							'default'      => $link_default_color_hover,
						),
					),
				)
			);
			$this->end_controls_tab();

		$this->end_controls_tabs();
	}
}
