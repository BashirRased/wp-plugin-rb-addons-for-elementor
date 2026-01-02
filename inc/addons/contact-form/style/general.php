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
	'contact_form_general_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form',
			],			
			'text_stroke' 				=> [
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form',
			],
			'text_shadow' 				=> [
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 					=> [
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();