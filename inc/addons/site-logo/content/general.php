<?php

use Elementor\Controls_Manager;

// Start Section Tab - Content
$this->start_controls_section(
	'general_content',
	[
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_CONTENT,
	]
);

// All content add here
$this->add_style_controls(
	'site_logo_general_content',
	[
		'controls' => [
			// Select Option
			'select_option' 			=> [								
				'id'        			=> 'logo_type',
				'label'   				=> esc_html__( 'Logo Type', 'rb-elementor-addons' ),
				'options' 				=> [
					'default' 			=> esc_html__( 'Default', 'rb-elementor-addons' ),
					'custom'  			=> esc_html__( 'Custom', 'rb-elementor-addons' ),
				],
				'default' 				=> 'default',
			],

			// Upload Image
			'img' 						=> [								
				'id'        			=> 'custom_logo',
				'label' 				=> esc_html__( 'Custom Logo', 'rb-elementor-addons' ),
			],

			// Upload Image
			'img_size' 					=> [								
				'name'        			=> 'site_logo_size',
				'default' 				=> 'thumbnail',
				'condition' 			=> [
					'logo_type'	 		=> 'custom',
				],
			],

			// Select Option
			'select_option' 			=> [								
				'id'        			=> 'logo_link',
				'label'   				=> esc_html__( 'Logo Link', 'rb-elementor-addons' ),
				'options' 				=> [
					'default' 			=> esc_html__( 'Default', 'rb-elementor-addons' ),
					'custom'  			=> esc_html__( 'Custom', 'rb-elementor-addons' ),
				],
				'default' 				=> 'default',
			],

			// Custom Link
			'custom_link' 				=> [								
				'id'        			=> 'custom_link',
				'condition' 			=> [
					'logo_link' 		=> 'custom',
				],
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();