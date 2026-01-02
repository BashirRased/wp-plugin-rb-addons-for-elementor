<?php
use Elementor\Controls_Manager;

// Start Section Tab - Content
$this->start_controls_section(
	'general_content',
	[
		'label' => esc_html__('General', 'rb-elementor-addons'),
		'tab' => Controls_Manager::TAB_CONTENT,
	]
);

// All content add here
$this->add_style_controls(
	'scroll_down_general_content',
	[
		'controls' => [
			// Select Option
			'select_option' 			=> [								
				'id'        			=> 'link_type',
				'label' 				=> esc_html__( 'Link Type', 'rb-elementor-addons' ),
				'options' 				=> [
					'page' 				=> esc_html__( 'Page Link', 'rb-elementor-addons' ),
					'custom'  			=> esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				],
				'default' 				=> 'custom',
			],

			// Select Page
			'page_link' 				=> [								
				'id'        			=> 'page_link',
				'condition' 			=> [
					'link_type' 		=> 'page',
				],
			],

			// Custom Link
			'custom_link' 				=> [								
				'id'        			=> 'custom_link',
				'condition' 			=> [
					'link_type' 		=> 'custom',
				],
			],

		],
	],
);

// End Section Tab
$this->end_controls_section();