<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

$this->start_controls_section(
	'general_style',
	[
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'button_general_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item',
			],			
			'text_stroke' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item',
			],
			'text_shadow' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item',
			],
			'typography_separator' 		=> [],
			
			// Text Align
			'align' 					=> [
				'options'     			=> rb_align_text(),
				'default'     			=> is_rtl() ? 'right' : 'left',
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item-wrap',
			],
			'align_separator' 			=> [],

			// Colors
			'color' 					=> [
				'default' 				=> '#ffffff',
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item',
			],
			'bg_color' 					=> [
				'default' 				=> '#007bff',			
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item',
			],
			'border_color' 				=> [
				'default' 				=> '#ffffff',
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item',
			],
			'color_separator' 			=> [],

			// Margin & Padding
			'margin' 					=> [
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item',
			],
			'padding' 					=> [
				'default' 				=> [
					'top' 				=> '10',
					'right' 			=> '45',
					'bottom' 			=> '10',
					'left' 				=> '45',
					'unit' 				=> 'px',
					'isLinked' 			=> false,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item',
			],
			'spacing_separator' 		=> [],	

			// Border & Border Radius
			'border' 					=> [
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item',
			],
			'border_radius' 			=> [
				'select_class' 			=> '{{WRAPPER}} .rb-btn-item',
			],			
			'border_separator' 			=> [],
		],
	],
);

$this->end_controls_section();