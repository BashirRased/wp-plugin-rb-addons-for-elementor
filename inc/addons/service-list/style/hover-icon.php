<?php
/**
 * Service List widget - Hover:Icon style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix          = 'rbelad_service_list_hover_icon_';
$cls_1           = '{{WRAPPER}} .rbelad-service-item-hover .rbelad-service-icon';
$cls_1_i         = '{{WRAPPER}} .rbelad-service-icon i';
$cls_1_i_hover   = '{{WRAPPER}} .rbelad-service-item-hover .rbelad-service-icon i';
$cls_1_svg       = '{{WRAPPER}} .rbelad-service-icon svg';
$cls_1_svg_hover = '{{WRAPPER}} .rbelad-service-item-hover .rbelad-service-icon svg';
$cls_1_img       = '{{WRAPPER}} .rbelad-service-item-hover .rbelad-service-icon img';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Hover Icon', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Colors.
			'fill_color'             => array(
				'id'             => $prefix . 'hover_fill_color',
				'default'        => RBELAD_PRIMARY_COLOR,
				'select_class'   => $cls_1_i,
				'select_class_2' => $cls_1_svg,
			),
			'bg_color'               => array(
				'id'           => $prefix . 'hover_bg_color',
				'default'      => RBELAD_WHITE_COLOR,
				'select_class' => $cls_1,
			),
			'color_separator'        => array(
				'id' => $prefix . 'color_separator',
			),

			// Width & Height.
			'icon_img_size'          => array(
				'id'           => $prefix . 'hover_icon_img_size',
				'label'        => esc_html__( 'Image Size', 'rb-elementor-addons' ),
				'select_class' => $cls_1_img,
				'condition'    => array(
					'rbelad_service_list_general_content_icon_type' => 'img',
				),
			),
			'icon_size'              => array(
				'id'             => $prefix . 'hover_icon_size',
				'label'          => esc_html__( 'Icon Size', 'rb-elementor-addons' ),
				'default'        => array(
					'unit' => 'px',
					'size' => 50,
				),
				'select_class'   => $cls_1_i_hover,
				'select_class_2' => $cls_1_svg_hover,
				'condition'      => array(
					'rbelad_service_list_general_content_icon_type' => 'icon',
				),
			),
			'width_height_separator' => array(

				'id' => $prefix . 'width_height_separator',
			),

			// Margin & Padding.
			'margin_bottom'          => array(
				'id'           => $prefix . 'icon_hover_margin_bottom',
				'default'      => array(
					'unit' => 'px',
					'size' => 10,
				),
				'select_class' => $cls_1,
			),
			'padding'                => array(
				'id'           => $prefix . 'icon_hover_padding',
				'default'      => array(
					'top'      => '15',
					'right'    => '15',
					'bottom'   => '15',
					'left'     => '15',
					'unit'     => 'px',
					'isLinked' => true,
				),
				'select_class' => $cls_1,
			),
			'spacing_separator'      => array(

				'id' => $prefix . 'spacing_separator',
			),

			// Border & Border Radius.
			'border'                 => array(
				'name'         => $prefix . 'icon_hover_border',
				'select_class' => $cls_1,
			),
			'border_radius'          => array(
				'id'           => $prefix . 'icon_hover_border_radius',
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
