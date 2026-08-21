<?php
/**
 * Border Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;

$rbelad_base_id   = $rbelad_values['id'] ?? 'border';
$rbelad_selector  = $rbelad_values['select_class'] ?? '{{WRAPPER}}';
$rbelad_size_unit = ! empty( $rbelad_values['size_unit'] ) ? $rbelad_values['size_unit'] : rbelad_slider_unit();
$rbelad_condition = $rbelad_values['condition'] ?? array();

/**
 * Heading
 */
$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => $rbelad_values['heading_label'] ?? esc_html__( 'Border Controls', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'condition'   => $rbelad_condition,
		'classes'     => 'rbelad-editor-heading-control',
	)
);

/**
 * Tabs
 */
$this->start_controls_tabs( $rbelad_base_id . '_tabs' );

$rbelad_tabs = array(
	'normal' => array(
		'label'    => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_selector,
	),
	'hover'  => array(
		'label'    => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
		'selector' => $rbelad_selector . ':hover',
	),
);

foreach ( $rbelad_tabs as $rbelad_tab_key => $rbelad_tab ) {

	$this->start_controls_tab(
		$rbelad_base_id . '_' . $rbelad_tab_key . '_tab',
		array(
			'label'     => $rbelad_tab['label'],
			'condition' => $rbelad_condition,
		)
	);

	/**
	 * Border
	 */
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'           => $rbelad_base_id . '_border_' . $rbelad_tab_key,
			'selector'       => $rbelad_tab['selector'],
			'condition'      => $rbelad_condition,
			'fields_options' => array(
				'border' => array(
					'default' => $rbelad_values[ $rbelad_tab_key . '_border_default' ]['border'] ?? '',
				),
				'width'  => array(
					'default' => $rbelad_values[ $rbelad_tab_key . '_border_default' ]['width'] ?? array(
						'top'      => 1,
						'right'    => 1,
						'bottom'   => 1,
						'left'     => 1,
						'unit'     => 'px',
						'isLinked' => true,
					),
				),
				'color'  => array(
					'default' => $rbelad_values[ $rbelad_tab_key . '_border_default' ]['color'] ?? '',
				),
			),
		)
	);

	$this->add_responsive_control(
		$rbelad_base_id . '_' . $rbelad_tab_key . '_border_radius',
		array(
			'label'      => esc_html__( 'Border Radius', 'rb-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => $rbelad_size_unit,
			'selectors'  => array(
				$rbelad_selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
			'default'    => $rbelad_values[ $rbelad_tab_key . '_border_radius_default' ] ?? array(
				'top'      => '',
				'right'    => '',
				'bottom'   => '',
				'left'     => '',
				'unit'     => 'px',
				'isLinked' => true,
			),
			'condition'  => $rbelad_condition,
		)
	);

	/**
	 * Shadows
	 */
	$rbelad_shadow_controls = array(
		'box_shadow'  => array(
			'label'       => esc_html__( 'Box Shadow', 'rb-addons-for-elementor' ),
			'placeholder' => esc_html__( '0px 10px 20px rgba(0,0,0,0.2)', 'rb-addons-for-elementor' ),
			'css'         => 'box-shadow: {{VALUE}};',
		),
		'drop_shadow' => array(
			'label'       => esc_html__( 'Drop Shadow (Filter)', 'rb-addons-for-elementor' ),
			'placeholder' => esc_html__( 'drop-shadow(0px 10px 10px rgba(0,0,0,0.3))', 'rb-addons-for-elementor' ),
			'description' => esc_html__( 'Use CSS filter: drop-shadow(...) format', 'rb-addons-for-elementor' ),
			'css'         => 'filter: {{VALUE}};',
		),
	);

	foreach ( $rbelad_shadow_controls as $rbelad_shadow_id => $rbelad_shadow ) {

		$rbelad_args = array(
			'label'     => $rbelad_shadow['label'],
			'type'      => Controls_Manager::TEXTAREA,
			'selectors' => array(
				$rbelad_tab['selector'] => $rbelad_shadow['css'],
			),
			'condition' => $rbelad_condition,
		);

		if ( ! empty( $rbelad_shadow['placeholder'] ) && 'normal' === $rbelad_tab_key ) {
			$rbelad_args['placeholder'] = $rbelad_shadow['placeholder'];
		}

		if ( ! empty( $rbelad_shadow['description'] ) && 'normal' === $rbelad_tab_key ) {
			$rbelad_args['description'] = $rbelad_shadow['description'];
		}

		$this->add_control(
			$rbelad_base_id . '_' . $rbelad_shadow_id . ( 'hover' === $rbelad_tab_key ? '_hover' : '' ),
			$rbelad_args
		);
	}

	$this->end_controls_tab();
}

$this->end_controls_tabs();

/**
 * Transition Duration
 */
$this->add_control(
	$rbelad_base_id . '_transition',
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
