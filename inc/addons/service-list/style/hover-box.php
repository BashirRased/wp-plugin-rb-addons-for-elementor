<?php
use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'box_hover_style',
	[
		'label' => esc_html__( 'Hover Box', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition' => [
			'service_style' => 'style-2',
		]
	]
);

// All content add here
$this->add_style_controls(
	'service_list_box_before_style',
	[
		'controls' => [
			// Width & Height
			'width' 					=> [
				'id' 					=> 'before_box_width',
				'label' 				=> esc_html__( 'Before Width', 'rb-elementor-addons' ),
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap.style-2::before',
			],
		],
	],
);


// All content add here
$this->add_style_controls(
	'service_list_box_before_hover_style',
	[
		'controls' => [
			// Width & Height
			'width' 					=> [
				'id' 					=> 'before_hover_box_width',
				'label' 				=> esc_html__( 'Before Width - Hover', 'rb-elementor-addons' ),
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap.style-2:hover::before, {{WRAPPER}} .rb-service-item-wrap.style-2:focus::before',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();