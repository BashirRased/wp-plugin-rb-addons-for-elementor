<?php
/**
 * Video widget - settings content controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = $this->get_section_content_prefix( 'settings' ); // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix,
	array(
		'label' => esc_html__( 'Settings', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . '_style_1',
	array(
		'controls' => array(
			// Switch.
			'switch' => array(
				'id'    => $prefix . '_autoplay',
				'label' => esc_html__( 'Autoplay', 'rb-addons-for-elementor' ),
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
