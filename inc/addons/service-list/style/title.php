<?php
/**
 * Service List widget - Title style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_service_list_title_';
$cls_1  = '{{WRAPPER}} .rbelad-service-title';
$cls_2  = '{{WRAPPER}} .rbelad-service-item-wrap:hover .rbelad-service-title, {{WRAPPER}} .rbelad-service-item-wrap:focus .rbelad-service-title';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Title', 'rb-elementor-addons' ),
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
				'global'       => array( 'default' => RBELAD_SECONDARY_TEXT ),
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
				'id'           => $prefix . 'title_margin_bottom',
				'default'      => array(
					'unit' => 'px',
					'size' => 10,
				),
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
				'default'      => RBELAD_BLACK_COLOR,
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
				'id'           => $prefix . 'hover_color',
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
