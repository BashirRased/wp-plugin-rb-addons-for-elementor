<?php
use Elementor\Controls_Manager;

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
	'scroll_down_general_style',
	[
		'controls' => [
			// Width & Height			
			'width' 					=> [
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 30,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-scroll-down',
			],
			'height' 					=> [
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 50,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-scroll-down',
			],
			'width_height_separator'	=> [],

			// Border & Border Radius
			'border' 					=> [
				'fields_options' 		=> [
					'border' 			=> ['default' => 'solid'],
					'width' 			=> [
						'default' 		=> [
							'top' 		=> '2',
							'right' 	=> '2',
							'bottom'	=> '2',
							'left' 		=> '2',
							'isLinked'	=> true,
						],
					],
					'color' 			=> [
						'default' 		=> '#ffffff',
					],
				],
				'select_class' 			=> '{{WRAPPER}} .rb-scroll-down',
			],
			'border_radius' 			=> [
				'default' 				=> [
					'top' 				=> 50,
					'right' 			=> 50,
					'bottom' 			=> 50,
					'left' 				=> 50,
					'unit' 				=> 'px',
					'isLinked' 			=> true,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-scroll-down',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();