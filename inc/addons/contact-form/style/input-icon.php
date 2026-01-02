<?php
use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'input_icon_style',
	[
		'label' => esc_html__( 'Input Icon', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'contact_form_input_icon_style',
	[
		'controls' => [
			// Colors
			'color' 					=> [
				'id' 					=> 'input_icon_color',
				'default' 				=> '#fff',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-form-item-icon',
			],
			'bg_color' 			=> [
				'id' 					=> 'input_icon_bg_color',
				'default' 				=> '#007bff',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-form-item-icon',
			],
			'color_separator' 			=> [],

			// Width & Height
			'icon_size' 				=> [								
				'id' 					=> 'input_icon_icon_size',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-form-item-icon i',
				'select_class_2' 		=> '{{WRAPPER}} .rb-contact-form-item-icon svg',
			],
			'icon_img_size' 			=> [								
				'id' 					=> 'input_icon_icon_img_size',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-form-item-icon img',
			],
			'width_height_separator' 	=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'input_icon_border',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-form-item-icon',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();