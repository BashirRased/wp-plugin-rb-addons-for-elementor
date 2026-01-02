<?php
use Elementor\Controls_Manager;

// Start Section Tab - Content
$this->start_controls_section(
	'title_content',
	[
		'label' => esc_html__('Title', 'rb-elementor-addons'),
		'tab' => Controls_Manager::TAB_CONTENT,
	]
);

// All repeater content add here
$this->add_repeater_controls(
	'section_header_title_content_repeater',
	[
		'controls' 						=> [
			'switch' 					=> [
				'id' 					=> 'title_show',
				'label' 				=> esc_html__( 'Text Highlight', 'rb-elementor-addons' ),
				'default' 				=> 'no',
			],
			'text' 						=> [
				'id' 					=> 'title_text',
				'label' 				=> esc_html__( 'Title Text', 'rb-elementor-addons' ),
			],
		],
		'id' 							=> 'title_list',
		'label' 						=> esc_html__( 'Title', 'rb-elementor-addons' ),
		'default' 						=> [
			[
				'title_show' 			=> 'no',
				'title_text' 			=> esc_html__( 'About', 'rb-elementor-addons' ),
			],
			[
				'title_show' 			=> 'yes',
				'title_text' 			=> esc_html__( 'Me', 'rb-elementor-addons' ),
			],
		],
		'title_field' 					=> '{{{ title_text }}}',
	],
);

// All content add here
$this->add_style_controls(
	'section_header_title_content',
	[
		'controls' => [
			// HTML Tag
			'html_tag' 					=> [
				'default' 				=> 'h4',
			],	
		],
	],
);

// End Section Tab
$this->end_controls_section();