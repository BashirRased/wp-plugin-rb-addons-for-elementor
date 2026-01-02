<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'title_style',
	[
		'label' => esc_html__( 'Title', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'contact_info_title_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_PRIMARY],
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-title',
			],			
			'text_stroke' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-title',
			],
			'text_shadow' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-title',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 				=> [
				'default' 				=> '#007bff',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-title',
			],
			'color_separator' 			=> [],

			// Margin & Padding
			'margin_bottom' 			=> [
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 10,
				],
				'select_class' 	  		=> '{{WRAPPER}} .rb-contact-info-title',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();