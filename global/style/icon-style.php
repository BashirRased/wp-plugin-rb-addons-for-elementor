<?php
/**
 * Icon Size & Color Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

/*
 * --------------------------------------------------------------------------
 * Settings.
 * --------------------------------------------------------------------------
 */

$rbelad_values = isset( $rbelad_values ) && is_array( $rbelad_values )
	? $rbelad_values
	: array();

$rbelad_base_id = ! empty( $rbelad_values['id'] )
	? $rbelad_values['id']
	: 'icon';

$rbelad_selector = ! empty( $rbelad_values['select_class'] )
	? $rbelad_values['select_class']
	: '{{WRAPPER}}';

$rbelad_condition = ! empty( $rbelad_values['condition'] )
	? $rbelad_values['condition']
	: array();

/*
 * --------------------------------------------------------------------------
 * Defaults.
 * --------------------------------------------------------------------------
 */

$rbelad_defaults = array(
	'size'  => array(
		'unit' => 'px',
		'size' => 24,
	),
	'color' => '',
	'fill'  => '',
);

/*
 * Merge custom defaults.
 */
$rbelad_defaults = array_replace_recursive(
	$rbelad_defaults,
	isset( $rbelad_values['defaults'] ) && is_array( $rbelad_values['defaults'] )
		? $rbelad_values['defaults']
		: array()
);

/*
 * --------------------------------------------------------------------------
 * Icon Size.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_size',
	array(
		'label'      => esc_html__( 'Icon Size', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em', 'rem' ),
		'range'      => array(
			'px'  => array(
				'min'  => 0,
				'max'  => 200,
				'step' => 1,
			),
			'em'  => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 0.1,
			),
			'rem' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 0.1,
			),
		),
		'default'    => $rbelad_defaults['size'],
		'selectors'  => array(
			$rbelad_selector . ' i'   => 'font-size: {{SIZE}}{{UNIT}};',
			$rbelad_selector . ' svg' => 'height: {{VALUE}};',
		),
		'condition'  => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Icon Color.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_color',
	array(
		'label'     => esc_html__( 'Icon Color', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => $rbelad_defaults['color'],
		'selectors' => array(
			$rbelad_selector . ' i'   => 'color: {{VALUE}};',
			$rbelad_selector . ' svg' => 'fill: {{VALUE}};',
		),
		'condition' => $rbelad_condition,
	)
);
