<?php
use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'icon_style',
	[
		'label' => esc_html__( 'Icon', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'contact_info_icon_style',
	[
		'controls' => [
			// Width & Height
			'icon_size' 				=> [
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 16,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon i',
				'select_class_2' 		=> '{{WRAPPER}} .rb-contact-info-icon svg',
			],
			'icon_img_size' 			=> [
				'label' 				=> esc_html__( 'Icon Image Size', 'rb-elementor-addons' ),
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 16,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon img',
			],
			'width' 					=> [
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon',
			],
			'height' 					=> [
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon',
			],
			'width_height_separator'	=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'icon_border',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon',
			],
			'border_radius' 			=> [
				'id' 					=> 'icon_border_radius',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon',
			],
			'border_separator' 			=> [],

			// Margin & Padding
			'margin_bottom' 			=> [				
				'id' 					=> 'icon_margin_bottom',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 10,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon',
			],
			'padding' 					=> [								
				'id' 					=> 'icon_padding',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon',
			],
		],
	],
);

// Tabs
$this->start_controls_tabs( 'icon_tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'icon_normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'contact_info_icon_style',
			[
				'controls' => [
					// Colors
					'fill_color' 		=> [
						'id' 					=> 'icon_fill_color',
						'default' 				=> '#007bff',
						'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon i',
						'select_class_2' 		=> '{{WRAPPER}} .rb-contact-info-icon svg',
					],
					'bg_color' 					=> [
						'id' 					=> 'icon_bg_color',
						'default' 				=> '#ffffff',
						'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon',
					],
				],
			],
		);

	$this->end_controls_tab();

	// Hover Tab
	$this->start_controls_tab(
		'icon_hover_tab',
		[
			'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'contact_info_icon_style_hover',
			[
				'controls' => [
					// Colors
					'fill_color' 		=> [
						'id' 					=> 'icon_fill_color_hover',
						'default' 				=> '#ffffff',
						'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon:hover i, {{WRAPPER}} .rb-contact-info-icon:focus i',
						'select_class_2' 		=> '{{WRAPPER}} .rb-contact-info-icon:hover svg, {{WRAPPER}} .rb-contact-info-icon:focus svg',
					],
					'bg_color' 					=> [
						'id' 					=> 'icon_bg_color_hover',
						'default' 				=> '#007bff',
						'select_class' 			=> '{{WRAPPER}} .rb-contact-info-icon:hover, {{WRAPPER}} .rb-contact-info-icon:focus',
					],
				],
			],
		);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();