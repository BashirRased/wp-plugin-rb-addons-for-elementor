<?php
/**
 * Scroll Down widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_scroll_down_general_content_'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'link_type',
				'label'   => esc_html__( 'Link Type', 'rb-addons-for-elementor' ),
				'options' => array(
					'page'   => esc_html__( 'Page Link', 'rb-addons-for-elementor' ),
					'custom' => esc_html__( 'Custom Link', 'rb-addons-for-elementor' ),
				),
				'default' => 'custom',
			),

			// Select Page.
			'page_link'     => array(
				'id'        => $prefix . 'page_link',
				'condition' => array(
					$prefix . 'link_type' => 'page',
				),
			),

			// Custom Link.
			'custom_link'   => array(
				'id'        => $prefix . 'custom_link',
				'condition' => array(
					$prefix . 'link_type' => 'custom',
				),
			),

		),
	),
);

// End Section Tab.
$this->end_controls_section();
