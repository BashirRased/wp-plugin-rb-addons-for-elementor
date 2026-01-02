<?php
/**
 * Category Meta widget - Icon style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_category_meta_icon_';
$cls_1  = '{{WRAPPER}} .rbelad-category-meta-icon';
$cls_2  = $cls_1 . 'i';
$cls_3  = $cls_1 . 'svg';
$cls_4  = $cls_1 . 'img';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label'     => esc_html__( 'Icon', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_category_meta_general_content_category_icon!' => 'none',
		),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Colors.
			'color'                  => array(
				'id'           => $prefix . 'icon_color',
				'default'      => RBELAD_TEXT_COLOR,
				'select_class' => $cls_1,
				'condition'    => array(
					'rbelad_category_meta_general_content_category_icon' => 'icon',
				),
			),
			'color_separator'        => array(
				'condition' => array(
					'rbelad_category_meta_general_content_category_icon' => 'icon',
				),
			),

			// Width & Height.
			'icon_img_size'          => array(
				'id'           => $prefix . 'icon_img_size',
				'select_class' => $cls_4,
				'default'      => array(
					'unit' => 'px',
					'size' => 20,
				),
				'condition'    => array(
					'id' => $prefix . 'color_separator',
					'rbelad_category_meta_general_content_category_icon' => 'img',
				),
			),
			'icon_size'              => array(
				'id'             => $prefix . 'icon_font_size',
				'select_class'   => $cls_2,
				'select_class_2' => $cls_3,
				'default'        => array(
					'unit' => 'px',
					'size' => 20,
				),
				'condition'      => array(
					'rbelad_category_meta_general_content_category_icon' => 'icon',
				),
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Margin & Padding.
			'margin'                 => array(
				'id'           => $prefix . 'icon_margin',
				'default'      => array(
					'top'      => '0',
					'right'    => '10',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'select_class' => $cls_1,
			),
			'padding'                => array(
				'id'           => $prefix . 'icon_padding',
				'select_class' => $cls_1,
			),
			'spacing_separator'      => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Border & Border Radius.
			'border'                 => array(
				'name'         => $prefix . 'icon_border',
				'select_class' => $cls_1,
			),
			'border_radius'          => array(
				'id'           => $prefix . 'icon_border_radius',
				'select_class' => $cls_1,
			),
			'box_shadow'             => array(
				'name'         => $prefix . 'icon_box_shadow',
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
