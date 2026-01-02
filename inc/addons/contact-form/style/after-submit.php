<?php
/**
 * Contact Form widget - After Submit style controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

// Controls variables.
$prefix = 'rbelad_contact_form_after_submit_';
$cls_1  = '{{WRAPPER}} .wpcf7-response-output';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label' => esc_html__( 'After Submit Message', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Typography.
			'typography'           => array(
				'name'         => $prefix . 'typography',
				'global'       => array( 'default' => RBELAD_GENERAL_TEXT ),
				'select_class' => $cls_1,
			),
			'text_stroke'          => array(
				'name'         => $prefix . 'text_stroke',
				'select_class' => $cls_1,
			),
			'text_shadow'          => array(
				'name'         => $prefix . 'text_shadow',
				'select_class' => $cls_1,
			),
			'typography_separator' => array(
				'id' => $prefix . 'typography_separator',
			),

			// Colors.
			'color'                => array(
				'id'           => $prefix . 'color',
				'select_class' => $cls_1,
			),
			'bg_color'             => array(
				'id'           => $prefix . 'bg_color',
				'select_class' => $cls_1,
			),
			'color_separator'      => array(
				'id' => $prefix . 'color_separator',
			),

			// Margin & Padding.
			'margin'               => array(
				'id'           => $prefix . 'margin',
				'select_class' => $cls_1,
			),
			'padding'              => array(
				'id'           => $prefix . 'padding',
				'select_class' => $cls_1,
			),
			'spacing_separator'    => array(
				'id' => $prefix . 'spacing_separator',
			),

			// Border & Border Radius.
			'border'               => array(
				'name'         => $prefix . 'border',
				'select_class' => $cls_1,
			),
			'border_radius'        => array(
				'id'           => $prefix . 'border_radius',
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
