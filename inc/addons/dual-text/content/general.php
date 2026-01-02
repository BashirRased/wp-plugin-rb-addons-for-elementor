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

// All repeater content add here
$this->add_repeater_controls(
	'dual_text_general_content_repeater',
	[
		'controls' => [
			'switch' 					=> [
				'id' 					=> 'title_highlight',
				'label' 				=> esc_html__( 'Title Text Highlight', 'rb-elementor-addons' ),
				'default' 				=> 'no',
			],
			'text' 						=> [
				'id' 					=> 'title_text',
				'label' 				=> esc_html__( 'Title Text', 'rb-elementor-addons' ),
			],
		],
		'id' 							=> 'title_repeater',
		'label' 						=> esc_html__( 'Dual Text Item', 'rb-elementor-addons' ),
		'default' 						=> [
			[
				'title_highlight' 		=> 'no',
				'title_text' 			=> esc_html__( 'Hi! I\'m ', 'rb-elementor-addons' ),
			],
			[
				'title_highlight' 		=> 'yes',
				'title_text' 			=> esc_html__( 'Bashir Rased', 'rb-elementor-addons' ),
			],
			[
				'title_highlight' 		=> 'no',
				'title_text' 			=> esc_html__( '. Welcome, to my portfolio website.', 'rb-elementor-addons' ),
			],
		],
		'title_field' 					=> '{{{ title_text }}}',
	],
);

// All content add here
$this->add_style_controls(
	'dual_text_general_content',
	[
		'controls' => [
			// HTML Tag
			'html_tag' 					=> [
				'default' 				=> 'h4',
			],
			// Custom Link
			'custom_link' 				=> [								
				'id'        			=> 'link',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();