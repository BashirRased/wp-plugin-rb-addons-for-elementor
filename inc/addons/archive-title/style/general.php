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
	'archive_title_general_style',
	[
		'controls' => [
			// Text Align
			'align' 				=> [
				'options'     		=> rb_align_text(),
				'default'     		=> is_rtl() ? 'right' : 'left',
				'select_class' 		=> '{{WRAPPER}} .rb-archive-title',
			],
			'align_separator' 		=> [],

			// Typography
			'typography' 	=> [
				'global'      		=> ['default' => Global_Typography::TYPOGRAPHY_PRIMARY],
				'select_class' 		=> '{{WRAPPER}} .rb-archive-title',
			],			
			'text_stroke' 			=> [
				'select_class' 		=> '{{WRAPPER}} .rb-archive-title',
			],
			'text_shadow' 			=> [
				'select_class' 		=> '{{WRAPPER}} .rb-archive-title',
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

		$this->add_style_controls(
			'archive_title_general',
			[
				'controls' => [
					// Colors
					'color' 			=> [
						'id' 				=> 'color',
						'default' 			=> '#000',
						'select_class' 		=> '{{WRAPPER}} .rb-archive-title, {{WRAPPER}} .rb-archive-title a',
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

		$this->add_style_controls(
			'archive_title_general',
			[
				'controls' => [
					// Colors
					'color' 			=> [
						'id' 				=> 'hover_color',
						'default' 			=> '#007bff',
						'select_class' 		=> '{{WRAPPER}} .rb-archive-title:hover, {{WRAPPER}} .rb-archive-title:hover a',
					],
				],
			],
		);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();