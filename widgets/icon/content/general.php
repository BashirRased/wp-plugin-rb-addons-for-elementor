<?php
/**
 * Icon widget content controls.
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
			// Add Icon.
			'icon_simple'      => array(
				'id' => $rbelad_prefix . '_icon',
			),
			// Icon View.
			'select_option'    => array(
				'id'      => $rbelad_prefix . '_icon_view',
				'options' => array(
					'default' => esc_html__( 'Default', 'rb-addons-for-elementor' ),
					'stacked' => esc_html__( 'Stacked', 'rb-addons-for-elementor' ),
					'framed'  => esc_html__( 'Framed', 'rb-addons-for-elementor' ),
				),
				'default' => 'default',
			),
			// Icon Shape.
			'select_option_2'  => array(
				'id'        => $rbelad_prefix . '_icon_shape',
				'options'   => array(
					'square'  => esc_html__( 'Square', 'rb-addons-for-elementor' ),
					'rounded' => esc_html__( 'Rounded', 'rb-addons-for-elementor' ),
					'circle'  => esc_html__( 'Circle', 'rb-addons-for-elementor' ),
				),
				'default'   => 'circle',
				'condition' => array(
					$rbelad_prefix . '_icon_view!' => 'default',
				),
			),
			// Select Link Type.
			'select_link_type' => array(
				'id' => $rbelad_prefix . '_icon_link_type',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
