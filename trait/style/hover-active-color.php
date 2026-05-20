<?php
/**
 * Hover Active Color Style Trait
 *
 * Normal + Hover + Active Color Controls
 *
 * @package RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

namespace RBELAD_Elementor_Addons\Traits;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait RBELAD_Hover_Active_Color_Style_Trait {

	protected function rbelad_hover_active_color_style( string $key, array $args ) {

		$controls = $args['controls'] ?? array();

		if ( empty( $controls ) || ! is_array( $controls ) ) {
			return;
		}

		foreach ( $controls as $color_key => $values ) {

			$selector = ! empty( $values['select_class'] )
				? $values['select_class']
				: '{{WRAPPER}}';

			$hover_selector = ! empty( $values['hover_select_class'] )
				? $values['hover_select_class']
				: $selector . ':hover';

			$active_selector = ! empty( $values['active_select_class'] )
				? $values['active_select_class']
				: $selector . '.active';

			$condition = ! empty( $values['condition'] )
				? $values['condition']
				: array();

			$this->start_controls_tabs( $key . '_' . $color_key . '_tabs' );

			// ==================================================
			// NORMAL
			// ==================================================
			$this->start_controls_tab(
				$key . '_normal_tab',
				array(
					'label' => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
				)
			);

			$this->add_control(
				$key . '_' . $color_key,
				array(
					'label'     => esc_html__( 'Color', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						$selector => $color_key . ': {{VALUE}};',
					),
					'condition' => $condition,
				)
			);

			$this->end_controls_tab();

			// ==================================================
			// HOVER
			// ==================================================
			$this->start_controls_tab(
				$key . '_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
				)
			);

			$this->add_control(
				$key . '_' . $color_key . '_hover',
				array(
					'label'     => esc_html__( 'Hover Color', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						$hover_selector => $color_key . ': {{VALUE}};',
					),
					'condition' => $condition,
				)
			);

			$this->end_controls_tab();

			// ==================================================
			// ACTIVE
			// ==================================================
			$this->start_controls_tab(
				$key . '_active_tab',
				array(
					'label' => esc_html__( 'Active', 'rb-addons-for-elementor' ),
				)
			);

			$this->add_control(
				$key . '_' . $color_key . '_active',
				array(
					'label'     => esc_html__( 'Active Color', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						$active_selector => $color_key . ': {{VALUE}};',
					),
					'condition' => $condition,
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();
		}
	}
}