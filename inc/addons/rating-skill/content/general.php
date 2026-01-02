<?php
/**
 * Rating Skill widget content controls.
 *
 * @package RBELAD_Elementor_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use RBELAD_Elementor_Addons\Utilities;

// Controls variables.
$prefix = 'rbelad_rating_skill_general_content_';

// Start Section Tab - Content.
$this->start_controls_section(
	$prefix . 'section',
	array(
		'label' => esc_html__( 'General', 'rb-elementor-addons' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

// Widgets Buttons.
Utilities::add_library_buttons( $this, 'rating-skill' );

// All content add here - Rating.
$this->add_style_controls(
	$prefix . 'style_1',
	array(
		'controls' => array(
			// Select Option.
			'select_option' => array(
				'id'      => $prefix . 'rating',
				'label'   => esc_html__( 'Rating', 'rb-elementor-addons' ),
				'options' => array(
					'0' => esc_html__( '0 Star', 'rb-elementor-addons' ),
					'1' => esc_html__( '1 Star', 'rb-elementor-addons' ),
					'2' => esc_html__( '2 Star', 'rb-elementor-addons' ),
					'3' => esc_html__( '3 Star', 'rb-elementor-addons' ),
					'4' => esc_html__( '4 Star', 'rb-elementor-addons' ),
					'5' => esc_html__( '5 Star', 'rb-elementor-addons' ),
				),
				'default' => '5',
			),
		),
	),
);

// End Section Tab.
$this->end_controls_section();
