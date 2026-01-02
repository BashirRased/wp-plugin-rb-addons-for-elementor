<?php
/**
 * Contact Form widget - Input Icon style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_contact_form_input_icon_';
$cls_1  = '{{WRAPPER}} .rbelad-contact-form-item-icon';
$cls_2  = $cls_1 . 'i';
$cls_3  = $cls_1 . 'svg';
$cls_4  = $cls_1 . 'img';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Input Icon', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Colors.
			'color'                  => array(
				'id'           => $prefix . 'color',
				'default'      => RBELAD_WHITE_COLOR,
				'select_class' => $cls_1,
			),
			'bg_color'               => array(
				'id'           => $prefix . 'bg_color',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_1,
			),
			'color_separator'        => array(
				'id' => $prefix . 'color_separator',
			),

			// Width & Height.
			'icon_size'              => array(
				'id'             => $prefix . 'icon_size',
				'select_class'   => $cls_2,
				'select_class_2' => $cls_3,
			),
			'icon_img_size'          => array(
				'id'           => $prefix . 'icon_img_size',
				'select_class' => $cls_4,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Border & Border Radius.
			'border'                 => array(
				'name'         => $prefix . 'border',
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
