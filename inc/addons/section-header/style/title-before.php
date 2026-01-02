<?php
/**
 * Section Header widget - Title::Before style controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_section_header_title_before_';
$cls_1  = '{{WRAPPER}} .rbelad-section-title-before';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label'     => esc_html__( 'Title Before', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_section_header_title_before_content_switch' => 'yes',
		),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Colors.
			'bg_color'        => array(
				'id'           => $prefix . 'bg_color',
				'default'      => '#000000',
				'select_class' => $cls_1,
			),
			'color_separator' => array(
				'id' => $prefix . 'color_separator',
			),

			// Width & Height.
			'width'           => array(
				'id'           => $prefix . 'width',
				'default'      => array(
					'unit' => '%',
					'size' => 100,
				),
				'select_class' => $cls_1,
			),
			'height'          => array(
				'id'           => $prefix . 'height',
				'default'      => array(
					'unit' => 'px',
					'size' => 2,
				),
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
