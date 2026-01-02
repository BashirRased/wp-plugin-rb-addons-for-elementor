<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'description_style',
	[
		'label' => esc_html__( 'Description', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'service_list_description_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'description_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .rb-service-description',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'description_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .rb-service-description',
			],
			'text_shadow' 				=> [
				'name'        			=> 'description_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .rb-service-description',
			],
			'typography_separator' 		=> [],

			// Margin & Padding
			'margin_bottom' 			=> [				
				'id' 					=> 'description_margin_bottom',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 10,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-service-description',
			],
			'spacing_separator' 		=> [],

			// Alignment
			'align' 					=> [
				'id' 					=> 'description_align',
				'options'     			=> rb_align_justify(),
				'default'     			=> 'justify',
				'select_class' 			=> '{{WRAPPER}} .rb-service-description',
			],
		],
	],
);

// Tabs
$this->start_controls_tabs( 'description_tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'description_normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'service_list_description_style',
			[
				'controls' => [
					// Colors
					'color' 					=> [
						'id' 					=> 'description_color',
						'select_class' 			=> '{{WRAPPER}} .rb-service-description',
					],
				],
			],
		);

	$this->end_controls_tab();

	// Hover Tab
	$this->start_controls_tab(
		'description_hover_tab',
		[
			'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
		]
	);

		// All content add here
		$this->add_style_controls(
			'service_list_description_style_hover',
			[
				'controls' => [
					// Colors
					'color' 					=> [
						'id' 					=> 'description_color_hover',
						'select_class' 			=> '{{WRAPPER}} .rb-service-item-wrap:hover .rb-service-description, {{WRAPPER}} .rb-service-item-wrap:focus .rb-service-description',
					],
				],
			],
		);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();