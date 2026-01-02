<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'description_style',
	[
		'label' => esc_html__( 'Description', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition' => [
			'description_switch' => 'yes',
		],
	]
);

// All content add here
$this->add_style_controls(
	'section_header_description_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'description_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .rb-section-description',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'description_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .rb-section-description',
			],
			'text_shadow' 				=> [
				'name'        			=> 'description_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .rb-section-description',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 				=> [
				'id' 					=> 'description_color',
				'default' 				=> '#777',
				'select_class' 			=> '{{WRAPPER}} .rb-section-description',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();