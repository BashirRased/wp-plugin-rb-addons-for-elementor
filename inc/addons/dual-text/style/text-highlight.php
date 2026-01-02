<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'text_highlight_style',
	[
		'label' => esc_html__( 'Text Highlight', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'dual_text_text_highlight_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'text_highlight_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_PRIMARY],
				'select_class' 			=> '{{WRAPPER}} .rb-dual-text-item-highlight',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'text_highlight_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .rb-dual-text-item-highlight',
			],
			'text_shadow' 				=> [
				'name'        			=> 'text_highlight_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .rb-dual-text-item-highlight',
			],
			'box_shadow' 				=> [
				'name'        			=> 'text_highlight_box_shadow',
				'select_class' 			=> '{{WRAPPER}} .rb-dual-text-item-highlight',
			],
			'typography_separator' 		=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'text_highlight_border',
				'select_class' 			=> '{{WRAPPER}} .rb-dual-text-item-highlight',
			],
			'border_radius' 			=> [
				'id' 					=> 'text_highlight_border_radius',
				'select_class' 			=> '{{WRAPPER}} .rb-dual-text-item-highlight',
			],			
			'border_separator' 			=> [],
		],
	],
);

// Tabs
$this->start_controls_tabs( 'text_highlight_tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'text_highlight_normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

	// All content add here
	$this->add_style_controls(
		'dual_text_text_highlight_style',
		[
			'controls' => [
				// Colors
				'color' 				=> [
					'id' 					=> 'text_highlight_color',
					'default' 				=> '#007bff',
					'select_class' 			=> '{{WRAPPER}} .rb-dual-text-item-highlight',
				],
				'bg_color' 					=> [
					'id' 					=> 'text_highlight_bg_color',
					'select_class' 			=> '{{WRAPPER}} .rb-dual-text-item-highlight',
				],
			],
		],
	);

	$this->end_controls_tab();

	// Hover Tab
	$this->start_controls_tab(
		'text_highlight_hover_tab',
		[
			'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
		]
	);

	// All content add here
	$this->add_style_controls(
		'dual_text_text_highlight_style',
		[
			'controls' => [
				// Colors
				'color' 				=> [
					'id' 					=> 'text_highlight_hover_color',
					'default' 				=> '#777',
					'select_class' 			=> '{{WRAPPER}} .rb-dual-text-item-highlight:hover, {{WRAPPER}} .rb-dual-text-item-highlight:focus',
				],
				'bg_color' 					=> [
					'id' 					=> 'text_highlight_hover_bg_color',
					'select_class' 			=> '{{WRAPPER}} .rb-dual-text-item-highlight:hover, {{WRAPPER}} .rb-dual-text-item-highlight:focus',
				],
				'border_color' 					=> [
					'id' 					=> 'text_highlight_hover_border_color',
					'select_class' 			=> '{{WRAPPER}} .rb-dual-text-item-highlight:hover, {{WRAPPER}} .rb-dual-text-item-highlight:focus',
				],
			]
		],
	);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();