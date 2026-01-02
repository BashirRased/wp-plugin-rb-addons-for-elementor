<?php
use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'dropdown_ball_style',
	[
		'label' => esc_html__( 'Dropdown Ball', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'scroll_down_dropdown_ball_style',
	[
		'controls' => [
			// Colors
			'bg_color' 					=> [
				'id' 					=> 'dropdown_ball_bg_color',
				'default' 				=> '#ffffff',
				'select_class' 			=> '{{WRAPPER}} .rb-scroll-down::after',
			],

			// Width & Height
			'top' 						=> [
				'id' 					=> 'dropdown_ball_top',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 10,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-scroll-down::after',
			],
			'width' 					=> [
				'id' 					=> 'dropdown_ball_width',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 6,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-scroll-down::after',
			],
			'height' 					=> [
				'id' 					=> 'dropdown_ball_height',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 12,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-scroll-down::after',
			],
			'width_height_separator'	=> [],

			// Border & Border Radius
			'border_radius' 			=> [
				'id' 					=> 'dropdown_ball_border_radius',
				'default' 				=> [
					'top' 				=> 10,
					'right' 			=> 10,
					'bottom' 			=> 10,
					'left' 				=> 10,
					'unit' 				=> 'px',
					'isLinked' 			=> true,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-scroll-down::after',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();