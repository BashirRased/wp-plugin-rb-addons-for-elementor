<?php

use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'title_before_style',
	[
		'label' => esc_html__( 'Title Before', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition' => [
			'title_before_switch' => 'yes',
		],
	]
);

// All content add here
$this->add_style_controls(
	'section_header_title_before_style',
	[
		'controls' => [
			// Colors
			'bg_color' 			=> [				
				'id' 					=> 'title_before_bg_color',
				'default' 				=> '#777',				
				'select_class' 			=> '{{WRAPPER}} .rb-section-title-before',
			],
			'color_separator' 			=> [],
			
			// Width & Height
			'width' 					=> [
				'default' 				=> [
					'unit' 				=> '%',
					'size' 				=> 100,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-section-title-before',
			],
			'height' 					=> [
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 2,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-section-title-before',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();