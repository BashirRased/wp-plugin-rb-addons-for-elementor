<?php
/**
 * Service List widget - Wrap style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_service_list_service_wrap_';
$cls_1  = '{{WRAPPER}} .rbelad-service-item-wrap';
$cls_2  = '{{WRAPPER}} .rbelad-service-item-wrap.style-2::before';
$cls_3  = '{{WRAPPER}} .rbelad-service-item-wrap:hover, {{WRAPPER}} .rbelad-service-item-wrap:focus';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Wrap', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Text Align.
			'align'             => array(
				'id'           => $prefix . 'wrap_align',
				'options'      => rbelad_align_justify(),
				'default'      => 'center',
				'select_class' => $cls_1,
			),
			'align_separator'   => array(
				'id' => $prefix . 'align_separator',
			),

			// Width & Height.
			'min_height'        => array(
				'id'           => $prefix . 'min_height',
				'default'      => array(
					'unit' => 'px',
					'size' => 380,
				),
				'select_class' => $cls_1,
			),

			// Margin & Padding.
			'padding'           => array(
				'id'           => $prefix . 'box_padding',
				'default'      => array(
					'top'      => '20',
					'right'    => '20',
					'bottom'   => '20',
					'left'     => '20',
					'unit'     => 'px',
					'isLinked' => true,
				),
				'select_class' => $cls_1,
			),
			'spacing_separator' => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Border & Border Radius.
			'border'            => array(
				'name'           => $prefix . 'box_border',
				'fields_options' => array(
					'border' => array( 'default' => 'solid' ),
					'width'  => array(
						'default' => array(
							'top'      => '1',
							'right'    => '1',
							'bottom'   => '1',
							'left'     => '1',
							'isLinked' => true,
						),
					),
					'color'  => array(
						'default' => RBELAD_PRIMARY_COLOR,
					),
				),
				'select_class'   => $cls_1,
			),
			'border_radius'     => array(
				'id'           => $prefix . 'box_border_radius',
				'select_class' => $cls_1,
			),
			'box_shadow'        => array(
				'name'         => $prefix . 'box_box_shadow',
				'select_class' => $cls_1,
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

// All content add here - Wrap.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// Colors.
			'bg_color' => array(
				'id'           => $prefix . 'service_wrap_bg_color',
				'select_class' => $cls_1,
			),
		),
	),
);

// All content add here - Wrap Before.
$this->add_style_controls(
	$prefix . 'style_3',
	array(
		'controls' => array(
			// Colors.
			'bg_color' => array(
				'id'           => $prefix . 'wrap_before_bg_color',
				'label'        => esc_html__( 'Before Background Color', 'rb-elementor-addons' ),
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
	$prefix . 'style_4',
	array(
		'controls' => array(
			'bg_color'     => array(
				'id'           => $prefix . 'service_wrap_bg_color_hover',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_3,
			),
			'border_color' => array(
				'id'           => $prefix . 'wrap_border_color_hover',
				'select_class' => $cls_3,
			),
		),
	),
);

$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab.
$this->end_controls_section();
