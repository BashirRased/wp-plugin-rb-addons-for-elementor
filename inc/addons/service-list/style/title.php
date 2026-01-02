<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'title_style',
	[
		'label' => esc_html__( 'Title', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'service_list_title_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_SECONDARY],
				'select_class' 			=> '{{WRAPPER}} .rb-service-title',
			],			
			'text_stroke' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-service-title',
			],
			'text_shadow' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-service-title',
			],
			'typography_separator' 		=> [],

			// Margin & Padding
			'margin_bottom' 			=> [				
				'id' 					=> 'title_margin_bottom',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 10,
				],
				'select_class' 		  	=> '{{WRAPPER}} .rb-service-title',
			],
		],
	],
);

// Tabs
$this->start_controls_tabs( 'tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'service_list_title_style',
			[
				'controls' => [
					// Colors
					'color' 		=> [
						'default' 		=> '#000',
						'select_class' 	=> '{{WRAPPER}} .rb-service-title',
					]
				],
			],
		);

	$this->end_controls_tab();

	// Hover Tab
	$this->start_controls_tab(
		'hover_tab',
		[
			'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'service_list_title_style_hover',
			[
				'controls' => [
					// Colors
					'color' 					=> [
						'id' 					=> 'hover_color',
						'default' 				=> '#ffffff',
						'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap:hover .rb-service-title, {{WRAPPER}} .rb-service-item-wrap:focus .rb-service-title',
					]
				],
			],
		);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();