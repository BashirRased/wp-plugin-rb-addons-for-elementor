<?php
/**
 * Service List widget - Description style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_service_list_description_';
$cls_1  = '{{WRAPPER}} .rbelad-service-description';
$cls_2  = '{{WRAPPER}} .rbelad-service-item-wrap:hover .rbelad-service-description, {{WRAPPER}} .rbelad-service-item-wrap:focus .rbelad-service-description';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Description', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Typography.
			'typography'           => array(
				'name'         => $prefix . 'typography',
				'global'       => array( 'default' => RBELAD_GENERAL_TEXT ),
				'select_class' => $cls_1,
			),
			'text_stroke'          => array(
				'name'         => $prefix . 'text_stroke',
				'select_class' => $cls_1,
			),
			'text_shadow'          => array(
				'name'         => $prefix . 'text_shadow',
				'select_class' => $cls_1,
			),
			'typography_separator' => array(
				'id' => $prefix . 'typography_separator',
			),

			// Margin & Padding.
			'margin_bottom'        => array(
				'id'           => $prefix . 'margin_bottom',
				'default'      => array(
					'unit' => 'px',
					'size' => 10,
				),
				'select_class' => $cls_1,
			),
			'spacing_separator'    => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Alignment.
			'align'                => array(
				'id'           => $prefix . 'align',
				'options'      => rbelad_align_justify(),
				'default'      => 'center',
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

// All content add here.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// Colors.
			'color' => array(
				'id'           => $prefix . 'color',
				'select_class' => $cls_1,
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
			'color' => array(
				'id'           => $prefix . 'color_hover',
				'default'      => RBELAD_WHITE_COLOR,
				'select_class' => $cls_2,
			),
		),
	),
);

$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab.
$this->end_controls_section();
