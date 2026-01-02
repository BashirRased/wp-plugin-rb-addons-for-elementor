<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'info_style',
	[
		'label' => esc_html__( 'Info', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'list_style_info_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'info_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-info',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'info_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-info',
			],
			'text_shadow' 				=> [
				'name'        			=> 'info_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-info',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 				=> [
				'id' 					=> 'info_color',
				'default' 				=> '#777',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-info',
			],
			'color_separator' 			=> [],

			// Margin & Padding
			'margin' 					=> [								
				'id' 					=> 'info_margin',				
				'default' 				=> [
					'top' 				=> '0',
					'right' 			=> '0',
					'bottom' 			=> '0',
					'left' 				=> '10',
					'unit' 				=> 'px',
					'isLinked' 			=> false,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-info',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();