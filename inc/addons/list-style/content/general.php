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
	'list_style_general_content_repeater',
	[
		'controls' => [
			'switch' 					=> [
				'id' 					=> 'icon_switch',
				'label' 				=> esc_html__( 'Icon Show', 'rb-elementor-addons' ),
				'default' 				=> 'no',
			],
			'select' 					=> [
				'id' 					=> 'icon_type',
				'label' 				=> esc_html__( 'Icon Type', 'rb-elementor-addons' ),
				'options' 				=> [
					'icon' 				=> esc_html__( 'Icon', 'rb-elementor-addons' ),
					'image' 			=> esc_html__( 'Image', 'rb-elementor-addons' ),
				],
				'default' 				=> 'icon',
				'condition' 			=> [
					'icon_switch' 		=> 'yes',
				],
			],
			'icon' 						=> [
				'id' 					=> 'font_icon',
				'label' 				=> esc_html__( 'Font Icon', 'rb-elementor-addons' ),
				'default' 				=> [
					'value' 			=> 'fas fa-user', 
					'library' 			=> 'fa-solid',
				],
				'condition' 			=> [
					'icon_switch' 		=> 'yes',
					'icon_type' 		=> 'icon',
				],
			],
			'img' 						=> [
				'id' 					=> 'icon_image',
				'label' 				=> esc_html__( 'Icon Image', 'rb-elementor-addons' ),
				'condition' 			=> [
					'icon_switch' 		=> 'yes',
					'icon_type' 		=> 'image',
				],				
			],
			'text' 						=> [
				'id' 					=> 'label_text',
				'label' 				=> esc_html__( 'Label Text', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( 'Name', 'rb-elementor-addons' ),
			],
			'select_2' 					=> [
				'id' 					=> 'separator_type',
				'label' 				=> esc_html__( 'Separator Type', 'rb-elementor-addons' ),
				'options' 				=> [
					'text' 				=> esc_html__( 'Text', 'rb-elementor-addons' ),
					'icon' 				=> esc_html__( 'Icon', 'rb-elementor-addons' ),
					'image' 			=> esc_html__( 'Image', 'rb-elementor-addons' ),
				],
				'default' 				=> 'text',
			],
			'text_2' 					=> [
				'id' 					=> 'separator_text',
				'label' 				=> esc_html__( 'Separator Text', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( ':', 'rb-elementor-addons' ),
				'condition' 			=> [
					'separator_type'	=> 'text',
				],
			],
			'icon_2' 					=> [
				'id' 					=> 'separator_font_icon',
				'label' 				=> esc_html__( 'Separator Font Icon', 'rb-elementor-addons' ),
				'default' 				=> [
					'value' 			=> 'fas fa-user', 
					'library' 			=> 'fa-solid',
				],
				'condition' 			=> [
					'separator_type' 	=> 'icon',
				],
			],
			'img_2' 					=> [
				'id' 					=> 'separator_icon_image',
				'label' 				=> esc_html__( 'Separator Icon Image', 'rb-elementor-addons' ),
				'condition' 			=> [
					'separator_type' 	=> 'image',
				],
			],
			'text_3' 					=> [
				'id' 					=> 'info_text',
				'label' 				=> esc_html__( 'Info Text', 'rb-elementor-addons' ),
				'default' 				=> esc_html__( 'Bashir Rased', 'rb-elementor-addons' ),
			],
		],
		'id' 					=> 'list_style_repeater',
		'label' 				=> esc_html__( 'List Item', 'rb-elementor-addons' ),
		'default' 				=> [
			[				
				'font_icon' 	=> [
					'value' 	=> 'fas fa-user', 
					'library' 	=> 'fa-solid',
				],
				'label_text' 	=> esc_html__( 'Name', 'rb-elementor-addons' ),
				'separator_text'=> esc_html__( ':', 'rb-elementor-addons' ),
				'info_text' 	=> esc_html__( 'Bashir Rased', 'rb-elementor-addons' ),
			],
			[
				'font_icon' 	=> [
					'value' 	=> 'fas fa-calendar-alt', 
					'library' 	=> 'fa-solid',
				],
				'label_text' 	=> esc_html__( 'Date of Birth', 'rb-elementor-addons' ),
				'separator_text'=> esc_html__( ':', 'rb-elementor-addons' ),
				'info_text' 	=> esc_html__( '05 November 1994', 'rb-elementor-addons' ),
			],
			[
				'font_icon' 	=> [
					'value' 	=> 'fas fa-phone-volume',
					'library' 	=> 'fa-solid',
				],
				'label_text' 	=> esc_html__( 'Mobile', 'rb-elementor-addons' ),
				'separator_text'=> esc_html__( ':', 'rb-elementor-addons' ),
				'info_text' 	=> esc_html__( '+88 01841 909870, +88 01934 109870', 'rb-elementor-addons' ),
			],
			[
				'font_icon'	 	=> [
					'value' 	=> 'fas fa-envelope',
					'library' 	=> 'fa-solid',
				],
				'label_text' 	=> esc_html__( 'E-mail', 'rb-elementor-addons' ),
				'separator_text'=> esc_html__( ':', 'rb-elementor-addons' ),
				'info_text' 	=> esc_html__( 'info@bashirrased.com, bashir.rased@gmail.com', 'rb-elementor-addons' ),
			],
			[
				'font_icon' 	=> [
					'value' 	=> 'fas fa-map-marker-alt',
					'library' 	=> 'fa-solid',
				],
				'label_text' 	=> esc_html__( 'Address', 'rb-elementor-addons' ),
				'separator_text'=> esc_html__( ':', 'rb-elementor-addons' ),
				'info_text' 	=> esc_html__( 'Shonir Akhra, Jatrabari, Dhaka-1362.', 'rb-elementor-addons' ),
			],
		],
		'title_field' 			=> '{{{ label_text }}}',
	],
);

// End Section Tab
$this->end_controls_section();