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

$this->add_control(
	'service_style',
	[
		'label' => esc_html__( 'Choose Style', 'rb-elementor-addons' ),
		'type' => Controls_Manager::VISUAL_CHOICE,
		'label_block' => true,
		'options' => [
			'style-1' => [
				'title' => esc_attr__( 'Style - 1', 'rb-elementor-addons' ),
				'image' => plugins_url( '../../../../assets/img/service-list/style-1.png', __FILE__ ),
			],
			'style-2' => [
				'title' => esc_attr__( 'Style - 2', 'rb-elementor-addons' ),
				'image' => plugins_url( '../../../../assets/img/service-list/style-2.png', __FILE__ ),
			],
		],
		'default' => 'style-1',
		'columns' => 1,
	]
);

// All content add here
$this->add_style_controls(
	'service_list_general_content',
	[
		'controls' => [
			// Select Option
			'select_option' 			=> [								
				'id'        			=> 'icon_type',
				'label' 				=> esc_html__( 'Select Icon', 'rb-elementor-addons' ),
				'options' 				=> [
					'icon' 				=> esc_html__( 'Font Icon', 'rb-elementor-addons' ),
					'img' 				=> esc_html__( 'Image Icon', 'rb-elementor-addons' ),
				],
				'default' 				=> 'icon',
			],

			// Upload Icon
			'icon' 						=> [								
				'id'        			=> 'font_icon',
				'label' 				=> esc_html__( 'Font Icon', 'rb-elementor-addons' ),
				'default' 				=> [
					'value' 			=> 'fas fa-palette', 
					'library' 			=> 'fa-solid',
				],
				'condition' 			=> [
					'icon_type' 		=> 'icon',
				],
			],

			// Image Icon
			'img' 						=> [								
				'id'        			=> 'image_icon',
				'label' 				=> esc_html__( 'Image Icon', 'rb-elementor-addons' ),				
				'condition' 			=> [
					'icon_type' 		=> 'img',
				],
			],

			// Service Title
			'text' 						=> [
				'id' 					=> 'servie_title',
				'label' 				=> esc_html__( 'Service Title', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( 'Graphic Design', 'rb-elementor-addons' ),
			],

			// HTML Tag
			'html_tag' 					=> [
				'default' 				=> 'h4',
			],

			// Service Description
			'textarea' 					=> [
				'id' 					=> 'servie_description',
				'label' 				=> esc_html__( 'Service Description', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( 'Lorem Ipsum Commodo Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam', 'rb-elementor-addons' ),
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();