<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'after_submit_style',
	[
		'label' => esc_html__( 'After Submit Message', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'contact_form_after_submit_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'after_submit_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-response-output',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'after_submit_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-response-output',
			],
			'text_shadow' 				=> [
				'name'        			=> 'after_submit_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-response-output',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 					=> [
				'id' 					=> 'after_submit_color',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-response-output',
			],
			'bg_color' 					=> [
				'id' 					=> 'after_submit_bg_color',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-response-output',
			],
			'color_separator' 			=> [],

			// Margin & Padding
			'margin' 					=> [								
				'id' 					=> 'after_submit_margin',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-response-output',
			],
			'padding' 					=> [								
				'id' 					=> 'after_submit_padding',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-response-output',
			],
			'spacing_separator' 		=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'after_submit_border',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-response-output',
			],
			'border_radius' 			=> [
				'id' 					=> 'after_submit_border_radius',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-response-output',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();