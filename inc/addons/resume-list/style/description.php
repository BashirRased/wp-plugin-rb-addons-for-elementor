<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'description_style',
	[
		'label' => esc_html__( 'Description', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition' => [
			'resume_description!' => '',
		],
	]
);

// All content add here
$this->add_style_controls(
	'resume_list_description_style',
	[
		'controls' => [
			// Order
			'order' 					=> [
				'id'        			=> 'description_order',
				'size_units'   			=> [''],
				'range'   				=> [
					''  				=> [
						'min' 			=> 1,
						'max' 			=> 4,
						'step' 			=> 1,
					],
				],
				'default'      			=> [
					'size' 				=> 1,
				],
				'select_class' 			=> '{{WRAPPER}} .resume-list-description',
			],

			// Typography
			'typography' 		=> [
				'name'        			=> 'description_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .resume-list-description',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'description_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .resume-list-description',
			],
			'text_shadow' 				=> [
				'name'        			=> 'description_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .resume-list-description',
			],
		],
	],
);

// Tabs
$this->start_controls_tabs( 'description_tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'description_normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'resume_list_resume_description_style',
			[
				'controls' => [
					// Colors
					'color' 				=> [				
						'id' 					=> 'description_color',
						'default' 				=> '#000',				
						'select_class' 			=> '{{WRAPPER}} .resume-list-description',
					],
				],
			],
		);

	$this->end_controls_tab();

	// Hover Tab
	$this->start_controls_tab(
		'description_hover_tab',
		[
			'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'resume_list_resume_description_style_hover',
			[
				'controls' 						=> [
					// Colors
					'color' 					=> [				
						'id' 					=> 'description_color_hover',
						'default' 				=> '#fff',				
						'select_class' 			=> '{{WRAPPER}} .resume-list-item:hover .resume-list-description, {{WRAPPER}} .resume-list-item:focus .resume-list-description',
					],
				],
			],
		);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();