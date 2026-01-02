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
	'btn_group_general_content_style',
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

// All repeater content add here
$this->add_repeater_controls(
	'btn_group_general_content_repeater',
	[
		'controls' => [
			'text' 						=> [
				'id' 					=> 'btn_text',
				'label' 				=> esc_html__( 'Button Text', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( 'Button', 'rb-elementor-addons' ),
			],
			'select' 					=> [
				'id' 					=> 'link_type',
				'label' 				=> esc_html__( 'Link Type', 'rb-elementor-addons' ),
				'options' 				=> [
					'page' 				=> esc_html__( 'Page Link', 'rb-elementor-addons' ),
					'custom'  			=> esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				],
				'default' 				=> 'custom',
			],
			'page_link' 				=> [
				'condition' 			=> [
					'link_type' 		=> 'page',
				],
			],
			'custom_link' 				=> [
				'condition' 			=> [
					'link_type' 		=> 'custom',
				],
			],
		],
		'id' 					=> 'btn_group_repeater',
		'label' 				=> esc_html__( 'Social Icon Item', 'rb-elementor-addons' ),
		'default' => [
			[
				'btn_text' 		=> esc_html__( 'Download CV', 'rb-elementor-addons' ),
			],
			[
				'btn_text' 		=> esc_html__( 'Contact Me', 'rb-elementor-addons' ),
			],
		],
		'title_field' 			=> '{{{ btn_text }}}',
	],
);

// End Section Tab
$this->end_controls_section();