<?php

use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'title_after_style',
	[
		'label' => esc_html__( 'Title After', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,		
		'condition' => [
			'title_after_switch' => 'yes',
		],
	]
);

// All content add here
$this->add_style_controls(
	'section_header_title_after_style',
	[
		'controls' => [
			// Width & Height
			'icon_img_size' 			=> [
				'label' 				=> esc_html__( 'Icon Size', 'rb-elementor-addons' ),
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 20,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-section-title-after',
			],

			// Colors
			'bg_color' 			=> [				
				'id' 					=> 'title_after_bg_color',
				'default' 				=> '#007bff',				
				'select_class' 			=> '{{WRAPPER}} .rb-section-title-after',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();