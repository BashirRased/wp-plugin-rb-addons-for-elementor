<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'subtitle_style',
	[
		'label' => esc_html__( 'Subtitle', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,		
		'condition' => [
			'subtitle_switch' => 'yes',
		],
	]
);

// All content add here
$this->add_style_controls(
	'section_header_subtitle_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'subtitle_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} rb-section-subtitle',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'subtitle_text_stroke',
				'select_class' 			=> '{{WRAPPER}} rb-section-subtitle',
			],
			'text_shadow' 				=> [
				'name'        			=> 'subtitle_text_shadow',
				'select_class' 			=> '{{WRAPPER}} rb-section-subtitle',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 					=> [
				'id' 					=> 'subtitle_color',
				'default' 				=> '#ffffff',
				'select_class' 			=> '{{WRAPPER}} .rb-section-subtitle',
			],
			'bg_color' 			=> [				
				'id' 					=> 'subtitle_bg_color',
				'default' 				=> '#007bff',				
				'select_class' 			=> '{{WRAPPER}} .rb-section-subtitle',
			],
			'color_separator' 			=> [],

			// Margin & Padding		
			'margin_bottom' 			=> [				
				'id' 					=> 'subtitle_margin_bottom',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 20,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-section-subtitle',
			],
			'padding' 					=> [								
				'id' 					=> 'subtitle_padding',
				'default' 				=> [
					'top' 				=> '5',
					'right' 			=> '20',
					'bottom' 			=> '5',
					'left' 				=> '20',
					'unit' 				=> 'px',
					'isLinked' 			=> false,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-section-subtitle',
			],
			'spacing_separator' 		=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'subtitle_border',
				'select_class' 			=> '{{WRAPPER}} .rb-section-subtitle',
			],
			'border_radius' 			=> [
				'id' 					=> 'subtitle_border_radius',
				'default' 				=> [
					'top' 				=> 20,
					'right' 			=> 20,
					'bottom' 			=> 20,
					'left' 				=> 20,
					'unit' 				=> 'px',
					'isLinked' 			=> true,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-section-subtitle',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();