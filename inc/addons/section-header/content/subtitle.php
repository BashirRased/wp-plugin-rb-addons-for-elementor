<?php
use Elementor\Controls_Manager;

// Start Section Tab - Content
$this->start_controls_section(
	'subtitle_content',
	[
		'label' => esc_html__( 'Sub Title', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_CONTENT,
	]
);

// All content add here
$this->add_style_controls(
	'section_header_subtitle_content',
	[
		'controls' => [
			// Switcher
			'switch' 					=> [								
				'id'        			=> 'subtitle_switch',
				'label' 				=> esc_html__( 'Sub Title Show', 'rb-elementor-addons' ),
				'default' 				=> 'no',
			],

			// Text
			'text' 						=> [								
				'id'        			=> 'subtitle_text',
				'label' 				=> esc_html__( 'Sub Title Text', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( 'Subtitle', 'rb-elementor-addons' ),
				'condition' 			=> [
					'subtitle_switch'	=> 'yes',
				],
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();