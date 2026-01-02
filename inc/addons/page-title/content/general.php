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
	'page_title_general_content',
	[
		'controls' => [
			// Select Option
			'select_option' 			=> [								
				'id'        			=> 'link_type',
				'label' 				=> esc_html__( 'Link Type', 'rb-elementor-addons' ),
				'options' 				=> [
					'none' 				=> esc_html__( 'None', 'rb-elementor-addons' ),
					'default' 			=> esc_html__( 'Default Link', 'rb-elementor-addons' ),
					'custom'  			=> esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				],
				'default' 				=> 'default',
			],

			// Custom Link
			'custom_link' 				=> [
				'condition' 			=> [
					'link_type' 		=> 'custom',
				],
			],

			// HTML Tag
			'html_tag' 					=> [],
		],
	],
);

// End Section Tab
$this->end_controls_section();