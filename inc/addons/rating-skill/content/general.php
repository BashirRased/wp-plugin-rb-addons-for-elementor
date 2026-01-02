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

// All content add here - Rating
$this->add_style_controls(
	'rating_skill_general_content_rating',
	[
		'controls' => [
			// Select Option
			'select_option' 			=> [								
				'id'        			=> 'rating',
				'label' 				=> esc_html__( 'Rating', 'rb-elementor-addons' ),
				'options' 				=> [
					'0' 				=> esc_html__( '0 Star', 'rb-elementor-addons' ),
					'1' 				=> esc_html__( '1 Star', 'rb-elementor-addons' ),
					'2' 				=> esc_html__( '2 Star', 'rb-elementor-addons' ),
					'3' 				=> esc_html__( '3 Star', 'rb-elementor-addons' ),
					'4' 				=> esc_html__( '4 Star', 'rb-elementor-addons' ),
					'5' 				=> esc_html__( '5 Star', 'rb-elementor-addons' ),
				],
				'default' 				=> '5',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();