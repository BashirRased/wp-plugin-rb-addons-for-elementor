<?php
/**
 * Resume List widget - Label style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_resume_list_label_';
$cls_1  = '{{WRAPPER}} .resume-list-label';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label'     => esc_html__( 'Resume Label', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_resume_list_general_content_resume_label!' => '',
		),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Order.
			'order'                  => array(
				'id'           => $prefix . 'label_order',
				'size_units'   => array( '' ),
				'range'        => array(
					'' => array(
						'min'  => 1,
						'max'  => 4,
						'step' => 1,
					),
				),
				'select_class' => $cls_1,
			),

			// Typography.
			'typography'             => array(
				'name'         => $prefix . 'label_typography',
				'global'       => array( 'default' => RBELAD_GENERAL_TEXT ),
				'select_class' => $cls_1,
			),
			'text_stroke'            => array(
				'name'         => $prefix . 'label_text_stroke',
				'select_class' => $cls_1,
			),
			'text_shadow'            => array(
				'name'         => $prefix . 'label_text_shadow',
				'select_class' => $cls_1,
			),
			'typography_separator'   => array(
				'id' => $prefix . 'typography_separator',
			),

			// Colors.
			'color'                  => array(
				'id'           => $prefix . 'label_color',
				'default'      => RBELAD_WHITE_COLOR,
				'select_class' => $cls_1,
			),
			'bg_color'               => array(
				'id'           => $prefix . 'label_bg_color',
				'default'      => RBELAD_PRIMARY_COLOR,
				'select_class' => $cls_1,
			),
			'color_separator'        => array(
				'id' => $prefix . 'color_separator',
			),

			// Margin & Padding.
			'padding'                => array(
				'id'           => $prefix . 'label_padding',
				'default'      => array(
					'top'      => '5',
					'right'    => '10',
					'bottom'   => '5',
					'left'     => '10',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'select_class' => $cls_1,
			),
			'margin_bottom'          => array(
				'id'           => $prefix . 'label_margin_bottom',
				'default'      => array(
					'unit' => 'px',
					'size' => 10,
				),
				'select_class' => $cls_1,
			),
			'width_height_separator' => array(
				'id' => $prefix . 'width_height_separator',
			),

			// Border & Border Radius.
			'border'                 => array(
				'name'         => $prefix . 'label_border',
				'select_class' => $cls_1,
			),
			'border_radius'          => array(
				'id'           => $prefix . 'label_border_radius',
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
