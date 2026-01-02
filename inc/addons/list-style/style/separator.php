<?php
/**
 * List Style widget - Separator style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_lis_style_separator_';
$cls_1  = '{{WRAPPER}} .rbelad-list-item-separator';
$cls_2  = '{{WRAPPER}} .rbelad-list-item-separator svg';
$cls_3  = '{{WRAPPER}} .rbelad-list-item-separator img';
$cls_4  = '{{WRAPPER}} .rbelad-list-item-separator i';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_separator',
	array(
		'label' => esc_html__( 'Separator', 'rb-elementor-addons' ),
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
				'name'         => $prefix . 'separator_typography',
				'global'       => array( 'default' => RBELAD_GENERAL_TEXT ),
				'select_class' => $cls_1,
			),
			'text_stroke'          => array(
				'name'         => $prefix . 'separator_text_stroke',
				'select_class' => $cls_1,
			),
			'text_shadow'          => array(
				'name'         => $prefix . 'separator_text_shadow',
				'select_class' => $cls_1,
			),
			'typography_separator' => array(
				'id' => $prefix . 'typography_separator',
			),

			// Colors.
			'fill_color'           => array(
				'id'             => $prefix . 'separator_color',
				'default'        => RBELAD_PRIMARY_COLOR,
				'select_class'   => $cls_1,
				'select_class_2' => $cls_2,
			),
			'color_separator'      => array(
				'id' => $prefix . 'color_separator',
			),

			// Margin & Padding.
			'margin'               => array(
				'id'           => $prefix . 'separator_margin',
				'select_class' => $cls_1,
			),
			'spacing_separator'    => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Font Size.
			'icon_img_size'        => array(
				'id'           => $prefix . 'separator_img_size',
				'label'        => esc_html__( 'Image Icon Size', 'rb-elementor-addons' ),
				'select_class' => $cls_3,
			),
			'icon_size'            => array(
				'id'             => $prefix . 'separator_font_size',
				'label'          => esc_html__( 'Font Icon Size', 'rb-elementor-addons' ),
				'select_class'   => $cls_4,
				'select_class_2' => $cls_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
