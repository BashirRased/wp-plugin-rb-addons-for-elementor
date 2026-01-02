<?php

use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'icon_style',
	[
		'label' => esc_html__( 'Icon', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition' => [
			'author_icon!'	=> 'none',
		]
	]
);

// All content add here
$this->add_style_controls(
	'author_meta_icon_style',
	[
		'controls' => [
			// Colors
			'color' 				=> [
				'id' 					=> 'icon_color',
				'default' 				=> '#777',
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta-icon',
				'condition' 			=> [
					'author_icon'		=> 'icon',
				]
			],
			'color_separator' 			=> [
				'condition' 			=> [
					'author_icon'		=> 'icon',
				]
			],
			
			// Width & Height
			'icon_img_size' 			=> [
				'id' 					=> 'icon_img_size',
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta-icon img',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 20,
				],
				'condition' 			=> [
					'author_icon'		=> 'img',
				]
			],
			'icon_size' 				=> [				
				'id' 					=> 'icon_font_size',
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta-icon i',
				'select_class_2' 		=> '{{WRAPPER}} .rb-author-meta-icon svg',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 20,
				],
				'condition' 			=> [
					'author_icon'		=> 'icon',
				]
			],
			'width_height_separator'	=> [],
			
			// Margin & Padding
			'margin' 					=> [								
				'id' 					=> 'icon_margin',
				'default' 				=> [
					'top' 				=> '0',
					'right' 			=> '10',
					'bottom' 			=> '0',
					'left' 				=> '0',
					'unit' 				=> 'px',
					'isLinked' 			=> false,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta-icon',
			],
			'padding' 					=> [												
				'id' 					=> 'icon_padding',
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta-icon',
			],
			'spacing_separator' 		=> [],
			
			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'icon_border',
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta-icon',
			],
			'border_radius' 			=> [
				'id' 					=> 'icon_border_radius',
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta-icon',
			],
			'box_shadow' 				=> [
				'name'        			=> 'icon_box_shadow',
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta-icon',
			],		
			'border_separator' 		=> [],
		],
	],
);

// End Section Tab
$this->end_controls_section();