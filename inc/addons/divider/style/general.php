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
	'post_thumbnail_general_style',
	[
		'controls' => [
			// Border & Border Radius
			'border' 					=> [
				'fields_options' 		=> [
					'border' 			=> ['default' => 'solid'],
					'width' 			=> [
						'default' 		=> [
							'top' 		=> '1',
							'right' 	=> '0',
							'bottom'	=> '0',
							'left' 		=> '0',
							'isLinked'	=> false,
						],
					],
					'color' => [
						'default' 		=> '#007bff',
					],
				],
				'select_class' 			=> '{{WRAPPER}} .rb-divider',
			],
			'border_radius' 			=> [
				'select_class' 			=> '{{WRAPPER}} .rb-divider',
			],			
			'border_separator' 			=> [],

			// Width & Height
			'width' 					=> [
				'default' 				=> [
					'unit' 				=> '%',
					'size' 				=> 100,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-divider',
			],
			'width_height_separator'	=> [],

			// Text Align
			'justify_align' 			=> [
				'options'     			=> rb_align_text(),
				'default'     			=> is_rtl() ? 'right' : 'left',
				'select_class' 			=> '{{WRAPPER}} .rb-divider-container',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();