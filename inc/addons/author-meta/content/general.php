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

// All content add here - Icon
$this->add_style_controls(
	'author_meta_general_content_icon',
	[
		'controls' => [
			// Select Option
			'select_option' 			=> [								
				'id'        			=> 'author_icon',
				'label' 				=> esc_html__( 'Author Icon', 'rb-elementor-addons' ),
				'options' 				=> [
					'none' 				=> esc_html__( 'None', 'rb-elementor-addons' ),
					'icon' 				=> esc_html__( 'Font Icon', 'rb-elementor-addons' ),
					'img'  				=> esc_html__( 'Image Icon', 'rb-elementor-addons' ),
				],
				'default' 				=> 'none',
			],

			// Upload Icon
			'icon' 						=> [								
				'id'        			=> 'icon_font',
				'label' 				=> esc_html__( 'Font Icon', 'rb-elementor-addons' ),				
				'condition' 			=> [
					'author_icon' 		=> 'icon',
				],
			],

			// Upload Image
			'img' 						=> [								
				'id'        			=> 'icon_img',
				'label' 				=> esc_html__( 'Image Icon', 'rb-elementor-addons' ),				
				'condition' 			=> [
					'author_icon' 		=> 'img',
				],
			],
		],
	],
);

// All content add here - Prefix
$this->add_style_controls(
	'author_meta_general_content_prefix',
	[
		'controls' => [
			// Select Option
			'select_option' 					=> [								
				'id'        					=> 'author_prefix_separtor',
				'label' 						=> esc_html__( 'Author Prefix', 'rb-elementor-addons' ),
				'options' 						=> [
					'none' 						=> esc_html__( 'None', 'rb-elementor-addons' ),
					'text' 						=> esc_html__( 'Text', 'rb-elementor-addons' ),
					'icon' 						=> esc_html__( 'Icon', 'rb-elementor-addons' ),
					'img' 						=> esc_html__( 'Image', 'rb-elementor-addons' ),
				],
				'default' 						=> 'none',
			],

			// Text
			'text' 								=> [								
				'id'        					=> 'prefix_text',
				'label' 						=> esc_html__( 'Prefix Text', 'rb-elementor-addons' ),
				'condition' 					=> [
					'author_prefix_separtor' 	=> 'text',
				],
			],

			// Upload Icon
			'icon' 								=> [								
				'id'        					=> 'prefix_font',
				'label' 						=> esc_html__( 'Font Icon', 'rb-elementor-addons' ),				
				'condition' 					=> [
					'author_prefix_separtor' 	=> 'icon',
				],
			],

			// Upload Image
			'img' 								=> [								
				'id'        					=> 'prefix_img',
				'label' 						=> esc_html__( 'Image Icon', 'rb-elementor-addons' ),				
				'condition' 					=> [
					'author_prefix_separtor' 	=> 'img',
				],
			],
		],
	],
);

// All content add here - Link
$this->add_style_controls(
	'author_meta_general_content_link',
	[
		'controls' => [
			// Select Option
			'select_option' 					=> [								
				'id'        					=> 'author_link',
				'label' 						=> esc_html__( 'Author Link', 'rb-elementor-addons' ),
				'options' 						=> [
					'none' 						=> esc_html__( 'None', 'rb-elementor-addons' ),
					'default' 					=> esc_html__( 'default', 'rb-elementor-addons' ),
				],
				'default' 						=> 'default',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();