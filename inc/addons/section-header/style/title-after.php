<?php
/**
 * Section Header widget - Title::After style controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_section_header_title_after_';
$cls_1  = '{{WRAPPER}} .rbelad-section-title-after';

// Start Section Tab - Style.
$this->start_controls_section(
	$prefix . 'section_style',
	array(
		'label'     => esc_html__( 'Title After', 'rb-elementor-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'rbelad_section_header_title_after_content_switch' => 'yes',
		),
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Width & Height.
			'icon_img_size' => array(
				'id'           => $prefix . 'icon_img_size',
				'label'        => esc_html__( 'Icon Size', 'rb-elementor-addons' ),
				'default'      => array(
					'unit' => 'px',
					'size' => 20,
				),
				'select_class' => $cls_1,
			),

			// Colors.
			'bg_color'      => array(
				'id'           => $prefix . 'bg_color',
				'default'      => '#007bff',
				'select_class' => $cls_1,
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
