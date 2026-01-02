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

// All content add here - Post Thumbnail Type
$this->add_style_controls(
	'post_thumbnail_type_content',
	[
		'controls' => [
			// Select Option
			'select_option' 			=> [								
				'id'        			=> 'post_thumbnail_type',
				'label' 				=> esc_html__( 'Thumbnail Type', 'rb-elementor-addons' ),
				'options' 				=> [
					'default' 			=> esc_html__( 'Default Link', 'rb-elementor-addons' ),
					'custom'  			=> esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				],
				'default' 				=> 'default',
			],

			// Upload Image
			'img' 						=> [								
				'id'        			=> 'custom_img',
				'condition' 			=> [
					'post_thumbnail_type' => 'custom',
				],
			],

			// Image Size
			'img_size' 					=> [								
				'name'        			=> 'post_thumbnail_img',
			],
		],
	],
);

// All content add here - Post Thumbnail Link
$this->add_style_controls(
	'post_thumbnail_link_content',
	[
		'controls' => [
			// Select Option
			'select_option' 			=> [								
				'id'        			=> 'post_thumbnail_link',
				'label' 				=> esc_html__( 'Thumbnail Link', 'rb-elementor-addons' ),
				'options' 				=> [					
					'none' 				=> esc_html__( 'None', 'rb-elementor-addons' ),
					'default' 			=> esc_html__( 'Default Link', 'rb-elementor-addons' ),
					'custom'  			=> esc_html__( 'Custom Link', 'rb-elementor-addons' ),
				],
				'default' 				=> 'default',
			],

			// Custom Link
			'custom_link' 				=> [
				'condition' 			=> [
					'post_thumbnail_link' 		=> 'custom',
				],
			],
		],
	],
);

// All content add here - Post Thumbnail Caption
$this->add_style_controls(
	'post_thumbnail_caption_content',
	[
		'controls' => [
			// Select Option
			'select_option' 			=> [								
				'id'        			=> 'post_thumbnail_caption',
				'label' 				=> esc_html__( 'Thumbnail Caption', 'rb-elementor-addons' ),
				'options' 				=> [
					'none' 				=> esc_html__( 'None', 'rb-elementor-addons' ),
					'display'  			=> esc_html__( 'Display', 'rb-elementor-addons' ),
					'hover'  			=> esc_html__( 'Display on hover', 'rb-elementor-addons' ),
				],
				'default' 				=> 'none',
			],

		],
	],
);

// End Section Tab
$this->end_controls_section();