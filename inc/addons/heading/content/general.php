<?php
/**
 * Heading widget content controls.
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
			// Textarea.
			'textarea' => array(
				'id'          => $prefix . '_heading',
				'label'       => esc_html__( 'Title', 'rb-addons-for-elementor' ),
				'default'     => esc_html__( 'Your Heading Text', 'rb-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Enter your title', 'rb-addons-for-elementor' ),
			),

			// HTML Tag.
			'html_tag' => array(
				'id'      => $prefix . '_html_tag',
				'default' => 'h4',
			),
		),
	),
);

$this->rbelad_select_link_type(
	$prefix . '_content_2',
	array(
		'controls' => array(
			array(
				'name'    => $prefix . '_link_type',
				'label'   => esc_html__( 'Link Type', 'rb-addons-for-elementor' ),
				'default' => 'custom_link',
			),
		),
	)
);

// End Section Tab.
$this->end_controls_section();
