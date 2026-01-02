<?php

use Elementor\Controls_Manager;

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
	'site_logo_general_style',
	[
		'controls' => [
			// Text Align
			'align' 					=> [
				'options'     			=> rb_align_text(),
				'default'     			=> is_rtl() ? 'right' : 'left',
			],
			'align_separator' 			=> [],

			// Width & Height
			'width' 					=> [
				'select_class' 			=> '{{WRAPPER}} .rb-site-logo img, {{WRAPPER}} .custom-logo',
			],
			'max_width' 				=> [
				'select_class' 			=> '{{WRAPPER}} .rb-site-logo img, {{WRAPPER}} .custom-logo',
			],
			'height' 					=> [
				'select_class' 			=> '{{WRAPPER}} .rb-site-logo img, {{WRAPPER}} .custom-logo',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();