<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'label_style',
	[
		'label' => esc_html__( 'Resume Label', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition' => [
			'resume_label!' => '',
		],
	]
);

// All content add here
$this->add_style_controls(
	'resume_list_label_style',
	[
		'controls' => [
			// Order
			'order' 					=> [
				'id'        			=> 'label_order',
				'size_units'   			=> [''],
				'range'   				=> [
					''  				=> [
						'min' 			=> 1,
						'max' 			=> 4,
						'step' 			=> 1,
					],
				],
				'select_class' 			=> '{{WRAPPER}} .resume-list-label',
			],

			// Typography
			'typography' 		=> [
				'name'        			=> 'label_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .resume-list-label',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'label_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .resume-list-label',
			],
			'text_shadow' 				=> [
				'name'        			=> 'label_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .resume-list-label',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 					=> [
				'id' 					=> 'label_color',
				'default' 				=> '#ffffff',
				'select_class' 			=> '{{WRAPPER}} .resume-list-label',
			],
			'bg_color' 			=> [				
				'id' 					=> 'label_bg_color',
				'default' 				=> '#007bff',			
				'select_class' 			=> '{{WRAPPER}} .resume-list-label',
			],
			'color_separator' 			=> [],

			// Margin & Padding
			'padding' 					=> [								
				'id' 					=> 'label_padding',
				'default' 				=> [
					'top' 				=> '5',
					'right' 			=> '10',
					'bottom' 			=> '5',
					'left' 				=> '10',
					'unit' 				=> 'px',
					'isLinked' 			=> false,
				],
				'select_class' 			=> '{{WRAPPER}} .resume-list-label',
			],
			'margin_bottom' 			=> [				
				'id' 					=> 'label_margin_bottom',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 10,
				],
				'select_class' 			=> '{{WRAPPER}} .resume-list-label',
			],
			'width_height_separator'	=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'label_border',
				'select_class' 			=> '{{WRAPPER}} .resume-list-label',
			],
			'border_radius' 			=> [
				'id' 					=> 'label_border_radius',
				'select_class' 			=> '{{WRAPPER}} .resume-list-label',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();