<?php
/**
 * Section Header widget - Title style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_section_header_title';
$cls_1  = '{{WRAPPER}} .rbelad-section-title';
$cls_2  = '{{WRAPPER}} .rbelad-section-title-highlight';
$cls_3  = '{{WRAPPER}} .rbelad-section-title-wrapper';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Title', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here - title.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Typography.
			'typography'           => array(
				'name'         => $prefix . 'typography',
				'global'       => array( 'default' => RBELAD_PRIMARY_TEXT ),
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
					'size' => 40,
				),
				'select_class' => $cls_3,
			),

			// Colors.
			'color'                => array(
				'id'           => $prefix . 'color',
				'default'      => RBELAD_BLACK_COLOR,
				'select_class' => $cls_1,
			),
		),
	),
);

// All content add here - title.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// Colors.
			'color' => array(
				'id'           => $prefix . 'highlight_color',
				'label'        => esc_html__( 'Highlight Color', 'rb-elementor-addons' ),
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
