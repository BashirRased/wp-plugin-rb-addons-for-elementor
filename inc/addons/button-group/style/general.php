<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

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
	'btn_group_general_style',	
	[
		'controls' => [
			// Text Align
			'justify_align' 		=> [
				'options'     		=> rb_align_text(),
				'default'     		=> is_rtl() ? 'right' : 'left',
				'select_class' 		=> '{{WRAPPER}} .rb-button-group',
			],
			'column_gap' 			=> [
				'id' 				=> 'column_gap',
				'default' 			=> [
					'unit' 			=> 'px',
					'size' 			=> 20,
				],
				'select_class' 		=> '{{WRAPPER}} .rb-button-group',
			],
			'row_gap' 				=> [
				'id' 				=> 'row_gap',
				'default' 			=> [
					'unit' 			=> 'px',
					'size' 			=> 20,
				],
				'select_class' 		=> '{{WRAPPER}} .rb-button-group',
			],
			'align_separator' 		=> [],

			// Typography
			'typography' 	=> [
				'global'      		=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 		=> '{{WRAPPER}} .rb-btn-item',
			],			
			'text_stroke' 			=> [
				'select_class' 		=> '{{WRAPPER}} .rb-btn-item',
			],
			'text_shadow' 			=> [
				'select_class' 		=> '{{WRAPPER}} .rb-btn-item',
			],
			'typography_separator' 	=> [],

			// Colors
			'color' 				=> [
				'default' 			=> '#ffffff',
				'select_class' 		=> '{{WRAPPER}} .rb-btn-item',
			],
			'bg_color' 			=> [
				'default' 			=> '#007bff',
				'select_class' 		=> '{{WRAPPER}} .rb-btn-item',
			],
			'color_separator' 		=> [],

			// Margin & Padding
			'padding' 				=> [
				'default' 			=> [
					'top' 			=> '10',
					'right' 		=> '45',
					'bottom' 		=> '10',
					'left' 			=> '45',
					'unit' 			=> 'px',
					'isLinked' 		=> false,
				],
				'select_class' 		=> '{{WRAPPER}} .rb-btn-item',
			],
			'spacing_separator' 	=> [],

			// Border & Border Radius
			'border' 				=> [
				'select_class' 		=> '{{WRAPPER}} .rb-btn-item',
			],
			'border_radius' 		=> [
				'select_class' 		=> '{{WRAPPER}} .rb-btn-item',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();