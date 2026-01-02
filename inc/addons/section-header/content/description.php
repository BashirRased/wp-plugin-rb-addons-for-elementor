<?php
use Elementor\Controls_Manager;

// Start Section Tab - Content
$this->start_controls_section(
	'description_content',
	[
		'label' => esc_html__( 'Description', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_CONTENT,
	]
);

// All content add here
$this->add_style_controls(
	'section_header_description_content',
	[
		'controls' => [
			// Switcher
			'switch' 					=> [								
				'id'        			=> 'description_switch',
				'label' 				=> esc_html__( 'Description Show', 'rb-elementor-addons' ),
				'default' 				=> 'no',
			],

			// Textarea
			'textarea' 						=> [								
				'id'        			=> 'description_text',
				'label' 				=> esc_html__( 'Description Text', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( 'This is a simple description.', 'rb-elementor-addons' ),
				'condition' 			=> [
					'description_switch'	=> 'yes',
				],
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();