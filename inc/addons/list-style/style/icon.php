<?php
/**
 * List Style widget - Icon style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_lis_style_icon_';
$cls_1  = '{{WRAPPER}} .rbelad-list-item-icon i';
$cls_2  = '{{WRAPPER}} .rbelad-list-item-icon svg';
$cls_3  = '{{WRAPPER}} .rbelad-list-item-icon';
$cls_4  = '{{WRAPPER}} .rbelad-list-item-icon img';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_icon',
	array(
		'label'     => esc_html__( 'Icon', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_list_style_general_content_icon_switch' => 'yes',
		),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Colors.
			'fill_color'             => array(
				'id'             => $prefix . 'fill_color',
				'default'        => RBELAD_WHITE_COLOR,
				'select_class'   => $cls_1,
				'select_class_2' => $cls_2,
			),
			'bg_color'               => array(
				'id'           => $prefix . 'bg_color',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_3,
			),
			'color_separator'        => array(
				'id' => $prefix . 'color_separator',
			),

			// Width & Height.
			'width'                  => array(
				'id'           => $prefix . 'width',
				'default'      => array(
					'unit' => 'px',
					'size' => 40,
				),
				'select_class' => $cls_3,
			),
			'height'                 => array(
				'id'           => $prefix . 'height',
				'default'      => array(
					'unit' => 'px',
					'size' => 40,
				),
				'select_class' => $cls_3,
			),
			'icon_img_size'          => array(
				'id'           => $prefix . 'img_size',
				'label'        => esc_html__( 'Image Icon Size', 'rb-elementor-addons' ),
				'default'      => array(
					'unit' => 'px',
					'size' => 20,
				),
				'select_class' => $cls_4,
			),
			'icon_size'              => array(
				'id'             => $prefix . 'font_size',
				'label'          => esc_html__( 'Font Icon Size', 'rb-elementor-addons' ),
				'default'        => array(
					'unit' => 'px',
					'size' => 20,
				),
				'select_class'   => $cls_1,
				'select_class_2' => $cls_2,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Margin & Padding.
			'margin'                 => array(
				'id'           => $prefix . 'margin',
				'default'      => array(
					'top'      => '0',
					'right'    => '10',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'select_class' => $cls_3,
			),
			'padding'                => array(
				'id'           => $prefix . 'padding',
				'select_class' => $cls_3,
			),
			'spacing_separator'      => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Border & Border Radius.
			'border'                 => array(
				'name'         => $prefix . 'border',
				'select_class' => $cls_3,
			),
			'border_radius'          => array(
				'id'           => $prefix . 'border_radius',
				'select_class' => $cls_3,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
