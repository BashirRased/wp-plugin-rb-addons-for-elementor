<?php
/**
 * Height Width Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;


// =========================
// CONTROLS VARIABLES
// =========================

$rbelad_base_id = ! empty( $rbelad_values['id'] )
	? $rbelad_values['id']
	: 'height_width';

$rbelad_size_unit = ! empty( $rbelad_values['size_unit'] )
	? $rbelad_values['size_unit']
	: rbelad_slider_unit();

$rbelad_size_range = ! empty( $rbelad_values['size_range'] )
	? $rbelad_values['size_range']
	: rbelad_slider_range();

$rbelad_selector = ! empty( $rbelad_values['select_class'] )
	? $rbelad_values['select_class']
	: '{{WRAPPER}}';

$rbelad_condition = ! empty( $rbelad_values['condition'] )
	? $rbelad_values['condition']
	: array();


// =========================
// HEADING
// =========================

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] )
			? $rbelad_values['heading_label']
			: esc_html__( 'Height & Width Controls', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'condition'   => $rbelad_condition,
		'classes'     => 'rbelad-editor-heading-control',
	)
);


// ==================================================
// WIDTH CONTROLS
// ==================================================

$this->add_control(
	$rbelad_base_id . '_width_popover',
	array(
		'label'        => esc_html__( 'Width', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
		'condition'    => $rbelad_condition,
	)
);

$this->start_popover();

$rbelad_width_controls = array(
	'width'     => array(
		'label'   => esc_html__( 'Width', 'rb-addons-for-elementor' ),
		'default' => array(
			'unit' => 'px',
			'size' => '',
		),
	),
	'min_width' => array(
		'label'   => esc_html__( 'Min Width', 'rb-addons-for-elementor' ),
		'default' => array(
			'unit' => 'px',
			'size' => '',
		),
	),
	'max_width' => array(
		'label'   => esc_html__( 'Max Width', 'rb-addons-for-elementor' ),
		'default' => array(
			'unit' => 'px',
			'size' => '',
		),
	),
);

foreach ( $rbelad_width_controls as $rbelad_property => $rbelad_control ) {
	$rbelad_default_key = $rbelad_property . '_default';

	$rbelad_default = isset( $rbelad_values[ $rbelad_default_key ] )
		&& is_array( $rbelad_values[ $rbelad_default_key ] )
		? $rbelad_values[ $rbelad_default_key ]
		: $rbelad_control['default'];

	$this->add_responsive_control(
		$rbelad_base_id . '_' . $rbelad_property,
		array(
			'label'      => $rbelad_control['label'],
			'type'       => Controls_Manager::SLIDER,
			'size_units' => $rbelad_size_unit,
			'range'      => $rbelad_size_range,
			'default'    => $rbelad_default,

			'selectors'  => array(
				$rbelad_selector => sprintf(
					'%s: {{SIZE}}{{UNIT}};',
					str_replace( '_', '-', $rbelad_property )
				),
			),

			'condition'  => array_merge(
				$rbelad_condition,
				array(
					$rbelad_base_id . '_width_popover' => 'yes',
				)
			),
		)
	);
}
$this->end_popover();

// ==================================================
// HEIGHT CONTROLS
// ==================================================
$this->add_control(
	$rbelad_base_id . '_height_popover',
	array(
		'label'        => esc_html__( 'Height', 'rb-addons-for-elementor' ),
		'type'         => Controls_Manager::POPOVER_TOGGLE,
		'label_off'    => esc_html__( 'Default', 'rb-addons-for-elementor' ),
		'label_on'     => esc_html__( 'Custom', 'rb-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
		'condition'    => $rbelad_condition,
	)
);

$this->start_popover();

$rbelad_height_controls = array(
	'height'     => array(
		'label'   => esc_html__( 'Height', 'rb-addons-for-elementor' ),
		'default' => array(
			'unit' => 'px',
			'size' => '',
		),
	),
	'min_height' => array(
		'label'   => esc_html__( 'Min Height', 'rb-addons-for-elementor' ),
		'default' => array(
			'unit' => 'px',
			'size' => '',
		),
	),
	'max_height' => array(
		'label'   => esc_html__( 'Max Height', 'rb-addons-for-elementor' ),
		'default' => array(
			'unit' => 'px',
			'size' => '',
		),
	),
);

foreach ( $rbelad_height_controls as $rbelad_property => $rbelad_control ) {

	$rbelad_default_key = $rbelad_property . '_default';

	$rbelad_default = isset( $rbelad_values[ $rbelad_default_key ] )
		&& is_array( $rbelad_values[ $rbelad_default_key ] )
		? $rbelad_values[ $rbelad_default_key ]
		: $rbelad_control['default'];

	$this->add_responsive_control(
		$rbelad_base_id . '_' . $rbelad_property,
		array(
			'label'      => $rbelad_control['label'],
			'type'       => Controls_Manager::SLIDER,
			'size_units' => $rbelad_size_unit,
			'range'      => $rbelad_size_range,
			'default'    => $rbelad_default,

			'selectors'  => array(
				$rbelad_selector => sprintf(
					'%s: {{SIZE}}{{UNIT}};',
					str_replace( '_', '-', $rbelad_property )
				),
			),

			'condition'  => array_merge(
				$rbelad_condition,
				array(
					$rbelad_base_id . '_height_popover' => 'yes',
				)
			),
		)
	);
}

$this->end_popover();
