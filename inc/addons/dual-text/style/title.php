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
	'dual_text_title_style',
	[
		'controls' => [
			// Text Align
			'align' 					=> [
				'options'     			=> rb_align_text(),
				'default'     			=> is_rtl() ? 'right' : 'left',
				'select_class' 			=> '{{WRAPPER}} .rb-dual-text-heading',
			],
			'align_separator' 			=> [],

			// Typography
			'typography' 		=> [
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_PRIMARY],
				'select_class' 			=> '{{WRAPPER}} .rb-dual-text-heading',
			],			
			'text_stroke' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-dual-text-heading',
			],
			'text_shadow' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-dual-text-heading',
			],
			'typography_separator' 		=> [],
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
		'dual_text_title_style',
		[
			'controls' => [
				// Colors
				'color' 				=> [
					'id' 					=> 'color',
					'default' 				=> '#777',
					'select_class' 			=> '{{WRAPPER}} .rb-dual-text-heading, {{WRAPPER}} .rb-dual-text-link',
				],
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
		'dual_text_title_style',
		[
			'controls' => [
				// Colors
				'color' 				=> [
					'id' 					=> 'hover_color',
					'default' 				=> '#007bff',
					'select_class' 			=> '{{WRAPPER}} .rb-dual-text-link:hover, {{WRAPPER}} .rb-dual-text-link:focus',
				],
			],
		],
	);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();