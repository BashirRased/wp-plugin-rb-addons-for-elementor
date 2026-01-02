<?php
/**
 * Trait: Link Style
 *
 * Provides style controls for link color.
 *
 * @package RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

trait Link_Style {
	/**
	 * Register link color style controls.
	 *
	 * @param string $prefix Control prefix for generating unique control IDs.
	 * @param string $class_1 CSS selector for general class.
	 * @param string $link_class_hover_1 CSS selector for link hover class.
	 * @param string $link_class_focus_1 CSS selector for link focus class.
	 *
	 * @return void
	 */
	protected function register_link_style( $prefix, $class_1, $link_class_hover_1, $link_class_focus_1 ) {
		// Force all values to strings to prevent "object cannot be converted to string".
		$prefix             = is_string( $prefix ) ? $prefix : '';
		$class_1            = is_string( $class_1 ) ? $class_1 : '';
		$link_class_hover_1 = is_string( $link_class_hover_1 ) ? $link_class_hover_1 : '';
		$link_class_focus_1 = is_string( $link_class_focus_1 ) ? $link_class_focus_1 : '';

		// =============================
		// Link Style
		// =============================
		$this->add_style_controls(
			$prefix . '_link_style',
			array(
				'controls' => array(
					'heading' => array(
						'id'    => $prefix . '_link_heading',
						'label' => esc_html__( 'Link Color', 'rb-elementor-addons' ),
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
					'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
				)
			);
			$this->add_style_controls(
				$prefix . '_link_color',
				array(
					'controls' => array(
						'color' => array(
							'id'           => $prefix . '_color',
							'default'      => RBELAD_BLACK_COLOR,
							'select_class' => $class_1 . ( $link_class_hover_1 ? ', ' . $link_class_hover_1 : '' ),
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
					'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
				)
			);
			$this->add_style_controls(
				$prefix . '_link_color_hover',
				array(
					'controls' => array(
						'color' => array(
							'id'           => $prefix . '_hover_color',
							'default'      => RBELAD_PRIMARY_COLOR,
							'select_class' => $link_class_hover_1 ? $link_class_hover_1 : '' . ( $link_class_focus_1 ? ', ' . $link_class_focus_1 : '' ),
						),
					),
				)
			);
			$this->end_controls_tab();

		$this->end_controls_tabs();
	}
}
