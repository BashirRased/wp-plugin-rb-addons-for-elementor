<?php
/**
 * Card widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$rbelad_prefix = $this->get_section_content_prefix( 'desc' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$rbelad_prefix,
	array(
		'label' => esc_html__( 'Description', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$rbelad_prefix . '_content_2',
	array(
		'controls' => array(
			'textarea' => array(
				'id' => $rbelad_prefix . '_desc',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
