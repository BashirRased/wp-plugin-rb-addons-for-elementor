<?php
/**
 * Section Header widget - Description content controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_section_header_description_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'Description', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Switcher.
			'switch'   => array(
				'id'      => $prefix . 'switch',
				'label'   => esc_html__( 'Description Show', 'rb-elementor-addons' ),
				'default' => 'no',
			),

			// Textarea.
			'textarea' => array(
				'id'        => $prefix . 'text',
				'label'     => esc_html__( 'Description Text', 'rb-elementor-addons' ),
				'default'   => esc_html__( 'This is a simple description.', 'rb-elementor-addons' ),
				'condition' => array(
					$prefix . 'switch' => 'yes',
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
