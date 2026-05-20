<?php
/**
 * Google Maps widget - general content controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_content_prefix( 'general' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_content_controls(
	$prefix . '_content_1',
	array(
		'controls' => array(
			// Text.
			'text'   => array(
				'id'        => $prefix . '_address',
				'label'     => esc_html__( 'Location', 'rb-addons-for-elementor' ),
				'default' => esc_html__( 'London Eye, London, United Kingdom', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'London Eye, London, United Kingdom', 'rb-addons-for-elementor' ),
			),

			// Slider.
			'slider'   => array(
				'id'        => $prefix . '_zoom',
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
