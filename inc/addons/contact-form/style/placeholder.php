<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'placeholder_style',
	[
		'label' => esc_html__( 'Placeholder', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'contact_form_placeholder_style',
	[
		'controls' => [
			// Typography
			'typography' 		=> [
				'name'        			=> 'placeholder_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form-control::placeholder,
											{{WRAPPER}} .wpcf7-form-control::-webkit-input-placeholder',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'placeholder_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form-control::placeholder,
											{{WRAPPER}} .wpcf7-form-control::-webkit-input-placeholder',
			],
			'text_shadow' 				=> [
				'name'        			=> 'placeholder_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-form-control::placeholder,
											{{WRAPPER}} .wpcf7-form-control::-webkit-input-placeholder',
			],
		],
	],
);

// Tabs
$this->start_controls_tabs( 'placeholder_tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'placeholder_normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

	// All content add here
	$this->add_style_controls(
		'contact_form_placeholder_style',
		[
			'controls' => [
				// Colors
				'color' 					=> [
					'id' 					=> 'placeholder_color',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-form-control::placeholder,
												{{WRAPPER}} .wpcf7-form-control::-webkit-input-placeholder',
				],
			],
		],
	);

	$this->end_controls_tab();

	// Focus Tab
	$this->start_controls_tab(
		'placeholder_focus_tab',
		[
			'label' => esc_html__( 'Focus', 'rb-elementor-addons' ),
		]
	);

	// All content add here
	$this->add_style_controls(
		'contact_form_placeholder_style_focus',
		[
			'controls' => [
				// Colors
				'color' 					=> [
					'id' 					=> 'placeholder_color_focus',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-form-control:focus::placeholder,
												{{WRAPPER}} .wpcf7-form-control:focus::-webkit-input-placeholder',
				],
			],
		],
	);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();