<?php
/**
 * Section Header widget - Title::Before content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_section_header_title_before_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'Title Before', 'rb-elementor-addons' ),
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
				'id'    => $prefix . 'switch',
				'label' => esc_html__( 'Title Before Show', 'rb-elementor-addons' ),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
