<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'general_style',
	[
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'author_meta_general_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_PRIMARY],
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta',
			],			
			'text_stroke' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta',
			],
			'text_shadow' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta',
			],
			'typography_separator' 		=> [],

			// Text Align
			'align' 					=> [
				'options'     			=> rb_align_text(),
				'default'     			=> is_rtl() ? 'right' : 'left',
				'select_class' 			=> '{{WRAPPER}} .rb-author-meta-wrapper',
			],
		],
	],
);

// Tabs
$this->start_controls_tabs( 'tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

	// All content add here
	$this->add_style_controls(
		'author_meta_general_style',
		[
			'controls' => [
				'color' 				=> [
					'id' 				=> 'color',
					'default' 			=> '#000',
					'select_class' 		=> '{{WRAPPER}} .rb-author-meta-link, {{WRAPPER}} .rb-author-meta',
				],
			],
		],
	);

	$this->end_controls_tab();

	// Hover Tab
	$this->start_controls_tab(
		'hover_tab',
		[
			'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
		]
	);

	// All content add here
	$this->add_style_controls(
		'author_meta_general_style_hover',
		[
			'controls' => [
				'color' 				=> [
					'id' 				=> 'color_hover',
					'default' 			=> '#007bff',
					'select_class' 		=> '{{WRAPPER}} .rb-author-meta-link:hover, {{WRAPPER}} .rb-author-meta-link:focus, {{WRAPPER}} .rb-author-meta:hover, {{WRAPPER}} .rb-author-meta:focus',
				],
			],
		],
	);

	$this->end_controls_tab();

$this->end_controls_tabs();	

// End Section Tab
$this->end_controls_section();