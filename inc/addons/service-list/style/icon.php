<?php
/**
 * Service List widget - Icon style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix    = 'rbelad_service_list_icon_';
$cls_1     = '{{WRAPPER}} .rbelad-service-icon';
$cls_1_i   = '{{WRAPPER}} .rbelad-service-icon i';
$cls_1_svg = '{{WRAPPER}} .rbelad-service-icon svg';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Icon', 'rb-elementor-addons' ),
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
				'id'             => $prefix . 'fill_color',
				'default'        => RBELAD_PRIMARY_COLOR,
				'select_class'   => $cls_1_i,
				'select_class_2' => $cls_1_svg,
			),
			'bg_color'               => array(
				'id'           => $prefix . 'bg_color',
				'select_class' => $cls_1,
			),
			'color_separator'        => array(
				'id' => $prefix . 'color_separator',
			),

			// Width & Height.
			'icon_img_size'          => array(
				'id'           => $prefix . 'icon_img_size',
				'label'        => esc_html__( 'Image Size', 'rb-elementor-addons' ),
				'select_class' => '{{WRAPPER}} .rbelad-service-icon img',
				'condition'    => array(
					'rbelad_service_list_general_content_icon_type' => 'img',
				),
			),
			'icon_size'              => array(
				'id'             => $prefix . 'icon_size',
				'label'          => esc_html__( 'Icon Size', 'rb-elementor-addons' ),
				'default'        => array(
					'unit' => 'px',
					'size' => 90,
				),
				'select_class'   => $cls_1_i,
				'select_class_2' => $cls_1_svg,
				'condition'      => array(
					'rbelad_service_list_general_content_icon_type' => 'icon',
				),
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Margin & Padding.
			'margin_bottom'          => array(
				'id'           => $prefix . 'icon_margin_bottom',
				'default'      => array(
					'unit' => 'px',
					'size' => 30,
				),
				'select_class' => $cls_1,
			),
			'padding'                => array(
				'id'           => $prefix . 'icon_padding',
				'default'      => array(
					'top'      => '30',
					'right'    => '30',
					'bottom'   => '30',
					'left'     => '30',
					'unit'     => 'px',
					'isLinked' => true,
				),
				'select_class' => $cls_1,
			),

			// Border & Border Radius.
			'border'                 => array(
				'name'           => $prefix . 'icon_border',
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
			'border_radius'          => array(
				'id'           => $prefix . 'icon_border_radius',
				'default'      => array(
					'top'      => '50',
					'right'    => '50',
					'bottom'   => '50',
					'left'     => '50',
					'unit'     => '%',
					'isLinked' => true,
				),
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
