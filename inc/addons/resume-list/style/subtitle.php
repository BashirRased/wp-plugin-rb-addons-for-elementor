<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'subtitle_style',
	[
		'label' => esc_html__( 'Resume Subtitle', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition' => [
			'resume_subtitle!' => '',
		],
	]
);

// All content add here
$this->add_style_controls(
	'resume_list_subtitle_style',
	[
		'controls' => [
			// Order
			'order' 					=> [
				'id'        			=> 'subtitle_order',
				'size_units'   			=> [''],
				'range'   				=> [
					''  				=> [
						'min' 			=> 1,
						'max' 			=> 4,
						'step' 			=> 1,
					],
				],
				'select_class' 			=> '{{WRAPPER}} .resume-list-subtitle',
			],

			// Typography
			'typography' 		=> [
				'name'        			=> 'subtitle_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .resume-list-subtitle',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'subtitle_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .resume-list-subtitle',
			],
			'text_shadow' 				=> [
				'name'        			=> 'subtitle_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .resume-list-subtitle',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 			=> [				
				'id' 					=> 'subtitle_color',
				'default' 				=> '#000',				
				'select_class' 			=> '{{WRAPPER}} .resume-list-subtitle',
			],
			'color_separator' 			=> [],

			// Margin
			'margin_bottom' 			=> [				
				'id' 					=> 'subtitle_margin_bottom',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 30,
				],
				'select_class' 		=> '{{WRAPPER}} .resume-list-subtitle',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();