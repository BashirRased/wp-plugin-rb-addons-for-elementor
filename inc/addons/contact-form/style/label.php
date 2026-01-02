<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'label_style',
	[
		'label' => esc_html__( 'Label', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'contact_form_label_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'label_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form label',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'label_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form label',
			],
			'text_shadow' 				=> [
				'name'        			=> 'label_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form label',
			],
			'typography_separator' 		=> [],

			// Colors
			'color' 					=> [
				'id' 					=> 'label_color',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form label',
			],
			'color_separator' 			=> [],

			// Margin & Padding
			'margin_bottom' 			=> [								
				'id' 					=> 'label_margin_bottom',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form label',
			],
			'padding' 					=> [								
				'id' 					=> 'label_padding',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form label',
			],
		],
	],
);

// End Section Tab
$this->end_controls_section();