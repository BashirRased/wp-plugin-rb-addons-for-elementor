<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'resume_title_style',
	[
		'label' => esc_html__( 'Resume Title', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition' => [
			'resume_title!' => '',
		],
	]
);

// All content add here
$this->add_style_controls(
	'resume_list_resume_title_style',
	[
		'controls' => [
			// Order
			'order' 					=> [
				'id'        			=> 'title_order',
				'size_units'   			=> [''],
				'range'   				=> [
					''  				=> [
						'min' 			=> 1,
						'max' 			=> 4,
						'step' 			=> 1,
					],
				],
				'select_class' 			=> '{{WRAPPER}} .resume-list-title',
			],

			// Typography
			'typography' 		=> [
				'name'        			=> 'resume_title_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_PRIMARY],
				'select_class' 			=> '{{WRAPPER}} .resume-list-title',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'resume_title_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .resume-list-title',
			],
			'text_shadow' 				=> [
				'name'        			=> 'resume_title_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .resume-list-title',
			],
			'typography_separator' 		=> [],

			// Margin
			'margin_bottom' 			=> [				
				'id' 					=> 'resume_title_margin_bottom',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 20,
				],
				'select_class' 		=> '{{WRAPPER}} .resume-list-title',
			],
		],
	],
);

// Tabs
$this->start_controls_tabs( 'title_tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'title_normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'resume_list_resume_title_style',
			[
				'controls' => [
					// Colors
					'color' 			=> [				
						'id' 					=> 'resume_title_color',
						'default' 				=> '#000',				
						'select_class' 			=> '{{WRAPPER}} .resume-list-title',
					],
				],
			],
		);

	$this->end_controls_tab();

	// Hover Tab
	$this->start_controls_tab(
		'title_hover_tab',
		[
			'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'resume_list_resume_title_style_hover',
			[
				'controls' 						=> [
					// Colors
					'color' 					=> [				
						'id' 					=> 'resume_title_hover_color',
						'default' 				=> '#fff',				
						'select_class' 			=> '{{WRAPPER}} .resume-list-item:hover .resume-list-title, {{WRAPPER}} .resume-list-item:focus .resume-list-title',
					],
				],
			],
		);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();