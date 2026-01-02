<?php
/**
 * Button Group widget - General style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_button_group_general_';
$cls_1  = '{{WRAPPER}} .rbelad-button-group';
$cls_2  = '{{WRAPPER}} .rbelad-btn-item';
$cls_3  = '{{WRAPPER}} .rbelad-btn-item, {{WRAPPER}} .style-3.rbelad-btn-item::after';
$cls_4  = '{{WRAPPER}} .rbelad-btn-item::before';
$cls_5  = '{{WRAPPER}} .style-1.rbelad-btn-item span, {{WRAPPER}} .style-2.rbelad-btn-item span, {{WRAPPER}} .style-3.rbelad-btn-item, {{WRAPPER}} .style-3.rbelad-btn-item a';
$cls_6  = '{{WRAPPER}} .style-1.rbelad-btn-item:hover span, {{WRAPPER}} .style-1.rbelad-btn-item:focus span, {{WRAPPER}} .style-2.rbelad-btn-item:hover span, {{WRAPPER}} .style-2.rbelad-btn-item:focus span, {{WRAPPER}} .style-3.rbelad-btn-item:hover, {{WRAPPER}} .style-3.rbelad-btn-item:focus, {{WRAPPER}} .style-3.rbelad-btn-item:hover a, {{WRAPPER}} .style-3.rbelad-btn-item:focus a';
$cls_7  = '{{WRAPPER}} .rbelad-btn-item::before, {{WRAPPER}} .style-3.rbelad-btn-item span::before, {{WRAPPER}} .style-3.rbelad-btn-item:focus span';
$cls_8  = '{{WRAPPER}} .style-1.rbelad-btn-item::before, {{WRAPPER}} .style-2.rbelad-btn-item::before, {{WRAPPER}} .style-3.rbelad-btn-item span::before, {{WRAPPER}} .style-3.rbelad-btn-item, {{WRAPPER}} .style-3.rbelad-btn-item::after';
$cls_9  = '{{WRAPPER}} .style-3.rbelad-btn-item:hover, {{WRAPPER}} .style-3.rbelad-btn-item:hover span::before, {{WRAPPER}} .style-3.rbelad-btn-item:focus, {{WRAPPER}} .style-3.rbelad-btn-item:focus span::before';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Text Align.
			'item_align'        => array(
				'id'           => $prefix . 'item_align',
				'options'      => rbelad_align_justify(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_1,
			),
			'column_gap'           => array(
				'id'           => $prefix . 'column_gap',
				'default'      => array(
					'unit' => 'px',
					'size' => 20,
				),
				'select_class' => $cls_1,
			),
			'row_gap'              => array(
				'id'           => $prefix . 'row_gap',
				'default'      => array(
					'unit' => 'px',
					'size' => 20,
				),
				'select_class' => $cls_1,
			),
			'align_separator'      => array(
				'id' => $prefix . 'align_separator',
			),

			// Typography.
			'typography'           => array(
				'name'         => $prefix . 'typography',
				'global'       => array( 'default' => RBELAD_GENERAL_TEXT ),
				'select_class' => $cls_2,
			),
			'text_stroke'          => array(
				'name'         => $prefix . 'text_stroke',
				'select_class' => $cls_2,
			),
			'text_shadow'          => array(
				'name'         => $prefix . 'text_shadow',
				'select_class' => $cls_2,
			),
			'typography_separator' => array(
				'id' => $prefix . 'typography_separator',
			),

			// Margin & Padding.
			'padding'              => array(
				'id'           => $prefix . 'padding',
				'default'      => array(
					'top'      => '10',
					'right'    => '45',
					'bottom'   => '10',
					'left'     => '45',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'select_class' => $cls_2,
			),
			'spacing_separator'    => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Border & Border Radius.
			'border'               => array(
				'name'         => $prefix . 'border',
				'select_class' => $cls_2,
			),
			'border_radius'        => array(
				'id'           => $prefix . 'border_radius',
				'select_class' => $cls_2,
			),
			'border_separator'     => array(
				'id' => $prefix . 'border_separator',
			),

			// Transition.
			'transition_property'  => array(
				'id'           => $prefix . 'transition_property',
				'default'      => 'all',
				'select_class' => $cls_8,
			),
			'transition_duration'  => array(
				'id'           => $prefix . 'transition_duration',
				'default'      => array(
					'unit' => 's',
					'size' => 0.5,
				),
				'select_class' => $cls_8,
			),
			'timing_function'      => array(
				'id'           => $prefix . 'timing_function',
				'default'      => 'ease-in-out',
				'select_class' => $cls_8,
			),
			'transition_delay'     => array(
				'id'           => $prefix . 'transition_delay',
				'default'      => array(
					'unit' => 's',
					'size' => 0,
				),
				'select_class' => $cls_8,
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

$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// Colors.
			'color'    => array(
				'id'           => $prefix . 'color',
				'default'      => RBELAD_WHITE_COLOR,
				'select_class' => $cls_5,
			),
			'bg_color' => array(
				'id'           => $prefix . 'bg_color',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_3,
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

$this->add_style_controls(
	$prefix . 'style_3',
	array(
		'controls' => array(
			// Colors.
			'color'            => array(
				'id'           => $prefix . 'hover_color',
				'default'      => RBELAD_WHITE_COLOR,
				'select_class' => $cls_6,
			),
			'bg_color'         => array(
				'id'           => $prefix . 'hover_bg_color',
				'default'      => RBELAD_BLACK_COLOR,
				'select_class' => $cls_7,
			),
			'border_color'     => array(
				'id'           => $prefix . 'hover_border_color',
				'select_class' => $cls_6,
			),
			'transition_delay' => array(
				'id'           => $prefix . 'hover_transition_delay',
				'default'      => array(
					'unit' => 's',
					'size' => 0.4,
				),
				'select_class' => $cls_9,
			),
		),
	),
);

$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab.
$this->end_controls_section();
