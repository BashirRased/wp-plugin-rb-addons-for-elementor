<?php
/**
 * Service List widget - Hover:Box style controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_service_list_hover_box_';
$cls_1  = '{{WRAPPER}} .rbelad-service-item-wrap.style-2::before';
$cls_2  = '{{WRAPPER}} .rbelad-service-item-wrap.style-2:hover::before, {{WRAPPER}} .rbelad-service-item-wrap.style-2:focus::before';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label'     => esc_html__( 'Hover Box', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_service_list_general_content_service_style' => 'style-2',
		),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Width & Height.
			'width' => array(
				'id'           => $prefix . 'before_box_width',
				'label'        => esc_html__( 'Before Width', 'rb-elementor-addons' ),
				'select_class' => $cls_1,
			),
		),
	),
);


// All content add here.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// Width & Height.
			'width' => array(
				'id'           => $prefix . 'before_hover_box_width',
				'label'        => esc_html__( 'Before Width - Hover', 'rb-elementor-addons' ),
				'select_class' => $cls_2,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
