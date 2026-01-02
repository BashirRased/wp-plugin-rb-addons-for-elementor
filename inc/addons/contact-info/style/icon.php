<?php
/**
 * Contact Info widget - Icon style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_contact_info_icon_';
$cls_1  = '{{WRAPPER}} .rbelad-contact-info-icon';
$cls_2  = '{{WRAPPER}} .rbelad-contact-info-icon i';
$cls_3  = '{{WRAPPER}} .rbelad-contact-info-icon svg';
$cls_4  = '{{WRAPPER}} .rbelad-contact-info-icon img';
$cls_5  = '{{WRAPPER}} .rbelad-contact-info-icon:hover i, {{WRAPPER}} .rbelad-contact-info-icon:focus i';
$cls_6  = '{{WRAPPER}} .rbelad-contact-info-icon:hover svg, {{WRAPPER}} .rbelad-contact-info-icon:focus svg';
$cls_7  = '{{WRAPPER}} .rbelad-contact-info-icon:hover, {{WRAPPER}} .rbelad-contact-info-icon:focus';

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
			// Width & Height.
			'icon_size'              => array(
				'id'             => $prefix . 'icon_size',
				'default'        => array(
					'unit' => 'px',
					'size' => 16,
				),
				'select_class'   => $cls_2,
				'select_class_2' => $cls_3,
			),
			'icon_img_size'          => array(
				'id'           => $prefix . 'icon_img_size',
				'label'        => esc_html__( 'Icon Image Size', 'rb-elementor-addons' ),
				'default'      => array(
					'unit' => 'px',
					'size' => 16,
				),
				'select_class' => $cls_4,
			),
			'width'                  => array(
				'id'           => $prefix . 'width',
				'select_class' => $cls_1,
			),
			'height'                 => array(
				'id'           => $prefix . 'height',
				'select_class' => $cls_1,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Border & Border Radius.
			'border'                 => array(
				'name'         => $prefix . 'border',
				'select_class' => $cls_1,
			),
			'border_radius'          => array(
				'id'           => $prefix . 'border_radius',
				'select_class' => $cls_1,
			),
			'border_separator'       => array(
				'id' => $prefix . 'border_separator',
			),

			// Margin & Padding.
			'margin_bottom'          => array(
				'id'           => $prefix . 'margin_bottom',
				'default'      => array(
					'unit' => 'px',
					'size' => 10,
				),
				'select_class' => $cls_1,
			),
			'padding'                => array(
				'id'           => $prefix . 'padding',
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
			'fill_color' => array(
				'id'             => $prefix . 'fill_color',
				'default'        => RBELAD_PRIMARY_COLOR,
				'select_class'   => $cls_2,
				'select_class_2' => $cls_3,
			),
			'bg_color'   => array(
				'id'           => $prefix . 'bg_color',
				'default'      => RBELAD_WHITE_COLOR,
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
			'fill_color' => array(
				'id'             => $prefix . 'fill_color_hover',
				'default'        => RBELAD_WHITE_COLOR,
				'select_class'   => $cls_5,
				'select_class_2' => $cls_6,
			),
			'bg_color'   => array(
				'id'           => $prefix . 'bg_color_hover',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_7,
			),
		),
	),
);

$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab.
$this->end_controls_section();
