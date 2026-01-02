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
	'archive_title_general_content',
	[
		'controls' => [
			// Link Type
			'select_option' 		=> [								
				'id'        		=> 'link_type',
				'options' 			=> [
					'none' 			=> esc_html__( 'None', 'rb-elementor-addons' ),
					'default' 		=> esc_html__( 'Default Link', 'rb-elementor-addons' ),
					'custom'  		=> esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				],
				'default' 			=> 'default',
			],

			// Custom Link
			'custom_link' 			=> [								
				'id'        		=> 'custom_link',
				'condition' 		=> [
					'link_type' 	=> 'custom',
				],
			],

			// HTML Tag
			'html_tag' 				=> [								
				'id'        		=> 'html_tag',
				'default' 			=> 'h2',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();