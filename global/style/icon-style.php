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
 * Values.
 * --------------------------------------------------------------------------
 */

$rbelad_values = isset( $rbelad_values ) && is_array( $rbelad_values )
	? $rbelad_values
	: array();

/*
 * --------------------------------------------------------------------------
 * Base ID.
 * --------------------------------------------------------------------------
 */

$rbelad_base_id = ! empty( $rbelad_values['id'] )
	? sanitize_key( $rbelad_values['id'] )
	: 'icon';

/*
 * --------------------------------------------------------------------------
 * Selector - Normal.
 * --------------------------------------------------------------------------
 *
 * select_class is used for normal styles.
 */

$rbelad_selector = ! empty( $rbelad_values['select_class'] )
	? $rbelad_values['select_class']
	: '{{WRAPPER}}';

/*
 * --------------------------------------------------------------------------
 * Selector - Hover.
 * --------------------------------------------------------------------------
 *
 * If select_class_hover is provided, use it.
 * Otherwise, fall back to select_class.
 *
 * Example:
 *
 * select_class       => '{{WRAPPER}} .button'
 * select_class_hover => '{{WRAPPER}} .button-icon'
 *
 * Normal:
 * {{WRAPPER}} .button
 *
 * Hover:
 * {{WRAPPER}} .button-icon:hover
 *
 * If select_class_hover is not provided:
 *
 * Hover:
 * {{WRAPPER}} .button:hover
 */

$rbelad_selector_hover = ! empty( $rbelad_values['select_class_hover'] )
	? $rbelad_values['select_class_hover']
	: $rbelad_selector;

/*
 * --------------------------------------------------------------------------
 * Hover Selector.
 * --------------------------------------------------------------------------
 *
 * Add :hover automatically if it is not already present.
 */

$rbelad_hover_selector = $rbelad_selector_hover;

if ( false === strpos( $rbelad_hover_selector, ':hover' ) ) {
	$rbelad_hover_selector .= ':hover';
}

/*
 * --------------------------------------------------------------------------
 * Condition.
 * --------------------------------------------------------------------------
 */

$rbelad_condition = ! empty( $rbelad_values['condition'] )
	? $rbelad_values['condition']
	: array();

/*
 * --------------------------------------------------------------------------
 * Default values.
 * --------------------------------------------------------------------------
 */

$rbelad_defaults = array(
	'size'        => array(
		'unit' => 'px',
		'size' => 24,
	),
	'color'       => '',
	'hover_color' => '',
);

/*
 * --------------------------------------------------------------------------
 * Merge user supplied defaults.
 * --------------------------------------------------------------------------
 */

if ( ! empty( $rbelad_values['defaults'] ) && is_array( $rbelad_values['defaults'] ) ) {
	$rbelad_defaults = array_replace_recursive(
		$rbelad_defaults,
		$rbelad_values['defaults']
	);
}

// =========================
// HEADING
// =========================

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] )
			? $rbelad_values['heading_label']
			: esc_html__( 'Icon Style Controls', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'condition'   => $rbelad_condition,
		'classes'     => 'rbelad-editor-heading-control',
	)
);

/*
 * ==========================================================================
 * ICON SIZE.
 * ==========================================================================
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
			$rbelad_selector . ' svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
		),
		'condition'  => $rbelad_condition,
	)
);

/*
 * ==========================================================================
 * ICON COLORS.
 * ==========================================================================
 */

$this->start_controls_tabs(
	$rbelad_base_id . '_color_tabs',
	array(
		'condition' => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Normal.
 * --------------------------------------------------------------------------
 */

$this->start_controls_tab(
	$rbelad_base_id . '_color_normal',
	array(
		'label' => esc_html__( 'Normal', 'rb-addons-for-elementor' ),
	)
);

$this->add_control(
	$rbelad_base_id . '_color',
	array(
		'label'     => esc_html__( 'Icon Color', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => $rbelad_defaults['color'],
		'selectors' => array(
			$rbelad_selector . ' i'   => 'color: {{VALUE}};',
			$rbelad_selector . ' svg' => 'fill: {{VALUE}}; color: {{VALUE}};',
		),
	)
);

$this->end_controls_tab();

/*
 * --------------------------------------------------------------------------
 * Hover.
 * --------------------------------------------------------------------------
 */

$this->start_controls_tab(
	$rbelad_base_id . '_color_hover',
	array(
		'label' => esc_html__( 'Hover', 'rb-addons-for-elementor' ),
	)
);

$this->add_control(
	$rbelad_base_id . '_hover_color',
	array(
		'label'     => esc_html__( 'Icon Color', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => $rbelad_defaults['hover_color'],
		'selectors' => array(
			$rbelad_hover_selector . ' i'   => 'color: {{VALUE}};',
			$rbelad_hover_selector . ' svg' => 'fill: {{VALUE}}; color: {{VALUE}};',
		),
	)
);

$this->end_controls_tab();

$this->end_controls_tabs();
