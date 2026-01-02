<?php

use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'btn_before_style',
	[
		'label' => esc_html__( 'Button Before', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'button_btn_before_style',
	[
		'controls' => [
			// Colors
			'bg_color' 			=> [				
				'id' 					=> 'btn_before_bg_color',
				'default' 				=> '#000',			
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item::before',
			],
			'color_separator' 			=> [],

			// Transition
			'transition_property' 		=> [
				'id' 					=> 'btn_before_transition_property',
				'default' 				=> 'all',
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item::before',
			],
			'transition_duration' 		=> [
				'id' 					=> 'btn_before_transition_duration',
				'default' 				=> [
					'unit' 				=> 's',
					'size' 				=> 0.5,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item::before',
			],
			'timing_function' 			=> [
				'id' 					=> 'btn_before_timing_function',
				'default' 				=> 'ease-in-out',
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item::before',
			],
			'transition_delay' 			=> [
				'id' 					=> 'btn_before_transition_delay',
				'default' 				=> [
					'unit' 				=> 's',
					'size' 				=> 0,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item::before',
			],
			'transition_separator' 		=> [],
		],
	],
);

// End Section Tab
$this->end_controls_section();