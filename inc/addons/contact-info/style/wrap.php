<?php
/**
 * Contact Info widget - Wrap style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_contact_info_wrap_';
$cls_1  = '{{WRAPPER}} .rbelad-contact-info-item';
$cls_2  = '{{WRAPPER}} .rbelad-contact-info';
$cls_3  = '{{WRAPPER}} .rbelad-contact-info-item:before, {{WRAPPER}} .rbelad-contact-info-item:after';
$cls_4  = '{{WRAPPER}} .rbelad-contact-info-item:hover:before, {{WRAPPER}} .rbelad-contact-info-item:hover:after, {{WRAPPER}} .rbelad-contact-info-item:focus:before, {{WRAPPER}} .rbelad-contact-info-item:focus:after';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'Wrap', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Text Align.
			'align'                  => array(
				'id'           => $prefix . 'item_align',
				'options'      => rbelad_align_justify(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_1,
			),
			'align_separator'        => array(
				'id' => $prefix . 'align_separator',
			),

			// Colors.
			'bg_color'               => array(
				'id'           => $prefix . 'item_bg_color',
				'select_class' => $cls_1,
			),
			'color_separator'        => array(
				'id' => $prefix . 'color_separator',
			),

			// Flex.
			'flex_direction'         => array(
				'id'           => $prefix . 'item_flex_direction',
				'default'      => 'column',
				'select_class' => $cls_2,
			),
			'gap'                    => array(
				'id'           => $prefix . 'item_gap',
				'default'      => array(
					'unit' => 'px',
					'size' => 10,
				),
				'select_class' => $cls_2,
			),
			'flex_separator'         => array(
				'id' => $prefix . 'flex_separator',
			),

			// Width & Height.
			'width'                  => array(
				'id'           => $prefix . 'item_width',
				'select_class' => $cls_1,
			),
			'switch'                 => array(
				'id'      => $prefix . 'item_before_switch',
				'label'   => esc_html__( 'Before Border Show', 'rb-elementor-addons' ),
				'default' => 'no',
			),
			'icon_img_size'          => array(
				'id'           => $prefix . 'item_before_width',
				'label'        => esc_html__( 'Before Width', 'rb-elementor-addons' ),
				'default'      => array(
					'unit' => 'px',
					'size' => 60,
				),
				'select_class' => $cls_3,
				'condition'    => array(
					'rbelad_contact_info_general_content_item_before_switch' => 'yes',
				),
			),
			'icon_img_size_2'        => array(
				'id'           => $prefix . 'item_before_width_hover',
				'label'        => esc_html__( 'Before Width Hover', 'rb-elementor-addons' ),
				'default'      => array(
					'unit' => 'px',
					'size' => 100,
				),
				'select_class' => $cls_4,
				'condition'    => array(
					'rbelad_contact_info_general_content_item_before_switch' => 'yes',
				),
			),
			'width_height_separator' => array(
				'id'        => $prefix . 'width_height_separator',
				'condition' => array(
					'rbelad_contact_info_general_content_item_before_switch' => 'yes',
				),
			),

			// Border & Border Radius.
			'border'                 => array(
				'name'           => $prefix . 'item_before_border',
				'fields_options' => array(
					'border' => array( 'default' => 'solid' ),
					'width'  => array(
						'default' => array(
							'top'      => '1',
							'right'    => '0',
							'bottom'   => '0',
							'left'     => '1',
							'isLinked' => false,
						),
					),
					'color'  => array(
						'default' => RBELAD_PRIMARY_COLOR,
					),
				),
				'select_class'   => $cls_3,
				'condition'      => array(
					'rbelad_contact_info_general_content_item_before_switch' => 'yes',
				),
			),
			'border_separator'       => array(
				'id'        => $prefix . 'border_separator',
				'condition' => array(
					'rbelad_contact_info_general_content_item_before_switch' => 'yes',
				),
			),

			// Margin & Padding.
			'padding'                => array(
				'id'           => $prefix . 'item_padding',
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
