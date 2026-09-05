<?php
/**
 * Flex & Responsive Column Group Controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

/*
 * --------------------------------------------------------------------------
 * Defaults.
 * --------------------------------------------------------------------------
 */

$rbelad_values = isset( $rbelad_values ) && is_array( $rbelad_values )
	? $rbelad_values
	: array();

$rbelad_base_id = ! empty( $rbelad_values['id'] )
	? $rbelad_values['id']
	: 'flex';

$rbelad_selector = ! empty( $rbelad_values['select_class'] )
	? $rbelad_values['select_class']
	: '{{WRAPPER}}';

$rbelad_condition = ! empty( $rbelad_values['condition'] )
	? $rbelad_values['condition']
	: array();

$rbelad_size_unit = ! empty( $rbelad_values['size_unit'] )
	? $rbelad_values['size_unit']
	: rbelad_slider_unit();

$rbelad_size_range = ! empty( $rbelad_values['size_range'] )
	? $rbelad_values['size_range']
	: rbelad_slider_range();

/*
 * --------------------------------------------------------------------------
 * Default values.
 * --------------------------------------------------------------------------
 */

$rbelad_defaults = array(
	'display'         => 'flex',
	'flex_direction'  => 'row',
	'justify_content' => 'flex-start',
	'align_items'     => 'stretch',
	'row_gap'         => array(
		'size' => '16',
		'unit' => 'px',
	),
	'column_gap'      => array(
		'size' => '16',
		'unit' => 'px',
	),
	'flex_wrap'       => 'wrap',
);

/*
 * Merge user supplied defaults.
 */

$rbelad_defaults = array_replace_recursive(
	$rbelad_defaults,
	isset( $rbelad_values['defaults'] ) && is_array( $rbelad_values['defaults'] )
		? $rbelad_values['defaults']
		: array()
);

/*
 * --------------------------------------------------------------------------
 * Heading.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_heading',
	array(
		'label'       => ! empty( $rbelad_values['heading_label'] )
			? $rbelad_values['heading_label']
			: esc_html__( 'Flex Controls', 'rb-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::HEADING,
		'ai'          => false,
		'condition'   => $rbelad_condition,
		'classes'     => 'rbelad-editor-heading-control',
	)
);

/*
 * --------------------------------------------------------------------------
 * Flex Display.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_display',
	array(
		'label'     => esc_html__( 'Display', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'flex'        => array(
				'title' => esc_html__( 'Flex', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-v-align-bottom',
			),
			'inline-flex' => array(
				'title' => esc_html__( 'Inline Flex', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-h-align-right',
			),
		),
		'default'   => $rbelad_defaults['display'],
		'toggle'    => true,
		'selectors' => array(
			$rbelad_selector => 'display: {{VALUE}};',
		),
		'condition' => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Flex Direction.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_flex_direction',
	array(
		'label'     => esc_html__( 'Direction', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'row'            => array(
				'title' => esc_html__( 'Row', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-arrow-right',
			),
			'row-reverse'    => array(
				'title' => esc_html__( 'Row Reverse', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-arrow-left',
			),
			'column'         => array(
				'title' => esc_html__( 'Column', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-arrow-down',
			),
			'column-reverse' => array(
				'title' => esc_html__( 'Column Reverse', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-arrow-up',
			),
		),
		'default'   => $rbelad_defaults['flex_direction'],
		'toggle'    => true,
		'selectors' => array(
			$rbelad_selector => 'flex-direction: {{VALUE}};',
		),
		'condition' => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Justify Content.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_justify_content',
	array(
		'label'     => esc_html__( 'Justify Content', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'flex-start'    => array(
				'title' => esc_html__( 'Start', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-h-align-left',
			),
			'center'        => array(
				'title' => esc_html__( 'Center', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-h-align-center',
			),
			'flex-end'      => array(
				'title' => esc_html__( 'End', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-h-align-right',
			),
			'space-between' => array(
				'title' => esc_html__( 'Space Between', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-justify-space-between-h',
			),
			'space-around'  => array(
				'title' => esc_html__( 'Space Around', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-justify-space-around-h',
			),
			'space-evenly'  => array(
				'title' => esc_html__( 'Space Evenly', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-justify-space-evenly-h',
			),
		),
		'default'   => $rbelad_defaults['justify_content'],
		'toggle'    => true,
		'selectors' => array(
			$rbelad_selector => 'justify-content: {{VALUE}};',
		),
		'condition' => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Align Items.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_align_items',
	array(
		'label'     => esc_html__( 'Align Items', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'flex-start' => array(
				'title' => esc_html__( 'Start', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-v-align-top',
			),
			'center'     => array(
				'title' => esc_html__( 'Center', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-v-align-middle',
			),
			'flex-end'   => array(
				'title' => esc_html__( 'End', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-v-align-bottom',
			),
			'stretch'    => array(
				'title' => esc_html__( 'Stretch', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-v-align-stretch',
			),
			'baseline'   => array(
				'title' => esc_html__( 'Baseline', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
		),
		'default'   => $rbelad_defaults['align_items'],
		'toggle'    => true,
		'selectors' => array(
			$rbelad_selector => 'align-items: {{VALUE}};',
		),
		'condition' => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Row Gap.
 * --------------------------------------------------------------------------
 */

$this->add_responsive_control(
	$rbelad_base_id . '_row_gap',
	array(
		'label'      => esc_html__( 'Row Gap', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => $rbelad_size_unit,
		'range'      => $rbelad_size_range,
		'default'    => $rbelad_defaults['row_gap'],
		'selectors'  => array(
			$rbelad_selector => 'row-gap: {{SIZE}}{{UNIT}};',
		),
		'condition'  => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Column Gap.
 * --------------------------------------------------------------------------
 */

$this->add_responsive_control(
	$rbelad_base_id . '_column_gap',
	array(
		'label'      => esc_html__( 'Column Gap', 'rb-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => $rbelad_size_unit,
		'range'      => $rbelad_size_range,
		'default'    => $rbelad_defaults['column_gap'],
		'selectors'  => array(
			$rbelad_selector => 'column-gap: {{SIZE}}{{UNIT}};',
		),
		'condition'  => $rbelad_condition,
	)
);

/*
 * --------------------------------------------------------------------------
 * Flex Wrap.
 * --------------------------------------------------------------------------
 */

$this->add_control(
	$rbelad_base_id . '_flex_wrap',
	array(
		'label'     => esc_html__( 'Wrap', 'rb-addons-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'nowrap' => array(
				'title' => esc_html__( 'No Wrap', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-nowrap',
			),
			'wrap'   => array(
				'title' => esc_html__( 'Wrap', 'rb-addons-for-elementor' ),
				'icon'  => 'eicon-wrap',
			),
		),
		'default'   => $rbelad_defaults['flex_wrap'],
		'toggle'    => true,
		'selectors' => array(
			$rbelad_selector => 'flex-wrap: {{VALUE}};',
		),
		'condition' => $rbelad_condition,
	)
);
