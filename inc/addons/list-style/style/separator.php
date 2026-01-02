<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'separator_style',
	[
		'label' => esc_html__( 'Separator', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'list_style_separator_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'separator_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-separator',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'separator_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-separator',
			],
			'text_shadow' 				=> [
				'name'        			=> 'separator_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-separator',
			],
			'typography_separator' 		=> [],

			// Colors
			'fill_color' 		=> [
				'id' 					=> 'separator_color',
				'default' 				=> '#007bff',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-separator',
				'select_class_2' 		=> '{{WRAPPER}} .rb-list-item-separator svg',
			],
			'color_separator' 			=> [],

			// Margin & Padding
			'margin' 					=> [								
				'id' 					=> 'separator_margin',
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-separator',
			],
			'spacing_separator' 		=> [],

			// Font Size
			'icon_img_size' 			=> [
				'id' 					=> 'separator_img_size',
				'label' 				=> esc_html__( 'Image Icon Size', 'rb-elementor-addons' ),
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-separator img',
			],
			'icon_size' 				=> [
				'id' 					=> 'separator_font_size',
				'label' 				=> esc_html__( 'Font Icon Size', 'rb-elementor-addons' ),
				'select_class' 			=> '{{WRAPPER}} .rb-list-item-separator i',
				'select_class_2' 		=> '{{WRAPPER}} .rb-list-item-separator svg',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();