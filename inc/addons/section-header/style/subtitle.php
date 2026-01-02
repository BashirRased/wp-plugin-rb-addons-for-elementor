<?php
/**
 * Section Header widget - Subtitle style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_section_header_subtitle_';
$cls_1  = '{{WRAPPER}} .rbelad-section-subtitle';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label'     => esc_html__( 'Subtitle', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_section_header_subtitle_content_switch' => 'yes',
		),
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

			// Colors.
			'color'                => array(
				'id'           => $prefix . 'color',
				'default'      => RBELAD_WHITE_COLOR,
				'select_class' => $cls_1,
			),
			'bg_color'             => array(
				'id'           => $prefix . 'bg_color',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_1,
			),
			'color_separator'      => array(
				'id' => $prefix . 'color_separator',
			),

			// Margin & Padding.
			'margin_bottom'        => array(
				'id'           => $prefix . 'margin_bottom',
				'default'      => array(
					'unit' => 'px',
					'size' => 20,
				),
				'select_class' => $cls_1,
			),
			'padding'              => array(
				'id'           => $prefix . 'padding',
				'default'      => array(
					'top'      => '5',
					'right'    => '20',
					'bottom'   => '5',
					'left'     => '20',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'select_class' => $cls_1,
			),
			'spacing_separator'    => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Border & Border Radius.
			'border'               => array(
				'name'         => $prefix . 'border',
				'select_class' => $cls_1,
			),
			'border_radius'        => array(
				'id'           => $prefix . 'border_radius',
				'default'      => array(
					'top'      => 20,
					'right'    => 20,
					'bottom'   => 20,
					'left'     => 20,
					'unit'     => 'px',
					'isLinked' => true,
				),
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
