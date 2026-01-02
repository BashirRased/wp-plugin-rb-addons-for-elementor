<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Content
$this->start_controls_section(
	'general_style',
	[
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'site_tagline_general_style',
	[
		'controls' => [
			// Text Align
			'align' 					=> [
				'options'     			=> rb_align_text(),
				'default'     			=> is_rtl() ? 'right' : 'left',
				'select_class' 			=> '{{WRAPPER}} .rb-site-tagline',
			],
			'align_separator' 			=> [],

			// Typography
			'typography' 		=> [
				'name'        			=> 'typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_PRIMARY],
				'select_class' 			=> '{{WRAPPER}} .rb-site-tagline',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'text_stroke',
				'select_class' 			=> '{{WRAPPER}} .rb-site-tagline',
			],
			'text_shadow' 				=> [
				'name'        			=> 'text_shadow',
				'select_class' 			=> '{{WRAPPER}} .rb-site-tagline',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 					=> [
				'default' 				=> '#777',
				'select_class' 			=> '{{WRAPPER}} .rb-site-tagline',
			],	
		],
	],
);

// End Section Tab
$this->end_controls_section();