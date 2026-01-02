<?php
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Start Section Tab - Style
$this->start_controls_section(
	'submit_btn_style',
	[
		'label' => esc_html__( 'Submit Button', 'rb-elementor-addons' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);

// All content add here
$this->add_style_controls(
	'contact_form_submit_btn_style',
	[
		'controls' => [
			// Text Align
			'align' 					=> [
				'id' 					=> 'submit_btn_align',
				'options'     			=> rb_align_text(),
				'default'     			=> is_rtl() ? 'right' : 'left',
				'select_class' 			=> '{{WRAPPER}} .rb-contact-form-submit-btn-wrap',
			],
			'align_separator' 			=> [],

			// Typography
			'typography' 		=> [
				'name'        			=> 'submit_btn_typography',
				'global'      			=> ['default' => Global_Typography::TYPOGRAPHY_TEXT],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
			],			
			'text_stroke' 				=> [
				'name'        			=> 'submit_btn_text_stroke',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
			],
			'text_shadow' 				=> [
				'name'        			=> 'submit_btn_text_shadow',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
			],
			'typography_separator' 		=> [],

			// Width & Height
			'width' 					=> [
				'id' 					=> 'submit_btn_width',
				'default' 				=> [
					'unit' 				=> '%',
					'size' 				=> 100,
				],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
			],
			'height' 					=> [
				'id' 					=> 'submit_btn_height',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
			],
			'width_height_separator'	=> [],

			// Margin & Padding
			'margin' 					=> [								
				'id' 					=> 'submit_btn_margin',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
			],
			'padding' 					=> [								
				'id' 					=> 'submit_btn_padding',
				'default' 				=> [
					'top' 				=> '15',
					'right' 			=> '15',
					'bottom' 			=> '15',
					'left' 				=> '15',
					'unit' 				=> 'px',
					'isLinked' 			=> true,
				],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
			],
			'spacing_separator' 		=> [],

			// Transition
			'transition_property' 		=> [
				'id' 					=> 'btn_before_transition_property',
				'default' 				=> 'all',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit,
											{{WRAPPER}} .rb-contact-form-submit-btn.style-1::before,
											{{WRAPPER}} .rb-contact-form-submit-btn.style-2::before',
			],
			'transition_duration' 		=> [
				'id' 					=> 'btn_before_transition_duration',
				'default' 				=> [
					'unit' 				=> 's',
					'size' 				=> 0.5,
				],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit,
											{{WRAPPER}} .rb-contact-form-submit-btn.style-1::before,
											{{WRAPPER}} .rb-contact-form-submit-btn.style-2::before',
			],
			'timing_function' 			=> [
				'id' 					=> 'btn_before_timing_function',
				'default' 				=> 'ease-in-out',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit,
											{{WRAPPER}} .rb-contact-form-submit-btn.style-1::before,
											{{WRAPPER}} .rb-contact-form-submit-btn.style-2::before',
			],
			'transition_delay' 			=> [
				'id' 					=> 'btn_before_transition_delay',
				'default' 				=> [
					'unit' 				=> 's',
					'size' 				=> 0,
				],
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit,
											{{WRAPPER}} .rb-contact-form-submit-btn.style-1::before,
											{{WRAPPER}} .rb-contact-form-submit-btn.style-2::before',
			],
			'transition_separator' 		=> [],

			// Border & Border Radius
			'border' 					=> [								
				'name'        			=> 'submit_btn_border',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
			],
			'border_radius' 			=> [
				'id' 					=> 'submit_btn_border_radius',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
			],
			'box_shadow' 				=> [
				'name'        			=> 'submit_btn_box_shadow',
				'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
			],
		],
	],
);

// Tabs
$this->start_controls_tabs( 'submit_btn_tabs' );

	// Normal Tab
	$this->start_controls_tab(
		'submit_btn_normal_tab',
		[
			'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
		]
	);

	// All content add here
	$this->add_style_controls(
		'contact_form_submit_btn_style',
		[
			'controls' => [
				// Colors
				'color' 					=> [
					'id' 					=> 'submit_btn_color',
					'default' 				=> '#fff',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
				],
				'bg_color' 			=> [
					'id' 					=> 'submit_btn_bg_color',
					'default' 				=> '#007bff',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rb-contact-form-submit-btn',
				],
			],
		],
	);

	$this->end_controls_tab();

	// Hover Tab
	$this->start_controls_tab(
		'submit_btn_hover_tab',
		[
			'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
		]
	);

	// All content add here
	$this->add_style_controls(
		'contact_form_submit_btn_style_hover',
		[
			'controls' => [
				// Colors
				'color' 					=> [
					'id' 					=> 'submit_btn_color_hover',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-submit:hover, {{WRAPPER}} .wpcf7-submit:focus,
												{{WRAPPER}} .rb-contact-form-submit-btn:hover,
												{{WRAPPER}} .rb-contact-form-submit-btn:focus',
				],
				'bg_color' 			=> [
					'id' 					=> 'submit_btn_bg_color_hover',
					'default' 				=> '#000',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-submit:hover, {{WRAPPER}} .wpcf7-submit:focus,
												{{WRAPPER}} .rb-contact-form-submit-btn.style-1::before,
												{{WRAPPER}} .rb-contact-form-submit-btn.style-2::before',
				],
				'border_color' 				=> [
					'id' 					=> 'submit_btn_border_color_hover',
					'select_class' 			=> '{{WRAPPER}} .wpcf7-submit:hover, {{WRAPPER}} .wpcf7-submit:focus,
												{{WRAPPER}} .rb-contact-form-submit-btn:hover,
												{{WRAPPER}} .rb-contact-form-submit-btn:focus',
				],
			],
		],
	);

	$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab
$this->end_controls_section();