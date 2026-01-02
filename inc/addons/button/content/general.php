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
	'btn_text_general_content_style',
	[
		'controls' => [
			// Select Style
			'select_option' 		=> [								
				'id'        		=> 'choose_style',
				'options' 			=> [
					'style-1' 		=> esc_html__( 'Style - 01', 'rb-elementor-addons' ),
					'style-2'  		=> esc_html__( 'Style - 02', 'rb-elementor-addons' ),
				],
				'default' 			=> 'style-1',
			],
		],
	],
);

// All content add here
$this->add_style_controls(
	'btn_text_general_content',
	[
		'controls' => [
			// Text
			'text' 			=> [								
				'id'        		=> 'btn_text',
				'label' 			=> esc_html__( 'Button Text', 'rb-elementor-addons' ),
				'default' 			=> esc_html__( 'Button', 'rb-elementor-addons' ),
			],

			// Link Type
			'select_option' 			=> [								
				'id'        		=> 'link_type',
				'options' 			=> [
					'page' 			=> esc_html__( 'Page Link', 'rb-elementor-addons' ),
					'custom'  		=> esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				],
				'default' 			=> 'custom',
			],

			// Select Page
			'page_link' 			=> [								
				'id'        		=> 'page_link',
				'condition' 		=> [
					'link_type' 	=> 'page',
				],
			],

			// Custom Link
			'custom_link' 			=> [								
				'id'        		=> 'custom_link',
				'condition' 		=> [
					'link_type' 	=> 'custom',
				],
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();