<?php
/**
 * Section Header widget - Title::Separator content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Controls variables.
$prefix = 'rbelad_section_header_title_separator_content_';

use Elementor\Controls_Manager;

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'Title Separator', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Switcher.
			'switch'        => array(
				'id'    => $prefix . 'switch',
				'label' => esc_html__( 'Title Separator Show', 'rb-elementor-addons' ),
			),

			// Select Option.
			'select_option' => array(
				'id'        => $prefix . 'icon_shape',
				'label'     => esc_html__( 'Icon Shape', 'rb-elementor-addons' ),
				'options'   => rbelad_icon_shape(),
				'default'   => 'triangle',
				'condition' => array(
					$prefix . 'switch' => 'yes',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
