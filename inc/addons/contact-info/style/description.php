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
	'contact_info_description_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'description_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-text',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'description_typography',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-text',
			],
			'text_shadow' 				=> [
				'name'        			=> 'description_typography',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-text',
			],
			'typography_separator' 	=> [],

			// Colors
			'color' 				=> [
				'id' 					=> 'description_color',
				'default' 				=> '#777',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-info-text',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();