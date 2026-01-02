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
	'contact_info_general_content_repeater',
	[
		'controls' 						=> [
			'switch' 					=> [
				'id' 					=> 'show_icon',
				'default' 				=> 'no',
			],
			'select' 					=> [
				'id' 					=> 'icon_type',
				'label' 				=> esc_html__( 'Select Icon', 'rb-elementor-addons' ),
				'options' 				=> [
					'image' 			=> esc_html__( 'Image Icon', 'rb-elementor-addons' ),
					'icon' 				=> esc_html__( 'Font Icon', 'rb-elementor-addons' ),
				],
				'default' 				=> 'icon',
				'condition' 			=> [
					'show_icon' 		=> 'yes',
				]
			],
			'icon' 						=> [
				'id' 					=> 'font_icon',
				'condition' 			=> [
					'show_icon' 		=> 'yes',
					'icon_type' 		=> 'icon',
				]
			],
			'img' 						=> [
				'id' 					=> 'icon_image',
				'condition' 			=> [
					'show_icon' 		=> 'yes',
					'icon_type' 		=> 'image',
				]
			],
			'text' 						=> [
				'id' 					=> 'info_title',
				'label' 				=> esc_html__( 'Info Title', 'rb-elementor-addons' ),
			],
			'textarea' 					=> [
				'id' 					=> 'info_text',	
				'label' 				=> esc_html__( 'Info Text', 'rb-elementor-addons' ),
			],
		],
		'id' 							=> 'contact_info_repeater',
		'label' 						=> esc_html__( 'Info Item', 'rb-elementor-addons' ),
		'default' 						=> [
			[
				'info_title' 			=> esc_html__( 'Address:', 'rb-elementor-addons' ),
				'info_text' 			=> esc_html__( 'Dhaka, Bangladesh.', 'rb-elementor-addons' ),
			],
			[
				'info_title' 			=> esc_html__( 'Phone:', 'rb-elementor-addons' ),
				'info_text' 			=> esc_html__( '+88 01934 109870, +88 01841 109870', 'rb-elementor-addons' ),
			],
			[
				'info_title' 			=> esc_html__( 'E-mail:', 'rb-elementor-addons' ),
				'info_text' 			=> esc_html__( 'info@bashirrased.com, bashir.rased@gmail.com', 'rb-elementor-addons' ),
			],
		],
		'title_field' 					=> '{{{ info_title }}}',
	],
);

// End Section Tab
$this->end_controls_section();