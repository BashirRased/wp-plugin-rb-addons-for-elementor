<?php
/**
 * Resume List widget - Description style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_resume_list_description_';
$cls_1  = '{{WRAPPER}} .resume-list-description';
$cls_2  = '{{WRAPPER}} .resume-list-item:hover .resume-list-description, {{WRAPPER}} .resume-list-item:focus .resume-list-description';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label'     => esc_html__( 'Description', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_resume_list_general_content_resume_description!' => '',
		),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Order.
			'order'       => array(
				'id'           => $prefix . 'description_order',
				'size_units'   => array( '' ),
				'range'        => array(
					'' => array(
						'min'  => 1,
						'max'  => 4,
						'step' => 1,
					),
				),
				'default'      => array(
					'size' => 1,
				),
				'select_class' => $cls_1,
			),

			// Typography.
			'typography'  => array(
				'name'         => $prefix . 'description_typography',
				'global'       => array( 'default' => RBELAD_GENERAL_TEXT ),
				'select_class' => $cls_1,
			),
			'text_stroke' => array(
				'name'         => $prefix . 'description_text_stroke',
				'select_class' => $cls_1,
			),
			'text_shadow' => array(
				'name'         => $prefix . 'description_text_shadow',
				'select_class' => $cls_1,
			),
		),
	),
);

// Tabs.
$this->start_controls_tabs( $prefix . 'description_tabs' );

// Normal Tab.
$this->start_controls_tab(
	$prefix . 'description_normal_tab',
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
			'color' => array(
				'id'           => $prefix . 'description_color',
				'default'      => RBELAD_BLACK_COLOR,
				'select_class' => $cls_1,
			),
		),
	),
);

$this->end_controls_tab();

// Hover Tab.
$this->start_controls_tab(
	$prefix . 'description_hover_tab',
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
			'color' => array(
				'id'           => $prefix . 'description_color_hover',
				'default'      => RBELAD_WHITE_COLOR,
				'select_class' => $cls_2,
			),
		),
	),
);

$this->end_controls_tab();

$this->end_controls_tabs();

// End Section Tab.
$this->end_controls_section();
