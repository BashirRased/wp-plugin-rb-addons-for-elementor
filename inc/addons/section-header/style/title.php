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
	'section_header_title_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_PRIMARY],
				'select_class' 			=> '{{WRAPPER}} .rb-section-title',
			],			
			'text_stroke' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-section-title',
			],
			'text_shadow' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-section-title',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 				=> [
				'id' 					=> 'color',
				'default' 				=> '#777',
				'select_class' 			=> '{{WRAPPER}} .rb-section-title',
			],
			'color' 				=> [
				'id' 					=> 'highlight_color',
				'label' 				=> esc_html__( 'Highlight Color', 'rb-elementor-addons' ),
				'default' 				=> '#007bff',
				'select_class' 			=> '{{WRAPPER}} .rb-section-title-highlight',
			],
			'color_separator' 			=> [],

			// Margin & Padding
			'margin_bottom' 			=> [
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 40,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-section-title-wrapper',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();