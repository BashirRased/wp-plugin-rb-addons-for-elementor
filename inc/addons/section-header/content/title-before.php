<?php
use Elementor\Controls_Manager;

// Start Section Tab - Content
$this->start_controls_section(
	'title_before_content',
	[
		'label' => esc_html__( 'Title Before', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_CONTENT,
	]
);

// All content add here
$this->add_style_controls(
	'section_header_title_before_content',
	[
		'controls' => [
			// Switcher
			'switch' 					=> [								
				'id'        			=> 'title_before_switch',
				'label' 				=> esc_html__( 'Title Before Show', 'rb-elementor-addons' ),
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();