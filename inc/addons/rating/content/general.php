<?php
/**
 * Rating Star widget content controls.
 *
 * @package    RB_Plugins
 * @subpackage RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

// Controls variables.
$prefix = 'rbelad_rating_skill_general_content_'; // phpcs:disable WordPress.NamingConventions.PrefixAllGlobals

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// All content add here - Rating.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'rating',
				'label'   => esc_html__( 'Rating', 'rb-addons-for-elementor' ),
				'options' => array(
					'0' => esc_html__( '0 Star', 'rb-addons-for-elementor' ),
					'1' => esc_html__( '1 Star', 'rb-addons-for-elementor' ),
					'2' => esc_html__( '2 Star', 'rb-addons-for-elementor' ),
					'3' => esc_html__( '3 Star', 'rb-addons-for-elementor' ),
					'4' => esc_html__( '4 Star', 'rb-addons-for-elementor' ),
					'5' => esc_html__( '5 Star', 'rb-addons-for-elementor' ),
				),
				'default' => '5',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
