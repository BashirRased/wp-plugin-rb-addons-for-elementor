<?php
use Elementor\Controls_Manager;

// Start Section Tab - Style
$this->start_controls_section(
	'wrapper_style',
	[
		'label' => esc_html__( 'Wrapper', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'section_header_wrapper_style',
	[
		'controls' => [
			// Text Align
			'align' 					=> [
				'options'     			=> rb_align_justify(),
				'default'     			=> 'center',
				'select_class' 			=> '{{WRAPPER}} .rb-section-header',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();