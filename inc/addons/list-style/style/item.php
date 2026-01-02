<?php

use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'item_style',
	[
		'label' => esc_html__( 'List Item', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'list_style_item_style',
	[
		'controls' => [
			// Padding & Margin
			'padding' 					=> [								
			'id' 						=> 'item_padding',
			'default' 					=> [
				'top' 					=> '15',
				'right' 				=> '0',
				'bottom' 				=> '15',
				'left' 					=> '0',
				'unit' 					=> 'px',
				'isLinked' 				=> false,
			],
			'select_class' 				=> '{{WRAPPER}} .rb-list-item',			
			],
			
			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'item_border',
				'fields_options' 		=> [
					'border' 			=> ['default' => 'solid'],
					'width' 			=> [
						'default' 		=> [
							'top' 		=> '0',
							'right' 	=> '0',
							'bottom'	=> '1',
							'left' 		=> '0',
							'isLinked'	=> false,
						],
					],
					'color' => [
						'default' 		=> '#007bff',
					],
				],
				'select_class' 		=> '{{WRAPPER}} .rb-list-item:not(:last-child)',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();