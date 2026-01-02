<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'wrap_style',
	[
		'label' => esc_html__( 'Wrap', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'contact_info_wrap_style',
	[
		'controls' => [
			// Text Align
			'align' 					=> [
				'id' 					=> 'item_align',
				'options'     			=> rb_align_text(),
				'default'     			=> is_rtl() ? 'right' : 'left',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-item',
			],
			'align_separator' 			=> [],

			// Colors
			'bg_color' 					=> [
				'id' 					=> 'item_bg_color',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-item',
			],
			'color_separator' 			=> [],

			// Flex
			'flex_direction' 			=> [								
				'id' 					=> 'item_flex_direction',
				'default' 				=> 'column',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info',
			],
			'gap' 						=> [								
				'id' 					=> 'item_gap',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 10,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info',
			],
			'flex_separator' 			=> [],

			// Width & Height
			'width' 					=> [								
				'id' 					=> 'item_width',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-item',
			],
			'switch' 					=> [								
				'id' 					=> 'item_before_switch',
				'label' 				=> esc_html__( 'Before Border Show', 'rb-elementor-addons' ),
				'default' 				=> 'no',
			],
			'icon_img_size' 			=> [								
				'id' 					=> 'item_before_width',
				'label' 				=> esc_html__( 'Before Width', 'rb-elementor-addons' ),
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 60,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-item:before, {{WRAPPER}} .rb-contact-info-item:after',
				'condition' 			=> [
					'item_before_switch'=> 'yes',
				],
			],
			'icon_img_size_2' 			=> [								
				'id' 					=> 'item_before_width_hover',
				'label' 				=> esc_html__( 'Before Width Hover', 'rb-elementor-addons' ),
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 100,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-item:hover:before, {{WRAPPER}} .rb-contact-info-item:hover:after,
											{{WRAPPER}} .rb-contact-info-item:focus:before, {{WRAPPER}} .rb-contact-info-item:focus:after',
				'condition' 			=> [
					'item_before_switch'=> 'yes',
				],			
			],
			'width_height_separator'	=> [
				'condition' 			=> [
					'item_before_switch'=> 'yes',
				],
			],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'item_before_border',
				'fields_options' 		=> [
					'border' 			=> ['default' => 'solid'],
					'width' 			=> [
						'default' 		=> [
							'top' 		=> '1',
							'right' 	=> '0',
							'bottom'	=> '0',
							'left' 		=> '1',
							'isLinked'	=> false,
						],
					],
					'color' 			=> [
						'default' 		=> '#007bff',
					],
				],
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-item:before, {{WRAPPER}} .rb-contact-info-item:after',
				'condition' 			=> [
					'item_before_switch'=> 'yes',
				],
			],
			'border_separator' 			=> [
				'condition' 			=> [
					'item_before_switch'=> 'yes',
				],
			],

			// Margin & Padding
			'padding' 					=> [								
				'id' 					=> 'item_padding',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-item',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();