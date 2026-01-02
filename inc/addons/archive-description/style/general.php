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
	'archive_description_general_style',
	[
		'controls' => [
			// Text Align
			'align' 				=> [
				'options'     		=> rb_align_text(),
				'default'     		=> is_rtl() ? 'right' : 'left',
				'select_class' 		=> '{{WRAPPER}} .rb-archive-description',
			],
			'align_separator' 		=> [],

			// Typography
			'typography' 	=> [
				'global'      		=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],							
				'select_class' 		=> '{{WRAPPER}} .rb-archive-description',
			],			
			'text_stroke' 			=> [
				'select_class' 		=> '{{WRAPPER}} .rb-archive-description',
			],
			'text_shadow' 			=> [
				'select_class' 		=> '{{WRAPPER}} .rb-archive-description',
			],
			'typography_separator' 	=> [],

			// Colors
			'color' 			=> [
				'default' 			=> '#777',				
				'select_class' 		=> '{{WRAPPER}} .rb-archive-description',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();