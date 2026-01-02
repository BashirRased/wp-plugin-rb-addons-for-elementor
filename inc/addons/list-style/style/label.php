<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'label_style',
	[
		'label' => esc_html__( 'Label', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'list_style_label_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'label_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-label',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'label_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-label',
			],
			'text_shadow' 				=> [
				'name'        			=> 'label_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-label',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 				=> [
				'id' 					=> 'label_color',
				'default' 				=> '#007bff',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-label',
			],
			'color_separator' 			=> [],

			// Width & Height
			'min_width' 				=> [				
				'id' 				   	=> 'label_min_width',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 150,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-label',
			],
			'width_height_separator'	=> [],

			// Margin & Padding
			'margin' 					=> [								
				'id' 					=> 'label_margin',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-label',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();