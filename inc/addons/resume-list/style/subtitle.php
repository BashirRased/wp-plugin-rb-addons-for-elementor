<?php
/**
 * Resume List widget - Subtitle style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_resume_list_subtitle_';
$cls_1  = '{{WRAPPER}} .resume-list-subtitle';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label'     => esc_html__( 'Resume Subtitle', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_resume_list_general_content_resume_subtitle!' => '',
		),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Order.
			'order'                => array(
				'id'           => $prefix . 'subtitle_order',
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
			'typography'           => array(
				'name'         => $prefix . 'subtitle_typography',
				'global'       => array( 'default' => RBELAD_GENERAL_TEXT ),
				'select_class' => $cls_1,
			),
			'text_stroke'          => array(
				'name'         => $prefix . 'subtitle_text_stroke',
				'select_class' => $cls_1,
			),
			'text_shadow'          => array(
				'name'         => $prefix . 'subtitle_text_shadow',
				'select_class' => $cls_1,
			),
			'typography_separator' => array(
				'id' => $prefix . 'typography_separator',
			),

			// Colors.
			'color'                => array(
				'id'           => $prefix . 'subtitle_color',
				'default'      => RBELAD_BLACK_COLOR,
				'select_class' => $cls_1,
			),
			'color_separator'      => array(
				'id' => $prefix . 'color_separator',
			),

			// Margin.
			'margin_bottom'        => array(
				'id'           => $prefix . 'subtitle_margin_bottom',
				'default'      => array(
					'unit' => 'px',
					'size' => 30,
				),
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
