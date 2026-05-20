<?php

namespace RBELAD_Elementor_Addons\Traits;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait RBELAD_Border_Style_Trait {

	protected function rbelad_border_style( string $key, array $args ) {

		$controls = $args['controls'] ?? array();

		if ( empty( $controls ) || ! is_array( $controls ) ) {
			return;
		}

		foreach ( $controls as $values ) {

			// =========================
			// SELECTORS
			// =========================
			$rbelad_selector = ! empty( $values['select_class'] )
				? $values['select_class']
				: '{{WRAPPER}}';

			$rbelad_hover_selector = ! empty( $values['hover_select_class'] )
			? $values['hover_select_class']
			: $rbelad_selector . ':hover, ' . $rbelad_selector . ':focus, ' . $rbelad_selector . ':focus-visible';

			$rbelad_condition = ! empty( $values['condition'] )
				? $values['condition']
				: array();

			// =========================
			// START TABS
			// =========================
			$this->start_controls_tabs( $key . '_border_tabs' );

			// =========================
			// NORMAL TAB
			// =========================
			$this->start_controls_tab(
				$key . '_normal_tab',
				array(
					'label'     => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
					'condition' => $rbelad_condition,
				)
			);

			// BORDER
			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'      => $key . '_border',
					'selector'  => $rbelad_selector,
					'condition' => $rbelad_condition,
				)
			);

			// BORDER RADIUS
			$this->add_responsive_control(
				$key . '_border_radius',
				array(
					'label'      => esc_html__( 'Border Radius', 'rb-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem' ),
					'selectors'  => array(
						$rbelad_selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'condition'  => $rbelad_condition,
				)
			);

			// =========================
			// BOX SHADOW
			// =========================
			$this->add_control(
				$key . '_box_shadow',
				array(
					'label'       => esc_html__( 'Box Shadow', 'rb-addons-for-elementor' ),
					'type'        => Controls_Manager::TEXTAREA,
					'placeholder' => '0px 10px 20px rgba(0,0,0,0.2)',
					'selectors'   => array(
						$rbelad_selector => 'box-shadow: {{VALUE}};',
					),
					'condition'   => $rbelad_condition,
				)
			);

			// =========================
			// DROP SHADOW (FILTER)
			// =========================
			$this->add_control(
				$key . '_drop_shadow',
				array(
					'label'       => esc_html__( 'Drop Shadow (Filter)', 'rb-addons-for-elementor' ),
					'type'        => Controls_Manager::TEXTAREA,
					'placeholder' => 'drop-shadow(0px 10px 10px rgba(0,0,0,0.3))',
					'description' => esc_html__( 'Use CSS filter: drop-shadow(...) format', 'rb-addons-for-elementor' ),
					'selectors'   => array(
						$rbelad_selector => 'filter: {{VALUE}};',
					),
					'condition'   => $rbelad_condition,
				)
			);

			$this->end_controls_tab();

			// =========================
			// HOVER TAB
			// =========================
			$this->start_controls_tab(
				$key . '_hover_tab',
				array(
					'label'     => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
					'condition' => $rbelad_condition,
				)
			);

			// BORDER HOVER
			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'      => $key . '_border_hover',
					'selector'  => $rbelad_hover_selector,
					'condition' => $rbelad_condition,
				)
			);

			// BOX SHADOW HOVER
			$this->add_control(
				$key . '_box_shadow_hover',
				array(
					'label'     => esc_html__( 'Box Shadow', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::TEXTAREA,
					'selectors' => array(
						$rbelad_hover_selector => 'box-shadow: {{VALUE}};',
					),
					'condition' => $rbelad_condition,
				)
			);

			// DROP SHADOW HOVER
			$this->add_control(
				$key . '_drop_shadow_hover',
				array(
					'label'     => esc_html__( 'Drop Shadow (Filter)', 'rb-addons-for-elementor' ),
					'type'      => Controls_Manager::TEXTAREA,
					'selectors' => array(
						$rbelad_hover_selector => 'filter: {{VALUE}};',
					),
					'condition' => $rbelad_condition,
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			// =========================
			// TRANSITION
			// =========================
			$this->add_control(
				$key . '_transition',
				array(
					'label'      => esc_html__( 'Transition Duration', 'rb-addons-for-elementor' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => array( 's', 'ms' ),
					'range'      => array(
						'ms' => array(
							'min'  => 0,
							'max'  => 1000,
							'step' => 10,
						),
						's'  => array(
							'min'  => 0,
							'max'  => 5,
							'step' => 0.1,
						),
					),
					'selectors'  => array(
						$rbelad_selector => 'transition: all {{SIZE}}{{UNIT}} ease;',
					),
					'condition'  => $rbelad_condition,
				)
			);
		}
	}
}