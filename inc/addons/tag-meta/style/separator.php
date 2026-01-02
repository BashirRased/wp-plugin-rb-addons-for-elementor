<?php
/**
 * Tag Meta widget - Separator style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_tag_meta_separator_';
$cls_1  = '{{WRAPPER}} .rbelad-tag-meta-separator';
$cls_2  = $cls_1 . 'i';
$cls_3  = $cls_1 . 'svg';
$cls_4  = $cls_1 . 'img';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label'     => esc_html__( 'Separator', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_tag_meta_general_content_tag_separtor!' => 'none',
		),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Typography.
			'typography'             => array(
				'name'         => $prefix . 'typography',
				'global'       => array( 'default' => RBELAD_GENERAL_TEXT ),
				'select_class' => $cls_1,
				'condition'    => array(
					'rbelad_tag_meta_general_content_tag_separtor' => 'text',
				),
			),
			'text_stroke'            => array(
				'name'         => $prefix . 'text_stroke',
				'select_class' => $cls_1,
				'condition'    => array(
					'rbelad_tag_meta_general_content_tag_separtor' => 'text',
				),
			),
			'text_shadow'            => array(
				'name'         => $prefix . 'text_shadow',
				'select_class' => $cls_1,
				'condition'    => array(
					'rbelad_tag_meta_general_content_tag_separtor' => 'text',
				),
			),
			'typography_separator'   => array(
				'id'        => $prefix . 'typography_separator',
				'condition' => array(
					'rbelad_tag_meta_general_content_tag_separtor' => 'text',
				),
			),

			// Colors.
			'color'                  => array(
				'id'           => $prefix . 'color',
				'default'      => RBELAD_TEXT_COLOR,
				'select_class' => $cls_1,
				'condition'    => array(
					'rbelad_tag_meta_general_content_tag_separtor' => array( 'icon', 'text' ),
				),
			),
			'color_separator'        => array(
				'id'        => $prefix . 'color_separator',
				'condition' => array(
					'rbelad_tag_meta_general_content_tag_separtor' => array( 'icon', 'text' ),
				),
			),

			// Width & Height.
			'icon_img_size'          => array(
				'id'           => $prefix . 'img_size',
				'select_class' => $cls_4,
				'default'      => array(
					'unit' => 'px',
					'size' => 20,
				),
				'condition'    => array(
					'rbelad_tag_meta_general_content_tag_separtor' => 'img',
				),
			),
			'icon_size'              => array(
				'id'             => $prefix . 'font_size',
				'select_class'   => $cls_2,
				'select_class_2' => $cls_3,
				'default'        => array(
					'unit' => 'px',
					'size' => 20,
				),
				'condition'      => array(
					'rbelad_tag_meta_general_content_tag_separtor' => 'icon',
				),
			),
			'width_height_separator' => array(),

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
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
