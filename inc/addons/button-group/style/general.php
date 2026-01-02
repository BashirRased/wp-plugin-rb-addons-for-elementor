<?php
/**
 * Button Group widget - General style controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_button_group_general_';
$cls_1  = '{{WRAPPER}} .rbelad-button-group';
$cls_2  = '{{WRAPPER}} .rbelad-btn-item';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Text Align.
			'justify_align'        => array(
				'id'           => $prefix . 'justify_align',
				'options'      => rbelad_align_text(),
				'default'      => is_rtl() ? 'right' : 'left',
				'select_class' => $cls_1,
			),
			'column_gap'           => array(
				'id'           => $prefix . 'column_gap',
				'default'      => array(
					'unit' => 'px',
					'size' => 20,
				),
				'select_class' => $cls_1,
			),
			'row_gap'              => array(
				'id'           => $prefix . 'row_gap',
				'default'      => array(
					'unit' => 'px',
					'size' => 20,
				),
				'select_class' => $cls_1,
			),
			'align_separator'      => array(
				'id' => $prefix . 'align_separator',
			),

			// Typography.
			'typography'           => array(
				'name'         => $prefix . 'typography',
				'global'       => array( 'default' => Global_Typography::TYPOGRAPHY_TEXT ),
				'select_class' => $cls_2,
			),
			'text_stroke'          => array(
				'name'         => $prefix . 'text_stroke',
				'select_class' => $cls_2,
			),
			'text_shadow'          => array(
				'name'         => $prefix . 'text_shadow',
				'select_class' => $cls_2,
			),
			'typography_separator' => array(
				'id' => $prefix . 'typography_separator',
			),

			// Colors.
			'color'                => array(
				'id'           => $prefix . 'color',
				'default'      => '#ffffff',
				'select_class' => $cls_2,
			),
			'bg_color'             => array(
				'id'           => $prefix . 'bg_color',
				'default'      => '#007bff',
				'select_class' => $cls_2,
			),
			'color_separator'      => array(
				'id' => $prefix . 'color_separator',
			),

			// Margin & Padding.
			'padding'              => array(
				'id'           => $prefix . 'padding',
				'default'      => array(
					'top'      => '10',
					'right'    => '45',
					'bottom'   => '10',
					'left'     => '45',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'select_class' => $cls_2,
			),
			'spacing_separator'    => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Border & Border Radius.
			'border'               => array(
				'name'         => $prefix . 'border',
				'select_class' => $cls_2,
			),
			'border_radius'        => array(
				'id'           => $prefix . 'border_radius',
				'select_class' => $cls_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
