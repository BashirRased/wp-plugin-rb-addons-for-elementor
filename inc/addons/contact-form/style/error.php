<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'error_style',
	[
		'label' => esc_html__( 'Error Message', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'contact_form_error_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'error_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-not-valid-tip',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'error_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-not-valid-tip',
			],
			'text_shadow' 				=> [
				'name'        			=> 'error_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-not-valid-tip',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 					=> [
				'id' 					=> 'error_color',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-not-valid-tip',
			],
			'bg_color' 					=> [
				'id' 					=> 'error_bg_color',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-not-valid-tip',
			],
			'color_separator' 			=> [],

			// Margin & Padding
			'margin_bottom' 			=> [								
				'id' 					=> 'error_margin_bottom',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-not-valid-tip',
			],
			'padding' 					=> [								
				'id' 					=> 'error_padding',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-not-valid-tip',
			],
			'spacing_separator' 		=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'error_border',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-not-valid-tip',
			],
			'border_radius' 			=> [
				'id' 					=> 'error_border_radius',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-not-valid-tip',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();