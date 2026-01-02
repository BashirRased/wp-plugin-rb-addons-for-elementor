<?php
use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'service_wrap_style',
	[
		'label' => esc_html__( 'Wrap', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'service_list_wrap_style',
	[
		'controls' => [
			// Text Align
			'align' 					=> [
				'id' 					=> 'wrap_align',
				'options'     			=> rb_align_text(),
				'default'     			=> is_rtl() ? 'right' : 'left',
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap',
			],
			'align_separator' 			=> [],

			// Width & Height
			'min_height' 				=> [
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 380,
				],
				'select_class' 		=> '{{WRAPPER}} .rb-service-item-wrap',
			],

			// Margin & Padding
			'padding' 					=> [
				'id' 					=> 'box_padding',
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap',
			],
			'spacing_separator' 		=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'box_border',
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap',
			],
			'border_radius' 			=> [
				'id' 					=> 'box_border_radius',
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap',
			],
			'box_shadow' 				=> [
				'name'        			=> 'box_box_shadow',
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap',
			]
		],
	],
);

// Tabs
$this->start_controls_tabs( 'wrap_tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'wrap_normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'service_list_wrap_style',
			[
				'controls' => [
					// Colors
					'bg_color' 	=> [
						'id' 			=> 'service_wrap_bg_color',
						'select_class' 	=> '{{WRAPPER}} .rb-service-item-wrap',
					],
					'bg_color' 	=> [
						'id' 			=> 'wrap_before_bg_color',
						'label' 		=> esc_html__( 'Before Background Color', 'rb-elementor-addons' ),
						'default' 		=> '#007bff',
						'select_class' 	=> '{{WRAPPER}} .rb-service-item-wrap.style-2::before',
					],
				],
			],
		);

	$this->end_controls_tab();

	// Hover Tab
	$this->start_controls_tab(
		'wrap_hover_tab',
		[
			'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'service_list_wrap_style_hover',
			[
				'controls' 						=> [
					'bg_color' 			=> [
						'id' 					=> 'service_wrap_bg_color_hover',
						'default' 				=> '#007bff',
						'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap:hover, {{WRAPPER}} .rb-service-item-wrap:focus',
					],
					'border_color' 				=> [
						'id' 					=> 'wrap_border_color_hover',
						'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap:hover, {{WRAPPER}} .rb-service-item-wrap:focus',
					]
				],
			],
		);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();