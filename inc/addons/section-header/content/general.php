<?php
/**
 * Section Header widget - General content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Utilities;

// Controls variables.
$section_prefix = $this->get_section_prefix( 'content_section_' );
$general_prefix = $section_prefix . 'general_';

// Start Section Tab - Content.
$this->start_controls_section(
	$section_prefix . 'general',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'section-header' );

// All content add here.
$this->add_style_controls(
	$general_prefix . 'style_1',
	array(
		'controls' => array(
			// Choose Design.
			'choose_design' => array(
				'id'      => $general_prefix . 'style',
				'options' => array(
					'style-1' => array(
						'title' => esc_attr__( 'Style - 1', 'rb-elementor-addons' ),
						'image' => plugins_url( 'assets/img/section-header/style-1.png', RBELAD_PLUGIN_FILE ),
					),
					'style-2' => array(
						'title' => esc_attr__( 'Style - 2', 'rb-elementor-addons' ),
						'image' => plugins_url( 'assets/img/section-header/style-2.png', RBELAD_PLUGIN_FILE ),
					),
				),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
