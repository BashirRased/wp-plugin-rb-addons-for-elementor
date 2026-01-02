<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'input_textarea_style',
	[
		'label' => esc_html__( 'Input & Textarea', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'contact_form_input_textarea_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'input_textarea_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
											{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'input_textarea_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
											{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea',
			],
			'text_shadow' 				=> [
				'name'        			=> 'input_textarea_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
											{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea',
			],
			'typography_separator' 		=> [],

			// Margin & Padding
			'margin_bottom' 			=> [								
				'id' 					=> 'input_textarea_margin',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 30,
				],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
											{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea',
			],
			'padding' 					=> [								
				'id' 					=> 'input_textarea_padding',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
											{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea',
			],
			'spacing_separator' 		=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'input_textarea_border',
				'fields_options' 		=> [
					'border' 			=> ['default' => 'solid'],
					'width' 			=> [
						'default' 		=> [
							'top' 		=> '1',
							'right' 	=> '1',
							'bottom'	=> '1',
							'left' 		=> '1',
							'isLinked'	=> false,
						],
					],
					'color' 			=> [
						'default' 		=> '#000',
					],
				],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
											{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea',
			],
			'border_radius' 			=> [
				'id' 					=> 'input_textarea_border_radius',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
											{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea',
			],
			'box_shadow' 				=> [
				'name'        			=> 'input_textarea_box_shadow',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
											{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea',
			],
			'border_separator'			=> [],

			// Width & Height
			'width' 					=> [
				'id' 					=> 'input_textarea_width',
				'default' 				=> [
					'unit' 				=> '%',
					'size' 				=> 100,
				],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
											{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea',
			],
			'height' 					=> [
				'id' 					=> 'input_height',
				'label' 				=> esc_html__( 'Input Height', 'rb-elementor-addons' ),				
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 50,
				],
				'select_class' 			=> '{{WRAPPER}} .rb-contact-form-item > .rb-contact-form-item-icon, {{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
											{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date',
			],
		],
	],
);

// All content add here
$this->add_style_controls(
	'contact_form_textarea_style',
	[
		'controls' => [
			'height' 					=> [
				'id' 					=> 'textarea_height',
				'default' 				=> [
					'unit' 				=> 'px',
					'size' 				=> 200,
				],
				'label' 				=> esc_html__( 'Textarea Height', 'rb-elementor-addons' ),
				'select_class' 			=> '{{WRAPPER}} .rb-contact-form-item.textarea > .rb-contact-form-item-icon, {{WRAPPER}} .wpcf7-textarea',
			],
		],
	],
);

// Tabs
$this->start_controls_tabs( 'input_textarea_tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'input_textarea_normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

	// All content add here
	$this->add_style_controls(
		'contact_form_input_textarea_style',
		[
			'controls' => [
				// Colors
				'color' 					=> [
					'id' 					=> 'input_textarea_color',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
												{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea',
				],
				'bg_color' 					=> [
					'id' 					=> 'input_textarea_bg_color',
					'default' 				=> '#F1F1F1',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-text, {{WRAPPER}} .wpcf7-email, {{WRAPPER}} .wpcf7-url,
												{{WRAPPER}} .wpcf7-number, {{WRAPPER}} .wpcf7-quiz, {{WRAPPER}} .wpcf7-date, {{WRAPPER}} .wpcf7-textarea',
				],
			],
		],
	);

	$this->end_controls_tab();

	// Focus Tab
	$this->start_controls_tab(
		'input_textarea_focus_tab',
		[
			'label' => esc_html__( 'Focus', 'rb-elementor-addons' ),
		]
	);

	// All content add here
	$this->add_style_controls(
		'contact_form_input_textarea_style_focus',
		[
			'controls' => [
				// Colors
				'color' 					=> [
					'id' 					=> 'input_textarea_color_focus',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-text:focus, 
												{{WRAPPER}} .wpcf7-email:focus, {{WRAPPER}} .wpcf7-url:focus,
												{{WRAPPER}} .wpcf7-number:focus, {{WRAPPER}} .wpcf7-quiz:focus, {{WRAPPER}} .wpcf7-date:focus, {{WRAPPER}} .wpcf7-textarea:focus',
				],
				'bg_color' 					=> [
					'id' 					=> 'input_textarea_bg_color_focus',					
					'default' 				=> '#fff',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-text:focus,
												{{WRAPPER}} .wpcf7-email:focus, {{WRAPPER}} .wpcf7-url:focus,
												{{WRAPPER}} .wpcf7-number:focus, {{WRAPPER}} .wpcf7-quiz:focus, {{WRAPPER}} .wpcf7-date:focus, {{WRAPPER}} .wpcf7-textarea:focus',
				],
				'border_color' 				=> [
					'id' 					=> 'input_textarea_border_color_focus',
					'default' 				=> '#007bff',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-text:focus,
												{{WRAPPER}} .wpcf7-email:focus, {{WRAPPER}} .wpcf7-url:focus,
												{{WRAPPER}} .wpcf7-number:focus, {{WRAPPER}} .wpcf7-quiz:focus, {{WRAPPER}} .wpcf7-date:focus, {{WRAPPER}} .wpcf7-textarea:focus',
				],
			],
		],
	);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();