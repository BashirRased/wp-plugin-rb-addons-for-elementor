<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'general_style',
	[
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'site_title_general_style',
	[
		'controls' => [
			// Text Align
			'align' 					=> [
				'options'     			=> rb_align_text(),
				'default'     			=> is_rtl() ? 'right' : 'left',
				'select_class' 			=> '{{WRAPPER}} .rb-site-title',
			],
			'align_separator' 			=> [],

			// Typography
			'typography' 		=> [
				'name'        			=> 'typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_PRIMARY],
				'select_class' 			=> '{{WRAPPER}} .rb-site-title',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'text_stroke',
				'select_class' 			=> '{{WRAPPER}} .rb-site-title',
			],
			'text_shadow' 				=> [
				'name'        			=> 'text_shadow',
				'select_class' 			=> '{{WRAPPER}} .rb-site-title',
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
			'site_title_general_style',
			[
				'controls' => [
					// Colors
					'color' 					=> [
						'default' 				=> '#007bff',
						'select_class' 			=> '{{WRAPPER}} .rb-site-title, {{WRAPPER}} .rb-site-title a',
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
			'site_title_general_style',
			[
				'controls' => [
					// Colors
					'color' 					=> [
						'id' 					=> 'hover_color',
						'default' 				=> '#007bff',
						'select_class' 			=> '{{WRAPPER}} .rb-site-title:hover a, {{WRAPPER}} .rb-site-title:focus a',
					],	
				],
			],
		);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();