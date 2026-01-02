<?php
/**
 * Contact Form widget - Submit Button style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_contact_form_submit_btn_';
$cls_1  = '{{WRAPPER}} .rbelad-contact-form-submit-btn-wrap';
$cls_2  = '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rbelad-contact-form-submit-btn';
$cls_3  = '{{WRAPPER}} .wpcf7-submit, {{WRAPPER}} .rbelad-contact-form-submit-btn.style-1::before, {{WRAPPER}} .rbelad-contact-form-submit-btn.style-2::before';
$cls_4  = '{{WRAPPER}} .wpcf7-submit:hover, {{WRAPPER}} .wpcf7-submit:focus, {{WRAPPER}} .rbelad-contact-form-submit-btn:hover, {{WRAPPER}} .rbelad-contact-form-submit-btn:focus';
$cls_5  = '{{WRAPPER}} .wpcf7-submit:hover, {{WRAPPER}} .wpcf7-submit:focus, {{WRAPPER}} .rbelad-contact-form-submit-btn.style-1::before, {{WRAPPER}} .rbelad-contact-form-submit-btn.style-2::before';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Submit Button', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Text Align.
			'align'                  => array(
				'id'           => $prefix . 'align',
				'options'      => rbelad_align_justify(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_1,
			),
			'align_separator'        => array(
				'id' => 'align_separator',
			),

			// Typography.
			'typography'             => array(
				'name'         => $prefix . 'typography',
				'global'       => array( 'default' => RBELAD_GENERAL_TEXT ),
				'select_class' => $cls_2,
			),
			'text_stroke'            => array(
				'name'         => $prefix . 'text_stroke',
				'select_class' => $cls_2,
			),
			'text_shadow'            => array(
				'name'         => $prefix . 'text_shadow',
				'select_class' => $cls_2,
			),
			'typography_separator'   => array(
				'id' => $prefix . 'typography_separator',
			),

			// Width & Height.
			'width'                  => array(
				'id'           => $prefix . 'width',
				'default'      => array(
					'unit' => '%',
					'size' => 100,
				),
				'select_class' => $cls_2,
			),
			'height'                 => array(
				'id'           => $prefix . 'height',
				'select_class' => $cls_2,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Margin & Padding.
			'margin'                 => array(
				'id'           => $prefix . 'margin',
				'select_class' => $cls_2,
			),
			'padding'                => array(
				'id'           => $prefix . 'padding',
				'default'      => array(
					'top'      => '15',
					'right'    => '15',
					'bottom'   => '15',
					'left'     => '15',
					'unit'     => 'px',
					'isLinked' => true,
				),
				'select_class' => $cls_2,
			),
			'spacing_separator'      => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Transition.
			'transition_property'    => array(
				'id'           => $prefix . 'btn_before_transition_property',
				'default'      => 'all',
				'select_class' => $cls_3,
			),
			'transition_duration'    => array(
				'id'           => $prefix . 'btn_before_transition_duration',
				'default'      => array(
					'unit' => 's',
					'size' => 0.5,
				),
				'select_class' => $cls_3,
			),
			'timing_function'        => array(
				'id'           => $prefix . 'btn_before_timing_function',
				'default'      => 'ease-in-out',
				'select_class' => $cls_3,
			),
			'transition_delay'       => array(
				'id'           => $prefix . 'btn_before_transition_delay',
				'default'      => array(
					'unit' => 's',
					'size' => 0,
				),
				'select_class' => $cls_3,
			),
			'transition_separator'   => array(
				'id' => $prefix . 'transition_separator',
			),

			// Border & Border Radius.
			'border'                 => array(
				'name'         => $prefix . 'border',
				'select_class' => $cls_2,
			),
			'border_radius'          => array(
				'id'           => $prefix . 'border_radius',
				'select_class' => $cls_2,
			),
			'box_shadow'             => array(
				'name'         => $prefix . 'box_shadow',
				'select_class' => $cls_2,
			),
		),
	),
);

// Tabs.
$this->start_controls_tabs( $prefix . 'tabs' );

// Normal Tab.
$this->start_controls_tab(
	$prefix . 'normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'rb-elementor-addons' ),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// Colors.
			'color'    => array(
				'id'           => $prefix . 'color',
				'default'      => RBELAD_WHITE_COLOR,
				'select_class' => $cls_2,
			),
			'bg_color' => array(
				'id'           => $prefix . 'bg_color',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_2,
			),
		),
	),
);

$this->end_controls_tab();

// Hover Tab.
$this->start_controls_tab(
	$prefix . 'hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'rb-elementor-addons' ),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_3',
	array(
		'controls' => array(
			// Colors.
			'color'        => array(
				'id'           => $prefix . 'color_hover',
				'select_class' => $cls_4,
			),
			'bg_color'     => array(
				'id'           => $prefix . 'bg_color_hover',
				'default'      => RBELAD_BLACK_COLOR,
				'select_class' => $cls_5,
			),
			'border_color' => array(
				'id'           => $prefix . 'border_color_hover',
				'select_class' => $cls_4,
			),
		),
	),
);

$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab.
$this->end_controls_section();
