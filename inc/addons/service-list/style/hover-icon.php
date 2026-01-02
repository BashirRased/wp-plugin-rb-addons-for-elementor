<?php
use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'icon_hover_style',
	[
		'label' => esc_html__( 'Hover Icon', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'service_list_icon_hover_style',
	[
		'controls' => [
			// Colors
			'fill_color' 				=> [
				'id' 					=> 'hover_fill_color',
				'select_class' 			=> '{{WRAPPER}} .rb-service-icon i',
				'select_class_2' 		=> '{{WRAPPER}} .rb-service-icon svg',
			],
			'bg_color' 					=> [
				'id' 					=> 'hover_bg_color',
				'default' 				=> '#ffffff',
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-hover .rb-service-icon',
			],
			'color_separator' 			=> [],

			// Width & Height
			'icon_img_size' 			=> [
				'id' 					=> 'hover_icon_img_size',
				'label' 				=> esc_html__( 'Image Size', 'rb-elementor-addons' ),
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-hover .rb-service-icon img',
				'condition' 			=> [
					'icon_type' 		=> 'img',
				],
			],
			'icon_size' 				=> [
				'id' 					=> 'hover_icon_size',
				'label' 				=> esc_html__( 'Icon Size', 'rb-elementor-addons' ),
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-hover .rb-service-icon i',
				'select_class_2' 		=> '{{WRAPPER}} .rb-service-item-hover .rb-service-icon svg',
				'condition' 			=> [
					'icon_type' 		=> 'icon',
				],
			],
			'width_height_separator'	=> [],

			// Margin & Padding
			'margin_bottom' 			=> [
				'id' 					=> 'icon_hover_margin_bottom',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 10,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-hover .rb-service-icon',
			],
			'padding' 					=> [
				'id' 					=> 'icon_hover_padding',
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-hover .rb-service-icon',
			],
			'spacing_separator' 		=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'icon_hover_border',
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-hover .rb-service-icon',
			],
			'border_radius' 			=> [
				'id' 					=> 'icon_hover_border_radius',
				'select_class' 			=> '{{WRAPPER}} .rb-service-item-hover .rb-service-icon',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();