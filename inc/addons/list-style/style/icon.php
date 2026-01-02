<?php

use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'icon_style',
	[
		'label' => esc_html__( 'Icon', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'list_style_icon_style',
	[
		'controls' => [
			// Colors
			'fill_color' 				=> [
				'id' 					=> 'icon_fill_color',
				'default' 				=> '#ffffff',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-icon i',
				'select_class_2' 		=> '{{WRAPPER}} .rb-list-item-icon svg',
			],
			'bg_color' 					=> [				
				'id' 					=> 'icon_bg_color',
				'default' 				=> '#007bff',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-icon',
			],
			'color_separator' 			=> [],

			// Width & Height
			'width' 					=> [
				'id' 					=> 'icon_width',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 40,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-icon',
			],
			'height' 					=> [
				'id' 					=> 'icon_height',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 40,
				],
				'select_class' 		 	=> '{{WRAPPER}} .rb-list-item-icon',
			],
			'icon_img_size' 			=> [
				'label' 				=> esc_html__( 'Image Icon Size', 'rb-elementor-addons' ),
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 20,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-icon img',
			],
			'icon_size' 				=> [
				'id' 					=> 'icon_font_size',
				'label' 				=> esc_html__( 'Font Icon Size', 'rb-elementor-addons' ),
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 20,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-icon i',
				'select_class_2' 		=> '{{WRAPPER}} .rb-list-item-icon svg',
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
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-icon',
			],
			'padding' 					=> [								
				'id' 					=> 'icon_padding',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-icon',
			],
			'spacing_separator' 		=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'icon_border',
				'select_class' 		 	=> '{{WRAPPER}} .rb-list-item-icon',
			],
			'border_radius' 			=> [
				'id' 					=> 'icon_border_radius',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-icon',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();