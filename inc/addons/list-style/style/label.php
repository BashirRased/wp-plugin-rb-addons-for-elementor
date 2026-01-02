<?php
/**
 * List Style widget - Label style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_lis_style_label_';
$cls_1  = '{{WRAPPER}} .rbelad-list-item-label';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_label',
	array(
		'label' => esc_html__( 'Label', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
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
			),
			'text_stroke'            => array(
				'name'         => $prefix . 'text_stroke',
				'select_class' => $cls_1,
			),
			'text_shadow'            => array(
				'name'         => $prefix . 'text_shadow',
				'select_class' => $cls_1,
			),
			'typography_separator'   => array(
				'id' => $prefix . 'typography_separator',
			),

			// Colors.
			'color'                  => array(
				'id'           => $prefix . 'color',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_1,
			),
			'color_separator'        => array(
				'id' => $prefix . 'color_separator',
			),

			// Width & Height.
			'min_width'              => array(
				'id'           => $prefix . 'min_width',
				'default'      => array(
					'unit' => 'px',
					'size' => 150,
				),
				'select_class' => $cls_1,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Margin & Padding.
			'margin'                 => array(
				'id'           => $prefix . 'margin',
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
