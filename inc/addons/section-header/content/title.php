<?php
/**
 * Section Header widget - Title content controls.
 *
 * @package RB_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_section_header_title_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'Title', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All repeater content add here.
$this->add_repeater_controls(
	$prefix . 'style_1',
	array(
		'controls'    => array(
			'switch' => array(
				'id'      => $prefix . 'show',
				'label'   => esc_html__( 'Text Highlight', 'rb-elementor-addons' ),
				'default' => 'no',
			),
			'text'   => array(
				'id'    => $prefix . 'text',
				'label' => esc_html__( 'Title Text', 'rb-elementor-addons' ),
			),
		),
		'id'          => $prefix . 'list',
		'label'       => esc_html__( 'Title', 'rb-elementor-addons' ),
		'default'     => array(
			array(
				$prefix . 'show' => 'no',
				$prefix . 'text' => esc_html__( 'About', 'rb-elementor-addons' ),
			),
			array(
				$prefix . 'show' => 'yes',
				$prefix . 'text' => esc_html__( 'Me', 'rb-elementor-addons' ),
			),
		),
		'title_field' => '{{{ rbelad_section_header_title_content_text }}}',
	),
);

// All content add here.
$this->add_style_controls(
	$prefix . 'style_2',
	array(
		'controls' => array(
			// HTML Tag.
			'html_tag' => array(
				'id'      => $prefix . 'html_tag',
				'default' => 'h2',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
