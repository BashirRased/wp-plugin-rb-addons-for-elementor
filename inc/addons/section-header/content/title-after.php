<?php
use Elementor\Controls_Manager;

// Start Section Tab - Content
$this->start_controls_section(
	'title_after_content',
	[
		'label' => esc_html__( 'Title After', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_CONTENT,
	]
);

// All content add here
$this->add_style_controls(
	'section_header_title_after_content',
	[
		'controls' => [
			// Switcher
			'switch' 					=> [								
				'id'        			=> 'title_after_switch',
				'label' 				=> esc_html__( 'Title After Show', 'rb-elementor-addons' ),
			],

			// Select Option
			'select_option' 			=> [								
				'id'        			=> 'title_after_icon_shape',
				'label' 				=> esc_html__( 'Icon Shape', 'rb-elementor-addons' ),
				'options' 				=> rb_icon_shape(),
				'default' 				=> 'triangle',
				'condition' 			=> [
					'title_after_switch'=> 'yes',
				],
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();