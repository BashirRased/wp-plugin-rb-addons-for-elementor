<?php
/**
 * Heading widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix = $this->get_section_content_prefix( 'general' );

// Start Section Tab - Content.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$rbelad_prefix . '_content_1',
	array(
		'controls' => array(
			// Textarea.
			'textarea'         => array(
				'id'    => $rbelad_prefix . '_heading',
				'label' => esc_html__( 'Title', 'rb-addons-for-elementor' ),
			),

			// HTML Tag.
			'html_tag'         => array(
				'id'      => $rbelad_prefix . '_html_tag',
				'default' => 'h2',
			),

			// Select Link Type.
			'select_link_type' => array(
				'id' => $rbelad_prefix . '_heading_link_type',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
