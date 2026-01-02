<?php
/**
 * Section Header widget - Subtitle content controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_section_header_subtitle_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'Sub Title', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Switcher.
			'switch' => array(
				'id'      => $prefix . 'switch',
				'label'   => esc_html__( 'Sub Title Show', 'rb-elementor-addons' ),
				'default' => 'no',
			),

			// Text.
			'text'   => array(
				'id'        => $prefix . 'text',
				'label'     => esc_html__( 'Sub Title Text', 'rb-elementor-addons' ),
				'default'   => esc_html__( 'Subtitle', 'rb-elementor-addons' ),
				'condition' => array(
					$prefix . 'switch' => 'yes',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
