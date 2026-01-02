<?php
use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'icon_style',
	[
		'label' => esc_html__( 'Icon', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'service_list_icon_style',
	[
		'controls' => [
			// Width & Height
			'icon_img_size' 			=> [
				'label' 				=> esc_html__( 'Image Size', 'rb-elementor-addons' ),
				'select_class' 			=> '{{WRAPPER}} .rb-service-icon img',
				'condition' 			=> [
					'icon_type' 		=> 'img',
				],
			],
			'icon_size' 				=> [
				'label' 				=> esc_html__( 'Icon Size', 'rb-elementor-addons' ),
				'select_class' 			=> '{{WRAPPER}} .rb-service-icon i',
				'select_class_2' 		=> '{{WRAPPER}} .rb-service-icon svg',
				'condition' 			=> [
					'icon_type' 		=> 'icon',
				],
			],
			'width_height_separator'	=> [],

			// Margin & Padding
			'margin_bottom' 			=> [
				'id' 					=> 'icon_margin_bottom',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 10,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-service-icon',
			],
			'padding' 					=> [
				'id' 					=> 'icon_padding',
				'select_class' 			=> '{{WRAPPER}} .rb-service-icon',
			],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'icon_border',
				'select_class' 			=> '{{WRAPPER}} .rb-service-icon',
			],
			'border_radius' 			=> [
				'id' 					=> 'icon_border_radius',
				'select_class' 			=> '{{WRAPPER}} .rb-service-icon',
			],
		],
	],
);

// Tabs
$this->start_controls_tabs( 'icon_tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'icon_normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'service_list_icon_style',
			[
				'controls' => [
					// Colors
					'fill_color' 				=> [
						'select_class' 			=> '{{WRAPPER}} .rb-service-icon i',
						'select_class_2' 		=> '{{WRAPPER}} .rb-service-icon svg',
					],
					'bg_color' 					=> [
						'select_class' 			=> '{{WRAPPER}} .rb-service-icon',
					],
				],
			],
		);

	$this->end_controls_tab();

	// Hover Tab
	$this->start_controls_tab(
		'icon_hover_tab',
		[
			'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'service_list_icon_style_hover',
			[
				'controls' => [
					// Colors
					'fill_color' 				=> [
						'id' 					=> 'fill_color_hover',
						'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap:hover .rb-service-icon i, {{WRAPPER}} .rb-service-item-wrap:focus .rb-service-icon i',
						'select_class_2' 		=> '{{WRAPPER}} .rb-service-item-wrap:hover .rb-service-icon svg, {{WRAPPER}} .rb-service-item-wrap:focus .rb-service-icon svg',
					],
					'bg_color' 					=> [
						'id' 					=> 'bg_color_hover',
						'default' 				=> '#ffffff',
						'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap:hover .rb-service-icon, {{WRAPPER}} .rb-service-item-wrap:focus .rb-service-icon',
					],
				],
			],
		);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();